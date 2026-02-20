<?php
// Russian Ghost Click Detector Tool - Детектор Призрачных Кликов
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Область тестирования кликов</h3>
      <p>Кликайте в области ниже. Очень быстрые двойные клики (менее 300 мс) отмечаются как возможные призрачные клики.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="Область тестирования кликов">
        Нажмите здесь чтобы начать
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">Начать</button>
        <button class="kbt-tool-button" id="ghost-reset">Сбросить</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Результаты</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Всего кликов</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>Быстрых кликов</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>Средний интервал</span><strong id="ghost-avg">-- мс</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">Нажмите Начать и кликайте в области тестирования.</div>
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
      avgEl.textContent = `${avg.toFixed(1)} мс`;
    } else {
      avgEl.textContent = '-- мс';
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
        addLog(`Быстрый клик: ${interval.toFixed(1)} мс`);
      } else {
        addLog(`Интервал клика: ${interval.toFixed(1)} мс`);
      }
    } else {
      addLog('Первый клик зарегистрирован');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = 'Кликайте как обычно';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('Тест начат');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'Нажмите здесь чтобы начать';
    area.classList.remove('active');
    logEl.textContent = 'Нажмите Начать и кликайте в области тестирования.';
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
