<?php
/**
 * German Ghost Click Detector - Geisterklick-Detektor
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Geisterklick-Detektor - Erkennen Sie ungewollte Klicks';
$pageDescription = 'Erkennen Sie Geisterklicks und unbeabsichtigte Klicks Ihrer Maus. Identifizieren Sie Maus-Hardware-Probleme.';
$pageKeywords = 'Geisterklicks, Klickdetektor, Mausprobleme, ungewollte Klicks, Ghost Click';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-test.php'); ?>">

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
          <h1 id="hero-title">Geisterklick-Detektor</h1>
          <p class="hero-lede">Erkennen Sie unbeabsichtigte Klicks und Doppelklick-Probleme Ihrer Maus.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">Erkennung starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Geisterklick-Detektor</h2>
          <p class="section-lede">Bewegen Sie die Maus ohne zu klicken, um Geisterklicks zu erkennen.</p>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Erkennung</div>
          <div class="trust-desc">Geisterklicks</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Doppelklick</div>
          <div class="trust-desc">Probleme identifizieren</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Protokoll</div>
          <div class="trust-desc">Klick-Historie</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Diagnose</div>
          <div class="trust-desc">Mausstatus</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So erkennen Sie Geisterklicks</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Nicht klicken</h3>
            <p>Bewegen Sie die Maus ohne zu druecken.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Beobachten</h3>
            <p>Schauen Sie, ob Klicks erkannt werden.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Tasten testen</h3>
            <p>Ueberpruefen Sie jede Taste einzeln.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Protokoll pruefen</h3>
            <p>Analysieren Sie die Klick-Historie.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
