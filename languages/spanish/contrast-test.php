<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Test de Contraste del Monitor - Calibracion con Tablero';
$pageDescription = 'Prueba de contraste del monitor: patrón de tablero de ajedrez junto a gris 50% revela problemas de contraste y gamma. Ideal para ajuste visual rápido sin hardware.';
$pageKeywords = 'test contraste monitor, calibracion contraste, test tablero';
?>
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracion de Pantalla</p>
<h1 class="hero-title">Test de Contraste del Monitor - Calibracion con Tablero</h1>
<p class="hero-lede">Verifica calibracion de contraste con un tablero blanco-y-negro junto a un 50% gris solido. El promedio del tablero debe coincidir con el gris al entrecerrar.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="Test de contraste del monitor" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>Test de Contraste del Monitor</h2><p class="section-lede">Entrecierra los ojos. El tablero debe verse igual al gris.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
