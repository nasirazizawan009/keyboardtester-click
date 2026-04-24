<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What This Tool Actually Reads</h2>
      <p>Modern browsers expose every relevant display property through the <code>screen</code> object and the <code>window.devicePixelRatio</code> property. This tool reads all of them and formats the results: CSS screen resolution, physical pixel resolution (CSS × DPR), browser viewport dimensions, device pixel ratio, color depth, advertised color gamut, orientation, aspect ratio, and available screen size. Everything runs in JavaScript on your machine — nothing is uploaded.</p>
    </article>
    <article class="seo-article">
      <h2>CSS Pixels vs Physical Pixels</h2>
      <p>The big source of confusion: when your phone says "1080 × 2400" physical, the browser reports something smaller like "390 × 844" for <code>screen.width / height</code>. That's because CSS pixels are an abstraction chosen for consistent text size across devices. Multiply by <strong>devicePixelRatio</strong> (typically 2-3 on phones, 1-2 on desktops) to get the real pixel count. This tool does the multiplication for you.</p>
    </article>
    <article class="seo-article">
      <h2>Color Gamut Detection</h2>
      <p>The <code>color-gamut</code> CSS media query exposes which color gamut the OS and browser advertise. <strong>sRGB</strong> is the baseline — every display. <strong>DCI-P3</strong> is wide-gamut, covering most modern phones, MacBooks, and premium monitors. <strong>Rec. 2020</strong> is the UHD standard — rarely matched fully by consumer hardware. If you're doing color-critical work, this tells you whether the browser will render P3 images at full fidelity or remap to sRGB.</p>
    </article>
    <article class="seo-article">
      <h2>Why The Numbers Might Disagree With Specs</h2>
      <p>Windows DPI scaling (125%, 150%, 175%) reduces the reported CSS resolution — a 4K display at 150% scale reports as 2560 × 1440. macOS HiDPI similarly reports half-size logical resolutions. Browser zoom changes DPR at non-100% settings. Private or strict-privacy modes (Firefox, Brave) sometimes round values for anti-fingerprinting. If your numbers don't match the sticker on the monitor, check OS scale first.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('ppi-calculator.php'); ?>">PPI Calculator</a></li>
        <li><a href="<?php echo url('refresh-rate-test.php'); ?>">Refresh Rate Test</a></li>
        <li><a href="<?php echo url('color-test.php'); ?>">Color Test</a></li>
      </ul>
    </article>
  </div>
</section>
