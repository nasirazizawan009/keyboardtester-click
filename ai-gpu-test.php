<?php include 'config.php'; ?>
<?php
$pageTitle = 'AI GPU Test Online - WebGPU & Browser AI Readiness | KeyboardTester.click';
$pageDescription = 'Free AI GPU test for WebGPU, WebGL2, WebNN, hardware acceleration, and browser-based AI readiness. Run a safe matrix compute benchmark and graphics check with no download.';
$pageKeywords = 'AI GPU test, WebGPU test, browser GPU test, GPU benchmark online, AI readiness test, WebGL test, WebNN test, local AI GPU checker';
$pageOgImage = 'images/gpu-stress-test/hero.jpg';
$pageOgImageAlt = 'AI GPU test for WebGPU, WebGL and browser AI readiness';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <link rel="icon" type="image/x-icon" href="navigation.png">
    <?php include 'includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/ai-gpu-test.css'); ?>">
    <?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('ai_gpu_test', [['name'=>'Home','url'=>'/'],['name'=>'AI GPU Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-ai-gpu-test.php'; ?>
<section class="tool-stage" id="ai-gpu-test">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">AI hardware readiness</p>
            <h2>AI GPU Test</h2>
            <p class="section-lede">Check whether your browser can use the GPU for modern AI workloads. The tool detects WebGPU, WebGL2, WebNN, software-rendering fallbacks, adapter limits, and runs a safe matrix-multiply compute benchmark similar to the math used in local AI inference.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="ai-gpu-stage-link" href="#guidelines">How to read results</a>
        </div>
    </div>
    <section class="tool-shell"><?php include 'tools/ai_gpu_test_tool.php'; ?></section>
</section>
<section class="trust-strip">
    <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">WebGPU</div><div class="trust-desc">GPU compute readiness</div></div>
        <div class="trust-item"><div class="trust-title">WebGL2</div><div class="trust-desc">Graphics acceleration check</div></div>
        <div class="trust-item"><div class="trust-title">WebNN</div><div class="trust-desc">Emerging browser AI API</div></div>
        <div class="trust-item"><div class="trust-title">Matrix test</div><div class="trust-desc">Safe AI-style benchmark</div></div>
    </div>
</section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/ai-gpu-test.php'; ?>
<?php $currentTool = 'ai-gpu'; include 'includes/related-tools.php'; ?>
<?php include 'help/ai-gpu-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
<script src="<?php echo url('assets/js/ai-gpu-test.js'); ?>" defer></script>
</body>
</html>
