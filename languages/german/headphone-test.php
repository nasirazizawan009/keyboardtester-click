<?php
/**
 * German Headphone Test - Kopfhoerer- und Lautsprechertester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Kopfhoerer-Tester - Ueberpruefen Sie Stereo-Audio Kostenlos';
$pageDescription = 'Testen Sie Ihre Kopfhoerer und Lautsprecher. Ueberpruefen Sie linken und rechten Kanal, Stereo-Balance und Audioqualitaet.';
$pageKeywords = 'Kopfhoerer Test, Lautsprecher Test, Stereo ueberpruefen, Audio testen, Headphone Test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-de.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Kopfhoerer-Tester</h1>
          <p class="hero-lede">Ueberpruefen Sie die Stereo-Kanaele und Audioqualitaet Ihrer Kopfhoerer.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Kopfhoerer-Tester</h2>
          <p class="section-lede">Spielen Sie Audio auf jedem Kanal ab, um Ihre Kopfhoerer zu ueberpruefen.</p>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Linker Kanal</div>
          <div class="trust-desc">Einzeltest</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Rechter Kanal</div>
          <div class="trust-desc">Einzeltest</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Stereo</div>
          <div class="trust-desc">Beide Kanaele</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Balance</div>
          <div class="trust-desc">Gleichgewicht pruefen</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihre Kopfhoerer</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Kopfhoerer anschliessen</h3>
            <p>Stellen Sie sicher, dass sie angeschlossen sind.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Links testen</h3>
            <p>Audio nur links abspielen.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Rechts testen</h3>
            <p>Audio nur rechts abspielen.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Balance pruefen</h3>
            <p>Beide Kanaele zusammen testen.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
