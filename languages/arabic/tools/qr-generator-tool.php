<?php
// Arabic QR Code Generator tool - مولد رمز QR
?>

<div class="kbt-tool kbt-qr-tool" id="qr-generator-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>إنشاء رمز QR</h3>
      <div class="kbt-tool-field">
        <label for="qr-text">نص أو رابط</label>
        <textarea class="kbt-tool-textarea" id="qr-text" rows="4" placeholder="أدخل نصاً أو رابطاً"></textarea>
      </div>
      <div class="kbt-tool-field">
        <label for="qr-size">الحجم</label>
        <select class="kbt-tool-select" id="qr-size">
          <option value="160">160 بكسل</option>
          <option value="220" selected>220 بكسل</option>
          <option value="280">280 بكسل</option>
        </select>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="qr-generate">إنشاء</button>
        <button class="kbt-tool-button ghost" id="qr-download">تحميل</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>المعاينة</h3>
      <div class="qr-output" id="qr-output">معاينة رمز QR</div>
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

  .kbt-tool-field {
    margin-bottom: 1rem;
  }

  .kbt-tool-field label {
    display: block;
    color: #9ca3af;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
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
  }

  .kbt-tool-textarea:focus {
    outline: none;
    border-color: #22c55e;
  }

  .kbt-tool-select {
    width: 100%;
    padding: 0.75rem;
    background: #111827;
    border: 1px solid #374151;
    border-radius: 8px;
    color: #f3f4f6;
    font-size: 1rem;
    font-family: 'Tajawal', sans-serif;
    cursor: pointer;
  }

  .kbt-tool-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
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

  .kbt-tool-button:hover {
    background: #4b5563;
    transform: translateY(-2px);
  }

  .kbt-tool-button.primary {
    background: #22c55e;
    color: #1f2937;
  }

  .kbt-tool-button.primary:hover {
    background: #16a34a;
  }

  .kbt-tool-button.ghost {
    background: transparent;
    border: 1px solid #374151;
  }

  .kbt-tool-button.ghost:hover {
    background: #374151;
  }

  .qr-output {
    width: 100%;
    min-height: 220px;
    background: #111827;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 1rem;
  }

  .qr-output canvas,
  .qr-output img {
    background: #fff;
    padding: 10px;
    border-radius: 8px;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const textInput = document.getElementById('qr-text');
  const sizeInput = document.getElementById('qr-size');
  const generateBtn = document.getElementById('qr-generate');
  const downloadBtn = document.getElementById('qr-download');
  const output = document.getElementById('qr-output');

  if (!textInput || !generateBtn || !output) return;

  let qr = null;

  function renderQR() {
    const text = textInput.value.trim();
    if (!text) {
      output.textContent = 'معاينة رمز QR';
      return;
    }
    const size = parseInt(sizeInput.value, 10) || 220;
    output.innerHTML = '';
    qr = new QRCode(output, {
      text,
      width: size,
      height: size,
      colorDark: '#111827',
      colorLight: 'transparent'
    });
  }

  generateBtn.addEventListener('click', renderQR);
  sizeInput.addEventListener('change', renderQR);

  downloadBtn.addEventListener('click', function () {
    const canvas = output.querySelector('canvas');
    if (!canvas) return;
    const link = document.createElement('a');
    link.download = 'qr-code.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
  });
});
</script>
