<?php
$ss_labels = $ss_labels ?? [];
$L = array_merge([
  'aria' => 'Screen size calculator - compute diagonal, width, and height from aspect ratio plus one measurement',
  'instruction' => 'Pick your aspect ratio, then type a diagonal OR width OR height. The other two fill in instantly, in both inches and centimeters. Area is also calculated so you can compare the visible surface of two TVs or monitors.',
  'aspect' => 'Aspect ratio',
  'measured' => 'I know the',
  'measure_diagonal' => 'diagonal',
  'measure_width' => 'width',
  'measure_height' => 'height',
  'value' => 'Value',
  'unit' => 'Unit',
  'diagonal' => 'Diagonal',
  'width' => 'Width',
  'height' => 'Height',
  'area' => 'Visible area',
  'reference' => 'Tip: TV manufacturers advertise the diagonal in inches, but what actually matters for viewing distance is the width. A 55" 16:9 TV is 48" wide — very different from a 55" 21:9 ultrawide.',
], $ss_labels);
?>
<div class="ss-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ss-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="ss-form">
    <div class="ss-field">
      <label for="ss-aspect"><?php echo htmlspecialchars($L['aspect'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ss-aspect">
        <option value="16:9" selected>16:9 (HDTV, gaming)</option>
        <option value="16:10">16:10 (productivity)</option>
        <option value="4:3">4:3 (classic)</option>
        <option value="21:9">21:9 (ultrawide)</option>
        <option value="32:9">32:9 (super-ultrawide)</option>
        <option value="5:4">5:4</option>
        <option value="3:2">3:2 (DSLR, Surface)</option>
        <option value="1:1">1:1 (square)</option>
        <option value="9:16">9:16 (phone portrait)</option>
      </select>
    </div>
    <div class="ss-field">
      <label for="ss-measure"><?php echo htmlspecialchars($L['measured'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ss-measure">
        <option value="d" selected><?php echo htmlspecialchars($L['measure_diagonal'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="w"><?php echo htmlspecialchars($L['measure_width'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="h"><?php echo htmlspecialchars($L['measure_height'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="ss-field">
      <label for="ss-value"><?php echo htmlspecialchars($L['value'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ss-value" min="0.1" max="1000" step="0.1" value="27">
    </div>
    <div class="ss-field">
      <label for="ss-unit"><?php echo htmlspecialchars($L['unit'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ss-unit">
        <option value="in" selected>inches</option>
        <option value="cm">cm</option>
      </select>
    </div>
  </div>

  <div class="ss-results">
    <div class="ss-stat"><div class="ss-stat-label"><?php echo htmlspecialchars($L['diagonal'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ss-stat-value" id="ss-diag">-</div></div>
    <div class="ss-stat"><div class="ss-stat-label"><?php echo htmlspecialchars($L['width'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ss-stat-value" id="ss-w">-</div></div>
    <div class="ss-stat"><div class="ss-stat-label"><?php echo htmlspecialchars($L['height'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ss-stat-value" id="ss-h">-</div></div>
    <div class="ss-stat primary"><div class="ss-stat-label"><?php echo htmlspecialchars($L['area'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ss-stat-value" id="ss-area">-</div></div>
  </div>
  <div class="ss-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ss-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ss-tester *{ box-sizing:border-box; }
  .ss-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ss-form { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:900px) { .ss-form { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:520px) { .ss-form { grid-template-columns:1fr; } }
  .ss-field { display:flex; flex-direction:column; gap:6px; }
  .ss-field label { font-size:0.84rem; font-weight:600; }
  .ss-field input, .ss-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .ss-results { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; }
  @media (max-width:720px) { .ss-results { grid-template-columns:1fr 1fr; } }
  .ss-stat { padding:18px 16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; text-align:center; }
  .ss-stat.primary { background:var(--surface,#0f172a); color:#fff; border:none; }
  .ss-stat-label { font-size:0.78rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .ss-stat-value { font-size:1.3rem; font-weight:800; font-variant-numeric:tabular-nums; line-height:1.2; }
  .ss-stat.primary .ss-stat-value { color:#22c55e; font-size:1.6rem; }
  .ss-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var $ = function(id){ return document.getElementById(id); };
  var aspectEl = $('ss-aspect'), measureEl = $('ss-measure'), valueEl = $('ss-value'), unitEl = $('ss-unit');
  var diagOut = $('ss-diag'), wOut = $('ss-w'), hOut = $('ss-h'), areaOut = $('ss-area');

  function parseAspect(s){
    var p = s.split(':'); return [parseFloat(p[0]), parseFloat(p[1])];
  }

  function fmtPair(inches){
    if (!isFinite(inches) || inches <= 0) return '-';
    var cm = inches * 2.54;
    return inches.toFixed(2) + '"  /  ' + cm.toFixed(1) + ' cm';
  }
  function fmtArea(inches_w, inches_h){
    if (!(inches_w > 0) || !(inches_h > 0)) return '-';
    var sqIn = inches_w * inches_h;
    var sqCm = sqIn * 6.4516;
    return sqIn.toFixed(1) + ' in²  /  ' + sqCm.toFixed(0) + ' cm²';
  }

  function calc(){
    var ar = parseAspect(aspectEl.value);
    if (!ar[0] || !ar[1]) return;
    var ratio = ar[0] / ar[1]; // w/h
    var v = parseFloat(valueEl.value);
    if (!(v > 0)) { diagOut.textContent = wOut.textContent = hOut.textContent = areaOut.textContent = '-'; return; }
    // Convert input to inches
    var inches = unitEl.value === 'cm' ? v / 2.54 : v;
    var w, h, d;
    // Given aspect w/h and one value, solve the other two.
    // diag = sqrt(w^2 + h^2); h = w / ratio; diag = w * sqrt(1 + 1/ratio^2)
    var diagToW = 1 / Math.sqrt(1 + 1 / (ratio * ratio));
    if (measureEl.value === 'd') {
      d = inches;
      w = d * diagToW;
      h = w / ratio;
    } else if (measureEl.value === 'w') {
      w = inches;
      h = w / ratio;
      d = Math.sqrt(w*w + h*h);
    } else {
      h = inches;
      w = h * ratio;
      d = Math.sqrt(w*w + h*h);
    }
    diagOut.textContent = fmtPair(d);
    wOut.textContent = fmtPair(w);
    hOut.textContent = fmtPair(h);
    areaOut.textContent = fmtArea(w, h);
  }

  [aspectEl, measureEl, valueEl, unitEl].forEach(function(el){
    el.addEventListener('input', calc); el.addEventListener('change', calc);
  });
  calc();
})();
</script>
