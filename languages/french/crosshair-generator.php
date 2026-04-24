<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Générateur de Viseur - Crosshair Personnalisé CS2 et Valorant';
$pageDescription = 'Générateur de viseur gratuit en ligne. Concevez un viseur personnalisé avec aperçu en direct, téléchargez le PNG, copiez la commande console CS2 ou les valeurs Valorant.';
$pageKeywords = 'generateur viseur, crosshair personnalise, viseur cs2, viseur valorant, crosshair generator';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Outils de viseur</p>
        <h1 class="hero-title">Générateur de Viseur - Crosshair Personnalisé</h1>
        <p class="hero-lede">Concevez un viseur avec aperçu en direct. Choisissez un préréglage pro (s1mple, TenZ) ou ajustez chaque paramètre : forme, couleur, épaisseur, longueur, écart, point central et contour. Téléchargez un PNG transparent ou copiez la commande console prête à coller pour CS2.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">Ouvrir le générateur</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Comment faire</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Aperçu en direct</span><span class="hero-badge">Commande CS2</span><span class="hero-badge">Valeurs Valorant</span><span class="hero-badge">PNG transparent</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Outil principal</p><h2>Générateur de Viseur</h2><p class="section-lede">Ajustez les paramètres et exportez vers CS2, Valorant ou PNG.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Comment appliquer le viseur</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Choisissez un préréglage</h3><p>Partez d'un preset pro et ajustez.</p></div>
        <div class="guideline-card"><h3>2. Ajustez l'aperçu</h3><p>Forme, couleur et contour en direct.</p></div>
        <div class="guideline-card"><h3>3. Exportez</h3><p>PNG ou commande CS2 à copier.</p></div>
        <div class="guideline-card"><h3>4. Appliquez en jeu</h3><p>Collez dans la console (~) ou saisissez dans Valorant.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
