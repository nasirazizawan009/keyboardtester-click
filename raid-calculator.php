<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free RAID Calculator - Capacity, Fault Tolerance, Speed for RAID 0/1/5/6/10/50/60 | KeyboardTester.click';
$pageDescription = 'Free RAID calculator for RAID 0, 1, 5, 6, 10, 50, and 60. Enter drive count and drive size to get usable capacity, number of drives that can fail, and read/write speed multipliers. Instant results for home NAS, workstation, and server builds.';
$pageKeywords = 'raid calculator, raid capacity calculator, raid 5 calculator, raid 10 calculator, raid fault tolerance, nas storage calculator';
$pageOgImage = 'images/raid-calculator/hero.jpg';
$pageOgImageAlt = 'RAID calculator - server rack hard drive storage capacity and fault tolerance';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('raid_calc', [['name'=>'Home','url'=>'/'],['name'=>'RAID Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-raid-calculator.php'; ?>
<section class="tool-stage" id="raid-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Calculator</p><h2>RAID Calculator</h2><p class="section-lede">Pick a RAID level, enter the number of drives and drive size, and get usable capacity, fault tolerance (how many drives can fail without data loss), and read / write speed multipliers. Covers RAID 0, 1, 5, 6, 10, 50, and 60 &mdash; the levels you'll actually use in home NAS, workstation, and server builds.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">Read the guide</a></div></div>
<section class="tool-shell"><?php include 'tools/raid_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">7 RAID levels</div><div class="trust-desc">0, 1, 5, 6, 10, 50, 60</div></div>
<div class="trust-item"><div class="trust-title">Usable capacity</div><div class="trust-desc">In TB / TiB / GB</div></div>
<div class="trust-item"><div class="trust-title">Fault tolerance</div><div class="trust-desc">How many drives can fail</div></div>
<div class="trust-item"><div class="trust-title">Speed factors</div><div class="trust-desc">Read / write multipliers</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/raid-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/raid-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
