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
            <div class="hero-shot hero-shot--video hero-yt-facade" data-yt-id="wVyAj-nrtnI" data-yt-title="KeyboardTester.click — Тестер клавиатуры" role="button" tabindex="0" aria-label="Воспроизвести видео">
                <picture>
                    <source type="image/webp" srcset="<?php echo url("images/yt-thumbs/wVyAj-nrtnI.webp"); ?>">
                    <img class="hero-yt-thumb" src="<?php echo url("images/yt-thumbs/wVyAj-nrtnI.jpg"); ?>" alt="Предпросмотр видео тестера клавиатуры" width="480" height="270" loading="eager" fetchpriority="high" decoding="async">
                </picture>
                <span class="hero-yt-play" aria-hidden="true">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg>
                </span>
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
                    <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="Нажмите любую клавишу для начала теста" loading="lazy" decoding="async">
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
                    <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Специальные клавиши и раскладка клавиатуры" loading="lazy" decoding="async">
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
                    <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Цветовая система и экспортируемые результаты" loading="lazy" decoding="async">
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

<section class="latency-reference-ru" aria-labelledby="latency-reference-ru-title" style="padding:60px 20px;background:var(--bg-secondary);">
  <div class="container" style="max-width:1000px;margin:0 auto;">
    <div class="section-head">
      <p class="section-kicker">Справочник</p>
      <h2 id="latency-reference-ru-title">Какая задержка клавиатуры считается хорошей?</h2>
      <p class="section-lede">Сравните результаты теста задержки клавиатуры с этой таблицей. Чем ниже значение, тем лучше — но «хороший» порог зависит от того, как вы используете клавиатуру.</p>
    </div>
    <div style="overflow-x:auto;margin-top:24px;">
      <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
        <thead>
          <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
            <th style="text-align:left;padding:12px 16px;">Использование</th>
            <th style="text-align:left;padding:12px 16px;">Целевая задержка</th>
            <th style="text-align:left;padding:12px 16px;">Типичное оборудование</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Киберспорт (FPS, файтинги)</strong></td><td style="padding:12px 16px;">&lt; 5 мс</td><td style="padding:12px 16px;">Проводная механическая (красные/серебряные переключатели)</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Обычные игры</strong></td><td style="padding:12px 16px;">5–10 мс</td><td style="padding:12px 16px;">Большинство проводных механических или качественных мембранных клавиатур</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Офисная работа и набор текста</strong></td><td style="padding:12px 16px;">10–20 мс</td><td style="padding:12px 16px;">Проводные или 2.4 ГГц беспроводные клавиатуры</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Bluetooth / беспроводные</strong></td><td style="padding:12px 16px;">15–30 мс</td><td style="padding:12px 16px;">Bluetooth-клавиатуры (слотовый опрос увеличивает задержку)</td></tr>
          <tr><td style="padding:12px 16px;"><strong>Тревожный уровень</strong></td><td style="padding:12px 16px;">&gt; 40 мс постоянно</td><td style="padding:12px 16px;">Изношенные переключатели, загруженный USB-хаб, проблема с драйверами</td></tr>
        </tbody>
      </table>
    </div>
    <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
      <strong>Примечание:</strong> данный инструмент измеряет время от события <code>keydown</code> в JavaScript до его обработки. Задержка опроса USB (1 мс при 1000 Гц, 8 мс при 125 Гц) и задержка обновления монитора не учитываются. Для сравнения клавиатуры А и B на одном компьютере браузерный замер надёжен, но для абсолютных аппаратных характеристик нужны специализированные инструменты вроде NVIDIA LDAT.
    </div>
  </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "Проверка клавиатуры онлайн",
  "description": "Бесплатный онлайн инструмент для проверки клавиатуры. Тест задержки, ghosting, N-key rollover, проверка залипающих клавиш.",
  "url": "<?php echo url('languages/russian/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any (web browser)",
  "browserRequirements": "Requires JavaScript",
  "isAccessibleForFree": true,
  "inLanguage": "ru",
  "featureList": [
    "Проверка всех клавиш",
    "Обнаружение ghosting",
    "Тест N-key rollover (NKRO)",
    "Измерение задержки в миллисекундах",
    "Поддержка ЙЦУКЕН и QWERTY",
    "Тёмная тема"
  ]
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "Как проверить клавиатуру онлайн?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Нажимайте каждую клавишу клавиатуры по очереди. Каждая клавиша подсвечивается на виртуальной клавиатуре при нажатии — те, что не загораются, не распознаются. Цветовая индикация показывает скорость отклика: зелёный — быстро (менее 10 мс), жёлтый — нормально, красный — медленно или возможный отказ клавиши."
      }
    },
    {
      "@type": "Question",
      "name": "Что такое ghosting клавиатуры и как его проверить?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Ghosting — это когда клавиатура не регистрирует все клавиши при одновременном нажатии. Тест: одновременно нажмите 3-4 игровые клавиши (например, W+A+D+Пробел). Если какая-то клавиша не подсвечивается, эта комбинация подвержена ghosting. Клавиатуры с N-key rollover (NKRO) корректно распознают любые комбинации клавиш."
      }
    },
    {
      "@type": "Question",
      "name": "Как измеряется задержка клавиатуры?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Время от нажатия клавиши до отображения результата измеряется в миллисекундах. Типичные значения: игровые клавиатуры 1-5 мс, обычные офисные 5-15 мс, беспроводные/Bluetooth 8-25 мс. Этот инструмент измеряет задержку браузер-рендер (без учёта USB-опроса и дребезга переключателя)."
      }
    },
    {
      "@type": "Question",
      "name": "Поддерживаются ли русская и английская раскладки?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Да, поддерживаются раскладки ЙЦУКЕН и QWERTY с переключением между ними. При активной русской раскладке вы можете проверить русские буквы; при английской — латинские. Тест работает независимо от текущей раскладки операционной системы."
      }
    },
    {
      "@type": "Question",
      "name": "Почему некоторые клавиши клавиатуры не работают?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Самые частые причины: (1) грязь под клавишей (продувка сжатым воздухом), (2) износ контактов переключателя, (3) повреждение пайки PCB, (4) проблема с драйвером (попробуйте другой USB-порт). Если клавиша регистрируется в этом тесте, но не работает в другой программе — проблема программная; если не регистрируется здесь — аппаратная."
      }
    },
    {
      "@type": "Question",
      "name": "Бесплатна ли эта проверка клавиатуры и безопасна ли?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Полностью бесплатно, без регистрации и без загрузки. Все тесты выполняются только в вашем браузере с помощью JavaScript, информация о нажатиях клавиш не передаётся на серверы. Конфиденциальность гарантируется."
      }
    }
  ]
}
</script>
