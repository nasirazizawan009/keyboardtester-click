<?php
/**
 * Portuguese OCR Tool - Ferramenta OCR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-pt.php';

$pageTitle = 'Ferramenta OCR - Extraia Texto de Imagens Gratis';
$pageDescription = 'Extraia texto de imagens usando OCR. Converta imagens em texto editavel instantaneamente.';
$pageKeywords = 'OCR, extrair texto de imagem, converter imagem em texto, reconhecimento de caracteres, OCR online';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo url('languages/portuguese/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
          <h1 id="hero-title">Ferramenta OCR</h1>
          <p class="hero-lede">Extraia texto de imagens usando reconhecimento optico de caracteres.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">Extrair Texto</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Como Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ferramenta Principal</p>
          <h2 id="tool-stage-title">Extrator de Texto OCR</h2>
          <p class="section-lede">Envie uma imagem para extrair o texto contido.</p>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Recursos principais">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Multiplos Formatos</div>
          <div class="trust-desc">JPG, PNG, WebP</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Alta Precisao</div>
          <div class="trust-desc">OCR avancado</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantaneo</div>
          <div class="trust-desc">Resultados rapidos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Copiavel</div>
          <div class="trust-desc">Texto editavel</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-pt.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guia de Uso</p>
          <h2>Como Extrair Texto de Imagens</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Envie Imagem</h3>
            <p>Selecione ou arraste uma imagem.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Aguarde Processo</h3>
            <p>O OCR analisa a imagem.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Revise Texto</h3>
            <p>Verifique o texto extraido.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Copie</h3>
            <p>Use o texto onde precisar.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-pt.php'; ?>
</body>
</html>
