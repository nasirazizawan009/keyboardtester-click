<?php // minecraft_circle_tool.php – pixel circle / sphere plotter ?>
<style>
  .mc-wrap{max-width:1000px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .mc-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .mc-card h3{margin:0 0 12px;font-size:16px}
  .mc-controls{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px}
  .mc-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .mc-field input,.mc-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .mc-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:10px;margin-top:12px}
  .mc-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .mc-stat b{display:block;font-size:20px;color:#0f172a}
  .mc-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .mc-actions{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
  .mc-btn{padding:9px 14px;border:none;border-radius:8px;font-weight:700;cursor:pointer;font-size:13px}
  .mc-btn-primary{background:linear-gradient(180deg,#059669,#34d399);color:#fff}
  .mc-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .mc-canvas-wrap{background:#0f172a;border-radius:12px;padding:12px;overflow:auto;display:flex;justify-content:center}
  .mc-canvas{display:block;image-rendering:pixelated;image-rendering:crisp-edges;background:#1e293b;border:1px solid #334155}
  .mc-note{font-size:12px;color:#64748b;margin-top:8px}
  .mc-layers{display:flex;gap:6px;align-items:center;margin-top:10px;flex-wrap:wrap}
  .mc-layer-lbl{font-size:12px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:.5px}
</style>

<div class="mc-wrap">
  <div class="mc-card">
    <h3>Shape settings</h3>
    <div class="mc-controls">
      <div class="mc-field"><label for="mc-radius">Radius (blocks)</label><input id="mc-radius" type="number" min="1" max="256" value="15"></div>
      <div class="mc-field">
        <label for="mc-mode">Mode</label>
        <select id="mc-mode">
          <option value="outline" selected>Outline (1 block thick)</option>
          <option value="filled">Filled disc</option>
          <option value="thick">Thick ring (2 blocks)</option>
          <option value="sphere">Sphere layer (3D)</option>
        </select>
      </div>
      <div class="mc-field" id="mc-layer-wrap" hidden>
        <label for="mc-layer">Layer offset (0 = equator)</label>
        <input id="mc-layer" type="number" min="0" value="0">
      </div>
      <div class="mc-field"><label for="mc-cell">Pixel size</label><input id="mc-cell" type="number" min="2" max="30" value="14"></div>
    </div>
    <div class="mc-stats">
      <div class="mc-stat"><b id="mc-diameter">31</b><span>Diameter (blocks)</span></div>
      <div class="mc-stat"><b id="mc-blocks">92</b><span>Block count</span></div>
      <div class="mc-stat"><b id="mc-grid">31 &times; 31</b><span>Grid size</span></div>
      <div class="mc-stat"><b id="mc-sphere-total">&mdash;</b><span>Sphere total (all layers)</span></div>
    </div>
    <div class="mc-actions">
      <button id="mc-download" class="mc-btn mc-btn-primary">Download PNG</button>
      <button id="mc-reset" class="mc-btn mc-btn-ghost">Reset</button>
    </div>
  </div>

  <div class="mc-card">
    <h3>Pattern</h3>
    <div class="mc-canvas-wrap">
      <canvas id="mc-canvas" class="mc-canvas" width="434" height="434"></canvas>
    </div>
    <p class="mc-note">Each square = one block. Use the download button to save as PNG and keep it on a second monitor while building. Sphere layer mode shows one horizontal slice of a full sphere at the given offset from equator.</p>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const canvas=$('mc-canvas'),ctx=canvas.getContext('2d');
  const modeSel=$('mc-mode'), layerWrap=$('mc-layer-wrap'), layerIn=$('mc-layer'), radIn=$('mc-radius'), cellIn=$('mc-cell');

  function circleOutline(R){
    const s=2*R+1;
    const g=Array.from({length:s},()=>new Array(s).fill(0));
    // midpoint / Bresenham adjusted to include all pixels matching round(sqrt(R^2 - dx^2))
    for(let x=-R;x<=R;x++){
      const y=Math.round(Math.sqrt(R*R - x*x));
      g[R-y][R+x]=1; g[R+y][R+x]=1;
      g[R+x][R-y]=1; g[R+x][R+y]=1;
    }
    return {g, size:s};
  }
  function circleFilled(R){
    const s=2*R+1;
    const g=Array.from({length:s},()=>new Array(s).fill(0));
    for(let y=-R;y<=R;y++){
      for(let x=-R;x<=R;x++){
        if(x*x+y*y <= R*R + R*0.1) g[R+y][R+x]=1;
      }
    }
    return {g, size:s};
  }
  function circleThick(R){
    const a=circleOutline(R).g;
    const b=circleOutline(Math.max(1,R-1)).g;
    const s=2*R+1;
    const g=Array.from({length:s},()=>new Array(s).fill(0));
    for(let y=0;y<s;y++) for(let x=0;x<s;x++) g[y][x]=a[y][x];
    const bs=b.length, off=(s-bs)/2;
    for(let y=0;y<bs;y++) for(let x=0;x<bs;x++) if(b[y][x]) g[y+off][x+off]=1;
    return {g, size:s};
  }
  function sphereLayer(R, offset){
    // horizontal slice of sphere x^2+y^2+z^2 <= R^2 at z=offset -> filled disc radius sqrt(R^2 - offset^2)
    const inner = Math.sqrt(Math.max(0, R*R - offset*offset));
    const rEff = Math.floor(inner);
    if(rEff<1){
      const s=2*R+1;
      const g=Array.from({length:s},()=>new Array(s).fill(0));
      if(Math.abs(offset)<=R) g[R][R]=1;
      return {g, size:s};
    }
    const s=2*R+1;
    const g=Array.from({length:s},()=>new Array(s).fill(0));
    for(let y=-R;y<=R;y++){
      for(let x=-R;x<=R;x++){
        if(x*x+y*y+offset*offset <= R*R+R*0.1) g[R+y][R+x]=1;
      }
    }
    return {g, size:s};
  }
  function sphereTotalBlocks(R){
    let n=0;
    for(let z=-R;z<=R;z++) for(let y=-R;y<=R;y++) for(let x=-R;x<=R;x++)
      if(x*x+y*y+z*z <= R*R+R*0.1) n++;
    return n;
  }

  function compute(){
    const R=Math.max(1,Math.min(256,parseInt(radIn.value,10)||15));
    layerWrap.hidden = modeSel.value!=='sphere';
    let data;
    if(modeSel.value==='outline') data=circleOutline(R);
    else if(modeSel.value==='filled') data=circleFilled(R);
    else if(modeSel.value==='thick') data=circleThick(R);
    else data=sphereLayer(R, Math.max(-R,Math.min(R,parseInt(layerIn.value,10)||0)));
    return {R, ...data};
  }

  function draw(){
    const {R,g,size}=compute();
    const cell=Math.max(2,Math.min(30,parseInt(cellIn.value,10)||14));
    canvas.width = size*cell; canvas.height=size*cell;
    ctx.fillStyle='#1e293b'; ctx.fillRect(0,0,canvas.width,canvas.height);
    // grid lines
    ctx.strokeStyle='#334155'; ctx.lineWidth=1;
    for(let i=0;i<=size;i++){
      ctx.beginPath();
      ctx.moveTo(i*cell,0); ctx.lineTo(i*cell,size*cell); ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(0,i*cell); ctx.lineTo(size*cell,i*cell); ctx.stroke();
    }
    // blocks
    ctx.fillStyle='#10b981';
    let count=0;
    for(let y=0;y<size;y++) for(let x=0;x<size;x++) if(g[y][x]){
      ctx.fillRect(x*cell+1,y*cell+1,cell-2,cell-2);
      count++;
    }
    // center marker
    ctx.fillStyle='#ef4444';
    ctx.fillRect(R*cell+cell/2-2,R*cell+cell/2-2,4,4);

    $('mc-diameter').textContent=size;
    $('mc-blocks').textContent=count;
    $('mc-grid').textContent=size+' × '+size;
    $('mc-sphere-total').textContent = modeSel.value==='sphere' ? sphereTotalBlocks(R).toLocaleString() : '—';
  }

  [radIn, modeSel, layerIn, cellIn].forEach(el=>el.addEventListener('input',draw));

  $('mc-download').addEventListener('click',()=>{
    const a=document.createElement('a');
    a.href=canvas.toDataURL('image/png');
    const R=parseInt(radIn.value,10);
    a.download=`minecraft-circle-r${R}-${modeSel.value}.png`;
    a.click();
  });
  $('mc-reset').addEventListener('click',()=>{
    radIn.value=15; modeSel.value='outline'; layerIn.value=0; cellIn.value=14; draw();
  });
  draw();
})();
</script>
