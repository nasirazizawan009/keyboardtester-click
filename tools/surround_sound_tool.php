<?php // surround_sound_tool.php – 5.1 / 7.1 walk-around with stereo fallback ?>
<style>
  .ss-wrap{max-width:960px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .ss-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .ss-card h3{margin:0 0 12px;font-size:16px}
  .ss-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;margin-bottom:14px}
  .ss-btn{padding:10px 18px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .ss-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .ss-btn-ghost{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .ss-btn-danger{background:#ef4444;color:#fff}
  .ss-field{display:flex;gap:6px;align-items:center;font-size:13px;color:#334155}
  .ss-field select,.ss-field input{padding:6px 8px;border:1px solid #e2e8f0;border-radius:6px;background:#fff}
  .ss-diagram{position:relative;background:#0f172a;border-radius:16px;aspect-ratio:1.2/1;max-width:560px;margin:0 auto}
  .ss-listener{position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:80px;height:80px;border-radius:50%;background:#334155;color:#94a3b8;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;text-align:center;line-height:1.2}
  .ss-spk{position:absolute;transform:translate(-50%,-50%);width:110px;padding:12px 8px;border-radius:12px;border:2px solid #475569;background:#1e293b;color:#cbd5e1;text-align:center;font-size:12px;font-weight:700;cursor:pointer;user-select:none;transition:all .15s}
  .ss-spk:hover{background:#334155;border-color:#64748b}
  .ss-spk.active{background:#10b981;border-color:#34d399;color:#fff;box-shadow:0 0 24px rgba(16,185,129,.6)}
  .ss-spk .ch{display:block;font-size:10px;color:#94a3b8;font-weight:600;margin-top:2px}
  .ss-spk.active .ch{color:#d1fae5}
  .ss-fl{left:18%;top:20%} .ss-fr{left:82%;top:20%}
  .ss-c{left:50%;top:10%} .ss-sub{left:50%;top:90%}
  .ss-rl{left:12%;top:85%} .ss-rr{left:88%;top:85%}
  .ss-sl{left:5%;top:50%} .ss-sr{left:95%;top:50%}
  .ss-status{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:10px 12px;font-size:13px;color:#334155;margin-top:10px}
  .ss-mode{font-size:12px;color:#64748b;margin-top:4px}
</style>

<div class="ss-wrap">
  <div class="ss-card">
    <h3>Setup</h3>
    <div class="ss-controls">
      <div class="ss-field"><label for="ss-layout">Layout</label>
        <select id="ss-layout">
          <option value="6" selected>5.1 (6 channels)</option>
          <option value="8">7.1 (8 channels)</option>
          <option value="2">Stereo fallback (2ch)</option>
        </select>
      </div>
      <div class="ss-field"><label for="ss-dur">Duration each (s)</label><input id="ss-dur" type="number" step="0.1" min="0.3" max="5" value="1.2"></div>
      <div class="ss-field"><label for="ss-freq">Tone (Hz)</label><input id="ss-freq" type="number" min="60" max="8000" value="440"></div>
      <div class="ss-field"><label for="ss-vol">Volume</label><input id="ss-vol" type="range" min="0" max="100" value="40"></div>
    </div>
    <div class="ss-controls">
      <button id="ss-walk" class="ss-btn ss-btn-primary">Walk all channels</button>
      <button id="ss-stop" class="ss-btn ss-btn-danger" disabled>Stop</button>
    </div>
    <p class="ss-mode" id="ss-mode">Detecting output mode...</p>
  </div>

  <div class="ss-card">
    <h3>Click any speaker to test it</h3>
    <div class="ss-diagram" id="ss-diagram" aria-label="Speaker layout">
      <div class="ss-listener">You<br>(listener)</div>
      <div class="ss-spk ss-fl" data-ch="FL">Front&nbsp;Left<span class="ch">ch&nbsp;1</span></div>
      <div class="ss-spk ss-fr" data-ch="FR">Front&nbsp;Right<span class="ch">ch&nbsp;2</span></div>
      <div class="ss-spk ss-c" data-ch="C">Center<span class="ch">ch&nbsp;3</span></div>
      <div class="ss-spk ss-sub" data-ch="SUB">Subwoofer<span class="ch">ch&nbsp;4 (LFE)</span></div>
      <div class="ss-spk ss-rl" data-ch="RL">Rear&nbsp;Left<span class="ch">ch&nbsp;5</span></div>
      <div class="ss-spk ss-rr" data-ch="RR">Rear&nbsp;Right<span class="ch">ch&nbsp;6</span></div>
      <div class="ss-spk ss-sl" data-ch="SL" hidden>Side&nbsp;Left<span class="ch">ch&nbsp;7</span></div>
      <div class="ss-spk ss-sr" data-ch="SR" hidden>Side&nbsp;Right<span class="ch">ch&nbsp;8</span></div>
    </div>
    <div class="ss-status" id="ss-status">Pick a layout, then click a speaker or use "Walk all channels". Each speaker lights up green while its tone is playing.</div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const CHANNELS_6=['FL','FR','C','SUB','RL','RR'];
  const CHANNELS_8=['FL','FR','C','SUB','RL','RR','SL','SR'];
  const CHANNELS_2=['FL','FR'];
  let ctx=null, currentLayout=6, walking=false, walkTimer=null;
  const spks=document.querySelectorAll('.ss-spk');
  const statusEl=$('ss-status'), modeEl=$('ss-mode');

  function updateLayoutUI(){
    const v=parseInt($('ss-layout').value,10);
    currentLayout=v;
    const has7=v===8;
    document.querySelector('.ss-sl').hidden=!has7;
    document.querySelector('.ss-sr').hidden=!has7;
    if(v===2){
      document.querySelector('.ss-c').hidden=true;
      document.querySelector('.ss-sub').hidden=true;
      document.querySelector('.ss-rl').hidden=true;
      document.querySelector('.ss-rr').hidden=true;
    } else {
      document.querySelector('.ss-c').hidden=false;
      document.querySelector('.ss-sub').hidden=false;
      document.querySelector('.ss-rl').hidden=false;
      document.querySelector('.ss-rr').hidden=false;
    }
  }
  $('ss-layout').addEventListener('change',updateLayoutUI);
  updateLayoutUI();

  function ensureCtx(){
    if(!ctx){ ctx = new (window.AudioContext||window.webkitAudioContext)(); }
    if(ctx.state==='suspended') ctx.resume();
    const max=ctx.destination.maxChannelCount||2;
    modeEl.textContent = `Browser max output channels: ${max}. `+(max>=currentLayout?`Routing each channel natively.`:`Falling back to stereo panning (your browser/OS reports only ${max} output channels).`);
    return ctx;
  }

  function setActive(ch,on){ spks.forEach(s=>{ if(s.dataset.ch===ch) s.classList.toggle('active',on); }); }

  function playChannel(ch,durSec,onEnd){
    const c=ensureCtx();
    const vol=(parseInt($('ss-vol').value,10)||40)/100;
    const freq=ch==='SUB'?60:(parseFloat($('ss-freq').value)||440);
    const layoutChs = currentLayout===8?CHANNELS_8:(currentLayout===6?CHANNELS_6:CHANNELS_2);
    const idx=layoutChs.indexOf(ch);
    const max=c.destination.maxChannelCount||2;
    const useMulti = max>=currentLayout && currentLayout>2 && idx>=0;

    const osc=c.createOscillator();
    osc.type=ch==='SUB'?'sine':'sine';
    osc.frequency.value=freq;
    const g=c.createGain();
    g.gain.setValueAtTime(0,c.currentTime);
    g.gain.linearRampToValueAtTime(vol,c.currentTime+0.05);
    g.gain.linearRampToValueAtTime(0,c.currentTime+durSec);

    if(useMulti){
      try{ c.destination.channelCount=currentLayout; c.destination.channelCountMode='explicit'; c.destination.channelInterpretation='discrete'; }catch(e){}
      const merger=c.createChannelMerger(currentLayout);
      osc.connect(g); g.connect(merger,0,idx); merger.connect(c.destination);
    } else {
      const panVals={FL:-1,FR:1,C:0,SUB:0,RL:-0.7,RR:0.7,SL:-1,SR:1};
      const gainFrontBack={FL:1,FR:1,C:1,SUB:1,RL:0.6,RR:0.6,SL:0.9,SR:0.9};
      const pan=c.createStereoPanner?c.createStereoPanner():null;
      if(pan){ pan.pan.value=panVals[ch]??0; osc.connect(g); g.connect(pan); pan.connect(c.destination); }
      else { osc.connect(g); g.connect(c.destination); }
      g.gain.cancelScheduledValues(c.currentTime);
      g.gain.setValueAtTime(0,c.currentTime);
      g.gain.linearRampToValueAtTime(vol*(gainFrontBack[ch]??1),c.currentTime+0.05);
      g.gain.linearRampToValueAtTime(0,c.currentTime+durSec);
    }
    osc.start(c.currentTime);
    osc.stop(c.currentTime+durSec+0.05);
    setActive(ch,true);
    statusEl.textContent=`Playing ${ch}${useMulti?' on native discrete channel':' via stereo panning fallback'}.`;
    setTimeout(()=>{ setActive(ch,false); onEnd && onEnd(); },durSec*1000);
  }

  spks.forEach(s=>{
    s.addEventListener('click',()=>{
      if(walking) return;
      const ch=s.dataset.ch;
      const dur=Math.max(0.3,Math.min(5,parseFloat($('ss-dur').value)||1.2));
      playChannel(ch,dur);
    });
  });

  function walk(){
    walking=true; $('ss-walk').disabled=true; $('ss-stop').disabled=false;
    const layout = currentLayout===8?CHANNELS_8:(currentLayout===6?CHANNELS_6:CHANNELS_2);
    const dur=Math.max(0.3,Math.min(5,parseFloat($('ss-dur').value)||1.2));
    let i=0;
    function next(){
      if(!walking || i>=layout.length){ walking=false; $('ss-walk').disabled=false; $('ss-stop').disabled=true; statusEl.textContent='Walk complete. Click any speaker to re-test.'; return; }
      const ch=layout[i++];
      playChannel(ch,dur,()=>{ walkTimer=setTimeout(next,180); });
    }
    next();
  }
  $('ss-walk').addEventListener('click',walk);
  $('ss-stop').addEventListener('click',()=>{
    walking=false; clearTimeout(walkTimer);
    spks.forEach(s=>s.classList.remove('active'));
    $('ss-walk').disabled=false; $('ss-stop').disabled=true;
    statusEl.textContent='Stopped.';
  });
  ensureCtx();
})();
</script>
