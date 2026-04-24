<?php
$apm_labels = $apm_labels ?? [];
$L = array_merge([
  'aria' => 'APM test - actions per minute counter',
  'instruction' => 'Click Start, then focus the pad and perform your RTS / MOBA actions normally — clicks, hotkeys, mouse drags. Every keystroke and mouse click counts as one action.',
  'start' => 'Start',
  'stop' => 'Stop',
  'reset' => 'Reset',
  'current_apm' => 'Current APM',
  'peak_apm' => 'Peak APM',
  'avg_apm' => 'Session average',
  'total_actions' => 'Total actions',
  'elapsed' => 'Time elapsed',
  'clicks' => 'Clicks',
  'keys' => 'Key presses',
  'pad_hint' => 'Click here to focus the pad and perform actions.',
  'reference' => 'Tip: casual RTS players hit 40-80 APM. StarCraft Silver ~100, Platinum ~200, Master ~300+, pros ~300-450 sustained, peaks can hit 800+. MOBA APM is usually lower (80-150) because of less micro.',
], $apm_labels);
?>
<div class="apm-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="apm-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div id="apm-pad" class="apm-pad" tabindex="0">
    <div class="apm-pad-current">
      <div class="apm-current-value" id="apm-current">0</div>
      <div class="apm-current-label">APM</div>
    </div>
    <div class="apm-pad-hint"><?php echo htmlspecialchars($L['pad_hint'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>

  <div class="apm-actions">
    <button type="button" id="apm-start" class="apm-btn apm-btn-primary"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="apm-stop" class="apm-btn" disabled><?php echo htmlspecialchars($L['stop'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="apm-reset" class="apm-btn"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="apm-stats">
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['peak_apm'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-peak">0</div></div>
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['avg_apm'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-avg">0</div></div>
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['total_actions'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-total">0</div></div>
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['elapsed'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-elapsed">0s</div></div>
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['clicks'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-clicks">0</div></div>
    <div class="apm-stat"><div class="apm-stat-label"><?php echo htmlspecialchars($L['keys'], ENT_QUOTES, 'UTF-8'); ?></div><div class="apm-stat-value" id="apm-keys">0</div></div>
  </div>

  <div class="apm-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .apm-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .apm-tester *{ box-sizing:border-box; }
  .apm-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .apm-pad { position:relative; min-height:280px; background:linear-gradient(135deg,#1e293b 0%,#334155 100%); border-radius:12px; color:#cbd5e1; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:30px 24px; cursor:pointer; user-select:none; outline:none; transition:background 0.2s; }
  .apm-pad:focus { box-shadow:0 0 0 3px rgba(34,197,94,0.35); }
  .apm-pad.is-running { background:linear-gradient(135deg,#16a34a 0%,#22c55e 100%); color:#fff; }
  .apm-pad.is-running:focus { box-shadow:0 0 0 3px rgba(255,255,255,0.4); }
  .apm-pad-current { text-align:center; }
  .apm-current-value { font-size:6rem; font-weight:900; color:#22c55e; font-variant-numeric:tabular-nums; line-height:1; }
  .apm-pad.is-running .apm-current-value { color:#fff; }
  .apm-current-label { font-size:0.9rem; text-transform:uppercase; letter-spacing:0.2em; color:#94a3b8; margin-top:6px; }
  .apm-pad.is-running .apm-current-label { color:rgba(255,255,255,0.85); }
  .apm-pad-hint { position:absolute; bottom:16px; font-size:0.82rem; opacity:0.8; }
  .apm-actions { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; }
  .apm-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .apm-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .apm-btn-primary:hover { background:#16a34a; color:#fff; }
  .apm-btn:disabled { opacity:0.5; cursor:not-allowed; }
  .apm-stats { display:grid; grid-template-columns:repeat(6,1fr); gap:10px; }
  @media (max-width:900px) { .apm-stats { grid-template-columns:repeat(3,1fr); } }
  @media (max-width:520px) { .apm-stats { grid-template-columns:repeat(2,1fr); } }
  .apm-stat { padding:14px 12px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:10px; text-align:center; }
  .apm-stat-label { font-size:0.74rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:4px; }
  .apm-stat-value { font-size:1.3rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .apm-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var pad = document.getElementById('apm-pad');
  var curEl = document.getElementById('apm-current'), peakEl = document.getElementById('apm-peak'), avgEl = document.getElementById('apm-avg');
  var totalEl = document.getElementById('apm-total'), elapsedEl = document.getElementById('apm-elapsed');
  var clicksEl = document.getElementById('apm-clicks'), keysEl = document.getElementById('apm-keys');
  var startBtn = document.getElementById('apm-start'), stopBtn = document.getElementById('apm-stop'), resetBtn = document.getElementById('apm-reset');

  var running = false;
  var startTs = 0;
  var actions = []; // timestamps
  var clicks = 0, keys = 0, peak = 0;
  var tickInt = 0;

  function currentApm(){
    // rolling 60s window
    var now = performance.now();
    var cutoff = now - 60000;
    while (actions.length && actions[0] < cutoff) actions.shift();
    return actions.length; // actions in last 60s == APM
  }
  function render(){
    var apm = currentApm();
    curEl.textContent = apm;
    if (apm > peak) peak = apm;
    peakEl.textContent = peak;
    var elapsedMs = performance.now() - startTs;
    var elapsedMin = elapsedMs / 60000;
    var avg = elapsedMin > 0 ? Math.round((clicks + keys) / elapsedMin) : 0;
    avgEl.textContent = avg;
    totalEl.textContent = (clicks + keys);
    elapsedEl.textContent = Math.round(elapsedMs / 1000) + 's';
    clicksEl.textContent = clicks;
    keysEl.textContent = keys;
  }

  function recordAction(){
    if (!running) return;
    actions.push(performance.now());
    render();
  }
  function onClick(e){ if (!running) return; clicks++; recordAction(); }
  function onKey(e){
    if (!running) return;
    if (document.activeElement !== pad && e.target !== pad) return;
    keys++; recordAction();
  }

  function start(){
    if (running) return;
    running = true;
    actions = []; clicks = 0; keys = 0; peak = 0;
    startTs = performance.now();
    startBtn.disabled = true;
    stopBtn.disabled = false;
    pad.classList.add('is-running');
    pad.focus();
    tickInt = setInterval(render, 200);
    render();
  }
  function stop(){
    running = false;
    startBtn.disabled = false;
    stopBtn.disabled = true;
    pad.classList.remove('is-running');
    clearInterval(tickInt);
    render();
  }
  function reset(){
    stop();
    actions = []; clicks = 0; keys = 0; peak = 0;
    curEl.textContent = peakEl.textContent = avgEl.textContent = totalEl.textContent = '0';
    clicksEl.textContent = keysEl.textContent = '0';
    elapsedEl.textContent = '0s';
  }

  pad.addEventListener('mousedown', onClick);
  pad.addEventListener('keydown', function(e){
    // don't count modifier-only keys
    if (['Shift','Control','Alt','Meta','Tab'].indexOf(e.key) !== -1) return;
    onKey(e);
  });
  startBtn.addEventListener('click', start);
  stopBtn.addEventListener('click', stop);
  resetBtn.addEventListener('click', reset);
})();
</script>
