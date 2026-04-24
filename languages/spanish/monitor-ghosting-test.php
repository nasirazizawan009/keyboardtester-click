<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Ghosting del Monitor - Tiempo de Respuesta de Pixel';
$pageDescription = 'Prueba de ghosting del monitor: detecta problemas de tiempo de respuesta de píxeles con caja móvil de velocidad ajustable sobre fondos de color. Compara ajustes de overdrive.';
$pageKeywords = 'test ghosting monitor, tiempo respuesta pixel';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Diagnostico de Pantalla</p>
<h1 class="hero-title">Test de Ghosting del Monitor - Tiempo de Respuesta de Pixel</h1>
<p class="hero-lede">Detecta problemas de tiempo de respuesta de pixel. Una caja se mueve sobre fondos de colores; rastro o difuminacion = ghosting.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-ghosting-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de ghosting del monitor" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-ghosting-test"><div class="container tool-stage-header"><div><h2>Test de Ghosting del Monitor</h2><p class="section-lede">Observa la caja movil. Rastro detras = ghosting.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-ghosting-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-ghosting'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
