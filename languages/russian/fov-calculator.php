<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Калькулятор FoV - Перевод Поля Зрения между Играми';
$pageDescription = 'Бесплатный онлайн-калькулятор FoV. Переводите горизонтальное, вертикальное и диагональное поле зрения между 4:3, 16:9, 21:9 и 32:9 для CS2, Valorant, Apex, CoD и Fortnite.';
$pageKeywords = 'калькулятор fov, поле зрения, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Калькуляторы игровой чувствительности</p>
        <h1 class="hero-title">Калькулятор FoV - Конвертация поля зрения</h1>
        <p class="hero-lede">Переводите любое FoV между горизонтальным, вертикальным и диагональным для 4:3, 16:9, 21:9 и 32:9. Пресеты CS2, Valorant, Apex, CoD и Fortnite помогают перенести то же вертикальное ощущение между играми и мониторами.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">Конвертировать FoV</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / Диагональ</span><span class="hero-badge">Все соотношения</span><span class="hero-badge">Игровые пресеты</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Калькулятор FoV</h2><p class="section-lede">Выберите пресет или введите FoV и соотношение сторон.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Как перевести FoV</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Выберите игру</h3><p>Пресет задаёт формат и соотношение.</p></div>
        <div class="guideline-card"><h3>2. Введите FoV</h3><p>Укажите текущее значение.</p></div>
        <div class="guideline-card"><h3>3. Смотрите таблицу</h3><p>Эквивалент FoV для каждого формата.</p></div>
        <div class="guideline-card"><h3>4. Применяйте</h3><p>Копируйте значение в новую игру.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
