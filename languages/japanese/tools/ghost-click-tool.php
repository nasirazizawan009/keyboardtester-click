<?php
// Japanese Ghost Click Detector Tool - ゴーストクリック検出器
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>クリックテストエリア</h3>
      <p>下のエリアをクリックしてください。非常に速いダブルクリック（300ミリ秒未満）はゴーストクリックの可能性としてマークされます。</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="クリックテストエリア">
        ここをクリックして開始
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">開始</button>
        <button class="kbt-tool-button" id="ghost-reset">リセット</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>結果</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>総クリック数</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>高速クリック</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>平均間隔</span><strong id="ghost-avg">-- ms</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">開始を押してテストエリア内でクリックしてください。</div>
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
        addLog(`高速クリック: ${interval.toFixed(1)} ms`);
      } else {
        addLog(`クリック間隔: ${interval.toFixed(1)} ms`);
      }
    } else {
      addLog('最初のクリックを記録');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = '通常通りクリックしてください';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('テスト開始');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'ここをクリックして開始';
    area.classList.remove('active');
    logEl.textContent = '開始を押してテストエリア内でクリックしてください。';
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
