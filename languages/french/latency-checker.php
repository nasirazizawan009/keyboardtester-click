<?php
/**
 * French Latency Checker - Verificateur de Latence
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test de Latence Clavier et Souris - Input Lag en ms';
$pageDescription = 'Test de latence gratuit : mesurez votre temps de réaction, l’input lag clavier/souris et comparez vos résultats en millisecondes. Sans installation.';
$pageKeywords = 'test latence, input lag, latence clavier, latence souris, temps de réponse, test réaction';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('latency-checker.php'); ?>">

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
        "name": "Que mesure ce test de latence ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Le test mesure le délai visible entre le signal affiché et votre clic ou pression de touche. Il sert à comparer la réactivité d’un clavier, d’une souris et de votre propre temps de réaction."
        }
      },
      {
        "@type": "Question",
        "name": "Quelle latence clavier est bonne pour jouer ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Pour le jeu compétitif, un résultat régulier sous 20 ms dans ce test est généralement bon. Des résultats beaucoup plus élevés peuvent venir d’un clavier sans fil, d’un hub USB, du navigateur ou de la fatigue."
        }
      },
      {
        "@type": "Question",
        "name": "Le test mesure-t-il la latence matérielle pure ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Non. Un navigateur mesure la réaction complète perçue, pas uniquement l’électronique du périphérique. Pour comparer deux claviers sur le même ordinateur, le test reste utile."
        }
      },
      {
        "@type": "Question",
        "name": "Comment réduire l’input lag clavier ou souris ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Utilisez une connexion filaire ou 2,4 GHz stable, évitez les hubs USB lents, fermez les onglets lourds et testez avec le même écran pour garder une comparaison propre."
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
          <h1 id="hero-title">Verificateur de Latence</h1>
          <p class="hero-lede">Mesurez votre temps de reaction et la latence d'entree avec precision.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Demarrer le Test</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Comment Utiliser</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Outil Principal</p>
          <h2 id="tool-stage-title">Verificateur de Latence</h2>
          <p class="section-lede">Attendez le signal et cliquez aussi vite que possible.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Caracteristiques principales">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Precision</div>
          <div class="trust-desc">En millisecondes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Moyenne</div>
          <div class="trust-desc">Statistiques completes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Visuel</div>
          <div class="trust-desc">Test de reaction</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instantane</div>
          <div class="trust-desc">Resultats immediats</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="latency-reference-title-fr">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Interprétation</p>
          <h2 id="latency-reference-title-fr">Lire un Résultat de Latence en Millisecondes</h2>
          <p class="section-lede">Ce test est utile pour comparer votre configuration dans le même navigateur. Répétez 5 à 10 essais et regardez la moyenne plutôt qu’un seul meilleur score.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Moins de 20 ms</h3>
            <p>Très réactif pour le jeu, surtout si les résultats restent stables.</p>
          </article>
          <article class="landing-feature-card">
            <h3>20 à 40 ms</h3>
            <p>Normal pour de nombreux claviers et souris sans fil ou écrans standards.</p>
          </article>
          <article class="landing-feature-card">
            <h3>40 ms et plus</h3>
            <p>À vérifier : hub USB, batterie faible, navigateur chargé ou périphérique lent.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Comparer proprement</h3>
            <p>Gardez le même ordinateur, écran et navigateur pour comparer deux appareils.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-fr.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Guide d'Utilisation</p>
          <h2>Comment Mesurer Votre Temps de Reaction</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Preparez-vous</h3>
            <p>Placez votre main sur la souris.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Attendez le Signal</h3>
            <p>Attendez le changement de couleur.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Cliquez</h3>
            <p>Reagissez aussi vite que possible.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Voir les Resultats</h3>
            <p>Temps en millisecondes.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-fr.php'; ?>
</body>
</html>
