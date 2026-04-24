<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار شبحية الشاشة - زمن استجابة البكسل';
$pageDescription = 'اختبار شبحية الشاشة: يكتشف مشاكل زمن استجابة البكسل عبر صندوق متحرك بسرعة قابلة للتعديل على خلفيات ملونة. قارن إعدادات overdrive مباشرة في المتصفح.';
$pageKeywords = 'اختبار شبحية الشاشة, زمن استجابة البكسل';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">تشخيص الشاشة</p>
<h1 class="hero-title">اختبار شبحية الشاشة - زمن استجابة البكسل</h1>
<p class="hero-lede">اكتشف مشاكل زمن استجابة البكسل. صندوق يتحرك على خلفيات ملونة؛ ذيل أو ضبابية = شبحية.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-ghosting-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار شبحية الشاشة" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-ghosting-test"><div class="container tool-stage-header"><div><h2>اختبار شبحية الشاشة</h2><p class="section-lede">شاهد الصندوق المتحرك. ذيل خلفه = شبحية.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-ghosting-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-ghosting'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
