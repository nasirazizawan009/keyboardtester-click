<?php
/**
 * French Screen Test - Test d'Ecran
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test d\'Ecran - Detectez les Pixels Morts Gratuitement';
$pageDescription = 'Detectez les pixels morts, coinces ou chauds sur votre moniteur. Test d\'ecran complet avec couleurs unies.';
$pageKeywords = 'test ecran, pixels morts, test moniteur, detecter pixels, test LCD';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screentestindex.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screentestindex.php'); ?>">

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
          <h1 id="hero-title">Test d'Ecran</h1>
          <p class="hero-lede">Detectez les pixels morts ou coinces sur votre moniteur avec des couleurs de test.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test d'Ecran</h2>
          <p class="section-lede">Cliquez sur les couleurs pour tester votre ecran complet.</p>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Pixels Morts</div>
          <div class="trust-desc">Detection precise</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Couleurs Unies</div>
          <div class="trust-desc">RGB complet</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Plein Ecran</div>
          <div class="trust-desc">Test complet</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Facile a Utiliser</div>
          <div class="trust-desc">Un clic pour tester</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Tester Votre Ecran</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selectionnez une Couleur</h3>
            <p>Choisissez une couleur de test.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Plein Ecran</h3>
            <p>Activez le mode plein ecran.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Inspectez</h3>
            <p>Cherchez des points anormaux.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Testez Toutes</h3>
            <p>Repetez avec chaque couleur.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
