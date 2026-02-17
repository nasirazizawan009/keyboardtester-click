<?php
/**
 * Tools List Component
 * Localized (de)
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">Weitere Test-Tools</h2>
        <p class="section-subtitle">Entdecken Sie die komplette Suite für Tastatur, Maus, Audio und Tools.</p>
        <p class="language-note">Sprachunterstützung: Der Tastatur-Tester ist das einzige Tool mit übersetzter Oberfläche (Arabisch, Russisch, Spanisch, Französisch, Portugiesisch, Japanisch, Deutsch, Koreanisch). Alle anderen Tools sind derzeit nur auf Englisch verfügbar.</p>

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
                <h3>Tastatur-Tester</h3>
                <p>Teste die Tastatur, erkenne Ghosting, miss Latenz und prüfe klemmende Tasten</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>Arabischer Tastatur-Tester</h3>
                <p>Teste arabisches Layout und Tastenreaktion in einer arabischen Oberfläche</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>Maus-Tester</h3>
                <p>Prüfe Maustasten, Scrollrad, Mausbewegung und Reaktionszeit</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>Klickgeschwindigkeitstest</h3>
                <p>Miss deine Klickgeschwindigkeit (KPM oder KPS) mit Zeittests</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>Mausempfindlichkeit / DPI</h3>
                <p>Teste DPI, Empfindlichkeit und Tracking-Genauigkeit</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>Mausspur</h3>
                <p>Visualisiere Mausbewegungen und Präzision</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>Geisterklick-Detektor</h3>
                <p>Erkenne unbeabsichtigte oder phantomhafte Klicks</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>Tippgeschwindigkeitstest</h3>
                <p>Miss WPM, Genauigkeit und Tipp-Konsistenz</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>Latenz-Checker</h3>
                <p>Teste Geräte- und Eingabelatenz im Browser</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('screentestindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>Bildschirm-Tester</h3>
                <p>Erkenne tote, festhängende oder heiße Pixel</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>Webcam-Tester</h3>
                <p>Prüfe Webcam-Qualität, Auflösung und Schnappschüsse</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>Mikrofon-Tester</h3>
                <p>Überprüfe Mikrofoneingang und Audiopegel</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>Kopfhörer-/Lautsprecher-Tester</h3>
                <p>Teste Stereo-Kanäle und Audioausgabe</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>OCR-Tool</h3>
                <p>Extrahiere Text aus Bildern schnell</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>QR-Code-Scanner</h3>
                <p>Scanne QR-Codes per Kamera oder Bildupload</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>QR-Code-Generator</h3>
                <p>Erstelle benutzerdefinierte QR-Codes sofort</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/>
                                    <path d="M9 10l2 2 4-4"/>
                                </svg>
                            </div>
                <h3>WhatsApp-Link-Generator</h3>
                <p>Erstelle klickbare WhatsApp-Chat-Links</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('whatsapp-Brand-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/>
                                    <circle cx="10" cy="9" r="1.5"/>
                                </svg>
                            </div>
                <h3>WhatsApp-Markenlinks</h3>
                <p>Erstelle Marken-WhatsApp-Links und QR-Codes</p>
                <span class="tool-card-link">Tool öffnen</span>
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
                <h3>WhatsApp-Stimmungsanalyse</h3>
                <p>Analysiere Stimmung und Ton von Chats</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
            <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>Passwortgenerator</h3>
                <p>Erstelle starke, sichere Passwörter sofort</p>
                <span class="tool-card-link">Tool öffnen</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
