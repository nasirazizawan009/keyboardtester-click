<?php
/**
 * German Screen Test - Bildschirm-Tester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Bildschirm-Tester - Erkennen Sie Tote Pixel Kostenlos';
$pageDescription = 'Erkennen Sie tote, feststeckende oder heisse Pixel auf Ihrem Monitor. Vollstaendiger Bildschirmtest mit Vollfarben.';
$pageKeywords = 'Bildschirmtest, tote Pixel, Monitor Test, Pixel erkennen, LCD Test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screen-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screen-test.php'); ?>">

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
          <h1 id="hero-title">Bildschirm-Tester</h1>
          <p class="hero-lede">Erkennen Sie tote oder feststeckende Pixel auf Ihrem Monitor mit Testfarben.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Bildschirm-Tester</h2>
          <p class="section-lede">Klicken Sie auf die Farben, um Ihren Bildschirm vollstaendig zu testen.</p>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Tote Pixel</div>
          <div class="trust-desc">Praezise Erkennung</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Vollfarben</div>
          <div class="trust-desc">Komplettes RGB</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Vollbild</div>
          <div class="trust-desc">Vollstaendiger Test</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Einfach zu bedienen</div>
          <div class="trust-desc">Ein Klick zum Testen</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihren Bildschirm</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Farbe waehlen</h3>
            <p>Waehlen Sie eine Testfarbe.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Vollbild</h3>
            <p>Aktivieren Sie den Vollbildmodus.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Inspizieren</h3>
            <p>Suchen Sie nach abnormalen Punkten.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Alle testen</h3>
            <p>Wiederholen Sie mit jeder Farbe.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
