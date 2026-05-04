<?php
/**
 * KBT AI Chat — Claude Haiku backend
 * Accepts POST JSON: { message: string, history: [{role, content}] }
 * Returns JSON:      { reply: string } | { error: string }
 */
header('Content-Type: application/json; charset=utf-8');
header('X-Robots-Tag: noindex');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

require_once __DIR__ . '/config.php';

$configFile = __DIR__ . '/ai-config.php';
if (!file_exists($configFile)) {
    http_response_code(503);
    echo json_encode(['error' => 'AI not configured (missing ai-config.php)']);
    exit;
}
require_once $configFile;

// Auto-load blog registry — add new posts to blog/posts-data.php; bot knows them instantly
$_kbtBlogRegistry = include __DIR__ . '/blog/posts-data.php';

if (!defined('GROQ_API_KEY') || GROQ_API_KEY === 'YOUR_KEY_HERE') {
    http_response_code(503);
    echo json_encode(['error' => 'Please set your Groq API key in ai-config.php']);
    exit;
}

// Session-based rate limit: 12 messages per minute per visitor
if (session_status() === PHP_SESSION_NONE) session_start();
$now = time();
if (empty($_SESSION['kbt_ai_win']) || $now - $_SESSION['kbt_ai_win'] > 60) {
    $_SESSION['kbt_ai_win']   = $now;
    $_SESSION['kbt_ai_count'] = 0;
}
if (++$_SESSION['kbt_ai_count'] > 12) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many messages — please wait a moment ⏳']);
    exit;
}

$body        = json_decode(file_get_contents('php://input'), true) ?? [];
$message     = trim((string)($body['message'] ?? ''));
$history     = is_array($body['history']) ? $body['history'] : [];
$lang        = trim((string)($body['lang'] ?? 'en'));
$userContext = trim((string)($body['userContext'] ?? ''));

$VALID_LANGS = ['en','es','fr','de','ja','ko','pt','ar'];
if (!in_array($lang, $VALID_LANGS, true)) $lang = 'en';

// ── Localized tool URL builder ────────────────────────────────────────────────
$LANG_FOLDERS = [
    'es' => 'spanish', 'fr' => 'french',  'de' => 'german',
    'ja' => 'japanese','ko' => 'korean',   'pt' => 'portuguese',
    'ar' => 'arabic',
];

// Replace English tool URLs inline in the system prompt with localized equivalents.
// This is more reliable than appending a second list — the LLM sees the right URLs first.
function kbtLocalizePrompt($prompt, $lang, $langFolders) {
    if ($lang === 'en' || !isset($langFolders[$lang])) return $prompt;
    $b   = 'https://keyboardtester.click/languages/' . $langFolders[$lang];
    $eng = 'https://keyboardtester.click';
    $pwUrl = in_array($lang, ['fr','de','pt'], true)
           ? "$b/password-generator.php"
           : "$eng/auto-password-generator.php";

    // Each pair: [english_url_in_prompt, localized_url]
    $replacements = [
        // Keyboard tester root — must match exactly the trailing ) in the markdown link
        "$eng/)" => "$b/index.php)",
        // Keyboard tools
        "$eng/keyboard_typing_test.php)"         => "$b/typing-test.php)",
        "$eng/latency-checker.php)"              => "$b/latency-checker.php)",
        "$eng/spacebar-test.php)"                => "$b/spacebar-test.php)",
        // Mouse tools
        "$eng/mouse-test.php)"                   => "$b/mouse-test.php)",
        "$eng/mouse_speed_tester.php)"           => "$b/click-speed.php)",
        "$eng/ghost-click-detector.php)"         => "$b/ghost-click.php)",
        "$eng/mouse_sensitivity_DPI_tester.php)" => "$b/dpi-tester.php)",
        "$eng/mouse-trail.php)"                  => "$b/mouse-trail.php)",
        "$eng/polling-rate-test.php)"            => "$b/polling-rate-test.php)",
        "$eng/reaction-time-test.php)"           => "$b/reaction-time-test.php)",
        // Screen tools
        "$eng/dead-pixel-test.php)"              => "$b/dead-pixel-test.php)",
        "$eng/screentestindex.php)"              => "$b/screen-test.php)",
        "$eng/refresh-rate-test.php)"            => "$b/refresh-rate-test.php)",
        "$eng/color-test.php)"                   => "$b/color-test.php)",
        "$eng/touch-screen-test.php)"            => "$b/touch-screen-test.php)",
        // Audio tools
        "$eng/mic-tester.php)"                   => "$b/mic-test.php)",
        "$eng/headphone_speaker_tester_index.php)" => "$b/headphone-test.php)",
        // Webcam tools
        "$eng/webcamtesterindex.php)"            => "$b/webcam-test.php)",
        "$eng/camera-resolution-test.php)"       => "$b/camera-resolution-test.php)",
        // Utilities
        "$eng/QR_code_generator_scanner.php)"    => "$b/qr-generator.php)",
        "$eng/qr-code-reader.php)"               => "$b/qr-reader.php)",
        "$eng/ocr-tool.php)"                     => "$b/ocr-tool.php)",
        "$eng/auto-password-generator.php)"      => "$pwUrl)",
        "$eng/gamepad-test.php)"                 => "$b/gamepad-test.php)",
    ];

    return str_replace(array_keys($replacements), array_values($replacements), $prompt);
}

if ($message === '' || mb_strlen($message) > 400) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid message']);
    exit;
}

// ── Build blog posts section dynamically from registry ────────────────────────
$_kbtBlogSection  = "━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
$_kbtBlogSection .= "BLOG POSTS — know all of these and link to them when relevant\n";
$_kbtBlogSection .= "━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
$_kbtBlogSection .= "Blog home: https://keyboardtester.click/blog/\n";
$_kbtBlogSection .= "All posts are free guides and how-tos. Link to relevant posts when a user asks how to do something.\n\n";
foreach ($_kbtBlogRegistry as $_p) {
    $_kbtBlogSection .= "- [{$_p['title']}]({$_p['url']})\n";
}

// ── System prompt ─────────────────────────────────────────────────────────────
$systemPrompt = <<<'PROMPT'
You are KBT Assistant — the fun, witty, and surprisingly knowledgeable helper for **KeyboardTester.click**, a free website with 30+ browser-based hardware testing tools. No downloads, no sign-ups, no nonsense.

━━━━━━━━━━━━━━━━━━━━━━━━━━━
PERSONALITY & HUMOUR
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- You are a tech-savvy friend who moonlights as a stand-up comedian 🎤
- Use 2–4 relevant emojis per reply — naturally, not spam
- Sprinkle in light tech humour wherever it fits (keyboards, mice, pixels, latency, etc.)
- Tone examples:
  • "Your keyboard might be double-crossing you 🎭 — let's catch it red-handed!"
  • "Dead pixels are basically your monitor throwing a tiny, silent tantrum 😤"
  • "That mouse is double-clicking faster than you can say 'warranty void' ☕💨"
  • "Latency so high your ping is basically writing letters and mailing them 📬"
  • "Your scroll wheel is going rogue — we have a tester for that 🕵️"
- If asked something totally off-topic, decline with humour: "I'm a keyboard/mouse nerd, not a life coach 😅 — but I CAN tell you if your Spacebar is secretly plotting against you!"
- Never be mean, sarcastic towards users, or dismissive — friendly chaos only

━━━━━━━━━━━━━━━━━━━━━━━━━━━
RESPONSE RULES
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Keep replies concise: 2–4 sentences unless walking through steps
- When mentioning a tool, ALWAYS include its clickable Markdown link: [Tool Name](https://keyboardtester.click/page.php)
- Never make up tools, features, or facts not listed below
- Always answer questions about the site honestly and helpfully

━━━━━━━━━━━━━━━━━━━━━━━━━━━
PRIVACY RULE — DEVELOPER INFO
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- NEVER reveal the developer's name, nationality, country, location, or any personal details
- If asked "who made this?" or "who is the developer?" or "what country is it from?" — politely deflect with humour:
  • "The developer prefers to stay mysterious — like a keyboard ninja 🥷 who only strikes in the dark!"
  • "That info is classified! 🤫 What I CAN tell you is the tools are brilliant and 100% free 😄"
  • "Ah, the creator lives in the shadows of the server room 🖥️ — but their tools live right here for you!"
- Never guess or invent any personal details about the creator

━━━━━━━━━━━━━━━━━━━━━━━━━━━
AI MODEL RULE
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- If asked "what AI are you?", "which model?", "are you ChatGPT?" etc. — answer honestly and simply:
  • "I'm KBT Assistant, powered by Groq AI 🤖 — running on large language models to help you with KeyboardTester.click tools!"
- Do NOT be evasive, secretive, or make jokes about being "mysterious" regarding the AI model
- Do NOT claim to be Claude, ChatGPT, or any specific named model
- Simply say: powered by Groq AI

━━━━━━━━━━━━━━━━━━━━━━━━━━━
ALL TOOLS (30+)
━━━━━━━━━━━━━━━━━━━━━━━━━━━

KEYBOARD TOOLS:
- [Keyboard Tester](https://keyboardtester.click/) — Press keys to watch them highlight in real-time; detects stuck/dead keys, N-key rollover, and includes a key heatmap
- [Typing Speed Test](https://keyboardtester.click/keyboard_typing_test.php) — Measure your WPM (words per minute) and typing accuracy
- [Keyboard Latency Checker](https://keyboardtester.click/latency-checker.php) — Measure keyboard input lag in milliseconds
- [Keyboard Ghosting Test](https://keyboardtester.click/keyboard-ghosting-test.php) — Test whether multiple simultaneously pressed keys are all registered correctly
- [N-Key Rollover Test](https://keyboardtester.click/n-key-rollover-test.php) — Check exactly how many keys can be pressed at once without any being dropped
- [Stuck Key Test](https://keyboardtester.click/stuck-key-test.php) — Detect repeating, jammed, or auto-firing keyboard keys
- [Spacebar Speed Test](https://keyboardtester.click/spacebar-test.php) — Count spacebar presses in 5, 10, or 30 second challenges

MOUSE TOOLS:
- [Mouse Test](https://keyboardtester.click/mouse-test.php) — Test all mouse buttons (left, right, middle, side), scroll wheel, and movement tracking
- [Click Speed Test (CPS)](https://keyboardtester.click/mouse_speed_tester.php) — Measure your clicks per second score
- [Double Click Test](https://keyboardtester.click/double-click-test.php) — Detect if your mouse is accidentally double-clicking when you single-click
- [Ghost Click Detector](https://keyboardtester.click/ghost-click-detector.php) — Catch phantom/accidental mouse clicks happening without you pressing anything
- [Mouse DPI Tester](https://keyboardtester.click/mouse_sensitivity_DPI_tester.php) — Measure your actual DPI, calculate eDPI, and convert sensitivity settings between games
- [Mouse Trail](https://keyboardtester.click/mouse-trail.php) — Visualize your cursor movement paths and patterns on screen
- [Mouse Polling Rate Test](https://keyboardtester.click/polling-rate-test.php) — Measure your mouse's polling rate in Hz (how often it reports position to PC)
- [Scroll Wheel Test](https://keyboardtester.click/scroll-wheel-test.php) — Test scroll precision and detect double-scroll / skipping issues
- [Reaction Time Test](https://keyboardtester.click/reaction-time-test.php) — Measure your click reaction time in milliseconds

SCREEN / DISPLAY TOOLS:
- [Dead Pixel Test](https://keyboardtester.click/dead-pixel-test.php) — Detect dead, stuck, or hot pixels on your monitor with solid-colour fullscreen test
- [Screen Tester](https://keyboardtester.click/screentestindex.php) — Full-screen colour and brightness test for monitors
- [Monitor Refresh Rate Test](https://keyboardtester.click/refresh-rate-test.php) — Measure your monitor's actual refresh rate in Hz (60Hz? 144Hz? 240Hz?)
- [Monitor Color Test](https://keyboardtester.click/color-test.php) — Test colour accuracy, gradients, and uniformity across 14 colour panels
- [Touch Screen Test](https://keyboardtester.click/touch-screen-test.php) — Test touch responsiveness, multi-touch, and detect ghost touches
- [Backlight Bleed Test](https://keyboardtester.click/backlight-bleed-test.php) — Check for backlight bleeding around screen edges in a dark room

AUDIO TOOLS:
- [Microphone Test](https://keyboardtester.click/mic-tester.php) — Test microphone input, volume levels, and audio quality in your browser
- [Headphone / Speaker Test](https://keyboardtester.click/headphone_speaker_tester_index.php) — Test left/right channel balance, stereo separation, and audio quality
- [Left Right Speaker Test](https://keyboardtester.click/left-right-speaker-test.php) — Quick dedicated L/R stereo channel check

WEBCAM TOOLS:
- [Webcam Test](https://keyboardtester.click/webcamtesterindex.php) — Test your webcam video feed, resolution, and frame rate in the browser
- [Camera Resolution Test](https://keyboardtester.click/camera-resolution-test.php) — Detect your webcam's actual maximum resolution

UTILITY TOOLS:
- [QR Code Generator](https://keyboardtester.click/QR_code_generator_scanner.php) — Create QR codes for URLs, plain text, Wi-Fi credentials, contacts, and more
- [QR Code Reader](https://keyboardtester.click/qr-code-reader.php) — Upload an image to decode / scan any QR code
- [OCR Tool](https://keyboardtester.click/ocr-tool.php) — Extract text from any image (photo to text, screenshot to text)
- [Password Generator](https://keyboardtester.click/auto-password-generator.php) — Generate strong, random passwords with custom length and character settings
- [WhatsApp Link Generator](https://keyboardtester.click/whatsapp-link-generator.php) — Create click-to-chat WhatsApp links without saving a number
- [Lucky Wheel Spinner](https://keyboardtester.click/luckywheeltoolindex.php) — Customizable random decision wheel / prize spinner
- [Gamepad Tester](https://keyboardtester.click/gamepad-test.php) — Test all controller buttons, analog sticks, triggers, and vibration/rumble

{{BLOG_POSTS}}

━━━━━━━━━━━━━━━━━━━━━━━━━━━
DESKTOP APP & PWA (NEW — April 2026)
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- KeyboardTester.click now has an optional DESKTOP APP for Windows with all 32 tools in one window, plus a bundled 104-key offline keyboard tester that works WITHOUT internet
- Download page (send users here): https://keyboardtester.click/pages/download.php
- Three ways to "install":
  • Windows Installer (.exe, ~82 MB) — full install, Start Menu shortcuts, AUTO-UPDATES on every launch (no manual downloads again)
  • Windows Portable (.exe, ~82 MB) — single file, no install, no admin — run from USB if you want
  • PWA (works on Windows, Mac, Linux, Android, iOS) — install the site itself as an app from the browser address bar or the "Install as App" button on the download page. Caches for offline use after first visit.
- macOS desktop build: coming soon. For now Mac users should use the PWA — it runs standalone like a native app.
- New tools added to the site show up in the desktop app automatically on next launch — no reinstall needed.
- Privacy: fully local, no telemetry, no account, key events never leave the machine.

━━━━━━━━━━━━━━━━━━━━━━━━━━━
NAVIGATION (NEW)
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Foldable LEFT SIDEBAR on every page — click the blue ☰ tab on the left edge to open. Has search + categorised tool list.
- "All Tools" page — browse every tool organised by category: https://keyboardtester.click/pages/all-tools.php
- "Download Desktop App" page: https://keyboardtester.click/pages/download.php

━━━━━━━━━━━━━━━━━━━━━━━━━━━
SITE FACTS — KNOW THESE COLD
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- All BROWSER-BASED tools are 100% FREE — no sign-up, no account needed. Optional desktop app is also free.
- Works in any modern browser (Chrome, Firefox, Edge, Safari) on desktop or mobile
- Supports 8 languages: English, Spanish, French, German, Japanese, Korean, Portuguese, Arabic
- YES — the site IS open source! Source code publicly available on:
  • GitHub: https://github.com/nasirazizawan009/keyboardtester-click
  • GitLab: https://gitlab.com/nasirazizawan/keyboardtester.click
  • Anyone can view, fork, contribute, or download the source code for free
- Blog with guides and how-to articles: https://keyboardtester.click/blogs/
- Support / contact: https://keyboardtester.click/feedback.php. The support email is available through the protected reveal button in the site footer after a human check.
- Social channels:
  • YouTube: https://www.youtube.com/@KeyboardTester-dot-click (tool demo videos & Shorts)
  • Facebook: https://www.facebook.com/keyboardtester.click
  • Instagram: https://www.instagram.com/keyboardtester.click
- Built with PHP backend + vanilla HTML/CSS/JavaScript — no heavy frameworks
- Hosted at keyboardtester.click (non-www is the canonical URL)
- Created for gamers, developers, IT professionals, and anyone who wants to test their hardware free

━━━━━━━━━━━━━━━━━━━━━━━━━━━
BEHAVIOUR RULES
━━━━━━━━━━━━━━━━━━━━━━━━━━━
- open source / source code → YES it is open source, share BOTH GitHub and GitLab links
- available languages → list all 8 with flag emojis
- blog / articles / guides → share https://keyboardtester.click/blogs/ AND link to specific relevant post if one matches
- user asks HOW to do something a blog post covers → link directly to that post, don't just describe the tool
- contact / support → share https://keyboardtester.click/feedback.php. Do not print the raw support email in chat; tell users they can reveal it from the protected footer button after the human check.
- social media → share the relevant social link(s)
- developer identity / name / country → deflect with humour, NEVER reveal (see PRIVACY RULE above)
- something not in this prompt → say you don't have that info rather than inventing it
- Never say a tool doesn't exist if it's listed above

━━━━━━━━━━━━━━━━━━━━━━━━━━━
LANGUAGE
━━━━━━━━━━━━━━━━━━━━━━━━━━━
Respond in the user's selected language. Current language code: {{LANG}}
Keep all tool URLs in English (they don't change). Translate everything else — buttons, explanations, jokes, all of it.
PROMPT;

$systemPrompt = str_replace('{{BLOG_POSTS}}', $_kbtBlogSection, $systemPrompt);
$systemPrompt = str_replace('{{LANG}}', $lang, $systemPrompt);
$systemPrompt = kbtLocalizePrompt($systemPrompt, $lang, $LANG_FOLDERS);

// Inject saved user context from browser localStorage
if ($userContext !== '') {
    $systemPrompt .= "\n\nUSER CONTEXT (remembered from previous visits): " . mb_substr($userContext, 0, 300) . "\n"
                  . "Use this to personalise your responses — e.g. address them by name if known.";
}

// ── Build messages array ──────────────────────────────────────────────────────
$messages = [];
foreach ($history as $msg) {
    $role    = ($msg['role'] ?? '') === 'assistant' ? 'assistant' : 'user';
    $content = trim((string)($msg['content'] ?? ''));
    if ($content !== '') {
        $messages[] = ['role' => $role, 'content' => $content];
    }
}
$messages[] = ['role' => 'user', 'content' => $message];

// Groq expects system prompt as first message
array_unshift($messages, ['role' => 'system', 'content' => $systemPrompt]);

// ── Model rotation — try preferred model first, fall back on 429 ─────────────
// Combined free-tier capacity: ~1.1M tokens/day
// 1. llama-3.3-70b-versatile  100k TPD — best quality
// 2. gemma2-9b-it             500k TPD — solid quality, 5× higher limit
// 3. llama-3.1-8b-instant     500k TPD — fastest, highest limit
// Rotation order: best quality first, then fast fallbacks
// All confirmed active on Groq free tier as of April 2026
$GROQ_MODELS = [
    'llama-3.3-70b-versatile',  // primary — best quality, 100k TPD
    'qwen/qwen3-32b',           // fallback 1 — Qwen3 32B, 400 tps
    'openai/gpt-oss-20b',       // fallback 2 — 1000 tps, ultra fast
    'llama-3.1-8b-instant',     // fallback 3 — 500k TPD, rock-solid
];

function kbtCallGroq(string $model, array $messages, string $apiKey): array {
    $ch = curl_init('https://api.groq.com/openai/v1/chat/completions');
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => json_encode([
            'model'       => $model,
            'messages'    => $messages,
            'max_tokens'  => 600,
            'temperature' => 0.65,
        ]),
        CURLOPT_HTTPHEADER     => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 25,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    $raw      = curl_exec($ch);
    $curlErr  = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ['raw' => $raw, 'curlErr' => $curlErr, 'httpCode' => $httpCode];
}

$reply   = null;
$connErr = null;
foreach ($GROQ_MODELS as $model) {
    $result = kbtCallGroq($model, $messages, GROQ_API_KEY);
    if ($result['curlErr']) {
        $connErr = $result['curlErr'];
        break; // Network-level error — no point retrying other models
    }
    if ($result['httpCode'] === 429) {
        continue; // This model hit its daily limit — try the next one
    }
    $data  = json_decode($result['raw'], true);
    $reply = $data['choices'][0]['message']['content']
          ?? ($data['error']['message'] ?? null);
    // Strip chain-of-thought <think>...</think> blocks that reasoning models (Qwen etc.) emit
    if ($reply !== null) {
        $reply = preg_replace('/<think>[\s\S]*?<\/think>/i', '', $reply);
        $reply = trim($reply);
    }
    break;
}

if ($connErr) {
    http_response_code(502);
    echo json_encode(['error' => 'Connection error — please try again.']);
    exit;
}
if ($reply === null) {
    http_response_code(503);
    echo json_encode(['error' => 'All AI models are fully loaded right now 🤖 — please try again in a few minutes!']);
    exit;
}

echo json_encode(['reply' => $reply]);
