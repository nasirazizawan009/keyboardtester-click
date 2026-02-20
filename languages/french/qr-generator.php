<?php
/**
 * French QR Generator - Generateur de Codes QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Generateur de Codes QR - Creez des QR Gratuitement';
$pageDescription = 'Generez des codes QR personnalises instantanement. Creez des QR pour URLs, texte, contacts et plus.';
$pageKeywords = 'generateur QR, creer code QR, QR gratuit, generer QR, code QR en ligne';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('QR_code_generator_scanner.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('QR_code_generator_scanner.php'); ?>">

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
          <h1 id="hero-title">Generateur de Codes QR</h1>
          <p class="hero-lede">Creez des codes QR personnalises instantanement pour tout contenu.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">Creer un QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Generateur de QR</h2>
          <p class="section-lede">Entrez votre contenu et generez un code QR instantanement.</p>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">URLs</div>
          <div class="trust-desc">Liens web</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Texte</div>
          <div class="trust-desc">Messages personnalises</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Telechargement</div>
          <div class="trust-desc">PNG haute qualite</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Gratuit</div>
          <div class="trust-desc">Sans limites</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Creer un Code QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Entrez le Contenu</h3>
            <p>Ecrivez l'URL, le texte ou les donnees.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Generez le QR</h3>
            <p>Le code est cree automatiquement.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Personnalisez</h3>
            <p>Ajustez la taille si necessaire.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Telechargez</h3>
            <p>Enregistrez l'image PNG.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
