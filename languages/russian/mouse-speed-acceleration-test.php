<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест ускорения мыши - Медленный vs Быстрый свайп';
$pageDescription = 'Бесплатный онлайн-тест ускорения мыши. Сравните пиксельное перемещение при медленном и быстром свайпе, чтобы обнаружить ускорение указателя Windows или прошивки сенсора.';
$pageKeywords = 'тест ускорения мыши, ускорение указателя windows, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Диагностика мыши</p>
        <h1 class="hero-title">Тест ускорения мыши</h1>
        <p class="hero-lede">Windows или прошивка мыши незаметно добавляют ускорение, ломая консистентность прицела? Проведите одинаковое физическое расстояние медленно и быстро — если пиксели растут со скоростью, ускорение активно. Инструмент показывает точный коэффициент быстрый/медленный.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">Запустить тест</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">По пикселю</span><span class="hero-badge">Вердикт по коэффициенту</span><span class="hero-badge">Без установки</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Тест ускорения мыши</h2><p class="section-lede">Медленно, затем быстро — одинаковое расстояние.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Как обнаружить ускорение</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Медленный свайп</h3><p>Около 2 секунд.</p></div>
        <div class="guideline-card"><h3>2. Быстрый свайп</h3><p>То же расстояние, менее 0,5 с.</p></div>
        <div class="guideline-card"><h3>3. Проверьте коэффициент</h3><p>1,00 = идеал, &gt;1,15 = ускорение.</p></div>
        <div class="guideline-card"><h3>4. Отключите</h3><p>"Повышенная точность установки указателя".</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
