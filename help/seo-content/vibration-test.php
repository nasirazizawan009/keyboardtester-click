<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>Two APIs, One Tool</h2>
      <p>This tool exposes two completely different vibration APIs in one UI. The phone tab uses navigator.vibrate(pattern), which drives the single linear or rotary-mass vibration motor inside a phone using a sequence of on/off durations in milliseconds. The gamepad tab uses the Gamepad API's vibrationActuator.playEffect('dual-rumble', {...}), which drives the two independent motors inside an Xbox-style or PlayStation-style controller. There is no overlap between the two &mdash; a desktop with a connected gamepad will report "Vibration API not supported" for the phone tab but happily rumble the controller, and a phone with no controller connected will do the opposite.</p>
    </article>
    <article class="seo-article">
      <h2>Vibration API (Phone Haptics)</h2>
      <p>navigator.vibrate() takes either a single number (milliseconds to vibrate) or an array alternating vibrate/pause durations. It is supported on Android in Chrome, Firefox, and Samsung Internet, but not on iOS Safari &mdash; Apple has never shipped it, citing privacy (the vibration motor can be used as a fingerprinting vector). On Android, patterns with alternating durations under ~40 ms tend to blur into a single buzz because the motor spin-up time exceeds the pause. For crisp multi-pulse patterns, keep vibrate and pause durations above 50 ms each.</p>
    </article>
    <article class="seo-article">
      <h2>Gamepad Dual-Rumble Explained</h2>
      <p>Xbox and PlayStation controllers have two internal rumble motors with different weights on the shaft. The "strong" motor uses a large eccentric weight and produces low-frequency bass-style rumble &mdash; you feel it in your palms. The "weak" motor uses a smaller weight and produces high-frequency buzz &mdash; you feel it in your fingertips. Games blend the two for cinematic effects: explosions weight heavily toward the strong motor, shotgun reloads toward the weak. This tool lets you test each one independently so you can isolate a failed motor &mdash; a common fault in older Xbox controllers where one of the two solder joints cracks.</p>
    </article>
    <article class="seo-article">
      <h2>Why Some Controllers Show No Rumble Support</h2>
      <p>Chrome and Firefox expose vibrationActuator only on controllers that support the "dual-rumble" effect over their specific HID protocol. Wired Xbox controllers and official DualShock 4/5 controllers usually work out of the box over USB. Bluetooth can be more fragile &mdash; some BT stacks drop the rumble descriptor, in which case the browser reports hapticActuators (the older API) but not vibrationActuator (the newer one). Cheap third-party controllers often report the buttons and axes correctly but have no rumble hardware at all, even if the marketing text claims otherwise.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('gamepad-test.php'); ?>">Gamepad Test (full button/stick/trigger tester)</a></li>
        <li><a href="<?php echo url('accelerometer-test.php'); ?>">Accelerometer Test (phone motion sensor)</a></li>
        <li><a href="<?php echo url('gyroscope-test.php'); ?>">Gyroscope Test (phone rotation sensor)</a></li>
        <li><a href="<?php echo url('mouse-test.php'); ?>">Mouse Test</a></li>
      </ul>
    </article>
  </div>
</section>
