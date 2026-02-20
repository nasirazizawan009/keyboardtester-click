<?php
/**
 * Russian Webcam Tester - Тестер Веб-камеры
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер Веб-камеры - Проверка Камеры Онлайн Бесплатно';
$pageDescription = 'Проверьте веб-камеру онлайн. Протестируйте качество видео, разрешение и настройки камеры.';
$pageKeywords = 'тестер веб-камеры, проверка камеры, тест камеры онлайн, webcam test';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcamtesterindex.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcamtesterindex.php'); ?>">

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
        "name": "Как проверить веб-камеру?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Нажмите кнопку включения, разрешите доступ к камере и проверьте качество изображения."
        }
      },
      {
        "@type": "Question",
        "name": "Почему камера не работает?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Проверьте подключение камеры, разрешения браузера и убедитесь что камера не используется другим приложением."
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
          <h1 id="hero-title">Тестер Веб-камеры</h1>
          <p class="hero-lede">Проверьте веб-камеру онлайн. Протестируйте качество и настройки.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Веб-камеры</h2>
          <p class="section-lede">Включите камеру и проверьте качество видео.</p>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Качество Видео</div>
          <div class="trust-desc">Проверка разрешения</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Реальное Время</div>
          <div class="trust-desc">Живое изображение</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Приватность</div>
          <div class="trust-desc">Без записи</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Бесплатно</div>
          <div class="trust-desc">Без регистрации</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Проверить Веб-камеру</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Подключите Камеру</h3>
            <p>Убедитесь что камера подключена.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Нажмите Включить</h3>
            <p>Активируйте тестирование.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Разрешите Доступ</h3>
            <p>Дайте разрешение браузеру.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Проверьте Качество</h3>
            <p>Оцените изображение.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
