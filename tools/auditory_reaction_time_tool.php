<?php // auditory_reaction_time_tool.php – Web Audio API reaction test ?>
<style>
  .art-wrap{max-width:760px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--art-bg:#0f172a;--art-accent:#22d3ee;--art-green:#10b981;--art-red:#ef4444;--art-yellow:#f59e0b;--art-border:#1e293b;--art-mute:#94a3b8}
  .art-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .art-card h3{margin:0 0 12px;font-size:16px}
  .art-stage{background:var(--art-bg);border-radius:16px;padding:40px 20px;text-align:center;color:#fff;min-height:260px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;cursor:pointer;user-select:none;transition:background .15s}
  .art-stage.waiting{background:var(--art-bg)}
  .art-stage.armed{background:#0b2545}
  .art-stage.ready{background:var(--art-green)}
  .art-stage.early{background:var(--art-red)}
  .art-stage.done{background:#1e293b}
  .art-big{font-size:clamp(32px,6vw,64px);font-weight:800;letter-spacing:-.5px}
  .art-sub{font-size:14px;color:var(--art-mute);max-width:420px}
  .art-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:10px;margin-top:14px}
  .art-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .art-stat b{display:block;font-size:22px;color:#0f172a}
  .art-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .art-rounds{display:flex;gap:6px;flex-wrap:wrap;margin-top:10px;justify-content:center}
  .art-round{width:28px;height:28px;border-radius:50%;background:#e2e8f0;color:#64748b;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center}
  .art-round.done{background:var(--art-green);color:#fff}
  .art-round.active{background:var(--art-accent);color:#fff}
  .art-actions{display:flex;gap:10px;flex-wrap:wrap;margin-top:14px;justify-content:center}
  .art-btn{padding:12px 22px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .art-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .art-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .art-note{font-size:12px;color:#64748b;margin-top:10px;text-align:center}
</style>

<div class="art-wrap">
  <div class="art-card">
    <h3>Instructions</h3>
    <p style="margin:0;color:#475569;font-size:14px">Click or tap the black stage to start a round. A beep will play after a random 1.5&ndash;4 second delay &mdash; click as fast as you can when you hear it. Keep headphones or speakers on. Pressing Space also works.</p>
  </div>

  <div id="art-stage" class="art-stage waiting" role="button" tabindex="0" aria-label="Reaction test stage">
    <div id="art-big" class="art-big">Click to start</div>
    <div id="art-sub" class="art-sub">A beep will play after a random delay. Click immediately when you hear it.</div>
  </div>

  <div class="art-rounds" id="art-rounds"></div>

  <div class="art-stats">
    <div class="art-stat"><b id="art-last">&mdash;</b><span>Last (ms)</span></div>
    <div class="art-stat"><b id="art-avg">&mdash;</b><span>Average</span></div>
    <div class="art-stat"><b id="art-best">&mdash;</b><span>Best</span></div>
    <div class="art-stat"><b id="art-worst">&mdash;</b><span>Worst</span></div>
  </div>

  <div class="art-actions">
    <button id="art-reset" class="art-btn art-btn-ghost">Reset</button>
  </div>
  <p class="art-note">Tip: wired headphones give more accurate results than Bluetooth (BT audio adds 40&ndash;200&nbsp;ms of codec latency).</p>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const stage=$('art-stage'),bigEl=$('art-big'),subEl=$('art-sub'),rounds=$('art-rounds');
  const lastEl=$('art-last'),avgEl=$('art-avg'),bestEl=$('art-best'),worstEl=$('art-worst');
  const ROUNDS=5;
  let ctx=null, state='idle', timer=null, beepAt=0, results=[], roundIdx=0;

  function ensureCtx(){
    if(!ctx){ ctx = new (window.AudioContext||window.webkitAudioContext)(); }
    if(ctx.state==='suspended') ctx.resume();
    return ctx;
  }
  function beep(){
    const c=ensureCtx();
    const o=c.createOscillator(), g=c.createGain();
    o.type='sine'; o.frequency.value=880;
    g.gain.setValueAtTime(0,c.currentTime);
    g.gain.linearRampToValueAtTime(0.35,c.currentTime+0.01);
    g.gain.linearRampToValueAtTime(0,c.currentTime+0.15);
    o.connect(g); g.connect(c.destination);
    o.start(c.currentTime); o.stop(c.currentTime+0.17);
    return c.currentTime*1000;
  }
  function renderRounds(){
    rounds.innerHTML='';
    for(let i=0;i<ROUNDS;i++){
      const el=document.createElement('div');
      el.className='art-round'+(i<results.length?' done':(i===roundIdx?' active':''));
      el.textContent=i<results.length?results[i]:(i+1);
      rounds.appendChild(el);
    }
  }
  function renderStats(){
    if(!results.length){ lastEl.textContent=avgEl.textContent=bestEl.textContent=worstEl.textContent='—'; return; }
    const last=results[results.length-1];
    const avg=Math.round(results.reduce((a,b)=>a+b,0)/results.length);
    const best=Math.min(...results), worst=Math.max(...results);
    lastEl.textContent=last; avgEl.textContent=avg; bestEl.textContent=best; worstEl.textContent=worst;
  }
  function setStage(cls,big,sub){ stage.className='art-stage '+cls; bigEl.textContent=big; subEl.textContent=sub||''; }

  function armRound(){
    if(roundIdx>=ROUNDS){ return; }
    state='armed'; setStage('armed','Wait for beep...','Do NOT click until you hear the tone.');
    renderRounds();
    const delay=1500+Math.random()*2500;
    timer=setTimeout(()=>{
      const audioT=beep();
      beepAt=performance.now();
      state='ready';
      setStage('ready','Click now!','You heard it — click!');
    },delay);
  }
  function click(){
    if(state==='idle' || state==='done'){
      ensureCtx();
      results=[]; roundIdx=0; renderStats(); renderRounds();
      armRound();
      return;
    }
    if(state==='armed'){
      clearTimeout(timer); state='idle';
      setStage('early','Too early!','You clicked before the beep. Click to try again.');
      return;
    }
    if(state==='ready'){
      const rt=Math.round(performance.now()-beepAt);
      results.push(rt); roundIdx++;
      renderStats();
      if(roundIdx>=ROUNDS){
        state='done';
        const avg=Math.round(results.reduce((a,b)=>a+b,0)/results.length);
        setStage('done',avg+' ms avg','5 rounds done. Click to restart.');
      } else {
        armRound();
      }
    }
  }
  stage.addEventListener('click',click);
  stage.addEventListener('keydown',e=>{ if(e.key===' '||e.key==='Enter'){ e.preventDefault(); click(); } });
  document.addEventListener('keydown',e=>{ if(e.key===' ' && (state==='armed'||state==='ready')){ e.preventDefault(); click(); } });
  $('art-reset').addEventListener('click',()=>{
    clearTimeout(timer); state='idle'; results=[]; roundIdx=0;
    setStage('waiting','Click to start','A beep will play after a random delay.');
    renderStats(); renderRounds();
  });
  renderRounds();
})();
</script>
