<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Memory Test - Browser RAM / Heap Monitor | KeyboardTester.click';
$pageDescription = 'Free browser memory test. Allocates increasing typed arrays to graph heap growth against the browser memory limit, with live readings of used / total / limit heap from performance.memory (Chrome/Edge). Safe abort before OOM. Browser-based, no install.';
$pageKeywords = 'memory test, browser memory test, ram test, heap monitor, performance memory, chrome memory api, javascript memory usage';
$pageOgImage = 'images/memory-test/hero.jpg';
$pageOgImageAlt = 'Memory test - RAM modules, browser heap usage monitor';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('memory_test', [['name'=>'Home','url'=>'/'],['name'=>'Memory Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-memory-test.php'; ?>
<section class="tool-stage" id="memory-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Hardware benchmark</p><h2>Memory Test</h2><p class="section-lede">Measures browser heap usage live via <code>performance.memory</code> on Chrome and Edge, and lets you allocate typed arrays in configurable 10&nbsp;MB chunks to watch the heap grow toward its limit. On Firefox and Safari (which do not expose performance.memory), the tool falls back to allocation-count only. Safely aborts before OOM. Browser-based, no install.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">Read guidance</a></div></div>
<section class="tool-shell"><?php include 'tools/memory_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">performance.memory</div><div class="trust-desc">Live heap on Chrome/Edge</div></div>
<div class="trust-item"><div class="trust-title">Allocation graph</div><div class="trust-desc">Heap growth over time</div></div>
<div class="trust-item"><div class="trust-title">Configurable chunks</div><div class="trust-desc">10 MB default</div></div>
<div class="trust-item"><div class="trust-title">Safe abort</div><div class="trust-desc">Stops before OOM</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/memory-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/memory-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
