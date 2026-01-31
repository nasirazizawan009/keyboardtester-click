<?php
/**
 * Russian Keyboard Tester - Main Page
 */

include __DIR__ . '/../../config.php';

$pageTitle = 'Онлайн-тестер клавиатуры - Проверьте свою клавиатуру';
$pageDescription = 'Бесплатный онлайн-тестер клавиатуры. Обнаруживайте эффект привидения, измеряйте время отклика, проверяйте застревающие клавиши.';
?>

<!DOCTYPE html>
<html lang="ru">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>
    
    <!-- Language Alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo $baseUrl; ?>/tools/keyboard-tester/">
    <link rel="alternate" hreflang="ar" href="<?php echo $baseUrl; ?>/languages/arabic/">
    <link rel="alternate" hreflang="es" href="<?php echo $baseUrl; ?>/languages/spanish/">
    <link rel="alternate" hreflang="x-default" href="<?php echo $baseUrl; ?>/tools/keyboard-tester/">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/keyboard-tool.css">
</head>
<body>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    
    <?php 
    $breadcrumbs = [
        ['label' => 'Инструменты', 'url' => $baseUrl . '/pages/tools.php'],
        ['label' => 'Языки', 'url' => ''],
        ['label' => 'Русский', 'url' => '']
    ];
    include __DIR__ . '/../../includes/components/breadcrumbs.php'; 
    ?>
    
    <section class="seo-hero keyboard-tester-hero">
        <div class="container">
            <h1 class="hero-title">Бесплатный онлайн-тестер клавиатуры</h1>
            <p class="hero-description">Проверьте клавиатуру, обнаружьте проблемы и убедитесь в идеальной производительности</p>
            <div class="hero-cta">
                <button class="btn btn-primary" onclick="document.getElementById('keyboard-tester').scrollIntoView({behavior: 'smooth'})">
                    ⌨️ Начать тест
                </button>
            </div>
        </div>
    </section>
    
    <main class="tool-main-container">
        <?php include __DIR__ . '/../../tools/keyboard_tester_english.php'; ?>
        <?php $currentTool = 'keyboard-tester'; include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    </main>
    
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
    
    <style>
        .tool-main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }
    </style>
</body>
</html>


