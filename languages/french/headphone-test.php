<?php
/**
 * French Headphone Test - Test de Casque et Haut-parleurs
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Casque - Verifiez l\'Audio Stereo Gratuitement';
$pageDescription = 'Testez votre casque et vos haut-parleurs. Verifiez les canaux gauche et droit, l\'equilibre stereo et la qualite audio.';
$pageKeywords = 'test casque, test haut-parleurs, verifier stereo, tester audio, headphone test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone-test.php'); ?>">

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
          <h1 id="hero-title">Test de Casque et Haut-parleurs</h1>
          <p class="hero-lede">Verifiez les canaux stereo et la qualite audio de votre casque.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test de Casque</h2>
          <p class="section-lede">Jouez de l'audio dans chaque canal pour verifier votre casque.</p>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Canal Gauche</div>
          <div class="trust-desc">Test individuel</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Canal Droit</div>
          <div class="trust-desc">Test individuel</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Stereo</div>
          <div class="trust-desc">Les deux canaux</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Balance</div>
          <div class="trust-desc">Verifier l'equilibre</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Tester Votre Casque</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Connectez le Casque</h3>
            <p>Assurez-vous qu'il est connecte.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Testez le Gauche</h3>
            <p>Jouez l'audio uniquement a gauche.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Testez le Droit</h3>
            <p>Jouez l'audio uniquement a droite.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Verifiez la Balance</h3>
            <p>Testez les deux canaux ensemble.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
