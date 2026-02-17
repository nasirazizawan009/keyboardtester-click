<?php
// Japanese QR Code Reader Tool - QRコードリーダー
?>

<div class="kbt-tool kbt-qr-reader-tool" id="qr-reader-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>QR画像アップロード</h3>
      <p>QRコードを含む画像を選択してください。ブラウザ内でローカルにデコードします。</p>
      <input class="kbt-tool-input" type="file" id="qr-reader-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-reader-run" disabled>デコード</button>
        <button class="kbt-tool-button ghost" id="qr-reader-clear">クリア</button>
      </div>
      <div class="kbt-tool-status" id="qr-reader-status">ステータス: 画像を待機中</div>
      <div class="qr-output" id="qr-reader-preview">画像プレビュー</div>
    </div>
    <div class="kbt-tool-card">
      <h3>デコード結果</h3>
      <textarea class="kbt-tool-textarea" id="qr-reader-output" rows="10" placeholder="QRコードの内容がここに表示されます..." readonly></textarea>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="qr-reader-copy">コピー</button>
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
    preview.textContent = '画像プレビュー';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'ステータス: 画像を待機中';
  }

  fileInput.addEventListener('change', function () {
    const file = fileInput.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function (event) {
      imageDataUrl = event.target.result;
      preview.innerHTML = `<img src="${imageDataUrl}" alt="QRプレビュー">`;
      runBtn.disabled = false;
      statusEl.textContent = 'ステータス: デコード準備完了';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', function () {
    if (!imageDataUrl || !window.jsQR) return;
    statusEl.textContent = 'ステータス: デコード中...';
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
        statusEl.textContent = 'ステータス: QRコードをデコードしました';
      } else {
        output.value = 'この画像でQRコードが検出されませんでした。';
        statusEl.textContent = 'ステータス: QRコードが見つかりません';
      }
    };
    img.onerror = function () {
      statusEl.textContent = 'ステータス: 画像を読み込めません';
    };
    img.src = imageDataUrl;
  });

  clearBtn.addEventListener('click', reset);

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    statusEl.textContent = 'ステータス: クリップボードにコピーしました';
  });

  reset();
});
</script>
