<section class="seo-content" id="seo-content">
  <div class="container">
    <article class="seo-article">
      <h2>What This FPS Test Measures</h2>
      <p>This tool uses the browser's <code>requestAnimationFrame</code> callback, which fires once per display refresh. By measuring the time between consecutive callbacks we derive the frames-per-second rate the browser is actually achieving on your device. The result is capped by two things: your monitor's refresh rate (since rAF can't fire faster than the display can update) and any throttling your browser applies (background tabs, power saving, GPU pressure).</p>
    </article>
    <article class="seo-article">
      <h2>Current, Average, Min, Max — And 1% Low</h2>
      <p>Raw FPS numbers fluctuate frame-to-frame, so the meaningful metrics are the averages across a sustained run. "Average" is the smoothed mean of every half-second of rendering. "1% low" is the slowest 1% of frames — this is the number that actually feels like stuttering when gaming or scrolling. A perfect 60 Hz setup shows 60 average / 60 min / 60 max / 60 1%-low. A stuttery setup might show 60 average but 38 for 1%-low, which will feel choppy even though the average is high.</p>
    </article>
    <article class="seo-article">
      <h2>Detecting Your Monitor Refresh Rate</h2>
      <p>The max FPS over a sustained run is effectively your display refresh rate (as the browser sees it). Common values:</p>
      <ul>
        <li><strong>~60 Hz:</strong> standard office monitor, most budget laptops.</li>
        <li><strong>~75 Hz:</strong> entry-level gaming monitors.</li>
        <li><strong>~120-144 Hz:</strong> mid-range gaming monitors.</li>
        <li><strong>~165 Hz:</strong> common premium gaming.</li>
        <li><strong>~240 Hz:</strong> high-end competitive gaming.</li>
      </ul>
      <p>If you expected 144 Hz and see 60 Hz, check Windows Display Settings → Advanced → Refresh rate, and make sure your monitor is plugged into a DisplayPort or HDMI 2.0+ cable with enough bandwidth.</p>
    </article>
    <article class="seo-article">
      <h2>Why Browsers Throttle Background Tabs</h2>
      <p>Chrome, Firefox, and Edge all throttle background tabs to save battery and CPU. A tab not in the foreground typically drops to 1 Hz (one frame per second) or suspends rendering entirely. For an accurate reading, keep this tab focused and your browser window in the foreground. Also close other heavy tabs — if another tab is doing GPU work it can steal frames from this one.</p>
    </article>
    <article class="seo-article">
      <h2>Related Tools</h2>
      <ul>
        <li><a href="<?php echo url('refresh-rate-test.php'); ?>">Refresh Rate Test</a></li>
        <li><a href="<?php echo url('monitor-ghosting-test.php'); ?>">Monitor Ghosting Test</a></li>
        <li><a href="<?php echo url('latency-checker.php'); ?>">Latency Checker</a></li>
      </ul>
    </article>
  </div>
</section>
