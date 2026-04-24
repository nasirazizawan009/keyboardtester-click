<?php
// mouse_accuracy_tool.php
// Aim-trainer: spawn targets at random positions, track hit %, avg pixel error, avg reaction time.
// Accepts optional $maa_labels array for localization. Defaults to English.

$maa_labels = $maa_labels ?? [];
$L = array_merge([
  'aria_arena'      => 'Click targets as they appear to measure your aim accuracy.',
  'start'           => 'Start test',
  'stop'            => 'Stop',
  'reset'           => 'Reset',
  'fullscreen'      => 'Fullscreen',
  'duration'        => 'Duration',
  'target_size'     => 'Target size',
  'size_small'      => 'Small',
  'size_medium'     => 'Medium',
  'size_large'      => 'Large',
  'hits'            => 'Hits',
  'misses'          => 'Misses',
  'accuracy'        => 'Accuracy',
  'avg_error'       => 'Avg error',
  'avg_time'        => 'Avg time',
  'best'            => 'Best',
  'score'           => 'Score',
  'instruction'     => 'Press Start. Click every target as fast and as precisely as you can.',
  'time_left'       => 'Time left',
  'complete'        => 'Session complete',
], $maa_labels);
?>
<div class="maa-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria_arena'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="maa-controls">
    <div class="maa-field">
      <label for="maa-duration"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="maa-duration">
        <option value="30">30s</option>
        <option value="60" selected>60s</option>
        <option value="120">120s</option>
      </select>
    </div>
    <div class="maa-field">
      <label for="maa-size"><?php echo htmlspecialchars($L['target_size'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="maa-size">
        <option value="24"><?php echo htmlspecialchars($L['size_small'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="40" selected><?php echo htmlspecialchars($L['size_medium'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="60"><?php echo htmlspecialchars($L['size_large'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <button type="button" class="maa-btn maa-btn-primary" id="maa-start"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="maa-btn maa-btn-ghost"   id="maa-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="maa-btn maa-btn-ghost"   id="maa-fullscreen" aria-label="<?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="maa-stats" aria-live="polite">
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['hits'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-hits">0</span></div>
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['misses'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-misses">0</span></div>
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['accuracy'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-acc">0%</span></div>
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['avg_error'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-err">0px</span></div>
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['avg_time'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-rt">0ms</span></div>
    <div class="maa-stat"><span class="maa-stat-label"><?php echo htmlspecialchars($L['time_left'], ENT_QUOTES, 'UTF-8'); ?></span><span class="maa-stat-value" id="maa-timer">60s</span></div>
  </div>

  <div class="maa-arena" id="maa-arena" tabindex="0">
    <div class="maa-instructions" id="maa-instructions"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="maa-complete" id="maa-complete" hidden>
      <div class="maa-complete-title"><?php echo htmlspecialchars($L['complete'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="maa-complete-score"><span class="maa-score-label"><?php echo htmlspecialchars($L['score'], ENT_QUOTES, 'UTF-8'); ?></span><span id="maa-score">0</span></div>
      <div class="maa-complete-best"><?php echo htmlspecialchars($L['best'], ENT_QUOTES, 'UTF-8'); ?>: <span id="maa-best">0</span></div>
    </div>
  </div>
</div>

<style>
  .maa-tester { display: flex; flex-direction: column; gap: 16px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .maa-tester * { box-sizing: border-box; }
  .maa-controls { display: flex; flex-wrap: wrap; gap: 10px; align-items: end; justify-content: center; padding: 10px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .maa-field { display: flex; flex-direction: column; gap: 4px; font-size: 0.8rem; color: var(--text-muted, #64748b); }
  .maa-field label { font-weight: 600; letter-spacing: 0.03em; text-transform: uppercase; font-size: 0.68rem; }
  .maa-field select { padding: 7px 10px; border-radius: 8px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #ffffff); color: var(--text-color, #0f172a); font: inherit; font-size: 0.9rem; cursor: pointer; }
  .maa-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid transparent; font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: transform 0.12s ease, box-shadow 0.12s ease; }
  .maa-btn-primary { background: #059669; color: #fff; box-shadow: 0 10px 22px rgba(5,150,105,0.28); }
  .maa-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 14px 30px rgba(5,150,105,0.35); }
  .maa-btn-ghost { background: var(--surface, #ffffff); color: var(--text-color, #0f172a); border-color: var(--border-color, #cbd5e1); }
  .maa-btn-ghost:hover { background: var(--border-color, #e2e8f0); }
  .maa-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .maa-stats { display: grid; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 8px; padding: 10px; background: var(--surface, #ffffff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .maa-stat { display: flex; flex-direction: column; align-items: center; gap: 2px; padding: 8px 4px; }
  .maa-stat-label { font-size: 0.68rem; color: var(--text-muted, #64748b); font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; }
  .maa-stat-value { font-size: 1.3rem; font-weight: 800; color: var(--text-color, #0f172a); font-variant-numeric: tabular-nums; }
  @media (max-width: 720px) { .maa-stats { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
  .maa-arena { position: relative; width: 100%; aspect-ratio: 16 / 9; min-height: 360px; max-height: 70vh; background: radial-gradient(circle at 30% 30%, rgba(5,150,105,0.08), transparent 60%), radial-gradient(circle at 70% 70%, rgba(14,165,233,0.08), transparent 60%), var(--surface, #0f172a); border: 2px dashed rgba(5,150,105,0.5); border-radius: 16px; overflow: hidden; cursor: crosshair; user-select: none; touch-action: manipulation; -webkit-tap-highlight-color: transparent; }
  .maa-arena:focus { outline: 3px solid rgba(5,150,105,0.5); outline-offset: 3px; }
  .maa-arena.maa-running { cursor: crosshair; border-style: solid; }
  .maa-arena:fullscreen { background: #0f172a; }
  .maa-arena:fullscreen .maa-target { box-shadow: 0 0 30px rgba(5,150,105,0.6); }
  .maa-target { position: absolute; border-radius: 50%; background: radial-gradient(circle at 35% 35%, #34d399, #059669 55%, #064e3b 100%); box-shadow: 0 4px 14px rgba(0,0,0,0.35), 0 0 0 2px rgba(255,255,255,0.15) inset; cursor: crosshair; animation: maa-spawn 0.2s ease-out both; }
  @keyframes maa-spawn { from { transform: scale(0.2); opacity: 0; } to { transform: scale(1); opacity: 1; } }
  .maa-target.maa-hit { animation: maa-hit 0.28s ease-out forwards; pointer-events: none; }
  @keyframes maa-hit { to { transform: scale(2.4); opacity: 0; } }
  .maa-miss-ring { position: absolute; border: 2px solid rgba(239,68,68,0.9); border-radius: 50%; animation: maa-miss 0.4s ease-out forwards; pointer-events: none; }
  @keyframes maa-miss { from { transform: scale(0); opacity: 1; } to { transform: scale(1.6); opacity: 0; } }
  .maa-instructions, .maa-complete { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: var(--text-color, #0f172a); padding: 18px 24px; font-size: 1rem; pointer-events: none; max-width: 92%; }
  .maa-arena.maa-running .maa-instructions { display: none; }
  .maa-complete { background: rgba(255,255,255,0.95); border-radius: 14px; border: 1px solid var(--border-color, #e2e8f0); box-shadow: 0 20px 40px rgba(0,0,0,0.2); pointer-events: auto; }
  .maa-complete-title { font-weight: 800; font-size: 1.15rem; margin-bottom: 8px; }
  .maa-complete-score { font-size: 2.6rem; font-weight: 900; color: #059669; font-variant-numeric: tabular-nums; }
  .maa-score-label { display: block; font-size: 0.72rem; font-weight: 700; letter-spacing: 0.08em; color: var(--text-muted, #64748b); text-transform: uppercase; margin-bottom: 2px; }
  .maa-complete-best { font-size: 0.88rem; color: var(--text-muted, #64748b); margin-top: 6px; }
  [data-theme="dark"] .maa-complete, html.dark-theme .maa-complete { background: rgba(15,23,42,0.96); color: #f1f5f9; }
  @media (prefers-reduced-motion: reduce) { .maa-target, .maa-target.maa-hit, .maa-miss-ring { animation: none; } }
</style>

<script>
(function () {
  'use strict';
  var arena = document.getElementById('maa-arena');
  if (!arena) return;

  var startBtn = document.getElementById('maa-start');
  var resetBtn = document.getElementById('maa-reset');
  var fsBtn = document.getElementById('maa-fullscreen');
  var durSel = document.getElementById('maa-duration');
  var sizeSel = document.getElementById('maa-size');
  var instr = document.getElementById('maa-instructions');
  var completeCard = document.getElementById('maa-complete');
  var hitsEl = document.getElementById('maa-hits');
  var missesEl = document.getElementById('maa-misses');
  var accEl = document.getElementById('maa-acc');
  var errEl = document.getElementById('maa-err');
  var rtEl = document.getElementById('maa-rt');
  var timerEl = document.getElementById('maa-timer');
  var scoreEl = document.getElementById('maa-score');
  var bestEl = document.getElementById('maa-best');

  var state = { running: false, target: null, spawnTs: 0, hits: 0, misses: 0, totalErr: 0, totalRT: 0, endTs: 0, timer: null };

  function rand(a, b) { return a + Math.random() * (b - a); }

  function updateStats() {
    hitsEl.textContent = state.hits;
    missesEl.textContent = state.misses;
    var total = state.hits + state.misses;
    accEl.textContent = total ? Math.round(state.hits / total * 100) + '%' : '0%';
    errEl.textContent = state.hits ? Math.round(state.totalErr / state.hits) + 'px' : '0px';
    rtEl.textContent = state.hits ? Math.round(state.totalRT / state.hits) + 'ms' : '0ms';
  }

  function spawnTarget() {
    if (state.target) state.target.remove();
    var size = parseInt(sizeSel.value, 10);
    var rect = arena.getBoundingClientRect();
    var pad = size / 2 + 10;
    var prev = state.lastPos;
    var x, y, attempts = 0;
    do {
      x = rand(pad, rect.width - pad);
      y = rand(pad, rect.height - pad);
      attempts++;
    } while (prev && Math.hypot(x - prev.x, y - prev.y) < 80 && attempts < 12);
    state.lastPos = { x: x, y: y };
    var dot = document.createElement('div');
    dot.className = 'maa-target';
    dot.style.width = size + 'px';
    dot.style.height = size + 'px';
    dot.style.left = (x - size / 2) + 'px';
    dot.style.top = (y - size / 2) + 'px';
    dot.dataset.cx = x;
    dot.dataset.cy = y;
    arena.appendChild(dot);
    state.target = dot;
    state.spawnTs = performance.now();
  }

  function onClick(e) {
    if (!state.running) return;
    var rect = arena.getBoundingClientRect();
    var cx = (e.clientX != null ? e.clientX : (e.touches && e.touches[0] ? e.touches[0].clientX : 0)) - rect.left;
    var cy = (e.clientY != null ? e.clientY : (e.touches && e.touches[0] ? e.touches[0].clientY : 0)) - rect.top;
    if (!state.target) return;
    var tx = parseFloat(state.target.dataset.cx);
    var ty = parseFloat(state.target.dataset.cy);
    var dist = Math.hypot(cx - tx, cy - ty);
    var tsize = parseInt(sizeSel.value, 10);
    if (dist <= tsize / 2 + 4) {
      state.hits++;
      state.totalErr += dist;
      state.totalRT += performance.now() - state.spawnTs;
      state.target.classList.add('maa-hit');
      setTimeout(function (t) { return function () { t && t.remove(); }; }(state.target), 300);
      state.target = null;
      updateStats();
      spawnTarget();
    } else {
      state.misses++;
      var ring = document.createElement('div');
      ring.className = 'maa-miss-ring';
      var rsize = 40;
      ring.style.width = rsize + 'px';
      ring.style.height = rsize + 'px';
      ring.style.left = (cx - rsize / 2) + 'px';
      ring.style.top = (cy - rsize / 2) + 'px';
      arena.appendChild(ring);
      setTimeout(function () { ring.remove(); }, 400);
      updateStats();
    }
  }

  function tick() {
    var remain = Math.max(0, Math.round((state.endTs - performance.now()) / 1000));
    timerEl.textContent = remain + 's';
    if (remain <= 0) stop();
  }

  function start() {
    if (state.running) return;
    reset(false);
    state.running = true;
    arena.classList.add('maa-running');
    startBtn.disabled = true;
    var dur = parseInt(durSel.value, 10);
    state.endTs = performance.now() + dur * 1000;
    timerEl.textContent = dur + 's';
    state.timer = setInterval(tick, 200);
    completeCard.hidden = true;
    spawnTarget();
    arena.focus();
  }

  function stop() {
    state.running = false;
    arena.classList.remove('maa-running');
    clearInterval(state.timer);
    if (state.target) { state.target.remove(); state.target = null; }
    startBtn.disabled = false;
    var total = state.hits + state.misses;
    var acc = total ? state.hits / total : 0;
    var score = Math.round(state.hits * acc * 100);
    scoreEl.textContent = score;
    var best = 0;
    try { best = parseInt(localStorage.getItem('maa_best') || '0', 10); } catch (e) {}
    if (score > best) {
      best = score;
      try { localStorage.setItem('maa_best', String(best)); } catch (e) {}
    }
    bestEl.textContent = best;
    completeCard.hidden = false;
  }

  function reset(resetBest) {
    state.running = false;
    clearInterval(state.timer);
    if (state.target) { state.target.remove(); state.target = null; }
    arena.querySelectorAll('.maa-target, .maa-miss-ring').forEach(function (n) { n.remove(); });
    state.hits = 0; state.misses = 0; state.totalErr = 0; state.totalRT = 0; state.lastPos = null;
    arena.classList.remove('maa-running');
    completeCard.hidden = true;
    startBtn.disabled = false;
    timerEl.textContent = durSel.value + 's';
    updateStats();
    if (resetBest === true) {
      try { localStorage.removeItem('maa_best'); } catch (e) {}
      bestEl.textContent = '0';
    } else {
      try { bestEl.textContent = localStorage.getItem('maa_best') || '0'; } catch (e) { bestEl.textContent = '0'; }
    }
  }

  arena.addEventListener('pointerdown', onClick);
  arena.addEventListener('contextmenu', function (e) { if (state.running) e.preventDefault(); });
  startBtn.addEventListener('click', start);
  resetBtn.addEventListener('click', function () { reset(false); });
  fsBtn.addEventListener('click', function () {
    if (document.fullscreenElement) { document.exitFullscreen().catch(function () {}); }
    else if (arena.requestFullscreen) { arena.requestFullscreen().catch(function () {}); }
  });
  durSel.addEventListener('change', function () { if (!state.running) timerEl.textContent = durSel.value + 's'; });

  try { bestEl.textContent = localStorage.getItem('maa_best') || '0'; } catch (e) {}
  updateStats();
})();
</script>
