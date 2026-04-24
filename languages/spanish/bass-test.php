<?php
/**
 * Spanish localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Prueba de Graves - Sweep 20 Hz a 200 Hz para Subwoofer';
$pageDescription = 'Prueba de graves gratuita online. Barrido de 20 Hz a 200 Hz con presets ISO para verificar subwoofer, monitores de estudio y auriculares. Sin instalación.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Diagnóstico de audio</p>
          <h1 class="hero-title">Prueba de Graves - Subwoofer y Barrido 20 a 200 Hz</h1>
          <p class="hero-lede">Verifica si tu subwoofer, monitores de estudio o auriculares reproducen graves correctamente. Barrido de 20 a 200 Hz, presets ISO de 1/3 de octava o modo mantener tono. Ondas senoidales puras, sin música ni armónicos.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">Iniciar prueba de graves</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Ver todas las herramientas</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Diagnóstico de audio</p>
          <h2>Prueba de Graves</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
