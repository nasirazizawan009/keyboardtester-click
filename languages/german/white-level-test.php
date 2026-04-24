<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Weisswert-Test - Abgeschnittene Lichter Detektor';
$pageDescription = 'Weißwert-Test des Monitors: Prüft, ob Ihr Display Lichterdetails abschneidet, mit 32 Nahweiß-Feldern. Erkennt ausgebrannte Lichter und Kontrastprobleme, ohne Installation.';
$pageKeywords = 'weisswert test, abgeschnittene lichter';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/white-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Display-Kalibrierung</p>
<h1 class="hero-title">Weisswert-Test - Abgeschnittene Lichter Detektor</h1>
<p class="hero-lede">Pruefe Lichterdetails mit 32 fast-weissen Patches. Wenn hohe Werte unsichtbar sind, schneidet dein Monitor Lichter ab.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#white-level-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/white-level-test/white-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Weisswert-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="white-level-test"><div class="container tool-stage-header"><div><h2>Weisswert-Test</h2><p class="section-lede">Zaehle sichtbare Patches 223-254.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/white-level-tool.php'; ?></section></section>
<?php $currentTool = 'white-level'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
