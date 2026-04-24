<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار النقر المزدوج للوحة المفاتيح - كاشف التشويش';
$pageDescription = 'كاشف النقر المزدوج للوحة المفاتيح: يحدد المفاتيح التي تسجل حدثين لضغطة واحدة. عتبة قابلة للتخصيص، سجل كامل، بدون تثبيت أي برامج.';
$pageKeywords = 'نقر مزدوج لوحة المفاتيح, كاشف التشويش, key chatter';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">كاشف تشويش لوحة المفاتيح</p>
<h1 class="hero-title">اختبار النقر المزدوج للوحة المفاتيح - كاشف التشويش</h1>
<p class="hero-lede">اكتشف المفاتيح التي تسجل مرتين من ضغطة واحدة. عتبة قابلة للتكوين 30-150 مللي ثانية مع إحصائيات لكل مفتاح.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">ابدأ</a></div>
<div class="hero-badges"><span class="hero-badge">عتبة قابلة للتكوين</span><span class="hero-badge">إحصائيات لكل مفتاح</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار تشويش لوحة المفاتيح" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>كاشف تشويش لوحة المفاتيح</h2><p class="section-lede">اضغط كل مفتاح مرة واحدة. المفاتيح المتشوشة ستظهر أدناه.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
