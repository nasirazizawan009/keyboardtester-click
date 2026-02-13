<?php
/**
 * Tools List Component
 * Localized (fr)
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">Plus d'outils de test</h2>
        <p class="section-subtitle">Explorez la suite complète pour clavier, souris, audio et utilitaires.</p>
        <p class="language-note">Support multilingue : le testeur de clavier est le seul outil avec interface traduite (arabe, russe, espagnol, français, portugais, japonais, allemand, coréen). Tous les autres outils sont actuellement disponibles uniquement en anglais.</p>

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
                <h3>Testeur de clavier</h3>
                <p>Testez le clavier, détectez le ghosting, mesurez la latence, vérifiez les touches bloquées</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Testeur de clavier arabe</h3>
                <p>Testez la disposition arabe et la réponse des touches dans une interface en arabe</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>Testeur de souris</h3>
                <p>Vérifiez les boutons, la molette, le mouvement du curseur et la réactivité</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('mouse_speed_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>Test de vitesse de clic</h3>
                <p>Mesurez votre vitesse de clic (CPM ou CPS) avec des tests chronométrés</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>Sensibilité souris / DPI</h3>
                <p>Testez le DPI, la sensibilité et la précision du suivi</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Trace de souris</h3>
                <p>Visualisez les trajectoires de la souris et la précision</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('ghost-click-detector.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>Détecteur de clics fantômes</h3>
                <p>Détectez les clics involontaires ou fantômes</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Test de vitesse de frappe</h3>
                <p>Mesurez les mots par minute, la précision et la régularité de la frappe</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>Test de latence</h3>
                <p>Testez la latence de l'appareil et des entrées dans votre navigateur</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('screentestindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>Testeur d'écran</h3>
                <p>Détectez les pixels morts, bloqués ou chauds</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('webcamtesterindex.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>Testeur de webcam</h3>
                <p>Vérifiez la qualité, la résolution et les instantanés de la webcam</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Testeur de micro</h3>
                <p>Vérifiez l'entrée du micro et les niveaux audio</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('headphone_speaker_tester_index.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>Testeur de casque / haut-parleur</h3>
                <p>Testez les canaux stéréo et la sortie audio</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Outil OCR</h3>
                <p>Extrayez du texte d'images rapidement</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Lecteur de QR Code</h3>
                <p>Scannez des QR codes avec la caméra ou un fichier image</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Générateur de QR Code</h3>
                <p>Créez des QR codes personnalisés instantanément</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('whatsapp-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/>
                                    <path d="M9 10l2 2 4-4"/>
                                </svg>
                            </div>
                <h3>Générateur de lien WhatsApp</h3>
                <p>Créez des liens de discussion WhatsApp cliquables</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('whatsapp-Brand-link-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/>
                                    <circle cx="10" cy="9" r="1.5"/>
                                </svg>
                            </div>
                <h3>Liens WhatsApp de marque</h3>
                <p>Créez des liens WhatsApp de marque et des QR codes</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
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
                <h3>Analyseur de sentiment WhatsApp</h3>
                <p>Analysez le sentiment et le ton des discussions</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
            <a href="<?php echo url('auto-password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>Générateur de mots de passe</h3>
                <p>Créez des mots de passe forts et sécurisés instantanément</p>
                <span class="tool-card-link">Ouvrir l'outil</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
