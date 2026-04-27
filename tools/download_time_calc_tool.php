<?php // download_time_calc_tool.php – size + speed -> time with presets ?>
<style>
  .dt-wrap{max-width:900px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .dt-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .dt-card h3{margin:0 0 12px;font-size:16px}
  .dt-row{display:grid;grid-template-columns:1fr auto;gap:8px;margin-bottom:10px}
  .dt-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .dt-field input,.dt-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .dt-field select{width:auto}
  .dt-presets{display:flex;flex-wrap:wrap;gap:6px;margin-top:6px;margin-bottom:14px}
  .dt-preset{background:#f1f5f9;border:1px solid #e2e8f0;border-radius:8px;padding:8px 12px;font-size:12px;cursor:pointer;text-align:left;line-height:1.2}
  .dt-preset:hover{background:#e2e8f0}
  .dt-preset b{display:block;font-size:13px;color:#0f172a}
  .dt-preset span{color:#64748b;font-size:11px}
  .dt-result{background:linear-gradient(180deg,#eef2ff,#fff);border:1px solid #c7d2fe;border-radius:12px;padding:18px;margin-top:12px;text-align:center}
  .dt-result b{font-size:28px;color:#4338ca;display:block}
  .dt-result span{font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:.5px}
  .dt-compare{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:10px}
  @media (max-width:600px){.dt-compare{grid-template-columns:1fr}}
  .dt-box{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .dt-box b{display:block;font-size:20px;color:#0f172a}
  .dt-box span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .dt-bytes{font-size:12px;color:#64748b;margin-top:6px;text-align:center}
</style>

<div class="dt-wrap">
  <div class="dt-card">
    <h3>Pick a file (or enter custom)</h3>
    <div class="dt-presets" id="dt-presets"></div>

    <div class="dt-field"><label>File size</label>
      <div class="dt-row"><input id="dt-size" type="number" step="any" min="0" value="75">
        <select id="dt-size-unit"><option>KB</option><option>MB</option><option selected>GB</option><option>TB</option></select></div>
    </div>
    <div class="dt-field"><label>Connection speed</label>
      <div class="dt-row"><input id="dt-speed" type="number" step="any" min="0" value="100">
        <select id="dt-speed-unit"><option>Kbps</option><option selected>Mbps</option><option>Gbps</option></select></div>
    </div>

    <div class="dt-presets">
      <button class="dt-preset" data-spd="5" data-u="Mbps"><b>5 Mbps</b><span>Slow rural DSL</span></button>
      <button class="dt-preset" data-spd="25" data-u="Mbps"><b>25 Mbps</b><span>Entry broadband</span></button>
      <button class="dt-preset" data-spd="100" data-u="Mbps"><b>100 Mbps</b><span>Typical fiber</span></button>
      <button class="dt-preset" data-spd="300" data-u="Mbps"><b>300 Mbps</b><span>Fast fiber</span></button>
      <button class="dt-preset" data-spd="1" data-u="Gbps"><b>1 Gbps</b><span>Gigabit</span></button>
      <button class="dt-preset" data-spd="10" data-u="Gbps"><b>10 GbE</b><span>Enterprise</span></button>
    </div>

    <div class="dt-result"><span>Download time (realistic, 85% efficient)</span><b id="dt-real">—</b></div>
    <div class="dt-compare">
      <div class="dt-box"><b id="dt-theoretical">—</b><span>Theoretical (100%)</span></div>
      <div class="dt-box"><b id="dt-slow">—</b><span>Slow path (60% on congested link)</span></div>
    </div>
    <div class="dt-bytes" id="dt-bytes"></div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const sizeUnits={KB:1024, MB:1024**2, GB:1024**3, TB:1024**4};
  const spdUnits={Kbps:1e3, Mbps:1e6, Gbps:1e9};

  const PRESETS=[
    {name:'AAA game (Call of Duty)', size:200, unit:'GB'},
    {name:'AAA game (standard)', size:100, unit:'GB'},
    {name:'Indie game', size:20, unit:'GB'},
    {name:'4K movie (HDR Blu-ray rip)', size:75, unit:'GB'},
    {name:'4K movie (streaming)', size:25, unit:'GB'},
    {name:'1080p movie', size:4, unit:'GB'},
    {name:'1080p TV episode', size:1.5, unit:'GB'},
    {name:'FLAC album (60 min)', size:450, unit:'MB'},
    {name:'MP3 album 320 kbps', size:90, unit:'MB'},
    {name:'Linux ISO (Ubuntu/Fedora)', size:4, unit:'GB'},
    {name:'macOS installer', size:14, unit:'GB'},
    {name:'Windows 11 ISO', size:5.5, unit:'GB'},
    {name:'Steam library backup', size:500, unit:'GB'},
    {name:'Photo backup (1 year, RAW)', size:250, unit:'GB'},
    {name:'Word/PDF document', size:2, unit:'MB'}
  ];
  const pr=$('dt-presets');
  PRESETS.forEach(p=>{
    const b=document.createElement('button'); b.className='dt-preset';
    b.innerHTML=`<b>${p.size} ${p.unit}</b><span>${p.name}</span>`;
    b.addEventListener('click',()=>{ $('dt-size').value=p.size; $('dt-size-unit').value=p.unit; compute(); });
    pr.appendChild(b);
  });

  function fmtTime(s){
    if(!isFinite(s)||s<0) return '—';
    if(s<1) return (s*1000).toFixed(0)+' ms';
    s=Math.round(s);
    if(s<60) return s+' s';
    const h=Math.floor(s/3600), m=Math.floor((s%3600)/60), sec=s%60;
    if(h>24){ const d=Math.floor(h/24), rh=h%24; return d+'d '+rh+'h '+m+'m'; }
    if(h>0) return h+'h '+m+'m '+sec+'s';
    return m+'m '+sec+'s';
  }

  function compute(){
    const sz = +$('dt-size').value * sizeUnits[$('dt-size-unit').value];
    const spd = +$('dt-speed').value * spdUnits[$('dt-speed-unit').value];
    const bits = sz*8;
    const theor = bits/spd;
    $('dt-theoretical').textContent=fmtTime(theor);
    $('dt-real').textContent=fmtTime(theor/0.85);
    $('dt-slow').textContent=fmtTime(theor/0.60);
    $('dt-bytes').textContent = `File = ${(sz/1024/1024).toFixed(2)} MB = ${(bits/1e6).toFixed(2)} megabits.`;
  }
  document.querySelectorAll('.dt-card input, .dt-card select').forEach(el=>el.addEventListener('input',compute));
  document.querySelectorAll('.dt-preset[data-spd]').forEach(b=>{
    b.addEventListener('click',()=>{ $('dt-speed').value=b.dataset.spd; $('dt-speed-unit').value=b.dataset.u; compute(); });
  });
  compute();
})();
</script>
