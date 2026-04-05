<?php
if (!isset($baseUrl)) { include_once __DIR__ . '/../../config.php'; }
?>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-section about-section">
            <div class="footer-logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#38bdf8" stroke-width="2" stroke-linecap="round"/>
                    <path d="M8 12H8.01M12 12H12.01M16 12H16.01M8 16H8.01M12 16H12.01M16 16H16.01" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>KeyboardTester</h3>
            </div>
            <p class="footer-description">Herramientas de prueba modernas para teclados, ratones, audio, pantallas y más, diseñadas para claridad, precisión y velocidad.</p>
            <div class="social-links">
                <a href="<?php echo $socialLinks['github']; ?>" target="_blank" rel="noopener noreferrer" aria-label="Descargar en GitHub">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#f0f6fc"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
                    GitHub
                </a>
                <a href="<?php echo $socialLinks['gitlab']; ?>" target="_blank" rel="noopener noreferrer" aria-label="Ver en GitLab">
                    <svg width="18" height="18" viewBox="0 0 24 24"><path d="M23.955 13.587l-1.342-4.135-2.664-8.189a.455.455 0 0 0-.867 0L16.418 9.45H7.582L4.918 1.263a.455.455 0 0 0-.867 0L1.387 9.452.045 13.587a.924.924 0 0 0 .331 1.023L12 22.816l11.624-8.206a.924.924 0 0 0 .331-1.023" fill="#e24329"/><path d="M12 22.816L16.418 9.45H7.582z" fill="#fc6d26"/><path d="M12 22.816l-4.418-13.366H1.387z" fill="#fca326"/><path d="M1.387 9.45L.045 13.587a.924.924 0 0 0 .331 1.023L12 22.816z" fill="#e24329"/><path d="M1.387 9.45h6.195L4.918 1.263a.455.455 0 0 0-.867 0z" fill="#fc6d26"/><path d="M12 22.816l4.418-13.366h6.195z" fill="#fca326"/><path d="M22.613 9.45l1.342 4.137a.924.924 0 0 1-.331 1.023L12 22.816z" fill="#e24329"/><path d="M22.613 9.45h-6.195l2.664-8.187a.455.455 0 0 1 .867 0z" fill="#fc6d26"/></svg>
                    GitLab
                </a>
                <a href="<?php echo $socialLinks['youtube']; ?>" target="_blank" rel="noopener noreferrer" aria-label="Ver en YouTube">
                    <svg width="18" height="18" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.546 12 3.546 12 3.546s-7.505 0-9.377.504A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.504 9.376.504 9.376.504s7.505 0 9.377-.504a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814z" fill="#FF0000"/><path d="M9.545 15.568V8.432L15.818 12z" fill="#fff"/></svg>
                    YouTube
                </a>
                <a href="<?php echo $socialLinks['facebook']; ?>" target="_blank" rel="noopener noreferrer" aria-label="Seguir en Facebook">
                    <svg width="18" height="18" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12S0 5.446 0 12.073c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/></svg>
                    Facebook
                </a>
            </div>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Enlaces Rápidos</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">Inicio</a></li>
                <li><a href="<?php echo $pages['blog']; ?>">Blog</a></li>
                <li><a href="<?php echo $pages['about']; ?>">Acerca de</a></li>
                <li><a href="<?php echo $pages['privacy']; ?>">Privacidad</a></li>
                <li><a href="<?php echo $pages['disclaimer']; ?>">Aviso Legal</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Herramientas de Prueba</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">Probador de Teclado</a></li>
                <li><a href="<?php echo $pages['mouse_test']; ?>">Probador de Ratón</a></li>
                <li><a href="<?php echo $pages['keyboard_typing']; ?>">Test de Velocidad</a></li>
                <li><a href="<?php echo $pages['screen_test']; ?>">Probador de Pantalla</a></li>
                <li><a href="<?php echo $pages['mic_test']; ?>">Probador de Micrófono</a></li>
                <li><a href="<?php echo $pages['webcam_test']; ?>">Probador de Webcam</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Más Herramientas</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['qr_generator']; ?>">Generador QR</a></li>
                <li><a href="<?php echo $pages['ocr_tool']; ?>">Herramienta OCR</a></li>
                <li><a href="<?php echo $pages['password_gen']; ?>">Generador de Contraseñas</a></li>
                <li><a href="<?php echo $pages['ghost_click']; ?>">Detector de Clics Fantasma</a></li>
                <li><a href="<?php echo url('languages/spanish/polling-rate-test.php'); ?>">🖱️ Test de Sondeo del Ratón</a></li>
                <li><a href="<?php echo url('languages/spanish/refresh-rate-test.php'); ?>">🖥️ Test de Refresco del Monitor</a></li>
                <li><a href="<?php echo url('languages/spanish/color-test.php'); ?>">🎨 Test de Color del Monitor</a></li>
                <li><a href="<?php echo url('languages/spanish/touch-screen-test.php'); ?>">👆 Test de Pantalla Táctil</a></li>
                <li><a href="<?php echo url('languages/spanish/gamepad-test.php'); ?>">🎮 Test de Mando de Juego</a></li>
            </ul>
        </div>
        <div class="footer-section contact-section">
            <h4 class="footer-heading">Mantente Conectado</h4>
            <div class="contact-info">
                <a href="mailto:<?php echo $siteEmail; ?>" class="contact-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?php echo $siteEmail; ?></a>
            </div>
            <div class="newsletter">
                <p>Recibe actualizaciones sobre nuevas herramientas</p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" name="email" placeholder="Tu correo electrónico" required>
                    <button type="submit">Suscribirse</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="copyright">&copy; <?php echo $siteYear; ?> <a href="<?php echo $pages['home']; ?>"><?php echo $siteName; ?></a>. Todos los derechos reservados.</p>
        <p class="tagline">Hecho con <span class="heart">❤️</span> para entusiastas de la tecnología en todo el mundo</p>
    </div>
</footer>
<button id="back-to-top" class="back-to-top" aria-label="Volver arriba">↑</button>

<style>
.site-footer { --footer-bg: #0b1220; --footer-surface: rgba(15, 23, 42, 0.78); --footer-border: rgba(148, 163, 184, 0.18); --footer-accent: #38bdf8; --footer-text: #e2e8f0; --footer-muted: #94a3b8; background: radial-gradient(900px 320px at 10% 0%, rgba(56, 189, 248, 0.16), transparent 60%), radial-gradient(700px 280px at 90% 20%, rgba(14, 165, 233, 0.14), transparent 60%), var(--footer-bg); color: var(--footer-text); padding: 80px 20px 28px; font-family: 'Inter', sans-serif; margin-top: 90px; border-top: 1px solid var(--footer-border); }
.footer-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 28px; margin-bottom: 36px; }
.about-section { grid-column: span 2; }
.footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
.footer-logo h3 { font-size: 1.4rem; font-weight: 700; color: var(--footer-accent); margin: 0; }
.footer-description { font-size: 0.95rem; line-height: 1.6; color: var(--footer-muted); margin-bottom: 20px; }
.back-to-top { position: fixed; right: 20px; bottom: 24px; width: 44px; height: 44px; border-radius: 50%; border: none; background: #38bdf8; color: #0f172a; font-weight: 700; box-shadow: 0 8px 20px rgba(15, 23, 42, 0.25); cursor: pointer; opacity: 0; pointer-events: none; transition: opacity 0.2s ease; z-index: 9999; }
.back-to-top.show { opacity: 1; pointer-events: auto; }
.social-links { display: flex; gap: 12px; flex-wrap: wrap; }
.social-links a { display: inline-flex; align-items: center; gap: 8px; padding: 10px 16px; background: rgba(56, 189, 248, 0.12); color: var(--footer-text); text-decoration: none; border-radius: 999px; font-size: 0.875rem; font-weight: 600; transition: all 0.25s ease; border: 1px solid rgba(56, 189, 248, 0.2); }
.social-links a:hover { background: rgba(56, 189, 248, 0.24); transform: translateY(-2px); }
.footer-section { display: flex; flex-direction: column; background: var(--footer-surface); border: 1px solid var(--footer-border); border-radius: 18px; padding: 20px 22px; box-shadow: 0 18px 40px rgba(2, 6, 23, 0.35); backdrop-filter: blur(10px); }
.footer-heading { font-size: 1.05rem; font-weight: 600; color: var(--footer-accent); margin-bottom: 16px; position: relative; padding-bottom: 8px; }
.footer-heading::after { content: ''; position: absolute; bottom: 0; left: 0; width: 40px; height: 3px; background: var(--footer-accent); border-radius: 999px; }
.footer-links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; }
.footer-links a { color: var(--footer-muted); text-decoration: none; font-size: 0.9375rem; transition: all 0.25s ease; }
.footer-links a:hover { color: #e0f2fe; padding-left: 6px; }
.contact-info { margin-bottom: 20px; }
.contact-item { display: flex; align-items: center; gap: 10px; color: var(--footer-muted); text-decoration: none; font-size: 0.9375rem; transition: color 0.25s ease; }
.contact-item:hover { color: #e0f2fe; }
.newsletter { margin-top: 20px; }
.newsletter p { font-size: 0.9375rem; color: var(--footer-muted); margin-bottom: 12px; }
.newsletter-form { display: flex; gap: 10px; }
.newsletter-form input { flex: 1; height: 44px; padding: 0 16px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(255, 255, 255, 0.04); color: var(--footer-text); border-radius: 10px; font-size: 0.875rem; }
.newsletter-form input:focus { outline: none; border-color: var(--footer-accent); }
.newsletter-form button { height: 44px; padding: 0 24px; background: linear-gradient(135deg, #38bdf8, #0ea5e9); color: #0f172a; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.25s ease; }
.newsletter-form button:hover { background: linear-gradient(135deg, #7dd3fc, #38bdf8); transform: translateY(-2px); }
.footer-bottom { max-width: 1200px; margin: 0 auto; padding-top: 28px; border-top: 1px solid var(--footer-border); text-align: center; }
.copyright { font-size: 0.875rem; color: var(--footer-muted); margin-bottom: 8px; }
.copyright a { color: var(--footer-accent); text-decoration: none; font-weight: 600; }
.tagline { font-size: 0.875rem; color: var(--footer-muted); margin: 0; }
.heart { color: #ef4444; animation: heartbeat 1.5s ease-in-out infinite; }
@keyframes heartbeat { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
@media (max-width: 768px) { .site-footer { padding: 50px 16px 20px; margin-top: 60px; } .footer-container { grid-template-columns: 1fr; } .about-section { grid-column: span 1; text-align: center; } .footer-logo { justify-content: center; } .social-links { justify-content: center; } .footer-heading::after { left: 50%; transform: translateX(-50%); } .footer-links { align-items: center; } .footer-links a:hover { padding-left: 0; } .contact-section { align-items: center; text-align: center; } .newsletter-form { flex-direction: column; } }
</style>
<script>
const backToTop = document.getElementById('back-to-top');
if (backToTop) { const toggleBackToTop = () => { backToTop.classList.toggle('show', window.scrollY > 400); }; window.addEventListener('scroll', toggleBackToTop, { passive: true }); toggleBackToTop(); backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' })); }
</script>
