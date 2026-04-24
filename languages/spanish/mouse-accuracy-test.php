<?php
/**
 * Spanish Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-es.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Prueba de Precision del Raton - Entrenador de Punteria Online';
$pageDescription = 'Prueba de precision del raton online gratis. Mide el porcentaje de aciertos, error medio en pixeles y tiempo de reaccion. Calibra tu DPI con datos reales.';
$pageKeywords = 'prueba precision raton, entrenador punteria, test aim';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-es.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Entrenador de Punteria</p>
          <h1 class="hero-title" id="hero-title">Prueba de Precision del Raton - Entrenador de Punteria</h1>
          <p class="hero-lede">Mide la precision de tus clics, error medio en pixeles y tiempo de reaccion por objetivo. Calibra tu DPI y sensibilidad con datos reales.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">Iniciar Prueba</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Como Usar</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Precision por pixel</span>
            <span class="hero-badge">Tiempo de reaccion</span>
            <span class="hero-badge">Calibracion DPI</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Entrenador de Punteria</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Tamano del objetivo</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">Sin instalaciones</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="Prueba de Precision del Raton - Entrenador de Punteria" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">Datos reales de puntería</div><p>Seguimiento de aciertos y error medio por sesión.</p></div>
            <div class="mini-card"><div class="mini-title">Ciclo DPI</div><p>Prueba, cambia tu DPI, vuelve a probar - ve cómo cambia la precisión.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Entrenador de Punteria</p>
          <h2 id="tool-stage-title">Entrenador de Punteria</h2>
          <p class="section-lede">Haz clic en cada objetivo tan rapido y preciso como puedas.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Consejos</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Como Usar la Prueba de Precision">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Precision por pixel</div><div class="trust-desc">Cada clic puntuado contra el centro del objetivo</div></div>
        <div class="trust-item"><div class="trust-title">Tiempo de reaccion</div><div class="trust-desc">Milisegundos entre aparicion y clic</div></div>
        <div class="trust-item"><div class="trust-title">Calibracion DPI</div><div class="trust-desc">Compara ajustes con datos objetivos</div></div>
        <div class="trust-item"><div class="trust-title">Local y sin registro</div><div class="trust-desc">Sin descargas ni seguimiento</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-es.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Como Usar la Prueba de Precision</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Configura la sesion</h3><p>Elige duracion (30s/60s/120s) y tamano de objetivo.</p></div>
          <div class="guideline-card"><h3>2. Haz clic en cada objetivo</h3><p>Haz clic en cada objetivo verde al instante.</p></div>
          <div class="guideline-card"><h3>3. Lee los resultados</h3><p>Porcentaje de aciertos, error medio y tiempo.</p></div>
          <div class="guideline-card"><h3>4. Ajusta y repite</h3><p>Cambia DPI o sensibilidad y vuelve a probar.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-es.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
