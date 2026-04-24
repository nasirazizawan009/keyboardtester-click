<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Генератор прицела - Crosshair для CS2 и Valorant';
$pageDescription = 'Бесплатный онлайн-генератор прицела. Создайте свой прицел с живым предпросмотром, скачайте PNG, скопируйте консольную команду CS2 или значения для Valorant.';
$pageKeywords = 'генератор прицела, crosshair, генератор crosshair cs2, генератор crosshair valorant';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">Инструменты прицела</p>
        <h1 class="hero-title">Генератор прицела - Ваш собственный Crosshair</h1>
        <p class="hero-lede">Создайте прицел с живым предпросмотром. Выберите пресет про-игрока (s1mple, TenZ) или настройте каждый параметр: форму, цвет, толщину, длину, зазор, точку и контур. Скачайте прозрачный PNG или скопируйте готовую консольную команду для CS2.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">Открыть генератор</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">Живой предпросмотр</span><span class="hero-badge">Команда CS2</span><span class="hero-badge">Значения Valorant</span><span class="hero-badge">Прозрачный PNG</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Генератор прицела</h2><p class="section-lede">Настройте параметры и экспортируйте в CS2, Valorant или PNG.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>Как применить прицел</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. Выберите пресет</h3><p>Стартуйте с пресета про и донастройте.</p></div>
        <div class="guideline-card"><h3>2. Проверьте предпросмотр</h3><p>Форма, цвет и контур в реальном времени.</p></div>
        <div class="guideline-card"><h3>3. Экспортируйте</h3><p>PNG или команда CS2.</p></div>
        <div class="guideline-card"><h3>4. Примените в игре</h3><p>Вставьте в консоль (~) или в Valorant.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
