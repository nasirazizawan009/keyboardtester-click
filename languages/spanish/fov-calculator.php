<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Calculadora de FoV - Convertir Campo de Visión entre Juegos';
$pageDescription = 'Calculadora de FoV gratis en línea. Convierte campo de visión horizontal, vertical y diagonal entre 4:3, 16:9, 21:9 y 32:9 para CS2, Valorant, Apex, CoD y Fortnite.';
$pageKeywords = 'calculadora fov, campo de vision calculadora, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Calculadoras de sensibilidad</p>
        <h1 class="hero-title">Calculadora de FoV - Convierte el Campo de Visión</h1>
        <p class="hero-lede">Convierte cualquier FoV entre horizontal, vertical y diagonal para 4:3, 16:9, 21:9 y 32:9. Incluye preajustes para CS2, Valorant, Apex, CoD y Fortnite para trasladar la misma sensación vertical entre juegos y monitores.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">Convertir FoV</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Cómo usar</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / Diagonal</span><span class="hero-badge">Todas las proporciones</span><span class="hero-badge">Preajustes de juegos</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Herramienta principal</p><h2>Calculadora de FoV</h2><p class="section-lede">Elige un preajuste o introduce tu FoV y tu proporción de pantalla.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Cómo convertir el FoV</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Elige tu juego</h3><p>El preajuste fija formato y proporción.</p></div>
        <div class="guideline-card"><h3>2. Introduce el FoV</h3><p>Escribe tu valor actual.</p></div>
        <div class="guideline-card"><h3>3. Lee la tabla</h3><p>FoV equivalente para cada formato y proporción.</p></div>
        <div class="guideline-card"><h3>4. Aplícalo</h3><p>Copia el valor al nuevo juego o monitor.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
