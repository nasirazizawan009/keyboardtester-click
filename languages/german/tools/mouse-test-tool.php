<?php
// German Mouse Tester Tool - Maus-Tester
?>
<div class="mouse-tester">
  <canvas id="mouse-canvas" width="400" height="250" role="button" aria-label="Maus-Testbereich, klicken Sie mit einer beliebigen Taste oder scrollen Sie"></canvas>

  <div class="results">
    <div class="result-box" id="left-click-count" aria-live="polite">Linksklick: 0</div>
    <div class="result-box" id="middle-click-count" aria-live="polite">Mittelklick: 0</div>
    <div class="result-box" id="right-click-count" aria-live="polite">Rechtsklick: 0</div>
    <div class="result-box" id="scroll-count" aria-live="polite">Scrollen: 0</div>
  </div>

  <div class="status">
    <div class="status-box" id="left-click-status">Links: Losgelassen (Zuletzt: Keine)</div>
    <div class="status-box" id="middle-click-status">Mitte: Losgelassen (Zuletzt: Keine)</div>
    <div class="status-box" id="right-click-status">Rechts: Losgelassen (Zuletzt: Keine)</div>
    <div class="status-box" id="scroll-status">Scrollen: Keine (Zuletzt: Keine)</div>
  </div>

  <button class="reset-button" id="reset-button" aria-label="Alle Zaehler und Status zuruecksetzen">Zuruecksetzen</button>
</div>

<style>
  :root {
    --bg-color: #f0f0f0;
    --text-color: #333333;
    --primary-color: #1abc9c;
    --secondary-color: #34495e;
    --keyboard-bg: #ffffff;
    --key-bg: #e0e0e0;
    --key-text: #333333;
    --key-active-1: #2ecc71;
    --key-active-2: #3498db;
    --key-active-3: #e74c3c;
    --key-border: #cccccc;
  }

  [data-theme="dark"] {
    --bg-color: #2c3e50;
    --text-color: #ecf0f1;
    --primary-color: #1abc9c;
    --secondary-color: #34495e;
    --keyboard-bg: #34495e;
    --key-bg: #4a627a;
    --key-text: #ecf0f1;
    --key-active-1: #2ecc71;
    --key-active-2: #3498db;
    --key-active-3: #e74c3c;
    --key-border: #666666;
  }

  .mouse-tester {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background-color: var(--bg-color);
    color: var(--text-color);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    direction: ltr;
  }

  .mouse-tester #mouse-canvas {
    width: min(90%, 400px);
    height: 250px;
    background-color: var(--keyboard-bg);
    border: 3px dashed var(--primary-color);
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .mouse-tester #mouse-canvas:hover {
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  }

  .mouse-tester .results, .mouse-tester .status {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .mouse-tester .result-box, .mouse-tester .status-box {
    padding: 15px 25px;
    background-color: var(--primary-color);
    color: white;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: bold;
    transition: transform 0.2s, background-color 0.3s;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
  }

  .mouse-tester .result-box.left-click-active { background-color: var(--key-active-1); }
  .mouse-tester .result-box.middle-click-active, .mouse-tester .result-box.scroll-active { background-color: var(--key-active-2); }
  .mouse-tester .result-box.right-click-active { background-color: var(--key-active-3); }
  .mouse-tester .status-box.left-click-pressed { background-color: var(--key-active-1); }
  .mouse-tester .status-box.middle-click-pressed, .mouse-tester .status-box.scroll-pressed { background-color: var(--key-active-2); }
  .mouse-tester .status-box.right-click-pressed { background-color: var(--key-active-3); }
  .mouse-tester .result-box:hover, .mouse-tester .status-box:hover { transform: scale(1.1); }

  .mouse-tester .reset-button {
    padding: 10px 20px;
    background-color: #e74c3c;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, transform 0.2s;
  }

  .mouse-tester .reset-button:hover {
    background-color: #c0392b;
    transform: scale(1.05);
  }
</style>

<script>
  let leftClickCount = 0;
  let middleClickCount = 0;
  let scrollCount = 0;
  let rightClickCount = 0;
  let lastScrollDirection = null;
  const buttonStates = {
    left: { status: 'Losgelassen', lastPress: 'Keine' },
    middle: { status: 'Losgelassen', lastPress: 'Keine' },
    right: { status: 'Losgelassen', lastPress: 'Keine' },
    scroll: { status: 'Keine', lastPress: 'Keine' }
  };
  let highlightedButton = null;
  let scrollOffset = 0;

  const canvas = document.getElementById('mouse-canvas');
  const ctx = canvas.getContext('2d');
  const leftClickDisplay = document.getElementById('left-click-count');
  const middleClickDisplay = document.getElementById('middle-click-count');
  const rightClickDisplay = document.getElementById('right-click-count');
  const scrollDisplay = document.getElementById('scroll-count');
  const leftClickStatus = document.getElementById('left-click-status');
  const middleClickStatus = document.getElementById('middle-click-status');
  const rightClickStatus = document.getElementById('right-click-status');
  const scrollStatus = document.getElementById('scroll-status');
  const resetButton = document.getElementById('reset-button');

  function drawMouse() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    const bodyGradient = ctx.createLinearGradient(100, 50, 300, 200);
    bodyGradient.addColorStop(0, '#3c3c3c');
    bodyGradient.addColorStop(0.5, '#5a5a5a');
    bodyGradient.addColorStop(1, '#2c2c2c');
    ctx.fillStyle = bodyGradient;
    ctx.beginPath();
    ctx.moveTo(160, 15);
    ctx.quadraticCurveTo(90, 15, 80, 80);
    ctx.quadraticCurveTo(70, 190, 130, 210);
    ctx.lineTo(270, 210);
    ctx.quadraticCurveTo(330, 190, 320, 80);
    ctx.quadraticCurveTo(310, 15, 240, 15);
    ctx.closePath();
    ctx.fill();
    ctx.strokeStyle = '#1a1a1a';
    ctx.lineWidth = 2;
    ctx.stroke();

    ctx.fillStyle = highlightedButton === 'left' ? '#2ecc71' : '#b0b0b0';
    ctx.beginPath();
    ctx.moveTo(160, 15);
    ctx.quadraticCurveTo(90, 15, 80, 80);
    ctx.quadraticCurveTo(80, 140, 130, 140);
    ctx.lineTo(195, 140);
    ctx.quadraticCurveTo(190, 80, 190, 15);
    ctx.closePath();
    ctx.fill();
    ctx.strokeStyle = '#333333';
    ctx.lineWidth = 1;
    ctx.stroke();

    ctx.fillStyle = highlightedButton === 'right' ? '#e74c3c' : '#b0b0b0';
    ctx.beginPath();
    ctx.moveTo(240, 15);
    ctx.quadraticCurveTo(310, 15, 320, 80);
    ctx.quadraticCurveTo(320, 140, 270, 140);
    ctx.lineTo(205, 140);
    ctx.quadraticCurveTo(210, 80, 210, 15);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();

    ctx.fillStyle = highlightedButton === 'middle' ? '#3498db' : '#606060';
    ctx.beginPath();
    ctx.roundRect(185, 40, 30, 80, 12);
    ctx.fill();
    ctx.stroke();

    ctx.fillStyle = '#ff5555';
    ctx.beginPath();
    ctx.ellipse(200, 190, 6, 4, 0, 0, Math.PI * 2);
    ctx.fill();
  }

  function updateStatus(button, status, timestamp) {
    buttonStates[button].status = status;
    if (timestamp) buttonStates[button].lastPress = new Date().toLocaleTimeString('de-DE');
    const buttonNames = { left: 'Links', middle: 'Mitte', right: 'Rechts', scroll: 'Scrollen' };
    const displayText = button === 'scroll' ?
      `Scrollen: ${buttonStates[button].status} (Zuletzt: ${buttonStates[button].lastPress})` :
      `${buttonNames[button]}: ${buttonStates[button].status} (Zuletzt: ${buttonStates[button].lastPress})`;
    switch (button) {
      case 'left':
        leftClickStatus.textContent = displayText;
        leftClickStatus.classList.toggle('left-click-pressed', status === 'Gedrueckt');
        break;
      case 'middle':
        middleClickStatus.textContent = displayText;
        middleClickStatus.classList.toggle('middle-click-pressed', status === 'Gedrueckt');
        break;
      case 'right':
        rightClickStatus.textContent = displayText;
        rightClickStatus.classList.toggle('right-click-pressed', status === 'Gedrueckt');
        break;
      case 'scroll':
        scrollStatus.textContent = displayText;
        scrollStatus.classList.toggle('scroll-pressed', status !== 'Keine');
        break;
    }
  }

  canvas.addEventListener('mousedown', (event) => {
    event.preventDefault();
    let buttonType = null;
    switch (event.button) {
      case 0: buttonType = 'left'; break;
      case 1: buttonType = 'middle'; break;
      case 2: buttonType = 'right'; break;
    }
    if (buttonType) {
      highlightedButton = buttonType;
      lastScrollDirection = null;
      drawMouse();
      switch (buttonType) {
        case 'left':
          leftClickCount++;
          leftClickDisplay.textContent = `Linksklick: ${leftClickCount}`;
          leftClickDisplay.classList.add('left-click-active');
          updateStatus('left', 'Gedrueckt', true);
          break;
        case 'middle':
          middleClickCount++;
          middleClickDisplay.textContent = `Mittelklick: ${middleClickCount}`;
          middleClickDisplay.classList.add('middle-click-active');
          updateStatus('middle', 'Gedrueckt', true);
          break;
        case 'right':
          rightClickCount++;
          rightClickDisplay.textContent = `Rechtsklick: ${rightClickCount}`;
          rightClickDisplay.classList.add('right-click-active');
          updateStatus('right', 'Gedrueckt', true);
          break;
      }
    }
  });

  canvas.addEventListener('mouseup', (event) => {
    event.preventDefault();
    switch (event.button) {
      case 0: updateStatus('left', 'Losgelassen'); break;
      case 1: updateStatus('middle', 'Losgelassen'); break;
      case 2: updateStatus('right', 'Losgelassen'); break;
    }
  });

  canvas.addEventListener('wheel', (event) => {
    event.preventDefault();
    scrollCount++;
    const direction = event.deltaY < 0 ? 'Hoch' : 'Runter';
    lastScrollDirection = event.deltaY < 0 ? 'up' : 'down';
    scrollOffset += event.deltaY < 0 ? -2 : 2;
    highlightedButton = 'middle';
    scrollDisplay.textContent = `Scrollen: ${scrollCount}`;
    scrollDisplay.classList.add('scroll-active');
    updateStatus('scroll', direction, true);
    drawMouse();
  });

  canvas.addEventListener('contextmenu', (event) => event.preventDefault());

  resetButton.addEventListener('click', () => {
    leftClickCount = 0;
    middleClickCount = 0;
    scrollCount = 0;
    rightClickCount = 0;
    scrollOffset = 0;
    lastScrollDirection = null;
    buttonStates.left = { status: 'Losgelassen', lastPress: 'Keine' };
    buttonStates.middle = { status: 'Losgelassen', lastPress: 'Keine' };
    buttonStates.right = { status: 'Losgelassen', lastPress: 'Keine' };
    buttonStates.scroll = { status: 'Keine', lastPress: 'Keine' };
    leftClickDisplay.textContent = 'Linksklick: 0';
    middleClickDisplay.textContent = 'Mittelklick: 0';
    rightClickDisplay.textContent = 'Rechtsklick: 0';
    scrollDisplay.textContent = 'Scrollen: 0';
    leftClickStatus.textContent = 'Links: Losgelassen (Zuletzt: Keine)';
    middleClickStatus.textContent = 'Mitte: Losgelassen (Zuletzt: Keine)';
    rightClickStatus.textContent = 'Rechts: Losgelassen (Zuletzt: Keine)';
    scrollStatus.textContent = 'Scrollen: Keine (Zuletzt: Keine)';
    document.querySelectorAll('.result-box, .status-box').forEach(el => {
      el.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active', 'left-click-pressed', 'middle-click-pressed', 'right-click-pressed', 'scroll-pressed');
    });
    highlightedButton = null;
    drawMouse();
  });

  drawMouse();
</script>
