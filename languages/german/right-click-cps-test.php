<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Rechtsklick-CPS-Test - Rechte Maustasten Geschwindigkeit';
$pageDescription = 'Rechtsklick-CPS-Test: Misst die Rechtsklick-Geschwindigkeit (Klicks pro Sekunde) mit deaktiviertem Kontextmenü. Ideal für Gamer und Switch-Tests, ohne Installation.';
$pageKeywords = 'rechtsklick CPS test, right click CPS';
?>
<!DOCTYPE html>
<html lang="de">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Rechtsklick-CPS-Tester</p>
<h1 class="hero-title">Rechtsklick-CPS-Test - Rechte Maustasten Geschwindigkeit</h1>
<p class="hero-lede">Miss Klicks pro Sekunde der rechten Maustaste in 5, 10 oder 30 Sekunden Sessions. Kontextmenue des Browsers deaktiviert.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">Starten</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">Anleitung</a>
</div>
<div class="hero-badges"><span class="hero-badge">Nur Rechtsklick</span><span class="hero-badge">Spitzen-CPS</span><span class="hero-badge">Kontextmenue aus</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="Rechtsklick-CPS-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">Hauptwerkzeug</p><h2>Rechtsklick-CPS-Tester</h2><p class="section-lede">Rechtsklick im Bereich so schnell wie moeglich.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>Anleitung</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. Konfigurieren</h3><p>Waehle Dauer.</p></div>
<div class="guideline-card"><h3>2. Schnell rechtsklicken</h3><p>Rechtsklick im Bereich.</p></div>
<div class="guideline-card"><h3>3. Ergebnisse lesen</h3><p>Gesamt, CPS, Spitze.</p></div>
<div class="guideline-card"><h3>4. Vergleichen</h3><p>Mit Linksklick-CPS vergleichen.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
