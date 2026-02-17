<?php
/**
 * German Click Speed Test - Klickgeschwindigkeitstest
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Klickgeschwindigkeitstest - Messen Sie Ihre CPS Kostenlos';
$pageDescription = 'Messen Sie Ihre Klickgeschwindigkeit (CPS - Klicks pro Sekunde). Testen Sie Ihre Geschwindigkeit mit verschiedenen Zeitintervallen.';
$pageKeywords = 'Klickgeschwindigkeit, CPS Test, Klicks pro Sekunde, Mausgeschwindigkeit, Click Speed Test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/click-speed.php'); ?>">
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
        "name": "Was ist CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS bedeutet Klicks pro Sekunde. Es misst, wie oft Sie in einer Sekunde klicken koennen."
        }
      },
      {
        "@type": "Question",
        "name": "Was ist eine gute CPS-Geschwindigkeit?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Der Durchschnitt liegt bei 6-8 CPS. Professionelle Spieler koennen 10-14 CPS erreichen."
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
