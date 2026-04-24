<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What the Frequency Response Test Measures</h2>
      <p>This tool generates pure sine tones from 20 Hz (the low edge of human hearing) up to 20 kHz (the high edge) using the Web Audio API. The sweep ramps logarithmically &mdash; the same scale audio engineers use for speaker response graphs &mdash; so equal portions of the readout represent equal ratios of frequency. When you mark the points where you first hear a tone and where it fades back into silence, you are measuring two things at once: the low and high limits of your hearing, and the low and high limits of whatever speaker, headphone, or earbud is playing it back. Whichever limit is tighter wins.</p>
    </article>
    <article class="seo-article">
      <h2>How Human Hearing Changes With Age</h2>
      <p>A healthy ear at 20 years old hears up to roughly 18-20 kHz. That ceiling drops by about 2 kHz per decade of life in a process called presbycusis &mdash; gradual, natural high-frequency loss. A 30-year-old typically hears to ~17 kHz, a 40-year-old to ~15 kHz, a 60-year-old to ~11-12 kHz. Hearing loss at the top of the spectrum is normal and usually does not affect music enjoyment much, because fundamentals of most instruments sit between 80 Hz and 5 kHz. But consistent results below 10 kHz can indicate damage from noise exposure, earbud-at-high-volume habits, or medication, and are worth discussing with an audiologist.</p>
    </article>
    <article class="seo-article">
      <h2>Interpreting Your Low-End Limit</h2>
      <p>The low-end limit this tool reports is rarely a limit of your ears. Human hearing extends down to 20 Hz in theory, but most playback hardware cannot reproduce frequencies below 60-80 Hz because the drivers are too small to move enough air. If your low-end marker lands at 120 Hz on a laptop speaker, your laptop is rolling off &mdash; not your ears. To measure your true low-end hearing, run the test on over-ear headphones or full-range studio monitors. The <a href="<?php echo url('bass-test.php'); ?>">Bass Test</a> (20-200 Hz only) is a finer tool for verifying what your subwoofer or bass-capable driver actually reproduces.</p>
    </article>
    <article class="seo-article">
      <h2>Why Sine, Not Music</h2>
      <p>Music is a mix of many frequencies at once, so if your system sounds dull you cannot tell which frequencies are weak. A pure sine is one frequency, period &mdash; if 6 kHz plays clearly and 10 kHz is silent, the roll-off is somewhere between 6 and 10 kHz. That is also why speaker and headphone manufacturers publish frequency-response graphs measured with sine sweeps: the results from this test are directly comparable to the graph in your headphone's spec sheet.</p>
    </article>
    <article class="seo-article">
      <h2>Safety Warning</h2>
      <p>High-frequency sine tones above 10 kHz can be damagingly loud without feeling loud &mdash; the outer ear is less sensitive up there, so the sense of "this is too much" arrives after the damage has started. Start the sweep at 20-30% volume. If the tone becomes uncomfortable, stop. Never do this test on speakers with children or pets in the room &mdash; their hearing extends further into the ultrasonic range than yours does, and what sounds like silence to you can be painful to them.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('bass-test.php'); ?>">Bass Test (20-200 Hz low-end sweep)</a></li>
        <li><a href="<?php echo url('sound-test.php'); ?>">Sound Test (mid-range channel verifier)</a></li>
        <li><a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">Headphone & Speaker Tester (hub)</a></li>
        <li><a href="<?php echo url('decibel-meter.php'); ?>">Decibel Meter (measure your actual SPL)</a></li>
      </ul>
    </article>
  </div>
</section>
