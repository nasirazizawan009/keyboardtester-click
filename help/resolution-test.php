<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>Resolution Test Guide</h2><p>What every number on the page actually means.</p></div>
    <div class="help-grid">
        <div class="help-card"><h3>Native resolution</h3><ul><li>The physical pixel count of your display.</li><li>Computed as CSS screen × device pixel ratio.</li><li>Example: 1920×1080 screen × 1.5 DPR = 2880×1620 native.</li></ul></div>
        <div class="help-card"><h3>Device pixel ratio (DPR)</h3><ul><li>How many physical pixels fit into one CSS pixel.</li><li>1.0 = standard. 2.0 = Retina / HiDPI.</li><li>Changes with browser zoom and OS scaling.</li></ul></div>
        <div class="help-card"><h3>Color depth / gamut</h3><ul><li>Color depth: bits per pixel (24 = 16.7M colors, 30 = 1B+).</li><li>Gamut: sRGB (basic), DCI-P3 (wide), Rec. 2020 (UHD).</li><li>Most modern phones and laptops support P3.</li></ul></div>
        <div class="help-card"><h3>Tips</h3><ul><li>Numbers below your monitor's spec? Check OS scaling.</li><li>Resize window to see viewport update live.</li><li>Private-mode browsers may round values for anti-fingerprinting.</li></ul></div>
    </div>
</section>
