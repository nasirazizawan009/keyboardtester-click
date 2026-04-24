<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'مقياس الديسيبل أونلاين - dB SPL مباشر عبر الميكروفون';
$pageDescription = 'مقياس الديسيبل عبر الإنترنت باستخدام الميكروفون: قراءة مباشرة لـ dB SPL، تتبع الذروة ومتوسط متحرك لـ 100 عينة. يقيس ضجيج البيئة بدون تثبيت برامج.';
$pageKeywords = 'مقياس الديسيبل, dB meter online, مقياس مستوى الصوت';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">تشخيص الصوت</p>
<h1 class="hero-title">مقياس الديسيبل أونلاين - dB SPL مباشر عبر الميكروفون</h1>
<p class="hero-lede">قس مستويات الضجيج المحيط باستخدام ميكروفون جهازك. قراءة dB مباشرة، الذروة، والمتوسط.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="مقياس الديسيبل" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>مقياس الديسيبل</h2><p class="section-lede">اضغط ابدأ واسمح بالوصول للميكروفون.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
