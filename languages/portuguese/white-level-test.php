<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Nivel de Branco - Detector de Brancos Cortados';
$pageDescription = 'Teste de nível de branco do monitor: verifica se sua tela corta detalhes claros com 32 painéis próximos ao branco. Detecta brancos estourados e problemas de contraste.';
$pageKeywords = 'teste nivel branco, brancos cortados';
?>
<!DOCTYPE html>
<html lang="pt"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/white-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Calibracao do Monitor</p>
<h1 class="hero-title">Teste de Nivel de Branco - Detector de Brancos Cortados</h1>
<p class="hero-lede">Verifique detalhe de altas luzes com 32 patches proximos ao branco. Se valores altos sao invisiveis, seu monitor corta as altas luzes.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#white-level-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/white-level-test/white-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Teste nivel de branco" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="white-level-test"><div class="container tool-stage-header"><div><h2>Teste de Nivel de Branco</h2><p class="section-lede">Conte os patches visiveis 223-254.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/white-level-tool.php'; ?></section></section>
<?php $currentTool = 'white-level'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
