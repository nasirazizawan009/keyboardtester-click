<?php
// gyroscope_tool.php – embeddable Gyroscope Test module
// DeviceOrientationEvent readout with 3D cube + compass ring
?>
<style>
  .gy-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--gy-primary:#4b5eaa;--gy-primary-2:#7d8bc1;--gy-accent:#f59e0b;--gy-success:#10b981;--gy-danger:#ef4444;--gy-border:#e2e8f0;--gy-muted:#64748b;--gy-text:#0f172a;--gy-card:#fff}
  .gy-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(12px,2.2vw,24px);align-items:start}
  @media(max-width:900px){.gy-grid{grid-template-columns:1fr}}
  .gy-card{background:var(--gy-card);border:1px solid var(--gy-border);border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px}
  .gy-card h3{margin:0 0 14px;font-size:16px}
  .gy-alert{padding:12px 16px;border-radius:8px;margin-bottom:14px;font-size:13px}
  .gy-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
  .gy-alert-warn{background:#fef3c7;border:1px solid #fde68a;color:#92400e}
  .gy-btn{appearance:none;border:none;padding:12px 18px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .gy-btn-primary{background:linear-gradient(180deg,var(--gy-primary),var(--gy-primary-2));color:#fff}
  .gy-btn-ghost{background:#f1f5f9;color:var(--gy-text);border:1px solid var(--gy-border)}
  .gy-btn-danger{background:var(--gy-danger);color:#fff}
  .gy-btn:disabled{opacity:.5;cursor:not-allowed}
  .gy-status{padding:8px 12px;border-radius:8px;font-size:13px;font-weight:600;display:inline-block;margin-bottom:10px}
  .gy-status-idle{background:#f1f5f9;color:var(--gy-muted)}
  .gy-status-live{background:#dcfce7;color:#166534}
  .gy-status-err{background:#fee2e2;color:#991b1b}
  .gy-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
  .gy-readout{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:14px}
  .gy-read{background:#f8fafc;border:1px solid var(--gy-border);border-radius:10px;padding:12px;text-align:center}
  .gy-read-label{font-size:11px;color:var(--gy-muted);text-transform:uppercase;letter-spacing:.5px;font-weight:700}
  .gy-read-val{font-size:22px;font-weight:800;color:var(--gy-primary);font-variant-numeric:tabular-nums;margin-top:4px}
  .gy-read-desc{font-size:11px;color:var(--gy-muted);margin-top:2px}
  .gy-stage{display:flex;justify-content:center;align-items:center;min-height:280px;perspective:900px;background:radial-gradient(circle,#f8fafc 0%,#e2e8f0 100%);border:2px solid var(--gy-border);border-radius:12px;padding:20px}
  .gy-cube{position:relative;width:140px;height:140px;transform-style:preserve-3d;transition:transform .05s linear}
  .gy-face{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-weight:800;color:#fff;font-size:20px;border:2px solid rgba(255,255,255,.25)}
  .gy-face.f1{background:linear-gradient(135deg,#4b5eaa,#7d8bc1);transform:translateZ(70px)}
  .gy-face.f2{background:linear-gradient(135deg,#ef4444,#b91c1c);transform:rotateY(180deg) translateZ(70px)}
  .gy-face.f3{background:linear-gradient(135deg,#10b981,#047857);transform:rotateY(90deg) translateZ(70px)}
  .gy-face.f4{background:linear-gradient(135deg,#f59e0b,#b45309);transform:rotateY(-90deg) translateZ(70px)}
  .gy-face.f5{background:linear-gradient(135deg,#8b5cf6,#6d28d9);transform:rotateX(90deg) translateZ(70px)}
  .gy-face.f6{background:linear-gradient(135deg,#0891b2,#0e7490);transform:rotateX(-90deg) translateZ(70px)}
  .gy-compass{position:relative;width:200px;height:200px;margin:20px auto 0;border-radius:50%;background:#0f172a;border:3px solid #1e293b;display:flex;align-items:center;justify-content:center}
  .gy-compass-needle{position:absolute;width:4px;height:80px;background:linear-gradient(to bottom,#ef4444 0%,#ef4444 50%,#f1f5f9 50%,#f1f5f9 100%);top:20px;transform-origin:bottom center;transition:transform .1s linear}
  .gy-compass-n,.gy-compass-e,.gy-compass-s,.gy-compass-w{position:absolute;color:#cbd5e1;font-size:12px;font-weight:700}
  .gy-compass-n{top:6px} .gy-compass-s{bottom:6px} .gy-compass-e{right:8px} .gy-compass-w{left:8px}
  .gy-compass-val{color:#f59e0b;font-size:24px;font-weight:800;font-variant-numeric:tabular-nums}
</style>

<div class="gy-wrap">
  <div id="gy-unsupported" class="gy-alert gy-alert-warn" style="display:none">
    ⚠️ <strong>Not supported:</strong> This device does not expose DeviceOrientationEvent. Open this page on a phone or tablet.
  </div>

  <div class="gy-grid">
    <div class="gy-card">
      <h3>Live orientation readout</h3>
      <div id="gy-status" class="gy-status gy-status-idle">Not started</div>
      <div class="gy-alert gy-alert-info">On iOS 13+ you must tap "Start" to grant orientation permission.</div>
      <div class="gy-actions">
        <button id="gy-start" class="gy-btn gy-btn-primary">Start</button>
        <button id="gy-stop" class="gy-btn gy-btn-danger" disabled>Stop</button>
        <button id="gy-cal" class="gy-btn gy-btn-ghost">Calibrate to zero</button>
      </div>
      <div class="gy-readout">
        <div class="gy-read"><div class="gy-read-label">Alpha</div><div id="gy-alpha" class="gy-read-val">0°</div><div class="gy-read-desc">compass / Z-axis</div></div>
        <div class="gy-read"><div class="gy-read-label">Beta</div><div id="gy-beta" class="gy-read-val">0°</div><div class="gy-read-desc">front-back tilt</div></div>
        <div class="gy-read"><div class="gy-read-label">Gamma</div><div id="gy-gamma" class="gy-read-val">0°</div><div class="gy-read-desc">left-right tilt</div></div>
      </div>
      <div class="gy-compass">
        <div class="gy-compass-n">N</div><div class="gy-compass-e">E</div><div class="gy-compass-s">S</div><div class="gy-compass-w">W</div>
        <div id="gy-needle" class="gy-compass-needle"></div>
        <div id="gy-compassVal" class="gy-compass-val">0°</div>
      </div>
    </div>

    <div class="gy-card">
      <h3>3D orientation cube</h3>
      <div class="gy-stage">
        <div id="gy-cube" class="gy-cube">
          <div class="gy-face f1">FRONT</div>
          <div class="gy-face f2">BACK</div>
          <div class="gy-face f3">RIGHT</div>
          <div class="gy-face f4">LEFT</div>
          <div class="gy-face f5">TOP</div>
          <div class="gy-face f6">BOTTOM</div>
        </div>
      </div>
      <div style="margin-top:12px;font-size:12px;color:var(--gy-muted)">
        Tilt, turn, or rotate your device &mdash; the cube follows in real time. "Calibrate to zero" snaps the cube's current orientation to the identity so you can measure relative rotation from a custom starting point.
      </div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const startBtn=$('gy-start'),stopBtn=$('gy-stop'),calBtn=$('gy-cal'),statusEl=$('gy-status');
  const aEl=$('gy-alpha'),bEl=$('gy-beta'),gEl=$('gy-gamma');
  const cube=$('gy-cube'),needle=$('gy-needle'),compassVal=$('gy-compassVal');
  const unsupported=$('gy-unsupported');

  if(typeof DeviceOrientationEvent==='undefined'){ unsupported.style.display='block'; startBtn.disabled=true; }

  let running=false,calA=0,calB=0,calG=0;
  function setStatus(text,cls){ statusEl.textContent=text; statusEl.className='gy-status '+cls; }
  function onOrient(e){
    if(!running) return;
    let a=(e.alpha||0)-calA, b=(e.beta||0)-calB, g=(e.gamma||0)-calG;
    aEl.textContent=Math.round(((a%360)+360)%360)+'°';
    bEl.textContent=Math.round(b)+'°';
    gEl.textContent=Math.round(g)+'°';
    cube.style.transform=`rotateX(${-b}deg) rotateY(${g}deg) rotateZ(${a}deg)`;
    const heading=((a%360)+360)%360;
    needle.style.transform=`rotate(${heading}deg)`;
    compassVal.textContent=Math.round(heading)+'°';
  }
  async function startListening(){
    try{
      if(typeof DeviceOrientationEvent!=='undefined' && typeof DeviceOrientationEvent.requestPermission==='function'){
        const p=await DeviceOrientationEvent.requestPermission();
        if(p!=='granted'){ setStatus('Permission denied','gy-status-err'); return; }
      }
      window.addEventListener('deviceorientation',onOrient);
      running=true;
      setStatus('Live - tilt your device','gy-status-live');
      startBtn.disabled=true; stopBtn.disabled=false;
    }catch(err){ setStatus('Error: '+(err.message||err),'gy-status-err'); }
  }
  function stopListening(){
    window.removeEventListener('deviceorientation',onOrient);
    running=false;
    setStatus('Stopped','gy-status-idle');
    startBtn.disabled=false; stopBtn.disabled=true;
  }
  function calibrate(){
    // Capture a single reading to use as the new zero
    window.addEventListener('deviceorientation',function h(e){
      calA=e.alpha||0; calB=e.beta||0; calG=e.gamma||0;
      window.removeEventListener('deviceorientation',h);
    },{once:true});
  }
  startBtn.addEventListener('click',startListening);
  stopBtn.addEventListener('click',stopListening);
  calBtn.addEventListener('click',calibrate);
  window.addEventListener('beforeunload',stopListening);
})();
</script>
