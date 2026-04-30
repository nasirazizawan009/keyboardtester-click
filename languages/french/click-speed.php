<?php
/**
 * French Click Speed Test - Test de Vitesse de Clic
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test CPS en Ligne - Vitesse de Clic Souris Gratuit';
$pageDescription = 'Test CPS gratuit en ligne : mesurez votre vitesse de clic souris, comparez vos clics par seconde et entraînez-vous sur 5, 10, 30 ou 60 secondes.';
$pageKeywords = 'test cps, test vitesse clic, vitesse de clic souris, clics par seconde, test souris cps, click speed test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">

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
        "name": "Qu'est-ce que le CPS ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS signifie clics par seconde. Le test calcule combien de clics valides vous faites pendant une durée donnée, puis divise le total par le nombre de secondes."
        }
      },
      {
        "@type": "Question",
        "name": "Quelle est une bonne vitesse de CPS ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Une vitesse normale se situe souvent entre 5 et 7 CPS. Les joueurs entraînés atteignent 8 à 10 CPS, et les très bons résultats dépassent 10 CPS sans perdre en régularité."
        }
      },
      {
        "@type": "Question",
        "name": "Quel temps choisir pour mesurer sa vitesse de clic ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Un test de 5 ou 10 secondes mesure la vitesse maximale. Un test de 30 ou 60 secondes mesure mieux l'endurance, la régularité et la fatigue de la main."
        }
      },
      {
        "@type": "Question",
        "name": "Le test CPS fonctionne-t-il avec une souris sans fil ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui. Le test fonctionne avec les souris USB, Bluetooth et 2,4 GHz. Si le score varie beaucoup, vérifiez la batterie, le récepteur USB et le taux de polling de la souris."
        }
      },
      {
        "@type": "Question",
        "name": "Comment améliorer son CPS sans se blesser ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Faites des sessions courtes, gardez le poignet détendu et privilégiez la régularité. Arrêtez si vous sentez une douleur dans le doigt, le poignet ou l'avant-bras."
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

    <section class="feature-band" aria-labelledby="cps-reference-title-fr">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Repère CPS</p>
          <h2 id="cps-reference-title-fr">Comprendre Votre Résultat de Vitesse de Clic</h2>
          <p class="section-lede">Le score CPS dépend de la durée du test, du type de souris et de votre technique. Utilisez ces repères pour comparer un résultat sans confondre vitesse courte et endurance.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>5 à 7 CPS</h3>
            <p>Vitesse normale pour une utilisation quotidienne, la navigation et les jeux occasionnels.</p>
          </article>
          <article class="landing-feature-card">
            <h3>8 à 10 CPS</h3>
            <p>Bon niveau pour les jeux qui demandent des clics rapides et réguliers.</p>
          </article>
          <article class="landing-feature-card">
            <h3>10+ CPS</h3>
            <p>Résultat avancé. Surveillez la fatigue et gardez une technique confortable.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Test 60 s</h3>
            <p>Meilleur choix pour mesurer l'endurance et éviter un score artificiellement élevé.</p>
          </article>
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
