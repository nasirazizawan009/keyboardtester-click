<?php
/**
 * Arabic Ghost Click Detector - كاشف النقرات الوهمية
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'كاشف النقرات الوهمية - اكتشف مشاكل النقر المزدوج';
$pageDescription = 'اكتشف النقرات الوهمية والنقر المزدوج غير المقصود في الماوس. أداة مجانية لتشخيص مشاكل الماوس.';
$pageKeywords = 'كاشف النقرات الوهمية, النقر المزدوج, مشاكل الماوس, اختبار الماوس';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-detector.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-detector.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <style>
    body { font-family: 'Tajawal', 'Space Grotesk', sans-serif; }
    .landing-main { direction: rtl; text-align: right; }
    .hero-ctas { justify-content: flex-start; }
    .trust-grid, .process-grid, .landing-feature-grid, .guidelines-grid { direction: rtl; }
    .tool-stage-header, .section-head.split { flex-direction: row-reverse; }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ar.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">كاشف النقرات الوهمية</h1>
          <p class="hero-lede">اكتشف النقرات الوهمية ومشاكل النقر المزدوج في الماوس. تشخيص دقيق لمشاكل الماوس.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">بدء الكشف</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">كاشف النقرات الوهمية</h2>
          <p class="section-lede">انقر في منطقة الاختبار لبدء الكشف.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">كشف فوري</div>
          <div class="trust-desc">اكتشاف النقرات الوهمية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تحليل التوقيت</div>
          <div class="trust-desc">قياس الفجوات بين النقرات</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">سجل مفصل</div>
          <div class="trust-desc">تتبع كل نقرة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تشخيص دقيق</div>
          <div class="trust-desc">تحديد المشاكل</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تشخيص الماوس</p>
          <h2 id="feature-title">اكتشف مشاكل النقر المزدوج</h2>
          <p class="section-lede">أداة متقدمة لتحديد مشاكل الماوس وإصلاحها.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>كشف النقرات الوهمية</h3>
            <p>اكتشاف النقرات غير المقصودة تلقائياً.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تحليل التوقيت</h3>
            <p>قياس الفترة بين النقرات المتتالية.</p>
          </article>
          <article class="landing-feature-card">
            <h3>سجل النقرات</h3>
            <p>عرض تاريخ جميع النقرات مع التوقيت.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تقرير التشخيص</h3>
            <p>تقييم حالة الماوس والتوصيات.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام كاشف النقرات الوهمية</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. انقر في منطقة الاختبار</h3>
            <p>انقر بشكل طبيعي في منطقة الكشف.</p>
          </div>
          <div class="guideline-card">
            <h3>2. راقب النتائج</h3>
            <p>شاهد ما إذا كانت هناك نقرات إضافية.</p>
          </div>
          <div class="guideline-card">
            <h3>3. تحقق من التوقيت</h3>
            <p>راجع الفجوات الزمنية بين النقرات.</p>
          </div>
          <div class="guideline-card">
            <h3>4. قيم الماوس</h3>
            <p>حدد ما إذا كان الماوس يحتاج إلى استبدال.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
