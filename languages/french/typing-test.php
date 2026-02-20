<?php
/**
 * French Typing Speed Test - Test de Vitesse de Frappe
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Vitesse de Frappe - Mesurez MPM et Precision';
$pageDescription = 'Mesurez votre vitesse de frappe en mots par minute (MPM) et precision. Ameliorez vos competences en dactylographie.';
$pageKeywords = 'test frappe, MPM, vitesse dactylographie, test clavier, mots par minute';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

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
        "name": "Quelle est la vitesse de frappe moyenne?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "La moyenne est de 40 MPM. Les dactylographes professionnels atteignent 65-75 MPM."
        }
      },
      {
        "@type": "Question",
        "name": "Comment ameliorer la vitesse de frappe?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Pratiquez regulierement, utilisez tous les doigts et concentrez-vous sur la precision avant la vitesse."
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
          <h1 id="hero-title">Test de Vitesse de Frappe</h1>
          <p class="hero-lede">Mesurez votre MPM et precision. Ameliorez vos competences en dactylographie.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Test de Frappe</h2>
          <p class="section-lede">Tapez le texte affiche le plus vite et precisement possible.</p>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Mesure MPM</div>
          <div class="trust-desc">Mots par minute</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Precision</div>
          <div class="trust-desc">Pourcentage de reussite</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Textes Varies</div>
          <div class="trust-desc">Differents niveaux</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Progression</div>
          <div class="trust-desc">Suivi d'amelioration</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Utiliser le Test de Frappe</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Selectionnez la Duree</h3>
            <p>Choisissez le temps du test.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Tapez le Texte</h3>
            <p>Copiez le texte affiche.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Concentrez-vous sur la Precision</h3>
            <p>La precision est plus importante.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Voir les Resultats</h3>
            <p>Analysez votre MPM et erreurs.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
