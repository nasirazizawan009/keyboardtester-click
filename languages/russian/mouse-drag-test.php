<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест Drag Click мыши - CPS и пиковая скорость';
$pageDescription = 'Тест перетаскивания мыши: измеряет скорость, пик и общее число кликов при drag с живым графиком. Идеально для техник drag clicking в играх, без установки.';
$pageKeywords = 'тест drag click, drag click CPS, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Тестер Drag Click</p>
          <h1 class="hero-title">Тест Drag Click мыши - CPS и пиковая скорость</h1>
          <p class="hero-lede">Измерьте CPS drag-click, пиковую скорость и общие клики в сессиях 5, 10 или 30 секунд. Идеально для Minecraft PvP.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">Начать тест</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Живой счётчик CPS</span>
            <span class="hero-badge">Пиковая скорость</span>
            <span class="hero-badge">Временной график</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест Drag Click мыши" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">Основной инструмент</p><h2>Тестер Drag Click</h2><p class="section-lede">Нажимайте или проводите пальцем по кнопке как можно быстрее.</p></div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?></section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Как использовать тест Drag Click</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Настройте сессию</h3><p>Выберите длительность и нажмите Старт.</p></div>
          <div class="guideline-card"><h3>2. Кликайте или проводите</h3><p>Проводите пальцем под углом 30-45 градусов.</p></div>
          <div class="guideline-card"><h3>3. Читайте результаты</h3><p>Средний CPS, пик и пик всплеска 200мс.</p></div>
          <div class="guideline-card"><h3>4. Корректируйте технику</h3><p>Измените угол или мышь и повторите тест.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
