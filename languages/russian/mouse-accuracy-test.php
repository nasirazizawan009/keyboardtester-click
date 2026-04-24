<?php
/**
 * Russian Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'Тест точности мыши - Онлайн тренажёр прицеливания';
$pageDescription = 'Тест точности мыши: aim-тренажёр измеряет процент попаданий, среднюю ошибку в пикселях и реакцию по каждой цели. Идеально для FPS, в браузере, без установки.';
$pageKeywords = 'тест точности мыши, тренажёр прицеливания, aim trainer';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Тренажёр прицеливания</p>
          <h1 class="hero-title" id="hero-title">Тест точности мыши - Тренажёр прицеливания</h1>
          <p class="hero-lede">Измерьте точность кликов, средний пиксельный промах и время реакции на цель. Откалибруйте DPI и чувствительность с реальными данными.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">Начать тест</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Точность в пикселях</span>
            <span class="hero-badge">Время реакции</span>
            <span class="hero-badge">Калибровка DPI</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Тренажёр прицеливания</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">Размер цели</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">Без установки</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="Тест точности мыши - Тренажёр прицеливания" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">Реальные данные прицеливания</div><p>Отслеживание попаданий и средней ошибки за сессию.</p></div>
            <div class="mini-card"><div class="mini-title">Цикл DPI</div><p>Тест, смена DPI, повтор - наблюдайте за изменением точности.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Тренажёр прицеливания</p>
          <h2 id="tool-stage-title">Тренажёр прицеливания</h2>
          <p class="section-lede">Кликайте по каждой цели как можно быстрее и точнее.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Советы</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Как использовать тест точности">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Точность в пикселях</div><div class="trust-desc">Каждый клик оценивается от центра цели</div></div>
        <div class="trust-item"><div class="trust-title">Время реакции</div><div class="trust-desc">Миллисекунды между появлением и кликом</div></div>
        <div class="trust-item"><div class="trust-title">Калибровка DPI</div><div class="trust-desc">Сравните настройки объективными данными</div></div>
        <div class="trust-item"><div class="trust-title">Локально без регистрации</div><div class="trust-desc">Без загрузок и отслеживания</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>Как использовать тест точности</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. Настройте сессию</h3><p>Выберите длительность (30с/60с/120с) и размер цели.</p></div>
          <div class="guideline-card"><h3>2. Кликайте по каждой цели</h3><p>Кликайте по каждой зелёной цели сразу.</p></div>
          <div class="guideline-card"><h3>3. Читайте результаты</h3><p>Процент попаданий, средний промах и время.</p></div>
          <div class="guideline-card"><h3>4. Корректируйте и повторяйте</h3><p>Измените DPI или чувствительность и проверьте снова.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
