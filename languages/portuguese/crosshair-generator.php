<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Gerador de Mira - Crosshair Personalizado para CS2 e Valorant';
$pageDescription = 'Gerador de mira gratuito online. Crie uma mira personalizada com prévia ao vivo, baixe em PNG, copie o comando de console CS2 ou os valores do Valorant.';
$pageKeywords = 'gerador mira, crosshair personalizado, mira cs2, mira valorant, crosshair generator';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Ferramentas de mira</p>
        <h1 class="hero-title">Gerador de Mira - Crosshair Personalizado</h1>
        <p class="hero-lede">Crie uma mira com prévia ao vivo. Escolha um preset pro (s1mple, TenZ) ou ajuste cada parâmetro: forma, cor, espessura, comprimento, espaço, ponto central e contorno. Baixe um PNG transparente ou copie o comando de console pronto para CS2.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">Abrir gerador</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Prévia ao vivo</span><span class="hero-badge">Comando CS2</span><span class="hero-badge">Valores Valorant</span><span class="hero-badge">PNG transparente</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta principal</p><h2>Gerador de Mira</h2><p class="section-lede">Ajuste parâmetros e exporte para CS2, Valorant ou PNG.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Como aplicar a mira</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Escolha preset</h3><p>Comece de um preset pro e ajuste.</p></div>
        <div class="guideline-card"><h3>2. Ajuste a prévia</h3><p>Forma, cor e contorno em tempo real.</p></div>
        <div class="guideline-card"><h3>3. Exporte</h3><p>Baixe PNG ou copie comando CS2.</p></div>
        <div class="guideline-card"><h3>4. Aplique</h3><p>Cole no console (~) ou insira no Valorant.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
