<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'キーボードダブルクリックテスト - チャタリング検出';
$pageDescription = '無料オンラインキーボードダブルクリックテスト。1回の押下から2回登録されるキーを検出。設定可能な閾値30-150ms。';
$pageKeywords = 'キーボードダブルクリック, チャタリング検出, key chatter';
?>
<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">キーボードチャタリング検出</p>
<h1 class="hero-title">キーボードダブルクリックテスト - チャタリング検出</h1>
<p class="hero-lede">1回の押下から2回登録されるキーを検出。設定可能な閾値30-150msでキーごとの統計を表示。</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">開始</a></div>
<div class="hero-badges"><span class="hero-badge">設定可能な閾値</span><span class="hero-badge">キーごとの統計</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="キーボードチャタリングテスト" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>キーボードチャタリング検出</h2><p class="section-lede">各キーを1回押してください。チャタリングするキーは下に表示されます。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
