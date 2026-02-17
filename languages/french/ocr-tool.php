<?php
/**
 * French OCR Tool - Outil OCR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Outil OCR - Extrayez du Texte des Images Gratuitement';
$pageDescription = 'Extrayez du texte des images en utilisant l\'OCR. Convertissez des images en texte editable instantanement.';
$pageKeywords = 'OCR, extraire texte image, convertir image texte, reconnaissance caracteres, OCR en ligne';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-fr.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Outil OCR</h1>
          <p class="hero-lede">Extrayez du texte des images en utilisant la reconnaissance optique de caracteres.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">Extraire le Texte</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Extracteur de Texte OCR</h2>
          <p class="section-lede">Telechargez une image pour extraire le texte qu'elle contient.</p>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Formats Multiples</div>
          <div class="trust-desc">JPG, PNG, WebP</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Haute Precision</div>
          <div class="trust-desc">OCR avance</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantane</div>
          <div class="trust-desc">Resultats rapides</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Copiable</div>
          <div class="trust-desc">Texte editable</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Extraire du Texte des Images</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Telechargez l'Image</h3>
            <p>Selectionnez ou faites glisser une image.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Attendez le Traitement</h3>
            <p>L'OCR analyse l'image.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Verifiez le Texte</h3>
            <p>Verifiez le texte extrait.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Copiez</h3>
            <p>Utilisez le texte ou vous en avez besoin.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
