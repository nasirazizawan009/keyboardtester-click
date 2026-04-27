<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Hearing Age Test - How Old Are Your Ears? (Mosquito Tone Test) | KeyboardTester.click';
$pageDescription = 'Free hearing age test using the mosquito tone (17.4 kHz) and high-frequency sine sweeps. Find your hearing age in 12 quick steps from 8 kHz to 22 kHz, plus a manual fine-tune slider. Browser-based, no install.';
$pageKeywords = 'hearing age test, mosquito tone test, how old are your ears, high frequency hearing test, 17.4 khz test, hearing test online, ear age test';
$pageOgImage = 'images/hearing-age-test/hero.jpg';
$pageOgImageAlt = 'Hearing age test - young person in headphones taking a high-frequency mosquito tone hearing test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('hearing_age_test', [['name'=>'Home','url'=>'/'],['name'=>'Hearing Age Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-hearing-age-test.php'; ?>
<section class="tool-stage" id="hearing-age-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Hearing Age Test (Mosquito Tone)</h2><p class="section-lede">Take a 12-step hearing test from 8 kHz up to 22 kHz to estimate your hearing age. Includes the famous 17.4 kHz mosquito tone, a manual fine-tune slider, and a safety-capped volume control. Use wired headphones at low volume for the most accurate result.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How it works</a></div></div>
<section class="tool-shell"><?php include 'tools/hearing_age_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">12 frequencies</div><div class="trust-desc">8 kHz to 22 kHz</div></div>
<div class="trust-item"><div class="trust-title">Mosquito tone</div><div class="trust-desc">Hear 17.4 kHz?</div></div>
<div class="trust-item"><div class="trust-title">Volume safety</div><div class="trust-desc">Capped at -20 dBFS</div></div>
<div class="trust-item"><div class="trust-title">Manual slider</div><div class="trust-desc">Find your exact limit</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/hearing-age-test.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/hearing-age-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
