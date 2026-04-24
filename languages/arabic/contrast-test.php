<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار تباين الشاشة - معايرة برقعة الشطرنج';
$pageDescription = 'اختبار تباين الشاشة: نمط رقعة الشطرنج بجانب رمادي 50% يكشف مشاكل التباين وجاما. مثالي للضبط البصري السريع في المتصفح، بدون أجهزة خاصة.';
$pageKeywords = 'اختبار تباين الشاشة, معايرة التباين';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">معايرة الشاشة</p>
<h1 class="hero-title">اختبار تباين الشاشة - معايرة برقعة الشطرنج</h1>
<p class="hero-lede">تحقق من معايرة التباين برقعة شطرنج أبيض وأسود بجانب 50% رمادي صلب. متوسط رقعة الشطرنج يجب أن يطابق الرمادي عند تضييق العينين.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار تباين الشاشة" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>اختبار تباين الشاشة</h2><p class="section-lede">ضيق عينيك. رقعة الشطرنج يجب أن تبدو مثل الرمادي.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
