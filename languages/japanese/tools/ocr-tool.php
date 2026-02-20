<?php
// Japanese OCR Tool - OCRツール
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>画像アップロード</h3>
      <p>JPGまたはPNGファイルを選択してOCRを実行します。処理はブラウザ内で行われます。</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>テキスト抽出</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">クリア</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">ステータス: 画像を待機中</div>
      <div class="ocr-preview" id="ocr-preview">画像プレビュー</div>
    </div>
    <div class="kbt-tool-card">
      <h3>抽出されたテキスト</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="OCR結果がここに表示されます..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="OCRプレビュー">`;
      runBtn.disabled = false;
      statusEl.textContent = 'ステータス: 抽出準備完了';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'ステータス: 処理中...';
    runBtn.disabled = true;
    output.value = '';
    try {
      const result = await window.Tesseract.recognize(currentImage, 'jpn+eng', {
        logger: (message) => {
          if (message.status === 'recognizing text') {
            statusEl.textContent = `ステータス: ${Math.round(message.progress * 100)}%`;
          }
        }
      });
      output.value = result.data.text.trim() || 'テキストが検出されませんでした。';
      statusEl.textContent = 'ステータス: 完了';
    } catch (error) {
      statusEl.textContent = 'ステータス: テキスト抽出エラー';
      output.value = 'この画像を処理できませんでした。';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = '画像プレビュー';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'ステータス: 画像を待機中';
  });
});
</script>
