<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/tools.php')],
    ['label' => 'Language Keyboards', 'url' => '']
];

$pageTitle = 'Language Keyboard Tools';
$pageDescription = 'Access keyboard testers for Arabic, Russian, Spanish, French, Portuguese, Japanese, German, and Korean layouts.';
$pageKeywords = 'language keyboard tester, arabic keyboard, russian keyboard, spanish keyboard, french keyboard';

$tools = [
    [
        'title' => 'Arabic Keyboard Tester',
        'url' => url('languages/arabic/'),
        'desc' => 'Test Arabic keyboard layout and key response.'
    ],
    [
        'title' => 'Russian Keyboard Tester',
        'url' => url('languages/russian/'),
        'desc' => 'Test Russian keyboard layout and key response.'
    ],
    [
        'title' => 'Spanish Keyboard Tester',
        'url' => url('languages/spanish/'),
        'desc' => 'Test Spanish keyboard layout and key response.'
    ],
    [
        'title' => 'French Keyboard Tester',
        'url' => url('languages/french/'),
        'desc' => 'Test French keyboard layout and key response.'
    ],
    [
        'title' => 'Portuguese Keyboard Tester',
        'url' => url('languages/portuguese/'),
        'desc' => 'Test Portuguese keyboard layout and key response.'
    ],
    [
        'title' => 'Japanese Keyboard Tester',
        'url' => url('languages/japanese/'),
        'desc' => 'Test Japanese keyboard layout and key response.'
    ],
    [
        'title' => 'German Keyboard Tester',
        'url' => url('languages/german/'),
        'desc' => 'Test German keyboard layout and key response.'
    ],
    [
        'title' => 'Korean Keyboard Tester',
        'url' => url('languages/korean/'),
        'desc' => 'Test Korean keyboard layout and key response.'
    ],
    [
        'title' => 'All Language Keyboards',
        'url' => url('keyboard_tester_different_languages.php'),
        'desc' => 'Compare and explore all language keyboard layouts.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo url('assets/css/category-pages.css'); ?>">
</head>
<body>
    <?php include __DIR__ . '/../header.php'; ?>
    <?php include __DIR__ . '/../includes/components/breadcrumbs.php'; ?>

    <main class="category-page">
        <section class="category-hero">
            <div class="container">
                <div class="eyebrow">Category</div>
                <h1>Language Keyboards</h1>
                <p>Switch layouts fast and test key response across multiple languages.</p>
                <div class="category-actions">
                    <a class="btn btn-primary" href="<?php echo url('pages/tools.php'); ?>">All tools</a>
                    <a class="btn btn-secondary" href="<?php echo url('tools/keyboard-tester/'); ?>">Keyboard tester</a>
                </div>
            </div>
        </section>

        <section class="category-section">
            <div class="container">
                <div class="category-grid">
                    <?php foreach ($tools as $tool): ?>
                        <a class="category-card" href="<?php echo $tool['url']; ?>">
                            <h2><?php echo htmlspecialchars($tool['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                            <p><?php echo htmlspecialchars($tool['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <span class="card-link">Open tool</span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
