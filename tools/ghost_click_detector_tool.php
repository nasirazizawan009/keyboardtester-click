<?php
// Ghost Click Detector tool (standalone)
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Click test area</h3>
      <p>Click in the area below. Very fast double clicks under 300 ms are flagged as possible ghost clicks.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="Click test area">
        Click here to begin
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">Start</button>
        <button class="kbt-tool-button" id="ghost-reset">Reset</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Results</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Total clicks</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>Fast clicks</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>Avg interval</span><strong id="ghost-avg">-- ms</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">Press Start and click inside the test area.</div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const area = document.getElementById('ghost-click-area');
  const startBtn = document.getElementById('ghost-start');
  const resetBtn = document.getElementById('ghost-reset');
  const totalEl = document.getElementById('ghost-total');
  const fastEl = document.getElementById('ghost-fast');
  const avgEl = document.getElementById('ghost-avg');
  const logEl = document.getElementById('ghost-log');

  if (!area || !startBtn || !resetBtn) return;

  const threshold = 300;
  let active = false;
  let total = 0;
  let fast = 0;
  let lastTime = 0;
  let intervals = [];

  function updateStats() {
    totalEl.textContent = total;
    fastEl.textContent = fast;
    if (intervals.length) {
      const avg = intervals.reduce((a, b) => a + b, 0) / intervals.length;
      avgEl.textContent = `${avg.toFixed(1)} ms`;
    } else {
      avgEl.textContent = '-- ms';
    }
  }

  function addLog(message) {
    const item = document.createElement('div');
    item.textContent = message;
    logEl.prepend(item);
    while (logEl.children.length > 8) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function handleClick() {
    if (!active) return;
    const now = performance.now();
    total += 1;
    if (lastTime) {
      const interval = now - lastTime;
      intervals.push(interval);
      if (interval < threshold) {
        fast += 1;
        addLog(`Fast click: ${interval.toFixed(1)} ms`);
      } else {
        addLog(`Click interval: ${interval.toFixed(1)} ms`);
      }
    } else {
      addLog('First click recorded');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = 'Click as you normally would';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('Test started');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'Click here to begin';
    area.classList.remove('active');
    logEl.textContent = 'Press Start and click inside the test area.';
    updateStats();
  });

  area.addEventListener('click', handleClick);
  area.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      handleClick();
    }
  });
});
</script>
