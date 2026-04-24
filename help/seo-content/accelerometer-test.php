<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What The Accelerometer Test Measures</h2>
      <p>This tool reads the accelerometer in your phone or tablet using the browser's DeviceMotionEvent API. The sensor reports proper acceleration along three orthogonal axes (X, Y, Z) in metres per second squared. "Acceleration including gravity" is what you see in the main readout: when the device is stationary and flat, the Z axis reads about 9.81 m/s² because gravity is pulling the sensor's proof mass downward, and the sensor interprets that as an upward acceleration of 1 g. The "shake count" uses linear acceleration (gravity removed), which is why putting the device on a desk does not trigger shakes.</p>
    </article>
    <article class="seo-article">
      <h2>How To Tell If The Sensor Is Broken</h2>
      <p>A healthy accelerometer, laid flat screen-up, reads approximately X ≈ 0, Y ≈ 0, Z ≈ +9.8 m/s². Tilting the device shifts gravity between axes in a smooth, continuous way. Fault patterns: all axes reading zero while the device is clearly moving usually means the browser did not get motion permission (iOS requires a user-initiated tap), or the hardware has failed. One axis permanently pinned to a fixed non-zero value regardless of orientation is a hardware fault. Values jumping to &gt;100 m/s² while the device sits still indicate sensor noise beyond normal (typical noise is under 0.3 m/s² for a good IMU). If auto-rotate does not work in other apps but the accelerometer reads fine here, the problem is in the OS or the gyroscope, not the accelerometer.</p>
    </article>
    <article class="seo-article">
      <h2>iOS Motion Permission</h2>
      <p>Starting with iOS 13, Safari gates DeviceMotionEvent behind an explicit user grant. A webpage cannot sniff motion data without the user tapping a button that calls DeviceMotionEvent.requestPermission() &mdash; this tool's "Start" button does exactly that. If you tap Start and nothing happens, check Settings → Safari → Motion & Orientation Access, or try a different browser. Android does not require this permission dance on most devices; Chrome and Samsung Internet expose motion events immediately once the user interacts with the page.</p>
    </article>
    <article class="seo-article">
      <h2>Why It Only Works On Mobile</h2>
      <p>Desktop computers and most laptops have no accelerometer. A few convertible laptops do (for auto-rotate in tablet mode), and Chrome will expose their data, but the readings tend to be noisier and the sample rate lower because the sensor is designed for coarse orientation detection, not fine motion tracking. For a real test, use a phone or tablet from the last 10 years &mdash; every one of them has a 3-axis IMU capable of at least 30 Hz sampling.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('gyroscope-test.php'); ?>">Gyroscope Test (rotation rate check)</a></li>
        <li><a href="<?php echo url('vibration-test.php'); ?>">Vibration Test (phone vibration API + gamepad rumble)</a></li>
        <li><a href="<?php echo url('touch-screen-test.php'); ?>">Touch Screen Test</a></li>
        <li><a href="<?php echo url('gamepad-test.php'); ?>">Gamepad Test</a></li>
      </ul>
    </article>
  </div>
</section>
