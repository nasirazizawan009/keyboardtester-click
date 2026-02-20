<?php
/**
 * German QR Generator - QR-Code-Generator
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'QR-Code-Generator - QR-Codes Kostenlos Erstellen';
$pageDescription = 'Generieren Sie individuelle QR-Codes sofort. Erstellen Sie QR-Codes fuer URLs, Text, Kontakte und mehr.';
$pageKeywords = 'QR-Generator, QR-Code erstellen, QR kostenlos, QR generieren, QR-Code online';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-generator.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-generator.php'); ?>">

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
          <h1 id="hero-title">QR-Code-Generator</h1>
          <p class="hero-lede">Erstellen Sie individuelle QR-Codes sofort fuer jeden Inhalt.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">QR erstellen</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">QR-Generator</h2>
          <p class="section-lede">Geben Sie Ihren Inhalt ein und generieren Sie sofort einen QR-Code.</p>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">URLs</div>
          <div class="trust-desc">Weblinks</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Text</div>
          <div class="trust-desc">Individuelle Nachrichten</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Download</div>
          <div class="trust-desc">PNG in hoher Qualitaet</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Kostenlos</div>
          <div class="trust-desc">Ohne Einschraenkungen</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So erstellen Sie einen QR-Code</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Inhalt eingeben</h3>
            <p>Schreiben Sie URL, Text oder Daten.</p>
          </div>
          <div class="guideline-card">
            <h3>2. QR generieren</h3>
            <p>Der Code wird automatisch erstellt.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Anpassen</h3>
            <p>Passen Sie die Groesse an, falls noetig.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Herunterladen</h3>
            <p>Speichern Sie das PNG-Bild.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
