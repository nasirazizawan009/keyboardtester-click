<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'モニターゴーストテスト - ピクセル応答時間';
$pageDescription = '無料オンラインモニターゴーストテスト。動くボックスでピクセル応答時間問題を検出。';
$pageKeywords = 'モニターゴーストテスト, ピクセル応答時間';
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">ディスプレイ診断</p>
<h1 class="hero-title">モニターゴーストテスト - ピクセル応答時間</h1>
<p class="hero-lede">ピクセル応答時間の問題を検出。ボックスが色付き背景上を移動。残像や色のにじみ = ゴースト。</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-ghosting-test">開始</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg'); ?>" width="1280" height="720" alt="モニターゴーストテスト" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-ghosting-test"><div class="container tool-stage-header"><div><h2>モニターゴーストテスト</h2><p class="section-lede">動くボックスを見る。後ろに残像 = ゴースト。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-ghosting-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-ghosting'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
