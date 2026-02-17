<?php
/**
 * Arabic Typing Speed Test - اختبار سرعة الكتابة
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار سرعة الكتابة - قياس WPM والدقة مجاناً';
$pageDescription = 'اختبر سرعة الكتابة وقياس WPM والدقة. حسن مهاراتك في الكتابة مع اختبارات متنوعة.';
$pageKeywords = 'اختبار سرعة الكتابة, WPM, دقة الكتابة, اختبار الطباعة, تعلم الكتابة';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "ما هو متوسط سرعة الكتابة؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "متوسط سرعة الكتابة هو 40 WPM (كلمة في الدقيقة). الكاتبون المحترفون يصلون إلى 65-75 WPM."
        }
      },
      {
        "@type": "Question",
        "name": "كيف أحسن سرعة الكتابة؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "التمرين المنتظم، استخدام جميع الأصابع، والتركيز على الدقة قبل السرعة."
        }
      }
    ]
  }
  </script>

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
          <h1 id="hero-title">اختبار سرعة الكتابة</h1>
          <p class="hero-lede">قياس سرعة الكتابة (WPM) والدقة. حسن مهاراتك مع تمارين متنوعة.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار سرعة الكتابة</h2>
          <p class="section-lede">اكتب النص المعروض بأسرع وأدق ما يمكن.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">قياس WPM</div>
          <div class="trust-desc">كلمات في الدقيقة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">دقة الكتابة</div>
          <div class="trust-desc">نسبة الصحة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">نصوص متنوعة</div>
          <div class="trust-desc">محتوى مختلف</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تتبع التقدم</div>
          <div class="trust-desc">مراقبة التحسن</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تحسين المهارات</p>
          <h2 id="feature-title">طور مهاراتك في الكتابة</h2>
          <p class="section-lede">أدوات احترافية لقياس وتحسين سرعة الكتابة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>قياس السرعة</h3>
            <p>حساب WPM بدقة عالية.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تحليل الأخطاء</h3>
            <p>تحديد الأحرف الصعبة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>مستويات متعددة</h3>
            <p>من المبتدئ إلى المحترف.</p>
          </article>
          <article class="landing-feature-card">
            <h3>إحصائيات مفصلة</h3>
            <p>تقارير أداء شاملة.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار الكتابة</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر المدة</h3>
            <p>حدد فترة الاختبار المناسبة.</p>
          </div>
          <div class="guideline-card">
            <h3>2. ابدأ الكتابة</h3>
            <p>اكتب النص المعروض بدقة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. ركز على الدقة</h3>
            <p>الدقة أهم من السرعة في البداية.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع النتائج</h3>
            <p>تحليل WPM والأخطاء للتحسين.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
