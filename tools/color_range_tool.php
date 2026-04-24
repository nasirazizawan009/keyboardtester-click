<?php
$cr_labels = $cr_labels ?? [];
$L = array_merge([
  'aria' => 'Color range test - detect limited vs full RGB output',
  'instruction' => 'Look at each row. A properly configured FULL-range display shows every small patch clearly separated from its neighbors. A LIMITED-range display will merge the first few patches together (as solid black) and the last few (as solid white).',
  'near_black' => 'Near-black (RGB 0–31)',
  'near_white' => 'Near-white (RGB 224–255)',
  'ramp' => 'Continuous ramp (0 → 255)',
  'fullscreen' => 'Fullscreen',
  'exit_fs' => 'Exit',
  'reference' => 'Tip: Windows HDMI often ships with Limited Range by default. In NVIDIA Control Panel > Resolutions > Output dynamic range set to "Full". On AMD, Radeon Settings > Display > Color Range = Full. On game consoles the label is "RGB Range" or "HDMI Black Level".',
], $cr_labels);
?>
<div class="cr-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="cr-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="cr-actions">
    <button type="button" id="cr-fs" class="cr-btn cr-btn-primary"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div id="cr-stage" class="cr-stage">
    <section class="cr-band cr-band-black">
      <div class="cr-band-label"><?php echo htmlspecialchars($L['near_black'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="cr-row" id="cr-row-black"></div>
    </section>
    <section class="cr-band cr-band-white">
      <div class="cr-band-label"><?php echo htmlspecialchars($L['near_white'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="cr-row" id="cr-row-white"></div>
    </section>
    <section class="cr-band cr-band-ramp">
      <div class="cr-band-label"><?php echo htmlspecialchars($L['ramp'], ENT_QUOTES, 'UTF-8'); ?></div>
      <div class="cr-ramp" id="cr-ramp"></div>
    </section>
    <button type="button" class="cr-exit" id="cr-exit"><?php echo htmlspecialchars($L['exit_fs'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="cr-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .cr-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .cr-tester *{ box-sizing:border-box; }
  .cr-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .cr-actions { display:flex; gap:8px; }
  .cr-btn { padding:10px 18px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .cr-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .cr-btn-primary:hover { background:#16a34a; color:#fff; }
  .cr-stage { border-radius:12px; overflow:hidden; background:#0b1628; position:relative; }
  .cr-stage.is-fs { position:fixed; inset:0; width:100vw; height:100vh; border-radius:0; z-index:9999; display:flex; flex-direction:column; }
  .cr-band { padding:18px 20px; }
  .cr-band-black { background:#000; color:#e2e8f0; }
  .cr-band-white { background:#fff; color:#111; }
  .cr-band-ramp { background:#111; color:#e2e8f0; }
  .cr-stage.is-fs .cr-band { flex:1; display:flex; flex-direction:column; }
  .cr-band-label { font-size:0.78rem; text-transform:uppercase; letter-spacing:0.08em; opacity:0.7; margin-bottom:10px; }
  .cr-row { display:grid; grid-template-columns:repeat(32,1fr); gap:2px; }
  .cr-stage.is-fs .cr-row { flex:1; gap:1px; }
  .cr-row div { min-height:40px; border-radius:3px; }
  .cr-stage.is-fs .cr-row div { min-height:auto; border-radius:0; }
  .cr-ramp { height:64px; border-radius:6px; background:linear-gradient(to right, rgb(0,0,0), rgb(255,255,255)); }
  .cr-stage.is-fs .cr-ramp { flex:1; border-radius:0; }
  .cr-exit { display:none; position:absolute; top:16px; right:16px; z-index:10; padding:8px 14px; background:rgba(0,0,0,0.7); color:#fff; border:1px solid rgba(255,255,255,0.2); border-radius:6px; font:inherit; font-weight:600; cursor:pointer; }
  .cr-stage.is-fs .cr-exit { display:block; }
  .cr-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var rowBlack = document.getElementById('cr-row-black');
  var rowWhite = document.getElementById('cr-row-white');
  var stage = document.getElementById('cr-stage');
  var fsBtn = document.getElementById('cr-fs'), exitBtn = document.getElementById('cr-exit');

  for (var i = 0; i < 32; i++) {
    var vB = i; var d = document.createElement('div');
    d.style.background = 'rgb(' + vB + ',' + vB + ',' + vB + ')';
    d.title = 'RGB ' + vB;
    rowBlack.appendChild(d);
    var vW = 224 + i; var d2 = document.createElement('div');
    d2.style.background = 'rgb(' + vW + ',' + vW + ',' + vW + ')';
    d2.title = 'RGB ' + vW;
    rowWhite.appendChild(d2);
  }

  fsBtn.addEventListener('click', function(){
    (stage.requestFullscreen || stage.webkitRequestFullscreen || function(){}).call(stage);
  });
  exitBtn.addEventListener('click', function(){
    (document.exitFullscreen || document.webkitExitFullscreen).call(document);
  });
  document.addEventListener('fullscreenchange', function(){
    if (document.fullscreenElement === stage) stage.classList.add('is-fs');
    else stage.classList.remove('is-fs');
  });
  document.addEventListener('keydown', function(e){
    if (stage.classList.contains('is-fs') && e.key === 'Escape') {
      (document.exitFullscreen || document.webkitExitFullscreen).call(document);
    }
  });
})();
</script>
