<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>How The Hearing Age Test Works</h2>
      <p>This tool generates pure sine tones using the Web Audio API at 12 carefully chosen frequencies between 8 kHz and 22 kHz: 8, 10, 12, 14, 15, 16, 17, 17.4, 18, 19, 20, and 22 kHz. The 17.4 kHz step is the famous "mosquito tone" &mdash; originally used in the Mosquito anti-loitering device because most adults over 25 cannot hear it but teenagers can. For each frequency, a 2-second tone plays with a 50 ms fade-in and fade-out (to avoid the audible click that abrupt sine starts produce). You answer "I can hear it" or "I can't hear it" for each step, and the lowest frequency where you mark "can't hear" maps to a rough hearing-age bucket based on average presbycusis curves.</p>
    </article>
    <article class="seo-article">
      <h2>The Mosquito Tone Explained</h2>
      <p>The mosquito tone sits at 17,400 Hz. It got its name from the Mosquito device, a small loudspeaker installed in storefronts and parks in the UK from 2005 onward to discourage teenagers from loitering &mdash; the noise was painful to under-25s but inaudible to most adults. The reason it works as an age test is presbycusis: the cochlea's outer hair cells, which detect high frequencies, are the first to die from a lifetime of metabolic wear, ear infections, loud music, and ototoxic medications. By 25, most people have lost some sensitivity above 16 kHz; by 50, most can't hear above 14 kHz. If you can hear the 17.4 kHz tone clearly through quality headphones at moderate volume, your high-frequency hearing is younger than the average 25-year-old's.</p>
    </article>
    <article class="seo-article">
      <h2>Hearing Age vs Real Hearing Loss</h2>
      <p>Failing to hear 17.4 kHz at age 35 is normal. Failing to hear 8 kHz at age 35 is not, and warrants an audiologist visit. The hearing-age test is a fun screening &mdash; not a diagnostic. A clinical audiogram tests pure-tone thresholds at calibrated sound-pressure levels in a sound-treated booth, across speech frequencies (250 Hz to 8 kHz) where word intelligibility lives. This online test is biased toward extended-high frequencies that don't matter for understanding speech. Use it as a curiosity check, share the result, but don't panic if your "hearing age" reads older than your real age. Conversely, don't use a "young" result here as proof your hearing is fine &mdash; speech-frequency damage is invisible to a 17 kHz test.</p>
    </article>
    <article class="seo-article">
      <h2>Why Your Speakers Probably Lie</h2>
      <p>Most laptop speakers, phone speakers, and cheap Bluetooth earbuds roll off sharply above 14-16 kHz. The driver is too small, the enclosure too closed, the codec too aggressive at the top end. If you run this test on your laptop and "can't hear" anything above 14 kHz, you have just measured the laptop speaker, not your ears. The same is true of any audio test &mdash; checked our <a href="<?php echo url('frequency-response-test.php'); ?>">frequency response test</a> for the full 20 Hz to 20 kHz sweep including the bass end. For honest hearing-age results, use wired over-ear headphones or wired earbuds with a published flat response, in a quiet room, at low volume. Bluetooth adds another layer of unpredictability because SBC and AAC codecs apply low-pass filters above 16-20 kHz to save bandwidth.</p>
    </article>
    <article class="seo-article">
      <h2>How To Get The Most Accurate Result</h2>
      <p>Quiet room, wired headphones, low-to-moderate volume. Test in the morning when you are rested &mdash; tinnitus and temporary threshold shift from a noisy day will pull your result toward "older." If you have wax buildup, clear it first; impacted cerumen attenuates exactly the high frequencies this test relies on. Run the test twice, a few minutes apart, and compare &mdash; you should land in the same bucket both times. If results swing wildly, ambient noise is masking the tones. The manual slider in the lower section of the tool lets you slide between 8 kHz and 22 kHz to find your exact upper threshold; that result is more precise than the 12-step screening because it doesn't quantize you into buckets.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('frequency-response-test.php'); ?>">Frequency Response Test (full 20 Hz to 20 kHz sweep)</a></li>
        <li><a href="<?php echo url('auditory-reaction-time-test.php'); ?>">Auditory Reaction Time Test</a></li>
        <li><a href="<?php echo url('decibel-meter.php'); ?>">Decibel Meter</a></li>
        <li><a href="<?php echo url('headphone_speaker_tester_index.php'); ?>">Headphone &amp; Speaker Tester</a></li>
      </ul>
    </article>
  </div>
</section>
