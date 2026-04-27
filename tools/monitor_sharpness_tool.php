<?php // monitor_sharpness_tool.php - sharpness, text clarity, color fringing, sub-pixel ruler ?>
<style>
  .ms-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .ms-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .ms-card.dark{background:#0b1220;border-color:#1e293b;color:#e2e8f0}
  .ms-card h3{margin:0 0 12px;font-size:16px}
  .ms-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .ms-btn{padding:9px 16px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:13px}
  .ms-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .ms-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .ms-btn-ghost:hover{background:#e2e8f0}
  .ms-tabs{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:12px}
  .ms-tab{padding:8px 14px;border:1px solid #e2e8f0;background:#fff;color:#0f172a;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer}
  .ms-tab.active{background:#0f172a;color:#fff;border-color:#0f172a}
  .ms-panel{display:none}
  .ms-panel.active{display:block}
  .ms-hint{font-size:12px;color:#64748b;margin:10px 0 0}
  .ms-card.dark .ms-hint{color:#94a3b8}
  .ms-card.dark .ms-tab{background:#0f172a;color:#e2e8f0;border-color:#1e293b}
  .ms-card.dark .ms-tab.active{background:#e2e8f0;color:#0f172a;border-color:#e2e8f0}
  .ms-card.dark .ms-btn-ghost{background:#1e293b;color:#e2e8f0;border-color:#334155}

  /* Sharpness pattern - 1px alternating black/white grid */
  .ms-grid-stage{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:14px}
  .ms-grid-block{border:1px solid #e2e8f0;border-radius:8px;overflow:hidden}
  .ms-grid-block .ms-label{background:#f8fafc;padding:6px 10px;font-size:12px;font-weight:600;color:#334155;display:flex;justify-content:space-between;align-items:center}
  .ms-card.dark .ms-grid-block{border-color:#1e293b}
  .ms-card.dark .ms-grid-block .ms-label{background:#0f172a;color:#cbd5e1}
  .ms-grid-canvas{width:100%;height:240px;display:block;image-rendering:pixelated;image-rendering:crisp-edges}

  /* Text clarity samples */
  .ms-text-sample{margin:12px 0;padding:14px;border:1px solid #e2e8f0;border-radius:8px;background:#fff;color:#0f172a}
  .ms-card.dark .ms-text-sample{background:#0f172a;border-color:#1e293b;color:#e2e8f0}
  .ms-inv .ms-text-sample{background:#0f172a;color:#fff;border-color:#1e293b}
  .ms-text-sample .ms-tag{display:inline-block;font-size:11px;font-weight:700;color:#64748b;background:#f1f5f9;padding:2px 8px;border-radius:4px;margin-bottom:6px;text-transform:uppercase;letter-spacing:.5px}
  .ms-inv .ms-text-sample .ms-tag,.ms-card.dark .ms-text-sample .ms-tag{background:#1e293b;color:#cbd5e1}
  .ms-text-sample p{margin:0;line-height:1.4}
  .ms-serif{font-family:Georgia,"Times New Roman",serif}
  .ms-sans{font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif}
  .ms-mono{font-family:"SFMono-Regular",Consolas,"Liberation Mono",Menlo,monospace}

  /* Color fringing */
  .ms-fringe-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
  .ms-fringe{padding:18px;border-radius:8px;border:1px solid #e2e8f0;text-align:center}
  .ms-fringe.bw{background:#fff;color:#000}
  .ms-fringe.wb{background:#000;color:#fff}
  .ms-fringe .big{font-size:32px;font-weight:700;letter-spacing:1px;margin-top:6px}
  .ms-fringe .small{font-size:16px;font-weight:600}

  /* Sub-pixel ruler */
  .ms-subpixel{height:120px;background:#fff;border-radius:8px;border:1px solid #e2e8f0;overflow:hidden;position:relative;
    background-image:repeating-linear-gradient(to right,#ff0000 0 1px,#00ff00 1px 2px,#0000ff 2px 3px,#000 3px 4px);
    image-rendering:pixelated;image-rendering:crisp-edges}
  .ms-subpixel.dense{background-image:repeating-linear-gradient(to right,#ff0000 0 1px,#000 1px 2px,#00ff00 2px 3px,#000 3px 4px,#0000ff 4px 5px,#000 5px 6px)}
  .ms-subpixel.solid-row{background:linear-gradient(to right,#ff0000 0 33%,#00ff00 33% 66%,#0000ff 66% 100%)}

  .ms-fs-host:fullscreen,.ms-fs-host:-webkit-full-screen{background:#000;padding:24px;overflow:auto}
  .ms-fs-host:fullscreen .ms-grid-canvas{height:60vh}

  @media (max-width:600px){
    .ms-fringe-grid{grid-template-columns:1fr}
    .ms-grid-canvas{height:200px}
  }
</style>

<div class="ms-wrap" id="ms-root">
  <div class="ms-card" id="ms-card">
    <div class="ms-controls">
      <div class="ms-tabs" id="ms-tabs">
        <button class="ms-tab active" data-panel="grid">Pixel grid</button>
        <button class="ms-tab" data-panel="text">Text clarity</button>
        <button class="ms-tab" data-panel="fringe">Color fringing</button>
        <button class="ms-tab" data-panel="subpixel">Sub-pixel ruler</button>
      </div>
      <button id="ms-invert" class="ms-btn ms-btn-ghost" type="button">Toggle dark mode</button>
      <button id="ms-fs" class="ms-btn ms-btn-primary" type="button">Fullscreen</button>
    </div>

    <div class="ms-panel active" data-panel="grid" id="ms-panel-grid">
      <h3>Lagom-style sharpness patterns</h3>
      <p class="ms-hint">Each block is a 1px alternating black/white grid drawn at the device pixel ratio. On a correctly-scaled monitor with neutral sharpness, every block should look like a uniform mid-grey at arm's length. Visible banding, moire, or shimmer means OS scaling, monitor over-sharpening, or a non-native resolution is interfering with pixel-perfect rendering.</p>
      <div class="ms-grid-stage" id="ms-grid-stage"></div>
    </div>

    <div class="ms-panel" data-panel="text" id="ms-panel-text">
      <h3>Text clarity at 8 sizes &times; 3 fonts</h3>
      <p class="ms-hint">Read each block. Small text should remain crisp, not fuzzy. The same paragraph is rendered in serif, sans, and monospace at 12-64 px so you can compare hinting, stem thickness, and grayscale anti-aliasing.</p>
      <div id="ms-text-stage"></div>
    </div>

    <div class="ms-panel" data-panel="fringe" id="ms-panel-fringe">
      <h3>Color fringing detection</h3>
      <p class="ms-hint">Look at the edges of each character. If you see thin red, green, or blue halos along letter strokes, that is chromatic aberration from sub-pixel anti-aliasing on a non-RGB-stripe panel (e.g. RWBG, BGR, OLED PenTile). Black-on-white and white-on-black often render with different sub-pixel hinting.</p>
      <div class="ms-fringe-grid">
        <div class="ms-fringe bw"><div class="small">16px black on white</div><div class="small">The quick brown fox jumps over the lazy dog. 0123456789</div><div class="big">Sharpness</div></div>
        <div class="ms-fringe wb"><div class="small">16px white on black</div><div class="small">The quick brown fox jumps over the lazy dog. 0123456789</div><div class="big">Sharpness</div></div>
        <div class="ms-fringe bw"><div class="big">Aa Bb 0123</div></div>
        <div class="ms-fringe wb"><div class="big">Aa Bb 0123</div></div>
      </div>
    </div>

    <div class="ms-panel" data-panel="subpixel" id="ms-panel-subpixel">
      <h3>Sub-pixel layout ruler</h3>
      <p class="ms-hint">A 1px wide repeating pattern of pure red, green, blue, and black columns. Lean in close (or use a phone camera macro). On a standard RGB-stripe LCD you should see a clean R-G-B-K stripe; on a BGR panel the order reverses; OLEDs with PenTile arrangement will look mottled. This tells you the pixel layout your monitor uses for sub-pixel anti-aliasing.</p>
      <div class="ms-subpixel"></div>
      <p class="ms-hint" style="margin-top:14px">Denser RGB+black:</p>
      <div class="ms-subpixel dense"></div>
      <p class="ms-hint" style="margin-top:14px">Solid R/G/B reference (helps identify a stuck pixel within a column):</p>
      <div class="ms-subpixel solid-row"></div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const root = document.getElementById('ms-root');
  const card = document.getElementById('ms-card');
  const tabs = document.getElementById('ms-tabs');
  const panels = card.querySelectorAll('.ms-panel');
  const invertBtn = document.getElementById('ms-invert');
  const fsBtn = document.getElementById('ms-fs');

  // ---- tab switching ----
  tabs.addEventListener('click', e=>{
    const btn = e.target.closest('.ms-tab'); if(!btn) return;
    const target = btn.dataset.panel;
    tabs.querySelectorAll('.ms-tab').forEach(t=>t.classList.toggle('active', t===btn));
    panels.forEach(p=>p.classList.toggle('active', p.dataset.panel===target));
  });

  // ---- dark/inverted mode ----
  invertBtn.addEventListener('click', ()=>{
    card.classList.toggle('dark');
    root.classList.toggle('ms-inv');
    // re-render canvases since CSS doesn't affect pixel data
    drawGrids();
  });

  // ---- fullscreen ----
  fsBtn.addEventListener('click', ()=>{
    const active = card.querySelector('.ms-panel.active');
    if(!active) return;
    if(document.fullscreenElement || document.webkitFullscreenElement){
      (document.exitFullscreen||document.webkitExitFullscreen).call(document);
      return;
    }
    active.classList.add('ms-fs-host');
    const req = active.requestFullscreen || active.webkitRequestFullscreen;
    if(req) req.call(active).catch(()=>{ active.classList.remove('ms-fs-host'); });
  });
  document.addEventListener('fullscreenchange', ()=>{
    if(!document.fullscreenElement){
      card.querySelectorAll('.ms-fs-host').forEach(el=>el.classList.remove('ms-fs-host'));
    }
  });

  // ---- pixel grid canvases ----
  const stage = document.getElementById('ms-grid-stage');
  const variants = [
    {label:'1px checker', draw:'checker', cell:1},
    {label:'1px vertical', draw:'vlines', cell:1},
    {label:'1px horizontal', draw:'hlines', cell:1},
    {label:'2px checker', draw:'checker', cell:2},
    {label:'1px diagonal', draw:'diag', cell:1},
    {label:'Dot grid', draw:'dots', cell:2}
  ];
  variants.forEach((v,i)=>{
    const wrap = document.createElement('div'); wrap.className='ms-grid-block';
    wrap.innerHTML = `<div class="ms-label"><span>${v.label}</span><span>${v.cell}px</span></div><canvas class="ms-grid-canvas" id="ms-canvas-${i}"></canvas>`;
    stage.appendChild(wrap);
  });

  function drawGrid(canvas, type, cell){
    const dpr = window.devicePixelRatio || 1;
    const cssW = canvas.clientWidth || 240;
    const cssH = canvas.clientHeight || 240;
    canvas.width = Math.floor(cssW * dpr);
    canvas.height = Math.floor(cssH * dpr);
    const ctx = canvas.getContext('2d');
    const dark = card.classList.contains('dark');
    const bg = dark ? '#000' : '#fff';
    const fg = dark ? '#fff' : '#000';
    ctx.fillStyle = bg; ctx.fillRect(0,0,canvas.width,canvas.height);
    ctx.fillStyle = fg;
    const W = canvas.width, H = canvas.height, c = Math.max(1, Math.round(cell*dpr));
    if(type==='checker'){
      for(let y=0;y<H;y+=c){
        for(let x=(y/c)%2?0:c;x<W;x+=c*2) ctx.fillRect(x,y,c,c);
      }
    } else if(type==='vlines'){
      for(let x=0;x<W;x+=c*2) ctx.fillRect(x,0,c,H);
    } else if(type==='hlines'){
      for(let y=0;y<H;y+=c*2) ctx.fillRect(0,y,W,c);
    } else if(type==='diag'){
      ctx.strokeStyle = fg; ctx.lineWidth = c;
      for(let i=-H;i<W;i+=c*3){
        ctx.beginPath(); ctx.moveTo(i,0); ctx.lineTo(i+H,H); ctx.stroke();
      }
    } else if(type==='dots'){
      for(let y=0;y<H;y+=c*3){
        for(let x=0;x<W;x+=c*3) ctx.fillRect(x,y,c,c);
      }
    }
  }
  function drawGrids(){
    variants.forEach((v,i)=>{
      const cv = document.getElementById('ms-canvas-'+i);
      if(cv) drawGrid(cv, v.draw, v.cell);
    });
  }
  // initial + on resize
  drawGrids();
  let resizeT = null;
  window.addEventListener('resize', ()=>{
    clearTimeout(resizeT);
    resizeT = setTimeout(drawGrids, 120);
  });

  // ---- text samples ----
  const textStage = document.getElementById('ms-text-stage');
  const sizes = [12,14,16,20,24,32,48,64];
  const fonts = [{cls:'ms-sans',name:'Sans'},{cls:'ms-serif',name:'Serif'},{cls:'ms-mono',name:'Mono'}];
  const para = 'The quick brown fox jumps over the lazy dog. 0123456789 il1 oO0 rn m. Pack my box with five dozen liquor jugs.';
  fonts.forEach(f=>{
    sizes.forEach(sz=>{
      const block = document.createElement('div');
      block.className = 'ms-text-sample '+f.cls;
      block.innerHTML = `<span class="ms-tag">${f.name} &middot; ${sz}px</span><p style="font-size:${sz}px">${para}</p>`;
      textStage.appendChild(block);
    });
  });
})();
</script>
