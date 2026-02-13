<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/tools.php')],
    ['label' => 'Mouse Tools', 'url' => '']
];

$pageTitle = 'Mouse Tools - Click, Speed, and DPI Testing';
$pageDescription = 'Test mouse buttons, scroll wheel, speed, sensitivity, and cursor tracking with free online tools.';
$pageKeywords = 'mouse tools, mouse test, click speed, dpi test, mouse trail';

$tools = [
    [
        'title' => 'Mouse Tester',
        'url' => url('mouse-test.php'),
        'desc' => 'Check mouse buttons, scroll wheel, and click accuracy.'
    ],
    [
        'title' => 'Mouse Speed Tester',
        'url' => url('mouse_speed_tester.php'),
        'desc' => 'Measure your click speed in CPS or CPM with timed tests.'
    ],
    [
        'title' => 'Mouse Sensitivity / DPI',
        'url' => url('mouse_sensitivity_DPI_tester.php'),
        'desc' => 'Test DPI, tracking, and sensitivity for gaming or work.'
    ],
    [
        'title' => 'Mouse Trail',
        'url' => url('mouse-trail.php'),
        'desc' => 'Visualize mouse movement trails for precision testing.'
    ],
    [
        'title' => 'Ghost Click Detector',
        'url' => url('ghost-click-detector.php'),
        'desc' => 'Detect unintended or phantom mouse clicks.'
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
                <h1>Mouse Tools</h1>
                <p>Test mouse buttons, speed, sensitivity, and tracking with focused tools.</p>
                <div class="category-actions">
                    <a class="btn btn-primary" href="<?php echo url('pages/tools.php'); ?>">All tools</a>
                    <a class="btn btn-secondary" href="<?php echo url('keyboard_typing_test.php'); ?>">Typing test</a>
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
