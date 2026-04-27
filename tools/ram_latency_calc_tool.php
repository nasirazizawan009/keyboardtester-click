<?php // ram_latency_calc_tool.php – CAS latency <-> ns converter ?>
<style>
  .rl-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .rl-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
  @media (max-width:820px){ .rl-grid{grid-template-columns:1fr} }
  .rl-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .rl-card h3{margin:0 0 12px;font-size:16px}
  .rl-row{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:10px}
  .rl-field label{display:block;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.5px;margin-bottom:4px}
  .rl-field input,.rl-field select{width:100%;padding:10px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:14px;background:#fff}
  .rl-result{background:linear-gradient(180deg,#eef2ff,#fff);border:1px solid #c7d2fe;border-radius:12px;padding:14px;margin-top:12px;text-align:center}
  .rl-result b{font-size:36px;color:#4338ca;display:block}
  .rl-result span{font-size:12px;color:#6b7280;text-transform:uppercase;letter-spacing:.5px}
  .rl-verdict{background:#f8fafc;border:1px solid #e2e8f0;border-radius:10px;padding:12px;margin-top:14px;font-size:14px;color:#334155}
  .rl-verdict b{color:#0f172a}
  .rl-table{width:100%;border-collapse:collapse;margin-top:10px;font-size:13px}
  .rl-table th,.rl-table td{padding:8px 10px;border-bottom:1px solid #e2e8f0;text-align:left}
  .rl-table th{background:#f8fafc;font-weight:700;color:#475569}
  .rl-presets{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}
  .rl-preset{background:#f1f5f9;border:1px solid #e2e8f0;border-radius:6px;padding:6px 10px;font-size:12px;cursor:pointer}
  .rl-preset:hover{background:#e2e8f0}
</style>

<div class="rl-wrap">
  <div class="rl-grid">
    <div class="rl-card">
      <h3>Kit A</h3>
      <div class="rl-row">
        <div class="rl-field"><label>Memory speed (MT/s)</label><input id="rl-mts-a" type="number" min="800" max="12000" step="1" value="3200"></div>
        <div class="rl-field"><label>CAS latency (CL)</label><input id="rl-cl-a" type="number" min="4" max="50" step="1" value="16"></div>
      </div>
      <div class="rl-presets">
        <button class="rl-preset" data-k="a" data-m="3200" data-c="16">DDR4 3200 CL16</button>
        <button class="rl-preset" data-k="a" data-m="3600" data-c="18">DDR4 3600 CL18</button>
        <button class="rl-preset" data-k="a" data-m="3600" data-c="16">DDR4 3600 CL16</button>
        <button class="rl-preset" data-k="a" data-m="4000" data-c="18">DDR4 4000 CL18</button>
      </div>
      <div class="rl-result"><span>True latency</span><b id="rl-ns-a">10.00 ns</b></div>
    </div>

    <div class="rl-card">
      <h3>Kit B</h3>
      <div class="rl-row">
        <div class="rl-field"><label>Memory speed (MT/s)</label><input id="rl-mts-b" type="number" min="800" max="12000" step="1" value="6000"></div>
        <div class="rl-field"><label>CAS latency (CL)</label><input id="rl-cl-b" type="number" min="4" max="50" step="1" value="30"></div>
      </div>
      <div class="rl-presets">
        <button class="rl-preset" data-k="b" data-m="5200" data-c="40">DDR5 5200 CL40</button>
        <button class="rl-preset" data-k="b" data-m="6000" data-c="30">DDR5 6000 CL30</button>
        <button class="rl-preset" data-k="b" data-m="6400" data-c="32">DDR5 6400 CL32</button>
        <button class="rl-preset" data-k="b" data-m="7200" data-c="36">DDR5 7200 CL36</button>
        <button class="rl-preset" data-k="b" data-m="8000" data-c="38">DDR5 8000 CL38</button>
      </div>
      <div class="rl-result"><span>True latency</span><b id="rl-ns-b">10.00 ns</b></div>
    </div>
  </div>

  <div class="rl-card">
    <h3>Compare</h3>
    <div class="rl-verdict" id="rl-verdict">Both kits shown side by side. Lower ns = faster real-world access.</div>
    <table class="rl-table">
      <thead><tr><th>Metric</th><th>Kit A</th><th>Kit B</th></tr></thead>
      <tbody>
        <tr><td>Memory speed (MT/s)</td><td id="rl-t-mts-a">3200</td><td id="rl-t-mts-b">6000</td></tr>
        <tr><td>Cycle time (ns)</td><td id="rl-t-cyc-a">0.625</td><td id="rl-t-cyc-b">0.333</td></tr>
        <tr><td>CAS cycles</td><td id="rl-t-cl-a">16</td><td id="rl-t-cl-b">30</td></tr>
        <tr><td>First-word latency (ns)</td><td id="rl-t-ns-a">10.00</td><td id="rl-t-ns-b">10.00</td></tr>
        <tr><td>Peak bandwidth (GB/s, DC)</td><td id="rl-t-bw-a">25.6</td><td id="rl-t-bw-b">48.0</td></tr>
      </tbody>
    </table>
  </div>

  <div class="rl-card">
    <h3>Reverse: target latency -> required CL</h3>
    <div class="rl-row">
      <div class="rl-field"><label>Target ns</label><input id="rl-rev-ns" type="number" min="1" max="50" step="0.01" value="9"></div>
      <div class="rl-field"><label>At MT/s</label><input id="rl-rev-mts" type="number" min="800" max="12000" step="1" value="6000"></div>
    </div>
    <div class="rl-result"><span>Required CAS latency</span><b id="rl-rev-cl">CL 27</b></div>
  </div>
</div>

<script>
(()=>{
  'use strict';
  const $=id=>document.getElementById(id);
  const ids=['rl-mts-a','rl-cl-a','rl-mts-b','rl-cl-b','rl-rev-ns','rl-rev-mts'];
  function ns(mts,cl){ return (cl*2000)/mts; }
  function cyc(mts){ return 2000/mts; }
  function bw(mts){ return (mts*8*2)/1000; }
  function fmt(n,d=2){ return isFinite(n)?n.toFixed(d):'—'; }
  function compute(){
    const mtsA=+$('rl-mts-a').value, clA=+$('rl-cl-a').value;
    const mtsB=+$('rl-mts-b').value, clB=+$('rl-cl-b').value;
    const nsA=ns(mtsA,clA), nsB=ns(mtsB,clB);
    $('rl-ns-a').textContent=fmt(nsA)+' ns';
    $('rl-ns-b').textContent=fmt(nsB)+' ns';
    $('rl-t-mts-a').textContent=mtsA; $('rl-t-mts-b').textContent=mtsB;
    $('rl-t-cyc-a').textContent=fmt(cyc(mtsA),3); $('rl-t-cyc-b').textContent=fmt(cyc(mtsB),3);
    $('rl-t-cl-a').textContent=clA; $('rl-t-cl-b').textContent=clB;
    $('rl-t-ns-a').textContent=fmt(nsA); $('rl-t-ns-b').textContent=fmt(nsB);
    $('rl-t-bw-a').textContent=fmt(bw(mtsA),1); $('rl-t-bw-b').textContent=fmt(bw(mtsB),1);
    const diff=nsB-nsA;
    const v=$('rl-verdict');
    if(Math.abs(diff)<0.1) v.innerHTML='<b>Tied.</b> Both kits have effectively identical first-word latency. The faster-MT/s kit will win bandwidth-heavy workloads; the tight-CL kit will win pointer-chasing.';
    else if(diff>0) v.innerHTML=`<b>Kit A is ${fmt(Math.abs(diff))} ns lower latency</b> (${fmt((diff/nsB)*100,1)}% faster access). Kit B has ${fmt((bw(mtsB)/bw(mtsA)-1)*100,1)}% higher peak bandwidth.`;
    else v.innerHTML=`<b>Kit B is ${fmt(Math.abs(diff))} ns lower latency</b> (${fmt((Math.abs(diff)/nsA)*100,1)}% faster access). Kit A has ${fmt((bw(mtsA)/bw(mtsB)-1)*100,1)}% higher peak bandwidth only if A > B in MT/s.`;

    const revNs=+$('rl-rev-ns').value, revMts=+$('rl-rev-mts').value;
    const revCl=Math.round((revNs*revMts)/2000);
    $('rl-rev-cl').textContent='CL '+(isFinite(revCl)?revCl:'—');
  }
  ids.forEach(i=>$(i).addEventListener('input',compute));
  document.querySelectorAll('.rl-preset').forEach(b=>{
    b.addEventListener('click',()=>{
      const k=b.dataset.k;
      $('rl-mts-'+k).value=b.dataset.m;
      $('rl-cl-'+k).value=b.dataset.c;
      compute();
    });
  });
  compute();
})();
</script>
