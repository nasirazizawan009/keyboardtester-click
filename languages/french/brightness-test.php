<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Luminosite Moniteur - Echelle de Calibration 11 Pas';
$pageDescription = 'Test de luminosité écran : échelle de niveaux de gris en 11 étapes révèle les problèmes de luminosité, contraste et gamma. Outil visuel rapide de calibration, sans installation.';
$pageKeywords = 'test luminosite moniteur, calibration luminosite';
?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibration d'Affichage</p>
<h1 class="hero-title">Test de Luminosite Moniteur - Echelle de Calibration 11 Pas</h1>
<p class="hero-lede">Verifiez si votre moniteur affiche une progression uniforme du noir au blanc. 11 pas en increments de 10% revelent les mauvaises configurations.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">Demarrer</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de luminosite moniteur" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>Test de Luminosite Moniteur</h2><p class="section-lede">11 pas du noir au blanc. Tous distincts = sain.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
