<?php
/**
 * Russian Typing Speed Test - Тест Скорости Печати
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'Тест Скорости Печати - Проверка СВМ Онлайн Бесплатно';
$pageDescription = 'Измерьте скорость печати в символах в минуту (СВМ). Улучшите навыки печати с тестами разной сложности.';
$pageKeywords = 'тест скорости печати, скорость печати, СВМ тест, typing test, проверка печати';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

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
        "name": "Что такое СВМ?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "СВМ означает Символов В Минуту. Это стандартная мера скорости печати."
        }
      },
      {
        "@type": "Question",
        "name": "Какая хорошая скорость печати?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Средняя скорость 40-50 СВМ. Профессиональные машинистки печатают 70-100 СВМ."
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
          <h1 id="hero-title">Тест Скорости Печати</h1>
          <p class="hero-lede">Измерьте скорость печати и улучшите навыки с практикой.</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">Начать Тест</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">Тест Скорости Печати</h2>
          <p class="section-lede">Выберите сложность и начните печатать.</p>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Измерение СВМ</div>
          <div class="trust-desc">Символов в минуту</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Точность</div>
          <div class="trust-desc">Процент правильных</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">3 Уровня</div>
          <div class="trust-desc">Легкий, Средний, Сложный</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Таймер</div>
          <div class="trust-desc">30с, 1м, 2м</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Улучшить Скорость Печати</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Правильная Позиция</h3>
            <p>Руки на домашнем ряду.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Не Смотрите</h3>
            <p>Печатайте вслепую.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Точность Важнее</h3>
            <p>Сначала точность, потом скорость.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Практикуйтесь</h3>
            <p>Регулярные тренировки.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
