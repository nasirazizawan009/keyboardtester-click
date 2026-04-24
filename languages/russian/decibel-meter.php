<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Шумомер dB онлайн - Живое измерение dB SPL через микрофон';
$pageDescription = 'Онлайн-шумомер через микрофон: живое отображение dB SPL, отслеживание пиков и скользящее среднее по 100 семплам. Измеряет фоновый шум, без установки приложений.';
$pageKeywords = 'шумомер dB, измеритель децибел, dB meter';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/decibel-meter.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('decibel-meter.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Аудио диагностика</p>
<h1 class="hero-title">Шумомер dB онлайн - Живое измерение dB SPL через микрофон</h1>
<p class="hero-lede">Измерьте уровни шума окружающей среды через микрофон вашего устройства. Живые показания dB, пик и среднее.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#decibel-meter">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/decibel-meter/decibel-meter-hero.jpg'); ?>" width="1280" height="720" alt="Шумомер dB" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="decibel-meter"><div class="container tool-stage-header"><div><h2>Шумомер dB</h2><p class="section-lede">Нажмите Начать и разрешите доступ к микрофону.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/decibel-meter-tool.php'; ?></section></section>
<?php $currentTool = 'decibel-meter'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
