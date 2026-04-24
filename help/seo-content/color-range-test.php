<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>Limited Range vs Full Range: What Actually Happens</h2>
      <p>A digital RGB pixel has 256 possible values per channel (0-255). "Full range" uses all of them. "Limited range" (also called Video range, TV range, or 16-235) reserves 0-15 for blacker-than-black and 236-255 for whiter-than-white, leaving only 16-235 for actual image data. TVs and Blu-rays use limited range because old analog broadcast standards did. PCs use full range because software assumes every pixel value is meaningful.</p>
      <p>When PC content is <em>displayed</em> in limited range, values 0-15 all clip to pure black and 236-255 all clip to pure white. Near-black and near-white details vanish.</p>
    </article>
    <article class="seo-article">
      <h2>Why This Happens Over HDMI</h2>
      <p>HDMI was designed for TVs, so the handshake often defaults to limited range, even between a PC and a PC monitor. Windows and the graphics driver will comply without warning. The symptoms are always the same: black shadows that should have detail look flat pitch-black; white highlights blow out. Gamers notice it first in dark scenes where they can't see enemies in shadow.</p>
    </article>
    <article class="seo-article">
      <h2>What This Test Shows</h2>
      <p>Two rows of 32 patches each. The first row steps from RGB 0 to RGB 31 — the near-black range. On a correctly configured full-range display, all 32 patches are visually distinguishable: darker on the left, gradually lighter. On a limited-range setup, the first 16 patches (RGB 0-15) all clip to pure black and look identical. The second row does the same at the highlight end (RGB 224-255) — limited range crushes the last ~20 patches into pure white.</p>
    </article>
    <article class="seo-article">
      <h2>Fixing The Range</h2>
      <p>On the GPU side: NVIDIA Control Panel → Resolution → "Output dynamic range: Full", or AMD Radeon Software → Display → "Color Range: Full". On the TV / monitor side: look for "HDMI Black Level" (Sony), "Input Level" (LG), "RGB Range" (Samsung), or "Black Level" (Xbox Series / PS5) and set to Full / Normal / PC. Mismatches cause crushed blacks OR washed-out whites depending on which side is wrong.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('black-level-test.php'); ?>">Black Level Test</a></li>
        <li><a href="<?php echo url('white-level-test.php'); ?>">White Level Test</a></li>
        <li><a href="<?php echo url('monitor-gamma-test.php'); ?>">Monitor Gamma Test</a></li>
      </ul>
    </article>
  </div>
</section>
