<?php // online_ruler_tool.php - actual-size SVG ruler with credit card + DPI calibration ?>
<style>
  .or-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .or-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .or-card h3{margin:0 0 12px;font-size:16px}
  .or-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center}
  .or-btn{padding:9px 16px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:13px}
  .or-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .or-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .or-btn-danger{background:#ef4444;color:#fff}
  .or-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .or-field input[type=number]{width:90px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px}
  .or-field select{padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px;font-size:13px;background:#fff}
  .or-segmented{display:inline-flex;border:1px solid #e2e8f0;border-radius:10px;overflow:hidden;background:#f8fafc}
  .or-segmented button{background:transparent;border:0;padding:8px 14px;font-size:13px;font-weight:600;color:#475569;cursor:pointer}
  .or-segmented button.is-active{background:#0f172a;color:#fff}
  .or-status{margin-top:10px;font-size:13px;color:#475569}
  .or-status b{color:#0f172a}

  .or-stage{position:relative;background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:18px;overflow:auto;min-height:180px}
  .or-ruler-frame{position:relative;display:inline-block;transform-origin:top left;transition:transform .25s ease}
  .or-ruler-frame.is-vertical{transform:rotate(90deg) translateY(-100%)}
  .or-ruler-svg{display:block;background:linear-gradient(180deg,#fffbeb,#fef3c7);border:1px solid #fcd34d;border-radius:6px;box-shadow:inset 0 0 0 1px #fff,0 1px 2px rgba(0,0,0,.05)}

  .or-cal-card{position:relative;display:inline-block;height:120px;margin-top:8px}
  .or-cal-bg{position:absolute;inset:0;border:2px dashed #94a3b8;border-radius:10px;background:repeating-linear-gradient(45deg,#f1f5f9 0 8px,#e2e8f0 8px 16px)}
  .or-cal-card-overlay{position:absolute;top:0;left:0;height:100%;background:linear-gradient(135deg,#0f172a,#334155);border-radius:10px;color:#fff;display:flex;align-items:center;justify-content:space-between;padding:0 16px;font-size:13px;font-weight:600;letter-spacing:.5px;cursor:grab;user-select:none;box-shadow:0 4px 12px rgba(15,23,42,.3)}
  .or-cal-card-overlay::before{content:'';position:absolute;left:14px;top:14px;width:32px;height:22px;background:linear-gradient(135deg,#fbbf24,#f59e0b);border-radius:4px}
  .or-cal-handle{position:absolute;top:0;right:-10px;height:100%;width:20px;display:flex;align-items:center;justify-content:center;cursor:ew-resize;color:#fff;font-weight:900;font-size:16px}
  .or-cal-handle::after{content:'';position:absolute;right:6px;top:50%;transform:translateY(-50%);width:4px;height:40px;background:#fff;border-radius:2px;opacity:.6}

  .or-cal-meta{display:flex;flex-wrap:wrap;gap:14px;font-size:12px;color:#64748b;margin-top:10px}
  .or-cal-meta b{color:#0f172a}

  .or-tip{background:#eff6ff;border:1px dashed #60a5fa;color:#1e3a8a;padding:10px 12px;border-radius:8px;font-size:13px;margin-top:10px}

  @media (max-width:520px){
    .or-controls{gap:8px}
    .or-field input[type=number]{width:72px}
  }
</style>

<div class="or-wrap" id="or-root">

  <div class="or-card">
    <h3>Calibrate</h3>
    <p style="margin:0 0 12px;font-size:13px;color:#475569">Place a real credit, debit, or ID card flat on the screen on the dotted strip below, then drag the right-edge handle until the dark card overlay matches the real card width exactly.</p>
    <div class="or-cal-card" id="or-cal-card" style="width:324px">
      <div class="or-cal-bg"></div>
      <div class="or-cal-card-overlay" id="or-cal-overlay" style="width:324px">
        <span style="margin-left:60px">CARD</span>
        <span style="font-family:monospace;font-size:11px">85.6 x 54 mm</span>
        <div class="or-cal-handle" id="or-cal-handle" aria-label="Drag to resize"></div>
      </div>
    </div>
    <div class="or-cal-meta">
      <span>Width: <b id="or-cal-width">324</b> px</span>
      <span>= <b id="or-cal-mm">85.6</b> mm</span>
      <span>= <b id="or-cal-ppm">3.785</b> px/mm</span>
      <span>= <b id="or-cal-dpi">96.2</b> DPI</span>
    </div>
    <div class="or-controls" style="margin-top:14px">
      <button class="or-btn or-btn-primary" id="or-save">Save calibration</button>
      <button class="or-btn or-btn-danger" id="or-reset">Reset to default</button>
      <div class="or-field"><label for="or-dpi-input">Or enter DPI</label><input type="number" id="or-dpi-input" min="50" max="600" step="1" value="96"></div>
      <div class="or-field"><label for="or-dpi-preset">Preset</label><select id="or-dpi-preset">
        <option value="">Common DPIs...</option>
        <option value="96">96 (Windows default)</option>
        <option value="109">109 (1080p 20")</option>
        <option value="119">119 (1080p 18.5")</option>
        <option value="120">120 (Win 125% scale)</option>
        <option value="144">144 (Win 150% scale)</option>
        <option value="163">163 (1080p 13.5")</option>
        <option value="216">216 (4K 20")</option>
        <option value="264">264 (iPad Retina)</option>
      </select></div>
    </div>
    <div class="or-status" id="or-status">Status: <b>Using default 96 DPI</b> (uncalibrated)</div>
    <div class="or-tip">Tip: if the ruler shows 1&nbsp;cm but a real ruler shows different, recalibrate using your credit card. Browser zoom of anything other than 100% will throw the calibration off.</div>
  </div>

  <div class="or-card">
    <h3>Ruler</h3>
    <div class="or-controls" style="margin-bottom:12px">
      <div class="or-segmented" role="tablist" aria-label="Units">
        <button id="or-units-both" class="is-active" data-units="both">cm + inches</button>
        <button id="or-units-cm" data-units="cm">cm only</button>
        <button id="or-units-in" data-units="in">inches only</button>
      </div>
      <div class="or-segmented" role="tablist" aria-label="Orientation">
        <button id="or-orient-h" class="is-active" data-orient="h">Horizontal</button>
        <button id="or-orient-v" data-orient="v">Vertical</button>
      </div>
      <div class="or-field"><label for="or-length">Length (cm)</label><input type="number" id="or-length" min="5" max="60" step="1" value="30"></div>
    </div>
    <div class="or-stage" id="or-stage">
      <div class="or-ruler-frame" id="or-ruler-frame">
        <svg id="or-ruler-svg" class="or-ruler-svg" xmlns="http://www.w3.org/2000/svg" aria-label="Online ruler in actual size"></svg>
      </div>
    </div>
  </div>

</div>

<script>
(()=>{
  'use strict';
  const $ = id => document.getElementById(id);
  const STORAGE_KEY = 'kbt_online_ruler_ppm_v1';
  const DEFAULT_PPM = 96 / 25.4; // ~3.7795
  const CARD_MM = 85.6;

  // State
  let pixelsPerMm = parseFloat(localStorage.getItem(STORAGE_KEY)) || DEFAULT_PPM;
  let units = 'both'; // 'both' | 'cm' | 'in'
  let orient = 'h';   // 'h' | 'v'
  let lengthCm = 30;

  // -------- Calibration card --------
  const cardEl = $('or-cal-card');
  const overlay = $('or-cal-overlay');
  const handle = $('or-cal-handle');

  function setCardWidth(px){
    px = Math.max(120, Math.min(900, px|0));
    cardEl.style.width = px + 'px';
    overlay.style.width = px + 'px';
    const ppm = px / CARD_MM;
    $('or-cal-width').textContent = px;
    $('or-cal-mm').textContent = CARD_MM.toFixed(1);
    $('or-cal-ppm').textContent = ppm.toFixed(3);
    $('or-cal-dpi').textContent = (ppm * 25.4).toFixed(1);
    return ppm;
  }

  // Initialize card width to current calibration so the overlay matches
  setCardWidth(Math.round(pixelsPerMm * CARD_MM));

  let dragging=false, startX=0, startW=0;
  function onDown(e){
    dragging=true;
    startX = (e.touches?e.touches[0].clientX:e.clientX);
    startW = cardEl.offsetWidth;
    e.preventDefault();
  }
  function onMove(e){
    if(!dragging) return;
    const x = (e.touches?e.touches[0].clientX:e.clientX);
    setCardWidth(startW + (x - startX));
  }
  function onUp(){ dragging=false; }
  handle.addEventListener('mousedown', onDown);
  handle.addEventListener('touchstart', onDown, {passive:false});
  window.addEventListener('mousemove', onMove);
  window.addEventListener('touchmove', onMove, {passive:false});
  window.addEventListener('mouseup', onUp);
  window.addEventListener('touchend', onUp);

  // -------- Save / reset / DPI input --------
  function applyPpm(ppm, statusText){
    pixelsPerMm = ppm;
    $('or-status').innerHTML = 'Status: <b>' + statusText + '</b>';
    setCardWidth(Math.round(ppm * CARD_MM));
    $('or-dpi-input').value = Math.round(ppm * 25.4);
    drawRuler();
  }

  $('or-save').addEventListener('click', ()=>{
    const ppm = cardEl.offsetWidth / CARD_MM;
    localStorage.setItem(STORAGE_KEY, String(ppm));
    applyPpm(ppm, 'Calibrated to ' + (ppm*25.4).toFixed(1) + ' DPI (saved)');
  });

  $('or-reset').addEventListener('click', ()=>{
    localStorage.removeItem(STORAGE_KEY);
    applyPpm(DEFAULT_PPM, 'Using default 96 DPI (uncalibrated)');
  });

  $('or-dpi-input').addEventListener('change', e=>{
    const dpi = Math.max(50, Math.min(600, parseFloat(e.target.value)||96));
    const ppm = dpi / 25.4;
    localStorage.setItem(STORAGE_KEY, String(ppm));
    applyPpm(ppm, 'Calibrated to ' + dpi + ' DPI (saved)');
  });

  $('or-dpi-preset').addEventListener('change', e=>{
    if(!e.target.value) return;
    $('or-dpi-input').value = e.target.value;
    $('or-dpi-input').dispatchEvent(new Event('change'));
    e.target.value = '';
  });

  $('or-length').addEventListener('change', e=>{
    lengthCm = Math.max(5, Math.min(60, parseInt(e.target.value,10)||30));
    drawRuler();
  });

  // -------- Unit + orientation toggles --------
  document.querySelectorAll('[data-units]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      document.querySelectorAll('[data-units]').forEach(b=>b.classList.remove('is-active'));
      btn.classList.add('is-active');
      units = btn.dataset.units;
      drawRuler();
    });
  });

  document.querySelectorAll('[data-orient]').forEach(btn=>{
    btn.addEventListener('click', ()=>{
      document.querySelectorAll('[data-orient]').forEach(b=>b.classList.remove('is-active'));
      btn.classList.add('is-active');
      orient = btn.dataset.orient;
      const frame = $('or-ruler-frame');
      frame.classList.toggle('is-vertical', orient === 'v');
      drawRuler();
    });
  });

  // -------- SVG ruler drawing --------
  function svgEl(name, attrs){
    const el = document.createElementNS('http://www.w3.org/2000/svg', name);
    for(const k in attrs) el.setAttribute(k, attrs[k]);
    return el;
  }

  function drawRuler(){
    const svg = $('or-ruler-svg');
    while(svg.firstChild) svg.removeChild(svg.firstChild);

    const totalMm = lengthCm * 10;
    const widthPx = totalMm * pixelsPerMm;
    const showBoth = units === 'both';
    const showCm = showBoth || units === 'cm';
    const showIn = showBoth || units === 'in';

    // Two scales stacked when both are shown
    const heightPx = showBoth ? 110 : 70;
    svg.setAttribute('width', widthPx);
    svg.setAttribute('height', heightPx);
    svg.setAttribute('viewBox', '0 0 ' + widthPx + ' ' + heightPx);

    // CM scale (top edge)
    if(showCm){
      const baselineY = 0;
      // mm minor ticks
      for(let mm=0; mm<=totalMm; mm++){
        const x = mm * pixelsPerMm;
        let h;
        if(mm % 10 === 0) h = 24;
        else if(mm % 5 === 0) h = 14;
        else h = 8;
        svg.appendChild(svgEl('line',{x1:x, y1:baselineY, x2:x, y2:baselineY+h, stroke:'#0f172a', 'stroke-width': mm % 10 === 0 ? 1.4 : .8}));
      }
      // cm labels
      for(let cm=0; cm<=lengthCm; cm++){
        const x = cm * 10 * pixelsPerMm;
        const t = svgEl('text',{x: x+3, y: baselineY+34, 'font-family':'system-ui,sans-serif', 'font-size':12, fill:'#0f172a', 'font-weight':600});
        t.textContent = cm;
        svg.appendChild(t);
      }
      // unit label
      const unit = svgEl('text',{x: 4, y: baselineY+50, 'font-family':'system-ui,sans-serif', 'font-size':10, fill:'#475569'});
      unit.textContent = 'cm';
      svg.appendChild(unit);
    }

    // INCH scale (bottom edge)
    if(showIn){
      const baselineY = heightPx;
      const totalInches = totalMm / 25.4;
      const eighths = Math.floor(totalInches * 8);
      for(let i=0; i<=eighths; i++){
        const inches = i/8;
        const x = inches * 25.4 * pixelsPerMm;
        let h;
        if(i % 8 === 0) h = 24;       // whole inch
        else if(i % 4 === 0) h = 18;  // 1/2
        else if(i % 2 === 0) h = 12;  // 1/4
        else h = 8;                    // 1/8
        svg.appendChild(svgEl('line',{x1:x, y1:baselineY-h, x2:x, y2:baselineY, stroke:'#0f172a', 'stroke-width': i % 8 === 0 ? 1.4 : .8}));
      }
      for(let inches=0; inches<=Math.floor(totalInches); inches++){
        const x = inches * 25.4 * pixelsPerMm;
        const t = svgEl('text',{x: x+3, y: baselineY-30, 'font-family':'system-ui,sans-serif', 'font-size':12, fill:'#0f172a', 'font-weight':600});
        t.textContent = inches;
        svg.appendChild(t);
      }
      const unit = svgEl('text',{x: 4, y: baselineY-46, 'font-family':'system-ui,sans-serif', 'font-size':10, fill:'#475569'});
      unit.textContent = 'in';
      svg.appendChild(unit);
    }
  }

  // Initial status
  if(localStorage.getItem(STORAGE_KEY)){
    const ppm = parseFloat(localStorage.getItem(STORAGE_KEY));
    $('or-status').innerHTML = 'Status: <b>Calibrated to ' + (ppm*25.4).toFixed(1) + ' DPI (saved)</b>';
    $('or-dpi-input').value = Math.round(ppm*25.4);
  }

  drawRuler();
})();
</script>
