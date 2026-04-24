<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Helligkeits-Test - 11-Stufen Kalibrierungsleiter';
$pageDescription = 'Monitor-Helligkeitstest: 11-stufige Graustufen-Leiter zeigt Probleme bei Helligkeit, Kontrast und Gamma. Schnelles visuelles Kalibrierungstool im Browser, ohne Installation.';
$pageKeywords = 'helligkeits test, monitor helligkeit kalibrierung';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Display-Kalibrierung</p>
<h1 class="hero-title">Helligkeits-Test - 11-Stufen Kalibrierungsleiter</h1>
<p class="hero-lede">Pruefe ob dein Monitor eine gleichmaessige Progression von schwarz nach weiss zeigt. 11 Stufen in 10% Schritten zeigen Fehlkonfigurationen.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="Helligkeits-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>Helligkeits-Test</h2><p class="section-lede">11 Stufen von schwarz nach weiss. Alle unterschiedlich = gesund.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
