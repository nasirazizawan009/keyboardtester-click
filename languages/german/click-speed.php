<?php
/**
 * German Click Speed Test - Klickgeschwindigkeitstest
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'CPS Test Online - Klickgeschwindigkeit Kostenlos Messen';
$pageDescription = 'Kostenloser CPS Test im Browser: messen Sie Klicks pro Sekunde, vergleichen Sie Ihre Klickgeschwindigkeit und trainieren Sie 5, 10, 30 oder 60 Sekunden.';
$pageKeywords = 'CPS Test, Klickgeschwindigkeit testen, Klicks pro Sekunde, Maus Klick Test, Click Speed Test, Klick Test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/click-speed.php'); ?>">
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
        "name": "Was ist CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS bedeutet Klicks pro Sekunde. Der Test zählt alle gültigen Mausklicks in einer gewählten Zeit und teilt das Ergebnis durch die Anzahl der Sekunden."
        }
      },
      {
        "@type": "Question",
        "name": "Was ist eine gute CPS-Geschwindigkeit?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Viele Nutzer liegen bei 5 bis 7 CPS. Trainierte Spieler erreichen 8 bis 10 CPS, sehr schnelle Ergebnisse liegen stabil über 10 CPS."
        }
      },
      {
        "@type": "Question",
        "name": "Welche Testdauer ist am besten?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "5 oder 10 Sekunden zeigen die maximale Kurzzeitgeschwindigkeit. 30 oder 60 Sekunden sind besser, wenn Sie Ausdauer und konstante Klicks messen möchten."
        }
      },
      {
        "@type": "Question",
        "name": "Funktioniert der CPS Test mit kabellosen Mäusen?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Ja. Der Test funktioniert mit USB-, Bluetooth- und 2,4-GHz-Mäusen. Stark schwankende Ergebnisse können auf Batterie, Funkverbindung oder Polling-Rate hinweisen."
        }
      },
      {
        "@type": "Question",
        "name": "Wie verbessere ich meine Klickgeschwindigkeit sicher?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Trainieren Sie in kurzen Serien, halten Sie Hand und Handgelenk locker und brechen Sie ab, wenn Schmerzen entstehen. Konstanz ist wichtiger als ein einzelner Spitzenwert."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-de.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Klickgeschwindigkeitstest</h1>
          <p class="hero-lede">Messen Sie Ihre CPS und verbessern Sie Ihre Klickgeschwindigkeit mit zeitgesteuerten Tests.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Klickgeschwindigkeitstest</h2>
          <p class="section-lede">Klicken Sie so schnell wie moeglich im Testbereich.</p>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">CPS-Messung</div>
          <div class="trust-desc">Klicks pro Sekunde</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Mehrere Dauern</div>
          <div class="trust-desc">5s, 10s, 30s, 60s</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Statistiken</div>
          <div class="trust-desc">Gesamt und Durchschnitt</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Sofort</div>
          <div class="trust-desc">Live-Ergebnisse</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="cps-reference-title-de">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">CPS Orientierung</p>
          <h2 id="cps-reference-title-de">Klickgeschwindigkeit Richtig Einordnen</h2>
          <p class="section-lede">Ein kurzer CPS Test misst Spitzenleistung. Ein längerer Test zeigt, ob Sie die Geschwindigkeit auch sauber halten können.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>5 bis 7 CPS</h3>
            <p>Normaler Bereich für Alltag, Browsing und Gelegenheitsspiele.</p>
          </article>
          <article class="landing-feature-card">
            <h3>8 bis 10 CPS</h3>
            <p>Guter Gaming-Bereich für schnelle, aber noch kontrollierte Klicks.</p>
          </article>
          <article class="landing-feature-card">
            <h3>10+ CPS</h3>
            <p>Fortgeschrittenes Niveau. Achten Sie auf Technik und Handbelastung.</p>
          </article>
          <article class="landing-feature-card">
            <h3>60 Sekunden</h3>
            <p>Beste Dauer, um Ausdauer und echte durchschnittliche Klickrate zu prüfen.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So messen Sie Ihre Klickgeschwindigkeit</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Dauer waehlen</h3>
            <p>Waehlen Sie die Testdauer.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Schnell klicken</h3>
            <p>Klicken Sie so schnell wie moeglich.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Rhythmus halten</h3>
            <p>Konsistenz vor Geschwindigkeit.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ergebnisse ansehen</h3>
            <p>Pruefen Sie Ihre CPS und Gesamtzahl.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
