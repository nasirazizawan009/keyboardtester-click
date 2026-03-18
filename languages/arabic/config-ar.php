<?php
/**
 * Arabic Language Configuration
 * Include this after config.php to override page URLs with Arabic versions
 */

// Override page links with Arabic versions
$pages = [
    'home' => url('languages/arabic/'),
    'mouse_test' => url('languages/arabic/mouse-test.php'),
    'mouse_trail' => url('languages/arabic/mouse-trail.php'),
    'keyboard_typing' => url('languages/arabic/typing-test.php'),
    'click_speed' => url('languages/arabic/click-speed.php'),
    'ghost_click' => url('languages/arabic/ghost-click.php'),
    'dpi_tester' => url('languages/arabic/dpi-tester.php'),
    'screen_test' => url('languages/arabic/screen-test.php'),
    'dead_pixel_test' => url('languages/arabic/dead-pixel-test.php'),
    'mic_test' => url('languages/arabic/mic-test.php'),
    'microphone_volume_test' => url('languages/arabic/microphone-volume-test.php'),
    'webcam_test' => url('languages/arabic/webcam-test.php'),
    'camera_resolution_test' => url('languages/arabic/camera-resolution-test.php'),
    'headphone_test' => url('languages/arabic/headphone-test.php'),
    'qr_generator' => url('languages/arabic/qr-generator.php'),
    'qr_reader' => url('languages/arabic/qr-reader.php'),
    'scan_qr_from_image' => url('languages/arabic/scan-qr-from-image.php'),
    'ocr_tool' => url('languages/arabic/ocr-tool.php'),
    'password_gen' => url('languages/arabic/password-generator.php'),
    'latency_check' => url('languages/arabic/latency-checker.php'),
    'about' => url('about-us.php'),
    'privacy' => url('privacy-policy.php'),
    'disclaimer' => url('disclaimer.php'),
    'feedback' => url('feedback.php'),
    'blog' => blogUrl(),
];
