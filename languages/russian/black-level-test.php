<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест уровня чёрного - Детектор раздавленных чёрных';
$pageDescription = 'Тест уровня чёрного монитора: проверяет, «съедает» ли экран детали теней на 32 почти-чёрных патчах. Выявляет проблемы гаммы и ограниченный RGB-диапазон.';
$pageKeywords = 'тест уровня чёрного, раздавленные чёрные';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/black-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Калибровка дисплея</p>
<h1 class="hero-title">Тест уровня чёрного - Детектор раздавленных чёрных</h1>
<p class="hero-lede">Проверьте детали теней с 32 пятнами около чёрного. Если низкие значения невидимы, монитор раздавливает чёрные.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#black-level-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/black-level-test/black-level-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест уровня чёрного" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="black-level-test"><div class="container tool-stage-header"><div><h2>Тест уровня чёрного</h2><p class="section-lede">Считайте видимые пятна 1-32.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/black-level-tool.php'; ?></section></section>
<?php $currentTool = 'black-level'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
