<?php
/**
 * Portuguese Click Speed Test - Teste de Velocidade de Clique
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Teste CPS Online - Meça sua Velocidade de Clique Grátis';
$pageDescription = 'Teste CPS gratuito no navegador: meça cliques por segundo, compare sua velocidade de clique no mouse e treine por 5, 10, 30 ou 60 segundos.';
$pageKeywords = 'teste CPS, velocidade de clique, cliques por segundo, teste de clique do mouse, click speed test, teste de CPS';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "O que é CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS significa cliques por segundo. O teste conta todos os cliques válidos durante o tempo escolhido e divide o total pela quantidade de segundos."
        }
      },
      {
        "@type": "Question",
        "name": "Qual é uma boa velocidade de CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Uma velocidade comum fica entre 5 e 7 CPS. Jogadores treinados chegam a 8-10 CPS, e resultados acima de 10 CPS já são avançados se forem consistentes."
        }
      },
      {
        "@type": "Question",
        "name": "Qual duração devo escolher no teste CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Use 5 ou 10 segundos para medir velocidade máxima. Use 30 ou 60 segundos para medir resistência, ritmo e queda de desempenho com o tempo."
        }
      },
      {
        "@type": "Question",
        "name": "O teste funciona com mouse sem fio?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Sim. O teste funciona com mouse USB, Bluetooth e 2,4 GHz. Se o resultado oscilar muito, confira bateria, receptor USB e taxa de polling."
        }
      },
      {
        "@type": "Question",
        "name": "Como melhorar o CPS com segurança?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Treine em sessões curtas, mantenha a mão relaxada e pare se sentir dor. Melhorar ritmo e consistência é mais útil do que forçar um pico único."
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

    <section class="feature-band" aria-labelledby="cps-reference-title-pt">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Referência CPS</p>
          <h2 id="cps-reference-title-pt">Como Interpretar sua Velocidade de Clique</h2>
          <p class="section-lede">O melhor resultado depende da duração do teste. Testes curtos mostram pico de velocidade; testes longos mostram controle e resistência.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>5 a 7 CPS</h3>
            <p>Faixa normal para navegação, uso diário e jogos casuais.</p>
          </article>
          <article class="landing-feature-card">
            <h3>8 a 10 CPS</h3>
            <p>Boa velocidade para jogos que exigem cliques rápidos e constantes.</p>
          </article>
          <article class="landing-feature-card">
            <h3>10+ CPS</h3>
            <p>Nível avançado. Mantenha a técnica confortável para evitar esforço.</p>
          </article>
          <article class="landing-feature-card">
            <h3>60 segundos</h3>
            <p>Melhor opção para medir resistência e média real de cliques.</p>
          </article>
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
