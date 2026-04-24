<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Gamma del Monitor - Calibracion sRGB 2.2';
$pageDescription = 'Prueba de gamma del monitor: mide visualmente la gamma con el patrón clásico de líneas mezcladas, objetivo sRGB 2.2. Ajuste rápido sin colorímetro ni software adicional.';
$pageKeywords = 'test gamma monitor, calibracion gamma, sRGB 2.2';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracion del Monitor</p>
<h1 class="hero-title">Test de Gamma del Monitor - Calibracion sRGB 2.2</h1>
<p class="hero-lede">Verificacion visual de calibracion gamma usando patron de mezcla de rayas. Ajusta el deslizador hasta que las rayas se mezclen con el gris solido.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-gamma-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-gamma-test/monitor-gamma-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de gamma del monitor" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-gamma-test"><div class="container tool-stage-header"><div><h2>Test de Gamma del Monitor</h2><p class="section-lede">Ajusta el deslizador hasta que las rayas se mezclen con el gris.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-gamma-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-gamma'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
