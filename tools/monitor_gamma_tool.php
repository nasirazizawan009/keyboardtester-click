<?php
// monitor_gamma_tool.php
// Gamma calibration test - shows alternating 1px-line pattern next to a solid gray.
// User adjusts gamma slider until both halves visually match.
$mg_labels = $mg_labels ?? [];
$L = array_merge([
  'aria' => 'Monitor gamma calibration test.',
  'gamma' => 'Gamma',
  'instruction' => 'Step back from the screen 4-6 feet, squint slightly, and adjust the slider until the striped left side blends with the solid gray right side. The slider value when they match is your monitor gamma.',
  'fullscreen' => 'Fullscreen',
  'reset' => 'Reset',
  'target' => 'Target: gamma 2.2 (sRGB standard)',
], $mg_labels);
?>
<div class="mg-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="mg-controls">
    <div class="mg-field">
      <label for="mg-slider"><?php echo htmlspecialchars($L['gamma'], ENT_QUOTES, 'UTF-8'); ?>: <span id="mg-value">2.2</span></label>
      <input type="range" id="mg-slider" min="1.0" max="3.0" step="0.05" value="2.2">
    </div>
    <button type="button" class="mg-btn" id="mg-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="mg-btn" id="mg-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="mg-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="mg-tip mg-tip-target"><?php echo htmlspecialchars($L['target'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="mg-arena" id="mg-arena">
    <div class="mg-pair">
      <div class="mg-stripes"></div>
      <div class="mg-solid" id="mg-solid"></div>
    </div>
    <div class="mg-pair">
      <div class="mg-stripes"></div>
      <div class="mg-solid" id="mg-solid2"></div>
    </div>
  </div>
</div>
<style>
  .mg-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .mg-tester * { box-sizing: border-box; }
  .mg-controls { display: flex; flex-wrap: wrap; gap: 12px; align-items: end; padding: 12px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .mg-field { flex: 1; min-width: 220px; display: flex; flex-direction: column; gap: 6px; }
  .mg-field label { font-weight: 600; font-size: 0.88rem; color: var(--text-color, #0f172a); }
  .mg-field input[type=range] { width: 100%; }
  .mg-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); font-weight: 700; cursor: pointer; }
  .mg-btn:hover { background: var(--border-color, #e2e8f0); }
  .mg-tip { padding: 10px 14px; background: #f0f9ff; border: 1px solid #bae6fd; border-left: 4px solid #2563eb; border-radius: 10px; font-size: 0.92rem; color: #0f172a; }
  .mg-tip-target { background: #dcfce7; border-color: #86efac; border-left-color: #16a34a; color: #14532d; }
  .mg-arena { background: #808080; padding: 30px; border-radius: 12px; display: flex; flex-direction: column; gap: 30px; }
  .mg-arena:fullscreen { padding: 60px; gap: 60px; }
  .mg-pair { display: grid; grid-template-columns: 1fr 1fr; gap: 4px; height: 200px; }
  .mg-stripes { background: repeating-linear-gradient(0deg, #000 0 1px, #fff 1px 2px); }
  .mg-solid { background: #808080; }
</style>
<script>
(function () {
  'use strict';
  var slider = document.getElementById('mg-slider');
  var valueEl = document.getElementById('mg-value');
  var solid1 = document.getElementById('mg-solid');
  var solid2 = document.getElementById('mg-solid2');
  var arena = document.getElementById('mg-arena');
  var fsBtn = document.getElementById('mg-fs');
  var resetBtn = document.getElementById('mg-reset');

  function update() {
    var g = parseFloat(slider.value);
    valueEl.textContent = g.toFixed(2);
    // For striped 50%/50% pattern, perceived value is 0.5^(1/g)
    // To match, the solid should be set to that linear value as 8-bit
    var linear = Math.pow(0.5, 1 / g);
    var v = Math.round(linear * 255);
    solid1.style.background = 'rgb(' + v + ',' + v + ',' + v + ')';
    solid2.style.background = 'rgb(' + v + ',' + v + ',' + v + ')';
  }
  slider.addEventListener('input', update);
  fsBtn.addEventListener('click', function () {
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
  resetBtn.addEventListener('click', function () { slider.value = 2.2; update(); });
  update();
})();
</script>
