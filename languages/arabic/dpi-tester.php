<?php
/**
 * Arabic DPI Tester - اختبار حساسية الماوس
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار حساسية الماوس DPI - قياس الدقة والحساسية';
$pageDescription = 'اختبر حساسية الماوس وقياس DPI. تحقق من دقة التتبع وحساسية الحركة مجاناً.';
$pageKeywords = 'اختبار DPI, حساسية الماوس, دقة الماوس, قياس DPI, اختبار الحساسية';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">

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
          <h1 id="hero-title">اختبار حساسية الماوس DPI</h1>
          <p class="hero-lede">قياس دقة DPI وحساسية الماوس. أداة احترافية لضبط إعدادات الماوس.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار DPI والحساسية</h2>
          <p class="section-lede">حرك الماوس في منطقة الاختبار لقياس الحساسية.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">قياس DPI</div>
          <div class="trust-desc">حساب الدقة الفعلية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تتبع الحركة</div>
          <div class="trust-desc">مراقبة المسافة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">دقة عالية</div>
          <div class="trust-desc">قياسات بالبكسل</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">بدون برامج</div>
          <div class="trust-desc">يعمل في المتصفح</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">تحليل الحساسية</p>
          <h2 id="feature-title">اكتشف دقة ماوسك الحقيقية</h2>
          <p class="section-lede">أداة احترافية لقياس وتحسين إعدادات الماوس.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>قياس DPI</h3>
            <p>احسب قيمة DPI الفعلية للماوس.</p>
          </article>
          <article class="landing-feature-card">
            <h3>تتبع المسافة</h3>
            <p>قياس المسافة المقطوعة بالبكسل.</p>
          </article>
          <article class="landing-feature-card">
            <h3>اختبار الدقة</h3>
            <p>تحقق من دقة تتبع الماوس.</p>
          </article>
          <article class="landing-feature-card">
            <h3>توصيات الضبط</h3>
            <p>اقتراحات لتحسين الإعدادات.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار DPI</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. أدخل المسافة الفعلية</h3>
            <p>قس المسافة الفعلية التي سيتحركها الماوس.</p>
          </div>
          <div class="guideline-card">
            <h3>2. حرك الماوس</h3>
            <p>حرك الماوس المسافة المحددة في خط مستقيم.</p>
          </div>
          <div class="guideline-card">
            <h3>3. راجع القياس</h3>
            <p>شاهد قيمة DPI المحسوبة.</p>
          </div>
          <div class="guideline-card">
            <h3>4. عدل الإعدادات</h3>
            <p>اضبط إعدادات الماوس حسب النتائج.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
