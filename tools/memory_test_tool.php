<?php // memory_test_tool.php – performance.memory reader + allocation stressor ?>
<style>
  .mt-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .mt-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .mt-card h3{margin:0 0 12px;font-size:16px}
  .mt-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .mt-btn{padding:10px 18px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .mt-btn-primary{background:linear-gradient(180deg,#059669,#34d399);color:#fff}
  .mt-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .mt-btn-danger{background:#ef4444;color:#fff}
  .mt-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .mt-field input[type=number]{width:90px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px}
  .mt-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px}
  .mt-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .mt-stat b{display:block;font-size:22px;color:#0f172a}
  .mt-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .mt-meter{width:100%;height:14px;background:#e2e8f0;border-radius:7px;overflow:hidden;margin-top:10px}
  .mt-meter i{display:block;height:100%;background:linear-gradient(90deg,#10b981,#f59e0b,#ef4444);transition:width .2s}
  .mt-graph{width:100%;height:200px;background:#0f172a;border-radius:12px;display:block}
  .mt-warn{background:#fef3c7;border:1px dashed #fbbf24;color:#92400e;padding:10px 12px;border-radius:8px;font-size:13px;margin-top:10px}
  .mt-meta{font-size:12px;color:#64748b;margin-top:6px}
</style>

<div class="mt-wrap">
  <div class="mt-card">
    <h3>Live heap stats</h3>
    <div class="mt-stats">
      <div class="mt-stat"><b id="mt-used">&mdash;</b><span>Used heap (MB)</span></div>
      <div class="mt-stat"><b id="mt-total">&mdash;</b><span>Total heap (MB)</span></div>
      <div class="mt-stat"><b id="mt-limit">&mdash;</b><span>Heap limit (MB)</span></div>
      <div class="mt-stat"><b id="mt-alloc">0</b><span>Allocated by test (MB)</span></div>
      <div class="mt-stat"><b id="mt-pct">&mdash;</b><span>Used / limit (%)</span></div>
    </div>
    <div class="mt-meter"><i id="mt-bar" style="width:0%"></i></div>
    <div class="mt-meta" id="mt-support"></div>
  </div>

  <div class="mt-card">
    <h3>Stress allocation</h3>
    <div class="mt-controls">
      <div class="mt-field"><label for="mt-chunk">Chunk size (MB)</label><input id="mt-chunk" type="number" min="1" max="200" value="10"></div>
      <div class="mt-field"><label for="mt-interval">Interval (ms)</label><input id="mt-interval" type="number" min="50" max="5000" value="300"></div>
      <button id="mt-start" class="mt-btn mt-btn-primary">Start allocating</button>
      <button id="mt-stop" class="mt-btn mt-btn-danger" disabled>Stop</button>
      <button id="mt-free" class="mt-btn mt-btn-ghost">Release &amp; GC</button>
    </div>
    <div class="mt-warn">Safety: allocation auto-stops if used heap exceeds 85% of the browser's heap limit, or after 500 chunks, whichever comes first. On Firefox/Safari (no performance.memory), the test stops at 300 MB self-allocated as a safety cap.</div>
  </div>

  <div class="mt-card">
    <h3>Heap growth graph</h3>
    <canvas id="mt-graph" class="mt-graph"></canvas>
    <div class="mt-meta">Green line: used heap. Yellow: total heap. Red dashed: browser heap limit. Chart updates every 500&nbsp;ms.</div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const hasPM = !!(performance && performance.memory);
  const supportEl=$('mt-support');
  supportEl.textContent = hasPM
    ? 'performance.memory is available (Chrome/Edge) — heap stats are live.'
    : 'performance.memory is not exposed by this browser (Firefox/Safari). Used / total / limit will stay as "—"; only allocation count is tracked.';
  const canvas=$('mt-graph'),ctx=canvas.getContext('2d');
  function fit(){ const dpr=window.devicePixelRatio||1; canvas.width=canvas.clientWidth*dpr; canvas.height=200*dpr; ctx.setTransform(dpr,0,0,dpr,0,0); }
  window.addEventListener('resize',fit); fit();

  let chunks=[], running=false, t=0, timer=null, history=[], sampleTimer=null;
  const MAX_CHUNKS=500;

  function readMem(){
    if(!hasPM) return null;
    const m=performance.memory;
    return { used:m.usedJSHeapSize, total:m.totalJSHeapSize, limit:m.jsHeapSizeLimit };
  }

  function drawGraph(){
    const w=canvas.clientWidth, h=200;
    ctx.fillStyle='#0f172a'; ctx.fillRect(0,0,w,h);
    if(!history.length) return;
    const max = history.reduce((a,b)=>Math.max(a,b.limit||b.used||0),1);
    function y(v){ return h - (v/max)*h*0.95; }
    ctx.strokeStyle='#ef4444'; ctx.setLineDash([4,4]); ctx.beginPath();
    const lim=history[history.length-1].limit;
    if(lim){ ctx.moveTo(0,y(lim)); ctx.lineTo(w,y(lim)); ctx.stroke(); }
    ctx.setLineDash([]);
    ctx.strokeStyle='#f59e0b'; ctx.beginPath();
    history.forEach((p,i)=>{ const x=(i/(history.length-1||1))*w; (i===0?ctx.moveTo:ctx.lineTo).call(ctx,x,y(p.total||p.alloc||0)); });
    ctx.stroke();
    ctx.strokeStyle='#10b981'; ctx.lineWidth=2; ctx.beginPath();
    history.forEach((p,i)=>{ const x=(i/(history.length-1||1))*w; (i===0?ctx.moveTo:ctx.lineTo).call(ctx,x,y(p.used||p.alloc||0)); });
    ctx.stroke(); ctx.lineWidth=1;
  }

  function fmt(b){ return (b/1048576).toFixed(1); }
  function allocMB(){ return chunks.reduce((a,b)=>a+b.byteLength,0)/1048576; }

  function sample(){
    const m=readMem();
    const alloc=allocMB();
    $('mt-alloc').textContent=alloc.toFixed(1);
    if(m){
      $('mt-used').textContent=fmt(m.used);
      $('mt-total').textContent=fmt(m.total);
      $('mt-limit').textContent=fmt(m.limit);
      const pct=(m.used/m.limit*100);
      $('mt-pct').textContent=pct.toFixed(1);
      $('mt-bar').style.width=Math.min(100,pct)+'%';
      history.push({used:m.used,total:m.total,limit:m.limit,alloc:alloc*1048576,t:performance.now()});
    } else {
      $('mt-bar').style.width=Math.min(100,alloc/300*100)+'%';
      history.push({used:alloc*1048576,total:alloc*1048576,limit:300*1048576,alloc:alloc*1048576,t:performance.now()});
    }
    if(history.length>500) history.shift();
    drawGraph();
  }

  function allocChunk(){
    const mb=Math.max(1,Math.min(200,parseInt($('mt-chunk').value,10)||10));
    const bytes=mb*1024*1024;
    try{
      const arr=new Uint8Array(bytes);
      for(let i=0;i<bytes;i+=4096) arr[i]=1;
      chunks.push(arr);
    }catch(e){
      stopAllocating('Allocation failed: '+e.message);
      return false;
    }
    sample();
    const m=readMem();
    if(m && m.used/m.limit>0.85){ stopAllocating('Stopped: used heap exceeds 85% of limit.'); return false; }
    if(!hasPM && allocMB()>=300){ stopAllocating('Stopped: 300 MB allocated (Firefox/Safari safety cap).'); return false; }
    if(chunks.length>=MAX_CHUNKS){ stopAllocating('Stopped: reached 500 chunks.'); return false; }
    return true;
  }

  function startAllocating(){
    running=true;
    $('mt-start').disabled=true; $('mt-stop').disabled=false;
    const iv=Math.max(50,Math.min(5000,parseInt($('mt-interval').value,10)||300));
    timer=setInterval(()=>{ if(!allocChunk()) clearInterval(timer); },iv);
  }
  function stopAllocating(msg){
    running=false; clearInterval(timer);
    $('mt-start').disabled=false; $('mt-stop').disabled=true;
    if(msg) supportEl.textContent=msg+(hasPM?' performance.memory is available.':' performance.memory is not exposed by this browser.');
  }
  $('mt-start').addEventListener('click',startAllocating);
  $('mt-stop').addEventListener('click',()=>stopAllocating('Stopped by user.'));
  $('mt-free').addEventListener('click',()=>{
    chunks=[];
    sample();
    supportEl.textContent='Allocations released. The browser may take a moment to garbage-collect — watch the Used heap drop.';
  });

  sampleTimer=setInterval(sample,500);
  sample();
})();
</script>
