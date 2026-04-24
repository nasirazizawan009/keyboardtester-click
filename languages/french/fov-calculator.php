<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculateur de FoV - Convertir le Champ de Vision entre Jeux';
$pageDescription = 'Calculateur de FoV gratuit en ligne. Convertissez le champ de vision horizontal, vertical et diagonal entre 4:3, 16:9, 21:9 et 32:9 pour CS2, Valorant, Apex, CoD et Fortnite.';
$pageKeywords = 'calculateur fov, champ de vision, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculateurs de sensibilité</p>
        <h1 class="hero-title">Calculateur de FoV - Convertissez le Champ de Vision</h1>
        <p class="hero-lede">Convertissez un FoV entre horizontal, vertical et diagonal pour 4:3, 16:9, 21:9 et 32:9. Préréglages CS2, Valorant, Apex, CoD et Fortnite pour transposer la même sensation verticale entre jeux et moniteurs.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">Convertir le FoV</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / Diagonal</span><span class="hero-badge">Tous les ratios</span><span class="hero-badge">Préréglages jeux</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Outil principal</p><h2>Calculateur de FoV</h2><p class="section-lede">Choisissez un préréglage ou saisissez votre FoV et votre ratio.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Comment convertir le FoV</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Choisissez le jeu</h3><p>Le préréglage fixe format et ratio.</p></div>
        <div class="guideline-card"><h3>2. Saisissez le FoV</h3><p>Entrez votre valeur actuelle.</p></div>
        <div class="guideline-card"><h3>3. Lisez la table</h3><p>FoV équivalent pour chaque format et ratio.</p></div>
        <div class="guideline-card"><h3>4. Appliquez</h3><p>Copiez la valeur dans le nouveau jeu.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
