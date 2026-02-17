<?php
/**
 * Spanish Mouse Tester - Probador de Ratón
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Probador de Ratón - Prueba Clics y Desplazamiento Gratis';
$pageDescription = 'Prueba todos los botones del ratón, rueda de desplazamiento y movimiento del cursor. Detecta problemas con tu ratón al instante.';
$pageKeywords = 'probador ratón, test mouse, prueba clics, test desplazamiento, verificar botones ratón';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-tester.php'); ?>">

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
        "name": "¿Cómo pruebo los botones de mi ratón?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Haz clic en el área de prueba con cada botón del ratón. La herramienta detectará y mostrará qué botón fue presionado."
        }
      },
      {
        "@type": "Question",
        "name": "¿Puedo probar la rueda de desplazamiento?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Sí, desplaza hacia arriba y abajo sobre el área de prueba para verificar la funcionalidad de la rueda."
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
          <h1 id="hero-title">Probador de Ratón</h1>
          <p class="hero-lede">Prueba todos los botones, rueda de desplazamiento y movimiento. Detecta problemas al instante.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Probador de Ratón</h2>
          <p class="section-lede">Haz clic y desplaza en el área de prueba.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Consejos</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Todos los Botones</div>
          <div class="trust-desc">Izq, Der, Medio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Rueda</div>
          <div class="trust-desc">Arriba y Abajo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Contador</div>
          <div class="trust-desc">Seguimiento de Clics</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tiempo Real</div>
          <div class="trust-desc">Respuesta Instantánea</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Diagnóstico Completo</p>
          <h2 id="feature-title">Verifica Cada Función del Ratón</h2>
          <p class="section-lede">Herramientas profesionales para probar tu ratón.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Prueba de Botones</h3>
            <p>Verifica izquierdo, derecho y medio.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Rueda de Desplazamiento</h3>
            <p>Prueba el desplazamiento suave.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Contador de Clics</h3>
            <p>Rastrea el número de clics.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Estado en Vivo</h3>
            <p>Feedback visual instantáneo.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Probar tu Ratón</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Haz Clic en Botones</h3>
            <p>Prueba cada botón del ratón.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Usa la Rueda</h3>
            <p>Desplaza arriba y abajo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Mueve el Cursor</h3>
            <p>Verifica el movimiento suave.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Revisa Resultados</h3>
            <p>Ve el conteo y estado.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
