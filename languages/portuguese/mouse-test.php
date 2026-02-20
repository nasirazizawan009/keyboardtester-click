<?php
/**
 * Portuguese Mouse Tester - Testador de Mouse
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Testador de Mouse - Teste Cliques e Rolagem Gratis';
$pageDescription = 'Teste todos os botoes do mouse, roda de rolagem e movimento do cursor. Detecte problemas com seu mouse instantaneamente.';
$pageKeywords = 'testador de mouse, teste de mouse, teste de cliques, teste de rolagem, verificar botoes do mouse';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-tester.php'); ?>">

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
        "name": "Como testo os botoes do meu mouse?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Clique na area de teste com cada botao do mouse. A ferramenta detectara e mostrara qual botao foi pressionado."
        }
      },
      {
        "@type": "Question",
        "name": "Posso testar a roda de rolagem?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Sim, role para cima e para baixo sobre a area de teste para verificar a funcionalidade da roda."
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
          <h1 id="hero-title">Testador de Mouse</h1>
          <p class="hero-lede">Teste todos os botoes, roda de rolagem e movimento. Detecte problemas instantaneamente.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">Iniciar Teste</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Testador de Mouse</h2>
          <p class="section-lede">Clique e role na area de teste.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Dicas</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Todos os Botoes</div>
          <div class="trust-desc">Esq, Dir, Meio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Roda</div>
          <div class="trust-desc">Cima e Baixo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Contador</div>
          <div class="trust-desc">Rastreamento de Cliques</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tempo Real</div>
          <div class="trust-desc">Resposta Instantanea</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Diagnostico Completo</p>
          <h2 id="feature-title">Verifique Cada Funcao do Mouse</h2>
          <p class="section-lede">Ferramentas profissionais para testar seu mouse.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Teste de Botoes</h3>
            <p>Verifique esquerdo, direito e meio.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Roda de Rolagem</h3>
            <p>Teste a rolagem suave.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Contador de Cliques</h3>
            <p>Rastreie o numero de cliques.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Status ao Vivo</h3>
            <p>Feedback visual instantaneo.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Testar Seu Mouse</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Clique nos Botoes</h3>
            <p>Teste cada botao do mouse.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Use a Roda</h3>
            <p>Role para cima e para baixo.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Mova o Cursor</h3>
            <p>Verifique o movimento suave.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Veja Resultados</h3>
            <p>Confira a contagem e status.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
