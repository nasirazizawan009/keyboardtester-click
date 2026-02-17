<?php
// Russian Latency Checker Tool - Проверка Задержки
?>

<div class="kbt-tool kbt-latency-tool" id="latency-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Тест задержки</h3>
      <p>Нажимайте любые клавиши во время активного теста. Мы оценим задержку обработки для каждого нажатия.</p>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="latency-start">Начать тест</button>
        <button class="kbt-tool-button" id="latency-stop" disabled>Остановить</button>
        <button class="kbt-tool-button ghost" id="latency-clear">Очистить</button>
      </div>
      <div class="kbt-tool-status" id="latency-status">Статус: Готов</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Результаты</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Текущая</span><strong id="latency-current">-- мс</strong></div>
        <div class="kbt-tool-stat"><span>Средняя</span><strong id="latency-avg">-- мс</strong></div>
        <div class="kbt-tool-stat"><span>Лучшая</span><strong id="latency-min">-- мс</strong></div>
        <div class="kbt-tool-stat"><span>Худшая</span><strong id="latency-max">-- мс</strong></div>
        <div class="kbt-tool-stat"><span>Измерений</span><strong id="latency-count">0</strong></div>
      </div>
      <div class="kbt-tool-log" id="latency-log">Нажмите Начать и нажимайте клавиши для сбора данных.</div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const startBtn = document.getElementById('latency-start');
  const stopBtn = document.getElementById('latency-stop');
  const clearBtn = document.getElementById('latency-clear');
  const statusEl = document.getElementById('latency-status');
  const currentEl = document.getElementById('latency-current');
  const avgEl = document.getElementById('latency-avg');
  const minEl = document.getElementById('latency-min');
  const maxEl = document.getElementById('latency-max');
  const countEl = document.getElementById('latency-count');
  const logEl = document.getElementById('latency-log');

  if (!startBtn || !stopBtn || !clearBtn) return;

  let active = false;
  let samples = [];

  function updateStats(value) {
    if (typeof value === 'number') {
      currentEl.textContent = `${value.toFixed(2)} мс`;
    }
    if (samples.length === 0) {
      avgEl.textContent = '-- мс';
      minEl.textContent = '-- мс';
      maxEl.textContent = '-- мс';
      countEl.textContent = '0';
      return;
    }
    const avg = samples.reduce((a, b) => a + b, 0) / samples.length;
    avgEl.textContent = `${avg.toFixed(2)} мс`;
    minEl.textContent = `${Math.min(...samples).toFixed(2)} мс`;
    maxEl.textContent = `${Math.max(...samples).toFixed(2)} мс`;
    countEl.textContent = samples.length;
  }

  function addLog(text) {
    const entry = document.createElement('div');
    entry.textContent = text;
    logEl.prepend(entry);
    while (logEl.children.length > 10) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function handleKey(event) {
    if (!active) return;
    const now = performance.now();
    let latency = now - event.timeStamp;
    if (!Number.isFinite(latency)) {
      latency = 0;
    }
    latency = Math.max(0, latency);
    samples.push(latency);
    updateStats(latency);
    addLog(`${event.code || event.key}: ${latency.toFixed(2)} мс`);
  }

  startBtn.addEventListener('click', function () {
    active = true;
    statusEl.textContent = 'Статус: Тестирование (нажимайте клавиши)';
    startBtn.disabled = true;
    stopBtn.disabled = false;
    logEl.textContent = '';
  });

  stopBtn.addEventListener('click', function () {
    active = false;
    statusEl.textContent = 'Статус: Остановлен';
    startBtn.disabled = false;
    stopBtn.disabled = true;
  });

  clearBtn.addEventListener('click', function () {
    samples = [];
    updateStats();
    currentEl.textContent = '-- мс';
    logEl.textContent = 'Нажмите Начать и нажимайте клавиши для сбора данных.';
  });

  document.addEventListener('keydown', handleKey);
});
</script>
