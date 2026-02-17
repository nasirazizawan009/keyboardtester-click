<?php
/**
 * German Mouse Trail - Mausspur
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Mausspur - Visualisieren Sie die Cursorbewegung';
$pageDescription = 'Visualisieren Sie die Mausbewegungsspur. Analysieren Sie Praezision und Fluessigkeit des Cursors.';
$pageKeywords = 'Mausspur, Mouse Trail, Cursorbewegung, Maus visualisieren, Mausprazision';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

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
          <h1 id="hero-title">Mausspur</h1>
          <p class="hero-lede">Visualisieren Sie die Bewegungsspur und analysieren Sie die Praezision Ihrer Maus.</p>
          <div class="hero-ctas">
            <a href="#trail-test" class="landing-btn landing-btn-primary">Visualisierung starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Spur-Visualisierer</h2>
          <p class="section-lede">Bewegen Sie die Maus, um die Bewegungsspur zu sehen.</p>
        </div>
      </div>
      <section id="trail-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Visuelle Spur</div>
          <div class="trust-desc">Bewegung sehen</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Praezision</div>
          <div class="trust-desc">Fluessigkeit analysieren</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Echtzeit</div>
          <div class="trust-desc">Sofortige Visualisierung</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Anpassbar</div>
          <div class="trust-desc">Optionen anpassen</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So nutzen Sie den Spur-Visualisierer</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Maus bewegen</h3>
            <p>Bewegen Sie den Cursor ueber den Bildschirm.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Spur beobachten</h3>
            <p>Sehen Sie das Bewegungsmuster.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Fluessigkeit analysieren</h3>
            <p>Ueberpruefen Sie gleichmaessige Bewegung.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Optionen anpassen</h3>
            <p>Passen Sie die Visualisierung an.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
