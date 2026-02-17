<?php
/**
 * French Mouse Tester - Testeur de Souris
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Testeur de Souris - Test des Clics et du Defilement Gratuit';
$pageDescription = 'Testez tous les boutons de votre souris, la molette de defilement et le mouvement du curseur. Detectez les problemes de votre souris instantanement.';
$pageKeywords = 'testeur souris, test mouse, test clics, test defilement, verifier boutons souris';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo url('languages/french/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-tester.php'); ?>">

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
        "name": "Comment tester les boutons de ma souris ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cliquez dans la zone de test avec chaque bouton de la souris. L'outil detectera et affichera quel bouton a ete presse."
        }
      },
      {
        "@type": "Question",
        "name": "Puis-je tester la molette de defilement ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui, faites defiler vers le haut et vers le bas sur la zone de test pour verifier le fonctionnement de la molette."
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
          <h1 id="hero-title">Testeur de Souris</h1>
          <p class="hero-lede">Testez tous les boutons, la molette et le mouvement. Detectez les problemes instantanement.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Testeur de Souris</h2>
          <p class="section-lede">Cliquez et faites defiler dans la zone de test.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Voir les Conseils</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Tous les Boutons</div>
          <div class="trust-desc">Gauche, Droite, Milieu</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Molette</div>
          <div class="trust-desc">Haut et Bas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Compteur</div>
          <div class="trust-desc">Suivi des Clics</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Temps Reel</div>
          <div class="trust-desc">Reponse Instantanee</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Diagnostic Complet</p>
          <h2 id="feature-title">Verifiez Chaque Fonction de la Souris</h2>
          <p class="section-lede">Outils professionnels pour tester votre souris.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Test des Boutons</h3>
            <p>Verifiez les boutons gauche, droit et du milieu.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Molette de Defilement</h3>
            <p>Testez le defilement fluide.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Compteur de Clics</h3>
            <p>Suivez le nombre de clics.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Statut en Direct</h3>
            <p>Retour visuel instantane.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Tester Votre Souris</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Cliquez sur les Boutons</h3>
            <p>Testez chaque bouton de la souris.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Utilisez la Molette</h3>
            <p>Faites defiler vers le haut et le bas.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Deplacez le Curseur</h3>
            <p>Verifiez le mouvement fluide.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Verifiez les Resultats</h3>
            <p>Consultez le comptage et le statut.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
