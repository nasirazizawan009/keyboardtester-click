<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Monitor Ghosting Test - Pixel Response Time Check | KeyboardTester.click';
$pageDescription = 'Free monitor ghosting test. Detect pixel response issues with an adjustable-speed moving box over color backgrounds. Compare overdrive settings in seconds.';
$pageKeywords = 'monitor ghosting test, pixel response time test, display ghosting check, monitor blur test';
$pageOgImage = 'images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg';
$pageOgImageAlt = 'Monitor ghosting test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('monitor_ghosting', [['name'=>'Home','url'=>'/'],['name'=>'Monitor Ghosting Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-monitor-ghosting-test.php'; ?>
<section class="tool-stage" id="monitor-ghosting-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Monitor Ghosting Test</h2><p class="section-lede">Watch the moving box. Trail behind = ghosting. No trail = healthy panel.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/monitor_ghosting_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Adjustable speed</div><div class="trust-desc">100-3000 px/sec</div></div>
<div class="trust-item"><div class="trust-title">5 box colors</div><div class="trust-desc">White, black, RGB</div></div>
<div class="trust-item"><div class="trust-title">6 backgrounds</div><div class="trust-desc">Color combinations</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen mode</div><div class="trust-desc">Maximum visibility</div></div>
</div></section>
<?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/monitor-ghosting-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/monitor-ghosting-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
