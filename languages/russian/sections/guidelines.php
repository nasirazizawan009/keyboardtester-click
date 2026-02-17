<?php
/**
 * Russian Keyboard Tester - Guidelines Section
 */
?>

<section class="guidelines-section" id="guidelines" aria-labelledby="guidelines-title-ru">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">Руководство пользователя</p>
            <h2 id="guidelines-title-ru">Как использовать тестер клавиатуры</h2>
            <p class="section-lede">Следуйте этим шагам для получения лучших результатов теста клавиатуры.</p>
        </div>

        <div class="guidelines-grid">
            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    </svg>
                </div>
                <h3>Проверьте все клавиши</h3>
                <p>Нажмите каждую клавишу на клавиатуре, чтобы убедиться, что все они реагируют правильно. Протестированные клавиши изменят цвет.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>Измерьте задержку</h3>
                <p>Включите режим задержки, чтобы увидеть время отклика каждой клавиши. Меньшие значения означают лучшую производительность.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>Обнаружьте ghosting</h3>
                <p>Нажмите несколько клавиш одновременно, чтобы обнаружить проблемы ghosting. Если какая-то клавиша не регистрируется, возможны ограничения оборудования.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                </div>
                <h3>Проверьте залипающие клавиши</h3>
                <p>Если клавиша остаётся подсвеченной без нажатия, она может быть заблокирована или неисправна. Очистите или замените повреждённую клавишу.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>Экспортируйте результаты</h3>
                <p>Сохраните отчёт вашей тестовой сессии для документации или отправки в техническую поддержку.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>Полная приватность</h3>
                <p>Все тесты выполняются локально в вашем браузере. Данные о нажатиях никогда не отправляются ни на какой сервер.</p>
            </article>
        </div>

        <div class="faq-section">
            <h3>Часто задаваемые вопросы</h3>
            <div class="faq-grid">
                <details class="faq-item">
                    <summary>Почему некоторые клавиши не регистрируются?</summary>
                    <p>Некоторые комбинации клавиш могут не регистрироваться из-за ограничений оборудования (ghosting). Это нормально для мембранных клавиатур.</p>
                </details>
                <details class="faq-item">
                    <summary>Что означают разные цвета?</summary>
                    <p>Каждый цвет представляет уровень нажатий: голубой (1), золотой (2), зелёный (3), красный (4), пурпурный (5), затем цикл повторяется.</p>
                </details>
                <details class="faq-item">
                    <summary>Какая задержка считается хорошей?</summary>
                    <p>Задержка менее 50мс отличная. От 50 до 100мс приемлема. Более 100мс может указывать на проблемы с подключением или оборудованием.</p>
                </details>
                <details class="faq-item">
                    <summary>Работает ли с Bluetooth клавиатурами?</summary>
                    <p>Да, тестер работает с любым типом клавиатуры, подключённой к вашему компьютеру, включая Bluetooth и USB.</p>
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
