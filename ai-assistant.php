<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free AI Assistant for Hardware Testing | KeyboardTester.click';
$pageDescription = 'Free AI assistant that helps you pick the right hardware test, explains results, and walks through keyboard, mouse, screen, and audio diagnostics in 8 languages — in-browser, no sign-up.';
$pageKeywords = 'free ai assistant, ai hardware test chatbot, ai keyboard helper, ai chat for tech support, ai tool guide, ai tech assistant, multilingual ai chat, free chatgpt alternative for hardware';
$pageOgImage = 'images/robot_18357793.png';
$pageOgImageAlt = 'KBT AI Assistant — free chat-based helper for hardware diagnostics';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('ai_assistant', [['name'=>'Home','url'=>'/'],['name'=>'AI Assistant','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-ai-assistant.php'; ?>
<section class="tool-stage" id="ai-assistant">
<div class="container tool-stage-header"><div><p class="section-kicker">AI-powered helper</p><h2>KBT AI Assistant</h2><p class="section-lede">Ask in plain English (or Spanish, French, German, Japanese, Korean, Portuguese, Arabic) which hardware test fits your problem &mdash; the AI walks you through it and explains the result.</p></div><div class="tool-stage-actions"><button type="button" class="landing-btn landing-btn-primary" id="ai-open-trigger" aria-label="Open AI chat">Open AI chat &rarr;</button><a class="landing-btn landing-btn-ghost" href="#guidelines">How it works</a></div></div>
<section class="tool-shell">
  <div style="max-width:920px;margin:0 auto;padding:clamp(16px,3vw,32px);">
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;margin-bottom:20px">
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:18px;box-shadow:0 10px 25px rgba(17,24,39,.05)">
        <div style="font-size:28px">🧠</div>
        <div style="font-weight:800;margin-top:6px">Knows every tool</div>
        <div style="font-size:13px;color:#64748b;margin-top:4px">Guides you to the right test from 37+ tools on the site.</div>
      </div>
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:18px;box-shadow:0 10px 25px rgba(17,24,39,.05)">
        <div style="font-size:28px">🌐</div>
        <div style="font-weight:800;margin-top:6px">8 languages</div>
        <div style="font-size:13px;color:#64748b;margin-top:4px">English, Spanish, French, German, Japanese, Korean, Portuguese, Arabic.</div>
      </div>
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:18px;box-shadow:0 10px 25px rgba(17,24,39,.05)">
        <div style="font-size:28px">🔒</div>
        <div style="font-weight:800;margin-top:6px">Privacy-first</div>
        <div style="font-size:13px;color:#64748b;margin-top:4px">No account. No chat history stored on our servers beyond the active session.</div>
      </div>
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:18px;box-shadow:0 10px 25px rgba(17,24,39,.05)">
        <div style="font-size:28px">⚡</div>
        <div style="font-weight:800;margin-top:6px">Fast</div>
        <div style="font-size:13px;color:#64748b;margin-top:4px">Groq-hosted model &mdash; answers in ~1 second on a good connection.</div>
      </div>
    </div>
    <div style="background:linear-gradient(135deg,#1e293b,#334155);border-radius:16px;padding:28px;box-shadow:0 20px 40px rgba(15,23,42,.15)">
      <h3 style="margin:0 0 14px;color:#f8fafc;font-size:1.25rem;font-weight:800">Try asking:</h3>
      <ul style="padding-left:20px;line-height:1.9;font-size:15px;color:#f1f5f9;margin:0">
        <li style="color:#f1f5f9">"My arrow keys sometimes don't register — which test should I run?"</li>
        <li style="color:#f1f5f9">"How do I check if my headphones play true stereo?"</li>
        <li style="color:#f1f5f9">"Is there a dead pixel on my monitor?"</li>
        <li style="color:#f1f5f9">"What's a good click-per-second for a gaming mouse?"</li>
        <li style="color:#f1f5f9">"Show me how to measure input latency."</li>
      </ul>
      <p style="margin:16px 0 0;font-size:14px;color:#cbd5e1">The assistant points you at the exact tool, links you to it, and explains what the result means once you're done.</p>
    </div>
    <p style="text-align:center;margin-top:24px">
      <button type="button" id="ai-open-trigger-2" class="landing-btn landing-btn-primary" style="padding:14px 28px;font-size:16px">Start chatting now &rarr;</button>
    </p>
  </div>
</section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Free &amp; unlimited</div><div class="trust-desc">No account, no credit card, no daily cap</div></div>
<div class="trust-item"><div class="trust-title">Rate-limited</div><div class="trust-desc">12 messages per minute, spam-safe</div></div>
<div class="trust-item"><div class="trust-title">Open source site</div><div class="trust-desc">Browser-based tools, MIT licence</div></div>
<div class="trust-item"><div class="trust-title">No chat log</div><div class="trust-desc">Conversation clears on reload</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/ai-assistant.php'; ?>
<?php $currentTool = 'keyboard'; include 'includes/related-tools.php'; ?>
<?php include 'help/ai-assistant.php'; ?>
</main>
<?php include 'footer.php'; ?>
<script>
// Wire the landing-page CTA buttons to open the existing floating AI widget.
(function(){
  function openAI(){
    var btn = document.getElementById('kbtChatBtn');
    if (btn) btn.click();
  }
  ['ai-open-trigger','ai-open-trigger-2'].forEach(function(id){
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', openAI);
  });
})();
</script>
</body></html>
