<?php
$br_labels = $br_labels ?? [];
$L = array_merge([
  'aria' => 'Brightness calibration test - 11 step gradient.',
  'instruction' => 'You should see 11 distinct brightness steps from pure black on the left to pure white on the right. Each step should be visibly different from its neighbors. If steps in the middle look the same, your brightness or contrast is misconfigured.',
  'fullscreen' => 'Fullscreen',
], $br_labels);
?>
<div class="br-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="br-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="br-controls">
    <button type="button" class="br-btn" id="br-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="br-arena" id="br-arena">
    <?php for ($i = 0; $i <= 10; $i++): $v = round($i * 25.5); ?>
    <div class="br-cell" style="background:rgb(<?php echo $v; ?>,<?php echo $v; ?>,<?php echo $v; ?>);">
      <span class="br-label"><?php echo ($i * 10); ?>%</span>
    </div>
    <?php endfor; ?>
  </div>
</div>
<style>
  .br-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .br-tester *{ box-sizing:border-box; }
  .br-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .br-controls { display:flex; gap:10px; justify-content:center; }
  .br-btn { padding:8px 18px; border-radius:999px; border:1px solid #cbd5e1; background:#fff; font-weight:700; cursor:pointer; }
  .br-arena { display:grid; grid-template-columns:repeat(11,1fr); gap:0; height:300px; border-radius:12px; overflow:hidden; border:1px solid #e2e8f0; }
  .br-arena:fullscreen { height:100vh; border-radius:0; }
  .br-cell { display:flex; align-items:flex-end; justify-content:center; padding-bottom:10px; }
  .br-label { font-size:0.78rem; color:#888; font-family:'JetBrains Mono',monospace; mix-blend-mode:difference; color:#fff; }
  @media (max-width:720px) { .br-arena { height:200px; } .br-label { font-size:0.65rem; } }
</style>
<script>
(function(){
  document.getElementById('br-fs').addEventListener('click', function(){
    var arena = document.getElementById('br-arena');
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
})();
</script>
