<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculadora de PPI - Pixels por Polegada da Resolução';
$pageDescription = 'Calculadora PPI: calcula pixels por polegada, passo de ponto, proporção e megapixels para qualquer tela a partir de resolução e diagonal. Gratuito, instantâneo.';
$pageKeywords = 'calculadora ppi, pixels por polegada, dpi monitor, densidade tela';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculadoras de tela</p>
        <h1 class="hero-title">Calculadora PPI - Pixels por Polegada</h1>
        <p class="hero-lede">Informe a resolução e o tamanho diagonal para obter PPI, passo de ponto, proporção e total de megapixels. Presets de monitores, notebooks e celulares inclusos.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">Calcular PPI</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + passo de ponto</span><span class="hero-badge">Proporção</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Ferramenta principal</p><h2>Calculadora PPI</h2><p class="section-lede">Resolução + diagonal → PPI instantâneo.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
