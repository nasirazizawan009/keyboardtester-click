<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Duplo Clique do Teclado - Detector de Chatter';
$pageDescription = 'Detector de duplo toque do teclado: identifica teclas que registram dois eventos em uma única pressão. Limite configurável, log completo, sem instalação.';
$pageKeywords = 'duplo clique teclado, detector chatter teclado, key chatter';
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Detector de Chatter do Teclado</p>
<h1 class="hero-title">Teste de Duplo Clique do Teclado - Detector de Chatter</h1>
<p class="hero-lede">Detecte teclas que registram duas vezes em uma pressao. Limite configuravel 30-150ms com estatisticas por tecla.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">Iniciar</a></div>
<div class="hero-badges"><span class="hero-badge">Limite configuravel</span><span class="hero-badge">Stats por tecla</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="Teste de chatter do teclado" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>Detector de Chatter do Teclado</h2><p class="section-lede">Pressione cada tecla uma vez. Teclas que chatter aparecerao abaixo.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
