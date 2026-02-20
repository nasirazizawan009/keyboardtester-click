<?php
/**
 * Russian OCR Tool - OCR Инструмент
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'OCR Инструмент - Распознавание Текста из Изображений Бесплатно';
$pageDescription = 'Извлеките текст из изображений с помощью OCR. Поддержка русского и английского языков. Быстро и бесплатно.';
$pageKeywords = 'OCR онлайн, распознавание текста, извлечение текста, сканирование текста, OCR русский';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
        "name": "Что такое OCR?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "OCR (Optical Character Recognition) - технология распознавания текста из изображений."
        }
      },
      {
        "@type": "Question",
        "name": "Какие языки поддерживаются?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Поддерживается распознавание русского и английского текста."
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
          <h1 id="hero-title">OCR Инструмент</h1>
          <p class="hero-lede">Извлеките текст из изображений. Поддержка русского и английского языков.</p>
          <div class="hero-ctas">
            <a href="#ocr-test" class="landing-btn landing-btn-primary">Начать</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Распознавание Текста</h2>
          <p class="section-lede">Загрузите изображение для извлечения текста.</p>
        </div>
      </div>
      <section id="ocr-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Русский Язык</div>
          <div class="trust-desc">Полная поддержка</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Быстро</div>
          <div class="trust-desc">Мгновенный результат</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Бесплатно</div>
          <div class="trust-desc">Без ограничений</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Приватно</div>
          <div class="trust-desc">Локальная обработка</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Использовать OCR</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Загрузите Изображение</h3>
            <p>Выберите файл или перетащите.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Дождитесь Обработки</h3>
            <p>OCR анализирует изображение.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Получите Текст</h3>
            <p>Скопируйте распознанный текст.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Проверьте Результат</h3>
            <p>Исправьте ошибки если нужно.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
