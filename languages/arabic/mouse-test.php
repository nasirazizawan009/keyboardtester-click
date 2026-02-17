<?php
/**
 * Arabic Mouse Tester - اختبار الماوس
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار الماوس - اختبر أزرار الماوس وعجلة التمرير مجاناً';
$pageDescription = 'اختبر أزرار الماوس وعجلة التمرير مجاناً عبر الإنترنت. تحقق من النقر الأيسر والأوسط والأيمن ووظائف التمرير.';
$pageKeywords = 'اختبار الماوس, اختبار النقر, اختبار التمرير, اختبار أزرار الماوس, فحص الماوس';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-test.php'); ?>">

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
        "name": "كيف أختبر أزرار الماوس عبر الإنترنت؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "انقر داخل منطقة الاختبار ثم اضغط على الأزرار اليسرى والوسطى واليمنى. كل نقرة تحدث العداد والتمييز."
        }
      },
      {
        "@type": "Question",
        "name": "كيف أختبر عجلة التمرير في الماوس؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "قم بالتمرير للأعلى والأسفل وتحقق من مؤشر الاتجاه والعداد للتأكد من اتساق إدخال العجلة."
        }
      },
      {
        "@type": "Question",
        "name": "هل يمكنني اختبار مشاكل النقر المزدوج؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "نعم. انقر بسرعة على الزر وتحقق من العداد لمعرفة ما إذا كانت هناك نقرات إضافية غير متوقعة."
        }
      },
      {
        "@type": "Question",
        "name": "هل اختبار الماوس خاص؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "جميع الاختبارات تعمل في المتصفح ولا يتم رفع أي بيانات."
        }
      }
    ]
  }
  </script>

  <style>
    body { font-family: 'Tajawal', 'Space Grotesk', sans-serif; }
    .landing-main { direction: rtl; text-align: right; }
    .hero-ctas { justify-content: flex-start; }
    .trust-grid { direction: rtl; }
    .process-grid { direction: rtl; }
    .landing-feature-grid { direction: rtl; }
    .guidelines-grid { direction: rtl; }
    .tool-stage-header { flex-direction: row-reverse; }
    .section-head.split { flex-direction: row-reverse; }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ar.php'; ?>

  <main id="main-content" class="landing-main">
    <!-- Hero Section -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">اختبار الماوس</h1>
          <p class="hero-lede">اختبر أزرار الماوس وعجلة التمرير في الوقت الفعلي. تحقق من جميع المدخلات بدقة.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Section -->
    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار الماوس</h2>
          <p class="section-lede">استخدم الأداة أدناه للتحقق من النقرات والتمرير والحالة.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح السريعة</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">دقة الأزرار</div>
          <div class="trust-desc">تتبع النقرات اليسرى والوسطى واليمنى</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">حالة التمرير</div>
          <div class="trust-desc">اتجاه العجلة + العدد الفوري</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">استجابة فورية</div>
          <div class="trust-desc">حالة فورية لكل إجراء</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تشغيل محلي</div>
          <div class="trust-desc">لا حاجة للتحميل أو التسجيل</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تشخيص الماوس</p>
          <h2 id="feature-title">كل ما تحتاجه للتحقق من الماوس</h2>
          <p class="section-lede">تحقق من النقرات والتمرير والاستجابة في لوحة واحدة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>اختبار الأزرار</h3>
            <p>تتبع النقرات اليسرى والوسطى واليمنى بعدادات دقيقة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تشخيص التمرير</h3>
            <p>تحقق من إدخال عجلة التمرير واتجاهها فوراً.</p>
          </article>
          <article class="landing-feature-card">
            <h3>عرض الحالة</h3>
            <p>شاهد حالة الضغط/الإفلات الفورية لكل إدخال.</p>
          </article>
          <article class="landing-feature-card">
            <h3>إعادة تعيين بنقرة واحدة</h3>
            <p>امسح العدادات وابدأ من جديد بإجراء واحد.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Process Steps -->
    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">سير عمل بسيط</p>
            <h2 id="process-title">ثلاث خطوات لاختبار الماوس</h2>
          </div>
          <p class="section-lede">قم بإجراء فحص كامل في أقل من دقيقة وتحقق من جميع المدخلات.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>انقر للبدء</h3>
            <p>استخدم النقرات اليسرى والوسطى واليمنى للتحقق من الاستجابة.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>مرر للاختبار</h3>
            <p>أدر العجلة للتحقق من الاتجاه والعداد.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>أعد التعيين وكرر</h3>
            <p>امسح العدادات وأعد الاختبار بعد التعديل.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار الماوس</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. انقر في منطقة الاختبار</h3>
            <p>انقر داخل اللوحة بأزرار الماوس لبدء الاختبار.</p>
          </div>
          <div class="guideline-card">
            <h3>2. اختبر جميع الأزرار</h3>
            <p>اختبر الزر الأيسر والأوسط (العجلة) والأيمن كلاً على حدة.</p>
          </div>
          <div class="guideline-card">
            <h3>3. اختبر التمرير</h3>
            <p>مرر العجلة للأعلى والأسفل للتحقق من وظيفة التمرير.</p>
          </div>
          <div class="guideline-card">
            <h3>4. تحقق من النتائج</h3>
            <p>راجع العدادات والحالة لكل إجراء للتأكد من سلامة الماوس.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
