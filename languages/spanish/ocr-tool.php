<?php
/**
 * Spanish OCR Tool - Herramienta OCR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Herramienta OCR - Extrae Texto de Imágenes Gratis';
$pageDescription = 'Extrae texto de imágenes usando OCR. Convierte imágenes a texto editable al instante.';
$pageKeywords = 'OCR, extraer texto imagen, convertir imagen texto, reconocimiento caracteres, OCR online';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-es.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Herramienta OCR</h1>
          <p class="hero-lede">Extrae texto de imágenes usando reconocimiento óptico de caracteres.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">Extraer Texto</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Extractor de Texto OCR</h2>
          <p class="section-lede">Sube una imagen para extraer el texto que contiene.</p>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Múltiples Formatos</div>
          <div class="trust-desc">JPG, PNG, WebP</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Alta Precisión</div>
          <div class="trust-desc">OCR avanzado</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantáneo</div>
          <div class="trust-desc">Resultados rápidos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Copiable</div>
          <div class="trust-desc">Texto editable</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Extraer Texto de Imágenes</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Sube Imagen</h3>
            <p>Selecciona o arrastra una imagen.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Espera Proceso</h3>
            <p>El OCR analiza la imagen.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Revisa Texto</h3>
            <p>Verifica el texto extraído.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Copia</h3>
            <p>Usa el texto donde necesites.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
