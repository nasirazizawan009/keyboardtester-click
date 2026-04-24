<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Prueba de CPS Clic Derecho - Velocidad del Boton Derecho';
$pageDescription = 'Prueba de CPS con clic derecho: mide la velocidad de clic derecho (clics por segundo) con el menú contextual desactivado. Ideal para gamers y testeo de switches.';
$pageKeywords = 'prueba CPS clic derecho, right click CPS';
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Probador de CPS Clic Derecho</p>
<h1 class="hero-title">Prueba de CPS Clic Derecho - Velocidad del Boton Derecho</h1>
<p class="hero-lede">Mide los clics por segundo del boton derecho en sesiones de 5, 10 o 30 segundos. Menu contextual del navegador suprimido.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">Iniciar Prueba</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">Como Usar</a>
</div>
<div class="hero-badges"><span class="hero-badge">Solo clic derecho</span><span class="hero-badge">CPS pico</span><span class="hero-badge">Menu contextual off</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="Prueba de CPS clic derecho" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">Herramienta Principal</p><h2>Probador de CPS Clic Derecho</h2><p class="section-lede">Clic derecho en el area lo mas rapido posible.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>Como Usar la Prueba</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. Configura</h3><p>Elige duracion (5s/10s/30s).</p></div>
<div class="guideline-card"><h3>2. Clic derecho rapido</h3><p>Clic derecho en el area.</p></div>
<div class="guideline-card"><h3>3. Lee resultados</h3><p>Total, CPS, pico.</p></div>
<div class="guideline-card"><h3>4. Compara</h3><p>Compara con CPS izquierdo.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
