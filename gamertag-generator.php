<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Gamertag Generator - Random Usernames for Xbox, PSN, Steam | KeyboardTester.click';
$pageDescription = 'Free gamertag generator. Create random gamer names across 6 styles (edgy, funny, cute, pro, fantasy, cyber), copy with one click, save favorites, and respect Xbox/PSN/Steam length rules. Browser-based, no install.';
$pageKeywords = 'gamertag generator, gamer name generator, xbox gamertag ideas, random username generator, psn id generator, cool gaming names';
$pageOgImage = 'images/lucky-wheel/hero.png';
$pageOgImageAlt = 'Gamertag generator - random gamer usernames in 6 styles';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('gamertag_generator', [['name'=>'Home','url'=>'/'],['name'=>'Gamertag Generator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-gamertag-generator.php'; ?>
<section class="tool-stage" id="gamertag-generator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Gamertag Generator</h2><p class="section-lede">Generate 10 random gamer names at a time across 6 style presets, copy any to clipboard, star favorites, and constrain length to fit Xbox, PSN, and Steam name rules.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/gamertag_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">6 styles</div><div class="trust-desc">Edgy, funny, cute, pro, fantasy, cyber</div></div>
<div class="trust-item"><div class="trust-title">Length limit</div><div class="trust-desc">Fits Xbox/PSN/Steam rules</div></div>
<div class="trust-item"><div class="trust-title">Click to copy</div><div class="trust-desc">One-tap clipboard</div></div>
<div class="trust-item"><div class="trust-title">Favorites</div><div class="trust-desc">Saved in browser</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/gamertag-generator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/gamertag-generator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
