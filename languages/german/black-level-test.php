<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Schwarzwert-Test - Zerquetschte Schwarzwerte Detektor';
$pageDescription = 'Schwarzwert-Test des Monitors: Prüft, ob Ihr Display Schattendetails zerquetscht, mit 32 Nahschwarz-Feldern. Erkennt Gamma-Probleme und begrenzte RGB-Range, ohne Installation.';
$pageKeywords = 'schwarzwert test, zerquetschte schwarzwerte';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/black-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Display-Kalibrierung</p>
<h1 class="hero-title">Schwarzwert-Test - Zerquetschte Schwarzwerte Detektor</h1>
<p class="hero-lede">Pruefe Schattendetails mit 32 fast-schwarzen Patches. Wenn niedrige Werte unsichtbar sind, zerquetscht dein Monitor die Schwarzwerte.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#black-level-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/black-level-test/black-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Schwarzwert-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="black-level-test"><div class="container tool-stage-header"><div><h2>Schwarzwert-Test</h2><p class="section-lede">Zaehle sichtbare Patches 1-32.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/black-level-tool.php'; ?></section></section>
<?php $currentTool = 'black-level'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
