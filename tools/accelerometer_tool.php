<?php
// accelerometer_tool.php – embeddable Accelerometer Test module
// DeviceMotionEvent readout with tilt ball + shake counter
?>
<style>
  .ac-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--ac-primary:#4b5eaa;--ac-primary-2:#7d8bc1;--ac-accent:#f59e0b;--ac-success:#10b981;--ac-danger:#ef4444;--ac-border:#e2e8f0;--ac-muted:#64748b;--ac-text:#0f172a;--ac-card:#fff}
  .ac-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(12px,2.2vw,24px);align-items:start}
  @media(max-width:900px){.ac-grid{grid-template-columns:1fr}}
  .ac-card{background:var(--ac-card);border:1px solid var(--ac-border);border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px}
  .ac-card h3{margin:0 0 14px;font-size:16px}
  .ac-alert{padding:12px 16px;border-radius:8px;margin-bottom:14px;font-size:13px}
  .ac-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
  .ac-alert-warn{background:#fef3c7;border:1px solid #fde68a;color:#92400e}
  .ac-btn{appearance:none;border:none;padding:12px 18px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .ac-btn-primary{background:linear-gradient(180deg,var(--ac-primary),var(--ac-primary-2));color:#fff}
  .ac-btn-ghost{background:#f1f5f9;color:var(--ac-text);border:1px solid var(--ac-border)}
  .ac-btn-danger{background:var(--ac-danger);color:#fff}
  .ac-btn:disabled{opacity:.5;cursor:not-allowed}
  .ac-status{padding:8px 12px;border-radius:8px;font-size:13px;font-weight:600;display:inline-block;margin-bottom:10px}
  .ac-status-idle{background:#f1f5f9;color:var(--ac-muted)}
  .ac-status-live{background:#dcfce7;color:#166534}
  .ac-status-err{background:#fee2e2;color:#991b1b}
  .ac-axis{margin-bottom:14px}
  .ac-axis-label{display:flex;justify-content:space-between;font-size:13px;font-weight:700;margin-bottom:6px;font-variant-numeric:tabular-nums}
  .ac-axis-label span:first-child{color:var(--ac-text)}
  .ac-axis-label span:last-child{color:var(--ac-primary)}
  .ac-bar{position:relative;height:14px;background:#f1f5f9;border-radius:8px;overflow:hidden;border:1px solid var(--ac-border)}
  .ac-bar-center{position:absolute;top:0;bottom:0;left:50%;width:2px;background:var(--ac-border)}
  .ac-bar-fill{position:absolute;top:0;bottom:0;left:50%;background:linear-gradient(90deg,var(--ac-primary),var(--ac-primary-2));transition:width .06s,transform .06s;transform-origin:left center}
  .ac-tilt-wrap{position:relative;width:100%;aspect-ratio:1;max-width:300px;margin:0 auto;background:radial-gradient(circle,#f8fafc 0%,#e2e8f0 100%);border:2px solid var(--ac-border);border-radius:50%;overflow:hidden}
  .ac-tilt-ball{position:absolute;top:50%;left:50%;width:28px;height:28px;margin:-14px 0 0 -14px;border-radius:50%;background:radial-gradient(circle at 30% 30%,#f59e0b,#b45309);box-shadow:0 4px 10px rgba(0,0,0,.25);transition:transform .05s linear}
  .ac-tilt-cross{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;color:var(--ac-muted);font-size:32px;line-height:1}
  .ac-stats{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-top:14px}
  .ac-stat{background:#f8fafc;border:1px solid var(--ac-border);border-radius:8px;padding:10px 12px}
  .ac-stat-label{font-size:11px;color:var(--ac-muted);text-transform:uppercase;letter-spacing:.5px;font-weight:700}
  .ac-stat-val{font-size:18px;font-weight:800;color:var(--ac-text);font-variant-numeric:tabular-nums;margin-top:2px}
  .ac-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
</style>

<div class="ac-wrap">
  <div id="ac-unsupported" class="ac-alert ac-alert-warn" style="display:none">
    ⚠️ <strong>Not supported:</strong> This device does not expose DeviceMotionEvent, which usually means you are on a desktop without an accelerometer. Open this page on a phone or tablet to run the test.
  </div>

  <div class="ac-grid">
    <div class="ac-card">
      <h3>Live sensor readout</h3>
      <div id="ac-status" class="ac-status ac-status-idle">Not started</div>
      <div class="ac-alert ac-alert-info" id="ac-hint">
        On iOS 13+ you must tap "Start" to grant motion permission. The page cannot request it automatically.
      </div>
      <div class="ac-actions">
        <button id="ac-start" class="ac-btn ac-btn-primary">Start</button>
        <button id="ac-stop" class="ac-btn ac-btn-danger" disabled>Stop</button>
        <button id="ac-reset" class="ac-btn ac-btn-ghost">Reset stats</button>
      </div>
      <div style="margin-top:18px">
        <div class="ac-axis">
          <div class="ac-axis-label"><span>X (lateral)</span><span id="ac-xVal">0.00 m/s²</span></div>
          <div class="ac-bar"><div class="ac-bar-center"></div><div id="ac-xFill" class="ac-bar-fill" style="width:0;transform:translateX(0)"></div></div>
        </div>
        <div class="ac-axis">
          <div class="ac-axis-label"><span>Y (vertical)</span><span id="ac-yVal">0.00 m/s²</span></div>
          <div class="ac-bar"><div class="ac-bar-center"></div><div id="ac-yFill" class="ac-bar-fill" style="width:0;transform:translateX(0)"></div></div>
        </div>
        <div class="ac-axis">
          <div class="ac-axis-label"><span>Z (depth)</span><span id="ac-zVal">0.00 m/s²</span></div>
          <div class="ac-bar"><div class="ac-bar-center"></div><div id="ac-zFill" class="ac-bar-fill" style="width:0;transform:translateX(0)"></div></div>
        </div>
      </div>
    </div>

    <div class="ac-card">
      <h3>Tilt visualizer</h3>
      <div class="ac-tilt-wrap">
        <div class="ac-tilt-cross">+</div>
        <div id="ac-ball" class="ac-tilt-ball"></div>
      </div>
      <div class="ac-stats">
        <div class="ac-stat"><div class="ac-stat-label">Peak |a|</div><div class="ac-stat-val" id="ac-peak">0.00 m/s²</div></div>
        <div class="ac-stat"><div class="ac-stat-label">Shake count</div><div class="ac-stat-val" id="ac-shakes">0</div></div>
        <div class="ac-stat"><div class="ac-stat-label">Samples</div><div class="ac-stat-val" id="ac-samples">0</div></div>
        <div class="ac-stat"><div class="ac-stat-label">Rate</div><div class="ac-stat-val" id="ac-rate">— Hz</div></div>
      </div>
      <div style="margin-top:12px;font-size:12px;color:var(--ac-muted)">
        Bars clamp at ±20 m/s². Gravity alone is ~9.81 m/s² when the device is stationary and flat.
      </div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const startBtn=$('ac-start'),stopBtn=$('ac-stop'),resetBtn=$('ac-reset'),statusEl=$('ac-status');
  const xVal=$('ac-xVal'),yVal=$('ac-yVal'),zVal=$('ac-zVal');
  const xFill=$('ac-xFill'),yFill=$('ac-yFill'),zFill=$('ac-zFill');
  const ball=$('ac-ball'),peakEl=$('ac-peak'),shakesEl=$('ac-shakes'),samplesEl=$('ac-samples'),rateEl=$('ac-rate');
  const unsupported=$('ac-unsupported');

  if(typeof DeviceMotionEvent==='undefined'){ unsupported.style.display='block'; startBtn.disabled=true; }

  let running=false,peak=0,shakes=0,samples=0,rateT0=0;
  const SHAKE_THRESH=15; let lastShakeTime=0;

  function setStatus(text,cls){ statusEl.textContent=text; statusEl.className='ac-status '+cls; }
  function setBar(fill,v){
    const clamped=Math.max(-20,Math.min(20,v));
    const pct=Math.abs(clamped)/20*50;
    fill.style.width=pct+'%';
    fill.style.transform = clamped<0 ? `translateX(${-pct}%)` : 'translateX(0)';
  }
  function onMotion(e){
    if(!running) return;
    const a=e.accelerationIncludingGravity||e.acceleration; if(!a) return;
    const x=a.x||0,y=a.y||0,z=a.z||0;
    xVal.textContent=x.toFixed(2)+' m/s²'; yVal.textContent=y.toFixed(2)+' m/s²'; zVal.textContent=z.toFixed(2)+' m/s²';
    setBar(xFill,x); setBar(yFill,y); setBar(zFill,z);
    const mag=Math.hypot(x,y,z);
    if(mag>peak){ peak=mag; peakEl.textContent=peak.toFixed(2)+' m/s²'; }
    const linear=Math.hypot((e.acceleration&&e.acceleration.x)||0,(e.acceleration&&e.acceleration.y)||0,(e.acceleration&&e.acceleration.z)||0);
    const now=performance.now();
    if(linear>SHAKE_THRESH && now-lastShakeTime>250){ shakes++; shakesEl.textContent=shakes; lastShakeTime=now; }
    const bx=Math.max(-45,Math.min(45,x*4)); const by=Math.max(-45,Math.min(45,-y*4));
    ball.style.transform=`translate(${bx*2.2}px,${by*2.2}px)`;
    samples++; samplesEl.textContent=samples;
    if(samples%20===0){ const dt=(now-rateT0)/1000; rateEl.textContent=(20/dt).toFixed(0)+' Hz'; rateT0=now; }
  }
  async function startListening(){
    try{
      if(typeof DeviceMotionEvent!=='undefined' && typeof DeviceMotionEvent.requestPermission==='function'){
        const p=await DeviceMotionEvent.requestPermission();
        if(p!=='granted'){ setStatus('Permission denied','ac-status-err'); return; }
      }
      window.addEventListener('devicemotion',onMotion);
      running=true; rateT0=performance.now();
      setStatus('Live - move your device','ac-status-live');
      startBtn.disabled=true; stopBtn.disabled=false;
    }catch(err){
      setStatus('Error: '+(err.message||err),'ac-status-err');
    }
  }
  function stopListening(){
    window.removeEventListener('devicemotion',onMotion);
    running=false;
    setStatus('Stopped','ac-status-idle');
    startBtn.disabled=false; stopBtn.disabled=true;
  }
  function reset(){
    peak=0; shakes=0; samples=0;
    peakEl.textContent='0.00 m/s²'; shakesEl.textContent='0'; samplesEl.textContent='0'; rateEl.textContent='— Hz';
  }
  startBtn.addEventListener('click',startListening);
  stopBtn.addEventListener('click',stopListening);
  resetBtn.addEventListener('click',reset);
  window.addEventListener('beforeunload',stopListening);
})();
</script>
