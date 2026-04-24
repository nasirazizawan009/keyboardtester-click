<?php
$rt_labels = $rt_labels ?? [];
$L = array_merge([
  'aria' => 'Screen resolution test',
  'instruction' => 'All values update live. Resize the window or zoom to watch the viewport and DPR change.',
  'screen_size' => 'Screen resolution',
  'native_res' => 'Native pixel resolution',
  'viewport' => 'Viewport (this tab)',
  'dpr' => 'Device pixel ratio',
  'color_depth' => 'Color depth',
  'color_gamut' => 'Color gamut',
  'pixel_depth' => 'Pixel depth',
  'orientation' => 'Orientation',
  'aspect' => 'Screen aspect ratio',
  'avail' => 'Available screen',
  'reference' => 'Tip: DPR (device pixel ratio) multiplies CSS pixels to physical pixels. A Retina / 4K phone usually has DPR 2-3. Native resolution = screen × DPR. Browser zoom also changes DPR in modern browsers.',
], $rt_labels);
?>
<div class="rt-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="rt-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="rt-primary">
    <div class="rt-hero-label"><?php echo htmlspecialchars($L['native_res'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="rt-hero-value" id="rt-native">—</div>
  </div>

  <div class="rt-grid">
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['screen_size'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-screen">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['viewport'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-viewport">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['dpr'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-dpr">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['color_depth'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-depth">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['color_gamut'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-gamut">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['orientation'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-orient">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['aspect'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-aspect">-</div></div>
    <div class="rt-card"><div class="rt-card-label"><?php echo htmlspecialchars($L['avail'], ENT_QUOTES, 'UTF-8'); ?></div><div class="rt-card-value" id="rt-avail">-</div></div>
  </div>

  <div class="rt-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .rt-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .rt-tester *{ box-sizing:border-box; }
  .rt-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .rt-primary { padding:26px 20px; background:var(--surface,#0f172a); color:#fff; border-radius:12px; text-align:center; }
  .rt-hero-label { font-size:0.82rem; text-transform:uppercase; letter-spacing:0.08em; color:#94a3b8; margin-bottom:10px; }
  .rt-hero-value { font-size:3rem; font-weight:900; color:#22c55e; font-variant-numeric:tabular-nums; line-height:1.1; }
  .rt-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:12px; }
  @media (max-width:900px) { .rt-grid { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:520px) { .rt-grid { grid-template-columns:1fr; } }
  .rt-card { padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:10px; text-align:center; }
  .rt-card-label { font-size:0.74rem; text-transform:uppercase; letter-spacing:0.05em; color:#94a3b8; margin-bottom:6px; }
  .rt-card-value { font-size:1.2rem; font-weight:700; font-variant-numeric:tabular-nums; }
  .rt-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  function gcd(a,b){ a=Math.abs(a); b=Math.abs(b); while(b){ var t=b; b=a%b; a=t; } return a || 1; }
  function gamut(){
    try {
      if (window.matchMedia('(color-gamut: rec2020)').matches) return 'Rec. 2020';
      if (window.matchMedia('(color-gamut: p3)').matches) return 'DCI-P3';
      if (window.matchMedia('(color-gamut: srgb)').matches) return 'sRGB';
    } catch(_){}
    return 'unknown';
  }
  function orient(){
    try {
      if (screen.orientation && screen.orientation.type) return screen.orientation.type.replace('-', ' ');
      return window.innerWidth >= window.innerHeight ? 'landscape' : 'portrait';
    } catch(_){ return '-'; }
  }
  function render(){
    var w = screen.width, h = screen.height;
    var dpr = window.devicePixelRatio || 1;
    var natW = Math.round(w * dpr), natH = Math.round(h * dpr);
    document.getElementById('rt-native').textContent = natW + ' × ' + natH;
    document.getElementById('rt-screen').textContent = w + ' × ' + h + ' CSS px';
    document.getElementById('rt-viewport').textContent = window.innerWidth + ' × ' + window.innerHeight;
    document.getElementById('rt-dpr').textContent = dpr.toFixed(3);
    document.getElementById('rt-depth').textContent = (screen.colorDepth || 24) + ' bpp';
    document.getElementById('rt-gamut').textContent = gamut();
    document.getElementById('rt-orient').textContent = orient();
    var g = gcd(w, h);
    document.getElementById('rt-aspect').textContent = (w/g) + ':' + (h/g);
    document.getElementById('rt-avail').textContent = screen.availWidth + ' × ' + screen.availHeight;
  }
  render();
  window.addEventListener('resize', render);
  if (screen.orientation && screen.orientation.addEventListener) screen.orientation.addEventListener('change', render);
})();
</script>
