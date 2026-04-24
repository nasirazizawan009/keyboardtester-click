<?php
// frequency_response_tool.php – embeddable Frequency Response Test module
// 20 Hz to 20 kHz log sweep + manual slider + hearing-limit logging
?>
<style>
  .fr-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--fr-primary:#4b5eaa;--fr-primary-2:#7d8bc1;--fr-accent:#f59e0b;--fr-success:#10b981;--fr-danger:#ef4444;--fr-border:#e2e8f0;--fr-muted:#64748b;--fr-text:#0f172a;--fr-card:#fff;--fr-shadow:0 10px 25px rgba(17,24,39,.08)}
  .fr-grid{display:grid;grid-template-columns:1fr 1fr;gap:clamp(12px,2.2vw,24px);align-items:start}
  @media(max-width:1000px){.fr-grid{grid-template-columns:1fr}}
  .fr-card{background:var(--fr-card);border:1px solid var(--fr-border);border-radius:16px;box-shadow:var(--fr-shadow);padding:20px}
  .fr-card h3{margin:0 0 14px;font-size:16px}
  .fr-readout{background:linear-gradient(135deg,#1e1e2f,#2a2a3d);color:#fff;border-radius:12px;padding:24px 18px;text-align:center;margin-bottom:14px}
  .fr-freq-big{font-size:clamp(36px,6vw,56px);font-weight:800;letter-spacing:.5px;line-height:1;margin:0;font-variant-numeric:tabular-nums}
  .fr-freq-unit{font-size:18px;color:#cbd5e1;margin-left:8px}
  .fr-freq-band{margin-top:8px;color:#f59e0b;font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:1px}
  .fr-graph{width:100%;height:180px;background:#0f172a;border-radius:10px;display:block;margin-top:10px}
  .fr-btn{appearance:none;border:none;padding:11px 16px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;transition:filter .2s,transform .05s}
  .fr-btn:active{transform:translateY(1px)}
  .fr-btn:disabled{opacity:.5;cursor:not-allowed}
  .fr-btn-primary{background:linear-gradient(180deg,var(--fr-primary),var(--fr-primary-2));color:#fff}
  .fr-btn-success{background:var(--fr-success);color:#fff}
  .fr-btn-danger{background:var(--fr-danger);color:#fff}
  .fr-btn-ghost{background:#f1f5f9;color:var(--fr-text);border:1px solid var(--fr-border)}
  .fr-controls{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:14px}
  .fr-slider-row{display:grid;gap:6px;margin-top:14px}
  .fr-slider-row label{display:flex;justify-content:space-between;font-size:13px;color:var(--fr-muted);font-weight:600}
  .fr-slider{width:100%;height:8px;border-radius:5px;background:#e2e8f0;outline:none;appearance:none;cursor:pointer}
  .fr-slider::-webkit-slider-thumb{appearance:none;width:20px;height:20px;border-radius:50%;background:var(--fr-primary);border:3px solid #fff;box-shadow:0 2px 4px rgba(0,0,0,.2);cursor:pointer}
  .fr-slider::-moz-range-thumb{width:20px;height:20px;border-radius:50%;background:var(--fr-primary);border:3px solid #fff;box-shadow:0 2px 4px rgba(0,0,0,.2);cursor:pointer}
  .fr-hearing{background:#f8fafc;border:1px solid var(--fr-border);border-radius:10px;padding:14px;margin-top:14px}
  .fr-hearing-row{display:flex;justify-content:space-between;padding:6px 0;font-size:14px;border-bottom:1px dashed var(--fr-border)}
  .fr-hearing-row:last-child{border-bottom:none}
  .fr-hearing-row b{color:var(--fr-primary);font-variant-numeric:tabular-nums}
  .fr-alert{padding:12px 16px;border-radius:8px;margin-bottom:14px;font-size:13px;background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
  .fr-tick-row{display:flex;justify-content:space-between;font-size:11px;color:var(--fr-muted);margin-top:4px;font-variant-numeric:tabular-nums}
</style>

<div class="fr-wrap">
  <div class="fr-grid">
    <div class="fr-card">
      <div class="fr-alert">🎧 Use good headphones or full-range speakers. Start at a low volume &mdash; sine tones at high volume can damage hearing fast, especially above 10 kHz.</div>
      <div class="fr-readout">
        <div><span id="fr-freqBig" class="fr-freq-big">0</span><span class="fr-freq-unit">Hz</span></div>
        <div id="fr-band" class="fr-freq-band">Ready</div>
      </div>
      <canvas id="fr-graph" class="fr-graph" width="600" height="180"></canvas>
      <div class="fr-tick-row">
        <span>20</span><span>100</span><span>500</span><span>1k</span><span>5k</span><span>10k</span><span>20k</span>
      </div>
      <div class="fr-controls" style="margin-top:16px">
        <button id="fr-start" class="fr-btn fr-btn-primary">Start sweep</button>
        <button id="fr-stop" class="fr-btn fr-btn-danger" disabled>Stop</button>
        <button id="fr-markLow" class="fr-btn fr-btn-success" disabled>I hear it now (low)</button>
        <button id="fr-markHigh" class="fr-btn fr-btn-ghost" disabled>Stopped hearing (high)</button>
      </div>
      <div class="fr-slider-row">
        <label><span>Sweep duration</span><span id="fr-durVal">25s</span></label>
        <input id="fr-dur" class="fr-slider" type="range" min="10" max="60" step="1" value="25">
      </div>
      <div class="fr-slider-row">
        <label><span>Volume</span><span id="fr-volVal">25%</span></label>
        <input id="fr-vol" class="fr-slider" type="range" min="0" max="100" step="1" value="25">
      </div>
    </div>

    <div>
      <div class="fr-card" style="margin-bottom:14px">
        <h3>Manual tone</h3>
        <div class="fr-slider-row">
          <label><span>Hold a specific frequency</span><span id="fr-manualVal">1000 Hz</span></label>
          <input id="fr-manual" class="fr-slider" type="range" min="20" max="20000" step="1" value="1000">
        </div>
        <div class="fr-controls" style="margin-top:12px">
          <button id="fr-manualPlay" class="fr-btn fr-btn-primary">Play tone</button>
          <button id="fr-manualStop" class="fr-btn fr-btn-danger" disabled>Stop tone</button>
        </div>
      </div>

      <div class="fr-card">
        <h3>Your hearing limits</h3>
        <div class="fr-hearing">
          <div class="fr-hearing-row"><span>Lowest audible</span><b id="fr-limLow">—</b></div>
          <div class="fr-hearing-row"><span>Highest audible</span><b id="fr-limHigh">—</b></div>
          <div class="fr-hearing-row"><span>Audible span</span><b id="fr-limSpan">—</b></div>
          <div class="fr-hearing-row"><span>Age-typical ceiling</span><b id="fr-limAge">—</b></div>
        </div>
        <div style="margin-top:10px;font-size:12px;color:var(--fr-muted)">
          Healthy 20-year-olds hear up to ~18-20 kHz; this drops ~2 kHz per decade (presbycusis). A 1 kHz ceiling likely means your speaker is rolling off, not your ears.
        </div>
        <button id="fr-reset" class="fr-btn fr-btn-ghost" style="margin-top:10px">Reset results</button>
      </div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const d=document;
  const $=id=>d.getElementById(id);
  const freqBig=$('fr-freqBig'),band=$('fr-band');
  const graph=$('fr-graph'),gctx=graph.getContext('2d');
  const startBtn=$('fr-start'),stopBtn=$('fr-stop'),markLow=$('fr-markLow'),markHigh=$('fr-markHigh');
  const durIn=$('fr-dur'),durVal=$('fr-durVal'),volIn=$('fr-vol'),volVal=$('fr-volVal');
  const manIn=$('fr-manual'),manVal=$('fr-manualVal'),manPlay=$('fr-manualPlay'),manStop=$('fr-manualStop');
  const limLow=$('fr-limLow'),limHigh=$('fr-limHigh'),limSpan=$('fr-limSpan'),limAge=$('fr-limAge'),resetBtn=$('fr-reset');

  let ctx=null,osc=null,gain=null,sweepT0=0,sweepDur=25,sweepRAF=0,sweeping=false,manualPlaying=false;
  const FMIN=20,FMAX=20000,LOG_MIN=Math.log10(FMIN),LOG_MAX=Math.log10(FMAX);
  let lowestHeard=null,highestHeard=null;

  function init(){
    if(ctx) return;
    ctx=new (window.AudioContext||window.webkitAudioContext)();
    gain=ctx.createGain();
    gain.gain.value=Math.pow(volIn.value/100,2)*0.5;
    gain.connect(ctx.destination);
  }
  function fmt(f){return f>=1000?(f/1000).toFixed(f>=10000?0:2)+' kHz':Math.round(f)+' Hz'}
  function bandName(f){
    if(f<60) return 'Sub-bass';
    if(f<250) return 'Bass';
    if(f<500) return 'Low-mids';
    if(f<2000) return 'Mids';
    if(f<4000) return 'Upper-mids';
    if(f<6000) return 'Presence';
    if(f<10000) return 'Brilliance';
    return 'Air';
  }
  function drawGraph(currentF){
    const w=graph.width=graph.offsetWidth*devicePixelRatio, h=graph.height=180*devicePixelRatio;
    gctx.setTransform(1,0,0,1,0,0);
    gctx.fillStyle='#0f172a'; gctx.fillRect(0,0,w,h);
    const ticks=[20,50,100,500,1000,5000,10000,20000];
    gctx.strokeStyle='rgba(255,255,255,.1)'; gctx.lineWidth=1; gctx.font=`${11*devicePixelRatio}px system-ui`; gctx.fillStyle='#64748b';
    ticks.forEach(t=>{
      const x=(Math.log10(t)-LOG_MIN)/(LOG_MAX-LOG_MIN)*w;
      gctx.beginPath(); gctx.moveTo(x,0); gctx.lineTo(x,h); gctx.stroke();
    });
    if(currentF){
      const x=(Math.log10(currentF)-LOG_MIN)/(LOG_MAX-LOG_MIN)*w;
      const grd=gctx.createLinearGradient(0,0,0,h);
      grd.addColorStop(0,'#f59e0b'); grd.addColorStop(1,'#ef4444');
      gctx.fillStyle=grd;
      gctx.fillRect(Math.max(0,x-3*devicePixelRatio),0,6*devicePixelRatio,h);
    }
  }
  function setFreqDisplay(f){
    freqBig.textContent = f>=1000?(f/1000).toFixed(f>=10000?1:2):Math.round(f);
    d.querySelector('.fr-freq-unit').textContent = f>=1000?' kHz':' Hz';
    band.textContent = bandName(f);
    drawGraph(f);
  }
  function startSweep(){
    if(sweeping) return;
    init(); if(ctx.state==='suspended') ctx.resume();
    stopAll();
    sweeping=true;
    sweepDur=parseInt(durIn.value,10);
    osc=ctx.createOscillator(); osc.type='sine'; osc.frequency.value=FMIN;
    osc.connect(gain); osc.start();
    osc.frequency.exponentialRampToValueAtTime(FMAX, ctx.currentTime+sweepDur);
    sweepT0=performance.now();
    startBtn.disabled=true; stopBtn.disabled=false; markLow.disabled=false; markHigh.disabled=false;
    const tick=()=>{
      if(!sweeping) return;
      const t=(performance.now()-sweepT0)/1000;
      if(t>=sweepDur){ stopSweep(); return; }
      const f=FMIN*Math.pow(FMAX/FMIN, t/sweepDur);
      setFreqDisplay(f);
      sweepRAF=requestAnimationFrame(tick);
    };
    sweepRAF=requestAnimationFrame(tick);
  }
  function stopSweep(){
    if(!sweeping) return;
    sweeping=false;
    cancelAnimationFrame(sweepRAF);
    if(osc){ try{osc.stop();}catch(e){} osc.disconnect(); osc=null; }
    startBtn.disabled=false; stopBtn.disabled=true; markLow.disabled=true; markHigh.disabled=true;
    band.textContent='Stopped';
  }
  function stopAll(){
    if(osc){ try{osc.stop();}catch(e){} try{osc.disconnect();}catch(e){} osc=null; }
    sweeping=false; manualPlaying=false;
    cancelAnimationFrame(sweepRAF);
  }
  function currentSweepFreq(){
    if(!sweeping) return null;
    const t=(performance.now()-sweepT0)/1000;
    return FMIN*Math.pow(FMAX/FMIN, Math.min(t,sweepDur)/sweepDur);
  }
  function refreshLimits(){
    limLow.textContent = lowestHeard!=null ? fmt(lowestHeard) : '—';
    limHigh.textContent = highestHeard!=null ? fmt(highestHeard) : '—';
    limSpan.textContent = (lowestHeard!=null && highestHeard!=null) ? `${fmt(lowestHeard)} – ${fmt(highestHeard)}` : '—';
    if(highestHeard!=null){
      let age='adult (30-40)';
      if(highestHeard>=18000) age='teen / 20s';
      else if(highestHeard>=15000) age='20s-30s';
      else if(highestHeard>=13000) age='30s-40s';
      else if(highestHeard>=11000) age='40s-50s';
      else if(highestHeard>=8000) age='50s-60s';
      else age='60+ or hardware limited';
      limAge.textContent=age;
    } else limAge.textContent='—';
  }

  // Events
  durIn.addEventListener('input',()=>durVal.textContent=durIn.value+'s');
  volIn.addEventListener('input',()=>{ volVal.textContent=volIn.value+'%'; if(gain) gain.gain.setValueAtTime(Math.pow(volIn.value/100,2)*0.5, ctx.currentTime); });
  manIn.addEventListener('input',()=>{
    manVal.textContent = fmt(parseInt(manIn.value,10));
    if(manualPlaying && osc){ osc.frequency.setValueAtTime(parseInt(manIn.value,10), ctx.currentTime); }
  });
  startBtn.addEventListener('click',startSweep);
  stopBtn.addEventListener('click',stopSweep);
  markLow.addEventListener('click',()=>{ const f=currentSweepFreq(); if(f && (lowestHeard==null || f<lowestHeard)) lowestHeard=f; refreshLimits(); markLow.disabled=true; });
  markHigh.addEventListener('click',()=>{ const f=currentSweepFreq(); if(f && (highestHeard==null || f>highestHeard)) highestHeard=f; refreshLimits(); });
  manPlay.addEventListener('click',()=>{
    init(); if(ctx.state==='suspended') ctx.resume();
    stopAll();
    osc=ctx.createOscillator(); osc.type='sine'; osc.frequency.value=parseInt(manIn.value,10);
    osc.connect(gain); osc.start();
    manualPlaying=true;
    manPlay.disabled=true; manStop.disabled=false;
    setFreqDisplay(parseInt(manIn.value,10));
  });
  manStop.addEventListener('click',()=>{ stopAll(); manPlay.disabled=false; manStop.disabled=true; band.textContent='Stopped'; });
  resetBtn.addEventListener('click',()=>{ lowestHeard=null; highestHeard=null; refreshLimits(); });
  window.addEventListener('beforeunload',()=>{ stopAll(); if(ctx) ctx.close(); });
  window.addEventListener('resize',()=>drawGraph(currentSweepFreq()||parseInt(manIn.value,10)));
  setFreqDisplay(parseInt(manIn.value,10));
})();
</script>
