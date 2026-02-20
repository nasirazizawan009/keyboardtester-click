<?php
/**
 * French QR Reader - Lecteur de Codes QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Lecteur de Codes QR - Scannez des QR Gratuitement';
$pageDescription = 'Scannez des codes QR avec votre camera ou telechargez une image. Decodez des QR instantanement.';
$pageKeywords = 'lecteur QR, scanner code QR, decoder QR, QR scanner, lire QR';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-code-reader.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-code-reader.php'); ?>">

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
          <h1 id="hero-title">Lecteur de Codes QR</h1>
          <p class="hero-lede">Scannez des codes QR avec la camera ou telechargez une image pour decoder.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">Scanner un QR</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Lecteur de QR</h2>
          <p class="section-lede">Utilisez la camera ou telechargez une image avec un code QR.</p>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Camera</div>
          <div class="trust-desc">Scan en direct</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Telecharger Image</div>
          <div class="trust-desc">Depuis fichiers</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantane</div>
          <div class="trust-desc">Resultats rapides</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Prive</div>
          <div class="trust-desc">Traitement local</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Scanner un Code QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Choisissez la Methode</h3>
            <p>Camera ou telecharger image.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Pointez vers le QR</h3>
            <p>Centrez le code QR.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Attendez le Scan</h3>
            <p>Detection automatique.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Voir le Resultat</h3>
            <p>Contenu decode.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
