<?php
// Ghost Click Detector tool (standalone) - German Version
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Klick-Testbereich</h3>
      <p>Klicken Sie im Bereich unten. Sehr schnelle Doppelklicks (unter 300 ms) werden als moegliche Geisterklicks markiert.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="Klick-Testbereich">
        Hier klicken zum Starten
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">Starten</button>
        <button class="kbt-tool-button" id="ghost-reset">Zuruecksetzen</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Ergebnisse</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Gesamtklicks</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>Schnelle Klicks</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>Durchschn. Intervall</span><strong id="ghost-avg">-- ms</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">Druecken Sie Starten und klicken Sie im Testbereich.</div>
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
        addLog(`Schneller Klick: ${interval.toFixed(1)} ms`);
      } else {
        addLog(`Klick-Intervall: ${interval.toFixed(1)} ms`);
      }
    } else {
      addLog('Erster Klick registriert');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = 'Klicken Sie wie gewohnt';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('Test gestartet');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'Hier klicken zum Starten';
    area.classList.remove('active');
    logEl.textContent = 'Druecken Sie Starten und klicken Sie im Testbereich.';
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
