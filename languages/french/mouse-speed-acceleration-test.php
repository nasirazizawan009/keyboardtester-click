<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = "Test d'Accélération Souris - Glissement Lent vs Rapide";
$pageDescription = "Test gratuit d'accélération souris en ligne. Comparez les pixels parcourus sur un glissement lent et un glissement rapide pour détecter l'accélération du pointeur Windows ou du firmware.";
$pageKeywords = 'test acceleration souris, pointeur windows acceleration, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnostic souris</p>
        <h1 class="hero-title">Test d'Accélération Souris</h1>
        <p class="hero-lede">Windows ou le firmware de votre souris ajoutent-ils silencieusement de l'accélération qui casse votre constance ? Glissez la même distance physique lentement puis rapidement — si le nombre de pixels augmente avec la vitesse, l'accélération est active. L'outil affiche le ratio rapide/lent exact.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">Lancer le test</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Précision au pixel</span><span class="hero-badge">Verdict par ratio</span><span class="hero-badge">Sans installation</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Outil principal</p><h2>Test d'Accélération Souris</h2><p class="section-lede">Glissez lentement, puis rapidement, même distance.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Comment détecter l'accélération</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Glissement lent</h3><p>Environ 2 secondes.</p></div>
        <div class="guideline-card"><h3>2. Glissement rapide</h3><p>Même distance, &lt; 0,5 s.</p></div>
        <div class="guideline-card"><h3>3. Lisez le ratio</h3><p>1,00 = parfait, &gt; 1,15 = accélération.</p></div>
        <div class="guideline-card"><h3>4. Désactivez</h3><p>"Améliorer la précision du pointeur" Windows.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
