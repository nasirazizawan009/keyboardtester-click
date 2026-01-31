<?php
// WhatsApp Brand Link Generator tool (standalone)
?>

<div class="kbt-tool kbt-whatsapp-brand-tool" id="whatsapp-brand-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Branded WhatsApp link</h3>
      <div class="kbt-tool-field">
        <label for="wa-brand-name">Brand name</label>
        <input class="kbt-tool-input" id="wa-brand-name" type="text" placeholder="Your brand">
      </div>
      <div class="kbt-tool-field">
        <label for="wa-brand-phone">Phone number</label>
        <input class="kbt-tool-input" id="wa-brand-phone" type="text" placeholder="Country code + number">
      </div>
      <div class="kbt-tool-field">
        <label for="wa-brand-message">Message</label>
        <textarea class="kbt-tool-textarea" id="wa-brand-message" rows="4" placeholder="Hi! I would like to know more about..."></textarea>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="wa-brand-generate">Generate</button>
        <button class="kbt-tool-button ghost" id="wa-brand-clear">Clear</button>
      </div>
      <div class="kbt-tool-status" id="wa-brand-status">Status: Waiting for input</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Link + QR</h3>
      <div class="kbt-tool-output" id="wa-brand-output">Your branded link will appear here.</div>
      <div class="qr-output" id="wa-brand-qr">QR preview</div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="wa-brand-copy">Copy link</button>
        <a class="kbt-tool-button primary" id="wa-brand-open" href="#" target="_blank" rel="noopener">Open WhatsApp</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const nameInput = document.getElementById('wa-brand-name');
  const phoneInput = document.getElementById('wa-brand-phone');
  const messageInput = document.getElementById('wa-brand-message');
  const generateBtn = document.getElementById('wa-brand-generate');
  const clearBtn = document.getElementById('wa-brand-clear');
  const output = document.getElementById('wa-brand-output');
  const qrBox = document.getElementById('wa-brand-qr');
  const copyBtn = document.getElementById('wa-brand-copy');
  const openBtn = document.getElementById('wa-brand-open');
  const statusEl = document.getElementById('wa-brand-status');

  if (!generateBtn) return;

  function sanitizePhone(value) {
    return value.replace(/[^0-9]/g, '');
  }

  function renderQR(link) {
    qrBox.innerHTML = '';
    if (!link || typeof QRCode === 'undefined') {
      qrBox.textContent = 'QR preview';
      return;
    }
    new QRCode(qrBox, {
      text: link,
      width: 200,
      height: 200,
      colorDark: '#111827',
      colorLight: 'transparent'
    });
  }

  function buildLink() {
    const phone = sanitizePhone(phoneInput.value);
    if (!phone) {
      statusEl.textContent = 'Status: Enter a valid phone number';
      output.textContent = 'Your branded link will appear here.';
      renderQR(null);
      openBtn.href = '#';
      return;
    }
    const brand = nameInput.value.trim();
    const message = messageInput.value.trim();
    const intro = brand ? `[${brand}] ` : '';
    const base = `https://wa.me/${phone}`;
    const link = message ? `${base}?text=${encodeURIComponent(intro + message)}` : base;
    output.textContent = link;
    openBtn.href = link;
    renderQR(link);
    statusEl.textContent = 'Status: Branded link ready';
  }

  generateBtn.addEventListener('click', buildLink);
  clearBtn.addEventListener('click', function () {
    nameInput.value = '';
    phoneInput.value = '';
    messageInput.value = '';
    output.textContent = 'Your branded link will appear here.';
    statusEl.textContent = 'Status: Waiting for input';
    openBtn.href = '#';
    renderQR(null);
  });

  copyBtn.addEventListener('click', function () {
    if (!output.textContent || output.textContent === 'Your branded link will appear here.') return;
    const temp = document.createElement('textarea');
    temp.value = output.textContent;
    document.body.appendChild(temp);
    temp.select();
    document.execCommand('copy');
    document.body.removeChild(temp);
    statusEl.textContent = 'Status: Link copied';
  });
});
</script>
