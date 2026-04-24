<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Vibration Test - Phone Haptics & Gamepad Rumble Check | KeyboardTester.click';
$pageDescription = 'Free online vibration test. Test phone Vibration API with pattern presets (pulse, SOS, heartbeat) and gamepad rumble with per-motor intensity sliders. Browser-based, no install.';
$pageKeywords = 'vibration test, phone vibration check, navigator vibrate, gamepad rumble test, controller vibration, haptics test';
$pageOgImage = 'images/mouse/hero.png';
$pageOgImageAlt = 'Vibration test - phone haptics and gamepad rumble check';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('vibration_test', [['name'=>'Home','url'=>'/'],['name'=>'Vibration Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-vibration-test.php'; ?>
<section class="tool-stage" id="vibration-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Vibration Test</h2><p class="section-lede">Test phone haptics with pattern presets (pulse, SOS, heartbeat, custom) and verify connected gamepad rumble with weak/strong motor sliders &mdash; all in one browser tool, no install required.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/vibration_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Phone haptics</div><div class="trust-desc">navigator.vibrate patterns</div></div>
<div class="trust-item"><div class="trust-title">Gamepad rumble</div><div class="trust-desc">Dual-rumble motor test</div></div>
<div class="trust-item"><div class="trust-title">Custom patterns</div><div class="trust-desc">Any ms sequence</div></div>
<div class="trust-item"><div class="trust-title">Per-motor control</div><div class="trust-desc">Weak + strong sliders</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/vibration-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/vibration-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
