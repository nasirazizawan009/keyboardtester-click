<?php // frame_skipping_tool.php – rAF delta analysis ?>
<style>
  .fs-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .fs-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .fs-card h3{margin:0 0 12px;font-size:16px}
  .fs-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .fs-btn{padding:10px 18px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .fs-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .fs-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .fs-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px}
  .fs-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .fs-stat b{display:block;font-size:22px;color:#0f172a}
  .fs-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .fs-stat.bad b{color:#ef4444}
  .fs-stat.good b{color:#10b981}
  .fs-canvas{width:100%;max-width:100%;height:120px;display:block;background:#0f172a;border-radius:12px}
  .fs-strobe{width:100%;height:40px;background:#fff;border-radius:8px;border:1px solid #e2e8f0}
  .fs-log{max-height:200px;overflow:auto;background:#0f172a;color:#cbd5e1;font-family:Consolas,monospace;font-size:12px;padding:12px;border-radius:8px;margin-top:10px}
  .fs-log-row{padding:2px 0}
  .fs-log-row.bad{color:#fca5a5}
  .fs-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .fs-field input[type=number]{width:80px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px}
  .fs-note{font-size:12px;color:#64748b;margin-top:8px}
</style>

<div class="fs-wrap">
  <div class="fs-card">
    <h3>Frame skipping detector</h3>
    <div class="fs-controls">
      <button id="fs-start" class="fs-btn fs-btn-primary">Start test</button>
      <button id="fs-stop" class="fs-btn fs-btn-ghost" disabled>Stop</button>
      <button id="fs-reset" class="fs-btn fs-btn-ghost">Reset</button>
      <div class="fs-field"><label for="fs-threshold">Threshold x expected:</label><input id="fs-threshold" type="number" step="0.1" min="1.1" max="3" value="1.5"></div>
      <div class="fs-field"><label for="fs-duration">Duration (s):</label><input id="fs-duration" type="number" min="3" max="120" value="15"></div>
    </div>
    <div class="fs-stats">
      <div class="fs-stat"><b id="fs-hz">&mdash;</b><span>Detected Hz</span></div>
      <div class="fs-stat"><b id="fs-frames">0</b><span>Frames rendered</span></div>
      <div class="fs-stat" id="fs-stat-dropped"><b id="fs-dropped">0</b><span>Skipped frames</span></div>
      <div class="fs-stat"><b id="fs-worst">&mdash;</b><span>Worst delta (ms)</span></div>
      <div class="fs-stat"><b id="fs-jitter">&mdash;</b><span>Jitter (stddev)</span></div>
    </div>
    <p class="fs-note" id="fs-status">Click "Start test". The first 1&nbsp;second is used to calibrate your refresh rate, then frame skips are counted.</p>
  </div>

  <div class="fs-card">
    <h3>Moving bar (visual confirmation)</h3>
    <canvas id="fs-canvas" class="fs-canvas" width="1200" height="120"></canvas>
    <p class="fs-note">A bar moves left-to-right at constant pixels-per-frame. Jitter or hitching in the bar = skipped frames. Smooth motion = stable refresh rate.</p>
  </div>

  <div class="fs-card">
    <h3>Stutter log</h3>
    <div id="fs-log" class="fs-log"></div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const canvas=$('fs-canvas'),ctx=canvas.getContext('2d');
  const logEl=$('fs-log');

  let running=false, rafId=null, lastT=0, startT=0, frames=0, dropped=0;
  let deltas=[], calDeltas=[], calibrated=false, expected=0, worst=0, barX=0;
  let durationMs=15000, threshold=1.5, endT=0;

  function fitCanvas(){
    const dpr=window.devicePixelRatio||1;
    const w=canvas.clientWidth;
    canvas.width=w*dpr; canvas.height=120*dpr;
    ctx.setTransform(dpr,0,0,dpr,0,0);
  }
  window.addEventListener('resize',fitCanvas); fitCanvas();

  function drawBar(){
    const w=canvas.clientWidth;
    ctx.fillStyle='#0f172a'; ctx.fillRect(0,0,w,120);
    ctx.fillStyle='#22d3ee'; ctx.fillRect(barX,20,40,80);
    ctx.strokeStyle='#1e293b'; ctx.beginPath();
    for(let x=0;x<w;x+=60){ ctx.moveTo(x,0); ctx.lineTo(x,120); }
    ctx.stroke();
  }

  function log(msg,bad){
    const row=document.createElement('div');
    row.className='fs-log-row'+(bad?' bad':'');
    row.textContent=msg;
    logEl.appendChild(row);
    logEl.scrollTop=logEl.scrollHeight;
  }

  function reset(){
    running=false; cancelAnimationFrame(rafId); rafId=null;
    frames=0; dropped=0; deltas=[]; calDeltas=[]; calibrated=false; expected=0; worst=0; barX=0;
    $('fs-hz').textContent='—'; $('fs-frames').textContent='0';
    $('fs-dropped').textContent='0'; $('fs-worst').textContent='—'; $('fs-jitter').textContent='—';
    $('fs-stat-dropped').classList.remove('bad','good');
    logEl.innerHTML='';
    $('fs-status').textContent='Click "Start test". The first 1 second is used to calibrate your refresh rate, then frame skips are counted.';
    drawBar();
  }

  function finish(){
    running=false; cancelAnimationFrame(rafId);
    $('fs-start').disabled=false; $('fs-stop').disabled=true;
    if(!deltas.length){ $('fs-status').textContent='Test stopped before calibration.'; return; }
    const mean=deltas.reduce((a,b)=>a+b,0)/deltas.length;
    const variance=deltas.reduce((a,b)=>a+(b-mean)*(b-mean),0)/deltas.length;
    $('fs-jitter').textContent=Math.sqrt(variance).toFixed(2)+'ms';
    const pct=(dropped/frames*100).toFixed(2);
    $('fs-stat-dropped').classList.add(dropped===0?'good':'bad');
    $('fs-status').textContent=`Done. ${frames} frames rendered over ${Math.round((performance.now()-startT)/1000)}s at ~${(1000/expected).toFixed(1)}Hz. ${dropped} skipped (${pct}%).`;
  }

  function tick(t){
    if(!running) return;
    if(lastT){
      const d=t-lastT;
      frames++;
      if(!calibrated){
        calDeltas.push(d);
        if(t-startT>1000 && calDeltas.length>10){
          const sorted=[...calDeltas].sort((a,b)=>a-b);
          expected=sorted[Math.floor(sorted.length/2)];
          const hz=1000/expected;
          $('fs-hz').textContent=hz.toFixed(1);
          calibrated=true;
          log(`Calibrated: expected frame interval ${expected.toFixed(2)}ms (${hz.toFixed(1)}Hz). Threshold: ${(expected*threshold).toFixed(2)}ms.`);
        }
      } else {
        deltas.push(d);
        if(d>expected*threshold){
          const skipped=Math.round(d/expected)-1;
          dropped+=skipped;
          const rel=((t-startT)/1000).toFixed(2);
          log(`${rel}s: ${d.toFixed(2)}ms delta, skipped ${skipped} frame${skipped>1?'s':''}`,true);
        }
        if(d>worst){ worst=d; $('fs-worst').textContent=worst.toFixed(2); }
      }
      $('fs-frames').textContent=frames;
      $('fs-dropped').textContent=dropped;
    }
    lastT=t;

    barX+=4;
    if(barX>canvas.clientWidth) barX=-40;
    drawBar();

    if(t>=endT){ finish(); return; }
    rafId=requestAnimationFrame(tick);
  }

  $('fs-start').addEventListener('click',()=>{
    reset();
    threshold=Math.max(1.1,Math.min(3,parseFloat($('fs-threshold').value)||1.5));
    durationMs=Math.max(3,Math.min(120,parseInt($('fs-duration').value,10)||15))*1000;
    running=true; lastT=0; startT=performance.now(); endT=startT+durationMs;
    $('fs-start').disabled=true; $('fs-stop').disabled=false;
    $('fs-status').textContent='Calibrating refresh rate...';
    log(`Starting ${durationMs/1000}s test. Threshold x${threshold}.`);
    rafId=requestAnimationFrame(tick);
  });
  $('fs-stop').addEventListener('click',finish);
  $('fs-reset').addEventListener('click',reset);
  drawBar();
})();
</script>
