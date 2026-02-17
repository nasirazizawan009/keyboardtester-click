<?php
/**
 * Portuguese Mouse Trail - Rastro do Mouse
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Rastro do Mouse - Visualize o Movimento do Cursor';
$pageDescription = 'Visualize o rastro de movimento do mouse. Analise a precisao e fluidez do cursor.';
$pageKeywords = 'rastro do mouse, mouse trail, movimento do cursor, visualizar mouse, precisao do mouse';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-pt.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Rastro do Mouse</h1>
          <p class="hero-lede">Visualize o rastro de movimento e analise a precisao do seu mouse.</p>
          <div class="hero-ctas">
            <a href="#trail-test" class="landing-btn landing-btn-primary">Iniciar Visualizacao</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Visualizador de Rastro</h2>
          <p class="section-lede">Mova o mouse para ver o rastro de movimento.</p>
        </div>
      </div>
      <section id="trail-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Rastro Visual</div>
          <div class="trust-desc">Ver movimento</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precisao</div>
          <div class="trust-desc">Analisar fluidez</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tempo Real</div>
          <div class="trust-desc">Visualizacao instantanea</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Personalizavel</div>
          <div class="trust-desc">Ajustar opcoes</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Usar o Visualizador de Rastro</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Mova o Mouse</h3>
            <p>Desloque o cursor pela tela.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observe o Rastro</h3>
            <p>Veja o padrao de movimento.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Analise Fluidez</h3>
            <p>Verifique movimento suave.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajuste Opcoes</h3>
            <p>Personalize a visualizacao.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
