<?php
// Arabic QR Code Reader tool - قارئ رمز QR
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>تحميل صورة QR</h3>
      <p>اختر صورة تحتوي على رمز QR. سيتم فك التشفير محلياً في المتصفح.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>فك التشفير</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">مسح</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">الحالة: في انتظار الصورة</div>
      <div class="qr-output" id="qr-reader-preview">معاينة الصورة</div>
    </div>
    <div class="kbt-tool-card">
      <h3>نتيجة فك التشفير</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="سيظهر محتوى رمز QR هنا..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">نسخ</button>
      </div>
    </div>
  </div>
</div>

<style>
  .kbt-tool {
    font-family: 'Tajawal', sans-serif;
    direction: rtl;
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
  }

  .kbt-tool-grid.two {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
  }

  @media (max-width: 768px) {
    .kbt-tool-grid.two {
      grid-template-columns: 1fr;
    }
  }

  .kbt-tool-card {
    background: #1f2937;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
  }

  .kbt-tool-card h3 {
    color: #f3f4f6;
    margin: 0 0 1rem 0;
    font-size: 1.25rem;
  }

  .kbt-tool-card p {
    color: #9ca3af;
    margin: 0 0 1rem 0;
    font-size: 0.9rem;
    line-height: 1.6;
  }

  .kbt-tool-input {
    width: 100%;
    padding: 0.75rem;
    background: #111827;
    border: 1px solid #374151;
    border-radius: 8px;
    color: #f3f4f6;
    font-size: 1rem;
    margin-bottom: 1rem;
  }

  .kbt-tool-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
    margin-bottom: 1rem;
  }

  .kbt-tool-button {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Tajawal', sans-serif;
    background: #374151;
    color: #f3f4f6;
  }

  .kbt-tool-button:hover:not(:disabled) {
    background: #4b5563;
    transform: translateY(-2px);
  }

  .kbt-tool-button:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .kbt-tool-button.primary {
    background: #22c55e;
    color: #1f2937;
  }

  .kbt-tool-button.primary:hover:not(:disabled) {
    background: #16a34a;
  }

  .kbt-tool-button.ghost {
    background: transparent;
    border: 1px solid #374151;
  }

  .kbt-tool-button.ghost:hover {
    background: #374151;
  }

  .kbt-tool-status {
    color: #9ca3af;
    font-size: 0.9rem;
    margin-bottom: 1rem;
  }

  .qr-output {
    width: 100%;
    min-height: 200px;
    background: #111827;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 1rem;
    overflow: hidden;
  }

  .qr-output img {
    max-width: 100%;
    max-height: 200px;
    object-fit: contain;
  }

  .kbt-tool-textarea {
    width: 100%;
    padding: 0.75rem;
    background: #111827;
    border: 1px solid #374151;
    border-radius: 8px;
    color: #f3f4f6;
    font-size: 1rem;
    font-family: 'Tajawal', sans-serif;
    resize: vertical;
    direction: rtl;
    margin-bottom: 1rem;
  }

  .kbt-tool-textarea:focus {
    outline: none;
    border-color: #22c55e;
  }
</style>

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
    preview.textContent = 'معاينة الصورة';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'الحالة: في انتظار الصورة';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="معاينة QR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'الحالة: جاهز لفك التشفير';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'الحالة: جاري فك التشفير...';
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
        statusEl.textContent = 'الحالة: تم فك تشفير رمز QR';
      } else {
        output.value = 'لم يتم اكتشاف رمز QR في هذه الصورة.';
        statusEl.textContent = 'الحالة: لم يتم العثور على رمز QR';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'الحالة: لا يمكن قراءة الصورة';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'الحالة: تم النسخ إلى الحافظة';
  });

  reset();
});
</script>
