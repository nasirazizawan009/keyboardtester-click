<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de CPS Clique Direito - Velocidade do Botao Direito';
$pageDescription = 'Teste de CPS com clique direito: mede a velocidade de clique direito (cliques por segundo) com o menu de contexto desativado. Ideal para gamers e testes de switches.';
$pageKeywords = 'teste CPS clique direito, right click CPS';
?>
<!DOCTYPE html>
<html lang="pt">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Testador de CPS Clique Direito</p>
<h1 class="hero-title">Teste de CPS Clique Direito - Velocidade do Botao Direito</h1>
<p class="hero-lede">Meca cliques por segundo do botao direito em sessoes de 5, 10 ou 30 segundos. Menu de contexto do navegador suprimido.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">Iniciar</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">Como Usar</a>
</div>
<div class="hero-badges"><span class="hero-badge">Apenas clique direito</span><span class="hero-badge">CPS pico</span><span class="hero-badge">Menu de contexto off</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="Teste de CPS clique direito" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta Principal</p><h2>Testador de CPS Clique Direito</h2><p class="section-lede">Clique direito na area o mais rapido possivel.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>Como Usar</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. Configure</h3><p>Escolha duracao.</p></div>
<div class="guideline-card"><h3>2. Clique direito rapido</h3><p>Clique direito na area.</p></div>
<div class="guideline-card"><h3>3. Leia resultados</h3><p>Total, CPS, pico.</p></div>
<div class="guideline-card"><h3>4. Compare</h3><p>Compare com CPS esquerdo.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
