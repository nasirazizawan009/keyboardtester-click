<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Surround Sound Test - 5.1 / 7.1 Channel Walk-Around | KeyboardTester.click';
$pageDescription = 'Free surround sound test. Walk a tone around each channel (front L/R, center, sub, rear L/R, side L/R) so you can verify your 5.1 or 7.1 speaker setup is wired and mapped correctly. Gracefully falls back to stereo panning when the browser cannot output multichannel audio. No install.';
$pageKeywords = 'surround sound test, 5.1 speaker test, 7.1 channel test, speaker placement test, home theater test, channel identification';
$pageOgImage = 'images/surround-sound-test/hero.jpg';
$pageOgImageAlt = 'Surround sound test - home theater 5.1 / 7.1 speaker system';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('surround_sound_test', [['name'=>'Home','url'=>'/'],['name'=>'Surround Sound Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-surround-sound-test.php'; ?>
<section class="tool-stage" id="surround-sound-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Surround Sound Test</h2><p class="section-lede">Play a short tone through each channel of a 5.1 or 7.1 setup, one at a time, so you can verify each speaker is connected, wired to the right position, and mapped correctly by your OS or receiver. When the browser cannot deliver multichannel audio, the tool falls back to stereo panning and front/back volume shaping so headphone users can still validate channel order.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How it works</a></div></div>
<section class="tool-shell"><?php include 'tools/surround_sound_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">5.1 + 7.1</div><div class="trust-desc">Walk-around or individual channels</div></div>
<div class="trust-item"><div class="trust-title">Channel merger</div><div class="trust-desc">Web Audio multichannel output</div></div>
<div class="trust-item"><div class="trust-title">Stereo fallback</div><div class="trust-desc">Headphone-safe mode</div></div>
<div class="trust-item"><div class="trust-title">Per-channel test</div><div class="trust-desc">Isolate wiring errors</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/surround-sound-test.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/surround-sound-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
