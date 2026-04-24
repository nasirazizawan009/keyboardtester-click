<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار النقر بالسحب للماوس - CPS وذروة الموجة';
$pageDescription = 'اختبار السحب للماوس: يقيس سرعة السحب والذروة والمجموع مع رسم بياني مباشر. مثالي لتقنيات drag clicking في الألعاب، يعمل في المتصفح بدون تثبيت.';
$pageKeywords = 'اختبار النقر بالسحب, drag click CPS, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">مختبر النقر بالسحب</p>
          <h1 class="hero-title">اختبار النقر بالسحب للماوس - CPS وذروة الموجة</h1>
          <p class="hero-lede">قس CPS النقر بالسحب وذروة الموجة والنقرات الكلية في جلسات 5 أو 10 أو 30 ثانية. مثالي لـ Minecraft PvP.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">ابدأ الاختبار</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">عداد CPS مباشر</span>
            <span class="hero-badge">ذروة الموجة</span>
            <span class="hero-badge">رسم بياني زمني</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار النقر بالسحب للماوس" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">الأداة الرئيسية</p><h2>مختبر النقر بالسحب</h2><p class="section-lede">انقر أو اسحب إصبعا فوق الزر بأسرع ما يمكن.</p></div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?></section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>كيفية استخدام اختبار النقر بالسحب</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. اضبط الجلسة</h3><p>اختر المدة واضغط ابدأ.</p></div>
          <div class="guideline-card"><h3>2. انقر أو اسحب</h3><p>اسحب الإصبع بزاوية 30-45 درجة لاحتكاك أفضل.</p></div>
          <div class="guideline-card"><h3>3. اقرأ النتائج</h3><p>متوسط CPS والذروة وذروة موجة 200 مللي ثانية.</p></div>
          <div class="guideline-card"><h3>4. اضبط التقنية</h3><p>غير الزاوية أو الماوس وأعد الاختبار.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
