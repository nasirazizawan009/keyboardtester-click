<?php
/**
 * Portuguese Screen Test - Testador de Tela
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de Tela - Detecte Pixels Mortos Gratis';
$pageDescription = 'Detecte pixels mortos, travados ou quentes no seu monitor. Teste completo de tela com cores solidas.';
$pageKeywords = 'teste de tela, pixels mortos, teste monitor, detectar pixels, teste LCD';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screen-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screen-test.php'); ?>">

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
          <h1 id="hero-title">Testador de Tela</h1>
          <p class="hero-lede">Detecte pixels mortos ou travados no seu monitor com cores de teste.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Teste de Tela</h2>
          <p class="section-lede">Clique nas cores para testar sua tela completa.</p>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Pixels Mortos</div>
          <div class="trust-desc">Deteccao precisa</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Cores Solidas</div>
          <div class="trust-desc">RGB completo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tela Cheia</div>
          <div class="trust-desc">Teste total</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Facil de Usar</div>
          <div class="trust-desc">Um clique para testar</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Testar sua Tela</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecione Cor</h3>
            <p>Escolha uma cor de teste.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Tela Cheia</h3>
            <p>Ative o modo tela cheia.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Inspecione</h3>
            <p>Procure pontos anormais.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Teste Todos</h3>
            <p>Repita com cada cor.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
