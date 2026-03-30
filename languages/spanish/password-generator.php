<?php
/**
 * Spanish Password Generator - Generador de Contraseñas
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';

$pageTitle = 'Generador de Contraseñas - Crea Contraseñas Seguras';
$pageDescription = 'Genera contraseñas seguras y aleatorias al instante. Personaliza longitud y caracteres.';
$pageKeywords = 'generador contraseñas, contraseña segura, crear contraseña, password generator, contraseña aleatoria';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('password-generator.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/password-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('password-generator.php'); ?>">

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
          <h1 id="hero-title">Generador de Contraseñas</h1>
          <p class="hero-lede">Crea contraseñas seguras y aleatorias con opciones personalizables.</p>
          <div class="hero-ctas">
            <a href="#password-gen" class="landing-btn landing-btn-primary">Generar Contraseña</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Cómo Usar</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Herramienta Principal</p>
          <h2 id="tool-stage-title">Generador de Contraseñas</h2>
          <p class="section-lede">Configura tus preferencias y genera una contraseña segura.</p>
        </div>
      </div>
      <section id="password-gen" class="tool-shell">
        <?php include __DIR__ . '/tools/password-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Características principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Seguras</div>
          <div class="trust-desc">Criptográficamente aleatorias</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Personalizables</div>
          <div class="trust-desc">Longitud y caracteres</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantáneas</div>
          <div class="trust-desc">Generación rápida</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Privadas</div>
          <div class="trust-desc">No se guardan</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'password-generator'; include __DIR__ . '/sections/tools-list-es.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guía de Uso</p>
          <h2>Cómo Generar una Contraseña Segura</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Elige Longitud</h3>
            <p>Mínimo 12 caracteres recomendado.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Selecciona Caracteres</h3>
            <p>Mayúsculas, números, símbolos.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Genera</h3>
            <p>Haz clic para crear.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Copia</h3>
            <p>Guarda en un lugar seguro.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-es.php'; ?>
</body>
</html>
