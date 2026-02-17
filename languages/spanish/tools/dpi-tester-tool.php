<?php
// Herramienta de prueba de DPI / Sensibilidad del mouse (independiente)
?>

<div class="kbt-tool kbt-dpi-tool" id="dpi-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Estimacion de DPI</h3>
      <p>Ingresa la distancia fisica que mueves tu mouse, luego arrastra dentro del area de seguimiento.</p>
      <div class="kbt-tool-field">
        <label for="dpi-distance">Distancia recorrida</label>
        <div class="kbt-tool-inline">
          <input class="kbt-tool-input" id="dpi-distance" type="number" min="1" value="10">
          <select class="kbt-tool-select" id="dpi-unit">
            <option value="cm" selected>cm</option>
            <option value="in">pulgadas</option>
          </select>
        </div>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="dpi-start">Iniciar medicion</button>
        <button class="kbt-tool-button" id="dpi-reset">Reiniciar</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Area de seguimiento</h3>
      <div class="dpi-track" id="dpi-track" aria-label="Area de seguimiento de DPI">
        Arrastra aqui mientras mantienes presionado el boton del mouse.
      </div>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Pixeles recorridos</span><strong id="dpi-pixels">0 px</strong></div>
        <div class="kbt-tool-stat"><span>DPI estimado</span><strong id="dpi-result">--</strong></div>
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
