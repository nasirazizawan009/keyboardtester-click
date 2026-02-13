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
            <p class="footer-description">Ferramentas de teste modernas para teclados, mouses, audio, telas e mais, projetadas para clareza, precisao e velocidade.</p>
            <div class="social-links">
                <a href="<?php echo $socialLinks['gitlab']; ?>" target="_blank" rel="noopener noreferrer"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.65 14.39L12 22.13 1.35 14.39a.84.84 0 0 1-.3-.94l1.22-3.78 2.44-7.51A.42.42 0 0 1 4.82 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.49h8.1l2.44-7.51A.42.42 0 0 1 18.6 2a.43.43 0 0 1 .58 0 .42.42 0 0 1 .11.18l2.44 7.51L23 13.45a.84.84 0 0 1-.35.94z"></path></svg>GitLab</a>
            </div>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Links Rapidos</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">Inicio</a></li>
                <li><a href="<?php echo $pages['blog']; ?>">Blog</a></li>
                <li><a href="<?php echo $pages['about']; ?>">Sobre</a></li>
                <li><a href="<?php echo $pages['privacy']; ?>">Privacidade</a></li>
                <li><a href="<?php echo $pages['disclaimer']; ?>">Aviso Legal</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Ferramentas de Teste</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['home']; ?>">Testador de Teclado</a></li>
                <li><a href="<?php echo $pages['mouse_test']; ?>">Testador de Mouse</a></li>
                <li><a href="<?php echo $pages['keyboard_typing']; ?>">Teste de Velocidade</a></li>
                <li><a href="<?php echo $pages['screen_test']; ?>">Testador de Tela</a></li>
                <li><a href="<?php echo $pages['mic_test']; ?>">Testador de Microfone</a></li>
                <li><a href="<?php echo $pages['webcam_test']; ?>">Testador de Webcam</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4 class="footer-heading">Mais Ferramentas</h4>
            <ul class="footer-links">
                <li><a href="<?php echo $pages['qr_generator']; ?>">Gerador de QR</a></li>
                <li><a href="<?php echo $pages['ocr_tool']; ?>">Ferramenta OCR</a></li>
                <li><a href="<?php echo $pages['password_gen']; ?>">Gerador de Senhas</a></li>
                <li><a href="<?php echo $pages['ghost_click']; ?>">Detector de Cliques Fantasma</a></li>
            </ul>
        </div>
        <div class="footer-section contact-section">
            <h4 class="footer-heading">Fique Conectado</h4>
            <div class="contact-info">
                <a href="mailto:<?php echo $siteEmail; ?>" class="contact-item"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><?php echo $siteEmail; ?></a>
            </div>
            <div class="newsletter">
                <p>Receba atualizacoes sobre novas ferramentas</p>
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" name="email" placeholder="Seu email" required>
                    <button type="submit">Inscrever</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="copyright">&copy; <?php echo $siteYear; ?> <a href="<?php echo $pages['home']; ?>"><?php echo $siteName; ?></a>. Todos os direitos reservados.</p>
        <p class="tagline">Feito com <span class="heart">&#10084;&#65039;</span> para entusiastas de tecnologia em todo o mundo</p>
    </div>
</footer>
<button id="back-to-top" class="back-to-top" aria-label="Voltar ao topo">&#8593;</button>

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
