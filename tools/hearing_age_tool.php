<?php // hearing_age_tool.php – mosquito tone hearing age test ?>
<style>
  .ha-wrap{max-width:780px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--ha-bg:#0f172a;--ha-accent:#22d3ee;--ha-green:#10b981;--ha-red:#ef4444;--ha-yellow:#f59e0b;--ha-border:#1e293b;--ha-mute:#94a3b8}
  .ha-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .ha-card h3{margin:0 0 12px;font-size:16px;color:#0f172a}
  .ha-warn{background:#fef3c7;border:1px solid #fcd34d;color:#78350f;border-radius:12px;padding:12px 14px;font-size:13px;margin-bottom:14px;display:none}
  .ha-warn.show{display:block}
  .ha-stage{background:var(--ha-bg);border-radius:16px;padding:36px 20px;text-align:center;color:#fff;min-height:240px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px}
  .ha-freq{font-size:clamp(36px,6vw,60px);font-weight:800;letter-spacing:-.5px;color:#fff}
  .ha-freq small{font-size:.4em;color:var(--ha-mute);font-weight:600;display:block;margin-top:4px;letter-spacing:1px;text-transform:uppercase}
  .ha-step-label{font-size:13px;color:var(--ha-mute);text-transform:uppercase;letter-spacing:1px}
  .ha-stage.playing{background:linear-gradient(135deg,#0b2545,#0f172a);box-shadow:0 0 0 3px var(--ha-accent) inset}
  .ha-stage.done{background:linear-gradient(135deg,#064e3b,#065f46)}
  .ha-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:14px;justify-content:center}
  .ha-btn{padding:12px 22px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;transition:transform .1s, box-shadow .1s}
  .ha-btn:active{transform:translateY(1px)}
  .ha-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .ha-btn-yes{background:linear-gradient(180deg,#10b981,#34d399);color:#fff}
  .ha-btn-no{background:linear-gradient(180deg,#ef4444,#f87171);color:#fff}
  .ha-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .ha-btn[disabled]{opacity:.45;cursor:not-allowed}
  .ha-dots{display:flex;gap:6px;flex-wrap:wrap;margin-top:14px;justify-content:center}
  .ha-dot{width:24px;height:24px;border-radius:50%;background:#e2e8f0;color:#64748b;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center;border:2px solid #e2e8f0;transition:all .15s}
  .ha-dot.heard{background:var(--ha-green);color:#fff;border-color:var(--ha-green)}
  .ha-dot.missed{background:var(--ha-red);color:#fff;border-color:var(--ha-red)}
  .ha-dot.active{background:var(--ha-accent);color:#fff;border-color:var(--ha-accent);transform:scale(1.15)}
  .ha-result-card{text-align:center;padding:28px 20px;background:linear-gradient(135deg,#ecfdf5,#f0fdf4);border:2px solid #10b981;border-radius:16px;margin-top:8px}
  .ha-age-bucket{font-size:clamp(28px,5vw,46px);font-weight:800;color:#065f46;margin:6px 0;letter-spacing:-.5px}
  .ha-age-sub{color:#047857;font-size:14px;line-height:1.5;max-width:480px;margin:0 auto}
  .ha-result-row{display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:10px;margin-top:16px}
  .ha-result-stat{background:#fff;border:1px solid #d1fae5;border-radius:10px;padding:12px 8px;text-align:center}
  .ha-result-stat b{display:block;font-size:18px;color:#065f46;font-weight:800}
  .ha-result-stat span{font-size:11px;color:#047857;text-transform:uppercase;letter-spacing:.5px}
  .ha-mosquito-yes{color:#10b981;font-weight:700}
  .ha-mosquito-no{color:#ef4444;font-weight:700}
  .ha-vol-row{display:flex;align-items:center;gap:12px;margin-top:8px}
  .ha-vol-row label{font-size:13px;color:#475569;font-weight:600;flex:0 0 auto}
  .ha-vol-row input[type=range]{flex:1}
  .ha-vol-val{font-size:12px;color:#64748b;flex:0 0 60px;text-align:right}
  .ha-manual{margin-top:8px}
  .ha-manual-row{display:flex;align-items:center;gap:12px;margin-top:10px}
  .ha-manual-row label{font-size:13px;color:#475569;font-weight:600;flex:0 0 auto}
  .ha-manual-row input[type=range]{flex:1}
  .ha-manual-freq{font-size:14px;color:#0f172a;font-weight:700;flex:0 0 90px;text-align:right}
  .ha-note{font-size:12px;color:#64748b;margin-top:10px;text-align:center}
</style>

<div class="ha-wrap">
  <div class="ha-card">
    <h3>Safety first</h3>
    <p style="margin:0;color:#475569;font-size:14px">Use <strong>wired headphones</strong> at low volume. Most laptop speakers cannot reproduce frequencies above 14-16 kHz, which will fake-fail the test. High-frequency tones can damage hearing without feeling loud &mdash; start at 20-30% system volume and turn up only if you need to.</p>
    <div class="ha-vol-row">
      <label for="ha-vol">Volume</label>
      <input id="ha-vol" type="range" min="0" max="100" value="40" step="1">
      <span class="ha-vol-val" id="ha-vol-val">40%</span>
    </div>
  </div>

  <div class="ha-warn" id="ha-warn">Heads-up: this step plays above 16 kHz. If you are on laptop or phone speakers, the speaker will silently roll off &mdash; use headphones for an honest result.</div>

  <div class="ha-stage" id="ha-stage">
    <div class="ha-step-label" id="ha-step-label">Press Start when ready</div>
    <div class="ha-freq" id="ha-freq">Hearing Age Test<small>12 frequency steps</small></div>
    <div class="ha-actions">
      <button id="ha-start" class="ha-btn ha-btn-primary">Start test</button>
      <button id="ha-yes" class="ha-btn ha-btn-yes" disabled>I can hear it</button>
      <button id="ha-no" class="ha-btn ha-btn-no" disabled>I can't hear it</button>
    </div>
  </div>

  <div class="ha-dots" id="ha-dots" aria-label="Test progress"></div>

  <div id="ha-result" style="display:none"></div>

  <div class="ha-card ha-manual">
    <h3>Manual fine-tune slider</h3>
    <p style="margin:0 0 6px;color:#475569;font-size:14px">Drag from 8 kHz to 22 kHz to find the exact frequency where the tone disappears for you. More precise than the 12-step screening above.</p>
    <div class="ha-manual-row">
      <label for="ha-manual">Frequency</label>
      <input id="ha-manual" type="range" min="8000" max="22000" value="12000" step="100">
      <span class="ha-manual-freq" id="ha-manual-freq">12.0 kHz</span>
    </div>
    <div class="ha-actions" style="margin-top:10px;justify-content:flex-start">
      <button id="ha-manual-play" class="ha-btn ha-btn-primary">Play tone</button>
      <button id="ha-manual-stop" class="ha-btn ha-btn-ghost">Stop</button>
    </div>
  </div>
  <p class="ha-note">Tip: this is a screening tool, not a medical audiogram. For diagnostic results, see an audiologist.</p>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const FREQS=[8000,10000,12000,14000,15000,16000,17000,17400,18000,19000,20000,22000];
  // Volume cap: -20 dBFS = ~0.1 linear gain. Slider scales 0..0.1
  const MAX_GAIN=0.1;
  const stage=$('ha-stage'), freqEl=$('ha-freq'), stepLabel=$('ha-step-label');
  const dotsEl=$('ha-dots'), resultEl=$('ha-result'), warnEl=$('ha-warn');
  const startBtn=$('ha-start'), yesBtn=$('ha-yes'), noBtn=$('ha-no');
  const volEl=$('ha-vol'), volVal=$('ha-vol-val');
  const manualEl=$('ha-manual'), manualFreq=$('ha-manual-freq');
  const manualPlay=$('ha-manual-play'), manualStop=$('ha-manual-stop');
  let ctx=null, currentOsc=null, currentGain=null, manualOsc=null, manualGain=null;
  let stepIdx=-1, results=[], inProgress=false;

  function ensureCtx(){
    if(!ctx){ ctx=new (window.AudioContext||window.webkitAudioContext)(); }
    if(ctx.state==='suspended') ctx.resume();
    return ctx;
  }
  function getGain(){
    const v=Math.max(0,Math.min(100,parseInt(volEl.value,10)||0));
    return (v/100)*MAX_GAIN;
  }
  function fmtHz(hz){ return hz>=1000 ? (hz/1000).toFixed(1)+' kHz' : hz+' Hz'; }

  function playTone(freq,duration){
    stopTone();
    const c=ensureCtx();
    const o=c.createOscillator(), g=c.createGain();
    o.type='sine'; o.frequency.value=freq;
    const peak=getGain();
    const now=c.currentTime;
    g.gain.setValueAtTime(0,now);
    g.gain.linearRampToValueAtTime(peak,now+0.05); // 50ms fade in
    g.gain.setValueAtTime(peak,now+duration-0.05);
    g.gain.linearRampToValueAtTime(0,now+duration); // 50ms fade out
    o.connect(g); g.connect(c.destination);
    o.start(now); o.stop(now+duration+0.02);
    currentOsc=o; currentGain=g;
    return new Promise(res=>setTimeout(res, duration*1000));
  }
  function stopTone(){
    try{ if(currentOsc){ currentOsc.stop(); currentOsc.disconnect(); } }catch(e){}
    try{ if(currentGain){ currentGain.disconnect(); } }catch(e){}
    currentOsc=null; currentGain=null;
  }
  function startManual(){
    stopManual();
    const c=ensureCtx();
    const o=c.createOscillator(), g=c.createGain();
    o.type='sine'; o.frequency.value=parseInt(manualEl.value,10);
    g.gain.setValueAtTime(0,c.currentTime);
    g.gain.linearRampToValueAtTime(getGain(),c.currentTime+0.05);
    o.connect(g); g.connect(c.destination);
    o.start();
    manualOsc=o; manualGain=g;
  }
  function stopManual(){
    if(!manualOsc) return;
    const c=ctx; const t=c.currentTime;
    try{
      manualGain.gain.cancelScheduledValues(t);
      manualGain.gain.setValueAtTime(manualGain.gain.value,t);
      manualGain.gain.linearRampToValueAtTime(0,t+0.05);
      manualOsc.stop(t+0.06);
    }catch(e){}
    manualOsc=null; manualGain=null;
  }

  function renderDots(){
    dotsEl.innerHTML='';
    FREQS.forEach((f,i)=>{
      const d=document.createElement('div');
      d.className='ha-dot';
      if(results[i]===true) d.classList.add('heard');
      else if(results[i]===false) d.classList.add('missed');
      else if(i===stepIdx) d.classList.add('active');
      d.textContent=Math.round(f/1000);
      d.title=fmtHz(f);
      dotsEl.appendChild(d);
    });
  }

  async function runStep(){
    if(stepIdx>=FREQS.length){ finish(); return; }
    inProgress=true;
    yesBtn.disabled=true; noBtn.disabled=true;
    const f=FREQS[stepIdx];
    stepLabel.textContent='Step '+(stepIdx+1)+' of '+FREQS.length+' - listen now';
    freqEl.innerHTML=fmtHz(f)+'<small>playing tone</small>';
    stage.classList.add('playing');
    warnEl.classList.toggle('show', f>=16000);
    renderDots();
    await playTone(f, 2.0);
    stage.classList.remove('playing');
    stepLabel.textContent='Step '+(stepIdx+1)+' of '+FREQS.length+' - did you hear it?';
    yesBtn.disabled=false; noBtn.disabled=false;
    inProgress=false;
  }

  function answer(heard){
    if(inProgress || stepIdx<0 || stepIdx>=FREQS.length) return;
    results[stepIdx]=heard;
    stepIdx++;
    if(stepIdx>=FREQS.length){ finish(); }
    else { runStep(); }
  }

  function bucketFor(highestHeardHz){
    if(highestHeardHz==null) return {age:'60+',label:'Significant high-frequency loss', detail:'You did not mark any tone above 12 kHz as audible. This can mean older hearing, a speaker rolling off, or simply listening at too low a volume. Re-test with wired headphones in a quiet room before drawing conclusions.'};
    if(highestHeardHz>=22000) return {age:'Under 20', label:'Exceptional young hearing', detail:'You can hear up to 22 kHz - the very top of human range. This is rare past your teens. Either you have unusually well-preserved hearing or your speaker is producing some artifact at the top end.'};
    if(highestHeardHz>=20000) return {age:'20-29', label:'Young adult hearing', detail:'You can hear up to 20 kHz, which is the textbook upper limit. Your high-frequency hearing is in the young-adult range.'};
    if(highestHeardHz>=18000) return {age:'30-39', label:'Healthy adult hearing', detail:'You can hear up to 18-19 kHz. This is normal for healthy adults in their 30s. Most music recordings have very little content above 18 kHz, so this loss is inaudible in real listening.'};
    if(highestHeardHz>=16000) return {age:'40-49', label:'Mild presbycusis', detail:'You hear up to 16-17 kHz. The 17.4 kHz mosquito tone is around your limit. This is the average range for adults aged 40-49.'};
    if(highestHeardHz>=14000) return {age:'50-59', label:'Moderate high-frequency loss', detail:'You hear up to 14-15 kHz. This is typical for adults in their 50s. Speech and music are still fully intelligible, but consonants like "s" and "f" can sound less crisp.'};
    return {age:'60+', label:'Pronounced high-frequency loss', detail:'You can hear up to about '+(highestHeardHz/1000).toFixed(1)+' kHz. This is in the range typical for adults 60+. If you also struggle with speech in noisy rooms, an audiologist visit is worthwhile.'};
  }

  function finish(){
    yesBtn.disabled=true; noBtn.disabled=true;
    stage.classList.remove('playing');
    stage.classList.add('done');
    let highest=null;
    for(let i=0;i<FREQS.length;i++){ if(results[i]===true) highest=FREQS[i]; }
    const mosquitoIdx=FREQS.indexOf(17400);
    const heardMosquito = results[mosquitoIdx]===true;
    const b=bucketFor(highest);
    stepLabel.textContent='Test complete';
    freqEl.innerHTML='Result<small>your hearing age</small>';
    resultEl.style.display='block';
    resultEl.innerHTML=
      '<div class="ha-result-card">'+
        '<div style="font-size:13px;color:#047857;text-transform:uppercase;letter-spacing:1px;font-weight:700">Estimated hearing age</div>'+
        '<div class="ha-age-bucket">'+b.age+'</div>'+
        '<div class="ha-age-sub"><strong>'+b.label+'.</strong> '+b.detail+'</div>'+
        '<div class="ha-result-row">'+
          '<div class="ha-result-stat"><b>'+(highest?fmtHz(highest):'-')+'</b><span>Top heard</span></div>'+
          '<div class="ha-result-stat"><b class="'+(heardMosquito?'ha-mosquito-yes':'ha-mosquito-no')+'">'+(heardMosquito?'Yes':'No')+'</b><span>17.4 kHz mosquito</span></div>'+
          '<div class="ha-result-stat"><b>'+results.filter(r=>r===true).length+'/'+FREQS.length+'</b><span>Tones heard</span></div>'+
        '</div>'+
        '<div class="ha-actions" style="margin-top:16px"><button id="ha-retest" class="ha-btn ha-btn-primary">Retest</button></div>'+
      '</div>';
    document.getElementById('ha-retest').addEventListener('click',resetTest);
  }

  function resetTest(){
    stopTone();
    results=[]; stepIdx=-1; inProgress=false;
    stage.classList.remove('done','playing');
    stepLabel.textContent='Press Start when ready';
    freqEl.innerHTML='Hearing Age Test<small>12 frequency steps</small>';
    warnEl.classList.remove('show');
    resultEl.style.display='none'; resultEl.innerHTML='';
    yesBtn.disabled=true; noBtn.disabled=true;
    startBtn.disabled=false;
    renderDots();
  }

  startBtn.addEventListener('click',()=>{
    ensureCtx();
    startBtn.disabled=true;
    results=[]; stepIdx=0;
    runStep();
  });
  yesBtn.addEventListener('click',()=>answer(true));
  noBtn.addEventListener('click',()=>answer(false));

  volEl.addEventListener('input',()=>{
    volVal.textContent=volEl.value+'%';
    // live update manual osc
    if(manualGain && ctx){
      manualGain.gain.linearRampToValueAtTime(getGain(), ctx.currentTime+0.05);
    }
  });

  manualEl.addEventListener('input',()=>{
    const f=parseInt(manualEl.value,10);
    manualFreq.textContent=(f/1000).toFixed(1)+' kHz';
    if(manualOsc){ manualOsc.frequency.linearRampToValueAtTime(f, ctx.currentTime+0.02); }
  });
  manualPlay.addEventListener('click',startManual);
  manualStop.addEventListener('click',stopManual);

  // init
  results=new Array(FREQS.length).fill(null);
  renderDots();
  manualFreq.textContent='12.0 kHz';
})();
</script>
