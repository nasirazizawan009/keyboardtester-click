<?php
/**
 * Arabic Latency Checker - فاحص زمن الاستجابة
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'فاحص زمن الاستجابة - قياس التأخير مجاناً';
$pageDescription = 'قياس زمن استجابة الأجهزة والمدخلات في المتصفح. اختبار دقيق للتأخير.';
$pageKeywords = 'زمن الاستجابة, تأخير الإدخال, اختبار التأخير, قياس الاستجابة';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
          <h1 id="hero-title">فاحص زمن الاستجابة</h1>
          <p class="hero-lede">قياس زمن استجابة الأجهزة ودقة المدخلات. اختبار شامل للتأخير.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">فاحص زمن الاستجابة</h2>
          <p class="section-lede">انتظر الإشارة ثم انقر بأسرع ما يمكن.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">قياس دقيق</div>
          <div class="trust-desc">بالميلي ثانية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">متوسط الاستجابة</div>
          <div class="trust-desc">إحصائيات شاملة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">اختبار بصري</div>
          <div class="trust-desc">ردة فعل سريعة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">نتائج فورية</div>
          <div class="trust-desc">تحليل مباشر</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">قياس الأداء</p>
          <h2 id="feature-title">اكتشف سرعة استجابتك</h2>
          <p class="section-lede">أدوات احترافية لقياس زمن الاستجابة والتأخير.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>اختبار ردة الفعل</h3>
            <p>قياس سرعة استجابتك للمؤثرات.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تأخير الإدخال</h3>
            <p>قياس تأخير لوحة المفاتيح والماوس.</p>
          </article>
          <article class="landing-feature-card">
            <h3>إحصائيات مفصلة</h3>
            <p>متوسط وأفضل وأسوأ نتيجة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>مقارنة الأداء</h3>
            <p>قارن مع المتوسطات العالمية.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية قياس زمن الاستجابة</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. استعد للاختبار</h3>
            <p>ضع يدك على الماوس واستعد.</p>
          </div>
          <div class="guideline-card">
            <h3>2. انتظر الإشارة</h3>
            <p>انتظر تغير اللون أو الإشارة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. انقر فوراً</h3>
            <p>انقر بأسرع ما يمكن عند الإشارة.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع النتائج</h3>
            <p>شاهد زمن الاستجابة بالميلي ثانية.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
