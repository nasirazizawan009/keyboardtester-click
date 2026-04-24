<?php
/**
 * German Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Maus-Genauigkeitstest - Ziel-Trainer Online Kostenlos';
$pageDescription = 'Kostenloser Online-Maus-Genauigkeitstest. Miss Trefferquote, durchschnittlichen Pixelabstand und Reaktionszeit. Kalibriere DPI und Empfindlichkeit mit echten Daten.';
$pageKeywords = 'maus genauigkeitstest, ziel trainer, aim trainer';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Ziel-Trainer</p>
          <h1 class="hero-title" id="hero-title">Maus-Genauigkeitstest - Ziel-Trainer</h1>
          <p class="hero-lede">Miss deine Klickpraezision, durchschnittlichen Pixelabstand und Reaktionszeit pro Ziel. Kalibriere DPI und Empfindlichkeit mit echten Daten.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">Test starten</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Pixelgenauigkeit</span>
            <span class="hero-badge">Reaktionszeit</span>
            <span class="hero-badge">DPI-Kalibrierung</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Ziel-Trainer</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Zielgroesse</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">Keine Installation</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="Maus-Genauigkeitstest - Ziel-Trainer" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">Echte Zieldaten</div><p>Trefferquote und durchschnittlicher Fehler pro Session.</p></div>
            <div class="mini-card"><div class="mini-title">DPI-Schleife</div><p>Teste, aendere DPI, teste erneut - sieh wie sich Praezision aendert.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Ziel-Trainer</p>
          <h2 id="tool-stage-title">Ziel-Trainer</h2>
          <p class="section-lede">Klicke jedes Ziel so schnell und praezise wie moeglich an.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Tipps ansehen</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Anleitung zum Genauigkeitstest">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Pixelgenauigkeit</div><div class="trust-desc">Jeder Klick am Zielmittelpunkt gemessen</div></div>
        <div class="trust-item"><div class="trust-title">Reaktionszeit</div><div class="trust-desc">Millisekunden zwischen Erscheinen und Klick</div></div>
        <div class="trust-item"><div class="trust-title">DPI-Kalibrierung</div><div class="trust-desc">Einstellungen mit objektiven Daten vergleichen</div></div>
        <div class="trust-item"><div class="trust-title">Lokal ohne Anmeldung</div><div class="trust-desc">Keine Downloads, kein Tracking</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Anleitung zum Genauigkeitstest</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Session konfigurieren</h3><p>Waehle Dauer (30s/60s/120s) und Zielgroesse.</p></div>
          <div class="guideline-card"><h3>2. Jedes Ziel anklicken</h3><p>Klicke jedes gruene Ziel sofort an.</p></div>
          <div class="guideline-card"><h3>3. Ergebnisse lesen</h3><p>Trefferprozent, mittlerer Fehler und Zeit.</p></div>
          <div class="guideline-card"><h3>4. Anpassen und wiederholen</h3><p>Aendere DPI oder Empfindlichkeit und teste erneut.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
