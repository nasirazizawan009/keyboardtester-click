<?php
/**
 * German Latency Checker - Latenz-Pruefer
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Latenz-Pruefer - Messen Sie die Reaktionszeit';
$pageDescription = 'Messen Sie die Reaktionszeit Ihrer Eingabegeraete. Praeziser Latenztest in Millisekunden.';
$pageKeywords = 'Latenz, Reaktionszeit, Input Lag, Latenztest, Verzoegerung messen';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
          <h1 id="hero-title">Latenz-Pruefer</h1>
          <p class="hero-lede">Messen Sie Ihre Reaktionszeit und Eingabelatenz mit Praezision.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Latenz-Pruefer</h2>
          <p class="section-lede">Warten Sie auf das Signal und klicken Sie so schnell wie moeglich.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Praezision</div>
          <div class="trust-desc">In Millisekunden</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Durchschnitt</div>
          <div class="trust-desc">Vollstaendige Statistiken</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Visuell</div>
          <div class="trust-desc">Reaktionstest</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sofort</div>
          <div class="trust-desc">Sofortige Ergebnisse</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So messen Sie Ihre Reaktionszeit</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Vorbereiten</h3>
            <p>Legen Sie Ihre Hand auf die Maus.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Auf Signal warten</h3>
            <p>Warten Sie auf den Farbwechsel.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Klicken</h3>
            <p>Reagieren Sie so schnell wie moeglich.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ergebnisse sehen</h3>
            <p>Zeit in Millisekunden.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
