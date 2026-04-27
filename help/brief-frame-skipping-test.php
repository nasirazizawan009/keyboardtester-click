<section class="landing-hero">
  <div class="container landing-hero-grid">
    <div class="hero-copy">
      <p class="hero-kicker">Display diagnostic</p>
      <h1 class="hero-title">Free Frame Skipping Test - Detects Dropped Frames at Your Refresh Rate</h1>
      <p class="hero-lede">Is your browser hitching, stuttering, or dropping frames even though your FPS looks fine? This test uses <code>requestAnimationFrame</code> timestamp analysis to detect any frame whose delta exceeds your expected refresh interval by 1.5&times;. It calibrates to your actual display Hz in the first second, then counts skipped frames, logs each stutter event, and shows a moving bar for visual confirmation.</p>
      <div class="hero-actions">
        <a class="landing-btn landing-btn-primary" href="#frame-skipping-test">Start test</a>
        <a class="landing-btn landing-btn-ghost" href="#tools">Browse all tools</a>
      </div>
      <div class="hero-badges">
        <span class="hero-badge">Auto-calibrates Hz</span>
        <span class="hero-badge">Per-frame delta log</span>
        <span class="hero-badge">Jitter / stddev</span>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-shot">
        <img src="<?php echo url('images/frame-skipping-test/hero.jpg'); ?>" width="1200" height="800" alt="Frame skipping test - dual gaming monitors with blue lighting" loading="eager" decoding="async" fetchpriority="high">
      </div>
    </div>
  </div>
</section>
