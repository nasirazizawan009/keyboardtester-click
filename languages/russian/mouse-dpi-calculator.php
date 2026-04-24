<?php
/**
 * Russian Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Калькулятор DPI мыши - Измерить настоящий DPI онлайн';
$pageDescription = 'Бесплатный онлайн-калькулятор DPI мыши. Измерьте реальный DPI, протащив курсор по панели, или введите пиксели и дюймы вручную. Сравните заявленный и реальный DPI сенсора.';
$pageKeywords = 'калькулятор dpi мыши, реальный dpi, измерить dpi мыши, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Калькуляторы игровой чувствительности</p>
          <h1 class="hero-title">Калькулятор DPI мыши - Измерьте настоящий DPI</h1>
          <p class="hero-lede">Проверьте реальный DPI вашей мыши. Протащите известное физическое расстояние (или введите значения вручную), и мы рассчитаем истинный DPI в пикселях на дюйм. Выявляйте неточность сенсора и сравнивайте с заявленным значением.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">Измерить DPI</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Панель протяжки</span>
            <span class="hero-badge">Ввод пикселей + дюймов</span>
            <span class="hero-badge">Заявленный vs реальный</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной инструмент</p>
          <h2>Калькулятор DPI мыши</h2>
          <p class="section-lede">Введите пиксели и дюймы или протащите курсор по панели для измерения.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Как вычислить DPI</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Отключите ускорение</h3><p>В Windows выключите "Повышенная точность установки указателя" перед измерением.</p></div>
          <div class="guideline-card"><h3>2. Подготовьте линейку</h3><p>Положите линейку рядом с ковриком.</p></div>
          <div class="guideline-card"><h3>3. Протащите 10 см или 4 дюйма</h3><p>Зажмите кнопку и ведите мышь по прямой.</p></div>
          <div class="guideline-card"><h3>4. Сравните DPI</h3><p>Введите заявленный DPI и посмотрите отклонение.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
