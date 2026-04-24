<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>Color Range Test Guide</h2><p>Confirm your RGB signal is Full (0-255), not Limited (16-235).</p></div>
    <div class="help-grid">
        <div class="help-card"><h3>How to use</h3><ol><li>Click Fullscreen to remove browser UI.</li><li>Look at the near-black row (top): every patch should appear slightly different from its neighbor.</li><li>Look at the near-white row (middle): same check.</li><li>The bottom ramp should be smooth, no banding.</li></ol></div>
        <div class="help-card"><h3>What "Limited" looks like</h3><ul><li>The first 16 near-black patches all look pure black — no variation.</li><li>The last ~20 near-white patches all look pure white — clipped.</li><li>The mid-gray ramp has a visible step near both ends.</li></ul></div>
        <div class="help-card"><h3>Fix on PC (NVIDIA)</h3><ol><li>Right-click desktop → NVIDIA Control Panel.</li><li>Display → Change Resolution → "Use NVIDIA color settings".</li><li>Output dynamic range → <strong>Full</strong>.</li><li>Apply + re-test.</li></ol></div>
        <div class="help-card"><h3>Fix on PC (AMD)</h3><ol><li>Radeon Settings → Display tab.</li><li>Pixel Format / Color Range → <strong>Full</strong>.</li><li>Apply.</li></ol></div>
    </div>
</section>
