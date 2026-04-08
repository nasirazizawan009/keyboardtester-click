<?php
// Korean Ghost Click Detector tool - 고스트 클릭 감지기
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>클릭 테스트 영역</h3>
      <p>아래 영역을 클릭하세요. 300ms 미만의 매우 빠른 더블 클릭은 고스트 클릭으로 표시됩니다.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="클릭 테스트 영역">
        여기를 클릭하여 시작
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">시작</button>
        <button class="kbt-tool-button" id="ghost-reset">초기화</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>결과</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>총 클릭</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>빠른 클릭</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>평균 간격</span><strong id="ghost-avg">-- ms</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">시작을 누르고 테스트 영역 안에서 클릭하세요.</div>
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
        addLog(`빠른 클릭: ${interval.toFixed(1)} ms`);
      } else {
        addLog(`클릭 간격: ${interval.toFixed(1)} ms`);
      }
    } else {
      addLog('첫 번째 클릭 기록됨');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = '평소처럼 클릭하세요';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('테스트 시작됨');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = '여기를 클릭하여 시작';
    area.classList.remove('active');
    logEl.textContent = '시작을 누르고 테스트 영역 안에서 클릭하세요.';
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
