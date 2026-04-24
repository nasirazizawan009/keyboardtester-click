<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار سطوع الشاشة - سلم معايرة 11 خطوة';
$pageDescription = 'اختبار سطوع الشاشة: سلم التدرج الرمادي المكون من 11 خطوة يكشف مشاكل السطوع والتباين وجاما. أداة معايرة بصرية سريعة في المتصفح، بدون تثبيت.';
$pageKeywords = 'اختبار سطوع الشاشة, معايرة السطوع';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">معايرة الشاشة</p>
<h1 class="hero-title">اختبار سطوع الشاشة - سلم معايرة 11 خطوة</h1>
<p class="hero-lede">تحقق مما إذا كانت شاشتك تعرض تدرجا متساويا من الأسود إلى الأبيض. 11 خطوة بزيادات 10% تكشف سوء التكوين.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار سطوع الشاشة" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>اختبار سطوع الشاشة</h2><p class="section-lede">11 خطوة من الأسود إلى الأبيض. كلها مميزة = سليم.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
