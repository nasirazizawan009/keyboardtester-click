<?php
$vd_labels = $vd_labels ?? [];
$L = array_merge([
  'aria' => 'Viewing distance calculator',
  'instruction' => 'Enter your screen diagonal size and resolution. The tool returns THX optimal (36° horizontal FoV), SMPTE cinema (30°), and the 4K-resolving distance (where you can start to distinguish 4K pixels from 1080p).',
  'diagonal' => 'Screen diagonal',
  'resolution' => 'Native resolution',
  'unit' => 'Unit',
  'thx' => 'THX optimal (36° FoV)',
  'smpte' => 'SMPTE cinema (30° FoV)',
  'uhd4k' => '4K UHD max distance',
  'min_4k' => 'Beyond this you cannot distinguish 4K from 1080p',
  'angle' => 'Viewing angle at THX distance',
  'reference' => 'Tip: THX targets a 36° horizontal FoV (immersive). SMPTE targets 30° (comfortable cinema). If you sit further than the 4K UHD max, you get no visible benefit from a 4K panel vs 1080p at the same size.',
], $vd_labels);
?>
<div class="vd-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="vd-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="vd-form">
    <div class="vd-field">
      <label for="vd-diag"><?php echo htmlspecialchars($L['diagonal'], ENT_QUOTES, 'UTF-8'); ?></label>
      <div class="vd-dist-row">
        <input type="number" id="vd-diag" min="5" max="200" step="0.5" value="55">
        <select id="vd-unit">
          <option value="in" selected>inches</option>
          <option value="cm">cm</option>
        </select>
      </div>
    </div>
    <div class="vd-field">
      <label for="vd-res"><?php echo htmlspecialchars($L['resolution'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="vd-res">
        <option value="720">720p (1280×720)</option>
        <option value="1080" selected>1080p (1920×1080)</option>
        <option value="1440">1440p (2560×1440)</option>
        <option value="2160">4K UHD (3840×2160)</option>
        <option value="4320">8K UHD (7680×4320)</option>
      </select>
    </div>
  </div>

  <div class="vd-results">
    <div class="vd-stat primary"><div class="vd-stat-label"><?php echo htmlspecialchars($L['thx'], ENT_QUOTES, 'UTF-8'); ?></div><div class="vd-stat-value" id="vd-thx">-</div></div>
    <div class="vd-stat"><div class="vd-stat-label"><?php echo htmlspecialchars($L['smpte'], ENT_QUOTES, 'UTF-8'); ?></div><div class="vd-stat-value" id="vd-smpte">-</div></div>
    <div class="vd-stat"><div class="vd-stat-label"><?php echo htmlspecialchars($L['uhd4k'], ENT_QUOTES, 'UTF-8'); ?></div><div class="vd-stat-value" id="vd-4k">-</div><div class="vd-stat-sub" id="vd-4k-sub"></div></div>
    <div class="vd-stat"><div class="vd-stat-label"><?php echo htmlspecialchars($L['angle'], ENT_QUOTES, 'UTF-8'); ?></div><div class="vd-stat-value" id="vd-angle">-</div></div>
  </div>
  <div class="vd-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .vd-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .vd-tester *{ box-sizing:border-box; }
  .vd-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .vd-form { display:grid; grid-template-columns:repeat(2,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:520px) { .vd-form { grid-template-columns:1fr; } }
  .vd-field { display:flex; flex-direction:column; gap:6px; }
  .vd-field label { font-size:0.84rem; font-weight:600; }
  .vd-field input, .vd-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .vd-dist-row { display:flex; gap:8px; }
  .vd-dist-row input { flex:1; min-width:0; }
  .vd-dist-row select { width:95px; }
  .vd-results { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; }
  @media (max-width:900px) { .vd-results { grid-template-columns:1fr 1fr; } }
  @media (max-width:520px) { .vd-results { grid-template-columns:1fr; } }
  .vd-stat { padding:18px 16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; text-align:center; }
  .vd-stat.primary { background:var(--surface,#0f172a); color:#fff; border:none; }
  .vd-stat-label { font-size:0.76rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; line-height:1.3; }
  .vd-stat-value { font-size:1.4rem; font-weight:800; font-variant-numeric:tabular-nums; }
  .vd-stat.primary .vd-stat-value { color:#22c55e; font-size:1.8rem; }
  .vd-stat-sub { font-size:0.8rem; color:#94a3b8; margin-top:4px; line-height:1.3; }
  .vd-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var $ = function(id){ return document.getElementById(id); };
  var diagEl = $('vd-diag'), unitEl = $('vd-unit'), resEl = $('vd-res');
  var thxOut = $('vd-thx'), smpteOut = $('vd-smpte'), k4Out = $('vd-4k'), k4SubOut = $('vd-4k-sub'), angleOut = $('vd-angle');

  // For 16:9 displays. Diagonal -> width factor:
  var DIAG_TO_W = 16 / Math.sqrt(16*16 + 9*9); // 0.8716

  function fmt(inches){
    if (!isFinite(inches) || inches <= 0) return '-';
    var ft = inches / 12;
    var m = inches * 0.0254;
    return ft.toFixed(1) + ' ft  /  ' + m.toFixed(2) + ' m';
  }

  function calc(){
    var d = parseFloat(diagEl.value);
    var unit = unitEl.value;
    var vRes = parseFloat(resEl.value) || 1080;
    if (!(d > 0)) { thxOut.textContent = smpteOut.textContent = k4Out.textContent = angleOut.textContent = '-'; return; }
    var diagIn = unit === 'cm' ? d / 2.54 : d;
    var widthIn = diagIn * DIAG_TO_W;

    // Distance for target horizontal FoV: dist = (width/2) / tan(fov/2)
    function distAt(fovDeg){
      var r = fovDeg * Math.PI / 180;
      return (widthIn / 2) / Math.tan(r / 2);
    }
    var thx = distAt(36);      // THX recommends 36° horizontal
    var smpte = distAt(30);    // SMPTE recommends 30°
    // 4K resolving distance: 1 arcminute per pixel -> distance where vertical pixel = 1 arcminute
    // vertical resolution in pixels, screen vertical height = diagIn * (9/sqrt(337))
    var heightIn = diagIn * (9 / Math.sqrt(16*16 + 9*9));
    // pixel_height = heightIn / vRes inches
    var pxHeight = heightIn / vRes;
    // 1 arcminute = (1/60) degrees; tan(1 arcmin / 2) ~ 1 arcmin/2 in radians for small angles
    var arcminRad = (1/60) * Math.PI / 180;
    var maxDist4K = pxHeight / Math.tan(arcminRad); // inches

    thxOut.textContent = fmt(thx);
    smpteOut.textContent = fmt(smpte);
    k4Out.textContent = fmt(maxDist4K);
    // Label which resolution this "max distance" applies to
    var labelName = (vRes >= 4320 ? '8K' : (vRes >= 2160 ? '4K' : (vRes >= 1440 ? '1440p' : (vRes >= 1080 ? '1080p' : '720p'))));
    k4SubOut.textContent = 'Beyond this distance, ' + labelName + ' resolution is wasted';
    // Viewing angle at THX distance is 36 by definition — but compute actual for comparison
    angleOut.textContent = '36° H (THX)';
  }

  [diagEl, unitEl, resEl].forEach(function(el){ el.addEventListener('input', calc); el.addEventListener('change', calc); });
  calc();
})();
</script>
