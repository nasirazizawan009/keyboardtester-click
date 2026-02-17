<?php
// Ghost Click Detector tool (standalone) - Portuguese Version
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Area de teste de cliques</h3>
      <p>Clique na area abaixo. Cliques duplos muito rapidos (menos de 300 ms) sao marcados como possiveis cliques fantasma.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="Area de teste de cliques">
        Clique aqui para comecar
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">Iniciar</button>
        <button class="kbt-tool-button" id="ghost-reset">Reiniciar</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Resultados</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Cliques totais</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>Cliques rapidos</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>Intervalo medio</span><strong id="ghost-avg">-- ms</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">Pressione Iniciar e clique dentro da area de teste.</div>
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
        addLog(`Clique rapido: ${interval.toFixed(1)} ms`);
      } else {
        addLog(`Intervalo de clique: ${interval.toFixed(1)} ms`);
      }
    } else {
      addLog('Primeiro clique registrado');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = 'Clique como faria normalmente';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('Teste iniciado');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'Clique aqui para comecar';
    area.classList.remove('active');
    logEl.textContent = 'Pressione Iniciar e clique dentro da area de teste.';
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
