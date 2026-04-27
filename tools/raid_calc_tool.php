<?php // raid_calc_tool.php – RAID capacity + fault tolerance calculator ?>
<style>
  .rc-wrap{max-width:1000px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .rc-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .rc-card h3{margin:0 0 12px;font-size:16px}
  .rc-controls{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px;margin-bottom:12px}
  .rc-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .rc-field input,.rc-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .rc-result{background:linear-gradient(180deg,#eef2ff,#fff);border:1px solid #c7d2fe;border-radius:12px;padding:18px;text-align:center;margin-top:12px}
  .rc-result b{font-size:32px;color:#4338ca;display:block}
  .rc-result span{font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:.5px}
  .rc-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px;margin-top:12px}
  .rc-stat{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;text-align:center}
  .rc-stat b{display:block;font-size:20px;color:#0f172a}
  .rc-stat span{font-size:11px;color:#64748b;text-transform:uppercase;letter-spacing:.5px}
  .rc-stat.bad b{color:#ef4444}
  .rc-stat.good b{color:#10b981}
  .rc-verdict{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;margin-top:14px;font-size:14px;color:#334155}
  .rc-verdict b{color:#0f172a}
  .rc-table{width:100%;border-collapse:collapse;margin-top:12px;font-size:13px}
  .rc-table th,.rc-table td{padding:8px 10px;border-bottom:1px solid #e2e8f0;text-align:left}
  .rc-table th{background:#f8fafc;font-weight:700;color:#475569}
  .rc-presets{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}
  .rc-preset{background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:6px 10px;font-size:12px;cursor:pointer}
  .rc-preset:hover{background:#e2e8f0}
</style>

<div class="rc-wrap">
  <div class="rc-card">
    <h3>RAID configuration</h3>
    <div class="rc-controls">
      <div class="rc-field">
        <label for="rc-level">RAID level</label>
        <select id="rc-level">
          <option value="0">RAID 0 (stripe, no redundancy)</option>
          <option value="1">RAID 1 (mirror)</option>
          <option value="5" selected>RAID 5 (single parity)</option>
          <option value="6">RAID 6 (dual parity)</option>
          <option value="10">RAID 10 (1+0, mirrored stripes)</option>
          <option value="50">RAID 50 (5+0)</option>
          <option value="60">RAID 60 (6+0)</option>
        </select>
      </div>
      <div class="rc-field"><label for="rc-drives">Number of drives</label><input id="rc-drives" type="number" min="2" max="64" value="4"></div>
      <div class="rc-field"><label for="rc-size">Drive size</label><input id="rc-size" type="number" step="any" min="0.1" value="4"></div>
      <div class="rc-field"><label for="rc-unit">Unit</label>
        <select id="rc-unit">
          <option>GB</option>
          <option selected>TB</option>
        </select>
      </div>
      <div class="rc-field" id="rc-grp-wrap" hidden>
        <label for="rc-grp">Group size (for 50/60)</label>
        <input id="rc-grp" type="number" min="3" max="32" value="4">
      </div>
    </div>
    <div class="rc-presets">
      <button class="rc-preset" data-level="5" data-drives="4" data-size="4">4x 4TB RAID 5 (home NAS)</button>
      <button class="rc-preset" data-level="6" data-drives="6" data-size="8">6x 8TB RAID 6</button>
      <button class="rc-preset" data-level="10" data-drives="4" data-size="2">4x 2TB RAID 10 (workstation)</button>
      <button class="rc-preset" data-level="1" data-drives="2" data-size="1">2x 1TB RAID 1 (boot mirror)</button>
      <button class="rc-preset" data-level="0" data-drives="2" data-size="2">2x 2TB RAID 0 (scratch)</button>
    </div>

    <div class="rc-result"><span>Usable capacity</span><b id="rc-usable">12.00 TB</b></div>
    <div class="rc-grid">
      <div class="rc-stat"><b id="rc-raw">16.00 TB</b><span>Raw capacity</span></div>
      <div class="rc-stat"><b id="rc-overhead">25.0%</b><span>Parity overhead</span></div>
      <div class="rc-stat" id="rc-ft-box"><b id="rc-ft">1</b><span>Drives can fail</span></div>
      <div class="rc-stat"><b id="rc-read">4x</b><span>Read speed factor</span></div>
      <div class="rc-stat"><b id="rc-write">3x</b><span>Write speed factor</span></div>
    </div>
    <div class="rc-verdict" id="rc-verdict"></div>
  </div>

  <div class="rc-card">
    <h3>RAID level comparison at your drive count</h3>
    <table class="rc-table">
      <thead><tr><th>Level</th><th>Usable</th><th>Overhead</th><th>Fault tolerance</th><th>Min drives</th></tr></thead>
      <tbody id="rc-compare"></tbody>
    </table>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const levelSel=$('rc-level'), drivesIn=$('rc-drives'), sizeIn=$('rc-size'), unitSel=$('rc-unit'), grpIn=$('rc-grp'), grpWrap=$('rc-grp-wrap');

  // Returns {usable, overhead, ft, read, write, minDrives, note} given n drives of size D
  function calc(level, n, D, grp){
    level=String(level); n=parseInt(n,10); D=parseFloat(D);
    if(!isFinite(n)||!isFinite(D)||n<2) return null;
    switch(level){
      case '0':  return {usable:n*D,           ft:0,           read:n,     write:n,     minDrives:2};
      case '1':  return {usable:D,             ft:n-1,         read:n,     write:1,     minDrives:2, note:'Mirror: all drives hold the same data.'};
      case '5':  return n>=3? {usable:(n-1)*D, ft:1,           read:n-1,   write:(n-1)*0.75, minDrives:3} : {minDrives:3, invalid:true};
      case '6':  return n>=4? {usable:(n-2)*D, ft:2,           read:n-2,   write:(n-2)*0.5,  minDrives:4} : {minDrives:4, invalid:true};
      case '10': {
        if(n<4 || n%2!==0) return {minDrives:4, invalid:true, note:'RAID 10 requires an even number of drives (4, 6, 8, …).'};
        return {usable:(n/2)*D, ft: n/2, read:n, write:n/2, minDrives:4, note:'Up to n/2 drives can fail, but only if no two failures are in the same mirror pair.'};
      }
      case '50':
      case '60': {
        const parity = level==='50'?1:2;
        const g = parseInt(grp,10)||4;
        if(g < (parity+2) ) return {minDrives:(parity+2)*2, invalid:true, note:`Group size must be >= ${parity+2}.`};
        if(n<g*2 || n%g!==0) return {minDrives:g*2, invalid:true, note:`Drives must be a multiple of group size (${g}).`};
        const groups = n/g;
        const usable = groups * (g-parity) * D;
        return {usable, ft:groups*parity, read: groups*(g-parity), write: groups*(g-parity)*(parity===1?0.75:0.5), minDrives:g*2, note:`${groups} groups of ${g} drives striped together.`};
      }
    }
  }

  function fmt(tb){ if(!isFinite(tb)) return '—'; if(tb<1) return (tb*1000).toFixed(1)+' GB'; return tb.toFixed(2)+' '+(unitSel.value==='GB'?'GB':'TB'); }

  function render(){
    const show58 = (levelSel.value==='50'||levelSel.value==='60');
    grpWrap.hidden = !show58;
    const n=parseInt(drivesIn.value,10)||0;
    const D=parseFloat(sizeIn.value)||0;
    const r = calc(levelSel.value, n, D, grpIn.value);
    if(!r || r.invalid){
      $('rc-usable').textContent='—';
      $('rc-raw').textContent=fmt(n*D);
      $('rc-overhead').textContent='—';
      $('rc-ft').textContent='—'; $('rc-ft-box').classList.remove('good','bad');
      $('rc-read').textContent='—'; $('rc-write').textContent='—';
      $('rc-verdict').innerHTML = r ? `<b>Invalid configuration.</b> ${r.note||'Check drive count and group size.'} Minimum drives: ${r.minDrives}.` : '<b>Enter at least 2 drives.</b>';
    } else {
      const raw = n*D;
      $('rc-usable').textContent=fmt(r.usable);
      $('rc-raw').textContent=fmt(raw);
      $('rc-overhead').textContent=((raw-r.usable)/raw*100).toFixed(1)+'%';
      $('rc-ft').textContent=r.ft;
      $('rc-ft-box').classList.remove('good','bad');
      $('rc-ft-box').classList.add(r.ft===0?'bad':'good');
      $('rc-read').textContent=r.read.toFixed(1)+'x';
      $('rc-write').textContent=r.write.toFixed(1)+'x';
      const ftDesc = r.ft===0?'<b>No fault tolerance.</b> Any single drive failure loses all data.' : `<b>${r.ft} drive${r.ft>1?'s':''} can fail</b> before data loss.`;
      $('rc-verdict').innerHTML = ftDesc + (r.note?` <span style="color:#64748b">${r.note}</span>`:'');
    }
    renderCompare(n,D);
  }

  function renderCompare(n,D){
    const rows=['0','1','5','6','10','50','60'].map(lv=>{
      const r=calc(lv,n,D, lv==='50'||lv==='60'?parseInt(grpIn.value,10)||4:null);
      if(!r||r.invalid) return `<tr><td>RAID ${lv}</td><td colspan="3" style="color:#94a3b8">n/a at ${n} drives${r&&r.note?(' — '+r.note):''}</td><td>${r?r.minDrives:'?'}</td></tr>`;
      const raw=n*D;
      return `<tr${lv===levelSel.value?' style="background:#f0f9ff"':''}><td><b>RAID ${lv}</b></td><td>${fmt(r.usable)}</td><td>${raw>0?((raw-r.usable)/raw*100).toFixed(1)+'%':'—'}</td><td>${r.ft}</td><td>${r.minDrives}</td></tr>`;
    }).join('');
    $('rc-compare').innerHTML=rows;
  }

  document.querySelectorAll('.rc-wrap input, .rc-wrap select').forEach(el=>el.addEventListener('input',render));
  document.querySelectorAll('.rc-preset').forEach(b=>b.addEventListener('click',()=>{
    levelSel.value=b.dataset.level; drivesIn.value=b.dataset.drives; sizeIn.value=b.dataset.size; render();
  }));
  render();
})();
</script>
