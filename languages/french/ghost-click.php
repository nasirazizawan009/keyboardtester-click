<?php
/**
 * French Ghost Click Detector - Detecteur de Clics Fantomes
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Detecteur de Clics Fantomes - Detectez les Clics Non Desires';
$pageDescription = 'Detectez les clics fantomes et les clics non intentionnels de votre souris. Identifiez les problemes materiel de la souris.';
$pageKeywords = 'clics fantomes, detecteur clics, problemes souris, clics involontaires, ghost click';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-test.php'); ?>">

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
          <h1 id="hero-title">Detecteur de Clics Fantomes</h1>
          <p class="hero-lede">Detectez les clics non intentionnels et les problemes de double-clic de votre souris.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">Demarrer la Detection</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Detecteur de Clics Fantomes</h2>
          <p class="section-lede">Deplacez la souris sans cliquer pour detecter les clics fantomes.</p>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Detection</div>
          <div class="trust-desc">Clics fantomes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Double-Clic</div>
          <div class="trust-desc">Identifier les problemes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Historique</div>
          <div class="trust-desc">Historique des clics</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Diagnostic</div>
          <div class="trust-desc">Etat de la souris</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Detecter les Clics Fantomes</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Ne Cliquez Pas</h3>
            <p>Deplacez la souris sans appuyer.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observez</h3>
            <p>Regardez si des clics sont detectes.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Testez les Boutons</h3>
            <p>Verifiez chaque bouton individuellement.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Consultez l'Historique</h3>
            <p>Analysez l'historique des clics.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
