<?php
// Japanese Typing Test Tool - タイピング速度テスト
?>

<div class="typing-test-container">
  <h2>タイピング速度をテスト</h2>
  <div class="settings">
    <select id="difficulty">
      <option value="easy">簡単</option>
      <option value="medium" selected>普通</option>
      <option value="hard">難しい</option>
    </select>
    <select id="time">
      <option value="30">30秒</option>
      <option value="60" selected>1分</option>
      <option value="120">2分</option>
    </select>
  </div>
  <p>次のテキストをできるだけ速く入力してください：</p>
  <div id="test-text" class="test-text">
    テキストを読み込み中...
  </div>
  <textarea id="typing-area" class="typing-area" placeholder="ここに入力を開始..." disabled></textarea>
  <div class="timer-bar">
    <div id="timer-progress" class="timer-progress"></div>
  </div>
  <div class="results">
    <p>残り時間: <span id="timer">60</span> 秒</p>
    <p>速度: <span id="speed">0</span> WPM</p>
    <p>精度: <span id="accuracy">0</span>%</p>
  </div>
  <div class="button-container">
    <button id="start-button" class="start-button">テスト開始</button>
    <button id="reset-button" class="reset-button" style="display: none;">リセット</button>
  </div>
</div>

<div class="overlay" id="overlay"></div>
<div class="results-popup" id="results-popup">
  <h3>あなたのタイピング結果</h3>
  <p>速度: <span id="final-speed">0</span> WPM</p>
  <p>精度: <span id="final-accuracy">0</span>%</p>
  <p id="encouragement"></p>
  <button id="close-popup">もう一度挑戦</button>
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
      'すばやい茶色のキツネが怠けた犬を飛び越えます。',
      '継続的な練習がスピードを向上させます。一定のペースを保ちましょう。',
      'リラックスした手で入力し、精度に集中してください。'
    ],
    medium: [
      'タイピング速度は精度と安定したリズムのバランスが取れると向上します。',
      '指をウォームアップし、姿勢を整え、リラックスしましょう。',
      '短く集中した練習セッションで持続的な筋肉記憶を構築します。'
    ],
    hard: [
      '正確なタイピングはリズム、注意力、洗練された筋肉記憶の融合です。',
      'スムーズなケイデンスを維持し、エラーを素早く修正し、前を見続けましょう。',
      'スピードより一貫性が長いテストに勝ちます。呼吸してリラックスして集中。'
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
      ? '素晴らしいペースです！一貫性を保つために練習を続けましょう。'
      : '良い努力です！精度と安定したリズムに集中しましょう。';

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
