<?php // keyboard double click test help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>Keyboard Chatter Detection Guide</h2><p>Find keys on your keyboard that double-register from a single press.</p></div>
    <div class="help-grid">
        <div class="help-card"><h3>Run the chatter test</h3><ol><li>Press Start Listening.</li><li>Press each key ONCE, slowly.</li><li>Rows marked CHATTER are double-registering.</li></ol></div>
        <div class="help-card"><h3>Choose a threshold</h3><ul><li>30ms for severe chatter only.</li><li>50ms standard (default).</li><li>80ms to catch borderline cases.</li></ul></div>
        <div class="help-card"><h3>Fix confirmed chatter</h3><ul><li>Software: KeyboardChatteringFix (Windows).</li><li>Firmware: increase DEBOUNCE in QMK.</li><li>Hardware: DeoxIT D5 or switch replacement.</li></ul></div>
        <div class="help-card"><h3>What this doesn't detect</h3><ul><li>Ghosting (keys that disappear during multi-press) — use the ghosting test.</li><li>Stuck keys — use the stuck key test.</li><li>OS key repeat is filtered out automatically.</li></ul></div>
    </div>
</section>
