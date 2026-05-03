<?php
/**
 * Russian Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ru.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'Инструменты', 'url' => url('pages/all-tools-ru.php')],
    ['label' => 'Тестер Русской Клавиатуры', 'url' => '']
];

// Meta tags
$pageTitle = 'Проверка клавиатуры онлайн — тест задержки, ghosting и залипающих клавиш | KeyboardTester.click';
$pageDescription = 'Бесплатная онлайн проверка клавиатуры. Проверка отклика клавиатуры, тест задержки в миллисекундах, обнаружение ghosting и N-key rollover, проверка залипающих клавиш. Работает с механическими, мембранными и беспроводными клавиатурами. Без установки.';
$pageKeywords = 'проверка клавиатуры, проверка отклика клавиатуры, тест задержки клавиатуры, тест клавиатуры, тестер клавиатуры онлайн, проверка клавиш, тест задержки в миллисекундах, проверка клавиатуры на ghosting, тест ghosting клавиатуры, проверка механической клавиатуры';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>

    <!-- Index Modern CSS -->
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <!-- Page Styles -->
    <style>
        :root {
            --surface: #1e293b;
            --border: rgba(148, 163, 184, 0.2);
            --text-muted: #94a3b8;
            --text-secondary: #cbd5e1;
            --accent-primary: #00d4ff;
            --accent-secondary: #0ea5e9;
        }

        html:not(.dark-theme),
        [data-theme="light"] {
            --surface: #ffffff;
            --border: rgba(0, 0, 0, 0.1);
            --text-muted: #64748b;
            --text-secondary: #475569;
            --accent-primary: #0099cc;
            --accent-secondary: #0077aa;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation -->
    <?php include __DIR__ . '/header-ru.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List -->
        <?php $currentTool = 'russian-keyboard'; include __DIR__ . '/sections/tools-list-ru.php'; ?>
        <?php $localizedHubLanguage = 'russian'; include __DIR__ . '/../../includes/components/localized-hub-discovery.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-ru.php'; ?>
</body>
</html>
