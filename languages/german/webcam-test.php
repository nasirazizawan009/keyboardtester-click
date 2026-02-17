<?php
/**
 * German Webcam Test - Webcam-Tester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Webcam-Tester - Ueberpruefen Sie Ihre Webcam Kostenlos';
$pageDescription = 'Testen Sie Ihre Webcam online. Ueberpruefen Sie Videoqualitaet, Aufloesung und Funktion.';
$pageKeywords = 'Webcam Test, Kamera Test, Webcam ueberpruefen, Video testen, Webcam Tester';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcam-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcam-test.php'); ?>">

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
          <h1 id="hero-title">Webcam-Tester</h1>
          <p class="hero-lede">Ueberpruefen Sie, ob Ihre Webcam funktioniert. Testen Sie Qualitaet und Aufloesung.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Webcam-Tester</h2>
          <p class="section-lede">Erlauben Sie den Kamerazugriff, um die Live-Uebertragung zu sehen.</p>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Live-Video</div>
          <div class="trust-desc">Vorschau</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Aufloesung</div>
          <div class="trust-desc">Qualitaet pruefen</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Aufnahme</div>
          <div class="trust-desc">Fotos machen</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privat</div>
          <div class="trust-desc">Keine Aufzeichnung</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihre Webcam</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Zugriff erlauben</h3>
            <p>Autorisieren Sie die Kameranutzung.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Video pruefen</h3>
            <p>Beobachten Sie die Live-Uebertragung.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Qualitaet testen</h3>
            <p>Ueberpruefen Sie Aufloesung und Schaerfe.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Foto aufnehmen</h3>
            <p>Speichern Sie ein Testfoto.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
