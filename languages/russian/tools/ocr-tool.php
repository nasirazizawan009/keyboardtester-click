<?php
// Russian OCR Tool - OCR Инструмент
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Загрузить изображение</h3>
      <p>Выберите файл JPG или PNG и запустите OCR. Обработка происходит в браузере.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Извлечь текст</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Очистить</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Статус: Ожидание изображения</div>
      <div class="ocr-preview" id="ocr-preview">Предпросмотр изображения</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Извлеченный текст</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="Результаты OCR появятся здесь..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="Предпросмотр OCR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Статус: Готов к извлечению';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Статус: Обработка...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'rus+eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `Статус: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'Текст не обнаружен.';
      statusEl.textContent = 'Статус: Завершено';
    } catch (error) {
      statusEl.textContent = 'Статус: Ошибка извлечения текста';
      output.value = 'Не удалось обработать это изображение.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Предпросмотр изображения';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Статус: Ожидание изображения';
  });
});
</script>
