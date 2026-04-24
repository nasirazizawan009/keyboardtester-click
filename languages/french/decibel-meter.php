<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-fr.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Sonometre dB en Ligne - Mesure dB SPL Live via Microphone';
$pageDescription = 'Sonomètre en ligne avec votre microphone : lecture en direct dB SPL, suivi des pics et moyenne glissante sur 100 échantillons. Mesurez le bruit ambiant sans installer.';
$pageKeywords = 'sonometre dB, mesure decibels, dB meter';
?>
<!DOCTYPE html>
<html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-fr.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Diagnostic Audio</p>
<h1 class="hero-title">Sonometre dB en Ligne - Mesure dB SPL Live via Microphone</h1>
<p class="hero-lede">Mesurez les niveaux de bruit ambiant via le microphone de votre appareil. Lecture dB en direct, pic et moyenne.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">Demarrer</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="Sonometre dB" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>Sonometre dB</h2><p class="section-lede">Appuyez Demarrer et autorisez l'acces au microphone.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-fr.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-fr.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
