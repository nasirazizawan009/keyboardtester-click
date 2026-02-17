<?php
/**
 * Spanish Webcam Test - Prueba de Cámara Web
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Cámara Web - Verifica tu Webcam Gratis';
$pageDescription = 'Prueba tu cámara web en línea. Verifica la calidad de video, resolución y funcionamiento.';
$pageKeywords = 'prueba webcam, test cámara, verificar cámara web, probar video, webcam test';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcam-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcam-test.php'); ?>">

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
          <h1 id="hero-title">Prueba de Cámara Web</h1>
          <p class="hero-lede">Verifica que tu webcam funcione. Prueba calidad y resolución de video.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Cámara Web</h2>
          <p class="section-lede">Permite el acceso a la cámara para ver la transmisión en vivo.</p>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Video en Vivo</div>
          <div class="trust-desc">Previsualización</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Resolución</div>
          <div class="trust-desc">Verificar calidad</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Captura</div>
          <div class="trust-desc">Tomar fotos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">Sin grabación</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Probar tu Cámara Web</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Permite Acceso</h3>
            <p>Autoriza el uso de la cámara.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Verifica Video</h3>
            <p>Observa la transmisión en vivo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Prueba Calidad</h3>
            <p>Revisa la resolución y nitidez.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Toma Captura</h3>
            <p>Guarda una foto de prueba.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
