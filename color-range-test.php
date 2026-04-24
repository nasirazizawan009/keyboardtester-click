<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Color Range Test - Detect Limited vs Full RGB (16-235 vs 0-255) | KeyboardTester.click';
$pageDescription = 'Free color range test. See whether your monitor is configured for full RGB (0-255) or limited / TV range (16-235). Detect crushed blacks, clipped whites, and HDMI handshake mistakes.';
$pageKeywords = 'color range test, limited rgb test, full rgb test, 16-235 vs 0-255, hdmi rgb range, limited range check';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Color range test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('color_range', [['name'=>'Home','url'=>'/'],['name'=>'Color Range Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-color-range-test.php'; ?>
<section class="tool-stage" id="color-range-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Color Range Test</h2><p class="section-lede">Full-RGB monitors show every patch distinct from its neighbors. Limited-range setups crush the darkest and brightest few patches into solid black and white.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/color_range_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Near-black patches</div><div class="trust-desc">RGB 0–31</div></div>
<div class="trust-item"><div class="trust-title">Near-white patches</div><div class="trust-desc">RGB 224–255</div></div>
<div class="trust-item"><div class="trust-title">Mid-gray ramp</div><div class="trust-desc">Continuous 0–255 gradient</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen toggle</div><div class="trust-desc">Zero surrounding light</div></div>
</div></section>
<?php $intentClusterTool = 'screen'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/color-range-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/color-range-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
