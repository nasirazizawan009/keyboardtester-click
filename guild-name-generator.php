<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Guild Name Generator - MMO Clan & Guild Names | KeyboardTester.click';
$pageDescription = 'Free guild name generator for MMO clans, WoW guilds, Destiny clans, FFXIV Free Companies, and Discord servers. 6 themes (fantasy, sci-fi, dark, noble, rogue, mythic), with length limits and copy-to-clipboard. Browser-based, no install.';
$pageKeywords = 'guild name generator, clan name generator, mmo guild names, wow guild name, destiny clan name, ffxiv free company name, fantasy guild names';
$pageOgImage = 'images/guild-name-generator/hero.jpg';
$pageOgImageAlt = 'Guild name generator - medieval castle imagery for MMO clans';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('guild_name_generator', [['name'=>'Home','url'=>'/'],['name'=>'Guild Name Generator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-guild-name-generator.php'; ?>
<section class="tool-stage" id="guild-name-generator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Guild Name Generator</h2><p class="section-lede">Generate 10 random guild and clan names at a time across 6 themes &mdash; fantasy, sci-fi, dark, noble, rogue, mythic. Pick templates (Order of X, House of X, The Xs, etc.), copy any to clipboard, star favorites.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/guild_name_generator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">6 themes</div><div class="trust-desc">Fantasy, sci-fi, dark, noble, rogue, mythic</div></div>
<div class="trust-item"><div class="trust-title">5 templates</div><div class="trust-desc">Order of, House of, The Xs, etc.</div></div>
<div class="trust-item"><div class="trust-title">Length limit</div><div class="trust-desc">Fits WoW/FFXIV/Destiny rules</div></div>
<div class="trust-item"><div class="trust-title">Favorites</div><div class="trust-desc">Saved in browser</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/guild-name-generator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/guild-name-generator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
