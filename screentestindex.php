<?php include 'config.php'; ?>
<?php
$pageTitle = 'Screen Tester for Dead Pixels Online | KeyboardTester.click';
$pageDescription = 'Check your display for dead pixels, stuck pixels, color uniformity, and screen issues with a full-screen browser test.';
$pageKeywords = 'screen tester, dead pixel test, stuck pixel test, monitor test';
$pageOgImage = 'images/screen-test/screen-tester-monitor-inspection-1400.png';
$pageOgImageAlt = 'Person using an online screen tester to inspect a display for dead pixels and panel defects';
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
  echo generateToolPageSchema('screen_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Screen Tester', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-screen-tester.php'; ?>

    <section class="tool-stage" id="screen-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Screen Tester</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="screentestindex" class="tool-shell">
        <?php include 'screentesttool.php'; ?>
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
          <div class="trust-desc">Built for pixel issues</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Dead Pixel Check</p>
          <h2 id="feature-title">Check for Dead, Stuck, and Hot Pixels</h2>
          <p class="section-lede">Cycle through solid colors, inspect your panel full screen, and spot display problems quickly.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track pixel issues with live updates.</p>
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
            <h2 id="process-title">How to Test Your Screen Online</h2>
          </div>
          <p class="section-lede">Start the display preview, switch colors, and inspect the panel for dead or stuck pixels.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/screen-test/screen-tester-start-display-check-640.webp'); ?> 640w, <?php echo url('images/screen-test/screen-tester-start-display-check-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/screen-test/screen-tester-start-display-check-640.png'); ?> 640w, <?php echo url('images/screen-test/screen-tester-start-display-check-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/screen-test/screen-tester-start-display-check-640.png'); ?>" width="640" height="480" alt="Person starting an online screen tester to inspect the display for dead pixels" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/screen-test/screen-tester-cycle-colors-640.webp'); ?> 640w, <?php echo url('images/screen-test/screen-tester-cycle-colors-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/screen-test/screen-tester-cycle-colors-640.png'); ?> 640w, <?php echo url('images/screen-test/screen-tester-cycle-colors-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/screen-test/screen-tester-cycle-colors-640.png'); ?>" width="640" height="480" alt="Screen tester workflow showing solid colors used to find stuck or dead pixels" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">02</div>
            <h3>Cycle colors</h3>
            <p>in full screen view.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <picture>
                <source type="image/webp" srcset="<?php echo url('images/screen-test/screen-tester-review-pixel-results-640.webp'); ?> 640w, <?php echo url('images/screen-test/screen-tester-review-pixel-results-960.webp'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <source type="image/png" srcset="<?php echo url('images/screen-test/screen-tester-review-pixel-results-640.png'); ?> 640w, <?php echo url('images/screen-test/screen-tester-review-pixel-results-960.png'); ?> 960w" sizes="(max-width: 768px) calc(100vw - 3rem), 360px">
                <img src="<?php echo url('images/screen-test/screen-tester-review-pixel-results-640.png'); ?>" width="640" height="480" alt="Online screen tester review highlighting a suspicious pixel area on the display" loading="lazy" decoding="async">
              </picture>
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your pixel issues stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $intentClusterTool = 'screen'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'help/seo-content/screen-tester.php'; ?>
    <?php include 'includes/related-tools.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/screen-tester.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
