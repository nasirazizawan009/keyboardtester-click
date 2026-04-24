<?php
$cg_labels = $cg_labels ?? [];
$L = array_merge([
  'aria' => 'Crosshair generator - build a custom crosshair with live preview',
  'instruction' => 'Tweak shape, color, thickness, length and gap. Preview updates live. When you like it, download the PNG overlay or copy the CS2 console command.',
  'preset' => 'Preset',
  'preset_default' => 'Default',
  'preset_cs2_pro' => 'CS2 pro classic',
  'preset_valorant_default' => 'Valorant default',
  'preset_tenz' => 'TenZ (Valorant)',
  'preset_s1mple' => 's1mple (CS2)',
  'preset_simple_dot' => 'Simple dot',
  'preset_circle' => 'Ring / circle',
  'style' => 'Style',
  'style_cross' => 'Cross (4 lines)',
  'style_tshape' => 'T-shape (3 lines, no top)',
  'style_dot_only' => 'Dot only',
  'style_circle' => 'Circle only',
  'color' => 'Line color',
  'thickness' => 'Thickness (px)',
  'length' => 'Length (px)',
  'gap' => 'Center gap (px)',
  'dot' => 'Center dot',
  'dot_size' => 'Dot size (px)',
  'outline' => 'Outline',
  'outline_thickness' => 'Outline thickness (px)',
  'opacity' => 'Opacity (%)',
  'bg' => 'Preview background',
  'bg_dark' => 'Dark game',
  'bg_light' => 'Light grass',
  'bg_checker' => 'Checkerboard',
  'download' => 'Download PNG',
  'copy_cs2' => 'Copy CS2 console command',
  'copy_valorant' => 'Copy Valorant values',
  'copied' => 'Copied!',
  'cs2_heading' => 'CS2 / CS:GO console command',
  'valorant_heading' => 'Valorant settings (paste values in Settings > Crosshair)',
  'reference' => 'Tip: CS2 uses cl_crosshairstyle 4 for a static cross. Press the tilde key in-game to open the developer console and paste the command.',
], $cg_labels);
?>
<div class="cg-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="cg-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="cg-layout">
    <div class="cg-controls">
      <div class="cg-field">
        <label for="cg-preset"><?php echo htmlspecialchars($L['preset'], ENT_QUOTES, 'UTF-8'); ?></label>
        <select id="cg-preset">
          <option value="default"><?php echo htmlspecialchars($L['preset_default'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="cs2_pro"><?php echo htmlspecialchars($L['preset_cs2_pro'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="valorant_default"><?php echo htmlspecialchars($L['preset_valorant_default'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="tenz"><?php echo htmlspecialchars($L['preset_tenz'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="s1mple"><?php echo htmlspecialchars($L['preset_s1mple'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="simple_dot"><?php echo htmlspecialchars($L['preset_simple_dot'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="circle"><?php echo htmlspecialchars($L['preset_circle'], ENT_QUOTES, 'UTF-8'); ?></option>
        </select>
      </div>
      <div class="cg-field">
        <label for="cg-style"><?php echo htmlspecialchars($L['style'], ENT_QUOTES, 'UTF-8'); ?></label>
        <select id="cg-style">
          <option value="cross"><?php echo htmlspecialchars($L['style_cross'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="tshape"><?php echo htmlspecialchars($L['style_tshape'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="dot"><?php echo htmlspecialchars($L['style_dot_only'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="circle"><?php echo htmlspecialchars($L['style_circle'], ENT_QUOTES, 'UTF-8'); ?></option>
        </select>
      </div>
      <div class="cg-field">
        <label for="cg-color"><?php echo htmlspecialchars($L['color'], ENT_QUOTES, 'UTF-8'); ?></label>
        <input type="color" id="cg-color" value="#00ff00">
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-thickness"><?php echo htmlspecialchars($L['thickness'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-thickness-v">2</span></label>
        <input type="range" id="cg-thickness" min="1" max="8" step="1" value="2">
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-length"><?php echo htmlspecialchars($L['length'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-length-v">8</span></label>
        <input type="range" id="cg-length" min="0" max="30" step="1" value="8">
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-gap"><?php echo htmlspecialchars($L['gap'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-gap-v">3</span></label>
        <input type="range" id="cg-gap" min="0" max="20" step="1" value="3">
      </div>
      <div class="cg-field cg-field-check">
        <label><input type="checkbox" id="cg-dot"> <?php echo htmlspecialchars($L['dot'], ENT_QUOTES, 'UTF-8'); ?></label>
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-dot-size"><?php echo htmlspecialchars($L['dot_size'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-dot-size-v">2</span></label>
        <input type="range" id="cg-dot-size" min="1" max="8" step="1" value="2">
      </div>
      <div class="cg-field cg-field-check">
        <label><input type="checkbox" id="cg-outline" checked> <?php echo htmlspecialchars($L['outline'], ENT_QUOTES, 'UTF-8'); ?></label>
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-outline-thickness"><?php echo htmlspecialchars($L['outline_thickness'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-outline-thickness-v">1</span></label>
        <input type="range" id="cg-outline-thickness" min="1" max="4" step="1" value="1">
      </div>
      <div class="cg-field cg-field-range">
        <label for="cg-opacity"><?php echo htmlspecialchars($L['opacity'], ENT_QUOTES, 'UTF-8'); ?>: <span id="cg-opacity-v">100</span></label>
        <input type="range" id="cg-opacity" min="20" max="100" step="5" value="100">
      </div>
      <div class="cg-field">
        <label for="cg-bg"><?php echo htmlspecialchars($L['bg'], ENT_QUOTES, 'UTF-8'); ?></label>
        <select id="cg-bg">
          <option value="dark"><?php echo htmlspecialchars($L['bg_dark'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="light"><?php echo htmlspecialchars($L['bg_light'], ENT_QUOTES, 'UTF-8'); ?></option>
          <option value="checker"><?php echo htmlspecialchars($L['bg_checker'], ENT_QUOTES, 'UTF-8'); ?></option>
        </select>
      </div>
    </div>

    <div class="cg-preview">
      <canvas id="cg-canvas" width="320" height="320" aria-label="Crosshair preview"></canvas>
      <div class="cg-actions">
        <button type="button" id="cg-download" class="cg-btn cg-btn-primary"><?php echo htmlspecialchars($L['download'], ENT_QUOTES, 'UTF-8'); ?></button>
      </div>
    </div>
  </div>

  <div class="cg-export">
    <div class="cg-export-block">
      <div class="cg-export-head"><strong><?php echo htmlspecialchars($L['cs2_heading'], ENT_QUOTES, 'UTF-8'); ?></strong><button type="button" class="cg-btn cg-btn-copy" data-copy="cg-cs2"><?php echo htmlspecialchars($L['copy_cs2'], ENT_QUOTES, 'UTF-8'); ?></button></div>
      <textarea id="cg-cs2" readonly rows="4"></textarea>
    </div>
    <div class="cg-export-block">
      <div class="cg-export-head"><strong><?php echo htmlspecialchars($L['valorant_heading'], ENT_QUOTES, 'UTF-8'); ?></strong><button type="button" class="cg-btn cg-btn-copy" data-copy="cg-val"><?php echo htmlspecialchars($L['copy_valorant'], ENT_QUOTES, 'UTF-8'); ?></button></div>
      <textarea id="cg-val" readonly rows="6"></textarea>
    </div>
  </div>

  <div class="cg-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .cg-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .cg-tester *{ box-sizing:border-box; }
  .cg-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .cg-layout { display:grid; grid-template-columns:1fr 340px; gap:16px; }
  @media (max-width:860px) { .cg-layout { grid-template-columns:1fr; } }
  .cg-controls { display:grid; grid-template-columns:1fr 1fr; gap:12px 14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; align-content:start; }
  .cg-field { display:flex; flex-direction:column; gap:6px; }
  .cg-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .cg-field input[type="number"], .cg-field select, .cg-field input[type="color"] { padding:8px 10px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:0.95rem; }
  .cg-field input[type="color"] { padding:2px; height:40px; cursor:pointer; }
  .cg-field input[type="range"] { width:100%; }
  .cg-field-check { grid-column:span 1; flex-direction:row; align-items:center; gap:8px; }
  .cg-field-check label { display:flex; align-items:center; gap:8px; font-weight:500; }
  .cg-field-range label { font-variant-numeric:tabular-nums; }
  .cg-preview { display:flex; flex-direction:column; gap:12px; padding:16px; background:var(--surface,#0f172a); border-radius:12px; align-items:center; }
  .cg-preview canvas { border-radius:10px; background:#0f172a; width:100%; max-width:320px; aspect-ratio:1/1; height:auto; display:block; image-rendering:pixelated; }
  .cg-actions { width:100%; display:flex; gap:8px; justify-content:center; }
  .cg-btn { padding:9px 16px; border-radius:8px; font:inherit; font-weight:600; cursor:pointer; border:1px solid transparent; transition:background 0.12s, transform 0.08s; }
  .cg-btn:active { transform:translateY(1px); }
  .cg-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .cg-btn-primary:hover { background:#16a34a; color:#fff; }
  .cg-btn-copy { background:#1e293b; color:#cbd5e1; border-color:#334155; font-size:0.84rem; padding:6px 12px; }
  .cg-btn-copy:hover { background:#334155; color:#fff; }
  .cg-btn-copy.is-copied { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .cg-export { display:flex; flex-direction:column; gap:12px; }
  .cg-export-block { background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:10px; padding:12px 14px; }
  .cg-export-head { display:flex; justify-content:space-between; align-items:center; gap:10px; margin-bottom:8px; font-size:0.92rem; }
  .cg-export textarea { width:100%; padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:#0f172a; color:#bef264; font-family:ui-monospace,"SF Mono",Menlo,Consolas,monospace; font-size:0.84rem; resize:vertical; }
  .cg-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var $ = function(id){ return document.getElementById(id); };
  var ctrl = {
    preset: $('cg-preset'), style: $('cg-style'), color: $('cg-color'),
    thickness: $('cg-thickness'), length: $('cg-length'), gap: $('cg-gap'),
    dot: $('cg-dot'), dotSize: $('cg-dot-size'),
    outline: $('cg-outline'), outlineThickness: $('cg-outline-thickness'),
    opacity: $('cg-opacity'), bg: $('cg-bg'),
  };
  var labels = {
    thickness: $('cg-thickness-v'), length: $('cg-length-v'), gap: $('cg-gap-v'),
    dotSize: $('cg-dot-size-v'), outlineThickness: $('cg-outline-thickness-v'), opacity: $('cg-opacity-v'),
  };
  var canvas = $('cg-canvas'), ctx = canvas.getContext('2d');
  var cs2Out = $('cg-cs2'), valOut = $('cg-val');
  var COPIED_LABEL = <?php echo json_encode($L['copied']); ?>;

  var PRESETS = {
    default:           { style:'cross', color:'#00ff00', thickness:2, length:8,  gap:3, dot:false, dotSize:2, outline:true,  outlineThickness:1, opacity:100 },
    cs2_pro:           { style:'cross', color:'#00ff00', thickness:1, length:5,  gap:2, dot:false, dotSize:2, outline:true,  outlineThickness:1, opacity:100 },
    valorant_default:  { style:'cross', color:'#00ff00', thickness:2, length:4,  gap:3, dot:false, dotSize:2, outline:false, outlineThickness:1, opacity:100 },
    tenz:              { style:'cross', color:'#00ffff', thickness:2, length:2,  gap:1, dot:false, dotSize:2, outline:false, outlineThickness:1, opacity:100 },
    s1mple:            { style:'cross', color:'#00ff00', thickness:1, length:2,  gap:3, dot:false, dotSize:2, outline:true,  outlineThickness:1, opacity:100 },
    simple_dot:        { style:'dot',   color:'#ff0000', thickness:2, length:0,  gap:0, dot:true,  dotSize:3, outline:true,  outlineThickness:1, opacity:100 },
    circle:            { style:'circle',color:'#00ff00', thickness:2, length:12, gap:0, dot:true,  dotSize:2, outline:true,  outlineThickness:1, opacity:100 },
  };

  function applyPreset(p){
    if (!p) return;
    ctrl.style.value = p.style;
    ctrl.color.value = p.color;
    ctrl.thickness.value = p.thickness;
    ctrl.length.value = p.length;
    ctrl.gap.value = p.gap;
    ctrl.dot.checked = p.dot;
    ctrl.dotSize.value = p.dotSize;
    ctrl.outline.checked = p.outline;
    ctrl.outlineThickness.value = p.outlineThickness;
    ctrl.opacity.value = p.opacity;
  }

  function hexToRgb(hex){
    var m = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex || '');
    return m ? { r: parseInt(m[1],16), g: parseInt(m[2],16), b: parseInt(m[3],16) } : { r:0, g:255, b:0 };
  }

  function readSettings(){
    return {
      style: ctrl.style.value,
      color: ctrl.color.value,
      thickness: parseInt(ctrl.thickness.value, 10),
      length: parseInt(ctrl.length.value, 10),
      gap: parseInt(ctrl.gap.value, 10),
      dot: ctrl.dot.checked,
      dotSize: parseInt(ctrl.dotSize.value, 10),
      outline: ctrl.outline.checked,
      outlineThickness: parseInt(ctrl.outlineThickness.value, 10),
      opacity: parseInt(ctrl.opacity.value, 10),
    };
  }

  function drawBackground(s){
    var W = canvas.width, H = canvas.height;
    if (ctrl.bg.value === 'dark') {
      ctx.fillStyle = '#111827';
      ctx.fillRect(0, 0, W, H);
      ctx.fillStyle = '#374151';
      ctx.fillRect(0, Math.floor(H*0.6), W, Math.floor(H*0.4));
    } else if (ctrl.bg.value === 'light') {
      ctx.fillStyle = '#bae6fd';
      ctx.fillRect(0, 0, W, Math.floor(H*0.55));
      ctx.fillStyle = '#65a30d';
      ctx.fillRect(0, Math.floor(H*0.55), W, H);
    } else { // checker (for transparent-bg export preview)
      ctx.fillStyle = '#0f172a';
      ctx.fillRect(0, 0, W, H);
      ctx.fillStyle = '#1f2937';
      for (var y = 0; y < H; y += 16) {
        for (var x = 0; x < W; x += 16) {
          if (((x/16)|0 + (y/16)|0) % 2 === 0) ctx.fillRect(x, y, 16, 16);
        }
      }
    }
  }

  function drawCrosshair(s, clearForExport){
    var W = canvas.width, H = canvas.height;
    var cx = W/2 | 0, cy = H/2 | 0;
    if (clearForExport) ctx.clearRect(0, 0, W, H);
    else drawBackground(s);

    ctx.save();
    ctx.globalAlpha = s.opacity / 100;

    var color = s.color;

    // Outline pass (drawn first, underneath the inner stroke)
    if (s.outline) {
      ctx.strokeStyle = '#000000';
      ctx.fillStyle = '#000000';
      var t = s.thickness + s.outlineThickness * 2;
      drawStyle(s, cx, cy, t, 'stroke');
      if (s.dot) drawDot(cx, cy, s.dotSize + s.outlineThickness * 2);
    }

    // Inner pass
    ctx.strokeStyle = color;
    ctx.fillStyle = color;
    drawStyle(s, cx, cy, s.thickness, 'stroke');
    if (s.dot) drawDot(cx, cy, s.dotSize);

    ctx.restore();
  }

  function drawStyle(s, cx, cy, thickness, kind){
    if (s.style === 'dot') return;
    if (s.style === 'circle') {
      ctx.beginPath();
      ctx.lineWidth = thickness;
      ctx.arc(cx + 0.5, cy + 0.5, s.length, 0, Math.PI * 2);
      ctx.stroke();
      return;
    }
    // cross or tshape
    var arms = s.style === 'tshape' ? ['left','right','down'] : ['left','right','up','down'];
    arms.forEach(function(dir){
      var x0=cx, y0=cy, x1=cx, y1=cy;
      if (dir === 'left')  { x0 = cx - s.gap - s.length; x1 = cx - s.gap; }
      if (dir === 'right') { x0 = cx + s.gap;            x1 = cx + s.gap + s.length; }
      if (dir === 'up')    { y0 = cy - s.gap - s.length; y1 = cy - s.gap; }
      if (dir === 'down')  { y0 = cy + s.gap;            y1 = cy + s.gap + s.length; }
      if (s.length <= 0) return;
      // Use filled rects for crisp pixel lines
      var x = Math.min(x0, x1), y = Math.min(y0, y1);
      var w = Math.max(1, Math.abs(x1 - x0)) || thickness;
      var h = Math.max(1, Math.abs(y1 - y0)) || thickness;
      if (dir === 'left' || dir === 'right') {
        ctx.fillRect(x, cy - (thickness/2 | 0), w, thickness);
      } else {
        ctx.fillRect(cx - (thickness/2 | 0), y, thickness, h);
      }
    });
  }
  function drawDot(cx, cy, size){
    ctx.fillRect(cx - (size/2 | 0), cy - (size/2 | 0), size, size);
  }

  function updateExports(s){
    var rgb = hexToRgb(s.color);
    var cs2Lines = [
      'cl_crosshairstyle 4',
      'cl_crosshairsize ' + s.length,
      'cl_crosshairthickness ' + s.thickness,
      'cl_crosshairgap ' + (s.gap - 3), // CS2 gap is offset-based, -3..+5 typical
      'cl_crosshairdot ' + (s.dot ? 1 : 0),
      'cl_crosshaircolor 5',
      'cl_crosshaircolor_r ' + rgb.r,
      'cl_crosshaircolor_g ' + rgb.g,
      'cl_crosshaircolor_b ' + rgb.b,
      'cl_crosshair_drawoutline ' + (s.outline ? 1 : 0),
      'cl_crosshair_outlinethickness ' + s.outlineThickness,
      'cl_crosshairalpha ' + Math.round(s.opacity * 2.55),
      'cl_crosshair_t ' + (s.style === 'tshape' ? 1 : 0),
    ];
    cs2Out.value = cs2Lines.join('; ');

    var valLines = [
      'Color: R=' + rgb.r + ' G=' + rgb.g + ' B=' + rgb.b + ' (Custom color)',
      'Outlines: ' + (s.outline ? 'On (thickness ' + s.outlineThickness + ')' : 'Off'),
      'Center dot: ' + (s.dot ? 'On (size ' + s.dotSize + ')' : 'Off'),
      'Inner lines: ' + (s.style === 'dot' || s.style === 'circle' ? 'Off' : 'On (thickness ' + s.thickness + ', length ' + s.length + ')'),
      'Inner line offset: ' + s.gap,
      'Override firing error: Off (adjust to taste)',
    ];
    valOut.value = valLines.join('\n');
  }

  function render(){
    var s = readSettings();
    labels.thickness.textContent = s.thickness;
    labels.length.textContent = s.length;
    labels.gap.textContent = s.gap;
    labels.dotSize.textContent = s.dotSize;
    labels.outlineThickness.textContent = s.outlineThickness;
    labels.opacity.textContent = s.opacity;
    drawCrosshair(s, false);
    updateExports(s);
  }

  Object.keys(ctrl).forEach(function(k){
    ctrl[k].addEventListener('input', function(){
      if (k !== 'preset') ctrl.preset.value = 'default';
      render();
    });
    ctrl[k].addEventListener('change', function(){
      if (k !== 'preset') ctrl.preset.value = 'default';
      render();
    });
  });
  ctrl.preset.addEventListener('change', function(){
    applyPreset(PRESETS[ctrl.preset.value]);
    render();
  });
  applyPreset(PRESETS['default']);
  render();

  $('cg-download').addEventListener('click', function(){
    var s = readSettings();
    drawCrosshair(s, true); // transparent bg for export
    canvas.toBlob(function(blob){
      if (!blob) return;
      var url = URL.createObjectURL(blob);
      var a = document.createElement('a');
      a.href = url; a.download = 'crosshair.png';
      document.body.appendChild(a); a.click(); document.body.removeChild(a);
      setTimeout(function(){ URL.revokeObjectURL(url); render(); }, 100);
    }, 'image/png');
  });

  document.querySelectorAll('.cg-btn-copy').forEach(function(btn){
    btn.addEventListener('click', function(){
      var tid = btn.getAttribute('data-copy');
      var ta = document.getElementById(tid);
      if (!ta) return;
      ta.select();
      var ok = false;
      try { ok = document.execCommand('copy'); } catch (_) {}
      if (!ok && navigator.clipboard) {
        navigator.clipboard.writeText(ta.value).catch(function(){});
      }
      var originalLabel = btn.textContent;
      btn.textContent = COPIED_LABEL;
      btn.classList.add('is-copied');
      setTimeout(function(){ btn.textContent = originalLabel; btn.classList.remove('is-copied'); }, 1400);
    });
  });
})();
</script>
