<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Niveau de Blanc - Detecteur de Blancs Ecretes';
$pageDescription = 'Test du niveau de blanc de l\'écran : vérifie si votre écran écrête les détails clairs avec 32 patchs proches du blanc. Détecte les blancs brûlés et problèmes de contraste.';
$pageKeywords = 'test niveau blanc, blancs ecretes';
?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/white-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibration d'Affichage</p>
<h1 class="hero-title">Test de Niveau de Blanc - Detecteur de Blancs Ecretes</h1>
<p class="hero-lede">Verifiez le detail des hautes lumieres avec 32 patches proches du blanc. Si les valeurs hautes sont invisibles, votre moniteur ecrete les hautes lumieres.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#white-level-test">Demarrer</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/white-level-test/white-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Test niveau de blanc" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="white-level-test"><div class="container tool-stage-header"><div><h2>Test de Niveau de Blanc</h2><p class="section-lede">Comptez les patches visibles 223-254.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/white-level-tool.php'; ?></section></section>
<?php $currentTool = 'white-level'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
