<?php
/**
 * Korean Keyboard Tester - Main Page
 * Structure: Header -> Brief Intro -> Tool -> Tools List -> Guidelines -> Footer
 */

include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

// Breadcrumbs
$breadcrumbs = [
    ['label' => '도구', 'url' => url('pages/all-tools-ko.php')],
    ['label' => '한국어 키보드 테스터', 'url' => '']
];

// Meta tags
$pageTitle = '키보드 테스트 — 온라인 한글 키보드 테스터, 고스팅·지연시간 검사 무료 | KeyboardTester.click';
$pageDescription = '온라인 키보드 테스트 무료 도구. 모든 키를 테스트하고 고스팅, N-키 롤오버, 키보드 지연시간을 측정하세요. 한글 두벌식·세벌식 키보드, 기계식·멤브레인·노트북 키보드 모두 지원. 설치 불필요.';
$pageKeywords = '키보드 테스트, 키보드 테스터, 온라인 키보드 테스트, 한글 키보드 테스트, 키보드 검사, 키보드 입력 테스트, 키보드 지연시간 테스트, 키보드 딜레이 테스트, 키보드 고스팅 테스트, 두벌식 키보드, 세벌식 키보드, 기계식 키보드 테스트';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>

    <!-- Language alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">
    <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('tools/keyboard-tester/'); ?>">

    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Landing Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&family=Noto+Sans+KR:wght@400;500;600;700&display=swap" rel="stylesheet">

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
            font-family: 'Noto Sans KR', 'Space Grotesk', sans-serif;
        }
    </style>
</head>
<body class="landing-page">
    <!-- Header Navigation -->
    <?php include __DIR__ . '/header-ko.php'; ?>

    <!-- Main Content -->
    <main id="main-content" class="landing-main">
        <!-- Hero Section (includes tool-stage) -->
        <?php include __DIR__ . '/sections/hero.php'; ?>

        <!-- Tools List -->
        <?php $currentTool = 'korean-keyboard'; include __DIR__ . '/sections/tools-list-ko.php'; ?>
        <?php $localizedHubLanguage = 'korean'; include __DIR__ . '/../../includes/components/localized-hub-discovery.php'; ?>

        <!-- Guidelines & Help -->
        <?php include __DIR__ . '/sections/guidelines.php'; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
