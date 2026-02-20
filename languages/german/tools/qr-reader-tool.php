<?php
// Deutsches QR-Code-Leser-Tool
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>QR-Bild hochladen</h3>
      <p>Waehlen Sie ein Bild mit einem QR-Code aus. Wir dekodieren es lokal in Ihrem Browser.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>Dekodieren</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">Loeschen</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">Status: Warten auf Bild</div>
      <div class="qr-output" id="qr-reader-preview">Bildvorschau</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Dekodiertes Ergebnis</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="Der QR-Code-Inhalt erscheint hier..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">Kopieren</button>
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
    preview.textContent = 'Bildvorschau';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Status: Warten auf Bild';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="QR-Vorschau">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Status: Bereit zum Dekodieren';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'Status: Dekodierung...';
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
        statusEl.textContent = 'Status: QR-Code dekodiert';
      } else {
        output.value = 'Kein QR-Code in diesem Bild erkannt.';
        statusEl.textContent = 'Status: Kein QR-Code gefunden';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'Status: Bild konnte nicht gelesen werden';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'Status: In Zwischenablage kopiert';
  });

  reset();
});
</script>
