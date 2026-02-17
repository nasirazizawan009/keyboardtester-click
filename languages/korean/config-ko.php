<?php
/**
 * Korean Language Configuration
 * Include this after config.php to override page URLs with Korean versions
 */

// Override page links with Korean versions
$pages = [
    'home' => url('languages/korean/'),
    'mouse_test' => url('languages/korean/mouse-test.php'),
    'mouse_trail' => url('languages/korean/mouse-trail.php'),
    'keyboard_typing' => url('languages/korean/typing-test.php'),
    'click_speed' => url('languages/korean/click-speed.php'),
    'ghost_click' => url('languages/korean/ghost-click.php'),
    'dpi_tester' => url('languages/korean/dpi-tester.php'),
    'screen_test' => url('languages/korean/screen-test.php'),
    'mic_test' => url('languages/korean/mic-test.php'),
    'webcam_test' => url('languages/korean/webcam-test.php'),
    'headphone_test' => url('languages/korean/headphone-test.php'),
    'qr_generator' => url('languages/korean/qr-generator.php'),
    'qr_reader' => url('languages/korean/qr-reader.php'),
    'ocr_tool' => url('languages/korean/ocr-tool.php'),
    'password_gen' => url('languages/korean/password-generator.php'),
    'latency_check' => url('languages/korean/latency-checker.php'),
    'about' => url('about-us.php'),  // Keep English for now
    'privacy' => url('privacy-policy.php'),  // Keep English for now
    'disclaimer' => url('disclaimer.php'),
    'feedback' => url('feedback.php'),
    'blog' => blogUrl(),
];
