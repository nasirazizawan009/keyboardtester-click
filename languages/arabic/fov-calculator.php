<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'حاسبة مجال الرؤية FoV - تحويل الزوايا بين الألعاب';
$pageDescription = 'حاسبة مجال الرؤية (FoV): حوّل مجال الرؤية بين الألعاب ونسب العرض مع إعدادات مسبقة لـ CS2 وValorant وApex وCoD وFortnite. مجانية ومباشرة في المتصفح.';
$pageKeywords = 'حاسبة fov, مجال الرؤية, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">حاسبات حساسية الألعاب</p>
        <h1 class="hero-title">حاسبة FoV - حوّل مجال الرؤية</h1>
        <p class="hero-lede">حوّل أي مجال رؤية بين الأفقي والعمودي والقطري لنسب 4:3 و16:9 و21:9 و32:9. تتضمن إعدادات مسبقة لـCS2 وValorant وApex وCoD وFortnite للحفاظ على الإحساس العمودي نفسه بين الألعاب والشاشات.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">حوّل FoV</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">أفقي / عمودي / قطري</span><span class="hero-badge">جميع النسب</span><span class="hero-badge">إعدادات الألعاب</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">الأداة الرئيسية</p><h2>حاسبة FoV</h2><p class="section-lede">اختر إعدادًا مسبقًا أو أدخل FoV والنسبة.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>كيفية تحويل FoV</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. اختر لعبتك</h3><p>الإعداد المسبق يضبط الصيغة والنسبة.</p></div>
        <div class="guideline-card"><h3>2. أدخل FoV</h3><p>اكتب القيمة الحالية.</p></div>
        <div class="guideline-card"><h3>3. اقرأ الجدول</h3><p>FoV المكافئ لكل صيغة ونسبة.</p></div>
        <div class="guideline-card"><h3>4. طبّقه</h3><p>انسخ القيمة إلى اللعبة الجديدة.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
