<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/tools.php')],
    ['label' => 'Keyboard Tools', 'url' => '']
];

$pageTitle = 'Keyboard Tools - Online Keyboard Testing Suite';
$pageDescription = 'Explore keyboard testing tools: keyboard tester, typing speed test, and latency checker.';
$pageKeywords = 'keyboard tools, keyboard tester, typing test, latency checker';

$tools = [
    [
        'title' => 'Keyboard Tester',
        'url' => url('tools/keyboard-tester/'),
        'desc' => 'Test every key, detect ghosting, and verify keyboard response in real time.'
    ],
    [
        'title' => 'Typing Speed Test',
        'url' => url('keyboard_typing_test.php'),
        'desc' => 'Measure WPM, accuracy, and typing consistency with quick tests.'
    ],
    [
        'title' => 'Latency Checker',
        'url' => url('latency-checker.php'),
        'desc' => 'Check input delay and responsiveness for keyboards and devices.'
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
                <h1>Keyboard Tools</h1>
                <p>Find the right keyboard testing tool for responsiveness, accuracy, and typing speed.</p>
                <div class="category-actions">
                    <a class="btn btn-primary" href="<?php echo url('pages/tools.php'); ?>">All tools</a>
                    <a class="btn btn-secondary" href="<?php echo url('keyboard_tester_different_languages.php'); ?>">Language keyboards</a>
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
