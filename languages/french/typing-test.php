<?php
/**
 * French Typing Speed Test - Test de Vitesse de Frappe
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Frappe en Ligne - Vitesse MPM et Précision';
$pageDescription = 'Test de frappe gratuit : mesurez vos mots par minute, votre précision et votre régularité avec un exercice chronométré en français, sans inscription.';
$pageKeywords = 'test de frappe, vitesse de frappe, mots par minute, MPM, test dactylographie, précision clavier';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard_typing_test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Quelle est la vitesse de frappe moyenne ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "La moyenne se situe souvent autour de 35 à 45 mots par minute. Un bon niveau de bureau est autour de 50 à 65 MPM avec une précision supérieure à 95 %."
        }
      },
      {
        "@type": "Question",
        "name": "Comment améliorer la vitesse de frappe ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Pratiquez régulièrement, gardez les poignets détendus, utilisez tous les doigts et travaillez d’abord la précision. La vitesse augmente mieux quand les erreurs diminuent."
        }
      },
      {
        "@type": "Question",
        "name": "MPM et WPM signifient-ils la même chose ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui. MPM signifie mots par minute en français, tandis que WPM signifie words per minute en anglais. Les deux mesurent la même chose."
        }
      },
      {
        "@type": "Question",
        "name": "La précision est-elle plus importante que la vitesse ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui. Un score rapide avec beaucoup d’erreurs est moins utile qu’un score légèrement plus lent mais précis. Visez d’abord 95 % de précision ou plus."
        }
      },
      {
        "@type": "Question",
        "name": "Combien de temps faut-il s’entraîner ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Des sessions courtes de 5 à 10 minutes sont suffisantes. Répétez le test plusieurs fois par semaine pour suivre votre progression sans fatigue."
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

    <section class="feature-band" aria-labelledby="feature-title-fr">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Vitesse et Precision de Frappe</p>
          <h2 id="feature-title-fr">Mesurer MPM, Précision et Rythme de Frappe</h2>
          <p class="section-lede">Pratiquez avec un test de frappe dans le navigateur et voyez la vitesse, la précision et les erreurs se mettre à jour en temps réel.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>35 à 45 MPM</h3>
            <p>Vitesse courante pour une frappe quotidienne avec une précision correcte.</p>
          </article>
          <article class="landing-feature-card">
            <h3>50 à 65 MPM</h3>
            <p>Bon niveau de bureau si la précision reste proche de 95 % ou plus.</p>
          </article>
          <article class="landing-feature-card">
            <h3>70+ MPM</h3>
            <p>Niveau avancé. Travaillez surtout la régularité et les fautes restantes.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Précision</h3>
            <p>Un résultat utile combine vitesse stable et peu d’erreurs corrigées.</p>
          </article>
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
