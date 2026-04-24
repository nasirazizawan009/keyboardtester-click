<?php
/**
 * German Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Maus-DPI-Rechner - Echte Maus-DPI Online Messen';
$pageDescription = 'Kostenloser Maus-DPI-Rechner. Miss die echte DPI durch Ziehen auf dem Pad oder gib Pixel und Zoll manuell ein. Vergleiche angegebene DPI mit dem echten Sensor-DPI.';
$pageKeywords = 'maus dpi rechner, echte dpi messen, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Empfindlichkeitsrechner</p>
          <h1 class="hero-title">Maus-DPI-Rechner - Miss die echte DPI</h1>
          <p class="hero-lede">Überprüfe die echte DPI deiner Maus. Ziehe eine bekannte physische Strecke (oder tippe Werte ein) und wir berechnen die reale DPI in Pixel pro Zoll. Entdecke Sensorabweichungen und vergleiche mit dem angegebenen Wert.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">DPI messen</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Ziehpad</span>
            <span class="hero-badge">Pixel + Zoll Eingabe</span>
            <span class="hero-badge">Angegeben vs real</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Hauptwerkzeug</p>
          <h2>Maus-DPI-Rechner</h2>
          <p class="section-lede">Pixel und Zoll eingeben oder auf dem Pad ziehen.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>So berechnest du die DPI</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Beschleunigung aus</h3><p>Deaktiviere "Zeigergenauigkeit verbessern" in Windows vor der Messung.</p></div>
          <div class="guideline-card"><h3>2. Lineal bereitlegen</h3><p>Leg ein Lineal neben dein Mauspad.</p></div>
          <div class="guideline-card"><h3>3. 10 cm oder 4 Zoll ziehen</h3><p>Halte gedrückt und zieh gerade.</p></div>
          <div class="guideline-card"><h3>4. DPI vergleichen</h3><p>Gib den angegebenen DPI ein und sieh die Abweichung.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
