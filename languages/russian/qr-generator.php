<?php
/**
 * Russian QR Code Generator - Генератор QR-кода
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Генератор QR-кода - Создать QR-код Онлайн Бесплатно';
$pageDescription = 'Создайте QR-код для текста, ссылки или контактов. Скачайте в PNG формате. Быстро и бесплатно.';
$pageKeywords = 'генератор QR-кода, создать QR-код, QR онлайн, QR code generator';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('QR_code_generator_scanner.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('QR_code_generator_scanner.php'); ?>">

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
        "name": "Как создать QR-код?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Введите текст или ссылку, нажмите создать и скачайте готовый QR-код."
        }
      },
      {
        "@type": "Question",
        "name": "В каком формате скачивается QR-код?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "QR-код скачивается в формате PNG с высоким разрешением."
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
          <h1 id="hero-title">Генератор QR-кода</h1>
          <p class="hero-lede">Создайте QR-код для текста, ссылки или любой информации.</p>
          <div class="hero-ctas">
            <a href="#qr-tool" class="landing-btn landing-btn-primary">Создать QR-код</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Генератор QR-кода</h2>
          <p class="section-lede">Введите данные и создайте QR-код.</p>
        </div>
      </div>
      <section id="qr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Любой Контент</div>
          <div class="trust-desc">Текст, ссылки, контакты</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">PNG Формат</div>
          <div class="trust-desc">Высокое качество</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Мгновенно</div>
          <div class="trust-desc">Создание за секунду</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Бесплатно</div>
          <div class="trust-desc">Без ограничений</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Создать QR-код</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Введите Данные</h3>
            <p>Текст, ссылку или информацию.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Нажмите Создать</h3>
            <p>Генерация происходит мгновенно.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Проверьте Результат</h3>
            <p>Просмотрите предварительный вид.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Скачайте</h3>
            <p>Сохраните PNG файл.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
