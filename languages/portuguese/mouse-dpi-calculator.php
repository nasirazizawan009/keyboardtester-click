<?php
/**
 * Portuguese Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Calculadora de DPI do Mouse - Meca o DPI Real Online';
$pageDescription = 'Calculadora gratuita de DPI do mouse. Meca o DPI real arrastando no pad ou digitando pixels e polegadas. Compare o DPI anunciado com o DPI real do sensor.';
$pageKeywords = 'calculadora dpi mouse, dpi real, medir dpi mouse, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Calculadoras de sensibilidade</p>
          <h1 class="hero-title">Calculadora de DPI do Mouse - Meca o DPI Real</h1>
          <p class="hero-lede">Verifique o DPI real do seu mouse. Arraste uma distância física conhecida (ou digite os valores) e calculamos o DPI real em pixels por polegada. Detecte imprecisões do sensor e compare com o valor anunciado.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">Medir DPI</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Como usar</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Pad de arraste</span>
            <span class="hero-badge">Entrada pixels + polegadas</span>
            <span class="hero-badge">DPI anunciado vs real</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta principal</p>
          <h2>Calculadora de DPI do Mouse</h2>
          <p class="section-lede">Digite pixels e polegadas, ou arraste no pad para medir.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Como calcular o DPI</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Desligue a aceleração</h3><p>Desative "Aumentar precisão do ponteiro" no Windows antes de medir.</p></div>
          <div class="guideline-card"><h3>2. Prepare uma régua</h3><p>Coloque uma régua ao lado do mousepad.</p></div>
          <div class="guideline-card"><h3>3. Arraste 10 cm ou 4 polegadas</h3><p>Mantenha pressionado e mova em linha reta.</p></div>
          <div class="guideline-card"><h3>4. Compare o DPI</h3><p>Digite o DPI anunciado e veja o desvio.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
