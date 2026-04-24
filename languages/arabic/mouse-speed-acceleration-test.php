<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار تسارع الماوس - سحبة بطيئة مقابل سريعة';
$pageDescription = 'اختبار سرعة وتسارع الماوس: قارن عدد البكسلات في سحبة بطيئة وأخرى سريعة لكشف تسارع المؤشر في Windows أو داخل تعريف الماوس. تحليل مباشر في المتصفح.';
$pageKeywords = 'اختبار تسارع الماوس, تسارع المؤشر, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">تشخيص الماوس</p>
        <h1 class="hero-title">اختبار تسارع الماوس</h1>
        <p class="hero-lede">هل يضيف ويندوز أو تعريف الماوس تسارعًا يكسر اتساق تصويبك؟ اسحب المسافة الفيزيائية نفسها ببطء ثم بسرعة — إن زادت البكسلات مع السرعة فالتسارع مفعّل. تظهر الأداة نسبة سريعة/بطيء الدقيقة.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">بدء الاختبار</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">دقة بكسل</span><span class="hero-badge">حكم بالنسبة</span><span class="hero-badge">بلا تثبيت</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">الأداة الرئيسية</p><h2>اختبار تسارع الماوس</h2><p class="section-lede">اسحب ببطء ثم بسرعة نفس المسافة.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>كيفية اكتشاف التسارع</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. سحبة بطيئة</h3><p>نحو ثانيتين.</p></div>
        <div class="guideline-card"><h3>2. سحبة سريعة</h3><p>نفس المسافة، أقل من 0.5 ثانية.</p></div>
        <div class="guideline-card"><h3>3. اقرأ النسبة</h3><p>1.00 = مثالي، &gt;1.15 = تسارع.</p></div>
        <div class="guideline-card"><h3>4. أوقفه</h3><p>"تحسين دقة المؤشر" في لوحة التحكم.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
