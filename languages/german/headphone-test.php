<?php
/**
 * German Headphone Test - Kopfhoerer- und Lautsprechertester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Kopfhörer Test Online - Links Rechts Stereo Prüfen';
$pageDescription = 'Kostenloser Kopfhörer- und Lautsprecher-Test: prüfen Sie linken/rechten Kanal, Stereo-Balance und Audio-Ausgabe direkt im Browser.';
$pageKeywords = 'Kopfhörer Test, Lautsprecher Test, Stereo Test, links rechts Audio Test, Headphone Test, Sound Test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('headphone_speaker_tester_index.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('headphone_speaker_tester_index.php'); ?>">

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
        "name": "Was prüft der Kopfhörer Test?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Der Test spielt getrennte Signale für linken und rechten Kanal ab. Damit erkennen Sie vertauschte Kanäle, einseitige Ausfälle, schwache Balance und grundlegende Stereo-Probleme."
        }
      },
      {
        "@type": "Question",
        "name": "Funktioniert der Test mit Lautsprechern?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Ja. Der Test funktioniert mit Kopfhörern, Headsets, Monitorlautsprechern, Bluetooth-Lautsprechern und externen Audio-Interfaces, solange der Browser Audio ausgeben darf."
        }
      },
      {
        "@type": "Question",
        "name": "Warum ist links und rechts vertauscht?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Häufige Ursachen sind falsch eingesetzte Ohrhörer, ein vertauschtes Kabel, eine falsche Windows- oder macOS-Ausgabe, Adapterprobleme oder ein Balance-Regler in der Treibersoftware."
        }
      },
      {
        "@type": "Question",
        "name": "Was tun, wenn nur ein Kanal Ton hat?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Prüfen Sie Stecker, Bluetooth-Verbindung, System-Balance und ein anderes Gerät. Wenn derselbe Kanal überall fehlt, ist wahrscheinlich Kabel, Treiber oder Lautsprecher defekt."
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
          <h1 id="hero-title">Kopfhoerer-Tester</h1>
          <p class="hero-lede">Ueberpruefen Sie die Stereo-Kanaele und Audioqualitaet Ihrer Kopfhoerer.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Kopfhoerer-Tester</h2>
          <p class="section-lede">Spielen Sie Audio auf jedem Kanal ab, um Ihre Kopfhoerer zu ueberpruefen.</p>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Linker Kanal</div>
          <div class="trust-desc">Einzeltest</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Rechter Kanal</div>
          <div class="trust-desc">Einzeltest</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Stereo</div>
          <div class="trust-desc">Beide Kanaele</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Balance</div>
          <div class="trust-desc">Gleichgewicht pruefen</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="audio-reference-title-de">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Audio-Diagnose</p>
          <h2 id="audio-reference-title-de">So Bewerten Sie den Stereo-Test</h2>
          <p class="section-lede">Testen Sie zuerst jeden Kanal einzeln, danach beide zusammen. So trennen Sie Balance-Probleme von defekten Kabeln, Buchsen oder Bluetooth-Verbindungen.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Nur links</h3>
            <p>Der Ton sollte ausschließlich im linken Hörer oder Lautsprecher hörbar sein.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Nur rechts</h3>
            <p>Der rechte Kanal sollte klar und ohne Übersprechen vom linken Kanal kommen.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Beide Kanäle</h3>
            <p>Die Lautstärke sollte mittig wirken und auf beiden Seiten ähnlich stark sein.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Fehler eingrenzen</h3>
            <p>Vergleichen Sie Headset, Browser und System-Ausgabe, bevor Sie Hardware austauschen.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihre Kopfhoerer</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Kopfhoerer anschliessen</h3>
            <p>Stellen Sie sicher, dass sie angeschlossen sind.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Links testen</h3>
            <p>Audio nur links abspielen.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Rechts testen</h3>
            <p>Audio nur rechts abspielen.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Balance pruefen</h3>
            <p>Beide Kanaele zusammen testen.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
