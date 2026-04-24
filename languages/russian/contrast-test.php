<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест контраста монитора - Калибровка по шахматной доске';
$pageDescription = 'Тест контраста монитора: шахматный паттерн рядом с 50%-серым выявляет проблемы контраста и гаммы. Идеально для быстрой визуальной настройки, без спецоборудования.';
$pageKeywords = 'тест контраста монитора, калибровка контраста';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Калибровка дисплея</p>
<h1 class="hero-title">Тест контраста монитора - Калибровка по шахматной доске</h1>
<p class="hero-lede">Проверьте калибровку контраста с черно-белой шахматной доской рядом с 50% серым. Среднее по шахматке должно совпадать с серым при прищуривании.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест контраста монитора" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>Тест контраста монитора</h2><p class="section-lede">Прищурьтесь. Шахматка должна выглядеть как серый.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
