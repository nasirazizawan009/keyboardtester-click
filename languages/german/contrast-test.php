<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Kontrast-Test - Schachbrett-Kalibrierung';
$pageDescription = 'Monitor-Kontrasttest: Schachbrettmuster neben 50%-Grau zeigt Kontrast- und Gammaprobleme. Ideal für schnelle visuelle Feinabstimmung, ohne spezielle Hardware.';
$pageKeywords = 'kontrast test, monitor kontrast kalibrierung';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Display-Kalibrierung</p>
<h1 class="hero-title">Kontrast-Test - Schachbrett-Kalibrierung</h1>
<p class="hero-lede">Pruefe Kontrastkalibrierung mit einem Schwarz-Weiss-Schachbrett neben Volltongrau 50%. Schachbrett-Durchschnitt sollte beim Schielen mit Grau uebereinstimmen.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="Kontrast-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>Kontrast-Test</h2><p class="section-lede">Schiele leicht. Schachbrett sollte wie Grau aussehen.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
