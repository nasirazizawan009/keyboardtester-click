<?php
/**
 * Russian Screen Tester - Тестер Экрана
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер Экрана - Проверка Битых Пикселей Бесплатно';
$pageDescription = 'Проверьте экран на битые пиксели и равномерность подсветки. Тест с разными цветами для полной диагностики.';
$pageKeywords = 'тестер экрана, битые пиксели, проверка монитора, тест экрана, dead pixel test';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screentestindex.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screentestindex.php'); ?>">

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
        "name": "Как найти битые пиксели?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Используйте однотонные цвета в полноэкранном режиме и внимательно осмотрите весь экран."
        }
      },
      {
        "@type": "Question",
        "name": "Какие цвета лучше использовать?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Проверьте экран на черном, белом, красном, зеленом и синем цветах."
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
          <h1 id="hero-title">Тестер Экрана</h1>
          <p class="hero-lede">Проверьте экран на битые пиксели и дефекты подсветки.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Экрана</h2>
          <p class="section-lede">Выберите цвет и проверьте экран в полноэкранном режиме.</p>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">8 Цветов</div>
          <div class="trust-desc">Полная проверка</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Полный Экран</div>
          <div class="trust-desc">Режим F11</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Битые Пиксели</div>
          <div class="trust-desc">Легко найти</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Подсветка</div>
          <div class="trust-desc">Проверка равномерности</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Проверить Экран</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Выберите Цвет</h3>
            <p>Начните с черного или белого.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Полный Экран</h3>
            <p>Нажмите F11 для полноэкранного режима.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Осмотрите Экран</h3>
            <p>Ищите точки и неравномерности.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Проверьте Все Цвета</h3>
            <p>Повторите с другими цветами.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
