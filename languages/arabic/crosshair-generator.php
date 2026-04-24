<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'مولد العلامة المتقاطعة - تخصيص Crosshair لـCS2 وValorant';
$pageDescription = 'مولد العلامة المتقاطعة: صمّم علامة مخصصة مع معاينة حية، تصدير PNG، وأمر وحدة تحكم CS2 وقيم إعدادات Valorant. مجاني وفوري، بدون تثبيت أي برامج.';
$pageKeywords = 'مولد العلامة المتقاطعة, crosshair, مولد crosshair cs2, مولد crosshair valorant';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">أدوات العلامة المتقاطعة</p>
        <h1 class="hero-title">مولد العلامة المتقاطعة - Crosshair مخصصة</h1>
        <p class="hero-lede">صمّم علامة متقاطعة مع معاينة حية. اختر إعدادًا احترافيًا (s1mple، TenZ) أو عدّل كل معامل: الشكل واللون والسمك والطول والفجوة والنقطة والحدود. نزّل PNG شفاف أو انسخ أمر وحدة تحكم CS2 جاهز للصق.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">افتح المولد</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">معاينة حية</span><span class="hero-badge">أمر CS2</span><span class="hero-badge">قيم Valorant</span><span class="hero-badge">PNG شفاف</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">الأداة الرئيسية</p><h2>مولد العلامة المتقاطعة</h2><p class="section-lede">عدّل المعاملات وصدّر إلى CS2 أو Valorant أو PNG.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>كيفية تطبيق العلامة</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. اختر إعدادًا</h3><p>ابدأ من إعداد احترافي وعدّل.</p></div>
        <div class="guideline-card"><h3>2. اضبط المعاينة</h3><p>الشكل واللون والحدود فوريًا.</p></div>
        <div class="guideline-card"><h3>3. صدّر</h3><p>نزّل PNG أو انسخ أمر CS2.</p></div>
        <div class="guideline-card"><h3>4. طبّق داخل اللعبة</h3><p>الصق في وحدة التحكم (~) أو أدخل في Valorant.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
