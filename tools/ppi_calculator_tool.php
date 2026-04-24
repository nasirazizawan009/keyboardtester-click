<?php
$ppi_labels = $ppi_labels ?? [];
$L = array_merge([
  'aria' => 'PPI calculator - pixels per inch from resolution and diagonal size',
  'instruction' => 'Enter horizontal resolution, vertical resolution, and diagonal size (in inches). PPI = square root of (w² + h²) divided by the diagonal.',
  'preset' => 'Common displays',
  'preset_custom' => 'Custom',
  'width' => 'Horizontal pixels',
  'height' => 'Vertical pixels',
  'diagonal' => 'Diagonal (inches)',
  'diagonal_cm' => 'Diagonal (cm)',
  'ppi' => 'Pixels per inch (PPI)',
  'dot_pitch' => 'Dot pitch',
  'aspect' => 'Aspect ratio',
  'megapixels' => 'Total pixels',
  'density_tier' => 'Density tier',
  'tier_low' => 'Low density (below 100 PPI)',
  'tier_standard' => 'Standard (100-150 PPI)',
  'tier_high' => 'High density (150-220 PPI)',
  'tier_retina' => 'Retina / 4K tier (220+ PPI)',
  'unit' => 'Unit',
  'reference' => 'Tip: Apple considers a display "Retina" at roughly 220 PPI for laptops, 300 PPI for phones. Typical 1080p 24" monitors are ~92 PPI; 4K 27" is ~163 PPI.',
], $ppi_labels);
?>
<div class="ppi-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ppi-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="ppi-form">
    <div class="ppi-field">
      <label for="ppi-preset"><?php echo htmlspecialchars($L['preset'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="ppi-preset">
        <option value="custom"><?php echo htmlspecialchars($L['preset_custom'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="1920x1080@24">1080p @ 24"</option>
        <option value="1920x1080@27">1080p @ 27"</option>
        <option value="2560x1440@27">1440p @ 27"</option>
        <option value="2560x1440@32">1440p @ 32"</option>
        <option value="3440x1440@34">Ultrawide 1440p @ 34"</option>
        <option value="3840x2160@27">4K @ 27"</option>
        <option value="3840x2160@32">4K @ 32"</option>
        <option value="3840x2160@42">4K @ 42"</option>
        <option value="5120x2160@34">5K2K @ 34"</option>
        <option value="2560x1600@13">MBP 13" 2560x1600</option>
        <option value="3456x2234@14">MBP 14" 3456x2234</option>
        <option value="1284x2778@6">iPhone 14 Pro 6.1"</option>
      </select>
    </div>
    <div class="ppi-field">
      <label for="ppi-w"><?php echo htmlspecialchars($L['width'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ppi-w" min="1" max="16384" step="1" value="3840">
    </div>
    <div class="ppi-field">
      <label for="ppi-h"><?php echo htmlspecialchars($L['height'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ppi-h" min="1" max="16384" step="1" value="2160">
    </div>
    <div class="ppi-field">
      <label for="ppi-d"><?php echo htmlspecialchars($L['diagonal'], ENT_QUOTES, 'UTF-8'); ?></label>
      <div class="ppi-dist-row">
        <input type="number" id="ppi-d" min="0.1" max="200" step="0.1" value="27">
        <select id="ppi-unit">
          <option value="in" selected>in</option>
          <option value="cm">cm</option>
        </select>
      </div>
    </div>
  </div>

  <div class="ppi-results">
    <div class="ppi-stat primary">
      <div class="ppi-stat-label"><?php echo htmlspecialchars($L['ppi'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="ppi-stat-value" id="ppi-ppi">163</div>
    </div>
    <div class="ppi-stat"><div class="ppi-stat-label"><?php echo htmlspecialchars($L['dot_pitch'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ppi-stat-value" id="ppi-pitch">-</div></div>
    <div class="ppi-stat"><div class="ppi-stat-label"><?php echo htmlspecialchars($L['aspect'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ppi-stat-value" id="ppi-aspect">-</div></div>
    <div class="ppi-stat"><div class="ppi-stat-label"><?php echo htmlspecialchars($L['megapixels'], ENT_QUOTES, 'UTF-8'); ?></div><div class="ppi-stat-value" id="ppi-mp">-</div></div>
  </div>

  <div class="ppi-tier" id="ppi-tier"><?php echo htmlspecialchars($L['tier_high'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="ppi-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ppi-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ppi-tester *{ box-sizing:border-box; }
  .ppi-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ppi-form { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:900px) { .ppi-form { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:520px) { .ppi-form { grid-template-columns:1fr; } }
  .ppi-field { display:flex; flex-direction:column; gap:6px; }
  .ppi-field label { font-size:0.84rem; font-weight:600; }
  .ppi-field input, .ppi-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .ppi-dist-row { display:flex; gap:8px; }
  .ppi-dist-row input { flex:1; min-width:0; }
  .ppi-dist-row select { width:72px; }
  .ppi-results { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; }
  @media (max-width:720px) { .ppi-results { grid-template-columns:1fr 1fr; } }
  .ppi-stat { padding:18px 20px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; text-align:center; }
  .ppi-stat.primary { background:var(--surface,#0f172a); color:#fff; border:none; }
  .ppi-stat-label { font-size:0.78rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .ppi-stat-value { font-size:1.8rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .ppi-stat.primary .ppi-stat-value { font-size:3rem; color:#22c55e; }
  .ppi-tier { padding:12px 16px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.95rem; color:#14532d; font-weight:600; text-align:center; }
  .ppi-tier.is-low { background:#fef9c3; border-color:#fde68a; border-left-color:#d97706; color:#713f12; }
  .ppi-tier.is-standard { background:#e0f2fe; border-color:#bae6fd; border-left-color:#0284c7; color:#075985; }
  .ppi-tier.is-retina { background:#f3e8ff; border-color:#d8b4fe; border-left-color:#7c3aed; color:#581c87; }
  .ppi-note { padding:10px 14px; background:#fff; border:1px solid var(--border-color,#e2e8f0); border-left:4px solid #64748b; border-radius:10px; font-size:0.88rem; color:#475569; }
</style>
<script>
(function(){
  var $ = function(id){ return document.getElementById(id); };
  var presetEl = $('ppi-preset'), wEl = $('ppi-w'), hEl = $('ppi-h'), dEl = $('ppi-d'), unitEl = $('ppi-unit');
  var ppiOut = $('ppi-ppi'), pitchOut = $('ppi-pitch'), aspectOut = $('ppi-aspect'), mpOut = $('ppi-mp'), tierOut = $('ppi-tier');
  var L = {
    low: <?php echo json_encode($L['tier_low']); ?>,
    standard: <?php echo json_encode($L['tier_standard']); ?>,
    high: <?php echo json_encode($L['tier_high']); ?>,
    retina: <?php echo json_encode($L['tier_retina']); ?>,
  };

  function gcd(a,b){ a=Math.abs(a); b=Math.abs(b); while(b){ var t=b; b=a%b; a=t; } return a || 1; }

  function calc(){
    var w = parseFloat(wEl.value) || 0;
    var h = parseFloat(hEl.value) || 0;
    var d = parseFloat(dEl.value) || 0;
    var diagIn = unitEl.value === 'cm' ? d / 2.54 : d;
    if (w <= 0 || h <= 0 || diagIn <= 0) {
      ppiOut.textContent = '-'; pitchOut.textContent = '-'; aspectOut.textContent = '-'; mpOut.textContent = '-';
      return;
    }
    var diagonalPx = Math.sqrt(w*w + h*h);
    var ppi = diagonalPx / diagIn;
    ppiOut.textContent = ppi.toFixed(1);
    // Dot pitch in microns: 25400 microns per inch / PPI
    var pitch = 25400 / ppi;
    pitchOut.textContent = pitch.toFixed(3) + ' mm';
    // Aspect ratio simplified
    var g = gcd(Math.round(w), Math.round(h));
    aspectOut.textContent = (w/g) + ':' + (h/g);
    // Megapixels
    var mp = (w * h) / 1e6;
    mpOut.textContent = mp.toFixed(2) + ' MP';
    // Density tier
    var cls = 'ppi-tier', text = L.high;
    if (ppi < 100) { cls += ' is-low'; text = L.low; }
    else if (ppi < 150) { cls += ' is-standard'; text = L.standard; }
    else if (ppi < 220) { text = L.high; }
    else { cls += ' is-retina'; text = L.retina; }
    tierOut.className = cls;
    tierOut.textContent = text + ' — ' + ppi.toFixed(0) + ' PPI';
  }

  presetEl.addEventListener('change', function(){
    var v = presetEl.value;
    if (v === 'custom') return;
    var m = v.match(/^(\d+)x(\d+)@(\d+(?:\.\d+)?)$/);
    if (m) { wEl.value = m[1]; hEl.value = m[2]; dEl.value = m[3]; unitEl.value = 'in'; calc(); }
  });
  [wEl, hEl, dEl, unitEl].forEach(function(el){
    el.addEventListener('input', function(){ presetEl.value = 'custom'; calc(); });
    el.addEventListener('change', function(){ presetEl.value = 'custom'; calc(); });
  });
  calc();
})();
</script>
