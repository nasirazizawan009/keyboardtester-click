<?php
$ec_labels = $ec_labels ?? [];
$L = array_merge([
  'aria' => 'eDPI calculator - effective DPI for gaming',
  'instruction' => 'Enter your mouse DPI and your in-game sensitivity. eDPI = DPI x sensitivity, used to compare aim across games and players.',
  'dpi' => 'Mouse DPI', 'sens' => 'In-game sensitivity', 'edpi' => 'Effective DPI (eDPI)',
  'cm_360' => 'cm/360 (estimated, default 0.022 yaw)',
  'reference' => 'Pro reference: 800 DPI x 0.5 sens = 400 eDPI',
], $ec_labels);
?>
<div class="ec-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ec-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="ec-form">
    <div class="ec-field">
      <label for="ec-dpi"><?php echo htmlspecialchars($L['dpi'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ec-dpi" min="100" max="32000" step="50" value="800">
    </div>
    <div class="ec-field">
      <label for="ec-sens"><?php echo htmlspecialchars($L['sens'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="number" id="ec-sens" min="0.01" max="100" step="0.01" value="0.5">
    </div>
    <div class="ec-field">
      <label for="ec-yaw">Yaw multiplier (0.022 default)</label>
      <input type="number" id="ec-yaw" min="0.001" max="1" step="0.001" value="0.022">
    </div>
  </div>
  <div class="ec-result">
    <div class="ec-label"><?php echo htmlspecialchars($L['edpi'], ENT_QUOTES, 'UTF-8'); ?></div>
    <div class="ec-value" id="ec-edpi">400</div>
    <div class="ec-cm"><?php echo htmlspecialchars($L['cm_360'], ENT_QUOTES, 'UTF-8'); ?>: <span id="ec-cm">45.0 cm</span></div>
  </div>
  <div class="ec-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .ec-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ec-tester *{ box-sizing:border-box; }
  .ec-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ec-form { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:720px) { .ec-form { grid-template-columns:1fr; } }
  .ec-field { display:flex; flex-direction:column; gap:6px; }
  .ec-field label { font-size:0.84rem; font-weight:600; color:var(--text-color,#0f172a); }
  .ec-field input { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font: inherit; font-size:1rem; font-variant-numeric:tabular-nums; }
  .ec-result { background:var(--surface,#0f172a); padding:30px; border-radius:12px; text-align:center; color:#fff; }
  .ec-label { font-size:0.84rem; text-transform:uppercase; letter-spacing:0.06em; color:#94a3b8; margin-bottom:6px; }
  .ec-value { font-size:4rem; font-weight:800; color:#7c3aed; font-variant-numeric:tabular-nums; line-height:1; }
  .ec-cm { font-size:1.05rem; color:#cbd5e1; margin-top:14px; }
  .ec-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var dpiEl = document.getElementById('ec-dpi'), sensEl = document.getElementById('ec-sens'), yawEl = document.getElementById('ec-yaw');
  var edpiEl = document.getElementById('ec-edpi'), cmEl = document.getElementById('ec-cm');
  function calc(){
    var dpi = parseFloat(dpiEl.value) || 0, sens = parseFloat(sensEl.value) || 0, yaw = parseFloat(yawEl.value) || 0.022;
    var edpi = Math.round(dpi * sens);
    edpiEl.textContent = edpi;
    if (edpi > 0) {
      var cm = (360 / (edpi * yaw)) * 2.54;
      cmEl.textContent = cm.toFixed(1) + ' cm';
    } else cmEl.textContent = '-';
  }
  [dpiEl, sensEl, yawEl].forEach(function(el){ el.addEventListener('input', calc); });
  calc();
})();
</script>
