<?php
$fov_labels = $fov_labels ?? [];
$L = array_merge([
  'aria' => 'FoV calculator - convert field of view across aspect ratios',
  'instruction' => 'Enter your current FoV and its type (horizontal, vertical, or diagonal), then pick your aspect ratio. The table below shows the equivalent FoV at every common aspect ratio and format.',
  'game_preset' => 'Game preset',
  'preset_custom' => 'Custom',
  'preset_cs2' => 'CS2 / CS:GO (hFoV)',
  'preset_valorant' => 'Valorant (hFoV)',
  'preset_apex' => 'Apex Legends (vFoV)',
  'preset_cod' => 'Call of Duty (4:3 hFoV, Hor+)',
  'preset_fortnite' => 'Fortnite (hFoV)',
  'preset_overwatch' => 'Overwatch (vFoV)',
  'preset_quake' => 'Quake / idTech (vFoV)',
  'preset_unreal' => 'Unreal / Fortnite (hFoV)',
  'fov_value' => 'FoV value (degrees)',
  'fov_type' => 'FoV type',
  'type_h' => 'Horizontal',
  'type_v' => 'Vertical',
  'type_d' => 'Diagonal',
  'aspect_ratio' => 'Your aspect ratio',
  'ar_4x3' => '4:3',
  'ar_16x10' => '16:10',
  'ar_16x9' => '16:9',
  'ar_21x9' => '21:9',
  'ar_32x9' => '32:9',
  'table_heading' => 'Equivalent FoV across aspect ratios',
  'col_aspect' => 'Aspect',
  'col_h' => 'hFoV',
  'col_v' => 'vFoV',
  'col_d' => 'Diagonal',
  'reference' => 'Tip: CS2 defaults 90 hFoV on 4:3. Apex defaults 90 vFoV. CoD asks for 4:3 hFoV (Hor+), so pick "Call of Duty" preset for an accurate conversion.',
], $fov_labels);
?>
<div class="fov-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="fov-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="fov-form">
    <div class="fov-field">
      <label for="fov-preset"><?php echo htmlspecialchars($L['game_preset'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="fov-preset">
        <option value="custom"><?php echo htmlspecialchars($L['preset_custom'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="cs2"><?php echo htmlspecialchars($L['preset_cs2'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="valorant"><?php echo htmlspecialchars($L['preset_valorant'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="apex"><?php echo htmlspecialchars($L['preset_apex'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="cod"><?php echo htmlspecialchars($L['preset_cod'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="fortnite"><?php echo htmlspecialchars($L['preset_fortnite'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="overwatch"><?php echo htmlspecialchars($L['preset_overwatch'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="quake"><?php echo htmlspecialchars($L['preset_quake'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="fov-field">
      <label for="fov-value"><?php echo htmlspecialchars($L['fov_value'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="fov-value" min="30" max="170" step="1" value="90">
    </div>
    <div class="fov-field">
      <label for="fov-type"><?php echo htmlspecialchars($L['fov_type'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="fov-type">
        <option value="h"><?php echo htmlspecialchars($L['type_h'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="v"><?php echo htmlspecialchars($L['type_v'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="d"><?php echo htmlspecialchars($L['type_d'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="fov-field">
      <label for="fov-aspect"><?php echo htmlspecialchars($L['aspect_ratio'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="fov-aspect">
        <option value="1.3333"><?php echo htmlspecialchars($L['ar_4x3'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="1.6"><?php echo htmlspecialchars($L['ar_16x10'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="1.7778" selected><?php echo htmlspecialchars($L['ar_16x9'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="2.3704"><?php echo htmlspecialchars($L['ar_21x9'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="3.5556"><?php echo htmlspecialchars($L['ar_32x9'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
  </div>

  <div class="fov-table-wrap">
    <div class="fov-table-heading"><?php echo htmlspecialchars($L['table_heading'], ENT_QUOTES, 'UTF-8'); ?></div>
    <table class="fov-table">
      <thead><tr>
        <th><?php echo htmlspecialchars($L['col_aspect'], ENT_QUOTES, 'UTF-8'); ?></th>
        <th><?php echo htmlspecialchars($L['col_h'], ENT_QUOTES, 'UTF-8'); ?></th>
        <th><?php echo htmlspecialchars($L['col_v'], ENT_QUOTES, 'UTF-8'); ?></th>
        <th><?php echo htmlspecialchars($L['col_d'], ENT_QUOTES, 'UTF-8'); ?></th>
      </tr></thead>
      <tbody id="fov-tbody"></tbody>
    </table>
  </div>
  <div class="fov-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .fov-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .fov-tester *{ box-sizing:border-box; }
  .fov-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .fov-form { display:grid; grid-template-columns:repeat(4,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:900px) { .fov-form { grid-template-columns:repeat(2,1fr); } }
  @media (max-width:520px) { .fov-form { grid-template-columns:1fr; } }
  .fov-field { display:flex; flex-direction:column; gap:6px; }
  .fov-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .fov-field input, .fov-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .fov-table-wrap { background:var(--surface,#0f172a); padding:20px 24px 24px; border-radius:12px; color:#fff; overflow-x:auto; }
  .fov-table-heading { font-size:0.84rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:12px; font-weight:700; }
  .fov-table { width:100%; border-collapse:collapse; font-variant-numeric:tabular-nums; }
  .fov-table th, .fov-table td { padding:10px 12px; text-align:left; border-bottom:1px solid rgba(148,163,184,0.16); font-size:0.95rem; }
  .fov-table th { color:#94a3b8; font-size:0.82rem; font-weight:600; text-transform:uppercase; letter-spacing:0.05em; }
  .fov-table td:first-child { font-weight:700; color:#cbd5e1; }
  .fov-table tr.is-current td { color:#22c55e; background:rgba(34,197,94,0.08); }
  .fov-table tr:last-child td { border-bottom:none; }
  .fov-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var presetEl = document.getElementById('fov-preset');
  var valEl = document.getElementById('fov-value');
  var typeEl = document.getElementById('fov-type');
  var arEl = document.getElementById('fov-aspect');
  var tbody = document.getElementById('fov-tbody');

  // Preset => { type: 'h'|'v'|'d', ar: aspect (for "CoD 4:3 hFoV" preset), defaultVal }
  var PRESETS = {
    cs2:       { type:'h', ar:'1.7778', val:106 },
    valorant:  { type:'h', ar:'1.7778', val:103 },
    apex:      { type:'v', ar:'1.7778', val:90 },
    cod:       { type:'h', ar:'1.3333', val:90 },
    fortnite:  { type:'h', ar:'1.7778', val:90 },
    overwatch: { type:'v', ar:'1.7778', val:79 },
    quake:     { type:'v', ar:'1.7778', val:73 },
  };

  var ASPECTS = [
    { label: '4:3',   value: 4/3 },
    { label: '16:10', value: 16/10 },
    { label: '16:9',  value: 16/9 },
    { label: '21:9',  value: 64/27 },
    { label: '32:9',  value: 32/9 },
  ];

  var DEG = Math.PI / 180, RAD = 180 / Math.PI;

  // Given any FoV and its type + aspect ratio, normalize to horizontal radians.
  function toHorizRad(fovDeg, type, ar){
    var r = fovDeg * DEG;
    if (type === 'h') return r;
    if (type === 'v') return 2 * Math.atan(Math.tan(r/2) * ar);
    // diagonal: tan(d/2)^2 = tan(h/2)^2 + tan(v/2)^2 = tan(h/2)^2 (1 + 1/ar^2)
    var t = Math.tan(r/2);
    var h2 = t*t / (1 + 1/(ar*ar));
    return 2 * Math.atan(Math.sqrt(h2));
  }
  function horizRadToH(h){ return h * RAD; }
  function horizRadToV(h, ar){ return 2 * Math.atan(Math.tan(h/2) / ar) * RAD; }
  function horizRadToD(h, ar){
    var th = Math.tan(h/2);
    var tv = th / ar;
    return 2 * Math.atan(Math.sqrt(th*th + tv*tv)) * RAD;
  }

  function render(){
    var val = parseFloat(valEl.value);
    var type = typeEl.value;
    var ar = parseFloat(arEl.value);
    if (!isFinite(val) || val < 1 || !isFinite(ar) || ar <= 0) { tbody.innerHTML = ''; return; }

    // Step 1: compute the UNDERLYING horizontal FoV in radians, based on the source.
    // This preserves vertical FoV across aspect ratios — the standard "Hor+" behavior.
    var sourceHorizRad = toHorizRad(val, type, ar);
    var sourceVertRad = 2 * Math.atan(Math.tan(sourceHorizRad/2) / ar);

    var rows = '';
    ASPECTS.forEach(function(a){
      // Match vertical FoV across aspect ratios (Hor+): keep vFoV constant.
      var hRad = 2 * Math.atan(Math.tan(sourceVertRad/2) * a.value);
      var hDeg = hRad * RAD;
      var vDeg = sourceVertRad * RAD;
      var dDeg = horizRadToD(hRad, a.value);
      var isCurrent = Math.abs(a.value - ar) < 0.01;
      rows += '<tr class="' + (isCurrent ? 'is-current' : '') + '">' +
        '<td>' + a.label + (isCurrent ? ' (current)' : '') + '</td>' +
        '<td>' + hDeg.toFixed(1) + '&deg;</td>' +
        '<td>' + vDeg.toFixed(1) + '&deg;</td>' +
        '<td>' + dDeg.toFixed(1) + '&deg;</td>' +
        '</tr>';
    });
    tbody.innerHTML = rows;
  }

  presetEl.addEventListener('change', function(){
    var p = PRESETS[presetEl.value];
    if (p) {
      typeEl.value = p.type;
      arEl.value = p.ar;
      valEl.value = p.val;
    }
    render();
  });
  [valEl, typeEl, arEl].forEach(function(el){ el.addEventListener('input', render); el.addEventListener('change', render); });
  render();
})();
</script>
