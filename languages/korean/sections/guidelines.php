<?php
/**
 * Korean Keyboard Tester - Guidelines Section
 */
?>

<section class="guidelines-section" id="guidelines" aria-labelledby="guidelines-title-ko">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">사용 가이드</p>
            <h2 id="guidelines-title-ko">키보드 테스터 사용 방법</h2>
            <p class="section-lede">키보드 테스트에서 최상의 결과를 얻으려면 다음 단계를 따르세요.</p>
        </div>

        <div class="guidelines-grid">
            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                    </svg>
                </div>
                <h3>모든 키 테스트</h3>
                <p>키보드의 각 키를 눌러 모두 올바르게 응답하는지 확인하세요. 테스트된 키는 색상이 변경됩니다.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M12 6v6l4 2"/>
                    </svg>
                </div>
                <h3>지연 시간 측정</h3>
                <p>지연 시간 모드를 활성화하여 각 키의 응답 시간을 확인하세요. 낮은 값이 더 나은 성능을 나타냅니다.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                        <circle cx="10" cy="10" r="1"/>
                        <circle cx="14" cy="10" r="1"/>
                    </svg>
                </div>
                <h3>고스팅 감지</h3>
                <p>여러 키를 동시에 눌러 고스팅 문제를 감지하세요. 일부 키가 등록되지 않으면 하드웨어 제한이 있을 수 있습니다.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                </div>
                <h3>멈춤 키 확인</h3>
                <p>키를 누르지 않았는데 계속 표시되면 키가 멈추거나 결함이 있을 수 있습니다. 해당 키를 청소하거나 교체하세요.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                </div>
                <h3>결과 내보내기</h3>
                <p>문서화 또는 기술 지원과 공유하기 위해 테스트 세션 리포트를 저장하세요.</p>
            </article>

            <article class="guideline-card">
                <div class="guideline-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <h3>완벽한 개인정보 보호</h3>
                <p>모든 테스트는 브라우저에서 로컬로 실행됩니다. 키 입력 데이터가 서버로 전송되지 않습니다.</p>
            </article>
        </div>

        <div class="faq-section">
            <h3>자주 묻는 질문</h3>
            <div class="faq-grid">
                <details class="faq-item">
                    <summary>일부 키가 등록되지 않는 이유는 무엇인가요?</summary>
                    <p>일부 키 조합은 하드웨어 제한(고스팅)으로 인해 등록되지 않을 수 있습니다. 이는 멤브레인 키보드에서 일반적입니다.</p>
                </details>
                <details class="faq-item">
                    <summary>다른 색상은 무엇을 의미하나요?</summary>
                    <p>각 색상은 키 입력 레벨을 나타냅니다: 청록색(1), 금색(2), 녹색(3), 빨간색(4), 보라색(5), 그 후 사이클이 반복됩니다.</p>
                </details>
                <details class="faq-item">
                    <summary>좋은 지연 시간은 얼마인가요?</summary>
                    <p>50ms 미만의 지연 시간은 우수합니다. 50-100ms는 허용 가능합니다. 100ms 이상은 연결 또는 하드웨어 문제를 나타낼 수 있습니다.</p>
                </details>
                <details class="faq-item">
                    <summary>블루투스 키보드에서도 작동하나요?</summary>
                    <p>네, 이 테스터는 블루투스와 USB를 포함하여 컴퓨터에 연결된 모든 유형의 키보드에서 작동합니다.</p>
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
