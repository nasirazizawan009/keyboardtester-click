<?php
// right_click_cps_tool.php
// Right-click CPS (clicks per second) measurement.

$rcc_labels = $rcc_labels ?? [];
$L = array_merge([
  'aria_arena' => 'Right-click inside the area to measure right-click CPS.',
  'start' => 'Start test', 'reset' => 'Reset', 'duration' => 'Duration',
  'total_clicks' => 'Right clicks', 'cps' => 'Right CPS', 'peak_cps' => 'Peak CPS',
  'time_left' => 'Time left', 'best' => 'Best',
  'instruction' => 'Press Start, then right-click in the arena as fast as you can. Browser context menu is suppressed.',
  'click_here' => 'Right-click here',
], $rcc_labels);
?>
<div class="rcc-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria_arena'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="rcc-controls">
    <div class="rcc-field">
      <label for="rcc-duration"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="rcc-duration">
        <option value="5">5s</option>
        <option value="10" selected>10s</option>
        <option value="30">30s</option>
      </select>
    </div>
    <button type="button" class="rcc-btn rcc-btn-primary" id="rcc-start"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="rcc-btn rcc-btn-ghost" id="rcc-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="rcc-stats" aria-live="polite">
    <div class="rcc-stat"><span class="rcc-label"><?php echo htmlspecialchars($L['total_clicks'], ENT_QUOTES, 'UTF-8'); ?></span><span class="rcc-value" id="rcc-total">0</span></div>
    <div class="rcc-stat"><span class="rcc-label"><?php echo htmlspecialchars($L['cps'], ENT_QUOTES, 'UTF-8'); ?></span><span class="rcc-value" id="rcc-cps">0</span></div>
    <div class="rcc-stat"><span class="rcc-label"><?php echo htmlspecialchars($L['peak_cps'], ENT_QUOTES, 'UTF-8'); ?></span><span class="rcc-value" id="rcc-peak">0</span></div>
    <div class="rcc-stat"><span class="rcc-label"><?php echo htmlspecialchars($L['time_left'], ENT_QUOTES, 'UTF-8'); ?></span><span class="rcc-value" id="rcc-timer">10s</span></div>
    <div class="rcc-stat"><span class="rcc-label"><?php echo htmlspecialchars($L['best'], ENT_QUOTES, 'UTF-8'); ?></span><span class="rcc-value" id="rcc-best">0</span></div>
  </div>
  <div class="rcc-arena" id="rcc-arena" tabindex="0">
    <div class="rcc-hint" id="rcc-hint"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="rcc-click-here" id="rcc-click-here"><?php echo htmlspecialchars($L['click_here'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>
</div>
<style>
  .rcc-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .rcc-tester * { box-sizing: border-box; }
  .rcc-controls { display: flex; flex-wrap: wrap; gap: 10px; align-items: end; justify-content: center; padding: 10px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .rcc-field { display: flex; flex-direction: column; gap: 4px; }
  .rcc-field label { font-weight: 600; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.03em; color: var(--text-muted, #64748b); }
  .rcc-field select { padding: 7px 10px; border-radius: 8px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); font: inherit; font-size: 0.9rem; }
  .rcc-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid transparent; font-weight: 700; font-size: 0.9rem; cursor: pointer; }
  .rcc-btn-primary { background: #e11d48; color: #fff; box-shadow: 0 10px 22px rgba(225,29,72,0.28); }
  .rcc-btn-primary:hover { transform: translateY(-1px); }
  .rcc-btn-ghost { background: var(--surface, #fff); color: var(--text-color, #0f172a); border-color: var(--border-color, #cbd5e1); }
  .rcc-btn-ghost:hover { background: var(--border-color, #e2e8f0); }
  .rcc-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .rcc-stats { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 8px; padding: 10px; background: var(--surface, #fff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .rcc-stat { display: flex; flex-direction: column; align-items: center; gap: 2px; padding: 8px 4px; }
  .rcc-label { font-size: 0.68rem; color: var(--text-muted, #64748b); font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; text-align: center; }
  .rcc-value { font-size: 1.4rem; font-weight: 800; color: var(--text-color, #0f172a); font-variant-numeric: tabular-nums; }
  @media (max-width: 720px) { .rcc-stats { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
  .rcc-arena { position: relative; width: 100%; min-height: 260px; background: radial-gradient(circle at center, rgba(225,29,72,0.08), transparent 70%), var(--surface, #0f172a); border: 2px dashed rgba(225,29,72,0.55); border-radius: 16px; cursor: context-menu; user-select: none; touch-action: manipulation; display: flex; align-items: center; justify-content: center; padding: 40px 20px; text-align: center; }
  .rcc-arena.rcc-running { border-style: solid; }
  .rcc-arena:focus { outline: 3px solid rgba(225,29,72,0.5); outline-offset: 3px; }
  .rcc-hint { color: var(--text-color, #0f172a); opacity: 0.8; max-width: 540px; font-size: 0.95rem; }
  .rcc-arena.rcc-running .rcc-hint { display: none; }
  .rcc-click-here { display: none; font-size: 1.6rem; font-weight: 800; color: #e11d48; letter-spacing: 0.03em; text-transform: uppercase; pointer-events: none; }
  .rcc-arena.rcc-running .rcc-click-here { display: block; animation: rcc-pulse 1s ease-in-out infinite; }
  @keyframes rcc-pulse { 0%,100% { opacity: 0.7; } 50% { opacity: 1; transform: scale(1.05); } }
  .rcc-arena.rcc-flash { background: radial-gradient(circle at center, rgba(225,29,72,0.45), rgba(15,23,42,0.6)); transition: background 0.05s; }
</style>
<script>
(function () {
  'use strict';
  var arena = document.getElementById('rcc-arena'), startBtn = document.getElementById('rcc-start'), resetBtn = document.getElementById('rcc-reset'), durSel = document.getElementById('rcc-duration');
  var totalEl = document.getElementById('rcc-total'), cpsEl = document.getElementById('rcc-cps'), peakEl = document.getElementById('rcc-peak'), timerEl = document.getElementById('rcc-timer'), bestEl = document.getElementById('rcc-best');
  var state = { running: false, clicks: 0, startTs: 0, endTs: 0, peak: 0, timer: null };
  function updateStats(){ totalEl.textContent = state.clicks; var elapsed = Math.max(0.01, (performance.now()-state.startTs)/1000); var cps = Math.round(state.clicks/elapsed*10)/10; cpsEl.textContent = cps; if(cps>state.peak) state.peak = cps; peakEl.textContent = state.peak.toFixed(1); }
  function tick(){ var remain = Math.max(0, Math.round((state.endTs-performance.now())/1000)); timerEl.textContent = remain+'s'; if(remain<=0) stop(); }
  function start(){ reset(); state.running = true; state.startTs = performance.now(); var d = parseInt(durSel.value,10); state.endTs = state.startTs+d*1000; arena.classList.add('rcc-running'); startBtn.disabled = true; timerEl.textContent = d+'s'; state.timer = setInterval(tick, 100); arena.focus(); }
  function stop(){ state.running = false; arena.classList.remove('rcc-running'); clearInterval(state.timer); startBtn.disabled = false; var best = 0; try { best = parseFloat(localStorage.getItem('rcc_best')||'0'); } catch(e) {} if(state.peak>best){ best = state.peak; try{ localStorage.setItem('rcc_best', String(best)); } catch(e) {} } bestEl.textContent = best.toFixed(1); }
  function reset(){ state.running = false; clearInterval(state.timer); state.clicks = 0; state.peak = 0; state.startTs = 0; state.endTs = 0; arena.classList.remove('rcc-running'); startBtn.disabled = false; totalEl.textContent = '0'; cpsEl.textContent = '0'; peakEl.textContent = '0'; timerEl.textContent = durSel.value+'s'; }
  arena.addEventListener('contextmenu', function(e){ e.preventDefault(); if(!state.running) return; state.clicks++; arena.classList.add('rcc-flash'); setTimeout(function(){ arena.classList.remove('rcc-flash'); }, 45); updateStats(); });
  arena.addEventListener('pointerdown', function(e){ if(e.button === 2 && state.running){ /* handled by contextmenu */ } });
  startBtn.addEventListener('click', start); resetBtn.addEventListener('click', reset);
  durSel.addEventListener('change', function(){ if(!state.running) timerEl.textContent = durSel.value+'s'; });
  try { bestEl.textContent = localStorage.getItem('rcc_best') || '0'; } catch(e) {}
})();
</script>
