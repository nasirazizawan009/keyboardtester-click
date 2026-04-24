<?php
/**
 * Arabic Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'اختبار دقة الماوس - مدرب التصويب أونلاين';
$pageDescription = 'اختبار دقة الماوس: مقياس تدريب التصويب يقيس نسبة الإصابات ومتوسط الخطأ بالبكسل وزمن الاستجابة لكل هدف. مثالي للاعبي FPS، يعمل في المتصفح بدون تثبيت.';
$pageKeywords = 'اختبار دقة الماوس, مدرب التصويب, دقة الماوس, aim trainer';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">مدرب التصويب</p>
          <h1 class="hero-title" id="hero-title">اختبار دقة الماوس - مدرب التصويب</h1>
          <p class="hero-lede">قس دقة نقراتك ومتوسط الخطأ بالبكسل وزمن رد الفعل لكل هدف. اضبط حساسية DPI ببيانات حقيقية.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">ابدأ الاختبار</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">دقة بالبكسل</span>
            <span class="hero-badge">زمن رد الفعل</span>
            <span class="hero-badge">معايرة DPI</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">مدرب التصويب</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">حجم الهدف</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">بدون تثبيت</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="اختبار دقة الماوس - مدرب التصويب" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">بيانات تصويب حقيقية</div><p>تتبع الإصابات ومتوسط الخطأ لكل جلسة.</p></div>
            <div class="mini-card"><div class="mini-title">حلقة DPI</div><p>اختبر، غير DPI، اختبر مجددا - شاهد تغير الدقة.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">مدرب التصويب</p>
          <h2 id="tool-stage-title">مدرب التصويب</h2>
          <p class="section-lede">انقر على كل هدف بأسرع ما يمكن وبأعلى دقة ممكنة.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="كيفية استخدام اختبار الدقة">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">دقة بالبكسل</div><div class="trust-desc">كل نقرة تقاس من مركز الهدف</div></div>
        <div class="trust-item"><div class="trust-title">زمن رد الفعل</div><div class="trust-desc">مللي ثانية بين الظهور والنقر</div></div>
        <div class="trust-item"><div class="trust-title">معايرة DPI</div><div class="trust-desc">قارن الإعدادات ببيانات موضوعية</div></div>
        <div class="trust-item"><div class="trust-title">محلي بدون تسجيل</div><div class="trust-desc">لا تنزيلات ولا تتبع</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>كيفية استخدام اختبار الدقة</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. اضبط الجلسة</h3><p>اختر المدة (30 ث / 60 ث / 120 ث) وحجم الهدف.</p></div>
          <div class="guideline-card"><h3>2. انقر على كل هدف</h3><p>انقر على كل هدف أخضر فورا.</p></div>
          <div class="guideline-card"><h3>3. اقرأ النتائج</h3><p>نسبة الإصابات والخطأ المتوسط والزمن.</p></div>
          <div class="guideline-card"><h3>4. اضبط وكرر</h3><p>غير DPI أو الحساسية واختبر مرة أخرى.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
