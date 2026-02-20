<?php
/**
 * Spanish Headphone Test - Prueba de Auriculares
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Auriculares - Verifica Audio Estéreo Gratis';
$pageDescription = 'Prueba tus auriculares y altavoces. Verifica los canales izquierdo y derecho, balance estéreo y calidad de audio.';
$pageKeywords = 'prueba auriculares, test altavoces, verificar estéreo, probar audio, headphone test';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone-test.php'); ?>">

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
          <h1 id="hero-title">Prueba de Auriculares</h1>
          <p class="hero-lede">Verifica los canales estéreo y la calidad de audio de tus auriculares.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Auriculares</h2>
          <p class="section-lede">Reproduce audio en cada canal para verificar tus auriculares.</p>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Canal Izquierdo</div>
          <div class="trust-desc">Prueba individual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Canal Derecho</div>
          <div class="trust-desc">Prueba individual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Estéreo</div>
          <div class="trust-desc">Ambos canales</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Balance</div>
          <div class="trust-desc">Verificar equilibrio</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Probar tus Auriculares</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Conecta Auriculares</h3>
            <p>Asegúrate de que estén conectados.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Prueba Izquierdo</h3>
            <p>Reproduce audio solo en el izquierdo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Prueba Derecho</h3>
            <p>Reproduce audio solo en el derecho.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Verifica Balance</h3>
            <p>Prueba ambos canales juntos.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
