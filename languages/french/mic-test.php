<?php
/**
 * French Microphone Test - Test de Microphone
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Microphone - Verifiez Votre Micro Gratuitement';
$pageDescription = 'Testez votre microphone en ligne. Verifiez l\'entree audio, les niveaux de volume et la qualite d\'enregistrement.';
$pageKeywords = 'test microphone, test mic, verifier audio, tester micro, test de voix';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-test.php'); ?>">

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
          <h1 id="hero-title">Test de Microphone</h1>
          <p class="hero-lede">Verifiez que votre microphone fonctionne correctement. Test d'entree audio.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test de Microphone</h2>
          <p class="section-lede">Autorisez l'acces au microphone et parlez pour tester.</p>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Entree Audio</div>
          <div class="trust-desc">Verification en direct</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Niveau de Volume</div>
          <div class="trust-desc">Indicateur visuel</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Qualite</div>
          <div class="trust-desc">Analyse audio</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Prive</div>
          <div class="trust-desc">Rien n'est sauvegarde</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Tester Votre Microphone</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Autorisez l'Acces</h3>
            <p>Autorisez l'utilisation du microphone.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Parlez</h3>
            <p>Dites quelque chose pour tester.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Observez les Niveaux</h3>
            <p>Verifiez l'indicateur de volume.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ajustez</h3>
            <p>Configurez selon vos besoins.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
