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
            <div class="hero-shot hero-shot--video hero-yt-facade" data-yt-id="wVyAj-nrtnI" data-yt-title="KeyboardTester.click — 키보드 테스터" role="button" tabindex="0" aria-label="비디오 재생">
                <picture>
                    <source type="image/webp" srcset="<?php echo url("images/yt-thumbs/wVyAj-nrtnI.webp"); ?>">
                    <img class="hero-yt-thumb" src="<?php echo url("images/yt-thumbs/wVyAj-nrtnI.jpg"); ?>" alt="키보드 테스터 비디오 미리보기" width="480" height="270" loading="eager" fetchpriority="high" decoding="async">
                </picture>
                <span class="hero-yt-play" aria-hidden="true">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="#fff"><path d="M8 5v14l11-7z"/></svg>
                </span>
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
                    <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="아무 키나 눌러 테스트 시작" loading="lazy" decoding="async">
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
                    <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="특수 키 및 키보드 레이아웃" loading="lazy" decoding="async">
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
                    <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="색상 시스템 및 내보내기 가능한 결과" loading="lazy" decoding="async">
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

<section class="latency-reference-ko" aria-labelledby="latency-reference-ko-title" style="padding:60px 20px;background:var(--bg-secondary);">
  <div class="container" style="max-width:1000px;margin:0 auto;">
    <div class="section-head">
      <p class="section-kicker">참고 자료</p>
      <h2 id="latency-reference-ko-title">좋은 키보드 지연시간은 얼마인가요?</h2>
      <p class="section-lede">위의 키보드 지연시간 테스트 결과를 다음 표와 비교하세요. 낮을수록 좋지만, 용도에 따라 "좋은" 기준이 다릅니다.</p>
    </div>
    <div style="overflow-x:auto;margin-top:24px;">
      <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
        <thead>
          <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
            <th style="text-align:left;padding:12px 16px;">용도</th>
            <th style="text-align:left;padding:12px 16px;">목표 지연시간</th>
            <th style="text-align:left;padding:12px 16px;">일반적인 하드웨어</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>e스포츠 (FPS, 격투 게임)</strong></td><td style="padding:12px 16px;">5ms 미만</td><td style="padding:12px 16px;">유선 기계식 (적축/은축)</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>일반 게이밍</strong></td><td style="padding:12px 16px;">5–10ms</td><td style="padding:12px 16px;">유선 기계식·고급 멤브레인 키보드</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>사무 작업·문서 작성</strong></td><td style="padding:12px 16px;">10–20ms</td><td style="padding:12px 16px;">일반 유선·2.4GHz 무선 키보드</td></tr>
          <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>블루투스 무선</strong></td><td style="padding:12px 16px;">15–30ms</td><td style="padding:12px 16px;">블루투스 키보드 (슬롯 폴링으로 인한 지연)</td></tr>
          <tr><td style="padding:12px 16px;"><strong>고장 의심 수준</strong></td><td style="padding:12px 16px;">40ms 이상 (지속적)</td><td style="padding:12px 16px;">스위치 마모, USB 허브 병목, 드라이버 문제</td></tr>
        </tbody>
      </table>
    </div>
    <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
      <strong>참고:</strong> 본 도구는 JavaScript의 keydown 이벤트부터 처리까지의 시간을 측정합니다. USB 폴링 지연(1000Hz에서 1ms, 125Hz에서 8ms)과 모니터 새로고침 지연은 포함되지 않습니다. 동일한 컴퓨터에서 키보드 A와 B를 비교하려면 이 도구가 정확하지만, 절대 하드웨어 사양 측정에는 NVIDIA LDAT 같은 전용 도구가 필요합니다.
    </div>
  </div>
</section>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "온라인 키보드 테스트",
  "description": "한글·기계식·멤브레인·노트북 키보드를 무료로 온라인 테스트하는 도구. 고스팅, N-키 롤오버, 지연시간 측정 가능.",
  "url": "<?php echo url('languages/korean/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any (web browser)",
  "browserRequirements": "Requires JavaScript",
  "isAccessibleForFree": true,
  "inLanguage": "ko",
  "featureList": [
    "모든 키 테스트",
    "고스팅 감지",
    "N-키 롤오버 (NKRO) 테스트",
    "키보드 지연시간 측정 (밀리초)",
    "두벌식·세벌식 한글 레이아웃 지원",
    "다크 모드"
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
      "name": "온라인에서 키보드 테스트를 어떻게 하나요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "이 페이지의 가상 키보드에 키를 하나씩 누르면 됩니다. 각 키가 화면에 표시되며, 표시되지 않는 키는 인식되지 않는 것입니다. 색상 코드는 응답 속도를 나타냅니다 — 녹색은 빠름(10ms 미만), 노란색은 보통, 빨간색은 느림 또는 고장 가능성을 의미합니다."
      }
    },
    {
      "@type": "Question",
      "name": "키보드 고스팅이란 무엇이며 어떻게 테스트하나요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "고스팅은 여러 키를 동시에 눌렀을 때 일부 키가 인식되지 않는 현상입니다. 테스트 방법: WASD + Shift + Space 같은 게임 키 조합을 동시에 눌러보세요. 일부 키가 표시되지 않으면 그 조합이 고스팅에 영향받는 것입니다. N-키 롤오버(NKRO) 키보드는 모든 키 조합이 정확히 인식됩니다."
      }
    },
    {
      "@type": "Question",
      "name": "키보드 지연시간(딜레이)은 어떻게 측정하나요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "키 입력부터 화면 반응까지의 시간을 밀리초 단위로 측정합니다. 일반적인 값: 게이밍 키보드 1-5ms, 일반 사무용 5-15ms, 무선/블루투스 키보드 8-25ms. 본 도구는 브라우저-렌더 지연시간을 측정합니다 (USB 폴링 레이트와 스위치 디바운스는 포함되지 않음)."
      }
    },
    {
      "@type": "Question",
      "name": "한글 두벌식과 세벌식 키보드도 테스트할 수 있나요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "네, 두벌식·세벌식·QWERTY 등 모든 한글 입력 방식을 지원합니다. 한글 IME가 활성화된 상태에서 자음(ㄱ, ㄴ, ㄷ...)과 모음(ㅏ, ㅓ, ㅗ...)을 각각 눌러 정확히 인식되는지 확인할 수 있습니다."
      }
    },
    {
      "@type": "Question",
      "name": "키보드 키가 작동하지 않는 이유는 무엇인가요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "가장 흔한 원인: (1) 키캡 아래의 먼지나 이물질 (압축 공기로 청소), (2) 스위치 접점 마모 (더 세게 눌러보기), (3) PCB 납땜 손상 (육안으로 확인 가능), (4) 드라이버 문제 (다른 USB 포트 시도). 이 도구로 등록되지만 다른 프로그램에서 작동하지 않으면 소프트웨어 문제이며, 여기서도 등록되지 않으면 하드웨어 문제입니다."
      }
    },
    {
      "@type": "Question",
      "name": "이 키보드 테스트는 무료이고 안전한가요?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "완전 무료이며 회원가입이나 다운로드가 필요하지 않습니다. 모든 테스트는 브라우저 내에서 JavaScript로만 실행되며, 입력된 키 정보는 어떠한 서버로도 전송되지 않습니다. 개인정보 보호가 보장됩니다."
      }
    }
  ]
}
</script>
