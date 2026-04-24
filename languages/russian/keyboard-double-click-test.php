<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест двойного нажатия клавиатуры - Детектор дребезга';
$pageDescription = 'Детектор двойного срабатывания клавиш: находит клавиши, регистрирующие два события за одно нажатие. Настраиваемый порог, полный журнал, без установки.';
$pageKeywords = 'двойное нажатие клавиатуры, детектор дребезга, key chatter';
?>
<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/keyboard-double-click-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-double-click-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">Детектор дребезга клавиатуры</p>
<h1 class="hero-title">Тест двойного нажатия клавиатуры - Детектор дребезга</h1>
<p class="hero-lede">Найдите клавиши которые регистрируются дважды от одного нажатия. Настраиваемый порог 30-150мс с статистикой по каждой клавише.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#keyboard-double-click-test">Начать</a></div>
<div class="hero-badges"><span class="hero-badge">Настраиваемый порог</span><span class="hero-badge">Статистика по клавишам</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/keyboard-double-click-test/keyboard-double-click-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест дребезга клавиатуры" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="keyboard-double-click-test"><div class="container tool-stage-header"><div><h2>Детектор дребезга клавиатуры</h2><p class="section-lede">Нажмите каждую клавишу один раз. Дребезжащие клавиши появятся ниже.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/keyboard-double-click-tool.php'; ?></section></section>
<?php $currentTool = 'keyboard-double-click'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
