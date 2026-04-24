<?php
// vibration_tool.php – embeddable Vibration Test module
// Two tabs: phone (navigator.vibrate) + gamepad (vibrationActuator)
?>
<style>
  .vb-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px);--vb-primary:#4b5eaa;--vb-primary-2:#7d8bc1;--vb-accent:#f59e0b;--vb-success:#10b981;--vb-danger:#ef4444;--vb-border:#e2e8f0;--vb-muted:#64748b;--vb-text:#0f172a;--vb-card:#fff}
  .vb-card{background:var(--vb-card);border:1px solid var(--vb-border);border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .vb-card h3{margin:0 0 12px;font-size:16px}
  .vb-tabs{display:flex;gap:8px;margin-bottom:14px}
  .vb-tab{flex:1;padding:12px;border:2px solid var(--vb-border);background:#f8fafc;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;color:var(--vb-text)}
  .vb-tab.active{background:linear-gradient(135deg,var(--vb-primary),var(--vb-primary-2));color:#fff;border-color:var(--vb-primary)}
  .vb-panel{display:none}
  .vb-panel.active{display:block}
  .vb-alert{padding:12px 16px;border-radius:8px;margin-bottom:14px;font-size:13px}
  .vb-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
  .vb-alert-warn{background:#fef3c7;border:1px solid #fde68a;color:#92400e}
  .vb-alert-ok{background:#dcfce7;border:1px solid #bbf7d0;color:#166534}
  .vb-btn{appearance:none;border:none;padding:12px 18px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px}
  .vb-btn-primary{background:linear-gradient(180deg,var(--vb-primary),var(--vb-primary-2));color:#fff}
  .vb-btn-ghost{background:#f1f5f9;color:var(--vb-text);border:1px solid var(--vb-border)}
  .vb-btn-danger{background:var(--vb-danger);color:#fff}
  .vb-btn:disabled{opacity:.5;cursor:not-allowed}
  .vb-actions{display:flex;flex-wrap:wrap;gap:10px;margin-top:12px}
  .vb-preset-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:10px}
  .vb-preset{padding:14px;background:#f8fafc;border:2px solid var(--vb-border);border-radius:10px;cursor:pointer;text-align:center;transition:all .15s}
  .vb-preset:hover{background:#e2e8f0;transform:translateY(-2px)}
  .vb-preset.active{background:linear-gradient(135deg,var(--vb-primary),var(--vb-primary-2));color:#fff;border-color:var(--vb-primary)}
  .vb-preset-name{font-weight:700;font-size:14px}
  .vb-preset-desc{font-size:11px;opacity:.8;margin-top:4px}
  .vb-slider-row{display:grid;gap:6px;margin-top:14px}
  .vb-slider-row label{display:flex;justify-content:space-between;font-size:13px;color:var(--vb-muted);font-weight:600}
  .vb-slider{width:100%;height:8px;border-radius:5px;background:#e2e8f0;outline:none;appearance:none;cursor:pointer}
  .vb-slider::-webkit-slider-thumb{appearance:none;width:20px;height:20px;border-radius:50%;background:var(--vb-primary);border:3px solid #fff;box-shadow:0 2px 4px rgba(0,0,0,.2);cursor:pointer}
  .vb-input{width:100%;padding:10px 12px;border:1px solid var(--vb-border);border-radius:8px;font-size:14px;font-family:ui-monospace,monospace}
  .vb-pad-list{margin-top:10px}
  .vb-pad{background:#f8fafc;border:1px solid var(--vb-border);border-radius:10px;padding:12px;margin-bottom:8px}
  .vb-pad-name{font-weight:700;font-size:14px;color:var(--vb-text)}
  .vb-pad-meta{font-size:12px;color:var(--vb-muted);margin-top:2px}
  .vb-pad-meta b{color:var(--vb-success)}
  .vb-pad-meta b.no{color:var(--vb-danger)}
</style>

<div class="vb-wrap">
  <div class="vb-tabs">
    <button class="vb-tab active" data-tab="phone">📱 Phone vibration</button>
    <button class="vb-tab" data-tab="pad">🎮 Gamepad rumble</button>
  </div>

  <div id="vb-panel-phone" class="vb-panel active">
    <div class="vb-card">
      <div id="vb-phoneSupport" class="vb-alert vb-alert-info">Checking Vibration API support...</div>
      <h3>Pattern presets</h3>
      <div class="vb-preset-grid">
        <div class="vb-preset" data-p="200"><div class="vb-preset-name">Short pulse</div><div class="vb-preset-desc">200 ms</div></div>
        <div class="vb-preset" data-p="1000"><div class="vb-preset-name">Long buzz</div><div class="vb-preset-desc">1000 ms</div></div>
        <div class="vb-preset" data-p="100,50,100,50,100"><div class="vb-preset-name">Triple tap</div><div class="vb-preset-desc">100 x3</div></div>
        <div class="vb-preset" data-p="100,100,100,100,100,100,300,100,300,100,300,100,100,100,100,100,100"><div class="vb-preset-name">SOS</div><div class="vb-preset-desc">Morse - - -</div></div>
        <div class="vb-preset" data-p="80,40,120,400"><div class="vb-preset-name">Heartbeat</div><div class="vb-preset-desc">lub-dub</div></div>
        <div class="vb-preset" data-p="50,50,50,50,50,50,50,50,50,50"><div class="vb-preset-name">Rapid</div><div class="vb-preset-desc">50 x5</div></div>
      </div>
      <h3 style="margin-top:18px">Custom pattern</h3>
      <input id="vb-custom" class="vb-input" type="text" placeholder="e.g. 200,100,400,100,600" value="200,100,400,100,600">
      <div style="font-size:12px;color:var(--vb-muted);margin-top:6px">Comma-separated milliseconds: vibrate, pause, vibrate, pause, ...</div>
      <div class="vb-actions">
        <button id="vb-phonePlay" class="vb-btn vb-btn-primary">Play custom pattern</button>
        <button id="vb-phoneStop" class="vb-btn vb-btn-danger">Stop</button>
      </div>
    </div>
  </div>

  <div id="vb-panel-pad" class="vb-panel">
    <div class="vb-card">
      <div id="vb-padSupport" class="vb-alert vb-alert-info">Connect a controller and press any button to detect it.</div>
      <div id="vb-padList" class="vb-pad-list"></div>
      <h3 style="margin-top:10px">Rumble intensity</h3>
      <div class="vb-slider-row">
        <label><span>Weak motor (high-freq)</span><span id="vb-weakVal">50%</span></label>
        <input id="vb-weak" class="vb-slider" type="range" min="0" max="100" step="1" value="50">
      </div>
      <div class="vb-slider-row">
        <label><span>Strong motor (low-freq)</span><span id="vb-strongVal">80%</span></label>
        <input id="vb-strong" class="vb-slider" type="range" min="0" max="100" step="1" value="80">
      </div>
      <div class="vb-slider-row">
        <label><span>Duration</span><span id="vb-durVal">1000 ms</span></label>
        <input id="vb-dur" class="vb-slider" type="range" min="100" max="5000" step="100" value="1000">
      </div>
      <div class="vb-actions">
        <button id="vb-padPlay" class="vb-btn vb-btn-primary" disabled>Test rumble</button>
        <button id="vb-padStop" class="vb-btn vb-btn-danger" disabled>Stop rumble</button>
      </div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  // Tabs
  document.querySelectorAll('.vb-tab').forEach(t=>{
    t.addEventListener('click',()=>{
      document.querySelectorAll('.vb-tab').forEach(x=>x.classList.remove('active'));
      document.querySelectorAll('.vb-panel').forEach(x=>x.classList.remove('active'));
      t.classList.add('active');
      $('vb-panel-'+t.dataset.tab).classList.add('active');
    });
  });

  // Phone
  const phoneSupport=$('vb-phoneSupport');
  const hasVibrate=typeof navigator.vibrate==='function';
  if(hasVibrate){ phoneSupport.className='vb-alert vb-alert-ok'; phoneSupport.innerHTML='✓ <strong>Supported.</strong> This device exposes the Vibration API. Tap any preset to test.'; }
  else{ phoneSupport.className='vb-alert vb-alert-warn'; phoneSupport.innerHTML='⚠️ <strong>Not supported.</strong> Most desktops and iOS Safari do not support navigator.vibrate. Try on Android Chrome/Firefox, or use the gamepad tab.'; }

  document.querySelectorAll('.vb-preset').forEach(p=>{
    p.addEventListener('click',()=>{
      if(!hasVibrate) return;
      const pattern=p.dataset.p.split(',').map(Number);
      navigator.vibrate(pattern);
      document.querySelectorAll('.vb-preset').forEach(x=>x.classList.remove('active'));
      p.classList.add('active');
    });
  });
  $('vb-phonePlay').addEventListener('click',()=>{
    if(!hasVibrate) return;
    const raw=$('vb-custom').value.trim();
    const parts=raw.split(',').map(s=>parseInt(s.trim(),10)).filter(n=>!isNaN(n)&&n>=0);
    if(parts.length) navigator.vibrate(parts);
  });
  $('vb-phoneStop').addEventListener('click',()=>{ if(hasVibrate) navigator.vibrate(0); document.querySelectorAll('.vb-preset').forEach(x=>x.classList.remove('active')); });

  // Gamepad
  const padList=$('vb-padList'),padSupport=$('vb-padSupport');
  const weak=$('vb-weak'),weakVal=$('vb-weakVal'),strong=$('vb-strong'),strongVal=$('vb-strongVal');
  const dur=$('vb-dur'),durVal=$('vb-durVal');
  const padPlay=$('vb-padPlay'),padStop=$('vb-padStop');
  weak.addEventListener('input',()=>weakVal.textContent=weak.value+'%');
  strong.addEventListener('input',()=>strongVal.textContent=strong.value+'%');
  dur.addEventListener('input',()=>durVal.textContent=dur.value+' ms');

  let selectedPadIdx=null, pads={};
  function renderPads(){
    const list=navigator.getGamepads?navigator.getGamepads():[];
    padList.innerHTML='';
    let any=false;
    for(let i=0;i<list.length;i++){
      const gp=list[i]; if(!gp) continue; any=true;
      const hasRumble = !!(gp.vibrationActuator && gp.vibrationActuator.playEffect);
      const hasHaptic = !!(gp.hapticActuators && gp.hapticActuators.length);
      const div=document.createElement('div');
      div.className='vb-pad';
      div.innerHTML=`<div class="vb-pad-name">#${gp.index} - ${gp.id}</div>
        <div class="vb-pad-meta">Rumble: <b class="${hasRumble?'':'no'}">${hasRumble?'vibrationActuator ✓':'✗'}</b> | Haptic: <b class="${hasHaptic?'':'no'}">${hasHaptic?'✓':'✗'}</b> | Buttons: ${gp.buttons.length} | Axes: ${gp.axes.length}</div>`;
      div.style.cursor='pointer';
      div.addEventListener('click',()=>{
        selectedPadIdx=gp.index;
        document.querySelectorAll('.vb-pad').forEach(x=>x.style.borderColor='var(--vb-border)');
        div.style.borderColor='var(--vb-primary)';
        padPlay.disabled=!hasRumble;
      });
      padList.appendChild(div);
      pads[gp.index]={hasRumble};
    }
    if(any){
      padSupport.className='vb-alert vb-alert-ok';
      padSupport.innerHTML='✓ <strong>Controller(s) detected.</strong> Click a controller above to select, then press Test rumble.';
    }else{
      padSupport.className='vb-alert vb-alert-info';
      padSupport.innerHTML='Connect a controller and press any button to detect it. Chrome and Firefox support the Gamepad API; Safari support is partial.';
    }
  }
  window.addEventListener('gamepadconnected',renderPads);
  window.addEventListener('gamepaddisconnected',renderPads);
  setInterval(renderPads,1500);

  padPlay.addEventListener('click',()=>{
    const list=navigator.getGamepads?navigator.getGamepads():[];
    const gp=selectedPadIdx!=null?list[selectedPadIdx]:list.find(x=>x&&x.vibrationActuator);
    if(!gp||!gp.vibrationActuator||!gp.vibrationActuator.playEffect) return;
    gp.vibrationActuator.playEffect('dual-rumble',{
      startDelay:0,
      duration:parseInt(dur.value,10),
      weakMagnitude:weak.value/100,
      strongMagnitude:strong.value/100
    });
    padStop.disabled=false;
  });
  padStop.addEventListener('click',()=>{
    const list=navigator.getGamepads?navigator.getGamepads():[];
    const gp=selectedPadIdx!=null?list[selectedPadIdx]:list.find(x=>x&&x.vibrationActuator);
    if(gp&&gp.vibrationActuator&&gp.vibrationActuator.reset) gp.vibrationActuator.reset();
    padStop.disabled=true;
  });
  renderPads();
})();
</script>
