<?php
/**
 * Russian Headphone/Speaker Tester - Тестер Наушников и Динамиков
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер Наушников и Динамиков - Проверка Звука Бесплатно';
$pageDescription = 'Проверьте наушники и динамики с помощью частотных тестов. Тестируйте левый и правый каналы, басы и высокие частоты.';
$pageKeywords = 'тестер наушников, тест динамиков, проверка звука, тест басов, аудио тест';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">

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
        "name": "Как проверить наушники?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Используйте частотные тесты для проверки левого и правого каналов, басов и высоких частот."
        }
      },
      {
        "@type": "Question",
        "name": "Что такое частотная развертка?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Частотная развертка проигрывает звук от низких до высоких частот для проверки полного диапазона."
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
          <h1 id="hero-title">Тестер Наушников и Динамиков</h1>
          <p class="hero-lede">Проверьте качество звука с частотными тестами и балансом каналов.</p>
          <div class="hero-ctas">
            <a href="#audio-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Наушников</h2>
          <p class="section-lede">Выберите тест и проверьте качество звука.</p>
        </div>
      </div>
      <section id="audio-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Частотные Тесты</div>
          <div class="trust-desc">20Гц - 20кГц</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Баланс Каналов</div>
          <div class="trust-desc">Левый / Правый</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Басы и Высокие</div>
          <div class="trust-desc">Полный диапазон</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Белый Шум</div>
          <div class="trust-desc">Проверка качества</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Проверить Наушники</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Подключите Устройство</h3>
            <p>Убедитесь что наушники подключены.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Выберите Тест</h3>
            <p>Частотная развертка или отдельные тесты.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Слушайте Внимательно</h3>
            <p>Проверьте оба канала.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Оцените Результат</h3>
            <p>Проверьте качество звука.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
