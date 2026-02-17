<?php
/**
 * Spanish Typing Speed Test - Prueba de Velocidad de Escritura
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Velocidad de Escritura - Mide WPM y Precisión';
$pageDescription = 'Mide tu velocidad de escritura en palabras por minuto (WPM) y precisión. Mejora tus habilidades de mecanografía.';
$pageKeywords = 'prueba escritura, WPM, velocidad mecanografía, test teclado, palabras por minuto';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

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
        "name": "¿Cuál es la velocidad promedio de escritura?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "El promedio es 40 WPM. Los mecanógrafos profesionales alcanzan 65-75 WPM."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cómo mejorar la velocidad de escritura?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Practica regularmente, usa todos los dedos y enfócate en la precisión antes que la velocidad."
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
          <h1 id="hero-title">Prueba de Velocidad de Escritura</h1>
          <p class="hero-lede">Mide tu WPM y precisión. Mejora tus habilidades de mecanografía.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Escritura</h2>
          <p class="section-lede">Escribe el texto mostrado lo más rápido y preciso posible.</p>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medición WPM</div>
          <div class="trust-desc">Palabras por minuto</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precisión</div>
          <div class="trust-desc">Porcentaje de aciertos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Textos Variados</div>
          <div class="trust-desc">Diferentes niveles</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Progreso</div>
          <div class="trust-desc">Seguimiento de mejora</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Usar la Prueba de Escritura</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecciona Duración</h3>
            <p>Elige el tiempo de prueba.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Escribe el Texto</h3>
            <p>Copia el texto mostrado.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Enfócate en Precisión</h3>
            <p>La precisión es más importante.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ve Resultados</h3>
            <p>Analiza tu WPM y errores.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
