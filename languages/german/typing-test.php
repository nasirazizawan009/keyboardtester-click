<?php
/**
 * German Typing Speed Test - Tippgeschwindigkeitstest
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Tippgeschwindigkeitstest - Messen Sie WPM und Genauigkeit';
$pageDescription = 'Messen Sie Ihre Tippgeschwindigkeit in Woertern pro Minute (WPM) und Genauigkeit. Verbessern Sie Ihre Schreibfaehigkeiten.';
$pageKeywords = 'Tipptest, WPM, Schreibgeschwindigkeit, Tastaturtest, Woerter pro Minute';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/typing-test.php'); ?>">
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
        "name": "Was ist die durchschnittliche Tippgeschwindigkeit?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Der Durchschnitt liegt bei 40 WPM. Professionelle Schreibkraefte erreichen 65-75 WPM."
        }
      },
      {
        "@type": "Question",
        "name": "Wie verbessere ich meine Tippgeschwindigkeit?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Ueben Sie regelmaessig, nutzen Sie alle Finger und konzentrieren Sie sich auf Genauigkeit vor Geschwindigkeit."
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
          <h1 id="hero-title">Tippgeschwindigkeitstest</h1>
          <p class="hero-lede">Messen Sie Ihre WPM und Genauigkeit. Verbessern Sie Ihre Schreibfaehigkeiten.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Tipptest</h2>
          <p class="section-lede">Tippen Sie den angezeigten Text so schnell und genau wie moeglich.</p>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">WPM-Messung</div>
          <div class="trust-desc">Woerter pro Minute</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Genauigkeit</div>
          <div class="trust-desc">Trefferquote</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Verschiedene Texte</div>
          <div class="trust-desc">Unterschiedliche Schwierigkeit</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Fortschritt</div>
          <div class="trust-desc">Verbesserung verfolgen</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So nutzen Sie den Tipptest</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Dauer waehlen</h3>
            <p>Waehlen Sie die Testzeit.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Text tippen</h3>
            <p>Kopieren Sie den angezeigten Text.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Auf Genauigkeit achten</h3>
            <p>Genauigkeit ist wichtiger.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ergebnisse sehen</h3>
            <p>Analysieren Sie WPM und Fehler.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
