<?php
/**
 * Spanish Click Speed Test - Prueba de Velocidad de Clic
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Test de Velocidad de Clic — Mide tus Clics por Segundo (CPS) Gratis | KeyboardTester.click';
$pageDescription = 'Test de velocidad de clic gratis online. Mide tus clics por segundo (CPS) con desafíos de 5, 10 o 60 segundos. Compara tu velocidad con jugadores casuales y profesionales. Técnicas Jitter Click, Butterfly Click. Sin instalación.';
$pageKeywords = 'test velocidad clic, prueba velocidad clic, CPS test, clics por segundo, test CPS, prueba CPS, velocidad de clic, test click speed español, prueba velocidad ratón, jitter click test, butterfly click test, test cps online';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('click-speed-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "¿Qué es el test de velocidad de clic (CPS)?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS significa Clics Por Segundo (Clicks Per Second). El test mide cuántos clics puedes hacer en un segundo o un minuto. Se utiliza para medir el rendimiento del ratón y tus habilidades de clic rápido en juegos competitivos como Minecraft PvP."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cuántos clics por segundo es bueno?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "El usuario promedio alcanza 5-7 CPS. Los jugadores intermedios llegan a 8-10 CPS, los profesionales hacen 10-14 CPS, y los campeones mundiales pueden superar los 15 CPS usando técnicas avanzadas."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cómo puedo aumentar mi velocidad de clic?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Las técnicas para mejorar incluyen: Jitter Click (vibración rápida del dedo), Butterfly Click (alternar entre dos dedos), y Drag Click (arrastre que activa clics múltiples). Practica 5-10 minutos al día y verás mejoras en pocas semanas. Usa un ratón con interruptores ligeros para mejores resultados."
        }
      },
      {
        "@type": "Question",
        "name": "¿Es seguro y gratis este test de CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Sí, completamente gratis y sin necesidad de registro o descarga. Funciona enteramente en tu navegador y no se envía ningún dato a servidores. Puedes hacer la prueba tantas veces como quieras sin restricciones."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cuál es la diferencia entre CPS y CPM?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS (Clics Por Segundo) se usa en pruebas cortas (5-10 segundos), mientras que CPM (Clics Por Minuto) se utiliza en pruebas más largas (60 segundos) y mide tu capacidad de mantener el ritmo. CPM es más representativo de tu velocidad real sostenida."
        }
      },
      {
        "@type": "Question",
        "name": "¿Funciona el test en móvil o tablet?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Sí, la prueba funciona en todos los dispositivos incluyendo móviles y tablets. En pantallas táctiles mide los toques por segundo en vez de clics de ratón. Los resultados son comparables entre dispositivos."
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

    <section class="cps-reference-es" aria-labelledby="cps-reference-es-title" style="padding:60px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;">
        <div class="section-head">
          <p class="section-kicker">Tabla de comparación</p>
          <h2 id="cps-reference-es-title">¿Cuántos clics por segundo es bueno?</h2>
          <p class="section-lede">Compara tu resultado del test con esta tabla para conocer tu nivel. Cuantos más clics por segundo, mejor para juegos PvP y combate rápido.</p>
        </div>
        <div style="overflow-x:auto;margin-top:24px;">
          <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
            <thead>
              <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
                <th style="text-align:left;padding:12px 16px;">Nivel</th>
                <th style="text-align:left;padding:12px 16px;">CPS</th>
                <th style="text-align:left;padding:12px 16px;">Descripción</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Principiante</strong></td><td style="padding:12px 16px;">1 – 4 CPS</td><td style="padding:12px 16px;">Velocidad normal de clic para uso diario y navegación.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Usuario promedio</strong></td><td style="padding:12px 16px;">5 – 7 CPS</td><td style="padding:12px 16px;">Velocidad típica de la mayoría de usuarios sin entrenamiento específico.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Jugador casual</strong></td><td style="padding:12px 16px;">8 – 10 CPS</td><td style="padding:12px 16px;">Buena velocidad para juegos competitivos ligeros.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Jugador profesional</strong></td><td style="padding:12px 16px;">10 – 14 CPS</td><td style="padding:12px 16px;">Velocidad alta que requiere entrenamiento regular y técnicas avanzadas.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Experto</strong></td><td style="padding:12px 16px;">14 – 18 CPS</td><td style="padding:12px 16px;">Nivel de Jitter Click y Butterfly Click dominados.</td></tr>
              <tr><td style="padding:12px 16px;"><strong>Campeón mundial</strong></td><td style="padding:12px 16px;">+18 CPS</td><td style="padding:12px 16px;">Nivel excepcional con técnicas Drag Click y equipo especializado.</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
          <strong>Consejo:</strong> la mejor manera de medir tu velocidad real es repetir la prueba 3-5 veces y calcular el promedio. Evita repetir cuando estés cansado, ya que los resultados dependen de la concentración y el nivel de energía. Practica las diferentes técnicas (Jitter, Butterfly) en sesiones cortas para evitar fatiga en los dedos.
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
