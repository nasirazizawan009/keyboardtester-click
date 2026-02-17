<?php
/**
 * Portuguese DPI Tester - Testador de DPI/Sensibilidade
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de DPI - Meca a Sensibilidade do Mouse';
$pageDescription = 'Teste e meca o DPI do seu mouse. Verifique a precisao de rastreamento e sensibilidade.';
$pageKeywords = 'DPI do mouse, sensibilidade do mouse, teste de DPI, teste de sensibilidade, calibrar mouse';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('dpi-tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-pt.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Testador de DPI do Mouse</h1>
          <p class="hero-lede">Meca o DPI e verifique a sensibilidade do seu mouse com precisao.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Testador de DPI</h2>
          <p class="section-lede">Mova o mouse uma distancia especifica para medir o DPI.</p>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medicao de DPI</div>
          <div class="trust-desc">Pontos por polegada</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sensibilidade</div>
          <div class="trust-desc">Precisao de movimento</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Calibracao</div>
          <div class="trust-desc">Ajuste perfeito</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Analise</div>
          <div class="trust-desc">Resultados detalhados</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Medir o DPI do Mouse</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Configure o DPI</h3>
            <p>Insira seu DPI atual se souber.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Mova o Mouse</h3>
            <p>Mova uma distancia medida.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Compare</h3>
            <p>Verifique o DPI calculado.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajuste</h3>
            <p>Calibre conforme necessario.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
