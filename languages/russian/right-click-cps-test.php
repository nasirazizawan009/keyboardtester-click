<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест CPS правой кнопки - Скорость правой кнопки мыши';
$pageDescription = 'Тест CPS правого клика: измеряет скорость правого клика (кликов в секунду) с отключённым контекстным меню. Идеально для геймеров и тестов свитчей, без установки.';
$pageKeywords = 'тест CPS правой кнопки, right click CPS';
?>
<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Тестер CPS правой кнопки</p>
<h1 class="hero-title">Тест CPS правой кнопки - Скорость правой кнопки мыши</h1>
<p class="hero-lede">Измерьте клики в секунду правой кнопки в сессиях 5, 10 или 30 секунд. Контекстное меню браузера отключено.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">Начать</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">Как использовать</a>
</div>
<div class="hero-badges"><span class="hero-badge">Только правый клик</span><span class="hero-badge">Пик CPS</span><span class="hero-badge">Контекстное меню выкл</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест CPS правой кнопки" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">Основной инструмент</p><h2>Тестер CPS правой кнопки</h2><p class="section-lede">Нажимайте правую кнопку в зоне как можно быстрее.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>Как использовать</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. Настройте</h3><p>Выберите длительность.</p></div>
<div class="guideline-card"><h3>2. Быстрые правые клики</h3><p>Нажимайте правую кнопку.</p></div>
<div class="guideline-card"><h3>3. Читайте результаты</h3><p>Всего, CPS, пик.</p></div>
<div class="guideline-card"><h3>4. Сравните</h3><p>Сравните с CPS левого.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
