<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
    <div class="help-header"><h2>Keyboard Polling Rate Test Guide</h2><p>Measure how often your keyboard reports state to the OS using auto-repeat sampling.</p></div>
    <div class="help-grid">
        <div class="help-card"><h3>Run the test</h3><ol><li>Click the arena to focus it.</li><li>Press and HOLD any key for 3+ seconds.</li><li>Read avg interval and estimated rate.</li></ol></div>
        <div class="help-card"><h3>What rates mean</h3><ul><li>30Hz typical (OS auto-repeat default).</li><li>Below 25Hz: OS slow setting or keyboard issue.</li><li>Above 35Hz rare in browser context.</li></ul></div>
        <div class="help-card"><h3>Limitations</h3><ul><li>OS throttles browser key events to auto-repeat rate.</li><li>True USB polling needs hardware tools.</li><li>This is comparative between keyboards on same OS.</li></ul></div>
        <div class="help-card"><h3>Better alternatives</h3><ul><li>Mouse polling test gives true Hz (no throttling).</li><li>Latency checker measures end-to-end delay.</li><li>Vendor software (Razer, Corsair) shows native polling.</li></ul></div>
    </div>
</section>
