<?php
// Arabic OCR Tool - أداة التعرف على النصوص
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner" dir="rtl">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>تحميل الصورة</h3>
      <p>اختر ملف JPG أو PNG وقم بتشغيل OCR. تتم المعالجة في المتصفح.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>استخراج النص</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">مسح</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">الحالة: في انتظار الصورة</div>
      <div class="ocr-preview" id="ocr-preview">معاينة الصورة</div>
    </div>
    <div class="kbt-tool-card">
      <h3>النص المستخرج</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="ستظهر نتائج OCR هنا..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="معاينة OCR">`;
      runBtn.disabled = false;
      statusEl.textContent = 'الحالة: جاهز للاستخراج';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'الحالة: جاري المعالجة...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `الحالة: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'لم يتم اكتشاف نص.';
      statusEl.textContent = 'الحالة: اكتمل';
    } catch (error) {
      statusEl.textContent = 'الحالة: خطأ في استخراج النص';
      output.value = 'لا يمكن معالجة هذه الصورة.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'معاينة الصورة';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'الحالة: في انتظار الصورة';
  });
});
</script>
