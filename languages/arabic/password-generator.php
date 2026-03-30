<?php
/**
 * Arabic Password Generator - مولد كلمات المرور
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'مولد كلمات المرور - إنشاء كلمات مرور قوية مجاناً';
$pageDescription = 'أنشئ كلمات مرور قوية وآمنة فوراً باستخدام المولد العشوائي المجاني. خصص الطول والأحرف والرموز والأرقام للحصول على كلمات مرور آمنة لجميع مواقعك وتطبيقاتك.';
$pageKeywords = 'مولد كلمات المرور, كلمة مرور قوية, أمان, توليد كلمات المرور';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('auto-password-generator.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/password-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('auto-password-generator.php'); ?>">

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
          <h1 id="hero-title">مولد كلمات المرور</h1>
          <p class="hero-lede">أنشئ كلمات مرور قوية وآمنة بنقرة واحدة. خيارات تخصيص متعددة.</p>
          <div class="hero-ctas">
            <a href="#password-generator" class="landing-btn landing-btn-primary">إنشاء كلمة مرور</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">مولد كلمات المرور</h2>
          <p class="section-lede">اختر الخيارات واحصل على كلمة مرور قوية.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="password-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/password-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">قوة عالية</div>
          <div class="trust-desc">أحرف ورموز</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تخصيص كامل</div>
          <div class="trust-desc">طول ونوع</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">نسخ سريع</div>
          <div class="trust-desc">بنقرة واحدة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">محلي وآمن</div>
          <div class="trust-desc">لا يُحفظ شيء</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">أمان رقمي</p>
          <h2 id="feature-title">كلمات مرور لا يمكن اختراقها</h2>
          <p class="section-lede">أدوات احترافية لإنشاء كلمات مرور آمنة.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>أحرف كبيرة وصغيرة</h3>
            <p>A-Z و a-z للتنويع.</p>
          </article>
          <article class="landing-feature-card">
            <h3>أرقام</h3>
            <p>0-9 لزيادة التعقيد.</p>
          </article>
          <article class="landing-feature-card">
            <h3>رموز خاصة</h3>
            <p>!@#$% للأمان الأقصى.</p>
          </article>
          <article class="landing-feature-card">
            <h3>مؤشر القوة</h3>
            <p>تقييم قوة كلمة المرور.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'password-generator'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>نصائح لكلمات مرور قوية</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر طولاً مناسباً</h3>
            <p>12 حرفاً على الأقل للأمان.</p>
          </div>
          <div class="guideline-card">
            <h3>2. نوع الأحرف</h3>
            <p>استخدم كبيرة وصغيرة وأرقام.</p>
          </div>
          <div class="guideline-card">
            <h3>3. أضف رموزاً</h3>
            <p>الرموز الخاصة تزيد الأمان.</p>
          </div>
          <div class="guideline-card">
            <h3>4. لا تكرر</h3>
            <p>استخدم كلمة مرور فريدة لكل حساب.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
