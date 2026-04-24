<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Nivel de Blanco - Detector de Blancos Recortados';
$pageDescription = 'Prueba de nivel de blanco del monitor: verifica si tu pantalla recorta los detalles brillantes con 32 parches cercanos al blanco. Detecta blancos quemados y problemas de contraste.';
$pageKeywords = 'test nivel blanco, blancos recortados';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/white-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracion de Pantalla</p>
<h1 class="hero-title">Test de Nivel de Blanco - Detector de Blancos Recortados</h1>
<p class="hero-lede">Verifica detalle de luces altas con 32 parches cercanos al blanco. Si los valores altos no son visibles, tu monitor recorta las luces.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#white-level-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/white-level-test/white-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Test nivel de blanco" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="white-level-test"><div class="container tool-stage-header"><div><h2>Test de Nivel de Blanco</h2><p class="section-lede">Cuenta los parches visibles 223-254.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/white-level-tool.php'; ?></section></section>
<?php $currentTool = 'white-level'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
