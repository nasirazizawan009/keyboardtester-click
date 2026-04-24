<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار مستوى الأبيض - كاشف الأبيض المقطوع';
$pageDescription = 'اختبار مستوى الأبيض للشاشة: يتحقق إن كانت الشاشة تقطع تفاصيل الإضاءة عبر 32 رقعة قريبة من الأبيض. يكتشف الأبيض المحروق ومشاكل التباين.';
$pageKeywords = 'اختبار مستوى الأبيض, الأبيض المقطوع';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/white-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('white-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">معايرة الشاشة</p>
<h1 class="hero-title">اختبار مستوى الأبيض - كاشف الأبيض المقطوع</h1>
<p class="hero-lede">تحقق من تفاصيل الإضاءة مع 32 رقعة قريبة من الأبيض. إذا كانت القيم العالية غير مرئية، شاشتك تقطع الإضاءة.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#white-level-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/white-level-test/white-level-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار مستوى الأبيض" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="white-level-test"><div class="container tool-stage-header"><div><h2>اختبار مستوى الأبيض</h2><p class="section-lede">عد الرقع المرئية 223-254.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/white-level-tool.php'; ?></section></section>
<?php $currentTool = 'white-level'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
