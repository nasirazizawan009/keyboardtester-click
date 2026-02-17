<?php
/**
 * Arabic Microphone Tester - اختبار الميكروفون
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار الميكروفون - فحص جودة الصوت مجاناً';
$pageDescription = 'اختبر الميكروفون وتحقق من جودة الصوت ومستوى الإدخال. أداة مجانية لفحص الميكروفون.';
$pageKeywords = 'اختبار الميكروفون, فحص الصوت, جودة الميكروفون, اختبار الإدخال';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-tester.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-tester.php'); ?>">

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
          <h1 id="hero-title">اختبار الميكروفون</h1>
          <p class="hero-lede">تحقق من عمل الميكروفون وجودة الصوت. فحص سريع وشامل.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار الميكروفون</h2>
          <p class="section-lede">اسمح بالوصول للميكروفون وتحدث لاختباره.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">مستوى الصوت</div>
          <div class="trust-desc">قياس فوري</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تصور الموجة</div>
          <div class="trust-desc">عرض بصري</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">اختيار الجهاز</div>
          <div class="trust-desc">تحديد المصدر</div>
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
          <p class="section-kicker">فحص الصوت</p>
          <h2 id="feature-title">تأكد من جودة الميكروفون</h2>
          <p class="section-lede">أدوات شاملة لاختبار وتحسين جودة الصوت.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>قياس المستوى</h3>
            <p>مراقبة مستوى الصوت الفوري.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تصور الموجة</h3>
            <p>عرض شكل الموجة الصوتية.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تسجيل الاختبار</h3>
            <p>تسجيل وإعادة الاستماع.</p>
          </article>
          <article class="landing-feature-card">
            <h3>كشف المشاكل</h3>
            <p>تحديد الضوضاء والتشويش.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار الميكروفون</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اسمح بالوصول</h3>
            <p>وافق على طلب الوصول للميكروفون.</p>
          </div>
          <div class="guideline-card">
            <h3>2. اختر الميكروفون</h3>
            <p>حدد الميكروفون الصحيح من القائمة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. تحدث للاختبار</h3>
            <p>تحدث وراقب مستوى الصوت.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع النتائج</h3>
            <p>تحقق من جودة الصوت والمستوى.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
