<?php
/**
 * Portuguese Ghost Click Detector - Detector de Cliques Fantasma
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Detector de Cliques Fantasma - Detecte Cliques Indesejados';
$pageDescription = 'Detecte cliques fantasma e cliques nao intencionais do seu mouse. Identifique problemas de hardware do mouse.';
$pageKeywords = 'cliques fantasma, detector de cliques, problemas de mouse, cliques involuntarios, ghost click';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-test.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-test.php'); ?>">

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
          <h1 id="hero-title">Detector de Cliques Fantasma</h1>
          <p class="hero-lede">Detecte cliques nao intencionais e problemas de duplo clique do seu mouse.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">Iniciar Deteccao</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Detector de Cliques Fantasma</h2>
          <p class="section-lede">Mova o mouse sem clicar para detectar cliques fantasma.</p>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Deteccao</div>
          <div class="trust-desc">Cliques fantasma</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Duplo Clique</div>
          <div class="trust-desc">Identificar problemas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Registro</div>
          <div class="trust-desc">Historico de cliques</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Diagnostico</div>
          <div class="trust-desc">Status do mouse</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Detectar Cliques Fantasma</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Nao Clique</h3>
            <p>Mova o mouse sem pressionar.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Observe</h3>
            <p>Veja se cliques sao detectados.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Teste Botoes</h3>
            <p>Verifique cada botao individualmente.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Revise Registro</h3>
            <p>Analise o historico de cliques.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
