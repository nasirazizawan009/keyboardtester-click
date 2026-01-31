<?php
/**
 * Tools List Component
 * Displays related tools and links to other testing tools
 */

// Determine current tool to filter from list
$currentTool = $currentTool ?? basename(dirname($_SERVER['SCRIPT_FILENAME']));
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">More testing tools</h2>
        <p class="section-subtitle">Explore the full suite for keyboard, mouse, audio, and utilities.</p>
        
        <div class="tools-grid">
            <a href="<?php echo $baseUrl; ?>/tools/keyboard-tester/" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="6" width="20" height="12" rx="2"/>
                        <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                        <path d="M6 13h1M9 13h1M12 13h6"/>
                        <path d="M6 16h8"/>
                    </svg>
                </div>
                <h3>Keyboard Tester</h3>
                <p>Test keyboard functionality, detect ghosting, measure latency, check for stuck keys</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/mouse-test.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="9" y="2" width="6" height="10" rx="3"/>
                        <path d="M9 7h6"/>
                        <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                    </svg>
                </div>
                <h3>Mouse Tester</h3>
                <p>Check mouse buttons, scroll wheel, cursor movement, and responsiveness</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/mouse_speed_tester.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                    </svg>
                </div>
                <h3>Mouse Speed Tester</h3>
                <p>Measure your click speed (CPM or CPS) with timed tests</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/mouse_sensitivity_DPI_tester.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                    </svg>
                </div>
                <h3>Mouse Sensitivity / DPI</h3>
                <p>Test DPI, sensitivity, and tracking accuracy</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/mouse-trail.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 18c4-6 8-8 16-10"/>
                        <circle cx="6" cy="16" r="1"/>
                        <circle cx="10" cy="13" r="1"/>
                        <circle cx="14" cy="11" r="1"/>
                    </svg>
                </div>
                <h3>Mouse Trail</h3>
                <p>Visualize mouse movement trails and precision</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/ghost-click-detector.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>Ghost Click Detector</h3>
                <p>Detect unintended or phantom clicks</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/keyboard_typing_test.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 6h16"/>
                        <path d="M7 10h10"/>
                        <path d="M9 14h6"/>
                        <path d="M11 18h2"/>
                    </svg>
                </div>
                <h3>Typing Speed Test</h3>
                <p>Measure WPM, accuracy, and typing consistency</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/latency-checker.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <path d="M12 8v5l3 2"/>
                    </svg>
                </div>
                <h3>Latency Checker</h3>
                <p>Test device and input latency in your browser</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/screentestindex.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="5" width="18" height="12" rx="2"/>
                        <path d="M8 21h8"/>
                        <path d="M12 17v4"/>
                    </svg>
                </div>
                <h3>Screen Tester</h3>
                <p>Detect dead, stuck, or hot pixels on screens</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/webcamtesterindex.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="7" width="14" height="10" rx="2"/>
                        <path d="M17 10l4-3v10l-4-3"/>
                    </svg>
                </div>
                <h3>Webcam Tester</h3>
                <p>Check webcam quality, resolution, and snapshots</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/mic-tester.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="9" y="2" width="6" height="10" rx="3"/>
                        <path d="M5 11a7 7 0 0 0 14 0"/>
                        <path d="M12 18v4"/>
                        <path d="M8 22h8"/>
                    </svg>
                </div>
                <h3>Mic Tester</h3>
                <p>Verify microphone input and audio levels</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/headphone_speaker_tester_index.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 12a8 8 0 0 1 16 0"/>
                        <rect x="3" y="12" width="4" height="7" rx="2"/>
                        <rect x="17" y="12" width="4" height="7" rx="2"/>
                    </svg>
                </div>
                <h3>Headphone / Speaker Tester</h3>
                <p>Test stereo channels and sound output</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/ocr-tool.php" class="tool-card">
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
                <h3>OCR Tool</h3>
                <p>Extract text from images quickly</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/qr-code-reader.php" class="tool-card">
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
                <h3>QR Code Reader</h3>
                <p>Scan QR codes with camera or image upload</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/QR_code_generator_scanner.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="6" height="6"/>
                        <rect x="15" y="3" width="6" height="6"/>
                        <rect x="3" y="15" width="6" height="6"/>
                        <path d="M14 14h7v7h-7z"/>
                        <path d="M9 9h6"/>
                    </svg>
                </div>
                <h3>QR Code Generator</h3>
                <p>Create custom QR codes instantly</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/whatsapp-link-generator.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/>
                        <path d="M9 10l2 2 4-4"/>
                    </svg>
                </div>
                <h3>WhatsApp Link Generator</h3>
                <p>Create clickable WhatsApp chat links</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/whatsapp-Brand-link-generator.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/>
                        <circle cx="10" cy="9" r="1.5"/>
                    </svg>
                </div>
                <h3>WhatsApp Brand Links</h3>
                <p>Create branded WhatsApp links and QR codes</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/whatsapp-sentiment-analyzer.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="8"/>
                        <circle cx="9" cy="10" r="1"/>
                        <circle cx="15" cy="10" r="1"/>
                        <path d="M9 15c1.5 1.2 4.5 1.2 6 0"/>
                    </svg>
                </div>
                <h3>WhatsApp Sentiment Analyzer</h3>
                <p>Analyze chat sentiment and tone</p>
                <span class="tool-card-link">Open tool</span>
            </a>
            <a href="<?php echo $baseUrl; ?>/auto-password-generator.php" class="tool-card">
                <div class="tool-card-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <rect x="5" y="10" width="14" height="10" rx="2"/>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                        <circle cx="12" cy="15" r="1.5"/>
                    </svg>
                </div>
                <h3>Password Generator</h3>
                <p>Create strong, secure passwords instantly</p>
                <span class="tool-card-link">Open tool</span>
            </a>
        </div>
    </div>
</section>

<style>
.tools-list-section {
    padding: 72px 0;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.08), rgba(249, 115, 22, 0.08));
    border-top: 1px solid var(--card-border);
    border-bottom: 1px solid var(--card-border);
}

.tools-list-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.tools-list-section h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    color: var(--text-color);
    margin-bottom: 8px;
    text-align: center;
}

.tools-list-section .section-subtitle {
    text-align: center;
    color: var(--text-muted);
    margin-bottom: 36px;
    font-size: 1.05rem;
    max-width: 720px;
    margin-left: auto;
    margin-right: auto;
}

.tools-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 22px;
}

.tool-card {
    display: flex;
    flex-direction: column;
    padding: 22px;
    background: var(--card-bg);
    border: 1px solid var(--card-border);
    border-radius: 18px;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    position: relative;
    overflow: hidden;
    box-shadow: var(--card-shadow);
    height: 100%;
}

.tool-card::after {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: 18px;
    border: 1px solid transparent;
    background: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(249, 115, 22, 0.12));
    opacity: 0;
    transition: opacity 0.2s ease;
    pointer-events: none;
}

.tool-card > * {
    position: relative;
    z-index: 1;
}

.tool-card:hover {
    border-color: rgba(14, 165, 233, 0.6);
    transform: translateY(-4px);
    box-shadow: 0 18px 36px rgba(15, 23, 42, 0.15);
}

.tool-card:hover::after {
    opacity: 1;
}

.tool-card-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: rgba(14, 165, 233, 0.14);
    color: #0f172a;
    margin-bottom: 14px;
}

.tool-card-icon svg {
    width: 24px;
    height: 24px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

html.dark-theme .tool-card-icon,
[data-theme="dark"] .tool-card-icon {
    color: #e2e8f0;
    background: rgba(14, 165, 233, 0.22);
}

.tool-card h3 {
    font-size: 1.1rem;
    color: var(--text-color);
    margin-bottom: 8px;
}

.tool-card p {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.5;
    flex-grow: 1;
    margin-bottom: 16px;
}

.tool-card-link {
    color: #0ea5e9;
    font-weight: 600;
    margin-top: auto;
}

html.dark-theme .tool-card-link,
[data-theme="dark"] .tool-card-link {
    color: #7dd3fc;
}

@media (max-width: 768px) {
    .tools-grid {
        grid-template-columns: 1fr;
    }

    .tools-list-section h2 {
        font-size: 1.8rem;
    }
}
</style>
