<?php
/**
 * Arabic Click Speed Test - اختبار سرعة النقر
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار سرعة النقر - قياس CPS و CPM مجاناً';
$pageDescription = 'قياس سرعة النقر (CPS/CPM) مع اختبارات محددة بالوقت. اكتشف سرعة نقرك وحسن أداءك في الألعاب.';
$pageKeywords = 'اختبار سرعة النقر, CPS, CPM, اختبار النقر السريع, سرعة الماوس';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_speed_tester.php'); ?>">

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
        "name": "ما هو اختبار سرعة النقر؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "اختبار سرعة النقر يقيس عدد النقرات التي يمكنك إجراؤها في الثانية (CPS) أو في الدقيقة (CPM)."
        }
      },
      {
        "@type": "Question",
        "name": "ما هو متوسط سرعة النقر؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "متوسط سرعة النقر للمستخدم العادي هو 6-7 CPS. اللاعبون المحترفون يمكنهم الوصول إلى 10-14 CPS."
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
          <h1 id="hero-title">اختبار سرعة النقر</h1>
          <p class="hero-lede">قياس سرعة النقر (CPS/CPM) مع اختبارات محددة بالوقت. حسن مهاراتك في الألعاب.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار سرعة النقر</h2>
          <p class="section-lede">انقر بأسرع ما يمكن في منطقة الاختبار.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">CPS فوري</div>
          <div class="trust-desc">نقرات في الثانية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">أوقات متعددة</div>
          <div class="trust-desc">5-60 ثانية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تتبع الأداء</div>
          <div class="trust-desc">أفضل نتيجة محفوظة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">بدون تسجيل</div>
          <div class="trust-desc">ابدأ فوراً</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">قياس السرعة</p>
          <h2 id="feature-title">اكتشف سرعة نقرك الحقيقية</h2>
          <p class="section-lede">اختبارات دقيقة لقياس أدائك في النقر السريع.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>قياس CPS</h3>
            <p>عدد النقرات في الثانية الواحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>قياس CPM</h3>
            <p>عدد النقرات في الدقيقة الواحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>أفضل نتيجة</h3>
            <p>تتبع أعلى سرعة وصلت إليها.</p>
          </article>
          <article class="landing-feature-card">
            <h3>فترات مختلفة</h3>
            <p>اختر من 5 إلى 60 ثانية.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار سرعة النقر</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر المدة</h3>
            <p>حدد فترة الاختبار من 5 إلى 60 ثانية.</p>
          </div>
          <div class="guideline-card">
            <h3>2. انقر للبدء</h3>
            <p>انقر في منطقة الاختبار لبدء العد التنازلي.</p>
          </div>
          <div class="guideline-card">
            <h3>3. انقر بسرعة</h3>
            <p>انقر بأسرع ما يمكن حتى انتهاء الوقت.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع النتائج</h3>
            <p>شاهد CPS و CPM وقارن بأفضل نتيجة لك.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
