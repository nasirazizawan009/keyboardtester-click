<?php
/**
 * Russian Microphone Tester - Тестер Микрофона
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тестер Микрофона - Проверка Микрофона Онлайн Бесплатно';
$pageDescription = 'Проверьте микрофон онлайн. Протестируйте уровень звука, качество записи и чувствительность микрофона.';
$pageKeywords = 'тестер микрофона, проверка микрофона, тест микрофона онлайн, проверка звука';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-tester.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-tester.php'); ?>">

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
        "name": "Как проверить микрофон?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Нажмите кнопку включения, разрешите доступ к микрофону и говорите. Вы увидите уровень громкости."
        }
      },
      {
        "@type": "Question",
        "name": "Почему микрофон не работает?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Проверьте подключение, разрешения браузера и настройки громкости микрофона в системе."
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
          <h1 id="hero-title">Тестер Микрофона</h1>
          <p class="hero-lede">Проверьте микрофон онлайн. Протестируйте уровень и качество звука.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тестер Микрофона</h2>
          <p class="section-lede">Включите микрофон и проверьте уровень звука.</p>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Уровень Звука</div>
          <div class="trust-desc">Визуализация</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Реальное Время</div>
          <div class="trust-desc">Мгновенный отклик</div>
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

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Проверить Микрофон</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Подключите Микрофон</h3>
            <p>Убедитесь что микрофон подключен.</p>
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
            <h3>4. Говорите</h3>
            <p>Смотрите уровень громкости.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
