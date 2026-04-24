<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Tastatur-Doppelklick-Test - Chatter-Detektor';
$pageDescription = 'Tastatur-Doppelklick-Detektor: Findet Tasten, die zwei Ereignisse bei nur einem Druck registrieren. Konfigurierbarer Schwellenwert, vollständiges Protokoll, ohne Installation.';
$pageKeywords = 'tastatur doppelklick, chatter detektor, key chatter';
?>
<!DOCTYPE html>
<html lang="de">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Tastatur-Chatter-Detektor</p>
<h1 class="hero-title">Tastatur-Doppelklick-Test - Chatter-Detektor</h1>
<p class="hero-lede">Erkenne Tasten die zweimal von einem Druck registrieren. Konfigurierbarer Schwellenwert 30-150ms mit Statistiken pro Taste.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">Starten</a></div>
<div class="hero-badges"><span class="hero-badge">Schwellenwert konfigurierbar</span><span class="hero-badge">Stats pro Taste</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="Tastatur-Chatter-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>Tastatur-Chatter-Detektor</h2><p class="section-lede">Druecke jede Taste einmal. Tasten die chattern erscheinen unten.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
