<?php
$md_labels = $md_labels ?? [];
$L = array_merge([
  'aria' => 'Mouse drift test - detects idle cursor movement from sensor jitter',
  'instruction' => 'Keep your hand OFF the mouse during the test. Move the cursor into the pad once, press Start, then let go. We sample every pointer event until the timer ends.',
  'duration' => 'Duration',
  'dur_10' => '10 seconds',
  'dur_30' => '30 seconds',
  'dur_60' => '60 seconds',
  'dur_180' => '3 minutes',
  'start' => 'Start test',
  'stop' => 'Stop',
  'reset' => 'Reset',
  'pad_hint' => 'Hover your cursor inside this pad and press Start. Do not touch the mouse until the timer finishes.',
  'running' => 'Running — do not touch the mouse',
  'done' => 'Test complete',
  'time_left' => 'Time left',
  'total_drift' => 'Total drift',
  'max_delta' => 'Max single-event delta',
  'samples' => 'Pointer events recorded',
  'verdict' => 'Verdict',
  'verdict_perfect' => 'Perfect — zero drift detected',
  'verdict_minor' => 'Minor drift (under 5 px total) — probably noise, likely fine',
  'verdict_warn' => 'Notable drift — your sensor may have jitter or firmware issues',
  'verdict_bad' => 'Heavy drift — sensor is clearly unstable, consider replacing',
  'verdict_idle' => 'Press Start and keep your hand off the mouse',
  'reference' => 'Tip: laser sensors drift more on glossy surfaces. Optical sensors drift on transparent or very dark mats. A good gaming mousepad eliminates most false positives.',
], $md_labels);
?>
<div class="md-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="md-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="md-form">
    <div class="md-field">
      <label for="md-duration"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="md-duration">
        <option value="10"><?php echo htmlspecialchars($L['dur_10'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="30" selected><?php echo htmlspecialchars($L['dur_30'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="60"><?php echo htmlspecialchars($L['dur_60'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="180"><?php echo htmlspecialchars($L['dur_180'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="md-actions">
      <button type="button" id="md-start" class="md-btn md-btn-primary"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
      <button type="button" id="md-reset" class="md-btn"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    </div>
  </div>

  <div class="md-pad-wrap">
    <div id="md-pad" class="md-pad" aria-label="<?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?>">
      <div class="md-pad-hint" id="md-pad-hint"><?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="md-pad-timer" id="md-timer"><?php echo htmlspecialchars($L['time_left'], ENT_QUOTES, 'UTF-8'); ?>: <span id="md-timer-v">30</span>s</div>
    </div>
  </div>

  <div class="md-results">
    <div class="md-stat"><div class="md-stat-label"><?php echo htmlspecialchars($L['total_drift'], ENT_QUOTES, 'UTF-8'); ?></div><div class="md-stat-value" id="md-total">0.00 px</div></div>
    <div class="md-stat"><div class="md-stat-label"><?php echo htmlspecialchars($L['max_delta'], ENT_QUOTES, 'UTF-8'); ?></div><div class="md-stat-value" id="md-max">0.00 px</div></div>
    <div class="md-stat"><div class="md-stat-label"><?php echo htmlspecialchars($L['samples'], ENT_QUOTES, 'UTF-8'); ?></div><div class="md-stat-value" id="md-samples">0</div></div>
  </div>

  <div class="md-verdict" id="md-verdict"><?php echo htmlspecialchars($L['verdict_idle'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="md-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .md-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .md-tester *{ box-sizing:border-box; }
  .md-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .md-form { display:flex; flex-wrap:wrap; gap:12px; align-items:end; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .md-field { display:flex; flex-direction:column; gap:6px; min-width:180px; }
  .md-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .md-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; }
  .md-actions { display:flex; gap:8px; flex:1; justify-content:flex-end; }
  .md-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .md-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .md-btn-primary:hover { background:#16a34a; color:#fff; }
  .md-btn-primary:disabled { background:#475569; color:#94a3b8; cursor:not-allowed; border-color:#475569; }
  .md-pad { position:relative; height:260px; background:linear-gradient(135deg,#1e293b 0%,#334155 100%); border-radius:12px; cursor:crosshair; color:#cbd5e1; display:flex; align-items:center; justify-content:center; overflow:hidden; user-select:none; }
  .md-pad.is-running { background:linear-gradient(135deg,#16a34a 0%,#22c55e 100%); color:#fff; }
  .md-pad.is-done { background:linear-gradient(135deg,#0ea5e9 0%,#38bdf8 100%); color:#fff; }
  .md-pad-hint { padding:0 24px; text-align:center; font-size:0.95rem; max-width:520px; }
  .md-pad-timer { position:absolute; top:10px; right:14px; background:rgba(0,0,0,0.45); color:#fff; padding:6px 12px; border-radius:6px; font-variant-numeric:tabular-nums; font-weight:700; font-size:1rem; }
  .md-results { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
  @media (max-width:720px) { .md-results { grid-template-columns:1fr; } .md-pad { height:220px; } }
  .md-stat { padding:18px 20px; background:var(--surface,#0f172a); color:#fff; border-radius:12px; text-align:center; }
  .md-stat-label { font-size:0.78rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .md-stat-value { font-size:2rem; font-weight:800; font-variant-numeric:tabular-nums; color:#22c55e; }
  .md-verdict { padding:14px 18px; border-radius:10px; font-weight:600; text-align:center; background:#f1f5f9; color:#334155; }
  .md-verdict.is-perfect { background:#dcfce7; color:#14532d; border:1px solid #86efac; }
  .md-verdict.is-minor { background:#fef9c3; color:#713f12; border:1px solid #fde68a; }
  .md-verdict.is-warn { background:#ffedd5; color:#7c2d12; border:1px solid #fdba74; }
  .md-verdict.is-bad { background:#fee2e2; color:#7f1d1d; border:1px solid #fca5a5; }
  .md-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var pad = document.getElementById('md-pad');
  var padHint = document.getElementById('md-pad-hint');
  var durationEl = document.getElementById('md-duration');
  var startBtn = document.getElementById('md-start');
  var resetBtn = document.getElementById('md-reset');
  var timerV = document.getElementById('md-timer-v');
  var totalEl = document.getElementById('md-total');
  var maxEl = document.getElementById('md-max');
  var samplesEl = document.getElementById('md-samples');
  var verdictEl = document.getElementById('md-verdict');

  var L = {
    running: <?php echo json_encode($L['running']); ?>,
    done: <?php echo json_encode($L['done']); ?>,
    padHint: <?php echo json_encode($L['pad_hint']); ?>,
    perfect: <?php echo json_encode($L['verdict_perfect']); ?>,
    minor: <?php echo json_encode($L['verdict_minor']); ?>,
    warn: <?php echo json_encode($L['verdict_warn']); ?>,
    bad: <?php echo json_encode($L['verdict_bad']); ?>,
    idle: <?php echo json_encode($L['verdict_idle']); ?>,
  };

  var running = false, lastX = null, lastY = null, startTs = 0, deadline = 0, rafId = 0;
  var total = 0, maxDelta = 0, samples = 0;

  function setVerdict(cls, text){
    verdictEl.className = 'md-verdict ' + cls;
    verdictEl.textContent = text;
  }
  function classify(total){
    if (total === 0) return ['is-perfect', L.perfect];
    if (total < 5) return ['is-minor', L.minor];
    if (total < 25) return ['is-warn', L.warn];
    return ['is-bad', L.bad];
  }
  function renderStats(){
    totalEl.textContent = total.toFixed(2) + ' px';
    maxEl.textContent = maxDelta.toFixed(2) + ' px';
    samplesEl.textContent = samples;
  }

  function onMove(e){
    if (!running) return;
    // Skip events triggered by scroll/focus — only real pointer position changes
    if (typeof e.clientX !== 'number') return;
    if (lastX === null) { lastX = e.clientX; lastY = e.clientY; return; }
    var dx = e.clientX - lastX, dy = e.clientY - lastY;
    var d = Math.sqrt(dx*dx + dy*dy);
    if (d > 0) {
      total += d;
      if (d > maxDelta) maxDelta = d;
      samples++;
      renderStats();
    }
    lastX = e.clientX; lastY = e.clientY;
  }

  function tick(){
    if (!running) return;
    var now = performance.now();
    var left = Math.max(0, Math.ceil((deadline - now) / 1000));
    timerV.textContent = left;
    if (now >= deadline) {
      stop(true);
      return;
    }
    rafId = requestAnimationFrame(tick);
  }

  function start(){
    var dur = parseInt(durationEl.value, 10) || 30;
    total = 0; maxDelta = 0; samples = 0; lastX = lastY = null;
    renderStats();
    running = true;
    startTs = performance.now();
    deadline = startTs + dur * 1000;
    pad.classList.add('is-running');
    pad.classList.remove('is-done');
    padHint.textContent = L.running;
    startBtn.disabled = true;
    durationEl.disabled = true;
    setVerdict('', L.running);
    timerV.textContent = dur;
    pad.addEventListener('pointermove', onMove);
    rafId = requestAnimationFrame(tick);
  }

  function stop(finished){
    running = false;
    pad.removeEventListener('pointermove', onMove);
    cancelAnimationFrame(rafId);
    pad.classList.remove('is-running');
    pad.classList.add('is-done');
    padHint.textContent = L.done;
    timerV.textContent = 0;
    startBtn.disabled = false;
    durationEl.disabled = false;
    if (finished) {
      var c = classify(total);
      setVerdict(c[0], c[1]);
    } else {
      setVerdict('', L.idle);
    }
  }

  function reset(){
    stop(false);
    total = 0; maxDelta = 0; samples = 0;
    renderStats();
    pad.classList.remove('is-done');
    padHint.textContent = L.padHint;
    timerV.textContent = parseInt(durationEl.value, 10) || 30;
    setVerdict('', L.idle);
  }

  startBtn.addEventListener('click', start);
  resetBtn.addEventListener('click', reset);
  durationEl.addEventListener('change', function(){ if (!running) timerV.textContent = durationEl.value; });
})();
</script>
