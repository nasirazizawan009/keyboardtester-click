<?php
/**
 * Portuguese Typing Speed Test - Teste de Velocidade de Digitacao
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Teste de Velocidade de Digitacao - Meca PPM e Precisao';
$pageDescription = 'Meca sua velocidade de digitacao em palavras por minuto (PPM) e precisao. Melhore suas habilidades de digitacao.';
$pageKeywords = 'teste de digitacao, PPM, velocidade de digitacao, teste de teclado, palavras por minuto';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

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
        "name": "Qual e a velocidade media de digitacao?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A media e 40 PPM. Digitadores profissionais alcancam 65-75 PPM."
        }
      },
      {
        "@type": "Question",
        "name": "Como melhorar a velocidade de digitacao?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Pratique regularmente, use todos os dedos e foque na precisao antes da velocidade."
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
          <h1 id="hero-title">Teste de Velocidade de Digitacao</h1>
          <p class="hero-lede">Meca seu PPM e precisao. Melhore suas habilidades de digitacao.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Teste de Digitacao</h2>
          <p class="section-lede">Digite o texto mostrado o mais rapido e preciso possivel.</p>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Medicao PPM</div>
          <div class="trust-desc">Palavras por minuto</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precisao</div>
          <div class="trust-desc">Porcentagem de acertos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Textos Variados</div>
          <div class="trust-desc">Diferentes niveis</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Progresso</div>
          <div class="trust-desc">Acompanhamento de melhora</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Usar o Teste de Digitacao</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selecione Duracao</h3>
            <p>Escolha o tempo de teste.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Digite o Texto</h3>
            <p>Copie o texto mostrado.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Foque na Precisao</h3>
            <p>A precisao e mais importante.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Veja Resultados</h3>
            <p>Analise seu PPM e erros.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
