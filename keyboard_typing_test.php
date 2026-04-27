<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Open Source Typing Speed Test Online — WPM Test | KeyboardTester.click';
$pageDescription = 'Free open source typing speed test online. Measure your WPM, accuracy, and consistency. Start instantly and track improvement across multiple timed sessions. No download needed.';
$pageKeywords = 'typing speed test, open source typing test, wpm test, online typing test, typing accuracy';
$pageOgImage = 'images/typing-test/hero.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('typing_speed', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Typing Speed Test', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-keyboard-typing-test.php'; ?>

    <section class="tool-stage" id="typing-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Typing Speed Test</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="keyboard-typing-test" class="tool-shell">
        <?php include 'tools/keyboard_typing_test_tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Live feedback</div>
          <div class="trust-desc">See results instantly</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Quick reset</div>
          <div class="trust-desc">Run another test fast</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Focused checks</div>
          <div class="trust-desc">Built for typing speed</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Typing Speed and Accuracy</p>
          <h2 id="feature-title">Measure WPM, Accuracy, and Typing Rhythm</h2>
          <p class="section-lede">Practice with a browser-based typing test and see speed and accuracy update as you type.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track typing speed with live updates.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Instant results</h3>
            <p>See changes as you test in real time.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Simple controls</h3>
            <p>Start, stop, and reset in seconds.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Repeatable tests</h3>
            <p>Compare multiple runs quickly.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Run a Typing Speed Test</h2>
          </div>
          <p class="section-lede">Start the timer, type the prompt, and review your WPM and accuracy at the end.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/typing-test/step-1.png'); ?>" alt="Typing speed test step 1 - start WPM measurement" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/typing-test/step-2.png'); ?>" alt="Typing test step 2 - type the text to measure speed" loading="lazy" width="600" height="423" decoding="async">
            </div>
            <div class="step-number">02</div>
            <h3>Type the prompt</h3>
            <p>until the timer ends.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/typing-test/step-3.png'); ?>" alt="Typing speed results - WPM score and accuracy display" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your typing speed stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Cross-link block — diverse anchor text for related keyboard tests -->
    <section class="related-keyboard-tests-tt" style="padding:48px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;">
        <h2 style="font-size:1.5rem;margin-bottom:16px;">More keyboard diagnostics</h2>
        <p style="color:var(--text-secondary);margin-bottom:24px;">Already checked your typing speed? Test the underlying hardware too — keys that drop, lag, or ghost will silently lower your WPM:</p>
        <ul style="list-style:none;padding:0;margin:0;display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:12px;">
          <li><a href="<?php echo url('tools/keyboard-tester/'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Online keyboard tester</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— check every key registers correctly</span></li>
          <li><a href="<?php echo url('keyboard-ghosting-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Anti-ghosting test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— verify multi-key combos work</span></li>
          <li><a href="<?php echo url('n-key-rollover-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">NKRO checker</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— max simultaneous keys</span></li>
          <li><a href="<?php echo url('latency-checker.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Key press delay test</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— input lag in milliseconds</span></li>
          <li><a href="<?php echo url('stuck-key-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Repeating key diagnostic</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— find stuck or jammed keys</span></li>
          <li><a href="<?php echo url('typing-rhythm-test.php'); ?>" style="color:var(--accent-primary);text-decoration:none;font-weight:500;">Typing rhythm fingerprint</a> <span style="color:var(--text-secondary);font-size:0.9rem;">— bigram heatmap and consistency</span></li>
        </ul>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/keyboard-typing-test.php'; ?>
    <?php $toolBlogSlug = 'keyboard-shortcuts-windows-mac-linux-complete-cheat-sheet.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
