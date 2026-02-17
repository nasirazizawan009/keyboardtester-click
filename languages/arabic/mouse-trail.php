<?php
/**
 * Arabic Mouse Trail - مسار الماوس
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'مسار الماوس - تصور حركة الماوس مجاناً';
$pageDescription = 'تصور مسار حركة الماوس ودقة التتبع. أداة ممتعة لاختبار حركة الماوس.';
$pageKeywords = 'مسار الماوس, تتبع الماوس, حركة الماوس, دقة التتبع';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

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
          <h1 id="hero-title">مسار الماوس</h1>
          <p class="hero-lede">تصور مسار حركة الماوس بتأثيرات بصرية جميلة. اختبر دقة التتبع.</p>
          <div class="hero-ctas">
            <a href="#mouse-trail" class="landing-btn landing-btn-primary">بدء التجربة</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">مسار الماوس</h2>
          <p class="section-lede">حرك الماوس وشاهد المسار يتشكل.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="mouse-trail" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">تصور الحركة</div>
          <div class="trust-desc">مسار مرئي</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تأثيرات متعددة</div>
          <div class="trust-desc">رموز تعبيرية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تخصيص كامل</div>
          <div class="trust-desc">ألوان وأحجام</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ترفيه وتعليم</div>
          <div class="trust-desc">ممتع ومفيد</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تصور الحركة</p>
          <h2 id="feature-title">شاهد مسار ماوسك</h2>
          <p class="section-lede">أداة ممتعة لتصور ومتابعة حركة الماوس.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>رموز تعبيرية</h3>
            <p>اترك أثراً من الرموز التعبيرية.</p>
          </article>
          <article class="landing-feature-card">
            <h3>نقاط ملونة</h3>
            <p>مسار من النقاط الملونة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تأثيرات متحركة</h3>
            <p>حركات وتلاشي سلس.</p>
          </article>
          <article class="landing-feature-card">
            <h3>ملء الشاشة</h3>
            <p>استخدم الشاشة كاملة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام مسار الماوس</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر التأثير</h3>
            <p>حدد نوع المسار المفضل.</p>
          </div>
          <div class="guideline-card">
            <h3>2. حرك الماوس</h3>
            <p>حرك الماوس في منطقة الرسم.</p>
          </div>
          <div class="guideline-card">
            <h3>3. جرب الخيارات</h3>
            <p>غير الألوان والأحجام.</p>
          </div>
          <div class="guideline-card">
            <h3>4. استمتع</h3>
            <p>أنشئ أنماطاً وأشكالاً جميلة.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
