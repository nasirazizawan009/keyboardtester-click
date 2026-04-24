<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Aceleração do Mouse - Deslize Lento vs Rápido';
$pageDescription = 'Teste gratuito de aceleração do mouse. Compare os pixels percorridos em um deslize lento e um rápido para detectar aceleração do ponteiro no Windows ou no firmware do sensor.';
$pageKeywords = 'teste aceleracao mouse, ponteiro windows aceleracao, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnóstico de mouse</p>
        <h1 class="hero-title">Teste de Aceleração do Mouse</h1>
        <p class="hero-lede">O Windows ou o firmware do seu mouse estão adicionando aceleração silenciosamente e quebrando sua consistência? Deslize a mesma distância física devagar e depois rápido — se os pixels aumentam com a velocidade, há aceleração. A ferramenta mostra a razão exata rápido/lento.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">Iniciar teste</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Precisão por pixel</span><span class="hero-badge">Veredito por razão</span><span class="hero-badge">Sem instalação</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta principal</p><h2>Teste de Aceleração do Mouse</h2><p class="section-lede">Arraste devagar, depois rápido, mesma distância.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Como detectar aceleração</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Arraste devagar</h3><p>Cerca de 2 segundos.</p></div>
        <div class="guideline-card"><h3>2. Arraste rápido</h3><p>Mesma distância, &lt; 0,5 s.</p></div>
        <div class="guideline-card"><h3>3. Veja a razão</h3><p>1,00 = perfeito, &gt;1,15 = aceleração.</p></div>
        <div class="guideline-card"><h3>4. Desative</h3><p>"Aumentar precisão do ponteiro" no Windows.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
