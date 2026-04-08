<?php
// OCR Tool (standalone)
?>

<div class="kbt-tool kbt-ocr-tool" id="ocr-tool-inner">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Upload image</h3>
      <p>Select a JPG or PNG file and run OCR. Processing happens in the browser.</p>
      <input class="kbt-tool-input" type="file" id="ocr-file" accept="image/*">
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ocr-run" disabled>Extract text</button>
        <button class="kbt-tool-button ghost" id="ocr-clear">Clear</button>
      </div>
      <div class="kbt-tool-status" id="ocr-status">Status: Waiting for image</div>
      <div class="ocr-preview" id="ocr-preview">Image preview</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Extracted text</h3>
      <textarea class="kbt-tool-textarea" id="ocr-output" rows="12" placeholder="OCR results appear here..." readonly></textarea>
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
      preview.innerHTML = `<img src="${currentImage}" alt="OCR preview">`;
      runBtn.disabled = false;
      statusEl.textContent = 'Status: Ready to extract';
    };
    reader.readAsDataURL(file);
  });

  runBtn.addEventListener('click', async function () {
    if (!currentImage || !window.Tesseract) return;
    statusEl.textContent = 'Status: Processing...';
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
      output.value = result.data.text.trim() || 'No text detected.';
      statusEl.textContent = 'Status: Complete';
    } catch (error) {
      statusEl.textContent = 'Status: Error extracting text';
      output.value = 'Unable to process this image.';
    } finally {
      runBtn.disabled = false;
    }
  });

  clearBtn.addEventListener('click', function () {
    fileInput.value = '';
    currentImage = null;
    preview.textContent = 'Image preview';
    output.value = '';
    runBtn.disabled = true;
    statusEl.textContent = 'Status: Waiting for image';
  });
});
</script>
