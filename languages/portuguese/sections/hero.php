<?php
/**
 * Portuguese Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">Ferramenta de Diagnostico de Teclado</p>
            <h1 class="hero-title">Teste Cada Tecla com Feedback Instantaneo em Segundos</h1>
            <p class="hero-lede">Destaque instantaneo de teclas, troca de layouts, teste de ghosting e relatorios exportaveis. Sem instalacao. Sem cadastro.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">Iniciar Teste de Teclado</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">Explorar Todas as Ferramentas</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">Sem Instalacao</span>
                <span class="hero-badge">Multiplos Layouts</span>
                <span class="hero-badge">Privacidade Total</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">Teclas Suportadas</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">Temas Incluidos</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">Sistemas Operacionais</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Interface do testador de teclado portugues" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">Diagnostico em Tempo Real</div>
                    <p>Observe pressionamentos, densidade do mapa de calor e tempo de resposta em tempo real.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">Troca de Layout</div>
                    <p>Mude layouts e rotulos de SO sem perder sua sessao.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage -->
<section class="tool-stage" aria-labelledby="tool-stage-title-pt">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">Ferramenta Principal</p>
            <h2 id="tool-stage-title-pt">Testador de Teclado</h2>
            <p class="section-lede">Use a ferramenta abaixo para testar cada tecla, verificar layouts e medir latencia.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Ver Dicas Rapidas</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Recursos principais">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">Sem Instalacao</div>
            <div class="trust-desc">Funciona completamente no seu navegador</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Suporte a Layouts</div>
            <div class="trust-desc">QWERTY, AZERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Diagnostico em Tempo Real</div>
            <div class="trust-desc">Dados de teclas, mapa de calor e latencia instantaneos</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Privacidade em Primeiro</div>
            <div class="trust-desc">Seus dados nunca saem do seu dispositivo</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-pt">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Projetado para Diagnostico Rapido</p>
            <h2 id="feature-title-pt">Tudo que Voce Precisa para Verificar seu Teclado</h2>
            <p class="section-lede">Um conjunto de ferramentas focadas para verificacoes diarias, tickets de suporte e solucao de problemas de hardware.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>Mapa de Teclas ao Vivo</h3>
                <p>Observe cada pressionamento destacado instantaneamente com feedback de cor e historico de teclas.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Ghosting e Latencia</h3>
                <p>Meca o tempo de resposta e detecte entradas fantasma com ferramentas integradas.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Suporte Multi-dispositivo</h3>
                <p>Mude layouts e rotulos de SO na hora sem sair da pagina.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Resultados Exportaveis</h3>
                <p>Salve um relatorio de sessao para notas de controle de qualidade ou documentacao de suporte.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-pt">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">Fluxo de Trabalho Simples</p>
                <h2 id="process-title-pt">Tres Passos para Verificar seu Teclado</h2>
            </div>
            <p class="section-lede">Faca uma verificacao completa em menos de um minuto e exporte resultados se necessario.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Pressione qualquer tecla para iniciar o teste" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>Pressione Qualquer Tecla</h3>
                    <p>Comece a digitar e veja como o mapa de teclas responde em tempo real.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Teclas especiais e layout do teclado" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>Revise as Analiticas</h3>
                    <p>Abra opcoes avancadas para mapa de calor, estatisticas e teste de ghosting.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Sistema de cores e resultados exportaveis" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>Exporte a Sessao</h3>
                    <p>Baixe um relatorio para manter seus diagnosticos organizados.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Testador de Teclado Portugues",
  "description": "Ferramenta gratuita para testar teclado portugues online",
  "url": "<?php echo url('languages/portuguese/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "pt"
}
</script>
