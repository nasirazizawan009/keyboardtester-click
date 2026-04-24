<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Dérive Souris - Détecte les Saccades du Capteur';
$pageDescription = 'Test gratuit de dérive souris en ligne. Détectez le mouvement du curseur au repos et les saccades du capteur. Durée 10 s à 3 min, navigateur uniquement.';
$pageKeywords = 'test derive souris, mouvement curseur repos, saccades capteur, mouse drift test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnostic souris</p>
        <h1 class="hero-title">Test de Dérive Souris - Saccades du Capteur</h1>
        <p class="hero-lede">Votre curseur bouge sans que vous touchiez la souris ? Le test de dérive échantillonne chaque événement de pointeur pendant 10-180 secondes et affiche la dérive totale, le plus grand saut et un verdict pass/fail.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">Lancer le test</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Précision au pixel</span><span class="hero-badge">10s - 3 min</span><span class="hero-badge">Verdict</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Outil principal</p><h2>Test de Dérive Souris</h2><p class="section-lede">Laissez la souris immobile et appuyez sur Démarrer.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Comment détecter la dérive</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Main hors souris</h3><p>Ne touchez pas la souris.</p></div>
        <div class="guideline-card"><h3>2. Démarrer</h3><p>Choisissez la durée et attendez.</p></div>
        <div class="guideline-card"><h3>3. Lisez le verdict</h3><p>0 px = parfait, &lt;5 = normal.</p></div>
        <div class="guideline-card"><h3>4. Corrigez</h3><p>Vrai tapis, accélération désactivée.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
