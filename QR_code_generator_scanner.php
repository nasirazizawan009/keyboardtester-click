<?php include 'config.php'; ?>
<?php
$pageTitle = 'QR Code Generator - Qr Creation | KeyboardTester.click';
$pageDescription = 'Use this free online qr code generator to test QR creation with live feedback and quick resets.';
$pageKeywords = 'QR creation, qr code generator, online test, free tool';
$pageOgImage = 'images/qr-generator/hero.svg';
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
  echo generateToolPageSchema('qr_generator', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'QR Code Generator', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-qr-code-generator.php'; ?>

    <section class="tool-stage" id="qr-generator-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">QR Code Generator</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="qr-code-generator-scanner" class="tool-shell">
        <?php include 'tools/qr_code_generator_scanner_tool.php'; ?>
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
          <div class="trust-desc">Built for QR creation</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Qr Creation</p>
          <h2 id="feature-title">Everything you need for qr code generator</h2>
          <p class="section-lede">Run focused checks and confirm results in seconds.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track QR creation with live updates.</p>
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
            <h2 id="process-title">Three steps to run the qr code generator</h2>
          </div>
          <p class="section-lede">Follow the quick steps below to test and confirm results.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/qr-generator/step-1.svg'); ?>" alt="QR code generator step 1 - open free QR creator" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/qr-generator/step-2.svg'); ?>" alt="QR code generator step 2 - enter URL or text data" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Enter your data</h3>
            <p>to generate a QR code.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/qr-generator/step-3.svg'); ?>" alt="Generated QR code ready to download" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your QR creation stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/qr-code-generator.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
