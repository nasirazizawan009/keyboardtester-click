<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
  <div class="help-header"><h2>Vibration Test Guide</h2><p>How to test phone haptics and gamepad rumble independently.</p></div>
  <div class="help-grid">
    <div class="help-card"><h3>Phone vibration</h3><ol><li>Open this page on an Android phone in Chrome or Firefox. iOS Safari does not expose the Vibration API &mdash; the tab will show a warning.</li><li>Tap any preset (short pulse, SOS, heartbeat). The phone should vibrate in the indicated pattern.</li><li>For a custom pattern, enter comma-separated milliseconds: vibrate, pause, vibrate, pause. Example: 200,100,400 = vibrate 200 ms, pause 100 ms, vibrate 400 ms.</li></ol></div>
    <div class="help-card"><h3>Gamepad rumble</h3><ol><li>Connect an Xbox, PlayStation, or generic USB/Bluetooth controller.</li><li>Press any button so the browser registers it (Gamepad API requires interaction).</li><li>Click the controller in the list to select it. Set weak and strong motor sliders, and press "Test rumble".</li><li>If your controller has no rumble (cheap knockoffs, some Bluetooth adapters), the "Rumble" flag will show ✗.</li></ol></div>
    <div class="help-card"><h3>Weak vs. strong motor</h3><ol><li>Xbox and PS controllers have two rumble motors: a strong low-frequency one (bass-rumble) and a weak high-frequency one (buzz).</li><li>Strong motor alone = bass, chunky vibration.</li><li>Weak motor alone = high-pitched buzz.</li><li>Both at 100% = full rumble.</li></ol></div>
    <div class="help-card"><h3>What a faulty motor looks like</h3><ul><li>No vibration at 100% on either motor = motor unplugged internally or broken.</li><li>Only one motor responds = one wire or driver has failed &mdash; common in aging Xbox controllers.</li><li>Weak/distant vibration even at 100% = battery is very low or motor shaft worn out.</li><li>Clicking or rattling sound during rumble = motor weight has come loose, needs repair.</li></ul></div>
  </div>
</section>
