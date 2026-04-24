<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Tastatur-Polling-Rate-Test - USB Hz Schaetzer';
$pageDescription = 'Messen Sie die Abtastrate (Polling Rate in Hz) Ihrer Tastatur über das Auto-Repeat-Timing. Erkennt 125, 500, 1000 Hz und mehr, ohne Treiber oder Installation.';
$pageKeywords = 'tastatur polling test, tastatur Hz test';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Tastatur-Polling-Rate-Test</p>
<h1 class="hero-title">Tastatur-Polling-Rate-Test - USB Hz Schaetzer</h1>
<p class="hero-lede">Schaetze die Tastatur-Hz mit Browser-Auto-Repeat-Timing. Halte eine Taste fuer Intervall und geschaetzte Rate.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-polling-rate-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-polling-rate-test/keyboard-polling-rate-test-hero.jpg'); ?>" width="1280" height="720" alt="Tastatur-Polling" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-polling-rate-test"><div class="container tool-stage-header"><div><h2>Tastatur-Polling-Rate-Test</h2><p class="section-lede">Halte eine Taste 3+ Sekunden gedrueckt.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-polling-rate-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-polling-rate'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
