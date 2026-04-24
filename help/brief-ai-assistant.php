<section class="landing-hero">
  <div class="container landing-hero-grid">
    <div class="hero-copy">
      <p class="hero-kicker">AI-powered helper</p>
      <h1 class="hero-title">Free AI Assistant for Keyboard, Mouse, Screen & Audio Tests</h1>
      <p class="hero-lede">Describe your hardware problem in plain language and the AI assistant picks the right test, links you to it, and explains the result. Multilingual (8 languages), privacy-first (no account), and lives as a floating chat window on every page of KeyboardTester.click.</p>
      <div class="hero-actions">
        <button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger-hero" aria-label="Open AI chat">Open AI chat &rarr;</button>
        <a class="landing-btn landing-btn-ghost" href="#tools">Browse all tools</a>
      </div>
      <div class="hero-badges">
        <span class="hero-badge">8 languages</span>
        <span class="hero-badge">No sign-up</span>
        <span class="hero-badge">~1s responses</span>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-shot" style="background:linear-gradient(135deg,#1e293b,#475569);display:flex;align-items:center;justify-content:center;padding:40px">
        <img src="<?php echo url('images/robot_18357793.png'); ?>" width="280" height="280" alt="KBT AI Assistant robot icon — free hardware test chatbot" loading="eager" decoding="async" fetchpriority="high" style="max-width:55%;height:auto">
      </div>
    </div>
  </div>
</section>
<script>
(function(){
  var el = document.getElementById('ai-open-trigger-hero');
  if (el) el.addEventListener('click', function(){
    var btn = document.getElementById('kbtChatBtn'); if (btn) btn.click();
  });
})();
</script>
