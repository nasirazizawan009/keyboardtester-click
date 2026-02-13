<?php
// Password Generator tool (standalone)
?>

<div class="kbt-tool kbt-password-tool" id="password-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Configuracion del generador</h3>
      <div class="kbt-tool-field">
        <label for="pass-length">Longitud</label>
        <input class="kbt-tool-input" id="pass-length" type="number" min="6" max="64" value="16">
      </div>
      <div class="kbt-tool-checklist">
        <label><input type="checkbox" id="pass-lower" checked> Minusculas (a-z)</label>
        <label><input type="checkbox" id="pass-upper" checked> Mayusculas (A-Z)</label>
        <label><input type="checkbox" id="pass-number" checked> Numeros (0-9)</label>
        <label><input type="checkbox" id="pass-symbol" checked> Simbolos (!@#)</label>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="pass-generate">Generar</button>
        <button class="kbt-tool-button ghost" id="pass-copy">Copiar</button>
      </div>
      <div class="kbt-tool-status" id="pass-strength">Seguridad: --</div>
    </div>
    <div class="kbt-tool-card">
      <h3>Contrasena generada</h3>
      <input class="kbt-tool-input" id="pass-output" type="text" readonly placeholder="Tu contrasena aparece aqui">
      <p class="kbt-tool-note">Consejo: Usa un gestor de contrasenas para almacenar contrasenas seguras.</p>
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
    if (score >= 60) return 'Seguridad: Fuerte';
    if (score >= 40) return 'Seguridad: Buena';
    if (score >= 28) return 'Seguridad: Regular';
    return 'Seguridad: Debil';
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
      strength.textContent = 'Seguridad: Selecciona al menos un conjunto';
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
    strength.textContent = 'Seguridad: Copiado';
  });

  generate();
});
</script>
