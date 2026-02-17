<?php
/**
 * Arabic Webcam Tester - اختبار كاميرا الويب
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار كاميرا الويب - فحص الكاميرا مجاناً';
$pageDescription = 'اختبر كاميرا الويب وتحقق من الجودة والدقة. أداة مجانية لفحص الكاميرا والتقاط الصور.';
$pageKeywords = 'اختبار كاميرا الويب, فحص الكاميرا, جودة الفيديو, اختبار webcam';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcamtesterindex.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcamtesterindex.php'); ?>">

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
          <h1 id="hero-title">اختبار كاميرا الويب</h1>
          <p class="hero-lede">تحقق من عمل الكاميرا وجودة الصورة. فحص شامل والتقاط صور.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار كاميرا الويب</h2>
          <p class="section-lede">اسمح بالوصول للكاميرا لبدء الاختبار.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">معاينة مباشرة</div>
          <div class="trust-desc">فيديو فوري</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">دقة الصورة</div>
          <div class="trust-desc">عرض التفاصيل</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">التقاط صور</div>
          <div class="trust-desc">حفظ لقطات</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">خصوصية كاملة</div>
          <div class="trust-desc">محلي فقط</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">فحص الكاميرا</p>
          <h2 id="feature-title">تأكد من جودة كاميرتك</h2>
          <p class="section-lede">أدوات شاملة لاختبار وفحص كاميرا الويب.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>معاينة مباشرة</h3>
            <p>شاهد صورة الكاميرا فوراً.</p>
          </article>
          <article class="landing-feature-card">
            <h3>معلومات الدقة</h3>
            <p>عرض دقة الكاميرا والإطارات.</p>
          </article>
          <article class="landing-feature-card">
            <h3>التقاط صور</h3>
            <p>التقط وحمل صور فورية.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختيار الكاميرا</h3>
            <p>تبديل بين الكاميرات المتاحة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية اختبار كاميرا الويب</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اسمح بالوصول</h3>
            <p>وافق على طلب الوصول للكاميرا.</p>
          </div>
          <div class="guideline-card">
            <h3>2. شاهد المعاينة</h3>
            <p>تحقق من جودة الصورة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. التقط صورة</h3>
            <p>اضغط لالتقاط لقطة شاشة.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع التفاصيل</h3>
            <p>تحقق من الدقة والإطارات.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
