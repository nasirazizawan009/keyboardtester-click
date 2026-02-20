<?php
/**
 * German QR Reader - QR-Code-Leser
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'QR-Code-Leser - QR-Codes Scannen Kostenlos';
$pageDescription = 'Scannen Sie QR-Codes mit Ihrer Kamera oder laden Sie ein Bild hoch. Dekodieren Sie QR-Codes sofort.';
$pageKeywords = 'QR-Leser, QR-Code scannen, QR dekodieren, QR Scanner, QR lesen';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-reader.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-reader.php'); ?>">

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
          <h1 id="hero-title">QR-Code-Leser</h1>
          <p class="hero-lede">Scannen Sie QR-Codes mit der Kamera oder laden Sie ein Bild zum Dekodieren hoch.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">QR scannen</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">QR-Leser</h2>
          <p class="section-lede">Verwenden Sie die Kamera oder laden Sie ein Bild mit einem QR-Code hoch.</p>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Kamera</div>
          <div class="trust-desc">Live-Scan</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Bild hochladen</div>
          <div class="trust-desc">Von Dateien</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sofort</div>
          <div class="trust-desc">Schnelle Ergebnisse</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privat</div>
          <div class="trust-desc">Lokale Verarbeitung</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So scannen Sie einen QR-Code</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Methode waehlen</h3>
            <p>Kamera oder Bild hochladen.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Auf QR zielen</h3>
            <p>Zentrieren Sie den QR-Code.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Auf Scan warten</h3>
            <p>Automatische Erkennung.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ergebnis sehen</h3>
            <p>Dekodierter Inhalt.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
