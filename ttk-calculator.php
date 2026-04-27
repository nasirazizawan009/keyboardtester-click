<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free TTK Calculator - Time-To-Kill Damage Math for FPS Games | KeyboardTester.click';
$pageDescription = 'Free TTK (time-to-kill) calculator for FPS and shooter games. Enter damage, RPM, HP, headshot multiplier, and armor to get exact TTK in milliseconds, bullets to kill, and headshot vs body comparison. Works for CS2, Valorant, Apex, Call of Duty, and any shooter.';
$pageKeywords = 'ttk calculator, time to kill calculator, fps ttk, damage calculator, bullets to kill, cs2 ttk, valorant ttk, apex ttk, cod ttk';
$pageOgImage = 'images/ttk-calculator/hero.jpg';
$pageOgImageAlt = 'TTK calculator - FPS gaming damage math, bullets to kill, time to kill';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('ttk_calc', [['name'=>'Home','url'=>'/'],['name'=>'TTK Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-ttk-calculator.php'; ?>
<section class="tool-stage" id="ttk-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Gaming calculator</p><h2>TTK Calculator</h2><p class="section-lede">Enter a weapon's damage, fire rate (RPM), target HP and armor, plus the headshot multiplier &mdash; the calculator returns bullets-to-kill and time-to-kill in milliseconds, side by side for body shots vs headshots. Works for any shooter: CS2, Valorant, Apex, Call of Duty, Fortnite, Overwatch, or a homebrew game.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">Read guide</a></div></div>
<section class="tool-shell"><?php include 'tools/ttk_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">TTK in ms</div><div class="trust-desc">Millisecond-accurate math</div></div>
<div class="trust-item"><div class="trust-title">Headshot compare</div><div class="trust-desc">Body vs head TTK side by side</div></div>
<div class="trust-item"><div class="trust-title">Armor aware</div><div class="trust-desc">Damage reduction included</div></div>
<div class="trust-item"><div class="trust-title">Weapon presets</div><div class="trust-desc">AK / AWP / Vandal / R-99</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/ttk-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/ttk-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
