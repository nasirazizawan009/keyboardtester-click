<?php
/**
 * Spanish QR Generator - Generador de Códigos QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Generador de Códigos QR - Crea QR Gratis';
$pageDescription = 'Genera códigos QR personalizados al instante. Crea QR para URLs, texto, contactos y más.';
$pageKeywords = 'generador QR, crear código QR, QR gratis, generar QR, código QR online';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-generator.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo url('languages/spanish/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-generator.php'); ?>">

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
          <h1 id="hero-title">Generador de Códigos QR</h1>
          <p class="hero-lede">Crea códigos QR personalizados al instante para cualquier contenido.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">Crear QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Generador de QR</h2>
          <p class="section-lede">Ingresa tu contenido y genera un código QR al instante.</p>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">URLs</div>
          <div class="trust-desc">Enlaces web</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Texto</div>
          <div class="trust-desc">Mensajes personalizados</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Descarga</div>
          <div class="trust-desc">PNG de alta calidad</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Gratis</div>
          <div class="trust-desc">Sin límites</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Crear un Código QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Ingresa Contenido</h3>
            <p>Escribe URL, texto o datos.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Genera QR</h3>
            <p>El código se crea automáticamente.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Personaliza</h3>
            <p>Ajusta tamaño si es necesario.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Descarga</h3>
            <p>Guarda la imagen PNG.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
