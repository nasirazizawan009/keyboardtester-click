<?php
/**
 * Spanish Screen Test - Prueba de Pantalla
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Pantalla - Detecta Píxeles Muertos Gratis';
$pageDescription = 'Detecta píxeles muertos, atascados o calientes en tu monitor. Prueba completa de pantalla con colores sólidos.';
$pageKeywords = 'prueba pantalla, píxeles muertos, test monitor, detectar píxeles, prueba LCD';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screen-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screen-test.php'); ?>">

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
          <h1 id="hero-title">Prueba de Pantalla</h1>
          <p class="hero-lede">Detecta píxeles muertos o atascados en tu monitor con colores de prueba.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Pantalla</h2>
          <p class="section-lede">Haz clic en los colores para probar tu pantalla completa.</p>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Píxeles Muertos</div>
          <div class="trust-desc">Detección precisa</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Colores Sólidos</div>
          <div class="trust-desc">RGB completo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Pantalla Completa</div>
          <div class="trust-desc">Prueba total</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Fácil de Usar</div>
          <div class="trust-desc">Un clic para probar</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Probar tu Pantalla</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecciona Color</h3>
            <p>Elige un color de prueba.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Pantalla Completa</h3>
            <p>Activa el modo pantalla completa.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Inspecciona</h3>
            <p>Busca puntos anormales.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Prueba Todos</h3>
            <p>Repite con cada color.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
