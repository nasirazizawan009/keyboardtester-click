<?php
/**
 * Arabic Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'حاسبة DPI للماوس - قياس DPI الحقيقي عبر الإنترنت';
$pageDescription = 'حاسبة مجانية لـDPI الماوس عبر الإنترنت. قس DPI الحقيقي بالسحب على اللوحة أو بإدخال البكسلات والبوصات يدويًا. قارن DPI المُعلن مع DPI الحقيقي للمستشعر.';
$pageKeywords = 'حاسبة dpi الماوس, dpi حقيقي, قياس dpi الماوس, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">حاسبات حساسية الألعاب</p>
          <h1 class="hero-title">حاسبة DPI للماوس - قياس DPI الحقيقي</h1>
          <p class="hero-lede">تحقق من DPI الحقيقي لماوسك. اسحب مسافة فيزيائية معروفة (أو أدخل القيم يدويًا) ونحسب DPI الحقيقي بالبكسل لكل بوصة. اكتشف عدم دقة المستشعر وقارنه بالقيمة المُعلنة.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">قياس DPI</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">كيفية الاستخدام</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">لوحة السحب</span>
            <span class="hero-badge">إدخال بكسل وبوصة</span>
            <span class="hero-badge">DPI المُعلن مقابل الحقيقي</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2>حاسبة DPI للماوس</h2>
          <p class="section-lede">أدخل البكسلات والبوصات، أو اسحب على اللوحة للقياس.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>كيفية حساب DPI</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. أوقف تسارع الماوس</h3><p>أوقف "تحسين دقة المؤشر" في ويندوز قبل القياس.</p></div>
          <div class="guideline-card"><h3>2. ضع مسطرة</h3><p>ضع مسطرة بجانب لوحة الماوس.</p></div>
          <div class="guideline-card"><h3>3. اسحب 10 سم أو 4 بوصة</h3><p>اضغط مع الاستمرار وحرك الماوس في خط مستقيم.</p></div>
          <div class="guideline-card"><h3>4. قارن DPI</h3><p>أدخل DPI المُعلن ولاحظ الانحراف.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
