<?php
include __DIR__ . '/../config.php';

$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/tools.php')],
    ['label' => 'Audio & Video Tools', 'url' => '']
];

$pageTitle = 'Audio and Video Testing Tools';
$pageDescription = 'Check screens, webcams, microphones, and speakers with fast online diagnostics.';
$pageKeywords = 'audio tools, video tools, screen test, webcam test, mic test, speaker test';

$tools = [
    [
        'title' => 'Screen Tester',
        'url' => url('screentestindex.php'),
        'desc' => 'Detect dead pixels, color issues, and display defects.'
    ],
    [
        'title' => 'Webcam Tester',
        'url' => url('webcamtesterindex.php'),
        'desc' => 'Verify webcam quality, resolution, and video feed.'
    ],
    [
        'title' => 'Mic Tester',
        'url' => url('mic-tester.php'),
        'desc' => 'Check microphone input levels and clarity.'
    ],
    [
        'title' => 'Headphone / Speaker Tester',
        'url' => url('headphone_speaker_tester_index.php'),
        'desc' => 'Test stereo output and audio balance.'
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
                <h1>Audio & Video Tools</h1>
                <p>Test your screen, webcam, microphone, and speakers in minutes.</p>
                <div class="category-actions">
                    <a class="btn btn-primary" href="<?php echo url('pages/tools.php'); ?>">All tools</a>
                    <a class="btn btn-secondary" href="<?php echo url('mouse-test.php'); ?>">Mouse tester</a>
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
