<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free GPU Stress Test - WebGL Fragment Shader Benchmark | KeyboardTester.click';
$pageDescription = 'Free GPU stress test using a heavy WebGL2 fragment shader (Mandelbrot set). Reports live FPS, stability, render resolution, and GPU vendor/renderer. Adjustable quality to push any GPU from laptop integrated to desktop RTX. Browser-based, no install.';
$pageKeywords = 'gpu stress test, webgl benchmark, gpu load test, fragment shader test, browser gpu test, graphics card stress, mandelbrot gpu';
$pageOgImage = 'images/gpu-stress-test/hero.jpg';
$pageOgImageAlt = 'GPU stress test - graphics card close-up, WebGL shader benchmark';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('gpu_stress_test', [['name'=>'Home','url'=>'/'],['name'=>'GPU Stress Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-gpu-stress-test.php'; ?>
<section class="tool-stage" id="gpu-stress-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Hardware benchmark</p><h2>GPU Stress Test</h2><p class="section-lede">Renders a high-iteration Mandelbrot fragment shader every frame, scaling canvas size and quality to push any GPU from integrated laptop to desktop RTX. Reports live FPS, stability, GPU vendor/renderer when available, and whether WebGL2 is software-rendered (SwiftShader fallback). Includes a thermal warning &mdash; sustained runs will heat a laptop.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How it works</a></div></div>
<section class="tool-shell"><?php include 'tools/gpu_stress_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">WebGL2</div><div class="trust-desc">Mandelbrot fragment shader</div></div>
<div class="trust-item"><div class="trust-title">Live FPS</div><div class="trust-desc">Instant + rolling average</div></div>
<div class="trust-item"><div class="trust-title">GPU info</div><div class="trust-desc">Vendor + renderer (when exposed)</div></div>
<div class="trust-item"><div class="trust-title">Quality slider</div><div class="trust-desc">1-5000 iterations</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/gpu-stress-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/gpu-stress-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
