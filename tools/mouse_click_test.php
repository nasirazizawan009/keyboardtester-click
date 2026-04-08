<?php
// mouse_click_test.php
// Core mouse testing functionality with ultra-realistic canvas-drawn mouse image, scroll testing, and scroll direction arrow
?>
<div class="mouse-tester">
  <!-- Canvas for Mouse Image -->
  <canvas id="mouse-canvas" width="400" height="250" role="button" aria-label="Mouse test area, click or scroll with any mouse button"></canvas>

  <!-- Results Display -->
  <div class="results">
    <div class="result-box" id="left-click-count" aria-live="polite">Left Clicks: 0</div>
    <div class="result-box" id="middle-click-count" aria-live="polite">Middle Clicks: 0</div>
    <div class="result-box" id="right-click-count" aria-live="polite">Right Clicks: 0</div>
    <div class="result-box" id="scroll-count" aria-live="polite">Scrolls: 0</div>
  </div>

  <!-- Button Status Display -->
  <div class="status">
    <div class="status-box" id="left-click-status">Left: Released (Last: Never)</div>
    <div class="status-box" id="middle-click-status">Middle: Released (Last: Never)</div>
    <div class="status-box" id="right-click-status">Right: Released (Last: Never)</div>
    <div class="status-box" id="scroll-status">Scroll: None (Last: Never)</div>
  </div>

  <!-- Reset Button -->
  <button class="reset-button" id="reset-button" aria-label="Reset all click counts, scroll counts, and status">Reset</button>
</div>

<style>
  /* Define CSS variables globally to ensure header consistency */
  :root {
    --bg-color: #f0f0f0;
    --text-color: #333333;
    --primary-color: #1abc9c;
    --secondary-color: #34495e;
    --keyboard-bg: #ffffff;
    --key-bg: #e0e0e0;
    --key-text: #333333;
    --key-active-1: #2ecc71; /* Green for left click */
    --key-active-2: #3498db; /* Blue for middle click/scroll */
    --key-active-3: #e74c3c; /* Red for right click */
    --key-border: #cccccc;
  }

  /* Dark theme overrides */
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

  /* Scope styles within .mouse-tester */
  .mouse-tester {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background-color: var(--bg-color);
    color: var(--text-color);
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

  .mouse-tester .result-box.left-click-active {
    background-color: var(--key-active-1);
  }

  .mouse-tester .result-box.middle-click-active, .mouse-tester .result-box.scroll-active {
    background-color: var(--key-active-2);
  }

  .mouse-tester .result-box.right-click-active {
    background-color: var(--key-active-3);
  }

  .mouse-tester .status-box.left-click-pressed {
    background-color: var(--key-active-1);
  }

  .mouse-tester .status-box.middle-click-pressed, .mouse-tester .status-box.scroll-pressed {
    background-color: var(--key-active-2);
  }

  .mouse-tester .status-box.right-click-pressed {
    background-color: var(--key-active-3);
  }

  .mouse-tester .result-box:hover, .mouse-tester .status-box:hover {
    transform: scale(1.1);
  }

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
  // Mouse Tester JavaScript with Ultra-Realistic Canvas, Scroll Testing, and Direction Arrow
  let leftClickCount = 0;
  let middleClickCount = 0;
  let scrollCount = 0;
  let rightClickCount = 0;
  let lastScrollDirection = null; // Track last scroll direction: 'up', 'down', or null
  const buttonStates = {
    left: { status: 'Released', lastPress: 'Never' },
    middle: { status: 'Released', lastPress: 'Never' },
    right: { status: 'Released', lastPress: 'Never' },
    scroll: { status: 'None', lastPress: 'Never' }
  };
  let highlightedButton = null;
  let scrollOffset = 0; // For scroll wheel texture animation

  // Get Elements
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

  // Draw Ultra-Realistic Mouse Image with Scroll Direction Arrow
  function drawMouse() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Mouse Body (Ergonomic, Asymmetrical Shape with Gradient)
    const bodyGradient = ctx.createLinearGradient(100, 50, 300, 200);
    bodyGradient.addColorStop(0, '#3c3c3c');
    bodyGradient.addColorStop(0.5, '#5a5a5a');
    bodyGradient.addColorStop(1, '#2c2c2c');
    ctx.fillStyle = bodyGradient;
    ctx.beginPath();
    ctx.moveTo(160, 15); // Top center
    ctx.quadraticCurveTo(90, 15, 80, 80); // Left curve
    ctx.quadraticCurveTo(70, 190, 130, 210); // Bottom left
    ctx.lineTo(270, 210); // Bottom right
    ctx.quadraticCurveTo(330, 190, 320, 80); // Right curve
    ctx.quadraticCurveTo(310, 15, 240, 15); // Top right
    ctx.closePath();
    ctx.fill();
    ctx.strokeStyle = '#1a1a1a';
    ctx.lineWidth = 2;
    ctx.stroke();
    ctx.shadowColor = 'rgba(0, 0, 0, 0.5)';
    ctx.shadowBlur = 20;
    ctx.shadowOffsetX = 8;
    ctx.shadowOffsetY = 8;

    // Body Highlight (Glossy Effect)
    ctx.fillStyle = 'rgba(255, 255, 255, 0.25)';
    ctx.beginPath();
    ctx.ellipse(200, 40, 90, 35, 0, 0, Math.PI * 2);
    ctx.fill();

    // Side Grip Texture (Dots)
    ctx.fillStyle = '#333333';
    for (let y = 90; y <= 150; y += 10) {
      ctx.beginPath();
      ctx.arc(80, y, 3, 0, Math.PI * 2);
      ctx.fill();
      ctx.beginPath();
      ctx.arc(320, y, 3, 0, Math.PI * 2);
      ctx.fill();
    }

    // Braided USB Cable
    ctx.beginPath();
    ctx.moveTo(200, 15);
    ctx.quadraticCurveTo(200, -15, 230, -15);
    ctx.strokeStyle = '#2a2a2a';
    ctx.lineWidth = 2.5;
    ctx.stroke();
    ctx.shadowBlur = 0;
    ctx.shadowOffsetX = 0;
    ctx.shadowOffsetY = 0;

    // Left Button (Contoured)
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
    ctx.fillStyle = 'rgba(0, 0, 0, 0.15)';
    ctx.beginPath();
    ctx.moveTo(130, 140);
    ctx.lineTo(195, 140);
    ctx.lineTo(190, 15);
    ctx.lineTo(160, 15);
    ctx.fill();

    // Right Button (Contoured)
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
    ctx.fillStyle = 'rgba(0, 0, 0, 0.15)';
    ctx.beginPath();
    ctx.moveTo(270, 140);
    ctx.lineTo(205, 140);
    ctx.lineTo(210, 15);
    ctx.lineTo(240, 15);
    ctx.fill();

    // Scroll Wheel (Central, Prominent with Texture and Arrow)
    ctx.fillStyle = highlightedButton === 'middle' ? '#3498db' : '#606060';
    ctx.beginPath();
    ctx.roundRect(185, 40, 30, 80, 12);
    ctx.fill();
    ctx.stroke();

    // Scroll Wheel Texture (Rubberized)
    ctx.strokeStyle = '#333333';
    ctx.lineWidth = 1;
    for (let y = 50 + (scrollOffset % 8); y <= 110; y += 8) {
      ctx.beginPath();
      ctx.moveTo(200, y);
      ctx.lineTo(200, y + 4);
      ctx.stroke();
    }

    // Scroll Direction Arrow
    ctx.fillStyle = highlightedButton === 'middle' ? '#ffffff' : '#cccccc';
    ctx.beginPath();
    if (lastScrollDirection === 'up') {
      ctx.moveTo(200, 60); // Tip
      ctx.lineTo(190, 80); // Bottom left
      ctx.lineTo(210, 80); // Bottom right
    } else if (lastScrollDirection === 'down') {
      ctx.moveTo(200, 100); // Tip
      ctx.lineTo(190, 80); // Top left
      ctx.lineTo(210, 80); // Top right
    } else {
      ctx.moveTo(200, 80); // Center (neutral triangle)
      ctx.lineTo(190, 60); // Top left
      ctx.lineTo(210, 60); // Top right
    }
    ctx.closePath();
    ctx.fill();

    // Scroll Wheel Glow
    if (highlightedButton === 'middle') {
      ctx.fillStyle = 'rgba(52, 152, 219, 0.3)';
      ctx.beginPath();
      ctx.roundRect(180, 35, 40, 90, 15);
      ctx.fill();
    }

    // DPI Sensor Glow
    ctx.fillStyle = '#ff5555';
    ctx.beginPath();
    ctx.ellipse(200, 190, 6, 4, 0, 0, Math.PI * 2);
    ctx.fill();
    ctx.fillStyle = 'rgba(255, 85, 85, 0.3)';
    ctx.beginPath();
    ctx.ellipse(200, 190, 10, 8, 0, 0, Math.PI * 2);
    ctx.fill();
  }

  // Update Button Status
  function updateStatus(button, status, timestamp) {
    buttonStates[button].status = status;
    if (timestamp) buttonStates[button].lastPress = new Date().toLocaleTimeString();
    const displayText = button === 'scroll' ? 
      `Scroll: ${buttonStates[button].status} (Last: ${buttonStates[button].lastPress})` :
      `${button.charAt(0).toUpperCase() + button.slice(1)}: ${buttonStates[button].status} (Last: ${buttonStates[button].lastPress})`;
    switch (button) {
      case 'left':
        leftClickStatus.textContent = displayText;
        leftClickStatus.classList.toggle('left-click-pressed', status === 'Pressed');
        break;
      case 'middle':
        middleClickStatus.textContent = displayText;
        middleClickStatus.classList.toggle('middle-click-pressed', status === 'Pressed');
        break;
      case 'right':
        rightClickStatus.textContent = displayText;
        rightClickStatus.classList.toggle('right-click-pressed', status === 'Pressed');
        break;
      case 'scroll':
        scrollStatus.textContent = displayText;
        scrollStatus.classList.toggle('scroll-pressed', status !== 'None');
        break;
    }
  }

  // Click Test Functionality (Mouse Down)
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
      lastScrollDirection = null; // Clear scroll direction on click
      drawMouse();

      // Update Counts and Status
      switch (buttonType) {
        case 'left':
          leftClickCount++;
          leftClickDisplay.textContent = `Left Clicks: ${leftClickCount}`;
          leftClickDisplay.classList.remove('middle-click-active', 'right-click-active', 'scroll-active');
          leftClickDisplay.classList.add('left-click-active');
          updateStatus('left', 'Pressed', true);
          break;
        case 'middle':
          middleClickCount++;
          middleClickDisplay.textContent = `Middle Clicks: ${middleClickCount}`;
          middleClickDisplay.classList.remove('left-click-active', 'right-click-active', 'scroll-active');
          middleClickDisplay.classList.add('middle-click-active');
          updateStatus('middle', 'Pressed', true);
          break;
        case 'right':
          rightClickCount++;
          rightClickDisplay.textContent = `Right Clicks: ${rightClickCount}`;
          rightClickDisplay.classList.remove('left-click-active', 'middle-click-active', 'scroll-active');
          rightClickDisplay.classList.add('right-click-active');
          updateStatus('right', 'Pressed', true);
          break;
      }
    }
  });

  // Mouse Up Handler
  canvas.addEventListener('mouseup', (event) => {
    event.preventDefault();
    switch (event.button) {
      case 0:
        updateStatus('left', 'Released');
        break;
      case 1:
        updateStatus('middle', 'Released');
        break;
      case 2:
        updateStatus('right', 'Released');
        break;
    }
  });

  // Scroll Test Functionality
  canvas.addEventListener('wheel', (event) => {
    event.preventDefault();
    scrollCount++;
    const direction = event.deltaY < 0 ? 'Up' : 'Down';
    lastScrollDirection = direction.toLowerCase();
    scrollOffset += event.deltaY < 0 ? -2 : 2; // Animate scroll texture
    highlightedButton = 'middle';
    scrollDisplay.textContent = `Scrolls: ${scrollCount}`;
    scrollDisplay.classList.remove('left-click-active', 'middle-click-active', 'right-click-active');
    scrollDisplay.classList.add('scroll-active');
    updateStatus('scroll', direction, true);
    drawMouse();
  });

  // Prevent Right-Click Context Menu
  canvas.addEventListener('contextmenu', (event) => {
    event.preventDefault();
  });

  // Reset Functionality
  resetButton.addEventListener('click', () => {
    leftClickCount = 0;
    middleClickCount = 0;
    scrollCount = 0;
    rightClickCount = 0;
    scrollOffset = 0;
    lastScrollDirection = null;
    buttonStates.left = { status: 'Released', lastPress: 'Never' };
    buttonStates.middle = { status: 'Released', lastPress: 'Never' };
    buttonStates.right = { status: 'Released', lastPress: 'Never' };
    buttonStates.scroll = { status: 'None', lastPress: 'Never' };
    leftClickDisplay.textContent = 'Left Clicks: 0';
    middleClickDisplay.textContent = 'Middle Clicks: 0';
    rightClickDisplay.textContent = 'Right Clicks: 0';
    scrollDisplay.textContent = 'Scrolls: 0';
    leftClickStatus.textContent = 'Left: Released (Last: Never)';
    middleClickStatus.textContent = 'Middle: Released (Last: Never)';
    rightClickStatus.textContent = 'Right: Released (Last: Never)';
    scrollStatus.textContent = 'Scroll: None (Last: Never)';
    leftClickDisplay.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active');
    middleClickDisplay.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active');
    rightClickDisplay.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active');
    scrollDisplay.classList.remove('left-click-active', 'middle-click-active', 'right-click-active', 'scroll-active');
    leftClickStatus.classList.remove('left-click-pressed');
    middleClickStatus.classList.remove('middle-click-pressed');
    rightClickStatus.classList.remove('right-click-pressed');
    scrollStatus.classList.remove('scroll-pressed');
    highlightedButton = null;
    drawMouse();
  });

  // Initial Draw
  drawMouse();
</script>