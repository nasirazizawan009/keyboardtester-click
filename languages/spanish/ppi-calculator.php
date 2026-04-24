<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculadora de PPI - Píxeles por Pulgada desde Resolución';
$pageDescription = 'Calculadora gratuita de PPI (píxeles por pulgada) online. Calcula PPI, paso de punto, relación de aspecto y megapíxeles para cualquier pantalla desde resolución y diagonal.';
$pageKeywords = 'calculadora ppi, pixeles por pulgada, dpi monitor, calculadora densidad pantalla';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculadoras de pantalla</p>
        <h1 class="hero-title">Calculadora PPI - Píxeles por Pulgada</h1>
        <p class="hero-lede">Introduce la resolución y el tamaño diagonal para calcular PPI, paso de punto, relación de aspecto y total de megapíxeles. Incluye preajustes para monitores, portátiles y teléfonos.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">Calcular PPI</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Cómo usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + paso de punto</span><span class="hero-badge">Relación de aspecto</span><span class="hero-badge">Nivel Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Herramienta principal</p><h2>Calculadora PPI</h2><p class="section-lede">Resolución + diagonal → PPI al instante.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
