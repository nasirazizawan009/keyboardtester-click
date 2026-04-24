<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'PPI-Rechner - Pixel pro Zoll aus Auflösung';
$pageDescription = 'PPI-Rechner: Berechnet Pixel pro Zoll, Pixelabstand, Seitenverhältnis und Megapixel für jeden Bildschirm aus Auflösung und Diagonale. Kostenlos, sofort im Browser.';
$pageKeywords = 'ppi rechner, pixel pro zoll, monitor dpi, bildschirm dichte rechner';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Bildschirm-Rechner</p>
        <h1 class="hero-title">PPI-Rechner - Pixel pro Zoll</h1>
        <p class="hero-lede">Gib Auflösung und Diagonale ein und erhalte sofort PPI, Pixelabstand, Seitenverhältnis und Megapixel. Mit Presets für Monitore, Laptops und Handys.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">PPI berechnen</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + Pixelabstand</span><span class="hero-badge">Seitenverhältnis</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>PPI-Rechner</h2><p class="section-lede">Auflösung + Diagonale → PPI sofort.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
