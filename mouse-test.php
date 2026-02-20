<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
  <?php include 'includes/head-common.php'; ?>

  <!-- Landing Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('mouse_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Mouse Tester', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mouse-test.php'; ?>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tester</p>
          <h2 id="tool-stage-title">Mouse tester</h2>
          <p class="section-lede">Use the live tool below to validate clicks, scroll, and status.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include 'tools/mouse_click_test.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Button accuracy</div>
          <div class="trust-desc">Left, middle, right click tracking</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Scroll health</div>
          <div class="trust-desc">Wheel direction + count in real time</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instant feedback</div>
          <div class="trust-desc">Live status for every action</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Runs local</div>
          <div class="trust-desc">No downloads or signups</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Mouse diagnostics</p>
          <h2 id="feature-title">Everything you need to verify your mouse</h2>
          <p class="section-lede">Check clicks, scroll, and responsiveness in a single focused panel.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Button testing</h3>
            <p>Track left, middle, and right clicks with precise counters.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Scroll diagnostics</h3>
            <p>Verify scroll wheel input and direction instantly.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Status display</h3>
            <p>See live pressed/released states for each input.</p>
          </article>
          <article class="landing-feature-card">
            <h3>One-click reset</h3>
            <p>Clear counts and start over with a single action.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">Three steps to test your mouse</h2>
          </div>
          <p class="section-lede">Run a full check in under a minute and confirm every input.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-1.svg'); ?>" alt="Mouse tester interface showing live click tracking" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Click to begin</h3>
            <p>Use left, middle, and right clicks to verify response.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-2.svg'); ?>" alt="Mouse scroll wheel test showing direction and count" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Scroll to test</h3>
            <p>Spin the wheel to confirm direction and count.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-3.svg'); ?>" alt="Mouse click verification with quick reset controls" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>Reset and repeat</h3>
            <p>Clear counters and retest after adjustments.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/mouse-test.php'; ?>
    <?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
    <?php include 'help/mouse-click-test.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>



