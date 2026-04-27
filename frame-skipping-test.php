<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Frame Skipping Test - Detect Dropped Frames at Your Refresh Rate | KeyboardTester.click';
$pageDescription = 'Free frame skipping test. Detects dropped or skipped frames at your current refresh rate using requestAnimationFrame timestamp analysis. Shows dropped frame count, stutter events, and a moving reference bar for visual confirmation. Browser-based, no install.';
$pageKeywords = 'frame skipping test, dropped frame test, stutter test, frame pacing test, refresh rate stability, vsync test';
$pageOgImage = 'images/frame-skipping-test/hero.jpg';
$pageOgImageAlt = 'Frame skipping test - dual gaming monitors, detects dropped frames via rAF';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('frame_skipping_test', [['name'=>'Home','url'=>'/'],['name'=>'Frame Skipping Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-frame-skipping-test.php'; ?>
<section class="tool-stage" id="frame-skipping-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Frame Skipping Test</h2><p class="section-lede">Detects dropped or skipped frames using <code>requestAnimationFrame</code> timestamp deltas. Any frame whose delta exceeds 1.5&times; the expected interval (based on your display refresh rate) is counted as a stutter. A moving bar gives visual confirmation &mdash; jitter or hitching means the browser or GPU is missing frames.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How to read the results</a></div></div>
<section class="tool-shell"><?php include 'tools/frame_skipping_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">rAF timing</div><div class="trust-desc">Direct browser frame timestamps</div></div>
<div class="trust-item"><div class="trust-title">Detected Hz</div><div class="trust-desc">Auto-calibrates to your refresh rate</div></div>
<div class="trust-item"><div class="trust-title">Stutter log</div><div class="trust-desc">Timestamp + skipped frame count</div></div>
<div class="trust-item"><div class="trust-title">Visual reference</div><div class="trust-desc">Moving bar + strobe pattern</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/frame-skipping-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/frame-skipping-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
