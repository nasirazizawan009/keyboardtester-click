<?php
/**
 * Russian Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">Инструмент диагностики клавиатуры</p>
            <h1 class="hero-title">Проверьте каждую клавишу с мгновенной обратной связью за секунды</h1>
            <p class="hero-lede">Мгновенная подсветка клавиш, смена раскладок, проверка ghosting и экспорт отчётов. Без установки. Без регистрации.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">Начать тест клавиатуры</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">Все инструменты</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">Без установки</span>
                <span class="hero-badge">Множество раскладок</span>
                <span class="hero-badge">Полная приватность</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">Поддерживаемых клавиш</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">Цветовых тем</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">Операционные системы</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Интерфейс тестера русской клавиатуры" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">Диагностика в реальном времени</div>
                    <p>Наблюдайте за нажатиями, тепловой картой и временем отклика в реальном времени.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">Смена раскладки</div>
                    <p>Меняйте раскладки и метки ОС не покидая страницу.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage -->
<section class="tool-stage" aria-labelledby="tool-stage-title-ru">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">Основной Инструмент</p>
            <h2 id="tool-stage-title-ru">Тестер Клавиатуры</h2>
            <p class="section-lede">Используйте инструмент ниже для проверки каждой клавиши, верификации раскладок и измерения задержки.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">Быстрые советы</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="Основные возможности">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">Без установки</div>
            <div class="trust-desc">Работает полностью в вашем браузере</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Поддержка раскладок</div>
            <div class="trust-desc">ЙЦУКЕН, QWERTY, AZERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Диагностика в реальном времени</div>
            <div class="trust-desc">Данные клавиш, тепловая карта и задержка мгновенно</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">Приватность прежде всего</div>
            <div class="trust-desc">Ваши данные никогда не покидают устройство</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-ru">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Разработано для быстрой диагностики</p>
            <h2 id="feature-title-ru">Всё необходимое для проверки клавиатуры</h2>
            <p class="section-lede">Набор инструментов для ежедневных проверок, тикетов поддержки и устранения неполадок оборудования.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>Карта клавиш в реальном времени</h3>
                <p>Наблюдайте за каждым нажатием с мгновенной цветовой обратной связью и историей клавиш.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Ghosting и задержка</h3>
                <p>Измеряйте время отклика и обнаруживайте призрачные нажатия встроенными инструментами.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Мультиустройственная поддержка</h3>
                <p>Меняйте раскладки и метки ОС на лету без перезагрузки страницы.</p>
            </article>
            <article class="landing-feature-card">
                <h3>Экспорт результатов</h3>
                <p>Сохраняйте отчёт сессии для документации или техподдержки.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-ru">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">Простой рабочий процесс</p>
                <h2 id="process-title-ru">Три шага для проверки клавиатуры</h2>
            </div>
            <p class="section-lede">Выполните полную проверку менее чем за минуту и экспортируйте результаты при необходимости.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Нажмите любую клавишу для начала теста" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>Нажмите любую клавишу</h3>
                    <p>Начните печатать и наблюдайте как карта клавиш реагирует в реальном времени.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Специальные клавиши и раскладка клавиатуры" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>Изучите аналитику</h3>
                    <p>Откройте расширенные опции для тепловой карты, статистики и теста ghosting.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Цветовая система и экспортируемые результаты" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>Экспортируйте сессию</h3>
                    <p>Скачайте отчёт для систематизации ваших диагностических данных.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Тестер русской клавиатуры",
  "description": "Бесплатный онлайн инструмент для тестирования русской клавиатуры",
  "url": "<?php echo url('languages/russian/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "ru"
}
</script>
