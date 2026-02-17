<?php
// Korean QR Code Reader tool - QR 코드 리더
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>QR 이미지 업로드</h3>
      <p>QR 코드가 포함된 이미지를 선택하세요. 브라우저에서 로컬로 디코딩됩니다.</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>디코딩</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">지우기</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">상태: 이미지 대기 중</div>
      <div class="qr-output" id="qr-reader-preview">이미지 미리보기</div>
    </div>
    <div class="kbt-tool-card">
      <h3>디코딩 결과</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="QR 코드 내용이 여기에 표시됩니다..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">복사</button>
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
    preview.textContent = '이미지 미리보기';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = '상태: 이미지 대기 중';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="QR 미리보기">`;
      runBtn.disabled = false;
      statusEl.textContent = '상태: 디코딩 준비 완료';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = '상태: 디코딩 중...';
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
        statusEl.textContent = '상태: QR 코드 디코딩 완료';
      } else {
        output.value = '이 이미지에서 QR 코드를 감지하지 못했습니다.';
        statusEl.textContent = '상태: QR 코드를 찾을 수 없음';
      }
    };
    img.onerror = function () {
      statusEl.textContent = '상태: 이미지를 읽을 수 없음';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = '상태: 클립보드에 복사됨';
  });

  reset();
});
</script>
