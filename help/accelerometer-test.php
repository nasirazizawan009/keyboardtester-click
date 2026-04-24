<?php // Help ?>
<section class="guidelines landing-guide" id="guidelines">
  <div class="help-header"><h2>Accelerometer Test Guide</h2><p>How to confirm a phone or tablet motion sensor is reporting correctly.</p></div>
  <div class="help-grid">
    <div class="help-card"><h3>Step 1: grant motion access</h3><ol><li>Open this page on your phone or tablet.</li><li>Tap "Start". On iOS 13 and later, Safari will prompt for motion and orientation access &mdash; you must tap Allow.</li><li>Status should change from "Not started" to "Live - move your device".</li></ol></div>
    <div class="help-card"><h3>Step 2: verify the axes</h3><ol><li>Lay the device flat, screen up, stationary. Z should read about 9.8 m/s² (gravity), X and Y near 0.</li><li>Tilt left: X goes negative. Tilt right: X goes positive.</li><li>Tilt forward (top edge down): Y goes positive. Tilt backward: Y goes negative.</li></ol></div>
    <div class="help-card"><h3>Step 3: shake it</h3><ol><li>Shake the device briskly. The shake counter increments each time linear acceleration exceeds 15 m/s².</li><li>Peak |a| records the highest total acceleration seen this session.</li><li>Rate should stabilise near 30-60 Hz on most phones.</li></ol></div>
    <div class="help-card"><h3>What a broken sensor looks like</h3><ul><li>All zeros even while moving = sensor failed or browser blocked motion access.</li><li>One axis stuck at a fixed value = sensor hardware fault.</li><li>Readings wildly out of range (&gt;100 m/s²) while stationary = calibration or driver issue.</li><li>Auto-rotate not working in other apps is usually a gyroscope issue, not accelerometer &mdash; try the <a href="<?php echo url('gyroscope-test.php'); ?>">Gyroscope Test</a>.</li></ul></div>
  </div>
</section>
