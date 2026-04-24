<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Medidor de Decibeles Online - dB SPL en Vivo via Microfono';
$pageDescription = 'Decibelímetro online usando tu micrófono: lectura en vivo de dB SPL, seguimiento de picos y promedio móvil de 100 muestras. Mide el ruido ambiente sin instalar apps.';
$pageKeywords = 'medidor decibeles, dB meter online, medidor SPL';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Diagnostico de Audio</p>
<h1 class="hero-title">Medidor de Decibeles Online - dB SPL en Vivo via Microfono</h1>
<p class="hero-lede">Mide niveles de ruido ambiente usando el microfono de tu dispositivo. Lectura dB en vivo, pico y promedio.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="Medidor de decibeles" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>Medidor de Decibeles</h2><p class="section-lede">Pulsa Iniciar y permite acceso al microfono.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
