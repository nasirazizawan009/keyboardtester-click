<?php
/**
 * Portuguese Webcam Test - Testador de Webcam
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de Webcam - Verifique sua Camera Gratis';
$pageDescription = 'Teste sua webcam online. Verifique a qualidade de video, resolucao e funcionamento.';
$pageKeywords = 'teste webcam, teste de camera, verificar webcam, testar video, webcam test';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcam-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcam-test.php'); ?>">

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
          <h1 id="hero-title">Testador de Webcam</h1>
          <p class="hero-lede">Verifique se sua webcam funciona. Teste qualidade e resolucao de video.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Teste de Webcam</h2>
          <p class="section-lede">Permita o acesso a camera para ver a transmissao ao vivo.</p>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Video ao Vivo</div>
          <div class="trust-desc">Pre-visualizacao</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Resolucao</div>
          <div class="trust-desc">Verificar qualidade</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Captura</div>
          <div class="trust-desc">Tirar fotos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">Sem gravacao</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Testar sua Webcam</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Permita Acesso</h3>
            <p>Autorize o uso da camera.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Verifique Video</h3>
            <p>Observe a transmissao ao vivo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Teste Qualidade</h3>
            <p>Verifique resolucao e nitidez.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Tire Foto</h3>
            <p>Salve uma foto de teste.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
