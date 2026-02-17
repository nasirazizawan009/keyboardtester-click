<?php
/**
 * German Microphone Test - Mikrofon-Tester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Mikrofon-Tester - Ueberpruefen Sie Ihr Mikrofon Kostenlos';
$pageDescription = 'Testen Sie Ihr Mikrofon online. Ueberpruefen Sie die Audioeingabe, Lautstaerkepegel und Aufnahmequalitaet.';
$pageKeywords = 'Mikrofon Test, Mic Test, Audio ueberpruefen, Mikrofon testen, Stimmtest';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-test.php'); ?>">

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
          <h1 id="hero-title">Mikrofon-Tester</h1>
          <p class="hero-lede">Ueberpruefen Sie, ob Ihr Mikrofon richtig funktioniert. Audioeingabe-Test.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Mikrofon-Tester</h2>
          <p class="section-lede">Erlauben Sie den Mikrofonzugriff und sprechen Sie zum Testen.</p>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Audioeingabe</div>
          <div class="trust-desc">Live-Ueberpruefung</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Lautstaerke</div>
          <div class="trust-desc">Visuelle Anzeige</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Qualitaet</div>
          <div class="trust-desc">Audioanalyse</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privat</div>
          <div class="trust-desc">Nichts wird gespeichert</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihr Mikrofon</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Zugriff erlauben</h3>
            <p>Autorisieren Sie die Mikrofonnutzung.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Sprechen</h3>
            <p>Sagen Sie etwas zum Testen.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Pegel beobachten</h3>
            <p>Ueberpruefen Sie die Lautstaerkeanzeige.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Anpassen</h3>
            <p>Konfigurieren Sie nach Bedarf.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
