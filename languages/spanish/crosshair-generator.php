<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Generador de Mira - Creador de Crosshair CS2 y Valorant';
$pageDescription = 'Generador gratuito de mira online. Diseña una mira personalizada con vista previa en vivo, descarga PNG, copia el comando de consola CS2 o los valores de Valorant.';
$pageKeywords = 'generador mira, crosshair personalizado, mira cs2, mira valorant, crosshair generator';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Herramientas de mira</p>
        <h1 class="hero-title">Generador de Mira - Creador de Crosshair Personalizado</h1>
        <p class="hero-lede">Diseña una mira con vista previa en vivo. Elige un preajuste pro (s1mple, TenZ) o ajusta cada parámetro: forma, color, grosor, longitud, separación, punto central y contorno. Descarga un PNG transparente o copia el comando de consola listo para CS2.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">Abrir generador</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Cómo usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Vista previa en vivo</span><span class="hero-badge">Comando CS2</span><span class="hero-badge">Valores Valorant</span><span class="hero-badge">PNG transparente</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Herramienta principal</p><h2>Generador de Mira</h2><p class="section-lede">Ajusta los parámetros y exporta a CS2, Valorant o PNG.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Cómo aplicar la mira</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Elige preajuste o valores</h3><p>Comienza con un preset pro y ajusta.</p></div>
        <div class="guideline-card"><h3>2. Ajusta la vista previa</h3><p>Cambia forma, color y contorno en vivo.</p></div>
        <div class="guideline-card"><h3>3. Exporta</h3><p>Descarga PNG o copia comando CS2.</p></div>
        <div class="guideline-card"><h3>4. Aplica en el juego</h3><p>Pega el comando en la consola (~) o ingresa los valores en Valorant.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
