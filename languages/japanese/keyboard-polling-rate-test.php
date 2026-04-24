<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'キーボードポーリングレートテスト - USB Hz推定';
$pageDescription = '無料オンラインキーボードポーリングレートテスト。ブラウザのオートリピートタイミングでキーボードHzを推定。';
$pageKeywords = 'キーボードpolling test, キーボードHz';
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">キーボードポーリングテスト</p>
<h1 class="hero-title">キーボードポーリングレートテスト - USB Hz推定</h1>
<p class="hero-lede">ブラウザのオートリピートタイミングでキーボードHzを推定。キーを長押しして間隔と推定レートを確認。</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-polling-rate-test">開始</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-polling-rate-test/keyboard-polling-rate-test-hero.jpg'); ?>" width="1280" height="720" alt="キーボードポーリング" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-polling-rate-test"><div class="container tool-stage-header"><div><h2>キーボードポーリングテスト</h2><p class="section-lede">キーを3秒以上長押し。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-polling-rate-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-polling-rate'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
