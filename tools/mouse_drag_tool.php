<?php
// mouse_drag_tool.php
// Drag-click / flick-drag CPS measurement.
// Detects rapid click bursts caused by dragging a finger across a mouse button.

$mdt_labels = $mdt_labels ?? [];
$L = array_merge([
  'aria_arena'    => 'Click area to perform drag-click test. Drag your finger or press rapidly to register multiple clicks per second.',
  'start'         => 'Start test',
  'reset'         => 'Reset',
  'duration'      => 'Duration',
  'total_clicks'  => 'Total clicks',
  'cps'           => 'CPS',
  'peak_cps'      => 'Peak CPS',
  'burst_peak'    => 'Drag burst peak',
  'time_left'     => 'Time left',
  'best'          => 'Best',
  'click_here'    => 'Click and drag here',
  'instruction'   => 'Press Start. Click or drag your finger across the mouse button as fast as possible.',
  'complete'      => 'Session complete',
], $mdt_labels);
?>
<div class="mdt-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria_arena'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="mdt-controls">
    <div class="mdt-field">
      <label for="mdt-duration"><?php echo htmlspecialchars($L['duration'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="mdt-duration">
        <option value="5">5s</option>
        <option value="10" selected>10s</option>
        <option value="30">30s</option>
      </select>
    </div>
    <button type="button" class="mdt-btn mdt-btn-primary" id="mdt-start"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="mdt-btn mdt-btn-ghost" id="mdt-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="mdt-stats" aria-live="polite">
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['total_clicks'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-total">0</span></div>
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['cps'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-cps">0</span></div>
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['peak_cps'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-peak">0</span></div>
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['burst_peak'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-burst">0</span></div>
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['time_left'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-timer">10s</span></div>
    <div class="mdt-stat"><span class="mdt-label"><?php echo htmlspecialchars($L['best'], ENT_QUOTES, 'UTF-8'); ?></span><span class="mdt-value" id="mdt-best">0</span></div>
  </div>

  <div class="mdt-arena" id="mdt-arena" tabindex="0" role="button">
    <div class="mdt-hint"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="mdt-click-here" id="mdt-click-here"><?php echo htmlspecialchars($L['click_here'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>

  <canvas id="mdt-graph" width="900" height="120" aria-label="Clicks per second over time graph"></canvas>
</div>

<style>
  .mdt-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .mdt-tester * { box-sizing: border-box; }
  .mdt-controls { display: flex; flex-wrap: wrap; gap: 10px; align-items: end; justify-content: center; padding: 10px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .mdt-field { display: flex; flex-direction: column; gap: 4px; font-size: 0.8rem; color: var(--text-muted, #64748b); }
  .mdt-field label { font-weight: 600; letter-spacing: 0.03em; text-transform: uppercase; font-size: 0.68rem; }
  .mdt-field select { padding: 7px 10px; border-radius: 8px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #ffffff); color: var(--text-color, #0f172a); font: inherit; font-size: 0.9rem; cursor: pointer; }
  .mdt-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid transparent; font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: transform 0.12s ease, box-shadow 0.12s ease; }
  .mdt-btn-primary { background: #059669; color: #fff; box-shadow: 0 10px 22px rgba(5,150,105,0.28); }
  .mdt-btn-primary:hover { transform: translateY(-1px); }
  .mdt-btn-ghost { background: var(--surface, #ffffff); color: var(--text-color, #0f172a); border-color: var(--border-color, #cbd5e1); }
  .mdt-btn-ghost:hover { background: var(--border-color, #e2e8f0); }
  .mdt-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .mdt-stats { display: grid; grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 8px; padding: 10px; background: var(--surface, #ffffff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .mdt-stat { display: flex; flex-direction: column; align-items: center; gap: 2px; padding: 8px 4px; }
  .mdt-label { font-size: 0.68rem; color: var(--text-muted, #64748b); font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; text-align: center; }
  .mdt-value { font-size: 1.4rem; font-weight: 800; color: var(--text-color, #0f172a); font-variant-numeric: tabular-nums; }
  @media (max-width: 720px) { .mdt-stats { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
  .mdt-arena { position: relative; width: 100%; min-height: 260px; background: radial-gradient(circle at 30% 30%, rgba(5,150,105,0.1), transparent 60%), radial-gradient(circle at 70% 70%, rgba(14,165,233,0.08), transparent 60%), var(--surface, #0f172a); border: 2px dashed rgba(5,150,105,0.6); border-radius: 16px; cursor: pointer; user-select: none; touch-action: none; -webkit-tap-highlight-color: transparent; display: flex; align-items: center; justify-content: center; text-align: center; padding: 40px 20px; }
  .mdt-arena.mdt-running { border-style: solid; background: radial-gradient(circle at center, rgba(5,150,105,0.2), rgba(15,23,42,0.8)); }
  .mdt-arena:focus { outline: 3px solid rgba(5,150,105,0.5); outline-offset: 3px; }
  .mdt-hint { color: var(--text-color, #0f172a); font-size: 0.95rem; opacity: 0.75; max-width: 560px; }
  .mdt-arena.mdt-running .mdt-hint { display: none; }
  .mdt-click-here { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 1.6rem; font-weight: 800; color: #059669; letter-spacing: 0.03em; text-transform: uppercase; display: none; pointer-events: none; }
  .mdt-arena.mdt-running .mdt-click-here { display: block; animation: mdt-pulse 1s ease-in-out infinite; }
  @keyframes mdt-pulse { 0%, 100% { opacity: 0.7; } 50% { opacity: 1; transform: translate(-50%, -50%) scale(1.05); } }
  .mdt-arena.mdt-flash { background: radial-gradient(circle at center, rgba(5,150,105,0.5), rgba(5,150,105,0.1)); transition: background 0.05s; }
  #mdt-graph { width: 100%; max-width: 900px; height: 120px; background: var(--surface, #0f172a); border: 1px solid var(--border-color, #334155); border-radius: 10px; }
</style>

<script>
(function () {
  'use strict';
  var arena = document.getElementById('mdt-arena');
  if (!arena) return;
  var startBtn = document.getElementById('mdt-start');
  var resetBtn = document.getElementById('mdt-reset');
  var durSel = document.getElementById('mdt-duration');
  var totalEl = document.getElementById('mdt-total');
  var cpsEl = document.getElementById('mdt-cps');
  var peakEl = document.getElementById('mdt-peak');
  var burstEl = document.getElementById('mdt-burst');
  var timerEl = document.getElementById('mdt-timer');
  var bestEl = document.getElementById('mdt-best');
  var canvas = document.getElementById('mdt-graph');
  var ctx = canvas.getContext('2d');

  var state = { running: false, clicks: [], startTs: 0, endTs: 0, peak: 0, burst: 0, timer: null, tickTimer: null };

  function updateStats() {
    totalEl.textContent = state.clicks.length;
    var now = performance.now();
    var elapsedSec = Math.max(0.01, (now - state.startTs) / 1000);
    var cps = Math.round(state.clicks.length / elapsedSec * 10) / 10;
    cpsEl.textContent = cps;
    if (cps > state.peak) state.peak = cps;
    peakEl.textContent = state.peak.toFixed(1);
    // Burst: count clicks in last 200ms window, multiplied to per-second rate
    var cutoff = now - 200;
    var recent = 0;
    for (var i = state.clicks.length - 1; i >= 0 && state.clicks[i] > cutoff; i--) recent++;
    var burstCps = recent * 5;
    if (burstCps > state.burst) state.burst = burstCps;
    burstEl.textContent = state.burst;
  }

  function drawGraph() {
    var w = canvas.width, h = canvas.height;
    ctx.fillStyle = '#0f172a';
    ctx.fillRect(0, 0, w, h);
    if (!state.clicks.length) return;
    var dur = parseInt(durSel.value, 10) * 1000;
    var buckets = new Array(60).fill(0);
    var start = state.startTs;
    state.clicks.forEach(function (ts) {
      var idx = Math.min(59, Math.floor((ts - start) / dur * 60));
      buckets[idx]++;
    });
    var max = Math.max.apply(null, buckets) || 1;
    var bw = w / 60;
    ctx.fillStyle = '#059669';
    for (var i = 0; i < 60; i++) {
      var bh = (buckets[i] / max) * (h - 10);
      ctx.fillRect(i * bw + 1, h - bh - 2, bw - 2, bh);
    }
  }

  function registerClick() {
    if (!state.running) return;
    var now = performance.now();
    if (now > state.endTs) { stop(); return; }
    state.clicks.push(now);
    arena.classList.add('mdt-flash');
    setTimeout(function () { arena.classList.remove('mdt-flash'); }, 45);
    updateStats();
  }

  function tick() {
    var remain = Math.max(0, Math.round((state.endTs - performance.now()) / 1000));
    timerEl.textContent = remain + 's';
    drawGraph();
    if (remain <= 0) stop();
  }

  function start() {
    reset();
    state.running = true;
    state.startTs = performance.now();
    var dur = parseInt(durSel.value, 10);
    state.endTs = state.startTs + dur * 1000;
    arena.classList.add('mdt-running');
    startBtn.disabled = true;
    timerEl.textContent = dur + 's';
    state.tickTimer = setInterval(tick, 100);
    arena.focus();
  }

  function stop() {
    state.running = false;
    arena.classList.remove('mdt-running');
    clearInterval(state.tickTimer);
    startBtn.disabled = false;
    var total = state.clicks.length;
    var dur = (state.endTs - state.startTs) / 1000;
    var finalCps = Math.round(total / dur * 10) / 10;
    var score = Math.max(finalCps, state.burst);
    var best = 0;
    try { best = parseFloat(localStorage.getItem('mdt_best') || '0'); } catch (e) {}
    if (score > best) {
      try { localStorage.setItem('mdt_best', String(score)); } catch (e) {}
      best = score;
    }
    bestEl.textContent = best;
    drawGraph();
  }

  function reset() {
    state.running = false;
    clearInterval(state.tickTimer);
    state.clicks = [];
    state.peak = 0;
    state.burst = 0;
    state.startTs = 0;
    state.endTs = 0;
    arena.classList.remove('mdt-running');
    startBtn.disabled = false;
    totalEl.textContent = '0';
    cpsEl.textContent = '0';
    peakEl.textContent = '0';
    burstEl.textContent = '0';
    timerEl.textContent = durSel.value + 's';
    ctx.fillStyle = '#0f172a';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
  }

  arena.addEventListener('pointerdown', function (e) { registerClick(); });
  arena.addEventListener('contextmenu', function (e) { if (state.running) e.preventDefault(); });
  startBtn.addEventListener('click', start);
  resetBtn.addEventListener('click', reset);
  durSel.addEventListener('change', function () { if (!state.running) timerEl.textContent = durSel.value + 's'; });

  try { bestEl.textContent = localStorage.getItem('mdt_best') || '0'; } catch (e) {}
  ctx.fillStyle = '#0f172a';
  ctx.fillRect(0, 0, canvas.width, canvas.height);
})();
</script>
