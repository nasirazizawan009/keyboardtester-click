<?php
/**
 * Korean Keyboard Tester - Hero Section
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">키보드 진단 도구</p>
            <h1 class="hero-title">몇 초 만에 즉각적인 피드백으로 모든 키를 테스트하세요</h1>
            <p class="hero-lede">즉각적인 키 하이라이팅, 레이아웃 전환, 고스팅 테스트 및 내보내기 가능한 리포트. 설치 없음. 가입 없음.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">키보드 테스트 시작</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">모든 도구 살펴보기</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">설치 필요 없음</span>
                <span class="hero-badge">다양한 레이아웃</span>
                <span class="hero-badge">완벽한 개인정보 보호</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">지원 키</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">테마 포함</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">운영 체제</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="한국어 키보드 테스터 인터페이스" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">실시간 진단</div>
                    <p>키 입력, 히트맵 밀도, 응답 시간을 실시간으로 확인하세요.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">레이아웃 전환</div>
                    <p>세션을 잃지 않고 레이아웃과 OS 라벨을 변경하세요.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage -->
<section class="tool-stage" aria-labelledby="tool-stage-title-ko">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">주요 도구</p>
            <h2 id="tool-stage-title-ko">키보드 테스터</h2>
            <p class="section-lede">아래 도구를 사용하여 각 키를 테스트하고, 레이아웃을 확인하고, 지연 시간을 측정하세요.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="주요 기능">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">설치 필요 없음</div>
            <div class="trust-desc">브라우저에서 완전히 작동합니다</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">레이아웃 지원</div>
            <div class="trust-desc">QWERTY, AZERTY, Colemak, Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">실시간 진단</div>
            <div class="trust-desc">키 데이터, 히트맵, 지연 시간 즉시 확인</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">개인정보 우선</div>
            <div class="trust-desc">데이터가 기기를 떠나지 않습니다</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-ko">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">빠른 진단을 위해 설계</p>
            <h2 id="feature-title-ko">키보드 확인에 필요한 모든 것</h2>
            <p class="section-lede">일상적인 확인, 지원 티켓, 하드웨어 문제 해결을 위한 집중된 도구 세트.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>실시간 키 맵</h3>
                <p>색상 피드백과 키 기록으로 모든 키 입력이 즉시 강조됩니다.</p>
            </article>
            <article class="landing-feature-card">
                <h3>고스팅 및 지연 시간</h3>
                <p>내장 도구로 응답 시간을 측정하고 고스트 입력을 감지하세요.</p>
            </article>
            <article class="landing-feature-card">
                <h3>다중 기기 지원</h3>
                <p>페이지를 떠나지 않고 레이아웃과 OS 라벨을 즉시 전환하세요.</p>
            </article>
            <article class="landing-feature-card">
                <h3>내보내기 가능한 결과</h3>
                <p>QC 노트나 지원 문서를 위한 세션 리포트를 저장하세요.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band -->
<section class="process-band" aria-labelledby="process-title-ko">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">간단한 워크플로우</p>
                <h2 id="process-title-ko">키보드 확인 3단계</h2>
            </div>
            <p class="section-lede">1분 이내에 완전한 검사를 수행하고 필요시 결과를 내보내세요.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="아무 키나 눌러 테스트 시작" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>아무 키나 누르세요</h3>
                    <p>타이핑을 시작하면 키 맵이 실시간으로 반응합니다.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="특수 키 및 키보드 레이아웃" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>분석 확인</h3>
                    <p>히트맵, 통계, 고스팅 테스트를 위한 고급 옵션을 여세요.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="색상 시스템 및 내보내기 가능한 결과" loading="lazy">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>세션 내보내기</h3>
                    <p>진단을 체계적으로 정리하기 위해 리포트를 다운로드하세요.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "한국어 키보드 테스터",
  "description": "한국어 키보드를 무료로 온라인 테스트하는 도구",
  "url": "<?php echo url('languages/korean/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
  "inLanguage": "ko"
}
</script>
