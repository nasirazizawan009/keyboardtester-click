<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Brillo del Monitor - Escalera de Calibracion 11 Pasos';
$pageDescription = 'Prueba de brillo del monitor: escalera de escala de grises de 11 pasos revela problemas de brillo, contraste y gamma. Rápida herramienta visual de calibración en navegador.';
$pageKeywords = 'test brillo monitor, calibracion brillo';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracion de Pantalla</p>
<h1 class="hero-title">Test de Brillo del Monitor - Escalera de Calibracion 11 Pasos</h1>
<p class="hero-lede">Verifica si tu monitor muestra una progresion uniforme de negro a blanco. 11 pasos en incrementos del 10% revelan mala configuracion.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de brillo del monitor" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>Test de Brillo del Monitor</h2><p class="section-lede">11 pasos de negro a blanco. Todos distintos = saludable.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
