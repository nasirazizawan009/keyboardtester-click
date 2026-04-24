<?php
// monitor_ghosting_tool.php
// Display response time / pixel ghosting test - moving box across colored backgrounds.
$mgh_labels = $mgh_labels ?? [];
$L = array_merge([
  'aria' => 'Monitor ghosting / pixel response test.',
  'speed' => 'Speed (px/sec)', 'box_color' => 'Box color', 'bg_color' => 'Background',
  'play' => 'Start', 'pause' => 'Pause', 'fullscreen' => 'Fullscreen',
  'instruction' => 'Watch the moving box. If you see a trailing blur or color smear behind it, your monitor has ghosting (slow pixel response). Increase speed to expose ghosting more clearly.',
], $mgh_labels);
?>
<div class="mgh-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="mgh-controls">
    <div class="mgh-field">
      <label for="mgh-speed"><?php echo htmlspecialchars($L['speed'], ENT_QUOTES, 'UTF-8'); ?>: <span id="mgh-speed-val">800</span></label>
      <input type="range" id="mgh-speed" min="100" max="3000" step="50" value="800">
    </div>
    <div class="mgh-field">
      <label for="mgh-box"><?php echo htmlspecialchars($L['box_color'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="mgh-box">
        <option value="#ffffff">White</option><option value="#000000" selected>Black</option><option value="#ff0000">Red</option><option value="#00ff00">Green</option><option value="#0000ff">Blue</option>
      </select>
    </div>
    <div class="mgh-field">
      <label for="mgh-bg"><?php echo htmlspecialchars($L['bg_color'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="mgh-bg">
        <option value="#ffffff" selected>White</option><option value="#000000">Black</option><option value="#808080">Gray</option><option value="#ff0000">Red</option><option value="#00ff00">Green</option><option value="#0000ff">Blue</option>
      </select>
    </div>
    <button type="button" class="mgh-btn" id="mgh-toggle"><?php echo htmlspecialchars($L['pause'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="mgh-btn" id="mgh-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="mgh-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="mgh-arena" id="mgh-arena">
    <div class="mgh-box" id="mgh-box-el"></div>
  </div>
</div>
<style>
  .mgh-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .mgh-tester * { box-sizing: border-box; }
  .mgh-controls { display: flex; flex-wrap: wrap; gap: 12px; align-items: end; padding: 12px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .mgh-field { display: flex; flex-direction: column; gap: 4px; min-width: 140px; }
  .mgh-field label { font-size: 0.78rem; font-weight: 600; color: var(--text-color, #0f172a); }
  .mgh-field input[type=range] { width: 200px; }
  .mgh-field select { padding: 7px 10px; border-radius: 8px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); font: inherit; font-size: 0.9rem; }
  .mgh-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); font-weight: 700; cursor: pointer; }
  .mgh-tip { padding: 10px 14px; background: #f0f9ff; border: 1px solid #bae6fd; border-left: 4px solid #2563eb; border-radius: 10px; font-size: 0.92rem; }
  .mgh-arena { position: relative; width: 100%; height: 360px; background: #fff; border-radius: 12px; overflow: hidden; border: 1px solid var(--border-color, #e2e8f0); }
  .mgh-arena:fullscreen { height: 100vh; border-radius: 0; }
  .mgh-box { position: absolute; left: 0; top: 50%; width: 100px; height: 100px; transform: translateY(-50%); background: #000; }
</style>
<script>
(function () {
  'use strict';
  var arena = document.getElementById('mgh-arena');
  var box = document.getElementById('mgh-box-el');
  var speedSlider = document.getElementById('mgh-speed');
  var speedVal = document.getElementById('mgh-speed-val');
  var boxSel = document.getElementById('mgh-box');
  var bgSel = document.getElementById('mgh-bg');
  var toggleBtn = document.getElementById('mgh-toggle');
  var fsBtn = document.getElementById('mgh-fs');
  var x = 0; var dir = 1; var lastTs = 0; var running = true;

  function loop(ts) {
    if (lastTs && running) {
      var dt = (ts - lastTs) / 1000;
      var speed = parseInt(speedSlider.value, 10);
      x += speed * dir * dt;
      var w = arena.clientWidth - box.clientWidth;
      if (x >= w) { x = w; dir = -1; }
      if (x <= 0) { x = 0; dir = 1; }
      box.style.left = x + 'px';
    }
    lastTs = ts;
    requestAnimationFrame(loop);
  }

  speedSlider.addEventListener('input', function () { speedVal.textContent = speedSlider.value; });
  boxSel.addEventListener('change', function () { box.style.background = boxSel.value; });
  bgSel.addEventListener('change', function () { arena.style.background = bgSel.value; });
  toggleBtn.addEventListener('click', function () { running = !running; toggleBtn.textContent = running ? 'Pause' : 'Start'; lastTs = 0; });
  fsBtn.addEventListener('click', function () {
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
  requestAnimationFrame(loop);
})();
</script>
