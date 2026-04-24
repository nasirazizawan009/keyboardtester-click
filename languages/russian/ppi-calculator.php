<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Калькулятор PPI - Пикселей на дюйм из разрешения';
$pageDescription = 'Бесплатный онлайн-калькулятор PPI. Рассчитайте пикселей на дюйм, шаг точки, соотношение сторон и мегапиксели для любого экрана по разрешению и диагонали.';
$pageKeywords = 'калькулятор ppi, пиксели на дюйм, dpi монитор, плотность экрана';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Калькуляторы экрана</p>
        <h1 class="hero-title">Калькулятор PPI - Пикселей на дюйм</h1>
        <p class="hero-lede">Введите разрешение и диагональ экрана, чтобы сразу получить PPI, шаг точки, соотношение сторон и мегапиксели. Пресеты для мониторов, ноутбуков и телефонов.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">Рассчитать PPI</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + шаг</span><span class="hero-badge">Соотношение</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Калькулятор PPI</h2><p class="section-lede">Разрешение + диагональ → PPI мгновенно.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
