<?php
/**
 * Spanish Microphone Test - Prueba de Micrófono
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Prueba de Micrófono - Verifica tu Micrófono Gratis';
$pageDescription = 'Prueba tu micrófono en línea. Verifica la entrada de audio, niveles de volumen y calidad de grabación.';
$pageKeywords = 'prueba micrófono, test mic, verificar audio, probar micrófono, test de voz';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-test.php'); ?>">

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
          <h1 id="hero-title">Prueba de Micrófono</h1>
          <p class="hero-lede">Verifica que tu micrófono funcione correctamente. Prueba de entrada de audio.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">Iniciar Prueba</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Prueba de Micrófono</h2>
          <p class="section-lede">Permite el acceso al micrófono y habla para probar.</p>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Entrada de Audio</div>
          <div class="trust-desc">Verificación en vivo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Nivel de Volumen</div>
          <div class="trust-desc">Medidor visual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Calidad</div>
          <div class="trust-desc">Análisis de audio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">No se guarda nada</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Probar tu Micrófono</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Permite Acceso</h3>
            <p>Autoriza el uso del micrófono.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Habla</h3>
            <p>Di algo para probar.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Observa Niveles</h3>
            <p>Verifica el medidor de volumen.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajusta</h3>
            <p>Configura según necesites.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
