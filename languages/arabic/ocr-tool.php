<?php
/**
 * Arabic OCR Tool - أداة التعرف على النص
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'أداة OCR - استخراج النص من الصور مجاناً';
$pageDescription = 'استخرج النص من الصور باستخدام تقنية OCR. دعم للغة العربية والإنجليزية.';
$pageKeywords = 'OCR, استخراج النص, تعرف ضوئي, صور إلى نص, OCR عربي';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
          <h1 id="hero-title">أداة التعرف على النص OCR</h1>
          <p class="hero-lede">استخرج النص من الصور بدقة عالية. دعم للعربية والإنجليزية.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">بدء الاستخراج</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">أداة OCR</h2>
          <p class="section-lede">ارفع صورة واستخرج النص منها.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">دعم العربية</div>
          <div class="trust-desc">تعرف على النص العربي</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">دقة عالية</div>
          <div class="trust-desc">نتائج موثوقة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">معالجة سريعة</div>
          <div class="trust-desc">نتائج فورية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">مجاني تماماً</div>
          <div class="trust-desc">بدون قيود</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تحويل الصور</p>
          <h2 id="feature-title">حول الصور إلى نص قابل للتحرير</h2>
          <p class="section-lede">تقنية OCR متقدمة لاستخراج النص بدقة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>دعم متعدد اللغات</h3>
            <p>العربية والإنجليزية وأكثر.</p>
          </article>
          <article class="landing-feature-card">
            <h3>صيغ متعددة</h3>
            <p>PNG, JPG, WEBP والمزيد.</p>
          </article>
          <article class="landing-feature-card">
            <h3>نسخ سريع</h3>
            <p>انسخ النص بنقرة واحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>معالجة محلية</h3>
            <p>خصوصية كاملة للبيانات.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخراج النص من الصور</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. ارفع الصورة</h3>
            <p>اسحب وأفلت أو اختر من الجهاز.</p>
          </div>
          <div class="guideline-card">
            <h3>2. اختر اللغة</h3>
            <p>حدد لغة النص في الصورة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. انتظر المعالجة</h3>
            <p>الأداة تستخرج النص تلقائياً.</p>
          </div>
          <div class="guideline-card">
            <h3>4. انسخ النتيجة</h3>
            <p>انسخ النص واستخدمه.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
