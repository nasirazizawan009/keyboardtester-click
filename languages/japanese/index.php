<?php
/**
 * Japanese Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => 'ツール', 'url' => url('pages/tools.php')],
    ['label' => '日本語キーボードテスター', 'url' => '']
];

// Meta tags
$pageTitle = '日本語キーボードテスター - 無料オンラインキーボードテスト';
$pageDescription = '日本語キーボードを無料でオンラインテスト。ゴースティング検出、レイテンシー測定、固着キーの特定が可能です。';
$pageKeywords = 'キーボードテスター, キーボードテスト, ゴースティング検出, レイテンシー測定, JISキーボード';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo url('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">

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

        body {
            font-family: 'Noto Sans JP', 'Space Grotesk', sans-serif;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation -->
    <?php include __DIR__ . '/header-ja.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List -->
        <?php $currentTool = 'japanese-keyboard'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
