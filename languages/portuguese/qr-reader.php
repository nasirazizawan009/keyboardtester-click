<?php
/**
 * Portuguese QR Reader - Leitor de Codigo QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Leitor de Codigo QR - Escaneie QR Gratis';
$pageDescription = 'Escaneie codigos QR com sua camera ou envie uma imagem. Decodifique QR instantaneamente.';
$pageKeywords = 'leitor de QR, escanear codigo QR, decodificar QR, QR scanner, ler QR';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-reader.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-reader.php'); ?>">

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
          <h1 id="hero-title">Leitor de Codigo QR</h1>
          <p class="hero-lede">Escaneie codigos QR com a camera ou envie uma imagem para decodificar.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">Escanear QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Leitor de QR</h2>
          <p class="section-lede">Use a camera ou envie uma imagem com um codigo QR.</p>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Camera</div>
          <div class="trust-desc">Escaneamento ao vivo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Enviar Imagem</div>
          <div class="trust-desc">De arquivos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantaneo</div>
          <div class="trust-desc">Resultados rapidos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">Processamento local</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Escanear um Codigo QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Escolha Metodo</h3>
            <p>Camera ou enviar imagem.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Aponte para o QR</h3>
            <p>Centralize o codigo QR.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Aguarde Escaneamento</h3>
            <p>Deteccao automatica.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Veja Resultado</h3>
            <p>Conteudo decodificado.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
