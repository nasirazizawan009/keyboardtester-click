<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест гаммы монитора - Калибровка sRGB 2.2';
$pageDescription = 'Тест гаммы монитора: измеряйте гамму визуально с помощью классического паттерна смешения линий, цель sRGB 2.2. Быстрая настройка без колориметра и доп. ПО.';
$pageKeywords = 'тест гаммы монитора, калибровка гаммы, sRGB 2.2';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/monitor-gamma-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-gamma-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Калибровка монитора</p>
<h1 class="hero-title">Тест гаммы монитора - Калибровка sRGB 2.2</h1>
<p class="hero-lede">Визуальная проверка калибровки гаммы через узор смешения полос. Подгоняйте ползунок пока полосы не сольются с серым.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-gamma-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-gamma-test/monitor-gamma-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест гаммы монитора" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-gamma-test"><div class="container tool-stage-header"><div><h2>Тест гаммы монитора</h2><p class="section-lede">Подгоняйте ползунок пока полосы не сольются.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-gamma-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-gamma'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
