<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Prueba de Aceleración del Ratón - Deslizamiento Lento vs Rápido';
$pageDescription = 'Prueba gratuita de aceleración del ratón. Compara los píxeles recorridos en un deslizamiento lento y otro rápido para detectar aceleración del puntero en Windows o en el firmware del sensor.';
$pageKeywords = 'prueba aceleracion raton, detectar aceleracion puntero, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnóstico de ratón</p>
        <h1 class="hero-title">Prueba de Aceleración del Ratón</h1>
        <p class="hero-lede">¿Windows o el firmware de tu ratón están añadiendo aceleración silenciosamente y rompiendo tu consistencia? Desliza la misma distancia física lento y luego rápido — si la cantidad de píxeles aumenta con la velocidad, hay aceleración. La herramienta muestra el ratio exacto rápido/lento.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">Iniciar prueba</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Cómo usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Precisión por píxel</span><span class="hero-badge">Veredicto por ratio</span><span class="hero-badge">Sin instalación</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Herramienta principal</p><h2>Prueba de Aceleración del Ratón</h2><p class="section-lede">Arrastra despacio, luego rápido, la misma distancia.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Cómo detectar aceleración</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Desliza lento</h3><p>Unos 2 segundos.</p></div>
        <div class="guideline-card"><h3>2. Desliza rápido</h3><p>Misma distancia, menos de 0,5 s.</p></div>
        <div class="guideline-card"><h3>3. Lee el ratio</h3><p>1,00 = perfecto, &gt;1,15 = aceleración.</p></div>
        <div class="guideline-card"><h3>4. Desactívala</h3><p>"Mejorar precisión del puntero" en Panel de Control.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
