<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Monitor-Ghosting-Test - Pixel-Reaktionszeit';
$pageDescription = 'Monitor-Ghosting-Test: Erkennt Pixel-Reaktionszeit-Probleme mit einer Box, deren Geschwindigkeit anpassbar ist, auf farbigen Hintergründen. Vergleicht Overdrive-Einstellungen.';
$pageKeywords = 'monitor ghosting test, pixel reaktionszeit';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Display-Diagnose</p>
<h1 class="hero-title">Monitor-Ghosting-Test - Pixel-Reaktionszeit</h1>
<p class="hero-lede">Erkenne Pixel-Reaktionszeit-Probleme. Eine Box bewegt sich ueber farbige Hintergruende; Schweif oder Verschmierung = Ghosting.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-ghosting-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg'); ?>" width="1280" height="720" alt="Monitor-Ghosting-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-ghosting-test"><div class="container tool-stage-header"><div><h2>Monitor-Ghosting-Test</h2><p class="section-lede">Beobachte die Box. Schweif dahinter = Ghosting.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-ghosting-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-ghosting'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
