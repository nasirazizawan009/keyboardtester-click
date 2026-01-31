<?php
// Password Generator tool (standalone)
?>

<div class="kbt-tool kbt-password-tool" id="password-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Generator settings</h3>
      <div class="kbt-tool-field">
        <label for="pass-length">Length</label>
        <input class="kbt-tool-input" id="pass-length" type="number" min="6" max="64" value="16">
      </div>
      <div class="kbt-tool-checklist">
        <label><input type="checkbox" id="pass-lower" checked> Lowercase (a-z)</label>
        <label><input type="checkbox" id="pass-upper" checked> Uppercase (A-Z)</label>
        <label><input type="checkbox" id="pass-number" checked> Numbers (0-9)</label>
        <label><input type="checkbox" id="pass-symbol" checked> Symbols (!@#)</label>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="pass-generate">Generate</button>
        <button class="kbt-tool-button ghost" id="pass-copy">Copy</button>
      </div>
      <div class="kbt-tool-status" id="pass-strength">Strength: --</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Generated password</h3>
      <input class="kbt-tool-input" id="pass-output" type="text" readonly placeholder="Your password appears here">
      <p class="kbt-tool-note">Tip: Use a password manager to store strong passwords.</p>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const lengthInput = document.getElementById('pass-length');
  const lower = document.getElementById('pass-lower');
  const upper = document.getElementById('pass-upper');
  const number = document.getElementById('pass-number');
  const symbol = document.getElementById('pass-symbol');
  const generateBtn = document.getElementById('pass-generate');
  const copyBtn = document.getElementById('pass-copy');
  const output = document.getElementById('pass-output');
  const strength = document.getElementById('pass-strength');

  if (!generateBtn || !output) return;

  const sets = {
    lower: 'abcdefghijklmnopqrstuvwxyz',
    upper: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    number: '0123456789',
    symbol: '!@#$%^&*()_+-=[]{},.<>?'
  };

  function shuffle(array) {
    for (let i = array.length - 1; i > 0; i -= 1) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }

  function getStrength(length, types) {
    const score = length + types * 8;
    if (score >= 60) return 'Strength: Strong';
    if (score >= 40) return 'Strength: Good';
    if (score >= 28) return 'Strength: Fair';
    return 'Strength: Weak';
  }

  function generate() {
    const length = Math.min(64, Math.max(6, parseInt(lengthInput.value, 10) || 16));
    const pools = [];
    if (lower.checked) pools.push(sets.lower);
    if (upper.checked) pools.push(sets.upper);
    if (number.checked) pools.push(sets.number);
    if (symbol.checked) pools.push(sets.symbol);
    if (pools.length === 0) {
      output.value = '';
      strength.textContent = 'Strength: Select at least one set';
      return;
    }

    const chars = [];
    pools.forEach((set) => chars.push(set[Math.floor(Math.random() * set.length)]));
    while (chars.length < length) {
      const set = pools[Math.floor(Math.random() * pools.length)];
      chars.push(set[Math.floor(Math.random() * set.length)]);
    }
    output.value = shuffle(chars).join('');
    strength.textContent = getStrength(length, pools.length);
  }

  generateBtn.addEventListener('click', generate);
  [lengthInput, lower, upper, number, symbol].forEach((el) => {
    el.addEventListener('change', generate);
  });

  copyBtn.addEventListener('click', function () {
    if (!output.value) return;
    output.select();
    document.execCommand('copy');
    strength.textContent = 'Strength: Copied';
  });

  generate();
});
</script>
