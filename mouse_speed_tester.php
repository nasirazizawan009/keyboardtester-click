<?php include 'config.php'; ?>
<?php
$pageTitle = 'Click Speed Test Online | KeyboardTester.click';
$pageDescription = 'Test your click speed and measure clicks per second (CPS) with free timed online challenges. Track your score, compare runs, and improve your clicking performance.';
$pageKeywords = 'click speed test, cps test, mouse speed test, clicks per second';
$pageOgImage = 'images/mouse-speed/hero.png';
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
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('click_speed', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Click Speed Test', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mouse-speed-tester.php'; ?>

    <section class="tool-stage" id="mouse-speed-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Mouse Speed Test</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="mouse-speed-tester" class="tool-shell">
        <?php include 'tools/mouse_speed_tester_tool.php'; ?>
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
          <div class="trust-desc">Built for click speed</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Clicks Per Second</p>
          <h2 id="feature-title">Test Click Speed and CPS in Real Time</h2>
          <p class="section-lede">Measure how quickly you can click, compare repeat runs, and track your best pace.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track click speed with live updates.</p>
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
            <h2 id="process-title">How to Test Click Speed Online</h2>
          </div>
          <p class="section-lede">Pick a duration, click as fast as you can, and compare your CPS result instantly.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-speed/step-1.png'); ?>" alt="Mouse click speed test step 1 - prepare to measure CPS" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-speed/step-2.png'); ?>" alt="Mouse speed test step 2 - click as fast as possible" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Click</h3>
            <p>as fast as possible inside the test area.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-speed/step-3.png'); ?>" alt="Mouse speed test results - clicks per second CPS score" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your click speed stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/click-speed.php'; ?>
    <?php $currentTool = 'cps'; include 'includes/related-tools.php'; ?>
    <?php include 'help/mouse-speed-tester.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
