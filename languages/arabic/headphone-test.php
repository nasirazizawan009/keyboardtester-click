<?php
/**
 * Arabic Headphone/Speaker Tester - اختبار السماعات
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار السماعات - فحص الصوت الستيريو مجاناً';
$pageDescription = 'اختبر سماعات الرأس ومكبرات الصوت. تحقق من قنوات الستيريو وجودة الصوت مجاناً.';
$pageKeywords = 'اختبار السماعات, فحص الصوت, ستيريو, اختبار الصوت, سماعات الرأس';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">

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
          <h1 id="hero-title">اختبار السماعات</h1>
          <p class="hero-lede">تحقق من قنوات الستيريو وجودة الصوت. اختبار شامل للسماعات.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار السماعات</h2>
          <p class="section-lede">اختر اختباراً واستمع للتحقق من السماعات.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">اختبار الستيريو</div>
          <div class="trust-desc">يسار/يمين</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">اختبار التردد</div>
          <div class="trust-desc">مدى كامل</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">اختبار الجهير</div>
          <div class="trust-desc">ترددات منخفضة</div>
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
          <p class="section-kicker">فحص الصوت</p>
          <h2 id="feature-title">تأكد من جودة سماعاتك</h2>
          <p class="section-lede">اختبارات متعددة لفحص جودة الصوت بالكامل.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>اختبار القنوات</h3>
            <p>تحقق من عمل اليسار واليمين.</p>
          </article>
          <article class="landing-feature-card">
            <h3>مسح التردد</h3>
            <p>اختبر مدى الترددات المسموعة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختبار الجهير</h3>
            <p>تحقق من الترددات المنخفضة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>نغمات اختبارية</h3>
            <p>نغمات متنوعة للفحص الشامل.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية اختبار السماعات</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. ارتدِ السماعات</h3>
            <p>تأكد من ارتداء السماعات بشكل صحيح.</p>
          </div>
          <div class="guideline-card">
            <h3>2. ابدأ باختبار الستيريو</h3>
            <p>تحقق من عمل كلتا القناتين.</p>
          </div>
          <div class="guideline-card">
            <h3>3. جرب الترددات</h3>
            <p>اختبر مدى الترددات المختلفة.</p>
          </div>
          <div class="guideline-card">
            <h3>4. قيم الجودة</h3>
            <p>حدد ما إذا كانت السماعات سليمة.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
