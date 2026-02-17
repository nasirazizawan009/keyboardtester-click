<?php
/**
 * Portuguese Latency Checker - Verificador de Latencia
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Verificador de Latencia - Meca o Tempo de Resposta';
$pageDescription = 'Meca o tempo de resposta dos seus dispositivos de entrada. Teste de latencia preciso em milissegundos.';
$pageKeywords = 'latencia, tempo de resposta, input lag, teste de latencia, medir atraso';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
          <h1 id="hero-title">Verificador de Latencia</h1>
          <p class="hero-lede">Meca seu tempo de reacao e latencia de entrada com precisao.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Verificador de Latencia</h2>
          <p class="section-lede">Espere o sinal e clique o mais rapido possivel.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Precisao</div>
          <div class="trust-desc">Em milissegundos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Media</div>
          <div class="trust-desc">Estatisticas completas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Visual</div>
          <div class="trust-desc">Teste de reacao</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantaneo</div>
          <div class="trust-desc">Resultados imediatos</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Medir Seu Tempo de Reacao</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Prepare-se</h3>
            <p>Coloque a mao no mouse.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Espere o Sinal</h3>
            <p>Aguarde a mudanca de cor.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Clique</h3>
            <p>Reaja o mais rapido possivel.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Veja Resultados</h3>
            <p>Tempo em milissegundos.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
