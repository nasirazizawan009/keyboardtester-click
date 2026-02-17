<?php
/**
 * Spanish Keyboard Tester - Guidelines Section
 */
?>

<section class="guidelines-section" id="guidelines" aria-labelledby="guidelines-title-es">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Guía de Uso</p>
            <h2 id="guidelines-title-es">Cómo Usar el Probador de Teclado</h2>
            <p class="section-lede">Sigue estos pasos para obtener los mejores resultados de tu prueba de teclado.</p>
        </div>

        <div class="guidelines-grid">
            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    </svg>
                </div>
                <h3>Prueba Todas las Teclas</h3>
                <p>Presiona cada tecla de tu teclado para verificar que todas respondan correctamente. Las teclas probadas cambiarán de color.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>Mide la Latencia</h3>
                <p>Activa el modo de latencia para ver el tiempo de respuesta de cada tecla. Valores más bajos indican mejor rendimiento.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>Detecta Ghosting</h3>
                <p>Presiona múltiples teclas simultáneamente para detectar problemas de ghosting. Si alguna tecla no se registra, puede haber limitaciones de hardware.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                </div>
                <h3>Verifica Teclas Atascadas</h3>
                <p>Si una tecla permanece iluminada sin presionarla, puede estar atascada o defectuosa. Limpia o reemplaza la tecla afectada.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>Exporta Resultados</h3>
                <p>Guarda un informe de tu sesión de prueba para documentación o para compartir con soporte técnico.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>Privacidad Total</h3>
                <p>Todas las pruebas se ejecutan localmente en tu navegador. Ningún dato de pulsaciones se envía a ningún servidor.</p>
            </article>
        </div>

        <div class="faq-section">
            <h3>Preguntas Frecuentes</h3>
            <div class="faq-grid">
                <details class="faq-item">
                    <summary>¿Por qué algunas teclas no se registran?</summary>
                    <p>Algunas combinaciones de teclas pueden no registrarse debido a limitaciones de hardware (ghosting). Esto es normal en teclados de membrana.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Qué significan los diferentes colores?</summary>
                    <p>Cada color representa un nivel de pulsaciones: cian (1), dorado (2), verde (3), rojo (4), púrpura (5), y luego se repite el ciclo.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Qué es una buena latencia?</summary>
                    <p>Una latencia menor a 50ms es excelente. Entre 50-100ms es aceptable. Mayor a 100ms puede indicar problemas de conexión o hardware.</p>
                </details>
                <details class="faq-item">
                    <summary>¿Funciona con teclados Bluetooth?</summary>
                    <p>Sí, el probador funciona con cualquier tipo de teclado conectado a tu computadora, incluyendo Bluetooth y USB.</p>
                </details>
            </div>
        </div>
    </div>
</section>

<style>
.guidelines-section {
    padding: 80px 0;
    background: var(--bg-secondary, #1a1a24);
}

.guidelines-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.guidelines-section .section-head {
    text-align: center;
    margin-bottom: 48px;
}

.guidelines-section .section-kicker {
    font-size: 0.875rem;
    font-weight: 600;
    color: #00d4ff;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: 8px;
}

.guidelines-section h2 {
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    color: var(--text-color, #e2e8f0);
    margin-bottom: 12px;
}

.guidelines-section .section-lede {
    color: var(--text-muted, #94a3b8);
    font-size: 1.1rem;
    max-width: 600px;
    margin: 0 auto;
}

.guidelines-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-bottom: 60px;
}

.guideline-card {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 16px;
    padding: 28px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.guideline-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
}

.guideline-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(0, 212, 255, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    color: #00d4ff;
}

.guideline-card h3 {
    font-size: 1.15rem;
    color: var(--text-color, #e2e8f0);
    margin-bottom: 10px;
}

.guideline-card p {
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
    font-size: 0.95rem;
}

.faq-section {
    max-width: 800px;
    margin: 0 auto;
}

.faq-section h3 {
    font-size: 1.5rem;
    color: var(--text-color, #e2e8f0);
    text-align: center;
    margin-bottom: 24px;
}

.faq-grid {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.faq-item {
    background: var(--card-bg, rgba(30, 41, 59, 0.6));
    border: 1px solid var(--card-border, rgba(148, 163, 184, 0.15));
    border-radius: 12px;
    overflow: hidden;
}

.faq-item summary {
    padding: 18px 24px;
    cursor: pointer;
    font-weight: 600;
    color: var(--text-color, #e2e8f0);
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.faq-item summary::-webkit-details-marker {
    display: none;
}

.faq-item summary::after {
    content: '+';
    font-size: 1.5rem;
    color: #00d4ff;
    transition: transform 0.2s ease;
}

.faq-item[open] summary::after {
    transform: rotate(45deg);
}

.faq-item p {
    padding: 0 24px 18px;
    color: var(--text-muted, #94a3b8);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .guidelines-grid {
        grid-template-columns: 1fr;
    }
}
</style>
