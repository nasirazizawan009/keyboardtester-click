<?php
// Korean Mouse DPI / Sensitivity Tester tool - DPI 테스터
?>

<div class="kbt-tool kbt-dpi-tool" id="dpi-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>DPI 측정</h3>
      <p>마우스를 이동한 물리적 거리를 입력한 후, 트랙 영역에서 드래그하세요.</p>
      <div class="kbt-tool-field">
        <label for="dpi-distance">이동 거리</label>
        <div class="kbt-tool-inline">
          <input class="kbt-tool-input" id="dpi-distance" type="number" min="1" value="10">
          <select class="kbt-tool-select" id="dpi-unit">
            <option value="cm" selected>cm</option>
            <option value="in">인치</option>
          </select>
        </div>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="dpi-start">측정 시작</button>
        <button class="kbt-tool-button" id="dpi-reset">초기화</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>트랙 영역</h3>
      <div class="dpi-track" id="dpi-track" aria-label="DPI 트래킹 영역">
        마우스 버튼을 누른 채로 여기서 드래그하세요.
      </div>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>이동 픽셀</span><strong id="dpi-pixels">0 px</strong></div>
        <div class="kbt-tool-stat"><span>추정 DPI</span><strong id="dpi-result">--</strong></div>
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

  startBtn.addEventListener('click', function () {
    active = true;
    totalPixels = 0;
    updateDisplay();
    track.classList.add('active');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    tracking = false;
    totalPixels = 0;
    updateDisplay();
    track.classList.remove('active');
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

  track.addEventListener('pointerleave', function () {
    tracking = false;
  });

  distanceInput.addEventListener('input', updateDisplay);
  unitSelect.addEventListener('change', updateDisplay);
});
</script>
