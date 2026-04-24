<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>Mouse Acceleration Test Guide</h2><p>Find out if your stack is adding acceleration to your mouse movement.</p></div>
    <div class="help-grid">
        <div class="help-card"><h3>How to use</h3><ol><li>Press and hold on the pad.</li><li>Drag slowly from left to right (about 2 seconds).</li><li>Release. Now drag fast (under 0.5 seconds) across the same physical distance.</li><li>Read the fast/slow pixel ratio.</li></ol></div>
        <div class="help-card"><h3>What the ratio means</h3><ul><li><strong>0.95 - 1.05:</strong> no acceleration (perfect).</li><li><strong>1.05 - 1.15:</strong> slight, probably noise.</li><li><strong>1.15+:</strong> clear acceleration — disable it.</li><li><strong>Below 0.95:</strong> deceleration / sensor smoothing.</li></ul></div>
        <div class="help-card"><h3>Disable Windows acceleration</h3><ol><li>Control Panel &gt; Mouse &gt; Pointer Options.</li><li>Uncheck "Enhance pointer precision".</li><li>Set pointer speed to the middle notch (6/11).</li><li>Re-run this test to confirm the ratio dropped.</li></ol></div>
        <div class="help-card"><h3>Why it matters</h3><ul><li>Muscle memory is distance-based — acceleration breaks it by making the same swipe travel different pixels.</li><li>Aim trainers rely on consistent cm/360 — acceleration invalidates that.</li><li>Pros universally disable all acceleration.</li></ul></div>
    </div>
</section>
