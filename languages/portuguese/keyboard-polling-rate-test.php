<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Polling do Teclado - Estimador de Hz USB';
$pageDescription = 'Meça a taxa de polling (Hz) do seu teclado através do timing de auto-repetição. Detecta 125, 500, 1000 Hz e superiores, sem drivers nem instalação.';
$pageKeywords = 'teste polling teclado, teclado Hz';
?>
<!DOCTYPE html>
<html lang="pt"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Teste de Polling do Teclado</p>
<h1 class="hero-title">Teste de Polling do Teclado - Estimador de Hz USB</h1>
<p class="hero-lede">Estime o Hz do teclado via medicao de auto-repeat do navegador. Mantenha uma tecla para ver intervalo e taxa estimada.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-polling-rate-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-polling-rate-test/keyboard-polling-rate-test-hero.jpg'); ?>" width="1280" height="720" alt="Polling do teclado" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-polling-rate-test"><div class="container tool-stage-header"><div><h2>Teste de Polling do Teclado</h2><p class="section-lede">Mantenha uma tecla por 3+ segundos.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-polling-rate-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-polling-rate'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
