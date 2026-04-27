<?php // bandwidth_calc_tool.php – size / speed / time calculator ?>
<style>
  .bw-wrap{max-width:900px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .bw-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .bw-card h3{margin:0 0 12px;font-size:16px}
  .bw-tabs{display:flex;gap:4px;margin-bottom:14px;background:#f1f5f9;border-radius:10px;padding:4px}
  .bw-tab{flex:1;padding:10px;border:none;background:transparent;border-radius:8px;font-weight:700;cursor:pointer;color:#475569;font-size:14px}
  .bw-tab.active{background:#fff;color:#0f172a;box-shadow:0 1px 3px rgba(0,0,0,.08)}
  .bw-row{display:grid;grid-template-columns:1fr auto;gap:8px;margin-bottom:10px}
  .bw-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .bw-field input,.bw-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .bw-field select{width:auto}
  .bw-result{background:linear-gradient(180deg,#eef2ff,#fff);border:1px solid #c7d2fe;border-radius:12px;padding:18px;margin-top:12px;text-align:center}
  .bw-result b{font-size:32px;color:#4338ca;display:block}
  .bw-result span{font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:.5px}
  .bw-meta{font-size:13px;color:#475569;margin-top:8px;text-align:center}
  .bw-presets{display:flex;flex-wrap:wrap;gap:6px;margin-top:10px}
  .bw-preset{background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:6px 10px;font-size:12px;cursor:pointer}
  .bw-preset:hover{background:#e2e8f0}
</style>

<div class="bw-wrap">
  <div class="bw-card">
    <h3>Solve for</h3>
    <div class="bw-tabs" role="tablist">
      <button class="bw-tab active" data-mode="time">Transfer time</button>
      <button class="bw-tab" data-mode="size">File size</button>
      <button class="bw-tab" data-mode="speed">Required speed</button>
    </div>

    <div id="bw-mode-time">
      <div class="bw-field"><label>File size</label>
        <div class="bw-row"><input id="bw-size-t" type="number" step="any" min="0" value="100">
          <select id="bw-size-unit-t"><option>KB</option><option selected>MB</option><option>GB</option><option>TB</option></select></div>
      </div>
      <div class="bw-field"><label>Connection speed</label>
        <div class="bw-row"><input id="bw-spd-t" type="number" step="any" min="0" value="100">
          <select id="bw-spd-unit-t"><option>Kbps</option><option selected>Mbps</option><option>Gbps</option></select></div>
      </div>
      <div class="bw-result"><span>Transfer time</span><b id="bw-time-out">8.00 s</b></div>
      <div class="bw-meta" id="bw-time-meta"></div>
    </div>

    <div id="bw-mode-size" hidden>
      <div class="bw-field"><label>Connection speed</label>
        <div class="bw-row"><input id="bw-spd-s" type="number" step="any" min="0" value="100">
          <select id="bw-spd-unit-s"><option>Kbps</option><option selected>Mbps</option><option>Gbps</option></select></div>
      </div>
      <div class="bw-field"><label>Time available</label>
        <div class="bw-row"><input id="bw-time-s" type="number" step="any" min="0" value="60">
          <select id="bw-time-unit-s"><option>seconds</option><option selected>minutes</option><option>hours</option></select></div>
      </div>
      <div class="bw-result"><span>Transferable size</span><b id="bw-size-out">750.00 MB</b></div>
    </div>

    <div id="bw-mode-speed" hidden>
      <div class="bw-field"><label>File size</label>
        <div class="bw-row"><input id="bw-size-sp" type="number" step="any" min="0" value="10">
          <select id="bw-size-unit-sp"><option>KB</option><option>MB</option><option selected>GB</option><option>TB</option></select></div>
      </div>
      <div class="bw-field"><label>Time window</label>
        <div class="bw-row"><input id="bw-time-sp" type="number" step="any" min="0" value="10">
          <select id="bw-time-unit-sp"><option>seconds</option><option selected>minutes</option><option>hours</option></select></div>
      </div>
      <div class="bw-result"><span>Required speed</span><b id="bw-spd-out">133.33 Mbps</b></div>
    </div>

    <div class="bw-presets">
      <button class="bw-preset" data-spd="25" data-u="Mbps">Entry fiber 25 Mbps</button>
      <button class="bw-preset" data-spd="100" data-u="Mbps">Fiber 100 Mbps</button>
      <button class="bw-preset" data-spd="300" data-u="Mbps">Fiber 300 Mbps</button>
      <button class="bw-preset" data-spd="1" data-u="Gbps">Gigabit 1 Gbps</button>
      <button class="bw-preset" data-spd="2.5" data-u="Gbps">2.5 GbE</button>
      <button class="bw-preset" data-spd="10" data-u="Gbps">10 GbE</button>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const sizeUnits={KB:1024, MB:1024**2, GB:1024**3, TB:1024**4};
  const spdUnits={Kbps:1e3, Mbps:1e6, Gbps:1e9};
  const timeUnits={'seconds':1,'minutes':60,'hours':3600};

  let mode='time';
  document.querySelectorAll('.bw-tab').forEach(t=>{
    t.addEventListener('click',()=>{
      document.querySelectorAll('.bw-tab').forEach(x=>x.classList.remove('active'));
      t.classList.add('active');
      mode=t.dataset.mode;
      ['time','size','speed'].forEach(m=>$('bw-mode-'+m).hidden=m!==mode);
      compute();
    });
  });

  function fmtTime(s){
    if(!isFinite(s)||s<0) return '—';
    if(s<1) return (s*1000).toFixed(1)+' ms';
    if(s<60) return s.toFixed(2)+' s';
    if(s<3600){ const m=Math.floor(s/60), r=s%60; return `${m} min ${r.toFixed(0)} s`; }
    if(s<86400){ const h=Math.floor(s/3600), m=Math.floor((s%3600)/60); return `${h} h ${m} min`; }
    const d=Math.floor(s/86400), h=Math.floor((s%86400)/3600); return `${d} d ${h} h`;
  }
  function fmtSize(bytes){
    if(bytes>=1024**4) return (bytes/1024**4).toFixed(2)+' TB';
    if(bytes>=1024**3) return (bytes/1024**3).toFixed(2)+' GB';
    if(bytes>=1024**2) return (bytes/1024**2).toFixed(2)+' MB';
    if(bytes>=1024) return (bytes/1024).toFixed(2)+' KB';
    return bytes.toFixed(0)+' B';
  }
  function fmtSpeed(bps){
    if(bps>=1e9) return (bps/1e9).toFixed(2)+' Gbps';
    if(bps>=1e6) return (bps/1e6).toFixed(2)+' Mbps';
    if(bps>=1e3) return (bps/1e3).toFixed(2)+' Kbps';
    return bps.toFixed(0)+' bps';
  }

  function compute(){
    if(mode==='time'){
      const sz=+$('bw-size-t').value * sizeUnits[$('bw-size-unit-t').value];
      const spd=+$('bw-spd-t').value * spdUnits[$('bw-spd-unit-t').value];
      const bits=sz*8;
      const sec=bits/spd;
      $('bw-time-out').textContent=fmtTime(sec);
      $('bw-time-meta').textContent = `File = ${(sz*8/1e6).toFixed(2)} megabits. At ${fmtSpeed(spd)} practical (100% efficient) transfer.`;
    } else if(mode==='size'){
      const spd=+$('bw-spd-s').value * spdUnits[$('bw-spd-unit-s').value];
      const sec=+$('bw-time-s').value * timeUnits[$('bw-time-unit-s').value];
      const bytes=(spd*sec)/8;
      $('bw-size-out').textContent=fmtSize(bytes);
    } else if(mode==='speed'){
      const bytes=+$('bw-size-sp').value * sizeUnits[$('bw-size-unit-sp').value];
      const sec=+$('bw-time-sp').value * timeUnits[$('bw-time-unit-sp').value];
      const bps=(bytes*8)/sec;
      $('bw-spd-out').textContent=fmtSpeed(bps);
    }
  }
  document.querySelectorAll('.bw-wrap input, .bw-wrap select').forEach(el=>el.addEventListener('input',compute));
  document.querySelectorAll('.bw-preset').forEach(b=>{
    b.addEventListener('click',()=>{
      const v=b.dataset.spd, u=b.dataset.u;
      if(mode==='time'){ $('bw-spd-t').value=v; $('bw-spd-unit-t').value=u; }
      else if(mode==='size'){ $('bw-spd-s').value=v; $('bw-spd-unit-s').value=u; }
      compute();
    });
  });
  compute();
})();
</script>
