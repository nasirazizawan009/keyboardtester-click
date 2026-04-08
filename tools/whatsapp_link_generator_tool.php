<?php
// WhatsApp Link Generator tool (standalone)
?>

<div class="kbt-tool kbt-whatsapp-tool" id="whatsapp-link-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Create WhatsApp link</h3>
      <div class="kbt-tool-field">
        <label for="wa-phone">Phone number</label>
        <input class="kbt-tool-input" id="wa-phone" type="text" placeholder="Country code + number (e.g., 15551234567)">
      </div>
      <div class="kbt-tool-field">
        <label for="wa-message">Message (optional)</label>
        <textarea class="kbt-tool-textarea" id="wa-message" rows="4" placeholder="Hello! I have a question about..."></textarea>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="wa-generate">Generate link</button>
        <button class="kbt-tool-button ghost" id="wa-clear">Clear</button>
      </div>
      <div class="kbt-tool-status" id="wa-status">Status: Waiting for input</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Result</h3>
      <div class="kbt-tool-output" id="wa-output">Your link will appear here.</div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button ghost" id="wa-copy">Copy link</button>
        <a class="kbt-tool-button primary" id="wa-open" href="#" target="_blank" rel="noopener">Open WhatsApp</a>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const phoneInput = document.getElementById('wa-phone');
  const messageInput = document.getElementById('wa-message');
  const generateBtn = document.getElementById('wa-generate');
  const clearBtn = document.getElementById('wa-clear');
  const output = document.getElementById('wa-output');
  const copyBtn = document.getElementById('wa-copy');
  const openBtn = document.getElementById('wa-open');
  const statusEl = document.getElementById('wa-status');

  if (!generateBtn) return;

  function sanitizePhone(value) {
    return value.replace(/[^0-9]/g, '');
  }

  function buildLink() {
    const phone = sanitizePhone(phoneInput.value);
    if (!phone) {
      statusEl.textContent = 'Status: Enter a valid phone number';
      output.textContent = 'Your link will appear here.';
      openBtn.href = '#';
      return;
    }
    const message = messageInput.value.trim();
    const base = `https://wa.me/${phone}`;
    const link = message ? `${base}?text=${encodeURIComponent(message)}` : base;
    output.textContent = link;
    openBtn.href = link;
    statusEl.textContent = 'Status: Link ready';
  }

  generateBtn.addEventListener('click', buildLink);
  clearBtn.addEventListener('click', function () {
    phoneInput.value = '';
    messageInput.value = '';
    output.textContent = 'Your link will appear here.';
    statusEl.textContent = 'Status: Waiting for input';
    openBtn.href = '#';
  });

  copyBtn.addEventListener('click', function () {
    if (!output.textContent || output.textContent === 'Your link will appear here.') return;
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
