<?php
// Russian QR Code Reader Tool - Сканер QR-кода
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Загрузить изображение QR</h3>
      <p>Выберите изображение с QR-кодом. Мы декодируем его локально в вашем браузере.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>Декодировать</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">Очистить</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">Статус: Ожидание изображения</div>
      <div class="qr-output" id="qr-reader-preview">Предпросмотр изображения</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Декодированный результат</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="Содержимое QR-кода появится здесь..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">Копировать</button>
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
    preview.textContent = 'Предпросмотр изображения';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Статус: Ожидание изображения';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="Предпросмотр QR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Статус: Готов к декодированию';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'Статус: Декодирование...';
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
        statusEl.textContent = 'Статус: QR-код декодирован';
      } else {
        output.value = 'QR-код не обнаружен в этом изображении.';
        statusEl.textContent = 'Статус: QR-код не найден';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'Статус: Не удалось прочитать изображение';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'Статус: Скопировано в буфер обмена';
  });

  reset();
});
</script>
