<?php
$wl_labels = $wl_labels ?? [];
$L = array_merge([
  'aria' => 'Near-white detail / clipped highlights test.',
  'instruction' => 'Look for the gray patches on the white background. You should see all patches labeled 223 through 254. If high values (250-254) blend into white, your monitor is clipping highlights - reduce contrast or check the OSD.',
  'fullscreen' => 'Fullscreen',
], $wl_labels);
?>
<div class="wl-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="wl-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="wl-controls">
    <button type="button" class="wl-btn" id="wl-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="wl-arena" id="wl-arena">
    <?php for ($i = 223; $i <= 254; $i++): ?>
    <div class="wl-cell">
      <div class="wl-patch" style="background:rgb(<?php echo $i; ?>,<?php echo $i; ?>,<?php echo $i; ?>);"></div>
      <div class="wl-label"><?php echo $i; ?></div>
    </div>
    <?php endfor; ?>
  </div>
</div>
<style>
  .wl-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .wl-tester *{ box-sizing:border-box; }
  .wl-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .wl-controls { display:flex; gap:10px; justify-content:center; }
  .wl-btn { padding:8px 18px; border-radius:999px; border:1px solid #cbd5e1; background:#fff; font-weight:700; cursor:pointer; }
  .wl-arena { background:#fff; padding:20px; border-radius:12px; display:grid; grid-template-columns:repeat(8,1fr); gap:12px; border:1px solid #e2e8f0; }
  .wl-arena:fullscreen { padding:40px; height:100vh; }
  .wl-cell { display:flex; flex-direction:column; align-items:center; gap:6px; }
  .wl-patch { width:80px; height:80px; border-radius:8px; }
  .wl-label { font-size:0.78rem; color:#64748b; font-family:'JetBrains Mono',monospace; }
  @media (max-width:720px) { .wl-arena { grid-template-columns:repeat(4,1fr); } }
</style>
<script>
(function(){
  document.getElementById('wl-fs').addEventListener('click', function(){
    var arena = document.getElementById('wl-arena');
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
})();
</script>
