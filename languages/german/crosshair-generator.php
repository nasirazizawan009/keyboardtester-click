<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Fadenkreuz-Generator - Eigenes Crosshair für CS2 & Valorant';
$pageDescription = 'Kostenloser Fadenkreuz-Generator. Erstelle ein eigenes Crosshair mit Live-Vorschau, lade PNG herunter, kopiere den CS2-Konsolenbefehl oder Valorant-Einstellwerte.';
$pageKeywords = 'fadenkreuz generator, crosshair erstellen, cs2 fadenkreuz, valorant crosshair, crosshair generator';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Fadenkreuz-Werkzeuge</p>
        <h1 class="hero-title">Fadenkreuz-Generator - Eigenes Crosshair</h1>
        <p class="hero-lede">Erstelle ein Fadenkreuz mit Live-Vorschau. Wähle ein Pro-Preset (s1mple, TenZ) oder stelle jedes Detail ein: Form, Farbe, Stärke, Länge, Lücke, Mittelpunkt und Kontur. Lade ein transparentes PNG oder kopiere den fertigen CS2-Konsolenbefehl.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">Generator öffnen</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Live-Vorschau</span><span class="hero-badge">CS2-Befehl</span><span class="hero-badge">Valorant-Werte</span><span class="hero-badge">Transparentes PNG</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>Fadenkreuz-Generator</h2><p class="section-lede">Werte einstellen und als CS2-Befehl, Valorant-Werte oder PNG exportieren.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>So nutzt du das Fadenkreuz</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Preset wählen</h3><p>Mit Pro-Preset starten und anpassen.</p></div>
        <div class="guideline-card"><h3>2. Vorschau justieren</h3><p>Form, Farbe, Kontur in Echtzeit.</p></div>
        <div class="guideline-card"><h3>3. Exportieren</h3><p>PNG herunterladen oder CS2-Befehl kopieren.</p></div>
        <div class="guideline-card"><h3>4. Im Spiel einsetzen</h3><p>In Konsole (~) einfügen oder in Valorant eintragen.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
