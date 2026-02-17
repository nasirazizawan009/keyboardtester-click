<?php
// Spanish QR Code Reader tool - Lector de Códigos QR
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Subir imagen QR</h3>
      <p>Selecciona una imagen con un código QR. Lo decodificamos localmente en tu navegador.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>Decodificar</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">Limpiar</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">Estado: Esperando imagen</div>
      <div class="qr-output" id="qr-reader-preview">Vista previa de imagen</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Resultado decodificado</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="El contenido del código QR aparecerá aquí..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">Copiar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/jsqr@1.4.0/dist/jsQR.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const fileInput = document.getElementById('qr-reader-file');
  const runBtn = document.getElementById('qr-reader-run');
  const clearBtn = document.getElementById('qr-reader-clear');
  const statusEl = document.getElementById('qr-reader-status');
  const preview = document.getElementById('qr-reader-preview');
  const output = document.getElementById('qr-reader-output');
  const copyBtn = document.getElementById('qr-reader-copy');

  if (!fileInput || !runBtn) return;

  let imageDataUrl = null;

  function reset() {
    imageDataUrl = null;
    fileInput.value = '';
    preview.textContent = 'Vista previa de imagen';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Estado: Esperando imagen';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="Vista previa QR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Estado: Listo para decodificar';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'Estado: Decodificando...';
    output.value = '';
    const img = new Image();
    img.onload = function () {
      const canvas = document.createElement('canvas');
      canvas.width = img.width;
      canvas.height = img.height;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(img, 0, 0);
      const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
      const code = window.jsQR(imageData.data, canvas.width, canvas.height);
      if (code) {
        output.value = code.data;
        statusEl.textContent = 'Estado: Código QR decodificado';
      } else {
        output.value = 'No se detectó ningún código QR en esta imagen.';
        statusEl.textContent = 'Estado: No se encontró código QR';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'Estado: No se pudo leer la imagen';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'Estado: Copiado al portapapeles';
  });

  reset();
});
</script>
