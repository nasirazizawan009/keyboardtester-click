<?php
// French QR Code Reader tool - Lecteur de Codes QR
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Telecharger une image QR</h3>
      <p>Selectionnez une image avec un code QR. Nous la decodons localement dans votre navigateur.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>Decoder</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">Effacer</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">Etat: En attente d'une image</div>
      <div class="qr-output" id="qr-reader-preview">Apercu de l'image</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Resultat decode</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="Le contenu du code QR apparaitra ici..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">Copier</button>
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
    preview.textContent = 'Apercu de l\'image';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Etat: En attente d\'une image';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="Apercu QR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Etat: Pret a decoder';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'Etat: Decodage en cours...';
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
        statusEl.textContent = 'Etat: Code QR decode';
      } else {
        output.value = 'Aucun code QR detecte dans cette image.';
        statusEl.textContent = 'Etat: Code QR non trouve';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'Etat: Impossible de lire l\'image';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'Etat: Copie dans le presse-papiers';
  });

  reset();
});
</script>
