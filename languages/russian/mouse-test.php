<?php
/**
 * Russian Mouse Tester - Тестер Мыши
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер Мыши - Проверка Кликов и Прокрутки Бесплатно';
$pageDescription = 'Проверьте все кнопки мыши, колесо прокрутки и движение курсора. Обнаружьте проблемы с мышью мгновенно.';
$pageKeywords = 'тестер мыши, тест мыши, проверка кликов, тест прокрутки, проверка кнопок мыши';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Как проверить кнопки мыши?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Нажимайте на область тестирования каждой кнопкой мыши. Инструмент определит и покажет какая кнопка была нажата."
        }
      },
      {
        "@type": "Question",
        "name": "Могу ли я проверить колесо прокрутки?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Да, прокручивайте вверх и вниз над областью тестирования для проверки функциональности колеса."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ru.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">Тестер Мыши</h1>
          <p class="hero-lede">Проверьте все кнопки, колесо прокрутки и движение. Обнаружьте проблемы мгновенно.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Мыши</h2>
          <p class="section-lede">Нажимайте и прокручивайте в области тестирования.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Советы</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Все Кнопки</div>
          <div class="trust-desc">Левая, Правая, Средняя</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Колесо</div>
          <div class="trust-desc">Вверх и Вниз</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Счетчик</div>
          <div class="trust-desc">Отслеживание Кликов</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Реальное Время</div>
          <div class="trust-desc">Мгновенный Отклик</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Полная Диагностика</p>
          <h2 id="feature-title">Проверьте Каждую Функцию Мыши</h2>
          <p class="section-lede">Профессиональные инструменты для тестирования вашей мыши.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Тест Кнопок</h3>
            <p>Проверьте левую, правую и среднюю кнопки.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Колесо Прокрутки</h3>
            <p>Проверьте плавность прокрутки.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Счетчик Кликов</h3>
            <p>Отслеживайте количество кликов.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Живой Статус</h3>
            <p>Мгновенная визуальная обратная связь.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Проверить Вашу Мышь</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Нажимайте Кнопки</h3>
            <p>Проверьте каждую кнопку мыши.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Используйте Колесо</h3>
            <p>Прокручивайте вверх и вниз.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Двигайте Курсор</h3>
            <p>Проверьте плавность движения.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Смотрите Результаты</h3>
            <p>Проверьте счетчик и статус.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
