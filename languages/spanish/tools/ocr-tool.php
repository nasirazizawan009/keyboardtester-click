<?php
// OCR Tool (standalone)
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Subir imagen</h3>
      <p>Selecciona un archivo JPG o PNG y ejecuta OCR. El procesamiento ocurre en el navegador.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Extraer texto</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Limpiar</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Estado: Esperando imagen</div>
      <div class="ocr-preview" id="ocr-preview">Vista previa de imagen</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Texto extraido</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="Los resultados del OCR apareceran aqui..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="Vista previa OCR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Estado: Listo para extraer';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Estado: Procesando...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `Estado: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'No se detecto texto.';
      statusEl.textContent = 'Estado: Completado';
    } catch (error) {
      statusEl.textContent = 'Estado: Error al extraer texto';
      output.value = 'No se pudo procesar esta imagen.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Vista previa de imagen';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Estado: Esperando imagen';
  });
});
</script>
