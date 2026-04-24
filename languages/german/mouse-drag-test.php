<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Maus Drag-Click-Test - CPS und Burst-Rate Online';
$pageDescription = 'Maus-Drag-Test: Misst Geschwindigkeit, Spitzen- und Gesamtanzahl der Klicks beim Ziehen mit Live-Grafik. Ideal für Drag-Click-Techniken im Gaming, ohne Installation.';
$pageKeywords = 'drag click test, drag click CPS, maus drag click, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Drag-Click-Tester</p>
          <h1 class="hero-title">Maus Drag-Click-Test - CPS und Burst-Rate</h1>
          <p class="hero-lede">Miss Drag-Click-CPS, Burst-Spitzen und Gesamtklicks in 5, 10 oder 30 Sekunden Sessions. Ideal fuer Minecraft PvP.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">Test starten</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Live CPS-Zaehler</span>
            <span class="hero-badge">Burst-Spitze</span>
            <span class="hero-badge">Zeitachsendiagramm</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="Maus Drag-Click-Test" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">Hauptwerkzeug</p><h2>Drag-Click-Tester</h2><p class="section-lede">Klicke oder ziehe einen Finger ueber die Taste so schnell wie moeglich.</p></div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?></section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Anleitung zum Drag-Click-Test</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Session konfigurieren</h3><p>Waehle Dauer und druecke Start.</p></div>
          <div class="guideline-card"><h3>2. Klicke oder ziehe</h3><p>Ziehe Finger bei 30-45 Grad fuer mehr Reibung.</p></div>
          <div class="guideline-card"><h3>3. Ergebnisse lesen</h3><p>Durchschn. CPS, Spitze und 200ms-Burst-Spitze.</p></div>
          <div class="guideline-card"><h3>4. Technik anpassen</h3><p>Winkel oder Maus aendern und erneut testen.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
