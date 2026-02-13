<?php
/**
 * Tools List Component
 * Localized (es) - Updated with Spanish tool links
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">Más herramientas de prueba</h2>
        <p class="section-subtitle">Explora la suite completa para teclado, ratón, audio y utilidades.</p>
        <p class="language-note">Todas las herramientas disponibles con interfaz en español.</p>

        <div class="tools-grid">
            <a href="<?php echo url('languages/spanish/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>Probador de Teclado</h3>
                <p>Prueba el teclado, detecta ghosting, mide la latencia</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>Probador de Ratón</h3>
                <p>Comprueba botones, rueda de desplazamiento y movimiento</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/click-speed.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>Velocidad de Clic</h3>
                <p>Mide la velocidad de clic (CPS) con pruebas cronometradas</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/dpi-tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>Sensibilidad / DPI</h3>
                <p>Prueba DPI, sensibilidad y precisión de seguimiento</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/ghost-click.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>Detector de Clics Fantasma</h3>
                <p>Detecta clics no intencionados o fantasma</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/typing-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6h16"/>
                                    <path d="M7 10h10"/>
                                    <path d="M9 14h6"/>
                                    <path d="M11 18h2"/>
                                </svg>
                            </div>
                <h3>Velocidad de Escritura</h3>
                <p>Mide WPM, precisión y consistencia al escribir</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/screen-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>Prueba de Pantalla</h3>
                <p>Detecta píxeles muertos, atascados o calientes</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/mic-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M5 11a7 7 0 0 0 14 0"/>
                                    <path d="M12 18v4"/>
                                    <path d="M8 22h8"/>
                                </svg>
                            </div>
                <h3>Prueba de Micrófono</h3>
                <p>Comprueba la entrada del micrófono y niveles de audio</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/mouse-trail.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 18c4-6 8-8 16-10"/>
                                    <circle cx="6" cy="16" r="1"/>
                                    <circle cx="10" cy="13" r="1"/>
                                    <circle cx="14" cy="11" r="1"/>
                                </svg>
                            </div>
                <h3>Rastro del Ratón</h3>
                <p>Visualiza trayectorias del ratón y precisión</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>Verificador de Latencia</h3>
                <p>Prueba la latencia y tiempo de reacción</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/webcam-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>Prueba de Webcam</h3>
                <p>Comprueba calidad, resolución y capturas</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/headphone-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>Prueba de Auriculares</h3>
                <p>Prueba canales estéreo y salida de audio</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/ocr-tool.php'); ?>" class="tool-card">
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
                <h3>Herramienta OCR</h3>
                <p>Extrae texto de imágenes rápidamente</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/qr-reader.php'); ?>" class="tool-card">
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
                <h3>Lector de Códigos QR</h3>
                <p>Escanea códigos QR con la cámara o imagen</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/qr-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M14 14h7v7h-7z"/>
                                    <path d="M9 9h6"/>
                                </svg>
                            </div>
                <h3>Generador de QR</h3>
                <p>Crea códigos QR personalizados al instante</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
            <a href="<?php echo url('languages/spanish/password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>Generador de Contraseñas</h3>
                <p>Crea contraseñas fuertes y seguras al instante</p>
                <span class="tool-card-link">Abrir herramienta</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
