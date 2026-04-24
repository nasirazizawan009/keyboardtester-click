<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = '右クリックCPSテスト - 右ボタン速度';
$pageDescription = '無料オンライン右クリックCPSテスト。コンテキストメニュー抑制で右ボタンCPSを測定。Minecraft PvPとFPS向け。';
$pageKeywords = '右クリックCPSテスト, right click CPS';
?>
<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">右クリックCPSテスター</p>
<h1 class="hero-title">右クリックCPSテスト - 右ボタン速度</h1>
<p class="hero-lede">右ボタンのクリック毎秒を5秒、10秒、30秒セッションで測定。ブラウザコンテキストメニュー抑制。</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">開始</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
</div>
<div class="hero-badges"><span class="hero-badge">右クリックのみ</span><span class="hero-badge">ピークCPS</span><span class="hero-badge">コンテキストメニューオフ</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="右クリックCPSテスト" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>右クリックCPSテスター</h2><p class="section-lede">エリア内で可能な限り速く右クリック。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>使い方</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. 設定</h3><p>時間を選択。</p></div>
<div class="guideline-card"><h3>2. 高速右クリック</h3><p>エリアで右クリック。</p></div>
<div class="guideline-card"><h3>3. 結果を読む</h3><p>合計、CPS、ピーク。</p></div>
<div class="guideline-card"><h3>4. 比較</h3><p>左CPSと比較。</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
