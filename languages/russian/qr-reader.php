<?php
/**
 * Russian QR Code Reader - Сканер QR-кода
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Сканер QR-кода - Чтение QR-кодов Онлайн Бесплатно';
$pageDescription = 'Сканируйте и читайте QR-коды онлайн. Загрузите изображение или используйте камеру. Быстро и бесплатно.';
$pageKeywords = 'сканер QR-кода, читать QR-код, QR scanner онлайн, декодировать QR';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-code-reader.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-code-reader.php'); ?>">

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
        "name": "Как сканировать QR-код?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Загрузите изображение с QR-кодом или используйте камеру для сканирования."
        }
      },
      {
        "@type": "Question",
        "name": "Какие форматы поддерживаются?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Поддерживаются все популярные форматы изображений: PNG, JPG, GIF, BMP."
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
          <h1 id="hero-title">Сканер QR-кода</h1>
          <p class="hero-lede">Сканируйте QR-коды из изображений или с помощью камеры.</p>
          <div class="hero-ctas">
            <a href="#qr-scanner" class="landing-btn landing-btn-primary">Сканировать</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Сканер QR-кода</h2>
          <p class="section-lede">Загрузите изображение для декодирования.</p>
        </div>
      </div>
      <section id="qr-scanner" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Загрузка Файла</div>
          <div class="trust-desc">PNG, JPG, GIF</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Камера</div>
          <div class="trust-desc">Живое сканирование</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Мгновенно</div>
          <div class="trust-desc">Быстрый результат</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Копирование</div>
          <div class="trust-desc">Одним кликом</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Сканировать QR-код</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Загрузите Изображение</h3>
            <p>Или используйте камеру.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Дождитесь Сканирования</h3>
            <p>Автоматическое распознавание.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Получите Результат</h3>
            <p>Текст или ссылка из QR-кода.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Скопируйте</h3>
            <p>Или перейдите по ссылке.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
