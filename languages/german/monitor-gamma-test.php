<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Monitor-Gamma-Test - sRGB 2.2 Kalibrierung';
$pageDescription = 'Monitor-Gamma-Test: Messen Sie Gamma visuell mit dem klassischen Linienverschmelzungsmuster, Ziel sRGB 2.2. Schnelle Anpassung ohne Colorimeter oder Zusatzsoftware.';
$pageKeywords = 'monitor gamma test, gamma kalibrierung, sRGB 2.2';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Monitor-Kalibrierung</p>
<h1 class="hero-title">Monitor-Gamma-Test - sRGB 2.2 Kalibrierung</h1>
<p class="hero-lede">Visuelle Gamma-Kalibrierungspruefung via Streifen-Mischmuster. Stelle den Schieberegler ein bis sich Streifen mit dem Volltongrau mischen.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-gamma-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-gamma-test/monitor-gamma-test-hero.jpg'); ?>" width="1280" height="720" alt="Monitor-Gamma-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-gamma-test"><div class="container tool-stage-header"><div><h2>Monitor-Gamma-Test</h2><p class="section-lede">Stelle den Schieberegler ein bis Streifen sich mischen.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-gamma-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-gamma'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
