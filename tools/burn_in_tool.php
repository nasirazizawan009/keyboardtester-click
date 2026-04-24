<?php
$bi_labels = $bi_labels ?? [];
$L = array_merge([
  'aria' => 'OLED burn-in and image retention test',
  'instruction' => 'Click Fullscreen to start. Use arrow keys (or the Next / Prev buttons) to step through colors. Solid full-screen white or a primary color for 30-60 seconds reveals retention. Press Esc to exit.',
  'mode' => 'Mode',
  'mode_cycle' => 'Color cycle (W → K → R → G → B → Cyan → Magenta → Yellow)',
  'mode_checker' => 'Fine checkerboard',
  'mode_scroll' => 'Scrolling refresher',
  'auto' => 'Auto-advance',
  'auto_off' => 'Off',
  'auto_5' => 'Every 5 s',
  'auto_15' => 'Every 15 s',
  'auto_60' => 'Every 60 s',
  'fullscreen' => 'Fullscreen',
  'exit_fs' => 'Exit',
  'next' => 'Next',
  'prev' => 'Previous',
  'current_color' => 'Current color',
  'reference' => 'Tip: leave the scrolling refresher running overnight to help OLED panels recover from mild short-term image retention. Burn-in that persists after 8 hours of full-screen white is permanent; the refresher will not fix it.',
], $bi_labels);
?>
<div class="bi-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="bi-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="bi-form">
    <div class="bi-field">
      <label for="bi-mode"><?php echo htmlspecialchars($L['mode'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="bi-mode">
        <option value="cycle" selected><?php echo htmlspecialchars($L['mode_cycle'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="checker"><?php echo htmlspecialchars($L['mode_checker'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="scroll"><?php echo htmlspecialchars($L['mode_scroll'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="bi-field">
      <label for="bi-auto"><?php echo htmlspecialchars($L['auto'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="bi-auto">
        <option value="0"><?php echo htmlspecialchars($L['auto_off'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="5"><?php echo htmlspecialchars($L['auto_5'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="15" selected><?php echo htmlspecialchars($L['auto_15'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="60"><?php echo htmlspecialchars($L['auto_60'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <button type="button" id="bi-fs" class="bi-btn bi-btn-primary"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="bi-stage" id="bi-stage">
    <div class="bi-inner" id="bi-inner"></div>
    <div class="bi-overlay">
      <div class="bi-overlay-card">
        <div class="bi-overlay-label"><?php echo htmlspecialchars($L['current_color'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="bi-overlay-value" id="bi-overlay-color">White</div>
        <div class="bi-overlay-controls">
          <button type="button" id="bi-prev" class="bi-btn"><?php echo htmlspecialchars($L['prev'], ENT_QUOTES, 'UTF-8'); ?></button>
          <button type="button" id="bi-next" class="bi-btn bi-btn-primary"><?php echo htmlspecialchars($L['next'], ENT_QUOTES, 'UTF-8'); ?></button>
          <button type="button" id="bi-exit" class="bi-btn"><?php echo htmlspecialchars($L['exit_fs'], ENT_QUOTES, 'UTF-8'); ?></button>
        </div>
      </div>
    </div>
  </div>
  <div class="bi-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .bi-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .bi-tester *{ box-sizing:border-box; }
  .bi-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .bi-form { display:flex; flex-wrap:wrap; gap:12px; align-items:end; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .bi-field { display:flex; flex-direction:column; gap:6px; min-width:200px; flex:1; }
  .bi-field label { font-size:0.84rem; font-weight:600; }
  .bi-field select { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:0.95rem; }
  .bi-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .bi-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .bi-btn-primary:hover { background:#16a34a; color:#fff; }
  .bi-stage { position:relative; height:300px; border-radius:12px; overflow:hidden; background:#000; }
  .bi-stage.is-fs { position:fixed; inset:0; height:auto; width:100vw; height:100vh; border-radius:0; z-index:9999; }
  .bi-inner { position:absolute; inset:0; width:100%; height:100%; }
  .bi-inner.checker { background-image: linear-gradient(45deg, #000 25%, transparent 25%), linear-gradient(-45deg, #000 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #000 75%), linear-gradient(-45deg, transparent 75%, #000 75%); background-size: 20px 20px; background-position: 0 0, 0 10px, 10px -10px, -10px 0px; background-color:#fff; }
  .bi-inner.scroll { background:repeating-linear-gradient(90deg, #000 0 20px, #fff 20px 40px); animation:bi-scroll 1.5s linear infinite; }
  @keyframes bi-scroll { from { background-position: 0 0; } to { background-position: 40px 0; } }
  .bi-overlay { position:absolute; top:20px; left:50%; transform:translateX(-50%); pointer-events:none; transition:opacity 0.3s; }
  .bi-stage.is-fs.is-dim .bi-overlay { opacity:0; }
  .bi-overlay-card { background:rgba(0,0,0,0.8); color:#fff; padding:14px 18px; border-radius:12px; pointer-events:auto; box-shadow:0 8px 24px rgba(0,0,0,0.4); }
  .bi-overlay-label { font-size:0.74rem; text-transform:uppercase; letter-spacing:0.08em; color:#94a3b8; margin-bottom:4px; text-align:center; }
  .bi-overlay-value { font-size:1.3rem; font-weight:800; text-align:center; margin-bottom:12px; }
  .bi-overlay-controls { display:flex; gap:8px; justify-content:center; }
  .bi-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var stage = document.getElementById('bi-stage');
  var inner = document.getElementById('bi-inner');
  var colorLabel = document.getElementById('bi-overlay-color');
  var modeEl = document.getElementById('bi-mode');
  var autoEl = document.getElementById('bi-auto');
  var fsBtn = document.getElementById('bi-fs'), nextBtn = document.getElementById('bi-next'), prevBtn = document.getElementById('bi-prev'), exitBtn = document.getElementById('bi-exit');

  var COLORS = [
    { name:'White',   css:'#ffffff' },
    { name:'Black',   css:'#000000' },
    { name:'Red',     css:'#ff0000' },
    { name:'Green',   css:'#00ff00' },
    { name:'Blue',    css:'#0000ff' },
    { name:'Cyan',    css:'#00ffff' },
    { name:'Magenta', css:'#ff00ff' },
    { name:'Yellow',  css:'#ffff00' },
  ];
  var idx = 0, autoInt = 0, dimTimer = 0;

  function apply(){
    var mode = modeEl.value;
    inner.className = 'bi-inner';
    if (mode === 'cycle') {
      var c = COLORS[idx];
      inner.style.background = c.css;
      colorLabel.textContent = c.name;
    } else if (mode === 'checker') {
      inner.style.background = '';
      inner.classList.add('checker');
      colorLabel.textContent = 'Checkerboard';
    } else {
      inner.style.background = '';
      inner.classList.add('scroll');
      colorLabel.textContent = 'Scrolling refresher';
    }
  }
  function next(){ if (modeEl.value === 'cycle') { idx = (idx + 1) % COLORS.length; apply(); } }
  function prev(){ if (modeEl.value === 'cycle') { idx = (idx - 1 + COLORS.length) % COLORS.length; apply(); } }

  function enterFs(){
    if (document.fullscreenElement) return;
    (stage.requestFullscreen || stage.webkitRequestFullscreen || function(){}).call(stage);
  }
  function exitFs(){
    if (document.fullscreenElement) (document.exitFullscreen || document.webkitExitFullscreen).call(document);
  }
  document.addEventListener('fullscreenchange', function(){
    if (document.fullscreenElement === stage) stage.classList.add('is-fs');
    else { stage.classList.remove('is-fs', 'is-dim'); }
  });
  function armDim(){
    clearTimeout(dimTimer);
    stage.classList.remove('is-dim');
    dimTimer = setTimeout(function(){ stage.classList.add('is-dim'); }, 3000);
  }
  stage.addEventListener('mousemove', armDim);
  stage.addEventListener('keydown', armDim);

  function setAuto(){
    clearInterval(autoInt);
    autoInt = 0;
    var s = parseInt(autoEl.value, 10);
    if (s > 0) autoInt = setInterval(next, s * 1000);
  }

  fsBtn.addEventListener('click', enterFs);
  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);
  exitBtn.addEventListener('click', exitFs);
  modeEl.addEventListener('change', function(){ idx = 0; apply(); });
  autoEl.addEventListener('change', setAuto);
  document.addEventListener('keydown', function(e){
    if (!stage.classList.contains('is-fs')) return;
    if (e.key === 'ArrowRight' || e.key === ' ') next();
    else if (e.key === 'ArrowLeft') prev();
    else if (e.key === 'Escape') exitFs();
  });

  apply();
  setAuto();
})();
</script>
