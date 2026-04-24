<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Drag Click de Souris - CPS et Pic de Rafale en Ligne';
$pageDescription = 'Test de drag click souris : mesure la vitesse, le pic et le total de clics en glissement avec graphique en direct. Idéal pour les techniques de drag clicking en gaming.';
$pageKeywords = 'test drag click, drag click CPS, drag click souris, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Testeur de Drag Click</p>
          <h1 class="hero-title">Test de Drag Click de Souris - CPS et Pic de Rafale</h1>
          <p class="hero-lede">Mesurez le CPS de drag-click, le pic de rafale et les clics totaux en sessions de 5, 10 ou 30 secondes. Ideal pour Minecraft PvP.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">Demarrer le Test</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment Utiliser</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Compteur CPS en direct</span>
            <span class="hero-badge">Pic de rafale</span>
            <span class="hero-badge">Graphique chronologique</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de drag click de souris" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">Outil Principal</p><h2>Testeur de Drag Click</h2><p class="section-lede">Cliquez ou glissez un doigt sur le bouton aussi vite que possible.</p></div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?></section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Comment Utiliser le Test de Drag Click</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Configurez</h3><p>Choisissez la duree et appuyez Demarrer.</p></div>
          <div class="guideline-card"><h3>2. Cliquez ou glissez</h3><p>Glissez le doigt a 30-45 degres pour plus de friction.</p></div>
          <div class="guideline-card"><h3>3. Lisez les resultats</h3><p>CPS moyen, pic et pic de rafale de 200ms.</p></div>
          <div class="guideline-card"><h3>4. Ajustez la technique</h3><p>Changez angle ou souris et re-testez.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
