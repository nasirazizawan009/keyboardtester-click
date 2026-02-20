<?php
/**
 * Portuguese Click Speed Test - Teste de Velocidade de Clique
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Teste de Velocidade de Clique - Meca seu CPS Gratis';
$pageDescription = 'Meca sua velocidade de clique (CPS - Cliques Por Segundo). Teste sua velocidade com diferentes duracoes de tempo.';
$pageKeywords = 'velocidade de clique, teste CPS, cliques por segundo, teste de velocidade do mouse, click speed test';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('click-speed-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "O que e CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS significa Cliques Por Segundo. Mede quantas vezes voce pode clicar em um segundo."
        }
      },
      {
        "@type": "Question",
        "name": "Qual e uma boa velocidade de CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A media e 6-8 CPS. Jogadores profissionais podem alcancar 10-14 CPS."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-pt.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Teste de Velocidade de Clique</h1>
          <p class="hero-lede">Meca seu CPS e melhore sua velocidade de clique com testes cronometrados.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Teste de Velocidade de Clique</h2>
          <p class="section-lede">Clique o mais rapido possivel na area de teste.</p>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medicao CPS</div>
          <div class="trust-desc">Cliques por segundo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Multiplas Duracoes</div>
          <div class="trust-desc">5s, 10s, 30s, 60s</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Estatisticas</div>
          <div class="trust-desc">Total e media</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantaneo</div>
          <div class="trust-desc">Resultados ao vivo</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Medir Sua Velocidade de Clique</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecione a Duracao</h3>
            <p>Escolha o tempo de teste.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Clique Rapido</h3>
            <p>Clique o mais rapido possivel.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Mantenha o Ritmo</h3>
            <p>Consistencia acima de velocidade.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Veja Resultados</h3>
            <p>Confira seu CPS e total.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
