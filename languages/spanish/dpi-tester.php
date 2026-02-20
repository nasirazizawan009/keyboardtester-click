<?php
/**
 * Spanish DPI Tester - Probador de DPI/Sensibilidad
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Probador de DPI - Mide la Sensibilidad del Ratón';
$pageDescription = 'Prueba y mide el DPI de tu ratón. Verifica la precisión de seguimiento y sensibilidad.';
$pageKeywords = 'DPI ratón, sensibilidad mouse, test DPI, prueba sensibilidad, calibrar ratón';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('dpi-tester.php'); ?>">

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
          <h1 id="hero-title">Probador de DPI del Ratón</h1>
          <p class="hero-lede">Mide el DPI y verifica la sensibilidad de tu ratón con precisión.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Probador de DPI</h2>
          <p class="section-lede">Mueve el ratón una distancia específica para medir DPI.</p>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medición DPI</div>
          <div class="trust-desc">Puntos por pulgada</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sensibilidad</div>
          <div class="trust-desc">Precisión de movimiento</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Calibración</div>
          <div class="trust-desc">Ajuste perfecto</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Análisis</div>
          <div class="trust-desc">Resultados detallados</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Medir el DPI del Ratón</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Configura DPI</h3>
            <p>Ingresa tu DPI actual si lo conoces.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Mueve el Ratón</h3>
            <p>Mueve una distancia medida.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Compara</h3>
            <p>Verifica el DPI calculado.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajusta</h3>
            <p>Calibra según necesites.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
