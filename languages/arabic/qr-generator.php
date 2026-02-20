<?php
/**
 * Arabic QR Code Generator - مولد رمز QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'مولد رمز QR - إنشاء رموز QR مجاناً';
$pageDescription = 'أنشئ رموز QR مخصصة للروابط والنصوص وبطاقات الاتصال. مجاني وسهل الاستخدام.';
$pageKeywords = 'مولد QR, إنشاء رمز QR, رمز الاستجابة السريعة, QR مجاني';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('QR_code_generator_scanner.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('QR_code_generator_scanner.php'); ?>">

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
          <h1 id="hero-title">مولد رمز QR</h1>
          <p class="hero-lede">أنشئ رموز QR مخصصة للروابط والنصوص وبيانات الاتصال فوراً.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">إنشاء رمز</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">مولد رمز QR</h2>
          <p class="section-lede">أدخل البيانات واحصل على رمز QR فوراً.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">إنشاء فوري</div>
          <div class="trust-desc">بدون انتظار</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تخصيص كامل</div>
          <div class="trust-desc">ألوان وأحجام</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تحميل مجاني</div>
          <div class="trust-desc">PNG عالي الجودة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">أنواع متعددة</div>
          <div class="trust-desc">روابط/نصوص/بيانات</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">إنشاء QR</p>
          <h2 id="feature-title">رموز QR احترافية في ثوانٍ</h2>
          <p class="section-lede">أدوات قوية لإنشاء رموز QR متنوعة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>رموز URL</h3>
            <p>حول أي رابط إلى رمز QR.</p>
          </article>
          <article class="landing-feature-card">
            <h3>رموز نصية</h3>
            <p>شفر أي نص في رمز QR.</p>
          </article>
          <article class="landing-feature-card">
            <h3>بطاقات اتصال</h3>
            <p>أنشئ vCard لمشاركة البيانات.</p>
          </article>
          <article class="landing-feature-card">
            <h3>WiFi QR</h3>
            <p>شارك بيانات الشبكة بسهولة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية إنشاء رمز QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر النوع</h3>
            <p>URL أو نص أو بطاقة اتصال.</p>
          </div>
          <div class="guideline-card">
            <h3>2. أدخل البيانات</h3>
            <p>اكتب المحتوى المطلوب.</p>
          </div>
          <div class="guideline-card">
            <h3>3. خصص المظهر</h3>
            <p>اختر الألوان والحجم.</p>
          </div>
          <div class="guideline-card">
            <h3>4. حمل الرمز</h3>
            <p>احفظ الرمز كصورة PNG.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
