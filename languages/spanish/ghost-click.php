<?php
/**
 * Spanish Ghost Click Detector - Detector de Clics Fantasma
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Detector de Clics Fantasma - Detecta Clics No Deseados';
$pageDescription = 'Detecta clics fantasma y clics no intencionados de tu ratón. Identifica problemas de hardware del ratón.';
$pageKeywords = 'clics fantasma, detector clics, problemas ratón, clics involuntarios, ghost click';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-es.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Detector de Clics Fantasma</h1>
          <p class="hero-lede">Detecta clics no intencionados y problemas de doble clic de tu ratón.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">Iniciar Detección</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Detector de Clics Fantasma</h2>
          <p class="section-lede">Mueve el ratón sin hacer clic para detectar clics fantasma.</p>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Detección</div>
          <div class="trust-desc">Clics fantasma</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Doble Clic</div>
          <div class="trust-desc">Identificar problemas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Registro</div>
          <div class="trust-desc">Historial de clics</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Diagnóstico</div>
          <div class="trust-desc">Estado del ratón</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Detectar Clics Fantasma</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. No Hagas Clic</h3>
            <p>Mueve el ratón sin presionar.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observa</h3>
            <p>Mira si se detectan clics.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Prueba Botones</h3>
            <p>Verifica cada botón individualmente.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Revisa Registro</h3>
            <p>Analiza el historial de clics.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
