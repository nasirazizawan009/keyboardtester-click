<?php
/**
 * Korean localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '베이스 테스트 - 서브우퍼용 20 Hz ~ 200 Hz 스윕';
$pageDescription = '무료 온라인 베이스 테스트. 20 Hz에서 200 Hz까지 주파수 스윕과 ISO 베이스 프리셋으로 서브우퍼, 스튜디오 모니터, 헤드폰을 확인. 설치 불필요.';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">오디오 진단</p>
          <h1 class="hero-title">베이스 테스트 - 서브우퍼 & 20-200 Hz 스윕</h1>
          <p class="hero-lede">서브우퍼, 스튜디오 모니터, 헤드폰이 저주파를 정확히 재생하는지 확인합니다. 20-200 Hz 스윕, ISO 1/3 옥타브 프리셋, 또는 홀드 모드. 순수 사인파로 명확한 진단.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">테스트 시작</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">모든 도구</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">오디오 진단</p>
          <h2>베이스 테스트</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
