<?php
/**
 * French Click Speed Test - Test de Vitesse de Clic
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Vitesse de Clic - Mesurez votre CPS Gratuitement';
$pageDescription = 'Mesurez votre vitesse de clic (CPS - Clics Par Seconde). Testez votre vitesse avec differentes durees.';
$pageKeywords = 'vitesse clic, CPS test, clics par seconde, test vitesse souris, click speed test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('click-speed-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Qu'est-ce que le CPS ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS signifie Clics Par Seconde. Il mesure combien de fois vous pouvez cliquer en une seconde."
        }
      },
      {
        "@type": "Question",
        "name": "Quelle est une bonne vitesse de CPS ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "La moyenne est de 6-8 CPS. Les joueurs professionnels peuvent atteindre 10-14 CPS."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-fr.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Test de Vitesse de Clic</h1>
          <p class="hero-lede">Mesurez votre CPS et ameliorez votre vitesse de clic avec des tests chronometres.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test de Vitesse de Clic</h2>
          <p class="section-lede">Cliquez aussi vite que possible dans la zone de test.</p>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Mesure CPS</div>
          <div class="trust-desc">Clics par seconde</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Durees Multiples</div>
          <div class="trust-desc">5s, 10s, 30s, 60s</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Statistiques</div>
          <div class="trust-desc">Total et moyenne</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantane</div>
          <div class="trust-desc">Resultats en direct</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Mesurer Votre Vitesse de Clic</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selectionnez la Duree</h3>
            <p>Choisissez le temps de test.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Cliquez Rapidement</h3>
            <p>Cliquez aussi vite que possible.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Gardez le Rythme</h3>
            <p>La constance plutot que la vitesse.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Voir les Resultats</h3>
            <p>Consultez votre CPS et le total.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
