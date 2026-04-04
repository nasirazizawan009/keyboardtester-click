<?php
/**
 * Related Tools Component
 * Displays 4-6 contextually related tools based on current page
 * Improves internal linking and SEO authority flow
 */

if (!function_exists('url')) {
    require_once __DIR__ . '/../config.php';
}

// Define all tools with SEO-optimized data
$allTools = [
    'keyboard' => [
        'url' => '',
        'name' => 'Keyboard Tester',
        'anchor' => 'test keyboard keys online',
        'description' => 'Verify all keys work, detect ghosting, and measure input latency with our free keyboard tester.',
        'category' => ['input', 'gaming', 'productivity']
    ],
    'mouse' => [
        'url' => 'mouse-test.php',
        'name' => 'Mouse Tester',
        'anchor' => 'test mouse buttons and scroll',
        'description' => 'Check left, right, and middle clicks plus scroll wheel functionality in real time.',
        'category' => ['input', 'gaming', 'mouse']
    ],
    'ghost-click' => [
        'url' => 'ghost-click-detector.php',
        'name' => 'Ghost Click Detector',
        'anchor' => 'detect phantom mouse clicks',
        'description' => 'Identify double-click issues and unintended phantom clicks caused by faulty switches.',
        'category' => ['mouse', 'troubleshooting', 'gaming']
    ],
    'dpi' => [
        'url' => 'mouse_sensitivity_DPI_tester.php',
        'name' => 'Mouse DPI Tester',
        'anchor' => 'check mouse DPI and sensitivity',
        'description' => 'Measure actual DPI, test tracking accuracy, and find optimal sensitivity settings.',
        'category' => ['mouse', 'gaming', 'precision']
    ],
    'cps' => [
        'url' => 'mouse_speed_tester.php',
        'name' => 'Click Speed Test',
        'anchor' => 'measure clicks per second',
        'description' => 'Test your CPS with timed click challenges. Perfect for Minecraft PvP and competitive gaming.',
        'category' => ['mouse', 'gaming', 'speed']
    ],
    'mouse-trail' => [
        'url' => 'mouse-trail.php',
        'name' => 'Mouse Trail Test',
        'anchor' => 'visualize mouse movement',
        'description' => 'Track cursor movement patterns and test mouse precision with visual trails.',
        'category' => ['mouse', 'precision', 'visual']
    ],
    'mic' => [
        'url' => 'mic-tester.php',
        'name' => 'Microphone Tester',
        'anchor' => 'test microphone input online',
        'description' => 'Check if your mic works, measure input levels, and diagnose audio quality issues.',
        'category' => ['audio', 'communication', 'streaming']
    ],
    'headphone' => [
        'url' => 'headphone_speaker_tester_index.php',
        'name' => 'Headphone & Speaker Test',
        'anchor' => 'test audio output channels',
        'description' => 'Verify left/right stereo channels and test speaker output quality.',
        'category' => ['audio', 'output']
    ],
    'typing' => [
        'url' => 'keyboard_typing_test.php',
        'name' => 'Typing Speed Test',
        'anchor' => 'measure typing speed WPM',
        'description' => 'Test your words per minute, accuracy, and typing consistency.',
        'category' => ['keyboard', 'speed', 'productivity']
    ],
    'latency' => [
        'url' => 'latency-checker.php',
        'name' => 'Latency Checker',
        'anchor' => 'measure input latency',
        'description' => 'Test keyboard and mouse input delay to ensure responsive gaming performance.',
        'category' => ['gaming', 'performance', 'input']
    ],
    'webcam' => [
        'url' => 'webcamtesterindex.php',
        'name' => 'Webcam Tester',
        'anchor' => 'test webcam online',
        'description' => 'Check camera quality, resolution, and take test snapshots.',
        'category' => ['video', 'communication']
    ],
    'screen' => [
        'url' => 'screentestindex.php',
        'name' => 'Screen Tester',
        'anchor' => 'test monitor for dead pixels',
        'description' => 'Detect dead pixels, stuck pixels, and screen uniformity issues.',
        'category' => ['display', 'troubleshooting']
    ],
    'qr-generator' => [
        'url' => 'QR_code_generator_scanner.php',
        'name' => 'QR Code Generator',
        'anchor' => 'create qr codes online',
        'description' => 'Generate QR codes for URLs and text, then download the result as an image.',
        'category' => ['utility', 'sharing']
    ],
    'qr-reader' => [
        'url' => 'qr-code-reader.php',
        'name' => 'QR Code Reader',
        'anchor' => 'scan qr codes from images',
        'description' => 'Decode QR codes from screenshots, photos, and saved images in your browser.',
        'category' => ['utility', 'sharing']
    ],
    'ocr' => [
        'url' => 'ocr-tool.php',
        'name' => 'OCR Tool',
        'anchor' => 'extract text from images',
        'description' => 'Pull text from screenshots and images with browser-based OCR.',
        'category' => ['utility', 'productivity']
    ],
    'password' => [
        'url' => 'auto-password-generator.php',
        'name' => 'Password Generator',
        'anchor' => 'generate strong passwords',
        'description' => 'Create strong passwords quickly with adjustable settings.',
        'category' => ['utility', 'security']
    ],
    'touch-screen' => [
        'url' => 'touch-screen-test.php',
        'name' => 'Touch Screen Test',
        'anchor' => 'test touch screen online',
        'description' => 'Check for dead zones, ghost touches, and multi-touch support on any touchscreen device.',
        'category' => ['display', 'troubleshooting', 'input']
    ],
    'backlight-bleed' => [
        'url' => 'backlight-bleed-test.php',
        'name' => 'Backlight Bleed Test',
        'anchor' => 'check monitor for backlight bleed',
        'description' => 'Inspect your LCD monitor for backlight bleeding, IPS glow, and clouding using a full-screen dark display.',
        'category' => ['display', 'troubleshooting']
    ]
];

// Define related tools for each page (keyword: array of related tool keys)
$relatedToolsMap = [
    'keyboard' => ['mouse', 'typing', 'latency', 'mic', 'ghost-click'],
    'mouse' => ['ghost-click', 'dpi', 'cps', 'mouse-trail', 'keyboard', 'latency'],
    'ghost-click' => ['mouse', 'dpi', 'cps', 'mouse-trail', 'latency'],
    'dpi' => ['mouse', 'ghost-click', 'cps', 'mouse-trail', 'latency'],
    'cps' => ['ghost-click', 'mouse', 'dpi', 'typing', 'latency'],
    'mouse-trail' => ['mouse', 'dpi', 'ghost-click', 'cps', 'latency'],
    'mic' => ['headphone', 'webcam', 'keyboard', 'latency', 'typing'],
    'headphone' => ['mic', 'webcam', 'screen', 'keyboard'],
    'typing' => ['keyboard', 'cps', 'latency', 'mouse'],
    'latency' => ['keyboard', 'mouse', 'ghost-click', 'cps', 'typing'],
    'webcam' => ['mic', 'headphone', 'screen', 'keyboard'],
    'screen' => ['backlight-bleed', 'touch-screen', 'webcam', 'keyboard', 'mouse'],
    'backlight-bleed' => ['screen', 'touch-screen', 'webcam', 'keyboard', 'headphone'],
    'touch-screen' => ['screen', 'backlight-bleed', 'webcam', 'mouse', 'keyboard'],
    'qr-generator' => ['qr-reader', 'ocr', 'password', 'keyboard'],
    'qr-reader' => ['qr-generator', 'ocr', 'password', 'keyboard'],
    'ocr' => ['qr-reader', 'qr-generator', 'password', 'keyboard'],
    'password' => ['ocr', 'qr-generator', 'qr-reader', 'keyboard']
];

// Detect current page
$currentScript = basename($_SERVER['SCRIPT_NAME'], '.php');
$currentPage = 'keyboard'; // default

// Map script names to tool keys
$scriptToKey = [
    'index' => 'keyboard',
    'mouse-test' => 'mouse',
    'ghost-click-detector' => 'ghost-click',
    'mouse_sensitivity_DPI_tester' => 'dpi',
    'mouse_speed_tester' => 'cps',
    'mouse-trail' => 'mouse-trail',
    'mic-tester' => 'mic',
    'headphone_speaker_tester_index' => 'headphone',
    'keyboard_typing_test' => 'typing',
    'latency-checker' => 'latency',
    'webcamtesterindex' => 'webcam',
    'screentestindex' => 'screen',
    'QR_code_generator_scanner' => 'qr-generator',
    'qr-code-reader' => 'qr-reader',
    'ocr-tool' => 'ocr',
    'auto-password-generator' => 'password',
    'dead-pixel-test' => 'screen',
    'stuck-pixel-test' => 'screen',
    'black-screen-test' => 'screen',
    'white-screen-test' => 'screen',
    'stuck-key-test' => 'keyboard',
    'keyboard-ghosting-test' => 'keyboard',
    'n-key-rollover-test' => 'keyboard',
    'test-my-mic' => 'mic',
    'microphone-volume-test' => 'mic',
    'camera-resolution-test' => 'webcam',
    'webcam-not-working-test' => 'webcam',
    'take-picture-with-webcam' => 'webcam',
    'left-right-speaker-test' => 'headphone',
    'stereo-test' => 'headphone',
    'scroll-wheel-test' => 'mouse',
    'double-click-test' => 'ghost-click',
    'scan-qr-from-image' => 'qr-reader',
    'screenshot-to-text' => 'ocr',
    'photo-to-text' => 'ocr',
    'touch-screen-test' => 'touch-screen',
    'backlight-bleed-test' => 'backlight-bleed'
];

if (isset($scriptToKey[$currentScript])) {
    $currentPage = $scriptToKey[$currentScript];
}

// Allow override via variable
if (isset($currentTool) && isset($relatedToolsMap[$currentTool])) {
    $currentPage = $currentTool;
}

// Get related tools for current page
$relatedKeys = $relatedToolsMap[$currentPage] ?? ['mouse', 'keyboard', 'mic', 'cps'];

// Build related tools array (limit to 5)
$relatedTools = [];
foreach (array_slice($relatedKeys, 0, 5) as $key) {
    if (isset($allTools[$key])) {
        $relatedTools[$key] = $allTools[$key];
    }
}
?>

<section class="related-tools" aria-labelledby="related-tools-title">
    <div class="container">
        <div class="related-tools-header">
            <h2 id="related-tools-title">Related Testing Tools</h2>
            <p class="related-tools-intro">Continue testing your hardware with these related diagnostic tools.</p>
        </div>

        <div class="related-tools-grid">
            <?php foreach ($relatedTools as $key => $tool): ?>
            <a href="<?php echo url($tool['url']); ?>" class="related-tool-card">
                <h3><?php echo htmlspecialchars($tool['name']); ?></h3>
                <p><?php echo htmlspecialchars($tool['description']); ?></p>
                <span class="related-tool-link"><?php echo ucfirst(htmlspecialchars($tool['anchor'])); ?> &rarr;</span>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="related-tools-cta">
            <a href="<?php echo url('pages/tools.php'); ?>" class="view-all-tools">View all testing tools</a>
        </div>
    </div>
</section>

<style>
.related-tools {
    padding: 4rem 0;
    background: var(--landing-bg, var(--bg-color, #f8fafc));
    border-top: 1px solid var(--landing-border, var(--card-border, rgba(15, 23, 42, 0.12)));
}

.related-tools-header {
    text-align: center;
    margin-bottom: 2.5rem;
}

.related-tools-header h2 {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--landing-text, var(--landing-ink, var(--text-color, #0f172a)));
    margin: 0 0 0.75rem 0;
}

.related-tools-intro {
    color: var(--landing-muted, var(--text-muted, #475569));
    font-size: 1rem;
    margin: 0;
}

.related-tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.related-tool-card {
    display: block;
    padding: 1.5rem;
    background: var(--landing-surface, var(--card-bg, #ffffff));
    border: 1px solid var(--landing-border, var(--card-border, rgba(15, 23, 42, 0.12)));
    border-radius: 12px;
    color: var(--landing-text, var(--landing-ink, var(--text-color, #0f172a)));
    text-decoration: none;
    transition: all 0.2s ease;
}

.related-tool-card:hover {
    border-color: var(--landing-accent, #6366f1);
    background: rgba(14, 165, 233, 0.08);
    transform: translateY(-2px);
}

.related-tool-card h3 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--landing-text, var(--landing-ink, var(--text-color, #0f172a)));
    margin: 0 0 0.5rem 0;
}

.related-tool-card p {
    font-size: 0.9rem;
    color: var(--landing-muted, var(--text-muted, #475569));
    margin: 0 0 1rem 0;
    line-height: 1.5;
}

.related-tool-link {
    font-size: 0.875rem;
    font-weight: 600;
    color: #0c4a6e;
}

html.dark-theme .related-tool-link,
[data-theme="dark"] .related-tool-link {
    color: #7dd3fc;
}

.related-tool-card:hover .related-tool-link {
    color: #0b3b8f;
}

.related-tools-cta {
    text-align: center;
}

.view-all-tools {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background: transparent;
    border: 1px solid var(--landing-border, var(--card-border, rgba(15, 23, 42, 0.2)));
    border-radius: 8px;
    color: var(--landing-text, var(--landing-ink, var(--text-color, #0f172a)));
    text-decoration: none;
    font-weight: 600;
    transition: all 0.2s ease;
}

.view-all-tools:hover {
    background: rgba(15, 23, 42, 0.06);
    border-color: var(--landing-accent, #6366f1);
}

html.dark-theme .related-tool-card:hover,
[data-theme="dark"] .related-tool-card:hover {
    background: rgba(14, 165, 233, 0.14);
}

html.dark-theme .view-all-tools:hover,
[data-theme="dark"] .view-all-tools:hover {
    background: rgba(148, 163, 184, 0.16);
}

@media (max-width: 768px) {
    .related-tools {
        padding: 3rem 0;
    }

    .related-tools-grid {
        grid-template-columns: 1fr;
    }

    .related-tools-header h2 {
        font-size: 1.5rem;
    }
}
</style>
