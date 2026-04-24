<?php
$ct_labels = $ct_labels ?? [];
$L = array_merge([
  'aria' => 'Contrast ratio test - checkerboard pattern.',
  'instruction' => 'You should see a perfect checkerboard with crisp boundaries between black and white squares. Squint slightly - the checkerboard average should appear as middle gray (RGB 128). If half-tones look uneven, your contrast is misconfigured.',
  'fullscreen' => 'Fullscreen',
], $ct_labels);
?>
<div class="ct-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="ct-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="ct-controls">
    <button type="button" class="ct-btn" id="ct-fs"><?php echo htmlspecialchars($L['fullscreen'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="ct-arena" id="ct-arena">
    <div class="ct-grid"></div>
    <div class="ct-half" style="background:#808080;"></div>
  </div>
</div>
<style>
  .ct-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .ct-tester *{ box-sizing:border-box; }
  .ct-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .ct-controls { display:flex; gap:10px; justify-content:center; }
  .ct-btn { padding:8px 18px; border-radius:999px; border:1px solid #cbd5e1; background:#fff; font-weight:700; cursor:pointer; }
  .ct-arena { display:grid; grid-template-columns:1fr 1fr; gap:0; height:400px; border-radius:12px; overflow:hidden; border:1px solid #e2e8f0; }
  .ct-arena:fullscreen { height:100vh; border-radius:0; }
  .ct-grid { background:
    repeating-conic-gradient(#000 0% 25%, #fff 25% 50%) 0 0 / 8px 8px;
  }
  .ct-half { /* solid 128 gray for comparison */ }
</style>
<script>
(function(){
  document.getElementById('ct-fs').addEventListener('click', function(){
    var arena = document.getElementById('ct-arena');
    if (document.fullscreenElement) document.exitFullscreen();
    else if (arena.requestFullscreen) arena.requestFullscreen();
  });
})();
</script>
