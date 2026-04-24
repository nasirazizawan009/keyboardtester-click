<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Nivel de Negro - Detector de Negros Aplastados';
$pageDescription = 'Prueba de nivel de negro del monitor: verifica si tu pantalla aplasta los detalles de sombra con 32 parches cercanos al negro. Detecta problemas de gamma y rango RGB limitado.';
$pageKeywords = 'test nivel negro, negros aplastados';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/black-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracion de Pantalla</p>
<h1 class="hero-title">Test de Nivel de Negro - Detector de Negros Aplastados</h1>
<p class="hero-lede">Verifica detalle de sombras con 32 parches cercanos al negro. Si los valores bajos no son visibles, tu monitor esta aplastando los negros.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#black-level-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/black-level-test/black-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Test nivel de negro" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="black-level-test"><div class="container tool-stage-header"><div><h2>Test de Nivel de Negro</h2><p class="section-lede">Cuenta los parches visibles 1-32.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/black-level-tool.php'; ?></section></section>
<?php $currentTool = 'black-level'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
