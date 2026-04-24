<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'FoV-Rechner - Sichtfeld Zwischen Spielen Umrechnen';
$pageDescription = 'Kostenloser FoV-Rechner. Rechne horizontales, vertikales und diagonales Sichtfeld zwischen 4:3, 16:9, 21:9 und 32:9 um - für CS2, Valorant, Apex, CoD und Fortnite.';
$pageKeywords = 'fov rechner, sichtfeld rechner, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Empfindlichkeitsrechner</p>
        <h1 class="hero-title">FoV-Rechner - Sichtfeld umrechnen</h1>
        <p class="hero-lede">Rechne ein Sichtfeld zwischen horizontal, vertikal und diagonal für 4:3, 16:9, 21:9 und 32:9 um. Presets für CS2, Valorant, Apex, CoD und Fortnite, damit du das gleiche vertikale Gefühl zwischen Spielen und Monitoren mitnimmst.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">FoV umrechnen</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / Diagonal</span><span class="hero-badge">Alle Seitenverhältnisse</span><span class="hero-badge">Spiel-Presets</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>FoV-Rechner</h2><p class="section-lede">Wähle ein Preset oder gib FoV und Seitenverhältnis ein.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>So rechnest du FoV um</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Spiel wählen</h3><p>Preset setzt Format und Seitenverhältnis.</p></div>
        <div class="guideline-card"><h3>2. FoV eingeben</h3><p>Aktuellen Wert eintragen.</p></div>
        <div class="guideline-card"><h3>3. Tabelle lesen</h3><p>Äquivalenter FoV je Format und Seitenverhältnis.</p></div>
        <div class="guideline-card"><h3>4. Übertragen</h3><p>Wert ins neue Spiel kopieren.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
