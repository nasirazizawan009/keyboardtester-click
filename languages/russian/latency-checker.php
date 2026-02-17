<?php
/**
 * Russian Latency Checker - Проверка Задержки
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Проверка Задержки Клавиатуры - Измерение Латентности Бесплатно';
$pageDescription = 'Измерьте задержку клавиатуры и время отклика. Проверьте латентность ввода для игр и работы.';
$pageKeywords = 'проверка задержки, латентность клавиатуры, время отклика, тест задержки, input lag';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
        "name": "Что такое задержка клавиатуры?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Задержка клавиатуры - это время между нажатием клавиши и регистрацией события в системе."
        }
      },
      {
        "@type": "Question",
        "name": "Какая нормальная задержка?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Хорошая задержка составляет менее 20мс. Для игр желательно менее 10мс."
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
          <h1 id="hero-title">Проверка Задержки Клавиатуры</h1>
          <p class="hero-lede">Измерьте латентность ввода и время отклика клавиатуры.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Задержки</h2>
          <p class="section-lede">Нажимайте клавиши для измерения задержки.</p>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Точность</div>
          <div class="trust-desc">Миллисекунды</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Статистика</div>
          <div class="trust-desc">Мин/Сред/Макс</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Реальное Время</div>
          <div class="trust-desc">Мгновенные данные</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">История</div>
          <div class="trust-desc">График измерений</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Измерить Задержку</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Кликните в Области</h3>
            <p>Активируйте область тестирования.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Нажимайте Клавиши</h3>
            <p>Нажимайте любые клавиши.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Смотрите Результаты</h3>
            <p>Проверяйте время отклика.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Анализируйте</h3>
            <p>Сравните среднее и лучшее время.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
