<?php
/**
 * French DPI Tester - Testeur de DPI/Sensibilite
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Testeur de DPI - Mesurez la Sensibilite de la Souris';
$pageDescription = 'Testez et mesurez le DPI de votre souris. Verifiez la precision du suivi et la sensibilite.';
$pageKeywords = 'DPI souris, sensibilite mouse, test DPI, test sensibilite, calibrer souris';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('dpi-tester.php'); ?>">

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
          <h1 id="hero-title">Testeur de DPI de la Souris</h1>
          <p class="hero-lede">Mesurez le DPI et verifiez la sensibilite de votre souris avec precision.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Testeur de DPI</h2>
          <p class="section-lede">Deplacez la souris sur une distance specifique pour mesurer le DPI.</p>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Mesure DPI</div>
          <div class="trust-desc">Points par pouce</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sensibilite</div>
          <div class="trust-desc">Precision du mouvement</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Calibration</div>
          <div class="trust-desc">Reglage parfait</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Analyse</div>
          <div class="trust-desc">Resultats detailles</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Mesurer le DPI de la Souris</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Configurez le DPI</h3>
            <p>Entrez votre DPI actuel si vous le connaissez.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Deplacez la Souris</h3>
            <p>Deplacez sur une distance mesuree.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Comparez</h3>
            <p>Verifiez le DPI calcule.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajustez</h3>
            <p>Calibrez selon vos besoins.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
