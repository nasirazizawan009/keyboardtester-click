<?php
/**
 * French Mouse Tester - Testeur de Souris
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-fr.php';

$pageTitle = 'Test Souris en Ligne - Boutons, Molette et Clics';
$pageDescription = 'Test souris gratuit : vérifiez clic gauche, clic droit, bouton milieu, molette et réponse du pointeur. Fonctionne avec souris USB, Bluetooth ou sans fil.';
$pageKeywords = 'test souris, testeur souris, test clic souris, tester molette souris, clic gauche droit, mouse test';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-test.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-test.php'); ?>">

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
        "name": "Comment tester les boutons de ma souris ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cliquez dans la zone de test avec le bouton gauche, le bouton droit et le bouton du milieu. L'outil affiche chaque entrée détectée pour confirmer que le signal arrive bien au navigateur."
        }
      },
      {
        "@type": "Question",
        "name": "Puis-je tester la molette de défilement ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui. Faites défiler vers le haut et vers le bas dans la zone de test. Si la direction est inversée ou si des pas manquent, vérifiez les paramètres système ou la molette."
        }
      },
      {
        "@type": "Question",
        "name": "Le test fonctionne-t-il avec une souris sans fil ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Oui. Les souris USB, Bluetooth et 2,4 GHz fonctionnent. Si les clics manquent, testez avec une batterie chargée et un récepteur USB branché directement à l'ordinateur."
        }
      },
      {
        "@type": "Question",
        "name": "Comment repérer un double clic involontaire ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Cliquez lentement plusieurs fois. Si le compteur avance deux fois pour une seule pression, le switch peut être usé ou le délai de double-clic trop court."
        }
      },
      {
        "@type": "Question",
        "name": "Que faire si un bouton ne répond pas ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Essayez un autre port USB, nettoyez la souris, désactivez les logiciels de macros et retestez sur un autre navigateur. Si le même bouton échoue partout, le problème est probablement matériel."
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
          <p class="section-lede">Outils pratiques pour confirmer si le problème vient du bouton, de la molette, du port USB ou d’un réglage logiciel.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Boutons principaux</h3>
            <p>Vérifiez clic gauche, clic droit et bouton central sans installer de logiciel.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Molette de défilement</h3>
            <p>Contrôlez les pas de scroll vers le haut et vers le bas pour repérer les ratés.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Compteur de clics</h3>
            <p>Repérez les doubles clics involontaires ou les clics qui ne s’enregistrent pas.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Contrôle rapide</h3>
            <p>Comparez la même souris avec un autre port ou un autre ordinateur si le défaut persiste.</p>
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
