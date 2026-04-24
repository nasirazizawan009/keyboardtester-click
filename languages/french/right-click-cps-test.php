<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de CPS Clic Droit - Vitesse du Bouton Droit';
$pageDescription = 'Test CPS clic droit : mesurez la vitesse de clic droit (clics par seconde) avec le menu contextuel désactivé. Idéal pour les joueurs et les tests de switches.';
$pageKeywords = 'test CPS clic droit, right click CPS';
?>
<!DOCTYPE html>
<html lang="fr">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Testeur de CPS Clic Droit</p>
<h1 class="hero-title">Test de CPS Clic Droit - Vitesse du Bouton Droit</h1>
<p class="hero-lede">Mesurez les clics par seconde du bouton droit en sessions de 5, 10 ou 30 secondes. Menu contextuel du navigateur desactive.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">Demarrer</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">Comment Utiliser</a>
</div>
<div class="hero-badges"><span class="hero-badge">Clic droit uniquement</span><span class="hero-badge">Pic CPS</span><span class="hero-badge">Menu contextuel off</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de CPS clic droit" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">Outil Principal</p><h2>Testeur de CPS Clic Droit</h2><p class="section-lede">Cliquez-droit dans la zone aussi vite que possible.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>Comment Utiliser</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. Configurez</h3><p>Choisissez la duree.</p></div>
<div class="guideline-card"><h3>2. Cliquez-droit vite</h3><p>Cliquez-droit dans la zone.</p></div>
<div class="guideline-card"><h3>3. Lisez resultats</h3><p>Total, CPS, pic.</p></div>
<div class="guideline-card"><h3>4. Comparez</h3><p>Comparez avec CPS gauche.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
