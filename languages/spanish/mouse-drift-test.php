<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Prueba de Deriva del Ratón - Detecta Vibración del Sensor';
$pageDescription = 'Prueba gratuita de deriva del ratón online. Detecta el movimiento del cursor en reposo y la vibración del sensor. Duración configurable de 10 s a 3 min. Solo navegador.';
$pageKeywords = 'prueba deriva raton, deriva cursor, vibracion sensor raton, mouse drift test';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Diagnóstico de ratón</p>
        <h1 class="hero-title">Prueba de Deriva del Ratón - Detecta Vibración del Sensor</h1>
        <p class="hero-lede">¿El cursor se mueve solo cuando no tocas el ratón? La prueba de deriva muestrea cada evento de puntero durante 10-180 segundos, reporta la deriva total en píxeles, el mayor salto y un veredicto aprobado/fallido.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">Iniciar prueba</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Cómo usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Precisión por píxel</span><span class="hero-badge">10s - 3 min</span><span class="hero-badge">Veredicto</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Herramienta principal</p><h2>Prueba de Deriva del Ratón</h2><p class="section-lede">Deja el ratón quieto y pulsa Iniciar.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Cómo detectar la deriva</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Mano fuera del ratón</h3><p>No toques el ratón durante la prueba.</p></div>
        <div class="guideline-card"><h3>2. Pulsa Iniciar</h3><p>Elige duración y espera.</p></div>
        <div class="guideline-card"><h3>3. Lee el veredicto</h3><p>0 px = perfecto, &lt;5 = normal.</p></div>
        <div class="guideline-card"><h3>4. Soluciona</h3><p>Usa una alfombrilla real, desactiva aceleración.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
