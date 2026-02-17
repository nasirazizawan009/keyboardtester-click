<?php
/**
 * Tools List Component
 * Localized (ko) - Updated with Korean tool links
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section" id="tools" aria-labelledby="tools-hub-title">
    <div class="container">
        <h2 id="tools-hub-title">더 많은 테스트 도구</h2>
        <p class="section-subtitle">키보드, 마우스, 오디오, 유틸리티 전체 도구를 확인하세요.</p>
        <p class="language-note">모든 도구가 한국어 인터페이스로 제공됩니다.</p>

        <div class="tools-grid">
            <a href="<?php echo url('languages/korean/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>키보드 테스터</h3>
                <p>키보드 기능을 테스트하고 고스팅을 감지하며 지연 시간과 눌림 문제를 확인</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>마우스 테스터</h3>
                <p>버튼, 스크롤 휠, 커서 이동, 반응성을 확인</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/click-speed.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>클릭 속도 테스트</h3>
                <p>클릭 속도(CPM/CPS)를 시간 제한 테스트로 측정</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/dpi-tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>마우스 감도 / DPI</h3>
                <p>DPI, 감도, 트래킹 정확도 테스트</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/ghost-click.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>고스트 클릭 감지</h3>
                <p>의도치 않은 클릭을 감지</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/typing-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6h16"/>
                                    <path d="M7 10h10"/>
                                    <path d="M9 14h6"/>
                                    <path d="M11 18h2"/>
                                </svg>
                            </div>
                <h3>타이핑 속도 테스트</h3>
                <p>WPM, 정확도, 타이핑 일관성 측정</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/screen-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>스크린 테스터</h3>
                <p>죽은/고정/핫 픽셀 감지</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/mic-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M5 11a7 7 0 0 0 14 0"/>
                                    <path d="M12 18v4"/>
                                    <path d="M8 22h8"/>
                                </svg>
                            </div>
                <h3>마이크 테스터</h3>
                <p>마이크 입력과 오디오 레벨 확인</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/mouse-trail.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 18c4-6 8-8 16-10"/>
                                    <circle cx="6" cy="16" r="1"/>
                                    <circle cx="10" cy="13" r="1"/>
                                    <circle cx="14" cy="11" r="1"/>
                                </svg>
                            </div>
                <h3>마우스 궤적</h3>
                <p>마우스 이동 경로와 정밀도 시각화</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>지연 시간 검사기</h3>
                <p>브라우저에서 장치/입력 지연을 테스트</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/webcam-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>웹캠 테스터</h3>
                <p>웹캠 품질, 해상도, 스냅샷 확인</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/headphone-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>헤드폰 / 스피커 테스터</h3>
                <p>스테레오 채널과 음향 출력 테스트</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/ocr-tool.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7V4h3"/>
                                    <path d="M20 7V4h-3"/>
                                    <path d="M4 17v3h3"/>
                                    <path d="M20 17v3h-3"/>
                                    <path d="M8 12h8"/>
                                    <path d="M10 9h4"/>
                                    <path d="M10 15h4"/>
                                </svg>
                            </div>
                <h3>OCR 도구</h3>
                <p>이미지에서 텍스트를 빠르게 추출</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/qr-reader.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M15 15h6v6h-6z"/>
                                    <path d="M12 12h2"/>
                                    <path d="M12 8h2"/>
                                    <path d="M8 12h2"/>
                                </svg>
                            </div>
                <h3>QR 코드 리더</h3>
                <p>카메라 또는 이미지로 QR 코드 스캔</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/qr-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M14 14h7v7h-7z"/>
                                    <path d="M9 9h6"/>
                                </svg>
                            </div>
                <h3>QR 코드 생성기</h3>
                <p>맞춤 QR 코드를 즉시 생성</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
            <a href="<?php echo url('languages/korean/password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>비밀번호 생성기</h3>
                <p>강력하고 안전한 비밀번호를 즉시 생성</p>
                <span class="tool-card-link">도구 열기</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
