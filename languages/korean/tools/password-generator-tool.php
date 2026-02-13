<?php
// Password Generator tool (standalone)
?>

<div class="kbt-tool kbt-password-tool" id="password-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>생성기 설정</h3>
      <div class="kbt-tool-field">
        <label for="pass-length">길이</label>
        <input class="kbt-tool-input" id="pass-length" type="number" min="6" max="64" value="16">
      </div>
      <div class="kbt-tool-checklist">
        <label><input type="checkbox" id="pass-lower" checked> 소문자 (a-z)</label>
        <label><input type="checkbox" id="pass-upper" checked> 대문자 (A-Z)</label>
        <label><input type="checkbox" id="pass-number" checked> 숫자 (0-9)</label>
        <label><input type="checkbox" id="pass-symbol" checked> 기호 (!@#)</label>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="pass-generate">생성</button>
        <button class="kbt-tool-button ghost" id="pass-copy">복사</button>
      </div>
      <div class="kbt-tool-status" id="pass-strength">강도: --</div>
    </div>
    <div class="kbt-tool-card">
      <h3>생성된 비밀번호</h3>
      <input class="kbt-tool-input" id="pass-output" type="text" readonly placeholder="비밀번호가 여기에 표시됩니다">
      <p class="kbt-tool-note">팁: 강력한 비밀번호를 저장하려면 비밀번호 관리자를 사용하세요.</p>
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
    if (score >= 60) return '강도: 강함';
    if (score >= 40) return '강도: 양호';
    if (score >= 28) return '강도: 보통';
    return '강도: 약함';
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
      strength.textContent = '강도: 최소 하나의 옵션을 선택하세요';
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
    strength.textContent = '강도: 복사됨';
  });

  generate();
});
</script>
