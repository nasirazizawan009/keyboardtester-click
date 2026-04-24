<?php
// black_level_tool.php
// Near-black detail / crushed-blacks check. Shows black background with patches at values 1-32.
$bl_labels = $bl_labels ?? [];
$L = array_merge([
  'aria' => 'Near-black detail / crushed blacks test.',
  'instruction' => 'Look for the gray patches on the black background. You should see all patches labeled 1 through 32. If patches at low numbers (1-5) are invisible, your monitor is crushing blacks - increase brightness or change the OSD black level setting.',
  'fullscreen' => 'Fullscreen',
], $bl_labels);
?>
<div class="bl-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="bl-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="bl-controls">
    <button type="button" class="bl-btn" id="bl-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="bl-arena" id="bl-arena">
    <?php for ($i = 1; $i <= 32; $i++): ?>
    <div class="bl-cell">
      <div class="bl-patch" style="background:rgb(<?php echo $i; ?>,<?php echo $i; ?>,<?php echo $i; ?>);"></div>
      <div class="bl-label"><?php echo $i; ?></div>
    </div>
    <?php endfor; ?>
  </div>
</div>
<style>
  .bl-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .bl-tester *{ box-sizing:border-box; }
  .bl-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .bl-controls { display:flex; gap:10px; justify-content:center; }
  .bl-btn { padding:8px 18px; border-radius:999px; border:1px solid #cbd5e1; background:#fff; font-weight:700; cursor:pointer; }
  .bl-arena { background:#000; padding:20px; border-radius:12px; display:grid; grid-template-columns:repeat(8,1fr); gap:12px; }
  .bl-arena:fullscreen { padding:40px; height:100vh; }
  .bl-cell { display:flex; flex-direction:column; align-items:center; gap:6px; }
  .bl-patch { width:80px; height:80px; border-radius:8px; }
  .bl-label { font-size:0.78rem; color:#94a3b8; font-family:'JetBrains Mono',monospace; }
  @media (max-width:720px) { .bl-arena { grid-template-columns:repeat(4,1fr); } }
</style>
<script>
(function(){
  document.getElementById('bl-fs').addEventListener('click', function(){
    var arena = document.getElementById('bl-arena');
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
})();
</script>
