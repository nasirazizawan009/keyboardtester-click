<?php
/**
 * French Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Test de Precision de la Souris - Entraineur de Visee en Ligne';
$pageDescription = 'Test de precision de la souris en ligne gratuit. Mesurez le pourcentage de touches, l\'erreur moyenne en pixels et le temps de reaction. Calibrez votre DPI avec des donnees reelles.';
$pageKeywords = 'test precision souris, entraineur visee, aim trainer';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Entraineur de Visee</p>
          <h1 class="hero-title" id="hero-title">Test de Precision de la Souris - Entraineur de Visee</h1>
          <p class="hero-lede">Mesurez la precision de vos clics, l'erreur moyenne en pixels et le temps de reaction par cible. Calibrez votre DPI et sensibilite avec des donnees reelles.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">Demarrer le Test</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment Utiliser</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Precision au pixel</span>
            <span class="hero-badge">Temps de reaction</span>
            <span class="hero-badge">Calibration DPI</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Entraineur de Visee</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Taille de la cible</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">Aucune installation</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="Test de Precision de la Souris - Entraineur de Visee" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">Données réelles de visée</div><p>Suivi des touches et de l'erreur moyenne par session.</p></div>
            <div class="mini-card"><div class="mini-title">Boucle DPI</div><p>Testez, changez de DPI, re-testez - voyez comment la précision évolue.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Entraineur de Visee</p>
          <h2 id="tool-stage-title">Entraineur de Visee</h2>
          <p class="section-lede">Cliquez sur chaque cible aussi vite et aussi precisement que possible.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Voir les Conseils</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Comment Utiliser le Test de Precision">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Precision au pixel</div><div class="trust-desc">Chaque clic note par rapport au centre de la cible</div></div>
        <div class="trust-item"><div class="trust-title">Temps de reaction</div><div class="trust-desc">Millisecondes entre l'apparition et le clic</div></div>
        <div class="trust-item"><div class="trust-title">Calibration DPI</div><div class="trust-desc">Comparez les reglages avec des donnees objectives</div></div>
        <div class="trust-item"><div class="trust-title">Local et sans inscription</div><div class="trust-desc">Aucun telechargement ni suivi</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Comment Utiliser le Test de Precision</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Configurez la session</h3><p>Choisissez la duree (30s/60s/120s) et la taille de la cible.</p></div>
          <div class="guideline-card"><h3>2. Cliquez sur chaque cible</h3><p>Cliquez sur chaque cible verte immediatement.</p></div>
          <div class="guideline-card"><h3>3. Lisez les resultats</h3><p>Pourcentage de touches, erreur moyenne et temps.</p></div>
          <div class="guideline-card"><h3>4. Ajustez et recommencez</h3><p>Changez le DPI ou la sensibilite et re-testez.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
