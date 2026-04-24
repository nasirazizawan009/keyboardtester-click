<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Contraste Moniteur - Calibration par Damier';
$pageDescription = 'Test de contraste écran : motif en damier à côté du gris 50% révèle les problèmes de contraste et gamma. Idéal pour un réglage visuel rapide, sans matériel spécialisé.';
$pageKeywords = 'test contraste moniteur, calibration contraste';
?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibration d'Affichage</p>
<h1 class="hero-title">Test de Contraste Moniteur - Calibration par Damier</h1>
<p class="hero-lede">Verifiez la calibration de contraste avec un damier noir-et-blanc a cote d'un gris 50% solide. La moyenne du damier doit correspondre au gris en plissant.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">Demarrer</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de contraste moniteur" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>Test de Contraste Moniteur</h2><p class="section-lede">Plissez les yeux. Le damier doit ressembler au gris.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
