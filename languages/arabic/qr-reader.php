<?php
/**
 * Arabic QR Code Reader - قارئ رمز QR
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'قارئ رمز QR - مسح رموز QR مجاناً';
$pageDescription = 'امسح رموز QR باستخدام الكاميرا أو رفع صورة. قارئ سريع ومجاني.';
$pageKeywords = 'قارئ QR, مسح QR, ماسح رمز QR, فك رمز QR';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-code-reader.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-code-reader.php'); ?>">

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
          <h1 id="hero-title">قارئ رمز QR</h1>
          <p class="hero-lede">امسح رموز QR بالكاميرا أو من صورة. قراءة فورية ودقيقة.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">بدء المسح</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">قارئ رمز QR</h2>
          <p class="section-lede">امسح رمز QR بالكاميرا أو ارفع صورة.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">مسح بالكاميرا</div>
          <div class="trust-desc">مباشر وسريع</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">رفع صورة</div>
          <div class="trust-desc">من الجهاز</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">قراءة فورية</div>
          <div class="trust-desc">نتائج سريعة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">خصوصية</div>
          <div class="trust-desc">محلي فقط</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">قراءة QR</p>
          <h2 id="feature-title">امسح أي رمز QR بسهولة</h2>
          <p class="section-lede">طرق متعددة لقراءة رموز QR بسرعة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>مسح الكاميرا</h3>
            <p>وجه الكاميرا للرمز مباشرة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>رفع صورة</h3>
            <p>ارفع صورة تحتوي على رمز QR.</p>
          </article>
          <article class="landing-feature-card">
            <h3>نسخ النتيجة</h3>
            <p>انسخ المحتوى بنقرة واحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>فتح الروابط</h3>
            <p>افتح URLs مباشرة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية مسح رمز QR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر الطريقة</h3>
            <p>كاميرا أو رفع صورة.</p>
          </div>
          <div class="guideline-card">
            <h3>2. وجه أو ارفع</h3>
            <p>وجه الكاميرا أو ارفع الصورة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. انتظر القراءة</h3>
            <p>النتيجة تظهر تلقائياً.</p>
          </div>
          <div class="guideline-card">
            <h3>4. استخدم النتيجة</h3>
            <p>انسخ أو افتح الرابط.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
