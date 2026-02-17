<?php
/**
 * Tools List Component
 * Displays related tools and links to other testing tools
 */

// Ensure config is loaded and variables are in global scope
if (!function_exists('url')) {
    require_once __DIR__ . '/../../config.php';
}

// Make sure we have access to global variables
global $baseUrl, $siteUrl;

// Determine current tool to filter from list
$currentTool = $currentTool ?? basename(dirname($_SERVER['SCRIPT_FILENAME']));
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">More testing tools</h2>
        <p class="section-subtitle">Explore the full suite for keyboard, mouse, audio, and utilities.</p>
        <p class="language-note">Language support: The Keyboard Tester is the only tool with translated interfaces (Arabic, Russian, Spanish, French, Portuguese, Japanese, German, Korean). All other tools are currently English-only.</p>
        
        <div class="tools-grid">
            <a href="<?php echo url('tools/keyboard-tester/'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="6" width="20" height="12" rx="2"/>
                        <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                        <path d="M6 13h1M9 13h1M12 13h6"/>
                        <path d="M6 16h8"/>
                    </svg>
                </div>
                <span class="tool-name">Keyboard Tester</span>
                <p>Test keyboard functionality, detect ghosting, measure latency, check for stuck keys</p>
                <span class="tool-card-link">Test your keyboard</span>
            </a>
            <a href="<?php echo url('languages/arabic/'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="6" width="20" height="12" rx="2"/>
                        <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                        <path d="M6 13h1M9 13h1M12 13h6"/>
                        <path d="M6 16h8"/>
                    </svg>
                </div>
                <span class="tool-name">Arabic Keyboard Tester</span>
                <p>Test Arabic keyboard layout and key response in an Arabic-first interface</p>
                <span class="tool-card-link">Test Arabic layout</span>
            </a>
            <a href="<?php echo url('mouse-test.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="9" y="2" width="6" height="10" rx="3"/>
                        <path d="M9 7h6"/>
                        <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                    </svg>
                </div>
                <span class="tool-name">Mouse Tester</span>
                <p>Check mouse buttons, scroll wheel, cursor movement, and responsiveness</p>
                <span class="tool-card-link">Test your mouse</span>
            </a>
            <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                    </svg>
                </div>
                <span class="tool-name">Mouse Speed Tester</span>
                <p>Measure your click speed (CPM or CPS) with timed tests</p>
                <span class="tool-card-link">Check click speed</span>
            </a>
            <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                    </svg>
                </div>
                <span class="tool-name">Mouse Sensitivity / DPI</span>
                <p>Test DPI, sensitivity, and tracking accuracy</p>
                <span class="tool-card-link">Test DPI settings</span>
            </a>
            <a href="<?php echo url('mouse-trail.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 18c4-6 8-8 16-10"/>
                        <circle cx="6" cy="16" r="1"/>
                        <circle cx="10" cy="13" r="1"/>
                        <circle cx="14" cy="11" r="1"/>
                    </svg>
                </div>
                <span class="tool-name">Mouse Trail</span>
                <p>Visualize mouse movement trails and precision</p>
                <span class="tool-card-link">View mouse trails</span>
            </a>
            <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <span class="tool-name">Ghost Click Detector</span>
                <p>Detect unintended or phantom clicks</p>
                <span class="tool-card-link">Detect ghost clicks</span>
            </a>
            <a href="<?php echo url('keyboard_typing_test.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 6h16"/>
                        <path d="M7 10h10"/>
                        <path d="M9 14h6"/>
                        <path d="M11 18h2"/>
                    </svg>
                </div>
                <span class="tool-name">Typing Speed Test</span>
                <p>Measure WPM, accuracy, and typing consistency</p>
                <span class="tool-card-link">Check typing speed</span>
            </a>
            <a href="<?php echo url('latency-checker.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <path d="M12 8v5l3 2"/>
                    </svg>
                </div>
                <span class="tool-name">Latency Checker</span>
                <p>Test device and input latency in your browser</p>
                <span class="tool-card-link">Measure latency</span>
            </a>
            <a href="<?php echo url('screentestindex.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="12" rx="2"/>
                        <path d="M8 21h8"/>
                        <path d="M12 17v4"/>
                    </svg>
                </div>
                <span class="tool-name">Screen Tester</span>
                <p>Detect dead, stuck, or hot pixels on screens</p>
                <span class="tool-card-link">Test your screen</span>
            </a>
            <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="7" width="14" height="10" rx="2"/>
                        <path d="M17 10l4-3v10l-4-3"/>
                    </svg>
                </div>
                <span class="tool-name">Webcam Tester</span>
                <p>Check webcam quality, resolution, and snapshots</p>
                <span class="tool-card-link">Test your webcam</span>
            </a>
            <a href="<?php echo url('mic-tester.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="9" y="2" width="6" height="10" rx="3"/>
                        <path d="M5 11a7 7 0 0 0 14 0"/>
                        <path d="M12 18v4"/>
                        <path d="M8 22h8"/>
                    </svg>
                </div>
                <span class="tool-name">Mic Tester</span>
                <p>Verify microphone input and audio levels</p>
                <span class="tool-card-link">Test your microphone</span>
            </a>
            <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 12a8 8 0 0 1 16 0"/>
                        <rect x="3" y="12" width="4" height="7" rx="2"/>
                        <rect x="17" y="12" width="4" height="7" rx="2"/>
                    </svg>
                </div>
                <span class="tool-name">Headphone / Speaker Tester</span>
                <p>Test stereo channels and sound output</p>
                <span class="tool-card-link">Test audio output</span>
            </a>
            <a href="<?php echo url('ocr-tool.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 7V4h3"/>
                        <path d="M20 7V4h-3"/>
                        <path d="M4 17v3h3"/>
                        <path d="M20 17v3h-3"/>
                        <path d="M8 12h8"/>
                        <path d="M10 9h4"/>
                        <path d="M10 15h4"/>
                    </svg>
                </div>
                <span class="tool-name">OCR Tool</span>
                <p>Extract text from images quickly</p>
                <span class="tool-card-link">Extract text now</span>
            </a>
            <a href="<?php echo url('qr-code-reader.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="6" height="6"/>
                        <rect x="15" y="3" width="6" height="6"/>
                        <rect x="3" y="15" width="6" height="6"/>
                        <path d="M15 15h6v6h-6z"/>
                        <path d="M12 12h2"/>
                        <path d="M12 8h2"/>
                        <path d="M8 12h2"/>
                    </svg>
                </div>
                <span class="tool-name">QR Code Reader</span>
                <p>Scan QR codes with camera or image upload</p>
                <span class="tool-card-link">Scan QR codes</span>
            </a>
            <a href="<?php echo url('QR_code_generator_scanner.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="6" height="6"/>
                        <rect x="15" y="3" width="6" height="6"/>
                        <rect x="3" y="15" width="6" height="6"/>
                        <path d="M14 14h7v7h-7z"/>
                        <path d="M9 9h6"/>
                    </svg>
                </div>
                <span class="tool-name">QR Code Generator</span>
                <p>Create custom QR codes instantly</p>
                <span class="tool-card-link">Create QR code</span>
            </a>
            <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/>
                        <path d="M9 10l2 2 4-4"/>
                    </svg>
                </div>
                <span class="tool-name">WhatsApp Link Generator</span>
                <p>Create clickable WhatsApp chat links</p>
                <span class="tool-card-link">Generate chat link</span>
            </a>
            <a href="<?php echo url('whatsapp-Brand-link-generator.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/>
                        <circle cx="10" cy="9" r="1.5"/>
                    </svg>
                </div>
                <span class="tool-name">WhatsApp Brand Links</span>
                <p>Create branded WhatsApp links and QR codes</p>
                <span class="tool-card-link">Create brand link</span>
            </a>
            <a href="<?php echo url('whatsapp-sentiment-analyzer.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <circle cx="9" cy="10" r="1"/>
                        <circle cx="15" cy="10" r="1"/>
                        <path d="M9 15c1.5 1.2 4.5 1.2 6 0"/>
                    </svg>
                </div>
                <span class="tool-name">WhatsApp Sentiment Analyzer</span>
                <p>Analyze chat sentiment and tone</p>
                <span class="tool-card-link">Analyze sentiment</span>
            </a>
            <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="5" y="10" width="14" height="10" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                        <circle cx="12" cy="15" r="1.5"/>
                    </svg>
                </div>
                <span class="tool-name">Password Generator</span>
                <p>Create strong, secure passwords instantly</p>
                <span class="tool-card-link">Generate password</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/tools-list-styles.php'; ?>
