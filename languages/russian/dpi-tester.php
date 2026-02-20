<?php
/**
 * Russian DPI Tester - Тестер DPI Мыши
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер DPI Мыши - Проверка Чувствительности Бесплатно';
$pageDescription = 'Измерьте DPI мыши и чувствительность. Оцените реальный DPI вашей мыши с помощью простого теста.';
$pageKeywords = 'тестер DPI, DPI мыши, чувствительность мыши, тест DPI, проверка DPI';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <link rel="stylesheet" href="<?php echo url('assets/css/tool-components.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ru.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Тестер DPI Мыши</h1>
          <p class="hero-lede">Измерьте реальный DPI вашей мыши и проверьте чувствительность.</p>
          <div class="hero-ctas">
            <a href="#dpi-tool" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер DPI</h2>
          <p class="section-lede">Введите расстояние и перетащите мышь для измерения DPI.</p>
        </div>
      </div>
      <section id="dpi-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Точное Измерение</div>
          <div class="trust-desc">Пиксели на дюйм</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Разные Единицы</div>
          <div class="trust-desc">см и дюймы</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Мгновенный Расчет</div>
          <div class="trust-desc">Результат в реальном времени</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Простой Тест</div>
          <div class="trust-desc">Легко использовать</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Измерить DPI Мыши</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Введите Расстояние</h3>
            <p>Укажите физическое расстояние движения мыши.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Нажмите Начать</h3>
            <p>Активируйте режим измерения.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Перетащите Мышь</h3>
            <p>Двигайте мышь на указанное расстояние.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Смотрите Результат</h3>
            <p>Получите расчетный DPI.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
