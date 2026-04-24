<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What The Gyroscope Test Measures</h2>
      <p>The browser's DeviceOrientationEvent exposes three rotation values &mdash; alpha, beta, gamma &mdash; derived from a fusion of the phone's gyroscope and magnetometer. Alpha is rotation around the vertical (Z) axis and reports your compass heading from 0 to 360 degrees. Beta is front-to-back tilt (-180 to 180°), zero when the device is flat. Gamma is left-to-right tilt (-90 to 90°), zero when the device is flat. When you rotate the device, these numbers update several dozen times per second and the 3D cube on this page mirrors the new orientation in real time.</p>
    </article>
    <article class="seo-article">
      <h2>Gyroscope vs. Accelerometer: What Is The Difference</h2>
      <p>An accelerometer measures linear acceleration &mdash; how fast the device is speeding up or slowing down in a given direction, including the 9.8 m/s² constantly pulling it down. A gyroscope measures angular velocity &mdash; how fast the device is rotating around each axis. Modern phones fuse both sensors (plus the magnetometer) to produce a stable orientation estimate. If you only had an accelerometer, orientation would jitter as you walked; if you only had a gyroscope, it would drift over time. Fusion gives you smooth, drift-free orientation, which is what DeviceOrientationEvent reports. If this test works but the <a href="<?php echo url('accelerometer-test.php'); ?>">Accelerometer Test</a> does not (or vice versa), one of the two sensors has a specific hardware fault.</p>
    </article>
    <article class="seo-article">
      <h2>Why Alpha Might Not Work Everywhere</h2>
      <p>Alpha requires a magnetometer (compass chip) in addition to the gyroscope, because true north must come from somewhere. Some phones, tablets, and most desktops do not have a magnetometer &mdash; on those devices alpha may report 0, drift continuously, or never update. Beta and gamma rely only on the gyroscope plus accelerometer and work on every phone made in the last decade. Strong nearby magnets (laptop lid, magnetic phone mount, speakers) also throw the magnetometer off, making alpha unreliable indoors. Moving the device away from magnets usually restores a sane compass reading within 2-3 seconds.</p>
    </article>
    <article class="seo-article">
      <h2>iOS Orientation Permission</h2>
      <p>Starting with iOS 13, Safari requires an explicit user-initiated grant before DeviceOrientationEvent fires. Our "Start" button calls DeviceOrientationEvent.requestPermission(), which is the only way to ask. If the cube stays still after tapping Start, check Settings → Safari → Motion & Orientation Access is enabled. Private browsing windows on iOS may block the permission dialog entirely &mdash; use a normal Safari window.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('accelerometer-test.php'); ?>">Accelerometer Test (linear motion check)</a></li>
        <li><a href="<?php echo url('vibration-test.php'); ?>">Vibration Test (phone rumble + gamepad rumble)</a></li>
        <li><a href="<?php echo url('touch-screen-test.php'); ?>">Touch Screen Test</a></li>
        <li><a href="<?php echo url('camera-resolution-test.php'); ?>">Camera Resolution Test</a></li>
      </ul>
    </article>
  </div>
</section>
