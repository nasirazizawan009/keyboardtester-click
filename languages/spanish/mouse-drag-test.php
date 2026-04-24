<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Prueba de Drag Click del Raton - CPS y Pico de Rafaga Online';
$pageDescription = 'Prueba de arrastre del ratón: mide la velocidad, el pico y el total de clics al arrastrar con un gráfico en vivo. Ideal para técnicas de drag clicking en gaming.';
$pageKeywords = 'prueba drag click, drag click CPS, drag click raton, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Testador de Drag Click</p>
          <h1 class="hero-title">Prueba de Drag Click del Raton - CPS y Pico de Rafaga</h1>
          <p class="hero-lede">Mide CPS de drag-click, pico de rafaga y clics totales en sesiones de 5, 10 o 30 segundos. Ideal para Minecraft PvP y juego competitivo con muchos clics.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">Iniciar Prueba</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Como Usar</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Contador CPS en vivo</span>
            <span class="hero-badge">Pico de rafaga</span>
            <span class="hero-badge">Grafico cronologico</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="Prueba de drag click del raton" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2>Testador de Drag Click</h2>
          <p class="section-lede">Haz clic o desliza el dedo por el boton lo mas rapido posible.</p>
        </div>
      </div>
      <section class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?>
      </section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Como Usar la Prueba de Drag Click</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Configura</h3><p>Elige duracion (5s/10s/30s) y pulsa Iniciar.</p></div>
          <div class="guideline-card"><h3>2. Haz clic o desliza</h3><p>Desliza el dedo a 30-45 grados para mas friccion.</p></div>
          <div class="guideline-card"><h3>3. Lee resultados</h3><p>CPS promedio, pico y pico de rafaga de 200ms.</p></div>
          <div class="guideline-card"><h3>4. Ajusta tecnica</h3><p>Cambia angulo o raton y vuelve a probar.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
