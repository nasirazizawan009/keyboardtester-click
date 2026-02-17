<?php
/**
 * Spanish Mouse Trail - Rastro del Ratón
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Rastro del Ratón - Visualiza el Movimiento del Cursor';
$pageDescription = 'Visualiza el rastro de movimiento del ratón. Analiza la precisión y fluidez del cursor.';
$pageKeywords = 'rastro ratón, mouse trail, movimiento cursor, visualizar ratón, precisión mouse';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

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
          <h1 id="hero-title">Rastro del Ratón</h1>
          <p class="hero-lede">Visualiza el rastro de movimiento y analiza la precisión de tu ratón.</p>
          <div class="hero-ctas">
            <a href="#trail-test" class="landing-btn landing-btn-primary">Iniciar Visualización</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Visualizador de Rastro</h2>
          <p class="section-lede">Mueve el ratón para ver el rastro de movimiento.</p>
        </div>
      </div>
      <section id="trail-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Rastro Visual</div>
          <div class="trust-desc">Ver movimiento</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precisión</div>
          <div class="trust-desc">Analizar fluidez</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tiempo Real</div>
          <div class="trust-desc">Visualización instantánea</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Personalizable</div>
          <div class="trust-desc">Ajustar opciones</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Usar el Visualizador de Rastro</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Mueve el Ratón</h3>
            <p>Desplaza el cursor por la pantalla.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observa el Rastro</h3>
            <p>Ve el patrón de movimiento.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Analiza Fluidez</h3>
            <p>Verifica movimiento suave.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajusta Opciones</h3>
            <p>Personaliza la visualización.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
