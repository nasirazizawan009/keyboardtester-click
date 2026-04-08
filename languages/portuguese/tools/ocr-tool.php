<?php
// OCR Tool (standalone) - Portuguese Version
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Enviar imagem</h3>
      <p>Selecione um arquivo JPG ou PNG e execute o OCR. O processamento ocorre no navegador.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Extrair texto</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Limpar</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Status: Aguardando imagem</div>
      <div class="ocr-preview" id="ocr-preview">Pre-visualizacao de imagem</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Texto extraido</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="Os resultados do OCR aparecerão aqui..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="Pre-visualizacao OCR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Status: Pronto para extrair';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Status: Processando...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `Status: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'Nenhum texto detectado.';
      statusEl.textContent = 'Status: Concluido';
    } catch (error) {
      statusEl.textContent = 'Status: Erro ao extrair texto';
      output.value = 'Nao foi possivel processar esta imagem.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Pre-visualizacao de imagem';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Status: Aguardando imagem';
  });
});
</script>
