<?php
// Typing speed tool (centralized include) - Spanish Version
?>

<div class="typing-test-container">
  <h2>Prueba tu Velocidad de Escritura</h2>
  <div class="settings">
    <select id="difficulty">
      <option value="easy">Facil</option>
      <option value="medium" selected>Medio</option>
      <option value="hard">Dificil</option>
    </select>
    <select id="time">
      <option value="30">30 Segundos</option>
      <option value="60" selected>1 Minuto</option>
      <option value="120">2 Minutos</option>
    </select>
  </div>
  <p>Escribe el siguiente texto lo mas rapido que puedas:</p>
  <div id="test-text" class="test-text">
    Cargando texto...
  </div>
  <textarea id="typing-area" class="typing-area" placeholder="Comienza a escribir aqui..." disabled></textarea>
  <div class="timer-bar">
    <div id="timer-progress" class="timer-progress"></div>
  </div>
  <div class="results">
    <p>Tiempo restante: <span id="timer">60</span> segundos</p>
    <p>Velocidad: <span id="speed">0</span> PPM</p>
    <p>Precision: <span id="accuracy">0</span>%</p>
  </div>
  <div class="button-container">
    <button id="start-button" class="start-button">Iniciar Prueba</button>
    <button id="reset-button" class="reset-button" style="display: none;">Reiniciar</button>
  </div>
</div>

<div class="overlay" id="overlay"></div>
<div class="results-popup" id="results-popup">
  <h3>Tus Resultados de Escritura</h3>
  <p>Velocidad: <span id="final-speed">0</span> PPM</p>
  <p>Precision: <span id="final-accuracy">0</span>%</p>
  <p id="encouragement"></p>
  <button id="close-popup">Intentar de Nuevo</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const container = document.querySelector('.typing-test-container');
  if (!container) return;

  const difficulty = container.querySelector('#difficulty');
  const timeSelect = container.querySelector('#time');
  const testText = container.querySelector('#test-text');
  const typingArea = container.querySelector('#typing-area');
  const timerEl = container.querySelector('#timer');
  const speedEl = container.querySelector('#speed');
  const accuracyEl = container.querySelector('#accuracy');
  const startBtn = container.querySelector('#start-button');
  const resetBtn = container.querySelector('#reset-button');
  const progressBar = container.querySelector('#timer-progress');

  const overlay = document.getElementById('overlay');
  const popup = document.getElementById('results-popup');
  const finalSpeed = document.getElementById('final-speed');
  const finalAccuracy = document.getElementById('final-accuracy');
  const encouragement = document.getElementById('encouragement');
  const closePopup = document.getElementById('close-popup');

  const TEXTS = {
    easy: [
      'El rapido zorro marron salta sobre el perro perezoso.',
      'La practica constante mejora tu velocidad. Mantiene tu ritmo estable.',
      'Escribe con manos tranquilas y concentrate en la precision.'
    ],
    medium: [
      'La velocidad de escritura mejora cuando equilibras precision con un ritmo constante.',
      'Calienta tus dedos, mantiene tu postura alineada y relajate.',
      'Breves sesiones de practica enfocada construyen memoria muscular duradera.'
    ],
    hard: [
      'La escritura precisa es una mezcla de ritmo, atencion y memoria muscular refinada.',
      'Mantiene una cadencia suave, corrige errores rapidamente y mantiene la vista al frente.',
      'La consistencia sobre la velocidad gana las pruebas largas; respira, relajate y concentrate.'
    ]
  };

  let targetText = '';
  let timerId = null;
  let totalTime = 60;
  let timeLeft = 60;
  let isRunning = false;

  function escapeHtml(value) {
    return value
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/\"/g, '&quot;')
      .replace(/'/g, '&#39;');
  }

  function setTestText() {
    const pool = TEXTS[difficulty.value] || TEXTS.medium;
    targetText = pool[Math.floor(Math.random() * pool.length)];
    const rendered = targetText.split('').map((char) => {
      const safeChar = char === ' ' ? '&nbsp;' : escapeHtml(char);
      return `<span>${safeChar}</span>`;
    }).join('');
    testText.innerHTML = rendered;
  }

  function updateStats() {
    const typed = typingArea.value.slice(0, targetText.length);
    const spans = testText.querySelectorAll('span');
    let correct = 0;

    spans.forEach((span, index) => {
      const typedChar = typed[index];
      span.classList.remove('correct', 'incorrect');
      if (typedChar === undefined) return;
      if (typedChar === targetText[index]) {
        span.classList.add('correct');
        correct += 1;
      } else {
        span.classList.add('incorrect');
      }
    });

    const typedLength = typed.length;
    const errors = typedLength - correct;
    const accuracy = typedLength ? Math.round((correct / typedLength) * 100) : 0;
    accuracyEl.textContent = accuracy;

    const elapsed = totalTime - timeLeft;
    const minutes = elapsed > 0 ? elapsed / 60 : 0;
    const wpm = minutes > 0 ? Math.max(0, Math.round(((typedLength - errors) / 5) / minutes)) : 0;
    speedEl.textContent = wpm;

    if (typedLength >= targetText.length) {
      finishTest();
    }
  }

  function updateTimer() {
    timerEl.textContent = timeLeft;
    const progress = totalTime === 0 ? 0 : ((totalTime - timeLeft) / totalTime) * 100;
    progressBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
  }

  function startTest() {
    if (isRunning) return;
    isRunning = true;
    totalTime = parseInt(timeSelect.value, 10);
    timeLeft = totalTime;
    updateTimer();

    typingArea.disabled = false;
    typingArea.value = '';
    typingArea.focus();

    resetBtn.style.display = 'inline-flex';
    startBtn.style.display = 'none';

    timerId = setInterval(() => {
      timeLeft -= 1;
      updateTimer();
      if (timeLeft <= 0) {
        finishTest();
      }
    }, 1000);
  }

  function stopTimer() {
    if (timerId) {
      clearInterval(timerId);
      timerId = null;
    }
  }

  function finishTest() {
    if (!isRunning) return;
    stopTimer();
    isRunning = false;
    updateStats();
    typingArea.disabled = true;

    finalSpeed.textContent = speedEl.textContent;
    finalAccuracy.textContent = accuracyEl.textContent;
    encouragement.textContent = Number(finalSpeed.textContent) >= 60
      ? 'Excelente ritmo! Sigue entrenando para mantener la consistencia.'
      : 'Buen esfuerzo! Concentrate en la precision y un ritmo estable.';

    overlay.classList.add('show');
    popup.classList.add('show');
  }

  function resetTest() {
    stopTimer();
    isRunning = false;
    totalTime = parseInt(timeSelect.value, 10);
    timeLeft = totalTime;
    updateTimer();
    typingArea.value = '';
    typingArea.disabled = true;
    speedEl.textContent = '0';
    accuracyEl.textContent = '0';
    resetBtn.style.display = 'none';
    startBtn.style.display = 'inline-flex';
    overlay.classList.remove('show');
    popup.classList.remove('show');
    setTestText();
  }

  typingArea.addEventListener('input', updateStats);
  startBtn.addEventListener('click', startTest);
  resetBtn.addEventListener('click', resetTest);

  closePopup.addEventListener('click', function () {
    overlay.classList.remove('show');
    popup.classList.remove('show');
    resetTest();
  });

  overlay.addEventListener('click', function () {
    overlay.classList.remove('show');
    popup.classList.remove('show');
  });

  difficulty.addEventListener('change', function () {
    if (!isRunning) {
      setTestText();
    }
  });

  timeSelect.addEventListener('change', function () {
    if (!isRunning) {
      timeLeft = parseInt(timeSelect.value, 10);
      updateTimer();
    }
  });

  resetTest();
});
</script>
