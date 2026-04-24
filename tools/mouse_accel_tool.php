<?php
$ma_labels = $ma_labels ?? [];
$L = array_merge([
  'aria' => 'Mouse acceleration test - detects non-linear sensor or OS acceleration',
  'instruction' => 'Capture two swipes of the SAME physical distance: one slow (about 2 seconds) and one fast (under 0.5 seconds). A sensor without acceleration will report the same pixel distance for both. Ratios above 1.05 mean acceleration is being applied.',
  'step_slow' => 'Slow swipe',
  'step_fast' => 'Fast swipe',
  'hint_slow' => 'Step 1: Press and hold, drag slowly across the pad (about 2 seconds).',
  'hint_fast' => 'Step 2: Press and hold, drag the SAME physical distance fast (under 0.5s).',
  'pixels' => 'Pixels',
  'duration' => 'Duration',
  'speed' => 'Speed (px/s)',
  'ratio' => 'Fast / slow pixel ratio',
  'verdict' => 'Verdict',
  'verdict_idle' => 'Drag slowly first, then drag fast.',
  'verdict_slow_done' => 'Slow swipe recorded. Now drag fast across the same physical distance.',
  'verdict_perfect' => 'No acceleration detected — ratio is within 5% of 1.00 (perfect).',
  'verdict_minor' => 'Slight difference — probably measurement noise, not real acceleration.',
  'verdict_accel' => 'Acceleration is active! Fast swipe gained pixels. Turn off Enhance pointer precision on Windows.',
  'verdict_decel' => 'Deceleration detected — unusual, check sensor smoothing in the mouse driver.',
  'reset' => 'Reset',
  'reference' => 'Tip: Windows "Enhance pointer precision" is the most common source of acceleration. Turn it off in Control Panel > Mouse > Pointer Options. Some gaming mice also have firmware acceleration on high polling rates — check the driver app.',
], $ma_labels);
?>
<div class="ma-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ma-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="ma-pad-wrap">
    <div id="ma-pad" class="ma-pad">
      <div class="ma-pad-hint" id="ma-pad-hint"><?php echo htmlspecialchars($L['hint_slow'], ENT_QUOTES, 'UTF-8'); ?></div>
    </div>
  </div>

  <div class="ma-runs">
    <div class="ma-run" id="ma-run-slow">
      <div class="ma-run-head"><span class="ma-run-dot"></span><?php echo htmlspecialchars($L['step_slow'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="ma-run-stats">
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['pixels'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-slow-px">-</span></div>
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-slow-dur">-</span></div>
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['speed'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-slow-speed">-</span></div>
      </div>
    </div>
    <div class="ma-run" id="ma-run-fast">
      <div class="ma-run-head"><span class="ma-run-dot"></span><?php echo htmlspecialchars($L['step_fast'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="ma-run-stats">
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['pixels'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-fast-px">-</span></div>
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-fast-dur">-</span></div>
        <div><span class="ma-stat-label"><?php echo htmlspecialchars($L['speed'], ENT_QUOTES, 'UTF-8'); ?></span><span class="ma-stat-val" id="ma-fast-speed">-</span></div>
      </div>
    </div>
  </div>

  <div class="ma-result">
    <div class="ma-result-label"><?php echo htmlspecialchars($L['ratio'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="ma-result-value" id="ma-ratio">-</div>
    <div class="ma-verdict" id="ma-verdict"><?php echo htmlspecialchars($L['verdict_idle'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>

  <div class="ma-actions">
    <button type="button" id="ma-reset" class="ma-btn-ghost"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="ma-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ma-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ma-tester *{ box-sizing:border-box; }
  .ma-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ma-pad { position:relative; height:220px; background:linear-gradient(135deg,#1e293b 0%,#334155 100%); border-radius:12px; cursor:crosshair; color:#cbd5e1; display:flex; align-items:center; justify-content:center; user-select:none; touch-action:none; overflow:hidden; }
  .ma-pad.is-slow-capturing { background:linear-gradient(135deg,#0ea5e9 0%,#38bdf8 100%); color:#fff; }
  .ma-pad.is-fast-capturing { background:linear-gradient(135deg,#f97316 0%,#fb923c 100%); color:#fff; }
  .ma-pad.is-done { background:linear-gradient(135deg,#16a34a 0%,#22c55e 100%); color:#fff; }
  .ma-pad-hint { padding:0 24px; text-align:center; font-size:0.95rem; max-width:560px; }
  .ma-runs { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
  @media (max-width:720px) { .ma-runs { grid-template-columns:1fr; } .ma-pad { height:200px; } }
  .ma-run { padding:14px 16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .ma-run-head { display:flex; align-items:center; gap:10px; font-size:0.82rem; font-weight:700; text-transform:uppercase; letter-spacing:0.08em; color:#64748b; margin-bottom:10px; }
  .ma-run-dot { width:8px; height:8px; border-radius:999px; background:#cbd5e1; }
  #ma-run-slow.is-recorded .ma-run-dot { background:#0ea5e9; }
  #ma-run-fast.is-recorded .ma-run-dot { background:#f97316; }
  .ma-run-stats { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; }
  .ma-run-stats > div { display:flex; flex-direction:column; gap:2px; }
  .ma-stat-label { font-size:0.72rem; color:#94a3b8; text-transform:uppercase; letter-spacing:0.05em; }
  .ma-stat-val { font-size:1rem; font-weight:700; font-variant-numeric:tabular-nums; color:#0f172a; }
  .ma-result { padding:22px 20px; background:var(--surface,#0f172a); color:#fff; border-radius:12px; text-align:center; }
  .ma-result-label { font-size:0.82rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; }
  .ma-result-value { font-size:3rem; font-weight:800; color:#22c55e; font-variant-numeric:tabular-nums; line-height:1.1; margin-top:4px; }
  .ma-verdict { margin-top:12px; font-size:0.95rem; color:#cbd5e1; padding:10px 14px; border-radius:8px; background:rgba(255,255,255,0.05); }
  .ma-verdict.is-perfect { background:rgba(34,197,94,0.16); color:#86efac; }
  .ma-verdict.is-minor { background:rgba(250,204,21,0.16); color:#fde68a; }
  .ma-verdict.is-accel { background:rgba(239,68,68,0.16); color:#fca5a5; }
  .ma-verdict.is-decel { background:rgba(234,88,12,0.16); color:#fdba74; }
  .ma-actions { display:flex; justify-content:flex-end; }
  .ma-btn-ghost { padding:8px 16px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); border-radius:8px; font:inherit; cursor:pointer; }
  .ma-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var pad = document.getElementById('ma-pad');
  var padHint = document.getElementById('ma-pad-hint');
  var runSlow = document.getElementById('ma-run-slow'), runFast = document.getElementById('ma-run-fast');
  var ratioEl = document.getElementById('ma-ratio'), verdictEl = document.getElementById('ma-verdict');
  var L = {
    hintSlow: <?php echo json_encode($L['hint_slow']); ?>,
    hintFast: <?php echo json_encode($L['hint_fast']); ?>,
    idle: <?php echo json_encode($L['verdict_idle']); ?>,
    slowDone: <?php echo json_encode($L['verdict_slow_done']); ?>,
    perfect: <?php echo json_encode($L['verdict_perfect']); ?>,
    minor: <?php echo json_encode($L['verdict_minor']); ?>,
    accel: <?php echo json_encode($L['verdict_accel']); ?>,
    decel: <?php echo json_encode($L['verdict_decel']); ?>,
  };
  var state = 'slow'; // slow -> fast -> done
  var tracking = false, startTs = 0, totalPx = 0, lastX = 0, lastY = 0;
  var slow = null, fast = null;

  function setVerdict(cls, text){ verdictEl.className = 'ma-verdict ' + cls; verdictEl.textContent = text; }
  function fmtPx(v){ return Math.round(v).toLocaleString() + ' px'; }
  function fmtDur(ms){ return (ms/1000).toFixed(2) + ' s'; }
  function fmtSpeed(px, ms){ return Math.round(px / (ms/1000)).toLocaleString() + ' px/s'; }

  pad.addEventListener('pointerdown', function(e){
    if (state === 'done') return;
    pad.setPointerCapture(e.pointerId);
    tracking = true; totalPx = 0;
    startTs = performance.now();
    lastX = e.clientX; lastY = e.clientY;
    pad.classList.add(state === 'slow' ? 'is-slow-capturing' : 'is-fast-capturing');
  });
  pad.addEventListener('pointermove', function(e){
    if (!tracking) return;
    var dx = e.clientX - lastX, dy = e.clientY - lastY;
    totalPx += Math.sqrt(dx*dx + dy*dy);
    lastX = e.clientX; lastY = e.clientY;
  });
  function endDrag(e){
    if (!tracking) return;
    tracking = false;
    pad.classList.remove('is-slow-capturing', 'is-fast-capturing');
    var dur = performance.now() - startTs;
    if (totalPx < 30 || dur < 60) return; // ignore accidental taps
    if (state === 'slow') {
      slow = { px: totalPx, dur: dur };
      document.getElementById('ma-slow-px').textContent = fmtPx(slow.px);
      document.getElementById('ma-slow-dur').textContent = fmtDur(slow.dur);
      document.getElementById('ma-slow-speed').textContent = fmtSpeed(slow.px, slow.dur);
      runSlow.classList.add('is-recorded');
      state = 'fast';
      padHint.textContent = L.hintFast;
      setVerdict('', L.slowDone);
    } else if (state === 'fast') {
      fast = { px: totalPx, dur: dur };
      document.getElementById('ma-fast-px').textContent = fmtPx(fast.px);
      document.getElementById('ma-fast-dur').textContent = fmtDur(fast.dur);
      document.getElementById('ma-fast-speed').textContent = fmtSpeed(fast.px, fast.dur);
      runFast.classList.add('is-recorded');
      state = 'done';
      pad.classList.add('is-done');
      computeRatio();
    }
  }
  pad.addEventListener('pointerup', endDrag);
  pad.addEventListener('lostpointercapture', endDrag);
  pad.addEventListener('pointercancel', endDrag);

  function computeRatio(){
    if (!slow || !fast || slow.px <= 0) return;
    var ratio = fast.px / slow.px;
    ratioEl.textContent = ratio.toFixed(3);
    if (ratio >= 0.95 && ratio <= 1.05) setVerdict('is-perfect', L.perfect);
    else if (ratio > 1.05 && ratio < 1.15) setVerdict('is-minor', L.minor);
    else if (ratio >= 1.15) setVerdict('is-accel', L.accel);
    else setVerdict('is-decel', L.decel);
  }

  document.getElementById('ma-reset').addEventListener('click', function(){
    state = 'slow'; slow = null; fast = null; totalPx = 0;
    ratioEl.textContent = '-';
    ['ma-slow-px','ma-slow-dur','ma-slow-speed','ma-fast-px','ma-fast-dur','ma-fast-speed'].forEach(function(id){ document.getElementById(id).textContent = '-'; });
    runSlow.classList.remove('is-recorded'); runFast.classList.remove('is-recorded');
    pad.classList.remove('is-slow-capturing','is-fast-capturing','is-done');
    padHint.textContent = L.hintSlow;
    setVerdict('', L.idle);
  });
})();
</script>
