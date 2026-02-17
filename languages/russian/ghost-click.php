<?php
/**
 * Russian Ghost Click Detector - Детектор Призрачных Кликов
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Детектор Призрачных Кликов - Проверка Двойного Клика Бесплатно';
$pageDescription = 'Обнаружьте призрачные клики и проблемы с двойным кликом мыши. Проверьте надежность кнопок мыши.';
$pageKeywords = 'детектор призрачных кликов, двойной клик, проблема мыши, тест кнопок, ghost click';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-detector.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-detector.php'); ?>">

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
        "name": "Что такое призрачный клик?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Призрачный клик - это когда мышь регистрирует двойной клик при одном нажатии. Это частая проблема изношенных переключателей."
        }
      },
      {
        "@type": "Question",
        "name": "Как обнаружить призрачные клики?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Кликайте в области тестирования. Если интервал между кликами слишком мал, инструмент определит это как быстрый клик."
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
          <h1 id="hero-title">Детектор Призрачных Кликов</h1>
          <p class="hero-lede">Обнаружьте проблемы с двойным кликом и проверьте надежность мыши.</p>
          <div class="hero-ctas">
            <a href="#ghost-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Детектор Призрачных Кликов</h2>
          <p class="section-lede">Кликайте в области тестирования для обнаружения проблем.</p>
        </div>
      </div>
      <section id="ghost-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Обнаружение</div>
          <div class="trust-desc">Быстрые клики</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Статистика</div>
          <div class="trust-desc">Интервалы кликов</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Точность</div>
          <div class="trust-desc">Миллисекунды</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Реальное Время</div>
          <div class="trust-desc">Мгновенный отклик</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Обнаружить Призрачные Клики</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Кликайте Нормально</h3>
            <p>Кликайте в обычном темпе.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Смотрите Интервалы</h3>
            <p>Проверяйте время между кликами.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Обнаружение Проблем</h3>
            <p>Быстрые клики выделяются красным.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Анализ Результатов</h3>
            <p>Проверьте среднее время интервала.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
