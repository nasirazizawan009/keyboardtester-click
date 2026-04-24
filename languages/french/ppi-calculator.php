<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculateur PPI - Pixels par Pouce depuis la Résolution';
$pageDescription = 'Calculateur PPI : calcule pixels par pouce, pas de point, ratio et mégapixels pour n\'importe quel écran à partir de la résolution et de la diagonale. Gratuit, instantané.';
$pageKeywords = 'calculateur ppi, pixels par pouce, dpi moniteur, densite ecran';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculateurs d'écran</p>
        <h1 class="hero-title">Calculateur PPI - Pixels par Pouce</h1>
        <p class="hero-lede">Saisissez la résolution et la taille diagonale pour obtenir PPI, pas de point, ratio et mégapixels. Préréglages moniteurs, portables et téléphones inclus.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">Calculer le PPI</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + pas de point</span><span class="hero-badge">Ratio</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Outil principal</p><h2>Calculateur PPI</h2><p class="section-lede">Résolution + diagonale → PPI instantané.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
