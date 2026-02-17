<?php
/**
 * Spanish Click Speed Test - Prueba de Velocidad de Clic
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Velocidad de Clic - Mide tu CPS Gratis';
$pageDescription = 'Mide tu velocidad de clic (CPS - Clics Por Segundo). Prueba tu velocidad con diferentes duraciones de tiempo.';
$pageKeywords = 'velocidad clic, CPS test, clics por segundo, prueba velocidad mouse, click speed test';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('click-speed-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "¿Qué es CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS significa Clics Por Segundo. Mide cuántas veces puedes hacer clic en un segundo."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cuál es una buena velocidad de CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "El promedio es 6-8 CPS. Los jugadores profesionales pueden alcanzar 10-14 CPS."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-es.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Prueba de Velocidad de Clic</h1>
          <p class="hero-lede">Mide tu CPS y mejora tu velocidad de clic con pruebas cronometradas.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Velocidad de Clic</h2>
          <p class="section-lede">Haz clic lo más rápido posible en el área de prueba.</p>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medición CPS</div>
          <div class="trust-desc">Clics por segundo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Múltiples Duraciones</div>
          <div class="trust-desc">5s, 10s, 30s, 60s</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Estadísticas</div>
          <div class="trust-desc">Total y promedio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantáneo</div>
          <div class="trust-desc">Resultados en vivo</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Medir tu Velocidad de Clic</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecciona Duración</h3>
            <p>Elige el tiempo de prueba.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Haz Clic Rápido</h3>
            <p>Haz clic lo más rápido posible.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Mantén el Ritmo</h3>
            <p>Consistencia sobre velocidad.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ve Resultados</h3>
            <p>Revisa tu CPS y total.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
