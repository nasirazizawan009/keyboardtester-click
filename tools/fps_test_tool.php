<?php
$fps_labels = $fps_labels ?? [];
$L = array_merge([
  'aria' => 'FPS test - measures browser frame rate live',
  'instruction' => 'Press Start. The tool ticks every animation frame and reports live FPS. Make sure this tab is focused and in the foreground — browsers throttle background tabs to 30 FPS or lower.',
  'start' => 'Start',
  'stop' => 'Stop',
  'reset' => 'Reset',
  'current' => 'Current FPS',
  'avg' => 'Average FPS',
  'min' => 'Min FPS',
  'max' => 'Max FPS',
  'low1' => '1% low',
  'total_frames' => 'Frames rendered',
  'uptime' => 'Run time',
  'detected_hz' => 'Likely display Hz',
  'reference' => 'Tip: browser FPS cannot exceed your monitor refresh rate. A result of ~60 means you have a 60Hz display. ~120, ~144 or ~240 means a high-refresh monitor. 1% low is the slowest 1% of frames — the stutter floor.',
], $fps_labels);
?>
<div class="fps-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="fps-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="fps-current">
    <div class="fps-big" id="fps-big">—</div>
    <div class="fps-big-label">FPS</div>
    <div class="fps-bar"><div class="fps-bar-fill" id="fps-bar"></div></div>
  </div>

  <div class="fps-actions">
    <button type="button" id="fps-start" class="fps-btn fps-btn-primary"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="fps-stop" class="fps-btn" disabled><?php echo htmlspecialchars($L['stop'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="fps-reset" class="fps-btn"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="fps-results">
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['avg'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-avg">-</div></div>
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['min'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-min">-</div></div>
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['max'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-max">-</div></div>
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['low1'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-low1">-</div></div>
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['total_frames'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-frames">0</div></div>
    <div class="fps-stat"><div class="fps-stat-label"><?php echo htmlspecialchars($L['uptime'], ENT_QUOTES, 'UTF-8'); ?></div><div class="fps-stat-value" id="fps-uptime">0s</div></div>
  </div>

  <div class="fps-detected" id="fps-detected"><?php echo htmlspecialchars($L['detected_hz'], ENT_QUOTES, 'UTF-8'); ?>: <strong id="fps-hz">-</strong></div>
  <div class="fps-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .fps-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .fps-tester *{ box-sizing:border-box; }
  .fps-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .fps-current { padding:30px 20px 24px; background:var(--surface,#0f172a); color:#fff; border-radius:12px; text-align:center; }
  .fps-big { font-size:5.5rem; font-weight:900; color:#22c55e; font-variant-numeric:tabular-nums; line-height:1; }
  .fps-big-label { font-size:0.84rem; text-transform:uppercase; letter-spacing:0.2em; color:#94a3b8; margin-top:6px; }
  .fps-bar { margin-top:18px; height:8px; background:rgba(255,255,255,0.12); border-radius:999px; overflow:hidden; }
  .fps-bar-fill { height:100%; background:linear-gradient(90deg,#ef4444,#eab308,#22c55e); width:0%; transition:width 0.15s; }
  .fps-actions { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; }
  .fps-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .fps-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .fps-btn-primary:hover { background:#16a34a; color:#fff; }
  .fps-btn:disabled { opacity:0.5; cursor:not-allowed; }
  .fps-results { display:grid; grid-template-columns:repeat(6,1fr); gap:10px; }
  @media (max-width:900px) { .fps-results { grid-template-columns:repeat(3,1fr); } }
  @media (max-width:520px) { .fps-results { grid-template-columns:repeat(2,1fr); } }
  .fps-stat { padding:14px 12px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:10px; text-align:center; }
  .fps-stat-label { font-size:0.74rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:4px; }
  .fps-stat-value { font-size:1.25rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .fps-detected { padding:10px 14px; background:#f1f5f9; border:1px solid #cbd5e1; border-radius:8px; font-size:0.95rem; text-align:center; }
  .fps-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var bigEl = document.getElementById('fps-big');
  var barEl = document.getElementById('fps-bar');
  var avgEl = document.getElementById('fps-avg'), minEl = document.getElementById('fps-min'), maxEl = document.getElementById('fps-max'), low1El = document.getElementById('fps-low1');
  var framesEl = document.getElementById('fps-frames'), uptimeEl = document.getElementById('fps-uptime'), hzEl = document.getElementById('fps-hz');
  var startBtn = document.getElementById('fps-start'), stopBtn = document.getElementById('fps-stop'), resetBtn = document.getElementById('fps-reset');

  var running = false, raf = 0;
  var startTs = 0, lastTs = 0, frames = 0;
  var fpsSamples = []; // per-second average
  var frameTimes = []; // per-frame ms for 1% low
  var min = Infinity, max = 0;
  var currentFps = 0;
  var lastSecTs = 0, lastSecFrames = 0;

  function render(){
    bigEl.textContent = currentFps ? Math.round(currentFps) : '—';
    var maxBar = 240;
    barEl.style.width = Math.min(100, (currentFps / maxBar) * 100) + '%';
    if (fpsSamples.length) {
      var sum = 0; for (var i = 0; i < fpsSamples.length; i++) sum += fpsSamples[i];
      avgEl.textContent = Math.round(sum / fpsSamples.length);
    }
    if (min !== Infinity) minEl.textContent = Math.round(min);
    maxEl.textContent = max ? Math.round(max) : '-';
    // 1% low: 1% worst frames (longest frame times)
    if (frameTimes.length > 100) {
      var sorted = frameTimes.slice().sort(function(a,b){ return b - a; });
      var cutoff = Math.max(1, Math.floor(sorted.length * 0.01));
      var worstSum = 0;
      for (var j = 0; j < cutoff; j++) worstSum += sorted[j];
      var worstAvg = worstSum / cutoff;
      low1El.textContent = Math.round(1000 / worstAvg);
    }
    framesEl.textContent = frames.toLocaleString();
    var up = lastTs - startTs;
    uptimeEl.textContent = Math.round(up / 1000) + 's';
    // Detect likely Hz from max
    var hz = '-';
    if (max >= 230) hz = '240Hz';
    else if (max >= 160) hz = '165Hz';
    else if (max >= 140) hz = '144Hz';
    else if (max >= 115) hz = '120Hz';
    else if (max >= 70) hz = '75Hz';
    else if (max >= 55) hz = '60Hz';
    else if (max >= 25) hz = '30Hz';
    hzEl.textContent = hz;
  }

  function tick(ts){
    if (!running) return;
    if (!startTs) startTs = ts;
    if (lastTs) {
      var dt = ts - lastTs;
      if (dt > 0 && dt < 500) {
        var fps = 1000 / dt;
        currentFps = fps;
        frameTimes.push(dt);
        if (frameTimes.length > 20000) frameTimes.shift();
        if (fps < min) min = fps;
        if (fps > max) max = fps;
      }
    }
    lastTs = ts;
    frames++;
    if (ts - lastSecTs >= 500) {
      var secFps = (frames - lastSecFrames) * 1000 / (ts - lastSecTs);
      fpsSamples.push(secFps);
      if (fpsSamples.length > 600) fpsSamples.shift();
      lastSecTs = ts;
      lastSecFrames = frames;
      render();
    }
    raf = requestAnimationFrame(tick);
  }

  function start(){
    if (running) return;
    running = true;
    startBtn.disabled = true;
    stopBtn.disabled = false;
    startTs = 0; lastTs = 0;
    lastSecTs = 0; lastSecFrames = 0;
    raf = requestAnimationFrame(tick);
  }
  function stop(){
    running = false;
    cancelAnimationFrame(raf);
    startBtn.disabled = false;
    stopBtn.disabled = true;
    render();
  }
  function reset(){
    stop();
    startTs = 0; lastTs = 0; frames = 0;
    fpsSamples = []; frameTimes = [];
    min = Infinity; max = 0; currentFps = 0;
    bigEl.textContent = '—';
    avgEl.textContent = minEl.textContent = maxEl.textContent = low1El.textContent = '-';
    framesEl.textContent = '0'; uptimeEl.textContent = '0s'; hzEl.textContent = '-';
    barEl.style.width = '0%';
  }

  startBtn.addEventListener('click', start);
  stopBtn.addEventListener('click', stop);
  resetBtn.addEventListener('click', reset);
})();
</script>
