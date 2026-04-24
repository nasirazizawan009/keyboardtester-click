<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Maus-Beschleunigungs-Test - Langsames vs Schnelles Wischen';
$pageDescription = 'Kostenloser Maus-Beschleunigungs-Test. Vergleiche die zurückgelegten Pixel bei langsamer und schneller Bewegung, um Windows-Zeigerbeschleunigung oder Firmware-Beschleunigung zu erkennen.';
$pageKeywords = 'maus beschleunigung test, zeiger beschleunigung windows, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Maus-Diagnose</p>
        <h1 class="hero-title">Maus-Beschleunigungs-Test</h1>
        <p class="hero-lede">Fügen Windows oder deine Maus-Firmware heimlich Beschleunigung hinzu und killen damit deine Konsistenz? Ziehe die gleiche physische Strecke langsam und dann schnell — wenn sich die Pixel mit der Geschwindigkeit erhöhen, ist Beschleunigung aktiv. Das Tool zeigt das exakte Schnell/Langsam-Verhältnis.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">Test starten</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Pixelgenau</span><span class="hero-badge">Verhältnis-Urteil</span><span class="hero-badge">Keine Installation</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>Maus-Beschleunigungs-Test</h2><p class="section-lede">Langsam ziehen, dann schnell, gleiche Strecke.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>So erkennst du Beschleunigung</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Langsam ziehen</h3><p>Etwa 2 Sekunden.</p></div>
        <div class="guideline-card"><h3>2. Schnell ziehen</h3><p>Gleiche Strecke, unter 0,5 s.</p></div>
        <div class="guideline-card"><h3>3. Verhältnis lesen</h3><p>1,00 = perfekt, &gt;1,15 = Beschleunigung.</p></div>
        <div class="guideline-card"><h3>4. Deaktivieren</h3><p>"Zeigergenauigkeit verbessern" abschalten.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
