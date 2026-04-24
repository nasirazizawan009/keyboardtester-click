<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест яркости монитора - 11-ступенчатая лестница калибровки';
$pageDescription = 'Тест яркости монитора: 11-ступенчатая лестница градаций серого выявляет проблемы яркости, контраста и гаммы. Быстрый визуальный инструмент калибровки в браузере.';
$pageKeywords = 'тест яркости монитора, калибровка яркости';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Калибровка дисплея</p>
<h1 class="hero-title">Тест яркости монитора - 11-ступенчатая лестница калибровки</h1>
<p class="hero-lede">Проверьте, отображает ли монитор равномерную прогрессию от чёрного к белому. 11 ступеней с шагом 10% выявят неправильную настройку.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест яркости монитора" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>Тест яркости монитора</h2><p class="section-lede">11 ступеней от чёрного к белому. Все различны = здоровый.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
