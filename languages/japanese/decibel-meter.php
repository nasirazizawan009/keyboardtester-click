<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'デシベルメーター オンライン - マイクでライブdB SPL';
$pageDescription = '無料オンラインデシベルメーター。マイクでライブ周囲音レベル測定。dB読み取り、ピーク、平均トラッキング。';
$pageKeywords = 'デシベルメーター, dBメーター, 騒音レベル測定';
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">オーディオ診断</p>
<h1 class="hero-title">デシベルメーター オンライン - マイクでライブdB SPL</h1>
<p class="hero-lede">デバイスのマイクを使って周囲の騒音レベルを測定。ライブdB、ピーク、平均。</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">開始</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="デシベルメーター" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>デシベルメーター</h2><p class="section-lede">開始を押してマイクへのアクセスを許可。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
