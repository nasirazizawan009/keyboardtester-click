<?php
/**
 * German Mouse Tester - Maus-Tester
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-de.php';

$pageTitle = 'Maus-Tester - Testen Sie Klicks und Scrollrad Kostenlos';
$pageDescription = 'Testen Sie alle Maustasten, Scrollrad und Cursorbewegung. Erkennen Sie Mausprobleme sofort.';
$pageKeywords = 'Maus-Tester, Maustest, Klicktest, Scrollrad testen, Maustasten pruefen';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo url('languages/german/mouse-test.php'); ?>">
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
        "name": "Wie teste ich meine Maustasten?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Klicken Sie im Testbereich mit jeder Maustaste. Das Tool erkennt und zeigt an, welche Taste gedrueckt wurde."
        }
      },
      {
        "@type": "Question",
        "name": "Kann ich das Scrollrad testen?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Ja, scrollen Sie im Testbereich nach oben und unten, um die Scrollrad-Funktion zu ueberpruefen."
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
          <h1 id="hero-title">Maus-Tester</h1>
          <p class="hero-lede">Testen Sie alle Tasten, Scrollrad und Bewegung. Erkennen Sie Probleme sofort.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">Test starten</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Anleitung</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2 id="tool-stage-title">Maus-Tester</h2>
          <p class="section-lede">Klicken und scrollen Sie im Testbereich.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Tipps anzeigen</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Hauptfunktionen">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Alle Tasten</div>
          <div class="trust-desc">Links, Rechts, Mitte</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Scrollrad</div>
          <div class="trust-desc">Hoch und Runter</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Zaehler</div>
          <div class="trust-desc">Klick-Tracking</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Echtzeit</div>
          <div class="trust-desc">Sofortige Reaktion</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Vollstaendige Diagnose</p>
          <h2 id="feature-title">Ueberpruefen Sie jede Mausfunktion</h2>
          <p class="section-lede">Professionelle Werkzeuge zum Testen Ihrer Maus.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Tastentest</h3>
            <p>Pruefen Sie linke, rechte und mittlere Taste.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Scrollrad</h3>
            <p>Testen Sie fluessiges Scrollen.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Klickzaehler</h3>
            <p>Verfolgen Sie die Anzahl der Klicks.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Live-Status</h3>
            <p>Sofortiges visuelles Feedback.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-de.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Bedienungsanleitung</p>
          <h2>So testen Sie Ihre Maus</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Tasten klicken</h3>
            <p>Testen Sie jede Maustaste.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Scrollrad benutzen</h3>
            <p>Scrollen Sie hoch und runter.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Cursor bewegen</h3>
            <p>Ueberpruefen Sie fluessige Bewegung.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Ergebnisse pruefen</h3>
            <p>Sehen Sie Zaehlung und Status.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-de.php'; ?>
</body>
</html>
