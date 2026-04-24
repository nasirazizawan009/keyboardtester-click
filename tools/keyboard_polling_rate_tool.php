<?php
// keyboard_polling_rate_tool.php
// Estimates keyboard polling rate by measuring inter-event timing while a key is held.
$kpr_labels = $kpr_labels ?? [];
$L = array_merge([
  'aria' => 'Keyboard polling rate test. Hold any key down to measure timing.',
  'instruction' => 'Press and HOLD any key for 3+ seconds. The tool measures the OS auto-repeat rate, which approximates your keyboard polling Hz.',
  'warning' => 'Note: Browser key events are throttled by OS auto-repeat settings (typically ~30 events/sec on Windows). True keyboard polling Hz is measured by the firmware before OS, but this gives a useful comparative reading between keyboards on the same OS.',
  'press_now' => 'Hold a key now',
  'samples' => 'Samples', 'avg_interval' => 'Avg interval (ms)', 'rate' => 'Estimated rate (Hz)', 'min_int' => 'Min interval (ms)',
  'reset' => 'Reset',
], $kpr_labels);
?>
<div class="kpr-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="kpr-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="kpr-warn"><?php echo htmlspecialchars($L['warning'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="kpr-arena" id="kpr-arena" tabindex="0">
    <div class="kpr-prompt"><?php echo htmlspecialchars($L['press_now'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="kpr-key" id="kpr-key">-</div>
  </div>
  <div class="kpr-stats" aria-live="polite">
    <div class="kpr-stat"><span class="kpr-label"><?php echo htmlspecialchars($L['samples'], ENT_QUOTES, 'UTF-8'); ?></span><span class="kpr-value" id="kpr-samples">0</span></div>
    <div class="kpr-stat"><span class="kpr-label"><?php echo htmlspecialchars($L['avg_interval'], ENT_QUOTES, 'UTF-8'); ?></span><span class="kpr-value" id="kpr-avg">0</span></div>
    <div class="kpr-stat"><span class="kpr-label"><?php echo htmlspecialchars($L['rate'], ENT_QUOTES, 'UTF-8'); ?></span><span class="kpr-value" id="kpr-rate">0</span></div>
    <div class="kpr-stat"><span class="kpr-label"><?php echo htmlspecialchars($L['min_int'], ENT_QUOTES, 'UTF-8'); ?></span><span class="kpr-value" id="kpr-min">0</span></div>
  </div>
  <button type="button" class="kpr-btn" id="kpr-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
</div>
<style>
  .kpr-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .kpr-tester * { box-sizing: border-box; }
  .kpr-tip { padding: 12px 16px; background: var(--surface, #f0f9ff); border: 1px solid #bae6fd; border-left: 4px solid #2563eb; border-radius: 10px; font-size: 0.95rem; color: var(--text-color, #0f172a); }
  .kpr-warn { padding: 10px 14px; background: #fff7ed; border: 1px solid #fed7aa; border-left: 4px solid #f97316; border-radius: 10px; font-size: 0.85rem; color: #c2410c; }
  .kpr-arena { width: 100%; min-height: 200px; background: var(--surface, #0f172a); border: 2px dashed rgba(37,99,235,0.6); border-radius: 16px; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 30px; cursor: text; }
  .kpr-arena.kpr-active { border-style: solid; background: radial-gradient(circle at center, rgba(37,99,235,0.2), rgba(15,23,42,0.6)); }
  .kpr-arena:focus { outline: 3px solid rgba(37,99,235,0.5); outline-offset: 3px; }
  .kpr-prompt { font-size: 1.05rem; color: var(--text-color, #0f172a); opacity: 0.7; margin-bottom: 12px; }
  .kpr-key { font-family: 'JetBrains Mono', monospace; font-size: 2.4rem; font-weight: 800; color: #2563eb; min-height: 1.2em; }
  .kpr-stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 8px; padding: 10px; background: var(--surface, #fff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .kpr-stat { display: flex; flex-direction: column; align-items: center; gap: 2px; padding: 8px 4px; }
  .kpr-label { font-size: 0.66rem; color: var(--text-muted, #64748b); font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; text-align: center; }
  .kpr-value { font-size: 1.5rem; font-weight: 800; color: var(--text-color, #0f172a); font-variant-numeric: tabular-nums; }
  @media (max-width: 720px) { .kpr-stats { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
  .kpr-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); color: var(--text-color, #0f172a); font-weight: 700; cursor: pointer; align-self: center; }
  .kpr-btn:hover { background: var(--border-color, #e2e8f0); }
</style>
<script>
(function () {
  'use strict';
  var arena = document.getElementById('kpr-arena');
  var keyEl = document.getElementById('kpr-key');
  var samplesEl = document.getElementById('kpr-samples');
  var avgEl = document.getElementById('kpr-avg');
  var rateEl = document.getElementById('kpr-rate');
  var minEl = document.getElementById('kpr-min');
  var resetBtn = document.getElementById('kpr-reset');
  var samples = [];
  var lastTs = 0;
  var minInterval = Infinity;

  function update() {
    samplesEl.textContent = samples.length;
    if (samples.length < 2) return;
    var sum = samples.reduce(function (a, b) { return a + b; }, 0);
    var avg = sum / samples.length;
    avgEl.textContent = avg.toFixed(2);
    rateEl.textContent = (1000 / avg).toFixed(0);
    minEl.textContent = minInterval.toFixed(2);
  }

  function reset() {
    samples = []; lastTs = 0; minInterval = Infinity;
    samplesEl.textContent = '0';
    avgEl.textContent = '0';
    rateEl.textContent = '0';
    minEl.textContent = '0';
    keyEl.textContent = '-';
    arena.classList.remove('kpr-active');
  }

  function onKey(e) {
    var now = performance.now();
    if (e.repeat || lastTs > 0) {
      if (lastTs > 0) {
        var dt = now - lastTs;
        if (dt > 0 && dt < 200) { // valid auto-repeat sample
          samples.push(dt);
          if (dt < minInterval) minInterval = dt;
          if (samples.length > 200) samples.shift();
          update();
        }
      }
    }
    keyEl.textContent = e.code || e.key;
    arena.classList.add('kpr-active');
    lastTs = now;
  }
  function onUp() { lastTs = 0; arena.classList.remove('kpr-active'); }

  window.addEventListener('keydown', onKey);
  window.addEventListener('keyup', onUp);
  resetBtn.addEventListener('click', reset);
  arena.focus();
})();
</script>
