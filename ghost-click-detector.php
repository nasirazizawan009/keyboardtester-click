<?php include 'config.php'; ?>
<?php
$pageTitle = 'Ghost Click Detector - Ghost Clicks | KeyboardTester.click';
$pageDescription = 'Use this free online ghost click detector to test ghost clicks with live feedback and quick resets.';
$pageKeywords = 'ghost clicks, ghost click detector, online test, free tool';
$pageOgImage = 'images/ghost-click/hero.svg';
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
  echo generateToolPageSchema('ghost_click', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Ghost Click Detector', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-ghost-click-detector.php'; ?>

    <section class="tool-stage" id="ghost-click-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Ghost Click Detector</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="ghost-click-detector" class="tool-shell">
        <?php include 'tools/ghost_click_detector_tool.php'; ?>
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
          <div class="trust-desc">Built for ghost clicks</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Ghost Clicks</p>
          <h2 id="feature-title">Everything you need for ghost click detector</h2>
          <p class="section-lede">Run focused checks and confirm results in seconds.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track ghost clicks with live updates.</p>
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
            <h2 id="process-title">Three steps to run the ghost click detector</h2>
          </div>
          <p class="section-lede">Follow the quick steps below to test and confirm results.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-1.svg'); ?>" alt="Ghost click detector step 1 - start the mouse double click test" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-2.svg'); ?>" alt="Ghost click test step 2 - click normally to detect phantom double clicks" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Click normally</h3>
            <p>to detect unexpected double clicks.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-3.svg'); ?>" alt="Ghost click test results - view detected double click issues" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your ghost clicks stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/ghost-click.php'; ?>
    <?php $currentTool = 'ghost-click'; include 'includes/related-tools.php'; ?>
    <?php include 'help/ghost-click-detector.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
