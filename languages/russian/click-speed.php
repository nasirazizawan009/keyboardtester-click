<?php
/**
 * Russian Click Speed Test - Тест Скорости Клика
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тест Скорости Клика - Измерьте Ваш CPS Бесплатно';
$pageDescription = 'Измерьте скорость клика (CPS - Кликов В Секунду). Проверьте свою скорость с разными интервалами времени.';
$pageKeywords = 'скорость клика, CPS тест, кликов в секунду, тест скорости мыши, click speed test';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('click-speed-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('click-speed-test.php'); ?>">

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
        "name": "Что такое CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS означает Кликов В Секунду. Измеряет сколько раз вы можете кликнуть за секунду."
        }
      },
      {
        "@type": "Question",
        "name": "Какая хорошая скорость CPS?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Средний показатель 6-8 CPS. Профессиональные геймеры могут достигать 10-14 CPS."
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
          <h1 id="hero-title">Тест Скорости Клика</h1>
          <p class="hero-lede">Измерьте ваш CPS и улучшите скорость клика с тестами на время.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тест Скорости Клика</h2>
          <p class="section-lede">Кликайте как можно быстрее в области тестирования.</p>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Измерение CPS</div>
          <div class="trust-desc">Кликов в секунду</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Разные Интервалы</div>
          <div class="trust-desc">5с, 10с, 30с, 60с</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Статистика</div>
          <div class="trust-desc">Всего и среднее</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Мгновенно</div>
          <div class="trust-desc">Результаты в реальном времени</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Измерить Скорость Клика</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Выберите Длительность</h3>
            <p>Выберите время теста.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Кликайте Быстро</h3>
            <p>Кликайте как можно быстрее.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Держите Ритм</h3>
            <p>Стабильность важнее скорости.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Смотрите Результаты</h3>
            <p>Проверьте ваш CPS и итог.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
