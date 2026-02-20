<?php
// French QR Code Generator tool - Generateur de Codes QR
?>

<div class="kbt-tool kbt-qr-tool" id="qr-generator-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Generer un code QR</h3>
      <div class="kbt-tool-field">
        <label for="qr-text">Texte ou URL</label>
        <textarea class="kbt-tool-textarea" id="qr-text" rows="4" placeholder="Entrez le texte ou l'URL"></textarea>
      </div>
      <div class="kbt-tool-field">
        <label for="qr-size">Taille</label>
        <select class="kbt-tool-select" id="qr-size">
          <option value="160">160 px</option>
          <option value="220" selected>220 px</option>
          <option value="280">280 px</option>
        </select>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-generate">Generer</button>
        <button class="kbt-tool-button ghost" id="qr-download">Telecharger</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Apercu</h3>
      <div class="qr-output" id="qr-output">Apercu du code QR</div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const textInput = document.getElementById('qr-text');
  const sizeInput = document.getElementById('qr-size');
  const generateBtn = document.getElementById('qr-generate');
  const downloadBtn = document.getElementById('qr-download');
  const output = document.getElementById('qr-output');

  if (!textInput || !generateBtn || !output) return;

  let qr = null;

  function renderQR() {
    const text = textInput.value.trim();
    if (!text) {
      output.textContent = 'Apercu du code QR';
      return;
    }
    const size = parseInt(sizeInput.value, 10) || 220;
    output.innerHTML = '';
    qr = new QRCode(output, {
      text,
      width: size,
      height: size,
      colorDark: '#111827',
      colorLight: 'transparent'
    });
  }

  generateBtn.addEventListener('click', renderQR);
  sizeInput.addEventListener('change', renderQR);

  downloadBtn.addEventListener('click', function () {
    const canvas = output.querySelector('canvas');
    if (!canvas) return;
    const link = document.createElement('a');
    link.download = 'code-qr.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
  });
});
</script>
