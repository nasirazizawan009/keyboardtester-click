<?php
/**
 * French localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Basses - Balayage 20 Hz à 200 Hz pour Caisson de Basses';
$pageDescription = 'Test de basses gratuit en ligne. Balayage 20 Hz à 200 Hz avec presets ISO pour vérifier caisson de basses, moniteurs de studio et casques. Sans installation.';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Diagnostic audio</p>
          <h1 class="hero-title">Test de Basses - Caisson et Balayage 20 à 200 Hz</h1>
          <p class="hero-lede">Vérifiez si votre caisson de basses, vos moniteurs ou vos casques reproduisent les basses correctement. Balayage 20 à 200 Hz, presets ISO 1/3 d'octave ou tenue d'une fréquence. Ondes sinusoïdales pures, sans musique ni harmoniques.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">Démarrer le test</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Voir tous les outils</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Diagnostic audio</p>
          <h2>Test de Basses</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
