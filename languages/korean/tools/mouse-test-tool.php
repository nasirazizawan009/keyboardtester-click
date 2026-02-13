<?php
// Korean Mouse Tester Tool - 마우스 테스터
?>
<div class="mouse-tester">
  <canvas id="mouse-canvas" width="400" height="250" role="button" aria-label="마우스 테스트 영역, 아무 버튼이나 클릭하거나 스크롤하세요"></canvas>

  <div class="results">
    <div class="result-box" id="left-click-count" aria-live="polite">왼쪽 클릭: 0</div>
    <div class="result-box" id="middle-click-count" aria-live="polite">가운데 클릭: 0</div>
    <div class="result-box" id="right-click-count" aria-live="polite">오른쪽 클릭: 0</div>
    <div class="result-box" id="scroll-count" aria-live="polite">스크롤: 0</div>
  </div>

  <div class="status">
    <div class="status-box" id="left-click-status">왼쪽: 해제됨 (마지막: 없음)</div>
    <div class="status-box" id="middle-click-status">가운데: 해제됨 (마지막: 없음)</div>
    <div class="status-box" id="right-click-status">오른쪽: 해제됨 (마지막: 없음)</div>
    <div class="status-box" id="scroll-status">스크롤: 없음 (마지막: 없음)</div>
  </div>

  <button class="reset-button" id="reset-button" aria-label="모든 클릭 수, 스크롤 수 및 상태 초기화">초기화</button>
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
    font-family: 'Noto Sans KR', sans-serif;
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
    left: { status: '해제됨', lastPress: '없음' },
    middle: { status: '해제됨', lastPress: '없음' },
    right: { status: '해제됨', lastPress: '없음' },
    scroll: { status: '없음', lastPress: '없음' }
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
    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
    ctx.shadowBlur = 20;
    ctx.shadowOffsetX = 8;
    ctx.shadowOffsetY = 8;

    ctx.fillStyle = 'rgba(255, 255, 255, 0.25)';
    ctx.beginPath();
    ctx.ellipse(200, 40, 90, 35, 0, 0, Math.PI * 2);
    ctx.fill();

    ctx.fillStyle = '#333333';
    for (let y = 90; y <= 150; y += 10) {
      ctx.beginPath();
      ctx.arc(80, y, 3, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(320, y, 3, 0, Math.PI * 2);
      ctx.fill();
    }

    ctx.beginPath();
    ctx.moveTo(200, 15);
    ctx.quadraticCurveTo(200, -15, 230, -15);
    ctx.strokeStyle = '#2a2a2a';
    ctx.lineWidth = 2.5;
    ctx.stroke();
    ctx.shadowBlur = 0;
    ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;

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

    ctx.strokeStyle = '#333333';
    ctx.lineWidth = 1;
    for (let y = 50 + (scrollOffset % 8); y <= 110; y += 8) {
      ctx.beginPath();
      ctx.moveTo(200, y);
      ctx.lineTo(200, y + 4);
      ctx.stroke();
    }

    ctx.fillStyle = highlightedButton === 'middle' ? '#ffffff' : '#cccccc';
    ctx.beginPath();
    if (lastScrollDirection === 'up') {
      ctx.moveTo(200, 60);
      ctx.lineTo(190, 80);
      ctx.lineTo(210, 80);
    } else if (lastScrollDirection === 'down') {
      ctx.moveTo(200, 100);
      ctx.lineTo(190, 80);
      ctx.lineTo(210, 80);
    } else {
      ctx.moveTo(200, 80);
      ctx.lineTo(190, 60);
      ctx.lineTo(210, 60);
    }
    ctx.closePath();
    ctx.fill();

    if (highlightedButton === 'middle') {
      ctx.fillStyle = 'rgba(52, 152, 219, 0.3)';
      ctx.beginPath();
      ctx.roundRect(180, 35, 40, 90, 15);
      ctx.fill();
    }

    ctx.fillStyle = '#ff5555';
    ctx.beginPath();
    ctx.ellipse(200, 190, 6, 4, 0, 0, Math.PI * 2);
    ctx.fill();
  }

  function updateStatus(button, status, timestamp) {
    buttonStates[button].status = status;
    if (timestamp) buttonStates[button].lastPress = new Date().toLocaleTimeString('ko-KR');
    const buttonNames = { left: '왼쪽', middle: '가운데', right: '오른쪽', scroll: '스크롤' };
    const displayText = button === 'scroll' ?
      `스크롤: ${buttonStates[button].status} (마지막: ${buttonStates[button].lastPress})` :
      `${buttonNames[button]}: ${buttonStates[button].status} (마지막: ${buttonStates[button].lastPress})`;
    switch (button) {
      case 'left':
        leftClickStatus.textContent = displayText;
        leftClickStatus.classList.toggle('left-click-pressed', status === '눌림');
        break;
      case 'middle':
        middleClickStatus.textContent = displayText;
        middleClickStatus.classList.toggle('middle-click-pressed', status === '눌림');
        break;
      case 'right':
        rightClickStatus.textContent = displayText;
        rightClickStatus.classList.toggle('right-click-pressed', status === '눌림');
        break;
      case 'scroll':
        scrollStatus.textContent = displayText;
        scrollStatus.classList.toggle('scroll-pressed', status !== '없음');
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
          leftClickDisplay.textContent = `왼쪽 클릭: ${leftClickCount}`;
          leftClickDisplay.classList.add('left-click-active');
          updateStatus('left', '눌림', true);
          break;
        case 'middle':
          middleClickCount++;
          middleClickDisplay.textContent = `가운데 클릭: ${middleClickCount}`;
          middleClickDisplay.classList.add('middle-click-active');
          updateStatus('middle', '눌림', true);
          break;
        case 'right':
          rightClickCount++;
          rightClickDisplay.textContent = `오른쪽 클릭: ${rightClickCount}`;
          rightClickDisplay.classList.add('right-click-active');
          updateStatus('right', '눌림', true);
          break;
      }
    }
  });

  canvas.addEventListener('mouseup', (event) => {
    event.preventDefault();
    switch (event.button) {
      case 0: updateStatus('left', '해제됨'); break;
      case 1: updateStatus('middle', '해제됨'); break;
      case 2: updateStatus('right', '해제됨'); break;
    }
  });

  canvas.addEventListener('wheel', (event) => {
    event.preventDefault();
    scrollCount++;
    const direction = event.deltaY < 0 ? '위로' : '아래로';
    lastScrollDirection = event.deltaY < 0 ? 'up' : 'down';
    scrollOffset += event.deltaY < 0 ? -2 : 2;
    highlightedButton = 'middle';
    scrollDisplay.textContent = `스크롤: ${scrollCount}`;
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
    buttonStates.left = { status: '해제됨', lastPress: '없음' };
    buttonStates.middle = { status: '해제됨', lastPress: '없음' };
    buttonStates.right = { status: '해제됨', lastPress: '없음' };
    buttonStates.scroll = { status: '없음', lastPress: '없음' };
    leftClickDisplay.textContent = '왼쪽 클릭: 0';
    middleClickDisplay.textContent = '가운데 클릭: 0';
    rightClickDisplay.textContent = '오른쪽 클릭: 0';
    scrollDisplay.textContent = '스크롤: 0';
    leftClickStatus.textContent = '왼쪽: 해제됨 (마지막: 없음)';
    middleClickStatus.textContent = '가운데: 해제됨 (마지막: 없음)';
    rightClickStatus.textContent = '오른쪽: 해제됨 (마지막: 없음)';
    scrollStatus.textContent = '스크롤: 없음 (마지막: 없음)';
    document.querySelectorAll('.result-box, .status-box').forEach(el => {
      el.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active', 'left-click-pressed', 'middle-click-pressed', 'right-click-pressed', 'scroll-pressed');
    });
    highlightedButton = null;
    drawMouse();
  });

  drawMouse();
</script>
