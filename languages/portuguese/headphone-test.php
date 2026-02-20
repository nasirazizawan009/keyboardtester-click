<?php
/**
 * Portuguese Headphone Test - Testador de Fones e Alto-falantes
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de Fones - Verifique Audio Estereo Gratis';
$pageDescription = 'Teste seus fones de ouvido e alto-falantes. Verifique os canais esquerdo e direito, balanco estereo e qualidade de audio.';
$pageKeywords = 'teste de fones, teste de alto-falantes, verificar estereo, testar audio, headphone test';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone-test.php'); ?>">

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
          <h1 id="hero-title">Testador de Fones e Alto-falantes</h1>
          <p class="hero-lede">Verifique os canais estereo e a qualidade de audio dos seus fones de ouvido.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Testador de Fones</h2>
          <p class="section-lede">Reproduza audio em cada canal para verificar seus fones de ouvido.</p>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Canal Esquerdo</div>
          <div class="trust-desc">Teste individual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Canal Direito</div>
          <div class="trust-desc">Teste individual</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Estereo</div>
          <div class="trust-desc">Ambos os canais</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Balanco</div>
          <div class="trust-desc">Verificar equilibrio</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Testar Seus Fones de Ouvido</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Conecte Fones</h3>
            <p>Certifique-se de que estao conectados.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Teste Esquerdo</h3>
            <p>Reproduza audio apenas no esquerdo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Teste Direito</h3>
            <p>Reproduza audio apenas no direito.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Verifique Balanco</h3>
            <p>Teste ambos os canais juntos.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
