<?php
/**
 * Spanish Keyboard Tester - Main Page
 */

include __DIR__ . '/../../config.php';

$pageTitle = 'Probador de Teclado en Línea - Prueba tu Teclado';
$pageDescription = 'Prueba gratuita de teclado en línea. Detecta teclas pegadas, mide tiempo de respuesta, identifica problemas de ghosting.';
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>
    
    <link rel="alternate" hreflang="en" href="<?php echo $baseUrl; ?>/tools/keyboard-tester/">
    <link rel="alternate" hreflang="es" href="<?php echo $baseUrl; ?>/languages/spanish/">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/keyboard-tool.css">
</head>
<body>
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    
    <?php 
    $breadcrumbs = [
        ['label' => 'Herramientas', 'url' => $baseUrl . '/pages/tools.php'],
        ['label' => 'Idiomas', 'url' => ''],
        ['label' => 'Español', 'url' => '']
    ];
    include __DIR__ . '/../../includes/components/breadcrumbs.php'; 
    ?>
    
    <section class="seo-hero keyboard-tester-hero">
        <div class="container">
            <h1 class="hero-title">Probador de Teclado en Línea Gratuito</h1>
            <p class="hero-description">Prueba tu teclado, detecta problemas y asegúrate de que funciona perfectamente</p>
            <div class="hero-cta">
                <button class="btn btn-primary" onclick="document.getElementById('keyboard-tester').scrollIntoView({behavior: 'smooth'})">
                    ⌨️ Comenzar Prueba
                </button>
            </div>
        </div>
    </section>
    
    <main class="tool-main-container">
        <?php include __DIR__ . '/../../tools/keyboard_tester_english.php'; ?>
        <?php $currentTool = 'keyboard-tester'; include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    </main>
    
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>


