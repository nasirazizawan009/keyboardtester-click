<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار انحراف الماوس - اكتشف اهتزاز المستشعر';
$pageDescription = 'اختبار انحراف الماوس: اكتشف انحراف المؤشر في وضع الخمول واهتزاز المستشعر خلال 10 ثوانٍ إلى 3 دقائق، مع حكم نجاح/فشل ورسم بياني مفصل.';
$pageKeywords = 'اختبار انحراف الماوس, انحراف المؤشر, اهتزاز المستشعر, mouse drift test';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">تشخيص الماوس</p>
        <h1 class="hero-title">اختبار انحراف الماوس - اكتشف اهتزاز المستشعر</h1>
        <p class="hero-lede">هل يتحرك المؤشر من تلقاء نفسه دون أن تلمس الماوس؟ اختبار الانحراف يعاين كل حدث مؤشر خلال 10-180 ثانية ويعرض مجموع الانحراف والقفزة الأكبر وحكم نجاح/فشل.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">بدء الاختبار</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">دقة بكسل</span><span class="hero-badge">10ث - 3د</span><span class="hero-badge">حكم</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">الأداة الرئيسية</p><h2>اختبار انحراف الماوس</h2><p class="section-lede">اترك الماوس ثابتًا واضغط بدء.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>كيفية اكتشاف الانحراف</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. لا تلمس الماوس</h3><p>ارفع يدك خلال الاختبار.</p></div>
        <div class="guideline-card"><h3>2. ابدأ</h3><p>اختر المدة وانتظر.</p></div>
        <div class="guideline-card"><h3>3. اقرأ الحكم</h3><p>0 بكسل = مثالي، &lt;5 = طبيعي.</p></div>
        <div class="guideline-card"><h3>4. عالج</h3><p>لوحة ماوس حقيقية، وإيقاف التسارع.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
