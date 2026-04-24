<?php
/**
 * Korean localized landing page for AI Assistant.
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'AI 어시스턴트 - 무료 하드웨어 테스트 | KeyboardTester.click';
$pageDescription = '적절한 하드웨어 테스트 선택을 돕고 결과를 설명하며 키보드·마우스·화면·오디오 진단을 8개 언어로 안내하는 무료 AI 어시스턴트.';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="es" href="<?php echo absoluteUrl('languages/spanish/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="fr" href="<?php echo absoluteUrl('languages/french/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/ai-assistant.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ai-assistant.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">AI 도우미</p>
          <h1 class="hero-title">무료 AI 어시스턴트 - 하드웨어 테스트용</h1>
          <p class="hero-lede">하드웨어 문제를 자연스러운 말로 설명하면 AI가 맞는 테스트를 골라 설명하고 바로 안내합니다. 다국어(8개 언어), 가입 불필요, 모든 페이지에 플로팅 위젯으로 표시.</p>
          <div class="hero-actions">
            <button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-hero-ko">AI 채팅 열기 &rarr;</button>
            <a class="landing-btn landing-btn-ghost" href="<?php echo url('languages/korean/'); ?>">모든 도구 보기</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot" style="background:linear-gradient(135deg,#1e293b,#475569);display:flex;align-items:center;justify-content:center;padding:40px">
            <img src="<?php echo url('images/robot_18357793.png'); ?>" width="280" height="280" alt="KBT AI Assistant" loading="eager" decoding="async" fetchpriority="high" style="max-width:55%;height:auto">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="ai-assistant">
      <div class="container tool-stage-header"><div><p class="section-kicker">AI 기반 도우미</p><h2>KBT AI 어시스턴트</h2><p class="section-lede">자연스러운 말로 어떤 테스트가 내 문제에 맞는지 물어보세요 — AI가 안내하고 결과를 설명합니다.</p></div><div class="tool-stage-actions"><button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-ko">AI 채팅 열기 &rarr;</button></div></div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
  <script>
  (function(){{
    function openAI(){{ var b=document.getElementById('kbtChatBtn'); if(b)b.click(); }}
    ['ai-open-trigger-hero-ko','ai-open-trigger-ko'].forEach(function(id){{
      var el=document.getElementById(id); if(el)el.addEventListener('click',openAI);
    }});
  }})();
  </script>
</body>
</html>
