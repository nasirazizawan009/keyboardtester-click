<?php
$ar_labels = $ar_labels ?? [];
$L = array_merge([
  'aria' => 'Aspect ratio calculator - resolve width, height, or ratio from any two inputs',
  'instruction' => 'Edit any two of width, height, or ratio. The tool locks the most recently edited field and solves for the unedited one. Ratio accepts forms like "16:9" or "1.7778".',
  'preset' => 'Preset ratio',
  'width' => 'Width (px)',
  'height' => 'Height (px)',
  'ratio' => 'Aspect ratio',
  'simplified' => 'Simplified',
  'decimal' => 'Decimal',
  'orientation' => 'Orientation',
  'landscape' => 'Landscape',
  'portrait' => 'Portrait',
  'square' => 'Square',
  'reference' => 'Tip: enter width and height to read the ratio, or pick a preset and type one dimension to get the other. Aspect ratios like 16:9 always render identically regardless of scale — the browser just computes the other side.',
], $ar_labels);
?>
<div class="ar-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ar-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="ar-form">
    <div class="ar-field">
      <label for="ar-preset"><?php echo htmlspecialchars($L['preset'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ar-preset">
        <option value="custom">Custom</option>
        <option value="16:9" selected>16:9 (HDTV, gaming)</option>
        <option value="16:10">16:10 (productivity)</option>
        <option value="4:3">4:3 (classic)</option>
        <option value="5:4">5:4 (1280×1024)</option>
        <option value="21:9">21:9 (ultrawide)</option>
        <option value="32:9">32:9 (super ultrawide)</option>
        <option value="1:1">1:1 (square)</option>
        <option value="9:16">9:16 (mobile portrait)</option>
        <option value="3:2">3:2 (DSLR, Surface)</option>
        <option value="2:3">2:3 (film still)</option>
      </select>
    </div>
    <div class="ar-field">
      <label for="ar-w"><?php echo htmlspecialchars($L['width'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ar-w" min="1" max="100000" step="1" value="1920">
    </div>
    <div class="ar-field">
      <label for="ar-h"><?php echo htmlspecialchars($L['height'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ar-h" min="1" max="100000" step="1" value="1080">
    </div>
    <div class="ar-field">
      <label for="ar-r"><?php echo htmlspecialchars($L['ratio'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="text" id="ar-r" value="16:9" inputmode="text">
    </div>
  </div>
  <div class="ar-results">
    <div class="ar-stat primary"><div class="ar-stat-label"><?php echo htmlspecialchars($L['simplified'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ar-stat-value" id="ar-simple">16:9</div></div>
    <div class="ar-stat"><div class="ar-stat-label"><?php echo htmlspecialchars($L['decimal'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ar-stat-value" id="ar-dec">1.7778</div></div>
    <div class="ar-stat"><div class="ar-stat-label"><?php echo htmlspecialchars($L['orientation'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ar-stat-value" id="ar-orient">-</div></div>
  </div>
  <div class="ar-preview" id="ar-preview">
    <div class="ar-preview-box" id="ar-preview-box"></div>
  </div>
  <div class="ar-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ar-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ar-tester *{ box-sizing:border-box; }
  .ar-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ar-form { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:900px) { .ar-form { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:520px) { .ar-form { grid-template-columns:1fr; } }
  .ar-field { display:flex; flex-direction:column; gap:6px; }
  .ar-field label { font-size:0.84rem; font-weight:600; }
  .ar-field input, .ar-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .ar-results { display:grid; grid-template-columns:repeat(3,1fr); gap:12px; }
  @media (max-width:720px) { .ar-results { grid-template-columns:1fr; } }
  .ar-stat { padding:18px 20px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; text-align:center; }
  .ar-stat.primary { background:var(--surface,#0f172a); color:#fff; border:none; }
  .ar-stat-label { font-size:0.78rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .ar-stat-value { font-size:1.8rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .ar-stat.primary .ar-stat-value { font-size:2.8rem; color:#22c55e; }
  .ar-preview { padding:24px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; display:flex; justify-content:center; align-items:center; min-height:200px; }
  .ar-preview-box { max-width:95%; max-height:400px; background:linear-gradient(135deg,#0ea5e9 0%,#22c55e 100%); border-radius:8px; box-shadow:0 8px 32px rgba(14,165,233,0.25); position:relative; display:flex; align-items:center; justify-content:center; color:#fff; font-weight:700; font-size:1.1rem; }
  .ar-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var $ = function(id){ return document.getElementById(id); };
  var presetEl = $('ar-preset'), wEl = $('ar-w'), hEl = $('ar-h'), rEl = $('ar-r');
  var simpleOut = $('ar-simple'), decOut = $('ar-dec'), orientOut = $('ar-orient');
  var previewBox = $('ar-preview-box'), preview = $('ar-preview');

  function gcd(a,b){ a=Math.abs(a); b=Math.abs(b); while(b){ var t=b; b=a%b; a=t; } return a || 1; }
  function parseRatio(s){
    if (!s) return null;
    s = s.trim();
    if (s.indexOf(':') > -1) {
      var parts = s.split(':');
      var a = parseFloat(parts[0]), b = parseFloat(parts[1]);
      if (a > 0 && b > 0) return { dec: a/b, num: a, den: b };
    }
    var f = parseFloat(s);
    if (f > 0) return { dec: f, num: f, den: 1 };
    return null;
  }
  function simplify(w, h){
    w = Math.round(w); h = Math.round(h);
    if (w <= 0 || h <= 0) return [w, h];
    var g = gcd(w, h);
    return [w/g, h/g];
  }

  var lastEdited = 'r'; // which field user touched last (w, h, or r)

  function updateFromWH(){
    var w = parseFloat(wEl.value), h = parseFloat(hEl.value);
    if (!(w > 0) || !(h > 0)) return;
    var dec = w / h;
    decOut.textContent = dec.toFixed(4);
    var s = simplify(w, h);
    simpleOut.textContent = s[0] + ':' + s[1];
    rEl.value = s[0] + ':' + s[1];
    updateOrient(dec);
    updatePreview(w, h);
  }
  function updateFromRatioAndOne(){
    var r = parseRatio(rEl.value);
    if (!r) return;
    decOut.textContent = r.dec.toFixed(4);
    // Simplified from the ratio input itself
    if (r.num !== r.num | 0 || r.den !== r.den | 0) {
      // user typed decimal; derive a nice ratio if possible
      simpleOut.textContent = r.dec.toFixed(4);
    } else {
      var s = simplify(r.num, r.den);
      simpleOut.textContent = s[0] + ':' + s[1];
    }
    if (lastEdited === 'w') {
      var w = parseFloat(wEl.value);
      if (w > 0) { hEl.value = Math.round(w / r.dec); updatePreview(w, Math.round(w / r.dec)); }
    } else {
      var h = parseFloat(hEl.value);
      if (h > 0) { wEl.value = Math.round(h * r.dec); updatePreview(Math.round(h * r.dec), h); }
    }
    updateOrient(r.dec);
  }
  function updateOrient(dec){
    if (Math.abs(dec - 1) < 0.02) orientOut.textContent = 'Square';
    else if (dec > 1) orientOut.textContent = 'Landscape';
    else orientOut.textContent = 'Portrait';
  }
  function updatePreview(w, h){
    if (!w || !h) { previewBox.style.display = 'none'; return; }
    previewBox.style.display = 'flex';
    var maxW = preview.clientWidth * 0.9, maxH = 360;
    var scale = Math.min(maxW / w, maxH / h);
    previewBox.style.width = (w * scale) + 'px';
    previewBox.style.height = (h * scale) + 'px';
    previewBox.textContent = Math.round(w) + ' × ' + Math.round(h);
  }

  wEl.addEventListener('input', function(){ lastEdited = 'w'; presetEl.value = 'custom'; updateFromWH(); });
  hEl.addEventListener('input', function(){ lastEdited = 'h'; presetEl.value = 'custom'; updateFromWH(); });
  rEl.addEventListener('input', function(){ lastEdited = 'r'; presetEl.value = 'custom'; updateFromRatioAndOne(); });
  presetEl.addEventListener('change', function(){
    if (presetEl.value === 'custom') return;
    rEl.value = presetEl.value;
    lastEdited = 'r';
    updateFromRatioAndOne();
  });
  window.addEventListener('resize', function(){
    var w = parseFloat(wEl.value), h = parseFloat(hEl.value);
    updatePreview(w, h);
  });
  updateFromWH();
})();
</script>
