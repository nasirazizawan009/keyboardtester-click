<?php
/**
 * French Webcam Test - Test de Webcam
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Webcam - Verifiez Votre Camera Gratuitement';
$pageDescription = 'Testez votre webcam en ligne. Verifiez la qualite video, resolution et fonctionnement.';
$pageKeywords = 'test webcam, test camera, verifier webcam, tester video, webcam test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcamtesterindex.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcamtesterindex.php'); ?>">

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
          <h1 id="hero-title">Test de Webcam</h1>
          <p class="hero-lede">Verifiez que votre webcam fonctionne. Testez la qualite et resolution video.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test de Webcam</h2>
          <p class="section-lede">Autorisez l'acces a la camera pour voir le flux en direct.</p>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Video en Direct</div>
          <div class="trust-desc">Previsualisation</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Resolution</div>
          <div class="trust-desc">Verifier la qualite</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Capture</div>
          <div class="trust-desc">Prendre des photos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Prive</div>
          <div class="trust-desc">Sans enregistrement</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Tester Votre Webcam</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Autorisez l'Acces</h3>
            <p>Autorisez l'utilisation de la camera.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Verifiez la Video</h3>
            <p>Observez la transmission en direct.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Testez la Qualite</h3>
            <p>Verifiez la resolution et la nettete.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Prenez une Capture</h3>
            <p>Enregistrez une photo de test.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
