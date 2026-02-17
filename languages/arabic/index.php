<?php
/**
 * Arabic Keyboard Tester - Main Page
 * Structure: Header → Brief Intro → Tool → Tools List → Guidelines → Footer
 */

include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'الأدوات', 'url' => url('pages/tools.php')],
    ['label' => 'اختبار لوحة المفاتيح العربية', 'url' => '']
];

// Meta tags
$pageTitle = 'اختبار لوحة المفاتيح العربية - اختبر لوحة المفاتيح مجاناً';
$pageDescription = 'اختبر لوحة المفاتيح العربية مجاناً عبر الإنترنت. اكتشف مشاكل الأشباح، قس زمن الاستجابة، وحدد المفاتيح العالقة.';
$pageKeywords = 'اختبار لوحة المفاتيح, اختبار الكيبورد العربي, كشف الأشباح, قياس زمن الاستجابة';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo url('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="ar" href="<?php echo url('languages/arabic/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Arabic Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Landing Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Index Modern CSS -->
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <!-- Page Styles -->
    <style>
        /* CSS Variables */
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

        /* Arabic font for body */
        body {
            font-family: 'Tajawal', 'Inter', -apple-system, sans-serif;
        }

        /* Keep header/footer LTR */
        .site-header,
        .site-footer {
            direction: ltr;
            text-align: left;
        }

        /* RTL content wrapper */
        .arabic-page {
            direction: rtl;
            text-align: right;
        }

        /* Breadcrumbs */
        .arabic-page .breadcrumbs {
            direction: rtl;
        }

        .arabic-page .breadcrumbs .container {
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .arabic-page .breadcrumbs .separator {
            transform: scaleX(-1);
        }

        /* Tools list - RTL for Arabic content */
        .arabic-page .tools-list-section {
            direction: rtl;
            text-align: right;
        }

        .arabic-page .tools-list-section h2,
        .arabic-page .tools-list-section .section-subtitle {
            text-align: right;
        }

        .arabic-page .tools-list-section .language-note {
            text-align: right;
        }

        /* Main container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation (Arabic) -->
    <?php include __DIR__ . '/header-ar.php'; ?>

    <!-- Arabic Content -->
    <main id="main-content" class="landing-main arabic-page">
        <!-- Hero Section (includes Tool Stage) -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List (Arabic) -->
        <?php $currentTool = 'arabic-keyboard'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer (Arabic) -->
    <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
