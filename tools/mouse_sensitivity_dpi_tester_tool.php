<?php
// Mouse DPI / Sensitivity Tester tool (standalone)
?>

<style>
.dpi-track.active {
  border-color: #22c55e !important;
  box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3), inset 0 0 20px rgba(34, 197, 94, 0.05);
  animation: dpi-pulse 1.5s ease-in-out infinite;
  color: #22c55e;
  font-weight: 600;
}
@keyframes dpi-pulse {
  0%, 100% { box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3); }
  50% { box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.15); }
}
.kbt-tool-button.primary.active {
  background: #22c55e;
  cursor: default;
  opacity: 0.9;
}
</style>
<div class="kbt-tool kbt-dpi-tool" id="dpi-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>DPI estimate</h3>
      <p>Enter the physical distance you move your mouse, then drag inside the track area.</p>
      <div class="kbt-tool-field">
        <label for="dpi-distance">Distance moved</label>
        <div class="kbt-tool-inline">
          <input class="kbt-tool-input" id="dpi-distance" type="number" min="1" value="10">
          <select class="kbt-tool-select" id="dpi-unit">
            <option value="cm" selected>cm</option>
            <option value="in">inches</option>
          </select>
        </div>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="dpi-start">Start measure</button>
        <button class="kbt-tool-button" id="dpi-reset">Reset</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Track area</h3>
      <div class="dpi-track" id="dpi-track" aria-label="DPI tracking area">
        Drag here while holding the mouse button.
      </div>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Pixels moved</span><strong id="dpi-pixels">0 px</strong></div>
        <div class="kbt-tool-stat"><span>Estimated DPI</span><strong id="dpi-result">--</strong></div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const distanceInput = document.getElementById('dpi-distance');
  const unitSelect = document.getElementById('dpi-unit');
  const startBtn = document.getElementById('dpi-start');
  const resetBtn = document.getElementById('dpi-reset');
  const track = document.getElementById('dpi-track');
  const pixelsEl = document.getElementById('dpi-pixels');
  const resultEl = document.getElementById('dpi-result');

  if (!track || !startBtn || !resetBtn) return;

  let active = false;
  let tracking = false;
  let totalPixels = 0;
  let lastX = 0;
  let lastY = 0;

  function updateDisplay() {
    pixelsEl.textContent = `${Math.round(totalPixels)} px`;
    const distance = parseFloat(distanceInput.value);
    if (!distance || distance <= 0) {
      resultEl.textContent = '--';
      return;
    }
    const inches = unitSelect.value === 'cm' ? distance / 2.54 : distance;
    const dpi = inches > 0 ? totalPixels / inches : 0;
    resultEl.textContent = dpi ? `${Math.round(dpi)} DPI` : '--';
  }

  function setActiveState(isActive) {
    active = isActive;
    if (isActive) {
      startBtn.textContent = 'Measuring…';
      startBtn.classList.add('active');
      startBtn.disabled = true;
      track.classList.add('active');
      track.textContent = 'Drag here now — tracking is active';
    } else {
      startBtn.textContent = 'Start measure';
      startBtn.classList.remove('active');
      startBtn.disabled = false;
      track.classList.remove('active');
      track.textContent = 'Drag here while holding the mouse button.';
    }
  }

  startBtn.addEventListener('click', function () {
    setActiveState(true);
    totalPixels = 0;
    updateDisplay();
  });

  resetBtn.addEventListener('click', function () {
    tracking = false;
    totalPixels = 0;
    updateDisplay();
    setActiveState(false);
  });

  track.addEventListener('pointerdown', function (event) {
    if (!active) return;
    tracking = true;
    totalPixels = 0;
    lastX = event.clientX;
    lastY = event.clientY;
    track.setPointerCapture(event.pointerId);
    updateDisplay();
  });

  track.addEventListener('pointermove', function (event) {
    if (!tracking) return;
    const dx = event.clientX - lastX;
    const dy = event.clientY - lastY;
    totalPixels += Math.hypot(dx, dy);
    lastX = event.clientX;
    lastY = event.clientY;
    updateDisplay();
  });

  track.addEventListener('pointerup', function () {
    tracking = false;
  });

  track.addEventListener('lostpointercapture', function () {
    tracking = false;
  });

  distanceInput.addEventListener('input', updateDisplay);
  unitSelect.addEventListener('change', updateDisplay);
});
</script>
