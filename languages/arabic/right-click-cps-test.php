<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار CPS النقر الأيمن - سرعة الزر الأيمن';
$pageDescription = 'اختبار CPS للنقر الأيمن: يقيس سرعة النقر الأيمن (نقرة/ثانية) مع تعطيل قائمة السياق. مثالي للاعبين واختبار المفاتيح الدوارة، بدون تثبيت.';
$pageKeywords = 'اختبار CPS النقر الأيمن, right click CPS';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">مختبر CPS النقر الأيمن</p>
<h1 class="hero-title">اختبار CPS النقر الأيمن - سرعة الزر الأيمن</h1>
<p class="hero-lede">قس النقرات في الثانية للزر الأيمن في جلسات 5 أو 10 أو 30 ثانية. قائمة السياق معطلة.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">ابدأ</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
</div>
<div class="hero-badges"><span class="hero-badge">النقر الأيمن فقط</span><span class="hero-badge">ذروة CPS</span><span class="hero-badge">قائمة السياق معطلة</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار CPS النقر الأيمن" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">الأداة الرئيسية</p><h2>مختبر CPS النقر الأيمن</h2><p class="section-lede">انقر بالزر الأيمن في المنطقة بأسرع ما يمكن.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>كيفية الاستخدام</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. اضبط</h3><p>اختر المدة.</p></div>
<div class="guideline-card"><h3>2. انقر أيمن بسرعة</h3><p>انقر أيمن في المنطقة.</p></div>
<div class="guideline-card"><h3>3. اقرأ النتائج</h3><p>الإجمالي، CPS، الذروة.</p></div>
<div class="guideline-card"><h3>4. قارن</h3><p>قارن بـ CPS الأيسر.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
