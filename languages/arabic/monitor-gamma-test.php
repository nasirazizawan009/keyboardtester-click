<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار جاما الشاشة - معايرة sRGB 2.2';
$pageDescription = 'اختبار جاما الشاشة: قِس جاما بصريًا عبر نمط دمج الخطوط الكلاسيكي، الهدف sRGB 2.2. ضبط سريع بدون مقياس ألوان أو برامج إضافية، مباشرة في المتصفح.';
$pageKeywords = 'اختبار جاما الشاشة, معايرة جاما, sRGB 2.2';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">معايرة الشاشة</p>
<h1 class="hero-title">اختبار جاما الشاشة - معايرة sRGB 2.2</h1>
<p class="hero-lede">فحص بصري لمعايرة جاما باستخدام نمط مزج الخطوط. اضبط شريط التمرير حتى تمتزج الخطوط مع الرمادي الصلب.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-gamma-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-gamma-test/monitor-gamma-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار جاما الشاشة" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-gamma-test"><div class="container tool-stage-header"><div><h2>اختبار جاما الشاشة</h2><p class="section-lede">اضبط شريط التمرير حتى تمتزج الخطوط.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-gamma-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-gamma'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
