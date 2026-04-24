<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Online Dezibel-Messer - Live dB SPL via Mikrofon';
$pageDescription = 'Dezibelmesser online mit Ihrem Mikrofon: Live-Anzeige dB SPL, Spitzenverfolgung und gleitender Durchschnitt über 100 Samples. Messen Sie Umgebungslärm ohne Installation.';
$pageKeywords = 'dezibel messer, dB meter online, schallpegel messer';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Audio-Diagnose</p>
<h1 class="hero-title">Online Dezibel-Messer - Live dB SPL via Mikrofon</h1>
<p class="hero-lede">Miss Umgebungsgeraeusche mit dem Mikrofon deines Geraets. Live dB-Anzeige, Spitzenwert und Durchschnitt.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="Dezibel-Messer" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>Dezibel-Messer</h2><p class="section-lede">Druecke Start und erlaube Mikrofonzugriff.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
