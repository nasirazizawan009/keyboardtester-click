<?php
$ms_labels = $ms_labels ?? [];
$L = array_merge([
  'aria' => 'Mouse spin test - counts full 360 degree rotations',
  'instruction' => 'Press Start. Place the cursor on the pad, hold the left button, and spin the mouse in circles around the center dot. Every full 360-degree sweep counts as one spin. Release at any point to pause.',
  'duration' => 'Duration',
  'dur_15' => '15 seconds',
  'dur_30' => '30 seconds',
  'dur_60' => '60 seconds',
  'start' => 'Start',
  'stop' => 'Stop',
  'reset' => 'Reset',
  'pad_hint' => 'Hold the left button and spin around the center dot.',
  'time_left' => 'Time left',
  'spins' => 'Spins',
  'peak_sps' => 'Peak spins/sec',
  'degrees' => 'Total rotation',
  'direction' => 'Direction',
  'dir_cw' => 'Clockwise',
  'dir_ccw' => 'Counter-clockwise',
  'dir_idle' => '-',
  'reference' => 'Tip: higher DPI lets you spin faster with less hand motion. For fun comparisons, try both clockwise and counter-clockwise, and try slow deliberate circles vs fast wrist flicks.',
], $ms_labels);
?>
<div class="ms-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ms-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="ms-form">
    <div class="ms-field">
      <label for="ms-duration"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ms-duration">
        <option value="15"><?php echo htmlspecialchars($L['dur_15'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="30" selected><?php echo htmlspecialchars($L['dur_30'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="60"><?php echo htmlspecialchars($L['dur_60'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="ms-actions">
      <button type="button" id="ms-start" class="ms-btn ms-btn-primary"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
      <button type="button" id="ms-reset" class="ms-btn"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>
  </div>

  <div id="ms-pad" class="ms-pad">
    <div class="ms-pad-center" id="ms-center"></div>
    <div class="ms-pad-hint" id="ms-pad-hint"><?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="ms-pad-timer" id="ms-timer"><?php echo htmlspecialchars($L['time_left'], ENT_QUOTES, 'UTF-8'); ?>: <span id="ms-timer-v">30</span>s</div>
    <svg class="ms-pad-arc" id="ms-arc" viewBox="-100 -100 200 200" aria-hidden="true"><circle cx="0" cy="0" r="80" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="2"/><path id="ms-arc-path" d="" fill="none" stroke="#22c55e" stroke-width="6" stroke-linecap="round"/></svg>
  </div>

  <div class="ms-results">
    <div class="ms-stat primary"><div class="ms-stat-label"><?php echo htmlspecialchars($L['spins'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ms-stat-value" id="ms-spins">0</div></div>
    <div class="ms-stat"><div class="ms-stat-label"><?php echo htmlspecialchars($L['peak_sps'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ms-stat-value" id="ms-peak">0.00</div></div>
    <div class="ms-stat"><div class="ms-stat-label"><?php echo htmlspecialchars($L['degrees'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ms-stat-value" id="ms-deg">0°</div></div>
    <div class="ms-stat"><div class="ms-stat-label"><?php echo htmlspecialchars($L['direction'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ms-stat-value" id="ms-dir"><?php echo htmlspecialchars($L['dir_idle'], ENT_QUOTES, 'UTF-8'); ?></div></div>
  </div>
  <div class="ms-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ms-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ms-tester *{ box-sizing:border-box; }
  .ms-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ms-form { display:flex; flex-wrap:wrap; gap:12px; align-items:end; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .ms-field { display:flex; flex-direction:column; gap:6px; min-width:180px; }
  .ms-field label { font-size:0.84rem; font-weight:600; }
  .ms-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; }
  .ms-actions { display:flex; gap:8px; flex:1; justify-content:flex-end; }
  .ms-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .ms-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .ms-btn-primary:hover { background:#16a34a; color:#fff; }
  .ms-btn-primary:disabled { background:#475569; color:#94a3b8; cursor:not-allowed; border-color:#475569; }
  .ms-pad { position:relative; height:360px; background:radial-gradient(circle at center, #1e293b 0%, #0b1628 100%); border-radius:12px; cursor:crosshair; overflow:hidden; user-select:none; touch-action:none; }
  @media (max-width:720px) { .ms-pad { height:300px; } }
  .ms-pad.is-running { background:radial-gradient(circle at center, #15803d 0%, #0b1628 100%); }
  .ms-pad-center { position:absolute; top:50%; left:50%; width:14px; height:14px; border-radius:999px; background:#22c55e; transform:translate(-50%,-50%); box-shadow:0 0 20px rgba(34,197,94,0.55); }
  .ms-pad-hint { position:absolute; bottom:16px; left:0; right:0; text-align:center; color:#94a3b8; font-size:0.9rem; padding:0 20px; pointer-events:none; }
  .ms-pad.is-running .ms-pad-hint { color:rgba(255,255,255,0.7); }
  .ms-pad-timer { position:absolute; top:10px; right:14px; background:rgba(0,0,0,0.55); color:#fff; padding:6px 12px; border-radius:6px; font-variant-numeric:tabular-nums; font-weight:700; }
  .ms-pad-arc { position:absolute; top:50%; left:50%; width:60%; height:60%; max-width:260px; max-height:260px; transform:translate(-50%,-50%); pointer-events:none; }
  .ms-results { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; }
  @media (max-width:720px) { .ms-results { grid-template-columns:repeat(2,1fr); } }
  .ms-stat { padding:18px 16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; text-align:center; }
  .ms-stat.primary { background:var(--surface,#0f172a); color:#fff; border:none; }
  .ms-stat-label { font-size:0.76rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .ms-stat-value { font-size:1.6rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .ms-stat.primary .ms-stat-value { color:#22c55e; font-size:2.4rem; }
  .ms-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var pad = document.getElementById('ms-pad');
  var padHint = document.getElementById('ms-pad-hint');
  var arcPath = document.getElementById('ms-arc-path');
  var durationEl = document.getElementById('ms-duration');
  var startBtn = document.getElementById('ms-start');
  var resetBtn = document.getElementById('ms-reset');
  var timerEl = document.getElementById('ms-timer-v');
  var spinsEl = document.getElementById('ms-spins');
  var peakEl = document.getElementById('ms-peak');
  var degEl = document.getElementById('ms-deg');
  var dirEl = document.getElementById('ms-dir');

  var L = {
    cw: <?php echo json_encode($L['dir_cw']); ?>,
    ccw: <?php echo json_encode($L['dir_ccw']); ?>,
    idle: <?php echo json_encode($L['dir_idle']); ?>,
  };

  var running = false, deadline = 0, raf = 0, tracking = false;
  var lastAngle = null, cumulativeDeg = 0;
  var spinHistory = []; // {ts, count} for 1-sec sliding window

  function padCenter(){
    var r = pad.getBoundingClientRect();
    return { x: r.left + r.width/2, y: r.top + r.height/2 };
  }
  function angleFrom(x, y){
    var c = padCenter();
    return Math.atan2(y - c.y, x - c.x) * 180 / Math.PI; // -180..180
  }

  function onDown(e){
    if (!running) return;
    pad.setPointerCapture(e.pointerId);
    tracking = true;
    lastAngle = angleFrom(e.clientX, e.clientY);
  }
  function onMove(e){
    if (!tracking || lastAngle === null) return;
    var a = angleFrom(e.clientX, e.clientY);
    var delta = a - lastAngle;
    // normalize into [-180, 180]
    if (delta > 180) delta -= 360;
    else if (delta < -180) delta += 360;
    cumulativeDeg += delta;
    lastAngle = a;
    // log for 1s window
    var now = performance.now();
    spinHistory.push({ ts: now, delta: delta });
    render();
  }
  function onUp(){ tracking = false; lastAngle = null; }

  function render(){
    var absDeg = Math.abs(cumulativeDeg);
    var spins = absDeg / 360;
    spinsEl.textContent = spins.toFixed(2);
    degEl.textContent = Math.round(absDeg).toLocaleString() + '°';
    dirEl.textContent = cumulativeDeg === 0 ? L.idle : (cumulativeDeg > 0 ? L.cw : L.ccw);
    // Peak SPS: max degrees per 1-second sliding window / 360
    var now = performance.now();
    var cutoff = now - 1000;
    while (spinHistory.length && spinHistory[0].ts < cutoff) spinHistory.shift();
    var windowDeg = 0;
    for (var i = 0; i < spinHistory.length; i++) windowDeg += Math.abs(spinHistory[i].delta);
    var sps = windowDeg / 360;
    var currentPeak = parseFloat(peakEl.textContent) || 0;
    if (sps > currentPeak) peakEl.textContent = sps.toFixed(2);
    // Draw arc reflecting progress (last spin only, mod 360)
    var shownDeg = cumulativeDeg % 360;
    var r = 80;
    var startAng = -90; // top
    var sweep = shownDeg;
    var endAng = startAng + sweep;
    var x1 = r * Math.cos(startAng * Math.PI / 180);
    var y1 = r * Math.sin(startAng * Math.PI / 180);
    var x2 = r * Math.cos(endAng * Math.PI / 180);
    var y2 = r * Math.sin(endAng * Math.PI / 180);
    var largeArc = Math.abs(sweep) > 180 ? 1 : 0;
    var sweepFlag = sweep > 0 ? 1 : 0;
    arcPath.setAttribute('d', 'M ' + x1.toFixed(2) + ' ' + y1.toFixed(2) + ' A ' + r + ' ' + r + ' 0 ' + largeArc + ' ' + sweepFlag + ' ' + x2.toFixed(2) + ' ' + y2.toFixed(2));
  }

  function tick(){
    if (!running) return;
    var now = performance.now();
    var left = Math.max(0, Math.ceil((deadline - now) / 1000));
    timerEl.textContent = left;
    if (now >= deadline) { stop(); return; }
    render();
    raf = requestAnimationFrame(tick);
  }

  function start(){
    var dur = parseInt(durationEl.value, 10) || 30;
    cumulativeDeg = 0; spinHistory = [];
    running = true;
    deadline = performance.now() + dur * 1000;
    pad.classList.add('is-running');
    startBtn.disabled = true;
    durationEl.disabled = true;
    peakEl.textContent = '0.00';
    render();
    raf = requestAnimationFrame(tick);
  }
  function stop(){
    running = false;
    tracking = false; lastAngle = null;
    cancelAnimationFrame(raf);
    pad.classList.remove('is-running');
    startBtn.disabled = false;
    durationEl.disabled = false;
    timerEl.textContent = 0;
  }
  function reset(){
    stop();
    cumulativeDeg = 0; spinHistory = [];
    spinsEl.textContent = '0'; peakEl.textContent = '0.00'; degEl.textContent = '0°'; dirEl.textContent = L.idle;
    timerEl.textContent = parseInt(durationEl.value, 10) || 30;
    arcPath.setAttribute('d', '');
  }

  pad.addEventListener('pointerdown', onDown);
  pad.addEventListener('pointermove', onMove);
  pad.addEventListener('pointerup', onUp);
  pad.addEventListener('pointercancel', onUp);
  pad.addEventListener('lostpointercapture', onUp);
  startBtn.addEventListener('click', start);
  resetBtn.addEventListener('click', reset);
  durationEl.addEventListener('change', function(){ if (!running) timerEl.textContent = durationEl.value; });
})();
</script>
