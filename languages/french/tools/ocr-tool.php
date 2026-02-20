<?php
// OCR Tool (standalone) - French Version
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Telecharger une image</h3>
      <p>Selectionnez un fichier JPG ou PNG et lancez l'OCR. Le traitement se fait dans le navigateur.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Extraire le texte</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Effacer</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Etat: En attente d'une image</div>
      <div class="ocr-preview" id="ocr-preview">Apercu de l'image</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Texte extrait</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="Les resultats OCR apparaitront ici..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="Apercu OCR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Etat: Pret pour l\'extraction';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Etat: Traitement en cours...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'fra+eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `Etat: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'Aucun texte detecte.';
      statusEl.textContent = 'Etat: Termine';
    } catch (error) {
      statusEl.textContent = 'Etat: Erreur lors de l\'extraction du texte';
      output.value = 'Impossible de traiter cette image.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Apercu de l\'image';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Etat: En attente d\'une image';
  });
});
</script>
