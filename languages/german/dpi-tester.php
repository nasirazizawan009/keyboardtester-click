<?php
/**
 * German DPI Tester - Maus-DPI-Tester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Maus-DPI-Tester - Messen Sie die Mausempfindlichkeit';
$pageDescription = 'Testen und messen Sie die DPI Ihrer Maus. Ueberpruefen Sie die Tracking-Genauigkeit und Empfindlichkeit.';
$pageKeywords = 'DPI Maus, Mausempfindlichkeit, DPI Test, Empfindlichkeitstest, Maus kalibrieren';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('dpi-tester.php'); ?>">

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
          <h1 id="hero-title">Maus-DPI-Tester</h1>
          <p class="hero-lede">Messen Sie die DPI und ueberpruefen Sie die Empfindlichkeit Ihrer Maus mit Praezision.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">DPI-Tester</h2>
          <p class="section-lede">Bewegen Sie die Maus eine bestimmte Strecke, um DPI zu messen.</p>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">DPI-Messung</div>
          <div class="trust-desc">Punkte pro Zoll</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Empfindlichkeit</div>
          <div class="trust-desc">Bewegungspraezision</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Kalibrierung</div>
          <div class="trust-desc">Perfekte Einstellung</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Analyse</div>
          <div class="trust-desc">Detaillierte Ergebnisse</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So messen Sie die DPI Ihrer Maus</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. DPI einstellen</h3>
            <p>Geben Sie Ihre aktuelle DPI ein, falls bekannt.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Maus bewegen</h3>
            <p>Bewegen Sie eine gemessene Strecke.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Vergleichen</h3>
            <p>Ueberpruefen Sie die berechnete DPI.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Anpassen</h3>
            <p>Kalibrieren Sie nach Bedarf.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
