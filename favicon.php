<?php
if (!function_exists('url')) {
    include_once __DIR__ . '/config.php';
}

$faviconPath = url('navigation.png');
?>
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $faviconPath; ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $faviconPath; ?>">
<link rel="apple-touch-icon" href="<?php echo $faviconPath; ?>">
<link rel="shortcut icon" href="<?php echo $faviconPath; ?>">
