<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
  <div class="help-header"><h2>Gyroscope Test Guide</h2><p>How to confirm a phone or tablet orientation sensor is reporting correctly.</p></div>
  <div class="help-grid">
    <div class="help-card"><h3>Step 1: grant orientation access</h3><ol><li>Open this page on your phone or tablet.</li><li>Tap "Start". On iOS 13+ Safari will prompt for Motion & Orientation access &mdash; you must tap Allow.</li><li>Status should change to "Live - tilt your device".</li></ol></div>
    <div class="help-card"><h3>Step 2: learn the three axes</h3><ol><li><strong>Alpha</strong> (0-360°): rotation around the Z axis &mdash; this is your compass heading. Turn the device in a flat spin to watch alpha cycle.</li><li><strong>Beta</strong> (-180 to 180°): front-to-back tilt. 0 = flat, 90 = standing vertically with top edge up.</li><li><strong>Gamma</strong> (-90 to 90°): left-to-right tilt. 0 = flat, ±90 = edge-up landscape.</li></ol></div>
    <div class="help-card"><h3>Step 3: watch the cube</h3><ol><li>The cube should move smoothly as you rotate the device, with no jitter or lag.</li><li>Tap "Calibrate to zero" to snap the current orientation as the new reference point &mdash; useful for measuring relative rotation from a mount or holder.</li></ol></div>
    <div class="help-card"><h3>What a broken gyroscope looks like</h3><ul><li>Cube does not move at all = motion permission denied or sensor disabled.</li><li>Alpha sticks at one value while beta/gamma update = magnetometer failure, not gyroscope itself &mdash; alpha on most devices blends compass and gyro data.</li><li>Sluggish or jerky motion = sensor is fine but the browser is throttling; try closing other tabs.</li></ul></div>
  </div>
</section>
