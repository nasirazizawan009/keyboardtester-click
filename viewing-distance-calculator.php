<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Viewing Distance Calculator - Optimal TV & Monitor Distance | KeyboardTester.click';
$pageDescription = 'Free viewing distance calculator. Enter screen size and resolution (1080p, 4K, 8K) to get optimal viewing distance by THX, SMPTE, and 4K UHD recommendations.';
$pageKeywords = 'viewing distance calculator, tv viewing distance, monitor viewing distance, 4k viewing distance, thx viewing distance';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Viewing distance calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('view_dist_calc', [['name'=>'Home','url'=>'/'],['name'=>'Viewing Distance Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-viewing-distance-calculator.php'; ?>
<section class="tool-stage" id="viewing-distance-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Viewing Distance Calculator</h2><p class="section-lede">Enter screen size and resolution to get THX, SMPTE, and 4K UHD recommended viewing distances — the range where you see every pixel without tracking fatigue.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/viewing_distance_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">THX / SMPTE standards</div><div class="trust-desc">Industry-recommended ranges</div></div>
<div class="trust-item"><div class="trust-title">4K UHD distance</div><div class="trust-desc">Where 4K becomes visible</div></div>
<div class="trust-item"><div class="trust-title">Viewing angle</div><div class="trust-desc">Field of view in degrees</div></div>
<div class="trust-item"><div class="trust-title">Feet + meters</div><div class="trust-desc">Both units supported</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/viewing-distance-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/viewing-distance-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
