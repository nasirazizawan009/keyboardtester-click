<?php
/**
 * Russian Mouse Trail - След Мыши
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

$pageTitle = 'След Мыши - Визуальные Эффекты Курсора Бесплатно';
$pageDescription = 'Создайте красивый след за курсором мыши. Выберите эффекты: искры, огонь, звезды, радуга и другие.';
$pageKeywords = 'след мыши, эффект курсора, визуальные эффекты, mouse trail, анимация курсора';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo url('languages/russian/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ru.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">След Мыши</h1>
          <p class="hero-lede">Создайте красивые визуальные эффекты за курсором мыши.</p>
          <div class="hero-ctas">
            <a href="#trail-tool" class="landing-btn landing-btn-primary">Попробовать</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">Как Использовать</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Основной Инструмент</p>
          <h2 id="tool-stage-title">След Мыши</h2>
          <p class="section-lede">Выберите эффект и двигайте мышью.</p>
        </div>
      </div>
      <section id="trail-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Основные функции">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Много Эффектов</div>
          <div class="trust-desc">10+ стилей</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Плавная Анимация</div>
          <div class="trust-desc">60 FPS</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Настройка</div>
          <div class="trust-desc">Выбор эффекта</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Бесплатно</div>
          <div class="trust-desc">Без ограничений</div>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-ru.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Руководство</p>
          <h2>Как Использовать След Мыши</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. Выберите Эффект</h3>
            <p>Кликните на кнопку с эффектом.</p>
          </div>
          <div class="guideline-card">
            <h3>2. Двигайте Мышь</h3>
            <p>Перемещайте курсор по области.</p>
          </div>
          <div class="guideline-card">
            <h3>3. Экспериментируйте</h3>
            <p>Попробуйте разные стили.</p>
          </div>
          <div class="guideline-card">
            <h3>4. Наслаждайтесь</h3>
            <p>Красивые эффекты для развлечения.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
