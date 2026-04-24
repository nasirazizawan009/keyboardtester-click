<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Mouse Spin Test - 360° Spin Counter & Rotation Tracker | KeyboardTester.click';
$pageDescription = 'Free mouse spin test. Count how many 360° rotations you can spin your mouse over 30 seconds. Shows peak spins-per-second, total degrees, and rotation direction.';
$pageKeywords = 'mouse spin test, mouse rotation test, 360 spin counter, mouse speed test, spin per second';
$pageOgImage = 'blog/images/dpi-mouse-jpg.jpg';
$pageOgImageAlt = 'Mouse spin test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('mouse_spin', [['name'=>'Home','url'=>'/'],['name'=>'Mouse Spin Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-mouse-spin-test.php'; ?>
<section class="tool-stage" id="mouse-spin-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Mouse Spin Test</h2><p class="section-lede">Hold and drag your mouse in circles around the pad. Every 360° counts as one spin. 30-second timer, peak spins-per-second tracker, direction indicator.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/mouse_spin_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live spin count</div><div class="trust-desc">Every full 360° detected</div></div>
<div class="trust-item"><div class="trust-title">Peak SPS</div><div class="trust-desc">Spins-per-second max</div></div>
<div class="trust-item"><div class="trust-title">Total degrees</div><div class="trust-desc">Cumulative rotation</div></div>
<div class="trust-item"><div class="trust-title">Direction</div><div class="trust-desc">Clockwise or counter</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/mouse-spin-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/mouse-spin-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
