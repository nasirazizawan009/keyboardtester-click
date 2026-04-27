<?php // ttk_calc_tool.php – Time-to-kill damage calculator ?>
<style>
  .tk-wrap{max-width:1000px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .tk-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .tk-card h3{margin:0 0 12px;font-size:16px}
  .tk-controls{display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px}
  .tk-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .tk-field input,.tk-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .tk-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:12px}
  @media (max-width:640px){.tk-grid{grid-template-columns:1fr}}
  .tk-box{background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:16px}
  .tk-box.head{background:linear-gradient(180deg,#fef2f2,#fff);border-color:#fecaca}
  .tk-box.body{background:linear-gradient(180deg,#eff6ff,#fff);border-color:#bfdbfe}
  .tk-box h4{margin:0 0 8px;font-size:13px;text-transform:uppercase;letter-spacing:.5px;color:#64748b}
  .tk-big{font-size:28px;font-weight:800;color:#0f172a;display:block}
  .tk-sub{font-size:12px;color:#64748b;margin-top:4px}
  .tk-stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(120px,1fr));gap:8px;margin-top:10px}
  .tk-stat{background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:8px;text-align:center;font-size:12px}
  .tk-stat b{display:block;font-size:15px;color:#0f172a}
  .tk-presets{display:flex;flex-wrap:wrap;gap:6px;margin-top:10px}
  .tk-preset{background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:6px 10px;font-size:12px;cursor:pointer}
  .tk-preset:hover{background:#e2e8f0}
  .tk-verdict{background:#eef2ff;border:1px solid #c7d2fe;border-radius:10px;padding:12px;margin-top:12px;font-size:14px;color:#1e293b}
  .tk-verdict b{color:#4338ca}
</style>

<div class="tk-wrap">
  <div class="tk-card">
    <h3>Weapon &amp; target</h3>
    <div class="tk-controls">
      <div class="tk-field"><label for="tk-dmg">Damage per bullet</label><input id="tk-dmg" type="number" step="any" min="1" value="36"></div>
      <div class="tk-field"><label for="tk-rpm">Fire rate (RPM)</label><input id="tk-rpm" type="number" min="30" max="2400" value="600"></div>
      <div class="tk-field"><label for="tk-hs">Headshot multiplier</label><input id="tk-hs" type="number" step="any" min="1" value="4"></div>
      <div class="tk-field"><label for="tk-hp">Target HP</label><input id="tk-hp" type="number" min="1" value="100"></div>
      <div class="tk-field"><label for="tk-armor">Armor (% damage reduction)</label><input id="tk-armor" type="number" min="0" max="95" value="0"></div>
      <div class="tk-field"><label for="tk-dropoff">Damage at range (%)</label><input id="tk-dropoff" type="number" min="10" max="100" value="100"></div>
    </div>
    <div class="tk-presets">
      <button class="tk-preset" data-d="36" data-r="600" data-h="4" data-hp="100" data-a="0">CS2 AK-47 (unarmored)</button>
      <button class="tk-preset" data-d="36" data-r="600" data-h="4" data-hp="100" data-a="50">CS2 AK-47 (armored)</button>
      <button class="tk-preset" data-d="115" data-r="41" data-h="4" data-hp="100" data-a="0">CS2 AWP (bodyshot)</button>
      <button class="tk-preset" data-d="39" data-r="600" data-h="3.5" data-hp="150" data-a="25">Valorant Vandal</button>
      <button class="tk-preset" data-d="14" data-r="1080" data-h="2" data-hp="200" data-a="0">Apex R-99</button>
      <button class="tk-preset" data-d="30" data-r="700" data-h="1.5" data-hp="100" data-a="0">CoD AR</button>
    </div>
  </div>

  <div class="tk-card">
    <h3>Time to kill</h3>
    <div class="tk-grid">
      <div class="tk-box body">
        <h4>Body shots</h4>
        <span class="tk-big" id="tk-body-ttk">133 ms</span>
        <div class="tk-sub">Assumes all shots land on torso.</div>
        <div class="tk-stats">
          <div class="tk-stat"><b id="tk-body-btk">3</b>Bullets to kill</div>
          <div class="tk-stat"><b id="tk-body-dps">360</b>DPS</div>
          <div class="tk-stat"><b id="tk-body-eff">36</b>Effective dmg</div>
        </div>
      </div>
      <div class="tk-box head">
        <h4>Headshots</h4>
        <span class="tk-big" id="tk-head-ttk">0 ms</span>
        <div class="tk-sub">Assumes all shots land on head.</div>
        <div class="tk-stats">
          <div class="tk-stat"><b id="tk-head-btk">1</b>Bullets to kill</div>
          <div class="tk-stat"><b id="tk-head-dps">1440</b>DPS</div>
          <div class="tk-stat"><b id="tk-head-eff">144</b>Effective dmg</div>
        </div>
      </div>
    </div>
    <div class="tk-verdict" id="tk-verdict"></div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const ids=['tk-dmg','tk-rpm','tk-hs','tk-hp','tk-armor','tk-dropoff'];

  function calc(){
    const dmg=parseFloat($('tk-dmg').value)||0;
    const rpm=parseFloat($('tk-rpm').value)||0;
    const hs=parseFloat($('tk-hs').value)||1;
    const hp=parseFloat($('tk-hp').value)||0;
    const armor=Math.min(95,Math.max(0,parseFloat($('tk-armor').value)||0))/100;
    const dropoff=Math.max(0.1,Math.min(1,(parseFloat($('tk-dropoff').value)||100)/100));
    if(dmg<=0||rpm<=0||hp<=0) return null;

    const interval = 60000/rpm;  // ms between bullets
    const bodyEff = dmg*dropoff*(1-armor);
    const headEff = dmg*dropoff*hs*(1-armor);
    const bodyBTK = Math.max(1, Math.ceil(hp/bodyEff));
    const headBTK = Math.max(1, Math.ceil(hp/headEff));
    // TTK = time from first bullet to kill = (btk-1) * interval
    return {
      bodyBTK, headBTK,
      bodyTTK: (bodyBTK-1)*interval,
      headTTK: (headBTK-1)*interval,
      bodyDPS: rpm/60*bodyEff,
      headDPS: rpm/60*headEff,
      bodyEff, headEff,
      interval
    };
  }

  function fmtMs(ms){ return isFinite(ms) ? Math.round(ms)+' ms' : '—'; }
  function fmtN(n,d=0){ return isFinite(n) ? (d?n.toFixed(d):Math.round(n)) : '—'; }

  function render(){
    const r=calc();
    if(!r){ ['tk-body-ttk','tk-body-btk','tk-body-dps','tk-body-eff','tk-head-ttk','tk-head-btk','tk-head-dps','tk-head-eff'].forEach(k=>$(k).textContent='—'); $('tk-verdict').textContent='Enter damage, RPM, and HP to calculate.'; return; }
    $('tk-body-ttk').textContent=fmtMs(r.bodyTTK);
    $('tk-body-btk').textContent=r.bodyBTK;
    $('tk-body-dps').textContent=fmtN(r.bodyDPS);
    $('tk-body-eff').textContent=fmtN(r.bodyEff,1);
    $('tk-head-ttk').textContent=fmtMs(r.headTTK);
    $('tk-head-btk').textContent=r.headBTK;
    $('tk-head-dps').textContent=fmtN(r.headDPS);
    $('tk-head-eff').textContent=fmtN(r.headEff,1);
    const diff = r.bodyTTK - r.headTTK;
    const pct = r.bodyTTK>0 ? (diff/r.bodyTTK*100) : 0;
    $('tk-verdict').innerHTML = `<b>Headshots save ${Math.round(diff)} ms</b> (${pct.toFixed(0)}% faster kill). Cycle time: ${r.interval.toFixed(1)} ms between bullets. If peeking a corner with a ${Math.round(r.interval)}&nbsp;ms advantage, you can win the trade with either shot type &mdash; headshots just shrink the window your enemy has to react.`;
  }
  ids.forEach(i=>$(i).addEventListener('input',render));
  document.querySelectorAll('.tk-preset').forEach(b=>b.addEventListener('click',()=>{
    $('tk-dmg').value=b.dataset.d; $('tk-rpm').value=b.dataset.r;
    $('tk-hs').value=b.dataset.h; $('tk-hp').value=b.dataset.hp;
    $('tk-armor').value=b.dataset.a; $('tk-dropoff').value=100;
    render();
  }));
  render();
})();
</script>
