<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Double Clic Clavier - Detecteur de Chatter';
$pageDescription = 'Détecteur de double frappe clavier : identifie les touches qui enregistrent deux événements pour une seule pression. Seuil configurable, journal complet, sans installation.';
$pageKeywords = 'double clic clavier, detecteur chatter clavier, key chatter';
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Detecteur de Chatter Clavier</p>
<h1 class="hero-title">Test de Double Clic Clavier - Detecteur de Chatter</h1>
<p class="hero-lede">Detectez les touches qui enregistrent deux fois depuis une seule pression. Seuil configurable 30-150ms avec statistiques par touche.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">Demarrer</a></div>
<div class="hero-badges"><span class="hero-badge">Seuil configurable</span><span class="hero-badge">Stats par touche</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de chatter clavier" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>Detecteur de Chatter Clavier</h2><p class="section-lede">Appuyez chaque touche une fois. Les touches qui chattering apparaitront ci-dessous.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
