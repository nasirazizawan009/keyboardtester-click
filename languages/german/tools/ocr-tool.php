<?php
// OCR Tool (eigenstaendig)
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Bild hochladen</h3>
      <p>Waehlen Sie eine JPG- oder PNG-Datei aus und fuehren Sie OCR aus. Die Verarbeitung erfolgt im Browser.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Text extrahieren</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Loeschen</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Status: Warten auf Bild</div>
      <div class="ocr-preview" id="ocr-preview">Bildvorschau</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Extrahierter Text</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="Die OCR-Ergebnisse erscheinen hier..." readonly></textarea>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const fileInput = document.getElementById('ocr-file');
  const runBtn = document.getElementById('ocr-run');
  const clearBtn = document.getElementById('ocr-clear');
  const statusEl = document.getElementById('ocr-status');
  const preview = document.getElementById('ocr-preview');
  const output = document.getElementById('ocr-output');

  if (!fileInput || !runBtn) return;

  let currentImage = null;

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      currentImage = event.target.result;
      preview.innerHTML = `<img src="${currentImage}" alt="OCR-Vorschau">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Status: Bereit zum Extrahieren';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Status: Verarbeitung...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'deu', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `Status: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'Kein Text erkannt.';
      statusEl.textContent = 'Status: Abgeschlossen';
    } catch (error) {
      statusEl.textContent = 'Status: Fehler beim Extrahieren';
      output.value = 'Dieses Bild konnte nicht verarbeitet werden.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Bildvorschau';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Status: Warten auf Bild';
  });
});
</script>
