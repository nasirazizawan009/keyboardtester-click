<?php // cpu_stress_tool.php – multi-threaded SHA-256 busy loop via inline WebWorkers ?>
<style>
  .cs-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .cs-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .cs-card h3{margin:0 0 12px;font-size:16px}
  .cs-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .cs-btn{padding:10px 18px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .cs-btn-primary{background:linear-gradient(180deg,#dc2626,#f87171);color:#fff}
  .cs-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .cs-btn-danger{background:#ef4444;color:#fff}
  .cs-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .cs-field input[type=number]{width:90px;padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px}
  .cs-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px}
  .cs-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .cs-stat b{display:block;font-size:22px;color:#0f172a}
  .cs-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .cs-workers{display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:8px;margin-top:12px}
  .cs-worker{background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:10px;font-size:12px}
  .cs-worker b{display:block;font-size:13px;color:#0f172a;margin-bottom:4px}
  .cs-worker .bar{height:6px;background:#e2e8f0;border-radius:3px;overflow:hidden;margin-top:6px}
  .cs-worker .bar i{display:block;height:100%;background:linear-gradient(90deg,#10b981,#f59e0b,#ef4444);transition:width .2s}
  .cs-warn{background:#fef3c7;border:1px dashed #fbbf24;color:#92400e;padding:10px 12px;border-radius:8px;font-size:13px;margin-top:10px}
</style>

<div class="cs-wrap">
  <div class="cs-card">
    <h3>Stress settings</h3>
    <div class="cs-controls">
      <div class="cs-field"><label for="cs-threads">Threads</label><input id="cs-threads" type="number" min="1" max="128" value=""></div>
      <div class="cs-field"><label for="cs-duration">Duration (s)</label><input id="cs-duration" type="number" min="5" max="600" value="20"></div>
      <button id="cs-start" class="cs-btn cs-btn-primary">Start stress</button>
      <button id="cs-stop" class="cs-btn cs-btn-danger" disabled>Stop</button>
    </div>
    <div class="cs-warn">Warning: this test intentionally maxes your CPU. Expect fans to spin up and the machine to get warm. Laptops on battery may thermal-throttle within 30-60&nbsp;seconds, which is itself a useful datapoint.</div>
  </div>

  <div class="cs-card">
    <h3>Live results</h3>
    <div class="cs-stats">
      <div class="cs-stat"><b id="cs-cores">&mdash;</b><span>Logical cores</span></div>
      <div class="cs-stat"><b id="cs-total">0</b><span>Total ops/sec</span></div>
      <div class="cs-stat"><b id="cs-per">0</b><span>Avg per thread</span></div>
      <div class="cs-stat"><b id="cs-elapsed">0</b><span>Elapsed (s)</span></div>
      <div class="cs-stat"><b id="cs-peak">0</b><span>Peak ops/sec</span></div>
    </div>
    <div class="cs-workers" id="cs-workers"></div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const coresEl=$('cs-cores'),totalEl=$('cs-total'),perEl=$('cs-per'),elapsedEl=$('cs-elapsed'),peakEl=$('cs-peak');
  const workersEl=$('cs-workers');
  const cores = navigator.hardwareConcurrency || 4;
  coresEl.textContent = cores;
  const threadsIn=$('cs-threads'); threadsIn.value=cores;

  const workerSrc = `
    self.onmessage=function(e){
      if(e.data.cmd!=='start') return;
      const endAt=e.data.endAt, id=e.data.id;
      let ops=0;
      const enc=new TextEncoder();
      let reportAt=performance.now()+500;
      let data = enc.encode('kbt-cpu-stress-seed-'+id);
      (async function loop(){
        while(performance.now()<endAt){
          const h = await crypto.subtle.digest('SHA-256', data);
          data = new Uint8Array(h);
          ops++;
          const now=performance.now();
          if(now>=reportAt){
            self.postMessage({id, ops, ts: now});
            reportAt=now+500;
          }
        }
        self.postMessage({id, ops, ts:performance.now(), done:true});
      })();
    };
  `;

  let workers=[], running=false, startT=0, endT=0, lastCounts=[], tickTimer=null, peak=0;

  function spawn(n, durationMs){
    workers=[]; lastCounts=new Array(n).fill({ops:0, ts:performance.now()});
    workersEl.innerHTML='';
    const blob=new Blob([workerSrc],{type:'application/javascript'});
    const url=URL.createObjectURL(blob);
    for(let i=0;i<n;i++){
      const w=new Worker(url);
      const div=document.createElement('div'); div.className='cs-worker';
      div.innerHTML=`<b>Thread ${i+1}</b><span id="cs-w${i}-ops">0</span> ops/sec<div class="bar"><i id="cs-w${i}-bar" style="width:0%"></i></div>`;
      workersEl.appendChild(div);
      w.onmessage=(e)=>{
        const prev=lastCounts[e.data.id]||{ops:0, ts:startT};
        const dt=(e.data.ts-prev.ts)/1000;
        const rate = dt>0 ? (e.data.ops-prev.ops)/dt : 0;
        lastCounts[e.data.id]={ops:e.data.ops, ts:e.data.ts, rate};
        const opsEl=$('cs-w'+e.data.id+'-ops'); if(opsEl) opsEl.textContent = Math.round(rate).toLocaleString();
      };
      workers.push(w);
      w.postMessage({cmd:'start', id:i, endAt:performance.now()+durationMs});
    }
    return url;
  }

  let blobUrl=null;

  function stopAll(){
    running=false;
    clearInterval(tickTimer); tickTimer=null;
    workers.forEach(w=>{ try{ w.terminate(); }catch(e){} });
    workers=[];
    if(blobUrl){ URL.revokeObjectURL(blobUrl); blobUrl=null; }
    $('cs-start').disabled=false; $('cs-stop').disabled=true;
  }

  function tick(){
    const elapsed=(performance.now()-startT)/1000;
    elapsedEl.textContent=elapsed.toFixed(1);
    let total=0;
    lastCounts.forEach(c=>{ if(c.rate) total+=c.rate; });
    totalEl.textContent=Math.round(total).toLocaleString();
    perEl.textContent=workers.length?Math.round(total/workers.length).toLocaleString():'0';
    if(total>peak){ peak=total; peakEl.textContent=Math.round(peak).toLocaleString(); }
    lastCounts.forEach((c,i)=>{
      const bar=$('cs-w'+i+'-bar'); if(bar && c.rate){
        const maxSingle = peak/workers.length || 1;
        bar.style.width=Math.min(100,(c.rate/maxSingle)*100)+'%';
      }
    });
    if(performance.now()>=endT){ stopAll(); }
  }

  $('cs-start').addEventListener('click',()=>{
    const n=Math.max(1,Math.min(128,parseInt(threadsIn.value,10)||cores));
    const secs=Math.max(5,Math.min(600,parseInt($('cs-duration').value,10)||20));
    startT=performance.now(); endT=startT+secs*1000; peak=0; peakEl.textContent='0';
    $('cs-start').disabled=true; $('cs-stop').disabled=false;
    running=true;
    blobUrl=spawn(n, secs*1000);
    tickTimer=setInterval(tick,250);
  });
  $('cs-stop').addEventListener('click',stopAll);
  window.addEventListener('beforeunload',stopAll);
})();
</script>
