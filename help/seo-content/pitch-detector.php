<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>How The Online Pitch Detector Works</h2>
      <p>The detector taps your microphone via <code>getUserMedia</code>, feeds the raw audio into a Web Audio AnalyserNode, and runs a real-time autocorrelation algorithm on each 4096-sample buffer. Autocorrelation finds the period of the signal by comparing the waveform against shifted copies of itself &mdash; the lag at which the signal best matches itself is the fundamental period, and the inverse of that period (sample rate divided by lag, with parabolic interpolation for sub-sample precision) is the fundamental frequency in Hz. The frequency then maps to the nearest MIDI note via <em>n = 69 + 12&nbsp;&middot;&nbsp;log<sub>2</sub>(freq / 440)</em>, and the difference from the integer note is converted to cents using <em>1200&nbsp;&middot;&nbsp;log<sub>2</sub>(detected / expected)</em>. Everything runs in the browser &mdash; no audio is uploaded.</p>
    </article>
    <article class="seo-article">
      <h2>What "Cents" Means For Singers And Tuning</h2>
      <p>One semitone is divided into 100 cents. A reading of <strong>+10 cents</strong> means you are 10% of the way to the next higher semitone &mdash; about the smallest deviation an untrained ear can hear in isolation. Professional singers and string players aim for under &plusmn;5 cents on sustained notes; choirs and ensembles often allow &plusmn;10-15 cents for stylistic warmth. Once you are past &plusmn;30 cents, listeners start to perceive the note as definitively flat or sharp. This pitch detector reports cents continuously so you can watch yourself drift in real time and correct your placement &mdash; far more useful than a tuner that only flashes red or green.</p>
    </article>
    <article class="seo-article">
      <h2>Why Pitch Detection Sometimes Jumps An Octave</h2>
      <p>Autocorrelation is robust but not perfect. Low-fundamental voices and instruments (bass voice, kick drum, tuba) often have a stronger second harmonic than fundamental, and the algorithm can briefly latch onto the harmonic instead, doubling the reported frequency. Two cures help: (1) sing or play more loudly so the fundamental dominates, and (2) move the mic closer (15-30&nbsp;cm) to capture more low-end energy. Conversely, very breathy or whistled tones can confuse the algorithm in the opposite direction. If readings are unstable, try a more sustained vowel like "ah" with steady airflow.</p>
    </article>
    <article class="seo-article">
      <h2>Calibrating Your Microphone For Pitch Work</h2>
      <p>Pitch detection cares about <em>timing</em>, not absolute level, so a cheap headset mic or laptop mic is fine. What does matter is the input gain &mdash; too low and the signal sits below the noise threshold; too high and clipping distorts the waveform and breaks autocorrelation. Open your operating system sound panel and aim for peak levels around -6&nbsp;dBFS while singing your loudest expected note. If you are not sure how loud your input signal is, run our <a href="<?php echo url('decibel-meter.php'); ?>">decibel meter</a> first. To verify the mic itself works, the <a href="<?php echo url('mic-tester.php'); ?>">microphone tester</a> shows a live waveform and peak meter.</p>
    </article>
    <article class="seo-article">
      <h2>Pairing Pitch Detection With Frequency And Hardware Tests</h2>
      <p>Pitch is just one slice of the audio picture. If a singer or instrument sounds dull on playback even though pitch is correct, the chain probably has a frequency response problem &mdash; cheap earbuds and laptop speakers roll off below 100&nbsp;Hz and above 12&nbsp;kHz, hiding harmonics that give a voice its character. Run the <a href="<?php echo url('frequency-response-test.php'); ?>">frequency response test</a> to map your output device. For balance and stereo placement of vocal recordings, the <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">headphone and speaker tester</a> covers left/right, sub, and surround channels. Together these tools cover input pitch, input level, output frequency, and output positioning &mdash; the full audio loop.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('decibel-meter.php'); ?>">Decibel Meter (live dB SPL)</a></li>
        <li><a href="<?php echo url('frequency-response-test.php'); ?>">Frequency Response Test</a></li>
        <li><a href="<?php echo url('mic-tester.php'); ?>">Microphone Tester</a></li>
        <li><a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">Headphone &amp; Speaker Tester</a></li>
      </ul>
    </article>
  </div>
</section>
