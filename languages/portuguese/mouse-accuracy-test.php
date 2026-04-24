<?php
/**
 * Portuguese Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Teste de Precisao do Mouse - Treinador de Mira Online';
$pageDescription = 'Teste de precisão do mouse: treino de mira que mede taxa de acertos, erro médio em pixels e tempo de reação por alvo. Ideal para FPS, no navegador, sem instalação.';
$pageKeywords = 'teste precisao mouse, treinador mira, aim trainer';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Treinador de Mira</p>
          <h1 class="hero-title" id="hero-title">Teste de Precisao do Mouse - Treinador de Mira</h1>
          <p class="hero-lede">Meca a precisao dos seus cliques, erro medio em pixels e tempo de reacao por alvo. Calibre DPI e sensibilidade com dados reais.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">Iniciar Teste</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Como Usar</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Precisao em pixels</span>
            <span class="hero-badge">Tempo de reacao</span>
            <span class="hero-badge">Calibracao DPI</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Treinador de Mira</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Tamanho do alvo</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">Sem instalação</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="Teste de Precisao do Mouse - Treinador de Mira" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">Dados reais de mira</div><p>Acompanhamento de acertos e erro médio por sessão.</p></div>
            <div class="mini-card"><div class="mini-title">Loop de DPI</div><p>Teste, mude DPI, re-teste - veja como a precisão muda.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Treinador de Mira</p>
          <h2 id="tool-stage-title">Treinador de Mira</h2>
          <p class="section-lede">Clique em cada alvo o mais rapido e preciso possivel.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Dicas</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Como Usar o Teste de Precisao">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Precisao em pixels</div><div class="trust-desc">Cada clique medido em relacao ao centro do alvo</div></div>
        <div class="trust-item"><div class="trust-title">Tempo de reacao</div><div class="trust-desc">Milissegundos entre aparecimento e clique</div></div>
        <div class="trust-item"><div class="trust-title">Calibracao DPI</div><div class="trust-desc">Compare configuracoes com dados objetivos</div></div>
        <div class="trust-item"><div class="trust-title">Local e sem cadastro</div><div class="trust-desc">Sem downloads ou rastreamento</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Como Usar o Teste de Precisao</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Configure a sessao</h3><p>Escolha duracao (30s/60s/120s) e tamanho do alvo.</p></div>
          <div class="guideline-card"><h3>2. Clique em cada alvo</h3><p>Clique em cada alvo verde imediatamente.</p></div>
          <div class="guideline-card"><h3>3. Leia os resultados</h3><p>Percentual de acertos, erro medio e tempo.</p></div>
          <div class="guideline-card"><h3>4. Ajuste e repita</h3><p>Mude DPI ou sensibilidade e teste novamente.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
