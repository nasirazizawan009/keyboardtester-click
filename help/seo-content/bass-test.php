<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What The Bass Test Does</h2>
      <p>This tool generates pure sine-wave tones between 20 Hz and 200 Hz using the Web Audio API, live in your browser. No downloads, no uploads, no tracking. You choose the mode (sweep, step, or hold), the channel (left / right / both mono), and the volume. Every sample is synthesised on your device so the tone you hear is exactly the frequency shown on screen &mdash; there is no compression, no mastering, nothing between the number and the driver.</p>
    </article>
    <article class="seo-article">
      <h2>Sub-Bass vs. Bass: Why The Split Matters</h2>
      <p>Audio engineers split the low end into two bands because the physical requirements are different. <strong>Sub-bass (20-40 Hz)</strong> is frequency you feel more than hear &mdash; it needs a real subwoofer or a full-range studio monitor to reproduce. Most laptops, earbuds, and bookshelf speakers simply cannot move enough air to reach below 40 Hz, and that is not a defect. <strong>Mid-bass (40-120 Hz)</strong> is where the kick drum, bass guitar, and male vocal fundamentals live; most over-ear headphones and decent speakers handle this cleanly. <strong>Upper bass (120-200 Hz)</strong> starts to blend into the lower midrange and is easy for almost any speaker. The sweep moves through all three bands so you hear exactly where your setup starts to roll off.</p>
    </article>
    <article class="seo-article">
      <h2>Why Sine Tones, Not Bass Music</h2>
      <p>Music is a complex mix of frequencies, so if the bass sounds "off" you cannot tell which frequency is wrong. A pure sine is one frequency with no harmonics &mdash; if the 40 Hz tone buzzes but 60 Hz is clean, you know the problem is between 30 and 50 Hz. Sine sweeps are also how speaker manufacturers publish frequency-response graphs, so the results here are directly comparable to the spec sheet that came with your speaker or headphone.</p>
    </article>
    <article class="seo-article">
      <h2>Safety Note</h2>
      <p>Low-frequency sine waves demand a lot of cone excursion. Small drivers hit their mechanical limit quickly, and past that limit they can physically bottom out, distort, or (at high enough volume) tear the voice coil. Start at 20-30% volume. If you hear distortion, cone clack, or a sudden hiss, turn down &mdash; do not turn up. Sub-bass also causes vibration that can damage loose objects on your desk or shelf.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('sound-test.php'); ?>">Sound Test (100 Hz - 10 kHz full-range sweep)</a></li>
        <li><a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">Headphone & Speaker Tester (hub)</a></li>
        <li><a href="<?php echo url('decibel-meter.php'); ?>">Decibel Meter (measure your actual SPL)</a></li>
        <li><a href="<?php echo url('left-right-speaker-test.php'); ?>">Left-Right Speaker Test</a></li>
        <li><a href="<?php echo url('stereo-test.php'); ?>">Stereo Test</a></li>
      </ul>
    </article>
  </div>
</section>
