<?php
/**
 * Portuguese QR Generator - Gerador de Codigo QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Gerador de Codigo QR - Crie QR Gratis';
$pageDescription = 'Gere codigos QR personalizados instantaneamente. Crie QR para URLs, texto, contatos e mais.';
$pageKeywords = 'gerador de QR, criar codigo QR, QR gratis, gerar QR, codigo QR online';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-generator.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-generator.php'); ?>">

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
          <h1 id="hero-title">Gerador de Codigo QR</h1>
          <p class="hero-lede">Crie codigos QR personalizados instantaneamente para qualquer conteudo.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">Criar QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Gerador de QR</h2>
          <p class="section-lede">Insira seu conteudo e gere um codigo QR instantaneamente.</p>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">URLs</div>
          <div class="trust-desc">Links da web</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Texto</div>
          <div class="trust-desc">Mensagens personalizadas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Download</div>
          <div class="trust-desc">PNG de alta qualidade</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Gratis</div>
          <div class="trust-desc">Sem limites</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Criar um Codigo QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Insira Conteudo</h3>
            <p>Digite URL, texto ou dados.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Gere QR</h3>
            <p>O codigo e criado automaticamente.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Personalize</h3>
            <p>Ajuste o tamanho se necessario.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Baixe</h3>
            <p>Salve a imagem PNG.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
