<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Deriva do Mouse - Detecta Tremulação do Sensor';
$pageDescription = 'Teste gratuito de deriva do mouse. Detecte movimento do cursor em repouso e tremulação do sensor. Configurável de 10 s a 3 min, direto no navegador.';
$pageKeywords = 'teste deriva mouse, cursor deriva, sensor tremulacao, mouse drift test';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnóstico de mouse</p>
        <h1 class="hero-title">Teste de Deriva do Mouse - Tremulação do Sensor</h1>
        <p class="hero-lede">O cursor se move sem você tocar no mouse? O teste de deriva amostra cada evento de ponteiro durante 10-180 segundos e informa deriva total, maior salto e veredito aprovado/falhou.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">Iniciar teste</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Precisão por pixel</span><span class="hero-badge">10s - 3 min</span><span class="hero-badge">Veredito</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta principal</p><h2>Teste de Deriva do Mouse</h2><p class="section-lede">Deixe o mouse parado e clique em Iniciar.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Como detectar deriva</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Mão fora</h3><p>Não toque no mouse.</p></div>
        <div class="guideline-card"><h3>2. Inicie</h3><p>Escolha a duração.</p></div>
        <div class="guideline-card"><h3>3. Leia o veredito</h3><p>0 px = perfeito, &lt;5 = normal.</p></div>
        <div class="guideline-card"><h3>4. Corrija</h3><p>Mousepad real, aceleração desligada.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
