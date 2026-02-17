<?php
// OCR Tool (standalone)
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>이미지 업로드</h3>
      <p>JPG 또는 PNG 파일을 선택하고 OCR을 실행하세요. 처리는 브라우저에서 이루어집니다.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>텍스트 추출</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">지우기</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">상태: 이미지 대기 중</div>
      <div class="ocr-preview" id="ocr-preview">이미지 미리보기</div>
    </div>
    <div class="kbt-tool-card">
      <h3>추출된 텍스트</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="OCR 결과가 여기에 표시됩니다..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="OCR 미리보기">`;
      runBtn.disabled = false;
      statusEl.textContent = '상태: 추출 준비 완료';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = '상태: 처리 중...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `상태: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || '텍스트가 감지되지 않았습니다.';
      statusEl.textContent = '상태: 완료';
    } catch (error) {
      statusEl.textContent = '상태: 텍스트 추출 오류';
      output.value = '이 이미지를 처리할 수 없습니다.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = '이미지 미리보기';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = '상태: 이미지 대기 중';
  });
});
</script>
