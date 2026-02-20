<?php
/**
 * Spanish Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">Herramienta de Diagnóstico de Teclado</p>
            <h1 class="hero-title">Prueba Cada Tecla con Retroalimentación Instantánea en Segundos</h1>
            <p class="hero-lede">Resaltado instantáneo de teclas, cambio de diseños, prueba de ghosting e informes exportables. Sin instalación. Sin registro.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">Iniciar Prueba de Teclado</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">Explorar Todas las Herramientas</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">Sin Instalación</span>
                <span class="hero-badge">Múltiples Diseños</span>
                <span class="hero-badge">Privacidad Total</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">Teclas Soportadas</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">Temas Incluidos</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">Sistemas Operativos</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Interfaz del probador de teclado español" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">Diagnóstico en Vivo</div>
                    <p>Observa pulsaciones, densidad del mapa de calor y tiempo de respuesta en tiempo real.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">Cambio de Diseño</div>
                    <p>Cambia diseños y etiquetas de SO sin perder tu sesión.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage - Above the Fold -->
<section class="tool-stage" id="keyboard-tester" aria-labelledby="tool-stage-title-es">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">Herramienta Principal</p>
            <h2 id="tool-stage-title-es">Probador de Teclado</h2>
            <p class="section-lede">Usa la herramienta a continuación para probar cada tecla, verificar diseños y medir latencia.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Consejos Rápidos</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Características principales">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">Sin Instalación</div>
            <div class="trust-desc">Funciona completamente en tu navegador</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Soporte de Diseños</div>
            <div class="trust-desc">QWERTY, AZERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Diagnóstico en Vivo</div>
            <div class="trust-desc">Datos de teclas, mapa de calor y latencia al instante</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Privacidad Primero</div>
            <div class="trust-desc">Tus datos nunca abandonan tu dispositivo</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-es">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Diseñado para Diagnóstico Rápido</p>
            <h2 id="feature-title-es">Todo lo que Necesitas para Verificar tu Teclado</h2>
            <p class="section-lede">Un conjunto de herramientas enfocadas para verificaciones diarias, tickets de soporte y solución de problemas de hardware.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>Mapa de Teclas en Vivo</h3>
                <p>Observa cada pulsación resaltada al instante con retroalimentación de color e historial de teclas.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Ghosting y Latencia</h3>
                <p>Mide el tiempo de respuesta y detecta entradas fantasma con herramientas integradas.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Soporte Multi-dispositivo</h3>
                <p>Cambia diseños y etiquetas de SO sobre la marcha sin salir de la página.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Resultados Exportables</h3>
                <p>Guarda un informe de sesión para notas de control de calidad o documentación de soporte.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-es">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">Flujo de Trabajo Simple</p>
                <h2 id="process-title-es">Tres Pasos para Verificar tu Teclado</h2>
            </div>
            <p class="section-lede">Realiza una verificación completa en menos de un minuto y exporta resultados si es necesario.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Presiona cualquier tecla para iniciar la prueba" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>Presiona Cualquier Tecla</h3>
                    <p>Comienza a escribir y observa cómo el mapa de teclas responde en tiempo real.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Teclas especiales y diseño de teclado" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>Revisa las Analíticas</h3>
                    <p>Abre opciones avanzadas para mapa de calor, estadísticas y prueba de ghosting.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Sistema de colores y resultados exportables" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>Exporta la Sesión</h3>
                    <p>Descarga un informe para mantener tus diagnósticos organizados.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Probador de Teclado Español",
  "description": "Herramienta gratuita para probar teclado español en línea",
  "url": "<?php echo url('languages/spanish/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "es"
}
</script>
