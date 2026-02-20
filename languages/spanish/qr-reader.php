<?php
/**
 * Spanish QR Reader - Lector de Códigos QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Lector de Códigos QR - Escanea QR Gratis';
$pageDescription = 'Escanea códigos QR con tu cámara o sube una imagen. Decodifica QR al instante.';
$pageKeywords = 'lector QR, escanear código QR, decodificar QR, QR scanner, leer QR';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-reader.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-reader.php'); ?>">

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
          <h1 id="hero-title">Lector de Códigos QR</h1>
          <p class="hero-lede">Escanea códigos QR con la cámara o sube una imagen para decodificar.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">Escanear QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Lector de QR</h2>
          <p class="section-lede">Usa la cámara o sube una imagen con un código QR.</p>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Cámara</div>
          <div class="trust-desc">Escaneo en vivo</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Subir Imagen</div>
          <div class="trust-desc">Desde archivos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantáneo</div>
          <div class="trust-desc">Resultados rápidos</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privado</div>
          <div class="trust-desc">Procesamiento local</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Escanear un Código QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Elige Método</h3>
            <p>Cámara o subir imagen.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Apunta al QR</h3>
            <p>Centra el código QR.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Espera Escaneo</h3>
            <p>Detección automática.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ve Resultado</h3>
            <p>Contenido decodificado.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
