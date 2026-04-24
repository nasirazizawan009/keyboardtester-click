<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Maus-Drift-Test - Sensor-Jitter im Ruhezustand Erkennen';
$pageDescription = 'Kostenloser Maus-Drift-Test. Erkenne Cursor-Drift im Ruhezustand und Sensor-Jitter. Konfigurierbar von 10 s bis 3 min, läuft komplett im Browser.';
$pageKeywords = 'maus drift test, cursor drift, sensor jitter, mouse drift test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Maus-Diagnose</p>
        <h1 class="hero-title">Maus-Drift-Test - Sensor-Jitter aufspüren</h1>
        <p class="hero-lede">Wandert dein Cursor, obwohl du die Maus nicht berührst? Der Drift-Test erfasst 10-180 Sekunden lang jeden Pointer-Event und meldet Gesamtdrift, größten Einzelsprung und Pass/Fail-Urteil.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">Test starten</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Pixelgenau</span><span class="hero-badge">10s - 3 min</span><span class="hero-badge">Urteil</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>Maus-Drift-Test</h2><p class="section-lede">Maus loslassen und Start drücken.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>So findest du Drift</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Hand weg</h3><p>Maus nicht berühren.</p></div>
        <div class="guideline-card"><h3>2. Start</h3><p>Dauer wählen und abwarten.</p></div>
        <div class="guideline-card"><h3>3. Urteil lesen</h3><p>0 px = perfekt, &lt;5 = normal.</p></div>
        <div class="guideline-card"><h3>4. Beheben</h3><p>Echtes Pad, Beschleunigung aus.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
