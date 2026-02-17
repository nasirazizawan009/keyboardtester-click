<?php
/**
 * Arabic Screen Tester - اختبار الشاشة
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار الشاشة - كشف البكسلات الميتة والمعطوبة';
$pageDescription = 'اختبر شاشتك واكتشف البكسلات الميتة والمعطوبة والساخنة. أداة مجانية لفحص جودة الشاشة.';
$pageKeywords = 'اختبار الشاشة, بكسل ميت, فحص الشاشة, جودة العرض, اختبار البكسل';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screentestindex.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screentestindex.php'); ?>">

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
          <h1 id="hero-title">اختبار الشاشة</h1>
          <p class="hero-lede">اكتشف البكسلات الميتة والمعطوبة. فحص شامل لجودة الشاشة.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار الشاشة</h2>
          <p class="section-lede">اختر لوناً وابحث عن البكسلات المعيبة.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">كشف البكسل</div>
          <div class="trust-desc">ميت/معطوب/ساخن</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ألوان متعددة</div>
          <div class="trust-desc">اختبار كامل</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ملء الشاشة</div>
          <div class="trust-desc">فحص شامل</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">بدون تثبيت</div>
          <div class="trust-desc">يعمل فوراً</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">فحص الشاشة</p>
          <h2 id="feature-title">تأكد من جودة شاشتك</h2>
          <p class="section-lede">أدوات احترافية لاكتشاف عيوب الشاشة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>اختبار البكسل الميت</h3>
            <p>كشف البكسلات التي لا تعمل.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختبار البكسل المعطوب</h3>
            <p>كشف البكسلات العالقة على لون.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختبار التدرج</h3>
            <p>فحص سلاسة انتقال الألوان.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختبار التجانس</h3>
            <p>كشف عدم تجانس الإضاءة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار الشاشة</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. نظف الشاشة</h3>
            <p>نظف الشاشة للتأكد من عدم وجود غبار.</p>
          </div>
          <div class="guideline-card">
            <h3>2. فعّل ملء الشاشة</h3>
            <p>اضغط F11 لملء الشاشة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. اختبر كل لون</h3>
            <p>تنقل بين الألوان وابحث عن عيوب.</p>
          </div>
          <div class="guideline-card">
            <h3>4. دقق جيداً</h3>
            <p>انظر لكل منطقة من الشاشة.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
