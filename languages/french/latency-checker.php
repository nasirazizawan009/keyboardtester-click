<?php
/**
 * French Latency Checker - Verificateur de Latence
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Verificateur de Latence - Mesurez le Temps de Reponse';
$pageDescription = 'Mesurez le temps de reponse de vos peripheriques d\'entree. Test de latence precis en millisecondes.';
$pageKeywords = 'latence, temps reponse, input lag, test latence, mesurer delai';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
          <h1 id="hero-title">Verificateur de Latence</h1>
          <p class="hero-lede">Mesurez votre temps de reaction et la latence d'entree avec precision.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Verificateur de Latence</h2>
          <p class="section-lede">Attendez le signal et cliquez aussi vite que possible.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Precision</div>
          <div class="trust-desc">En millisecondes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Moyenne</div>
          <div class="trust-desc">Statistiques completes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Visuel</div>
          <div class="trust-desc">Test de reaction</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantane</div>
          <div class="trust-desc">Resultats immediats</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Mesurer Votre Temps de Reaction</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Preparez-vous</h3>
            <p>Placez votre main sur la souris.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Attendez le Signal</h3>
            <p>Attendez le changement de couleur.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Cliquez</h3>
            <p>Reagissez aussi vite que possible.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Voir les Resultats</h3>
            <p>Temps en millisecondes.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
