<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест дрейфа мыши - Обнаружение джиттера сенсора';
$pageDescription = 'Тест дрейфа мыши: определяет смещение курсора в покое и джиттер сенсора за 10 секунд – 3 минуты с вердиктом pass/fail. Для ценителей точности, без установки.';
$pageKeywords = 'тест дрейфа мыши, дрейф курсора, джиттер сенсора, mouse drift test';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Диагностика мыши</p>
        <h1 class="hero-title">Тест дрейфа мыши - Джиттер сенсора</h1>
        <p class="hero-lede">Курсор ползёт, когда вы не касаетесь мыши? Тест дрейфа выбирает каждое событие указателя в течение 10-180 секунд и показывает общий дрейф, крупнейший скачок и вердикт прошёл/не прошёл.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">Запустить тест</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">По пикселю</span><span class="hero-badge">10с - 3 мин</span><span class="hero-badge">Вердикт</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Тест дрейфа мыши</h2><p class="section-lede">Оставьте мышь в покое и нажмите Старт.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Как обнаружить дрейф</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Уберите руку</h3><p>Не трогайте мышь.</p></div>
        <div class="guideline-card"><h3>2. Запустите</h3><p>Выберите длительность.</p></div>
        <div class="guideline-card"><h3>3. Прочтите вердикт</h3><p>0 px = идеал, &lt;5 = норма.</p></div>
        <div class="guideline-card"><h3>4. Исправьте</h3><p>Настоящий коврик, без ускорения.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
