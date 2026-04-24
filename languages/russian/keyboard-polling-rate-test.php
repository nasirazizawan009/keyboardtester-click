<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест частоты опроса клавиатуры - Оценщик USB Hz';
$pageDescription = 'Измерьте частоту опроса (polling rate в Гц) клавиатуры через тайминг автоповтора. Определяет 125, 500, 1000 Гц и выше, без драйверов и установки.';
$pageKeywords = 'тест polling клавиатуры, клавиатура Hz';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/keyboard-polling-rate-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-polling-rate-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Тест polling клавиатуры</p>
<h1 class="hero-title">Тест частоты опроса клавиатуры - Оценщик USB Hz</h1>
<p class="hero-lede">Оцените Hz клавиатуры через измерение auto-repeat браузера. Удерживайте клавишу для просмотра интервала и оценочной частоты.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-polling-rate-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-polling-rate-test/keyboard-polling-rate-test-hero.jpg'); ?>" width="1280" height="720" alt="Polling клавиатуры" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-polling-rate-test"><div class="container tool-stage-header"><div><h2>Тест polling клавиатуры</h2><p class="section-lede">Удерживайте клавишу 3+ секунд.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-polling-rate-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-polling-rate'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
