<?php
/**
 * German localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Bass-Test - Sweep 20 Hz bis 200 Hz für Subwoofer';
$pageDescription = 'Kostenloser Bass-Test online. Frequenzsweep 20 Hz bis 200 Hz mit ISO-Presets zum Prüfen von Subwoofer, Studiomonitoren und Kopfhörern. Ohne Installation.';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Audio-Diagnose</p>
          <h1 class="hero-title">Bass-Test - Subwoofer und Sweep 20 bis 200 Hz</h1>
          <p class="hero-lede">Prüfe, ob dein Subwoofer, Studiomonitor oder Kopfhörer tiefe Frequenzen sauber wiedergibt. Sweep 20 bis 200 Hz, ISO-1/3-Oktav-Presets oder Halteton. Reine Sinustöne, keine Musik, keine Obertöne.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">Bass-Test starten</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Alle Tools</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Audio-Diagnose</p>
          <h2>Bass-Test</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
