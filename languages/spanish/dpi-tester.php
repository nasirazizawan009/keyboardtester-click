<?php
/**
 * Spanish DPI Tester - Probador de DPI/Sensibilidad
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Test de DPI del Ratón — Mide tu DPI Real Online con Regla | KeyboardTester.click';
$pageDescription = 'Test de DPI del ratón gratis online. Mide el DPI real de tu ratón usando la distancia física con una regla. DPI recomendado para gaming FPS, MOBA y diseño. Sin instalación, navegador 100%.';
$pageKeywords = 'test DPI ratón, prueba DPI, DPI checker, comprobar DPI, test sensibilidad ratón, calculadora DPI, medir DPI ratón, mouse dpi test español, calibrar DPI, test DPI online';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('dpi-tester.php'); ?>">

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
        "name": "¿Cómo se mide el DPI del ratón online?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Coloca una regla real bajo el ratón, configura la distancia conocida en la herramienta y arrastra el ratón exactamente esa distancia en línea recta. La herramienta mide el desplazamiento del cursor en píxeles y lo divide entre la distancia física para calcular el DPI real. Repite 3 veces y promedia para mayor precisión."
        }
      },
      {
        "@type": "Question",
        "name": "¿Cuál es un buen DPI para juegos?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Los profesionales de FPS competitivos usan 400-800 DPI para precisión. Los jugadores de MOBA y RTS usan 800-1200 DPI. Jugadores casuales y trabajo de oficina: 800-1600 DPI. Pantallas de alta resolución (1440p, 4K) suelen necesitar 1600-2400 DPI."
        }
      },
      {
        "@type": "Question",
        "name": "¿Por qué mi DPI medido difiere del DPI publicitado?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Tres causas comunes: (1) Multiplicador de velocidad de Windows — ponlo en la 6ª muesca (sin mejora) para mediciones precisas; (2) 'Mejorar la precisión del puntero' activado — desactívalo; (3) DPI escalado por software — configura el ratón al DPI nativo del sensor (típicamente 400, 800, 1600)."
        }
      },
      {
        "@type": "Question",
        "name": "¿Qué diferencia hay entre DPI y CPI?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "DPI (Dots Per Inch) y CPI (Counts Per Inch) miden lo mismo: cuántos movimientos de píxel reporta el cursor por pulgada de movimiento físico del ratón. CPI es técnicamente más correcto, pero DPI es el término estándar usado por todos los fabricantes."
        }
      },
      {
        "@type": "Question",
        "name": "¿Puedo medir el DPI sin una regla?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Necesitas alguna distancia de referencia conocida. Una tarjeta de crédito (85.6mm de ancho), un billete o cualquier objeto con dimensiones documentadas funciona. Sin referencia física la medición es imposible porque los píxeles no tienen un tamaño fijo en el mundo real."
        }
      },
      {
        "@type": "Question",
        "name": "¿Funciona el test en touchpad de portátil?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Los touchpads no tienen un DPI significativo en el mismo sentido que los ratones — usan posicionamiento absoluto con curvas de aceleración aplicadas por el sistema operativo. La herramienta producirá un número, pero no coincidirá con nada del fabricante. Para resultados significativos, usa la herramienta con un ratón externo."
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

    <section class="dpi-reference-es" aria-labelledby="dpi-reference-es-title" style="padding:60px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;">
        <div class="section-head">
          <p class="section-kicker">Referencia</p>
          <h2 id="dpi-reference-es-title">DPI recomendado por uso</h2>
          <p class="section-lede">Ejecuta el test de DPI arriba para ver tu configuración actual, luego compárala con lo que mejor funciona para tu actividad. DPI más bajo = movimientos pequeños más precisos; DPI más alto = recorrido del cursor más rápido.</p>
        </div>
        <div style="overflow-x:auto;margin-top:24px;">
          <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
            <thead>
              <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
                <th style="text-align:left;padding:12px 16px;">Uso</th>
                <th style="text-align:left;padding:12px 16px;">DPI recomendado</th>
                <th style="text-align:left;padding:12px 16px;">Por qué</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>FPS competitivo (CS, Valorant)</strong></td><td style="padding:12px 16px;">400 – 800</td><td style="padding:12px 16px;">Los pros prefieren DPI bajo para microajustes precisos y memoria muscular consistente.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>MOBA / RTS</strong></td><td style="padding:12px 16px;">800 – 1200</td><td style="padding:12px 16px;">Equilibrado: rápido para mover por el mapa, preciso para seleccionar unidades.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Gaming casual y productividad</strong></td><td style="padding:12px 16px;">800 – 1600</td><td style="padding:12px 16px;">Cómodo para uso diario en monitor de escritorio típico.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Monitor 4K / multi-monitor</strong></td><td style="padding:12px 16px;">1600 – 2400</td><td style="padding:12px 16px;">Mayor cantidad de píxeles requiere más DPI para recorrer la pantalla sin arrastrar el ratón repetidamente.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Diseño gráfico y CAD</strong></td><td style="padding:12px 16px;">1200 – 2400</td><td style="padding:12px 16px;">DPI medio-alto da precisión para trabajo fino; muchos diseñadores también usan tableta.</td></tr>
              <tr><td style="padding:12px 16px;"><strong>Gaming en pantalla 27"+ 4K</strong></td><td style="padding:12px 16px;">1600 – 3200</td><td style="padding:12px 16px;">Los ratones gaming modernos soportan hasta 26000 DPI pero la mayoría no superan 3200 incluso en pantallas grandes.</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
          <strong>Cómo interpretar tu resultado:</strong> si el DPI mostrado por esta herramienta difiere significativamente del DPI publicado de tu ratón, las causas habituales son: (a) multiplicador de velocidad del puntero de Windows (ponlo en "6ª muesca / sin mejora"), (b) "Mejorar precisión del puntero" activado (desactívalo), o (c) el ratón está reportando un DPI escalado por software en vez del DPI nativo del sensor.
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
