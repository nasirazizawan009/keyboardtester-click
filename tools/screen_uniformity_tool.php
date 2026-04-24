<?php
$su_labels = $su_labels ?? [];
$L = array_merge([
  'aria' => 'Screen uniformity test',
  'instruction' => 'Pick a color and brightness, then Fullscreen. Good panels show perfectly even color edge-to-edge. Uneven brightness, tinted corners, or cloudy patches reveal uniformity issues.',
  'color' => 'Color',
  'c_gray' => 'Mid gray (detects clouding)',
  'c_black' => 'Near-black (detects IPS glow + bleed)',
  'c_white' => 'White (detects brightness drop-off)',
  'c_red' => 'Red',
  'c_green' => 'Green',
  'c_blue' => 'Blue',
  'brightness' => 'Brightness',
  'fullscreen' => 'Fullscreen',
  'exit_fs' => 'Exit',
  'reference' => 'Tip: check at 20%, 50%, and 80% brightness — uniformity issues often appear only in a specific brightness band. Step 2-3 feet back for a less-biased look. Dim your room for clouding tests.',
], $su_labels);
?>
<div class="su-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="su-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="su-form">
    <div class="su-field">
      <label for="su-color"><?php echo htmlspecialchars($L['color'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="su-color">
        <option value="gray" selected><?php echo htmlspecialchars($L['c_gray'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="black"><?php echo htmlspecialchars($L['c_black'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="white"><?php echo htmlspecialchars($L['c_white'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="red"><?php echo htmlspecialchars($L['c_red'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="green"><?php echo htmlspecialchars($L['c_green'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="blue"><?php echo htmlspecialchars($L['c_blue'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="su-field su-field-range">
      <label for="su-bright"><?php echo htmlspecialchars($L['brightness'], ENT_QUOTES, 'UTF-8'); ?>: <span id="su-bright-v">50</span>%</label>
      <input type="range" id="su-bright" min="0" max="100" step="1" value="50">
    </div>
    <button type="button" id="su-fs" class="su-btn su-btn-primary"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div id="su-stage" class="su-stage"></div>
  <button type="button" id="su-exit" class="su-exit"><?php echo htmlspecialchars($L['exit_fs'], ENT_QUOTES, 'UTF-8'); ?></button>
  <div class="su-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .su-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .su-tester *{ box-sizing:border-box; }
  .su-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .su-form { display:flex; flex-wrap:wrap; gap:14px; align-items:end; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .su-field { display:flex; flex-direction:column; gap:6px; min-width:220px; flex:1; }
  .su-field label { font-size:0.84rem; font-weight:600; }
  .su-field select, .su-field input[type="range"] { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:0.95rem; }
  .su-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .su-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .su-btn-primary:hover { background:#16a34a; color:#fff; }
  .su-stage { height:280px; border-radius:12px; background:rgb(128,128,128); transition:background 0.1s; }
  .su-stage.is-fs { position:fixed; inset:0; width:100vw; height:100vh; border-radius:0; z-index:9999; }
  .su-exit { display:none; position:fixed; top:16px; right:16px; z-index:10000; padding:8px 14px; background:rgba(0,0,0,0.6); color:#fff; border:1px solid rgba(255,255,255,0.2); border-radius:6px; font:inherit; font-weight:600; cursor:pointer; }
  body.su-fs-open .su-exit { display:block; }
  .su-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var stage = document.getElementById('su-stage');
  var colorEl = document.getElementById('su-color');
  var brightEl = document.getElementById('su-bright');
  var brightVal = document.getElementById('su-bright-v');
  var fsBtn = document.getElementById('su-fs'), exitBtn = document.getElementById('su-exit');

  function apply(){
    var c = colorEl.value;
    var b = parseInt(brightEl.value, 10);
    brightVal.textContent = b;
    var v = Math.round(b * 255 / 100);
    var bg;
    if (c === 'gray') bg = 'rgb(' + v + ',' + v + ',' + v + ')';
    else if (c === 'black') bg = 'rgb(' + Math.round(v * 0.08) + ',' + Math.round(v * 0.08) + ',' + Math.round(v * 0.08) + ')';
    else if (c === 'white') bg = 'rgb(' + v + ',' + v + ',' + v + ')';
    else if (c === 'red') bg = 'rgb(' + v + ',0,0)';
    else if (c === 'green') bg = 'rgb(0,' + v + ',0)';
    else if (c === 'blue') bg = 'rgb(0,0,' + v + ')';
    stage.style.background = bg;
  }

  fsBtn.addEventListener('click', function(){
    (stage.requestFullscreen || stage.webkitRequestFullscreen || function(){}).call(stage);
  });
  exitBtn.addEventListener('click', function(){
    (document.exitFullscreen || document.webkitExitFullscreen).call(document);
  });
  document.addEventListener('fullscreenchange', function(){
    if (document.fullscreenElement === stage) { stage.classList.add('is-fs'); document.body.classList.add('su-fs-open'); }
    else { stage.classList.remove('is-fs'); document.body.classList.remove('su-fs-open'); }
  });
  colorEl.addEventListener('change', apply);
  brightEl.addEventListener('input', apply);
  document.addEventListener('keydown', function(e){
    if (!stage.classList.contains('is-fs')) return;
    if (e.key === 'Escape') (document.exitFullscreen || document.webkitExitFullscreen).call(document);
    else if (e.key === 'ArrowUp') { brightEl.value = Math.min(100, parseInt(brightEl.value,10)+5); apply(); }
    else if (e.key === 'ArrowDown') { brightEl.value = Math.max(0, parseInt(brightEl.value,10)-5); apply(); }
  });
  apply();
})();
</script>
