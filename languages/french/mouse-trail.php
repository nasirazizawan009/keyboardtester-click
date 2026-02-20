<?php
/**
 * French Mouse Trail - Traceur de Souris
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Traceur de Souris - Visualisez le Mouvement du Curseur';
$pageDescription = 'Visualisez la trace de mouvement de la souris. Analysez la precision et la fluidite du curseur.';
$pageKeywords = 'trace souris, mouse trail, mouvement curseur, visualiser souris, precision mouse';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-fr.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Traceur de Souris</h1>
          <p class="hero-lede">Visualisez la trace de mouvement et analysez la precision de votre souris.</p>
          <div class="hero-ctas">
            <a href="#trail-test" class="landing-btn landing-btn-primary">Demarrer la Visualisation</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Visualiseur de Trace</h2>
          <p class="section-lede">Deplacez la souris pour voir la trace de mouvement.</p>
        </div>
      </div>
      <section id="trail-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Trace Visuelle</div>
          <div class="trust-desc">Voir le mouvement</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precision</div>
          <div class="trust-desc">Analyser la fluidite</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Temps Reel</div>
          <div class="trust-desc">Visualisation instantanee</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Personnalisable</div>
          <div class="trust-desc">Ajuster les options</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Utiliser le Visualiseur de Trace</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Deplacez la Souris</h3>
            <p>Deplacez le curseur sur l'ecran.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observez la Trace</h3>
            <p>Voyez le motif de mouvement.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Analysez la Fluidite</h3>
            <p>Verifiez le mouvement fluide.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajustez les Options</h3>
            <p>Personnalisez la visualisation.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
