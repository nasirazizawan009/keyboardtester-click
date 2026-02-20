<?php
/**
 * Spanish Latency Checker - Verificador de Latencia
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Verificador de Latencia - Mide Tiempo de Respuesta';
$pageDescription = 'Mide el tiempo de respuesta de tus dispositivos de entrada. Prueba de latencia precisa en milisegundos.';
$pageKeywords = 'latencia, tiempo respuesta, input lag, prueba latencia, medir retraso';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
          <h1 id="hero-title">Verificador de Latencia</h1>
          <p class="hero-lede">Mide tu tiempo de reacción y latencia de entrada con precisión.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Verificador de Latencia</h2>
          <p class="section-lede">Espera la señal y haz clic lo más rápido posible.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Precisión</div>
          <div class="trust-desc">En milisegundos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Promedio</div>
          <div class="trust-desc">Estadísticas completas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Visual</div>
          <div class="trust-desc">Prueba de reacción</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantáneo</div>
          <div class="trust-desc">Resultados inmediatos</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Medir tu Tiempo de Reacción</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Prepárate</h3>
            <p>Coloca la mano en el ratón.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Espera Señal</h3>
            <p>Aguarda el cambio de color.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Haz Clic</h3>
            <p>Reacciona lo más rápido posible.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ve Resultados</h3>
            <p>Tiempo en milisegundos.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
