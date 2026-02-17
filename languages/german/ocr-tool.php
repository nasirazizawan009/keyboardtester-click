<?php
/**
 * German OCR Tool - OCR-Werkzeug
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'OCR-Werkzeug - Text aus Bildern Extrahieren Kostenlos';
$pageDescription = 'Extrahieren Sie Text aus Bildern mit OCR. Konvertieren Sie Bilder sofort in bearbeitbaren Text.';
$pageKeywords = 'OCR, Text aus Bild extrahieren, Bild zu Text konvertieren, Zeichenerkennung, OCR online';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
          <h1 id="hero-title">OCR-Werkzeug</h1>
          <p class="hero-lede">Extrahieren Sie Text aus Bildern mit optischer Zeichenerkennung.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">Text extrahieren</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">OCR Textextraktor</h2>
          <p class="section-lede">Laden Sie ein Bild hoch, um den enthaltenen Text zu extrahieren.</p>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Mehrere Formate</div>
          <div class="trust-desc">JPG, PNG, WebP</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Hohe Genauigkeit</div>
          <div class="trust-desc">Fortgeschrittene OCR</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sofort</div>
          <div class="trust-desc">Schnelle Ergebnisse</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Kopierbar</div>
          <div class="trust-desc">Bearbeitbarer Text</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So extrahieren Sie Text aus Bildern</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Bild hochladen</h3>
            <p>Waehlen oder ziehen Sie ein Bild.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Auf Verarbeitung warten</h3>
            <p>Die OCR analysiert das Bild.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Text pruefen</h3>
            <p>Ueberpruefen Sie den extrahierten Text.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Kopieren</h3>
            <p>Verwenden Sie den Text, wo Sie ihn brauchen.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
