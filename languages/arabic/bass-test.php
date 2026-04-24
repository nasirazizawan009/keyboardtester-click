<?php
/**
 * Arabic localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار الباس - مسح 20 هرتز إلى 200 هرتز لمضخم الصوت';
$pageDescription = 'اختبار الباس: يمسح ترددات منخفضة 20 هرتز → 200 هرتز مع إعدادات مسبقة ISO 1/3-أوكتاف للتحقق من مضخم الصوت والسماعات. موجات جيبية نقية، بدون تثبيت.';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">تشخيص الصوت</p>
          <h1 class="hero-title">اختبار الباس - مضخم الصوت ومسح 20 إلى 200 هرتز</h1>
          <p class="hero-lede">تحقق من جودة استجابة الترددات المنخفضة لمضخم الصوت، ومراقب الاستوديو، والسماعات. مسح ترددي من 20 إلى 200 هرتز، إعدادات ISO بثلث أوكتاف، أو وضع التثبيت. موجات جيبية نقية.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">ابدأ الاختبار</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">عرض جميع الأدوات</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">تشخيص الصوت</p>
          <h2>اختبار الباس</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
