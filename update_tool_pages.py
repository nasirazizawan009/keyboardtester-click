from pathlib import Path

ROOT = Path(__file__).resolve().parent

TOOLS = [
    {
        "file": "mouse_speed_tester.php",
        "name": "Mouse Speed Test",
        "slug": "mouse-speed",
        "focus": "click speed",
        "action": "Click",
        "detail": "as fast as possible inside the test area",
        "brief": "brief-mouse-speed-tester.php",
        "guide": "mouse-speed-tester.php",
    },
    {
        "file": "mouse_sensitivity_DPI_tester.php",
        "name": "Mouse DPI Tester",
        "slug": "mouse-dpi",
        "focus": "DPI and sensitivity",
        "action": "Move the mouse",
        "detail": "along the guide to calibrate",
        "brief": "brief-mouse-sensitivity-dpi-tester.php",
        "guide": "mouse-sensitivity-dpi-tester.php",
    },
    {
        "file": "mouse-trail.php",
        "name": "Mouse Trail",
        "slug": "mouse-trail",
        "focus": "mouse trail",
        "action": "Move the mouse",
        "detail": "to trace a path",
        "brief": "brief-mouse-trail.php",
        "guide": "mouse-trail.php",
    },
    {
        "file": "ghost-click-detector.php",
        "name": "Ghost Click Detector",
        "slug": "ghost-click",
        "focus": "ghost clicks",
        "action": "Click normally",
        "detail": "to detect unexpected double clicks",
        "brief": "brief-ghost-click-detector.php",
        "guide": "ghost-click-detector.php",
    },
    {
        "file": "keyboard_typing_test.php",
        "name": "Typing Speed Test",
        "slug": "typing-test",
        "focus": "typing speed",
        "action": "Type the prompt",
        "detail": "until the timer ends",
        "brief": "brief-keyboard-typing-test.php",
        "guide": "keyboard-typing-test.php",
    },
    {
        "file": "latency-checker.php",
        "name": "Latency Checker",
        "slug": "latency-checker",
        "focus": "input latency",
        "action": "Press keys or click",
        "detail": "to measure response time",
        "brief": "brief-latency-checker.php",
        "guide": "latency-checker.php",
    },
    {
        "file": "screentestindex.php",
        "name": "Screen Tester",
        "slug": "screen-test",
        "focus": "pixel issues",
        "action": "Cycle colors",
        "detail": "in full screen view",
        "brief": "brief-screen-tester.php",
        "guide": "screen-tester.php",
    },
    {
        "file": "webcamtesterindex.php",
        "name": "Webcam Tester",
        "slug": "webcam-test",
        "focus": "webcam quality",
        "action": "Allow camera access",
        "detail": "and check the preview",
        "brief": "brief-webcam-tester.php",
        "guide": "webcam-tester.php",
    },
    {
        "file": "mic-tester.php",
        "name": "Mic Tester",
        "slug": "mic-test",
        "focus": "microphone input",
        "action": "Speak into the mic",
        "detail": "to monitor levels",
        "brief": "brief-mic-tester.php",
        "guide": "mic-tester.php",
    },
    {
        "file": "headphone_speaker_tester_index.php",
        "name": "Headphone & Speaker Tester",
        "slug": "headphone-test",
        "focus": "audio output",
        "action": "Play test audio",
        "detail": "to check channels",
        "brief": "brief-headphone-speaker-tester.php",
        "guide": "headphone-speaker-tester.php",
    },
    {
        "file": "ocr-tool.php",
        "name": "OCR Tool",
        "slug": "ocr-tool",
        "focus": "OCR results",
        "action": "Upload an image",
        "detail": "to extract text",
        "brief": "brief-ocr-tool.php",
        "guide": "ocr-tool.php",
    },
    {
        "file": "qr-code-reader.php",
        "name": "QR Code Reader",
        "slug": "qr-reader",
        "focus": "QR results",
        "action": "Scan a QR code",
        "detail": "with camera or upload",
        "brief": "brief-qr-code-reader.php",
        "guide": "qr-code-reader.php",
    },
    {
        "file": "QR_code_generator_scanner.php",
        "name": "QR Code Generator",
        "slug": "qr-generator",
        "focus": "QR creation",
        "action": "Enter your data",
        "detail": "to generate a QR code",
        "brief": "brief-qr-code-generator.php",
        "guide": "qr-code-generator.php",
    },
    {
        "file": "whatsapp-link-generator.php",
        "name": "WhatsApp Link Generator",
        "slug": "whatsapp-link",
        "focus": "WhatsApp link",
        "action": "Enter phone and message",
        "detail": "to build a link",
        "brief": "brief-whatsapp-link-generator.php",
        "guide": "whatsapp-link-generator.php",
    },
    {
        "file": "whatsapp-Brand-link-generator.php",
        "name": "WhatsApp Brand Links",
        "slug": "whatsapp-brand",
        "focus": "branded links",
        "action": "Enter brand info",
        "detail": "to generate link and QR",
        "brief": "brief-whatsapp-brand-link-generator.php",
        "guide": "whatsapp-brand-link-generator.php",
    },
    {
        "file": "whatsapp-sentiment-analyzer.php",
        "name": "WhatsApp Sentiment Analyzer",
        "slug": "whatsapp-sentiment",
        "focus": "sentiment",
        "action": "Paste chat text",
        "detail": "to analyze tone",
        "brief": "brief-whatsapp-sentiment-analyzer.php",
        "guide": "whatsapp-sentiment-analyzer.php",
    },
    {
        "file": "auto-password-generator.php",
        "name": "Password Generator",
        "slug": "password-generator",
        "focus": "password strength",
        "action": "Choose options",
        "detail": "to generate a password",
        "brief": "brief-auto-password-generator.php",
        "guide": "auto-password-generator.php",
    },
]

TOOL_INCLUDE_OVERRIDES = {
    "screentestindex.php": "screentesttool.php",
    "webcamtesterindex.php": "webcamtestertool.php",
}

ACCENT = "#0ea5e9"


def svg_template(title, subtitle):
    return f"""<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"960\" height=\"640\" viewBox=\"0 0 960 640\">
  <defs>
    <linearGradient id=\"bg\" x1=\"0\" x2=\"1\" y1=\"0\" y2=\"1\">
      <stop offset=\"0%\" stop-color=\"#f8fafc\"/>
      <stop offset=\"100%\" stop-color=\"#e2e8f0\"/>
    </linearGradient>
  </defs>
  <rect width=\"960\" height=\"640\" rx=\"32\" fill=\"url(#bg)\"/>
  <rect x=\"40\" y=\"40\" width=\"880\" height=\"560\" rx=\"28\" fill=\"#ffffff\" stroke=\"#e2e8f0\"/>
  <circle cx=\"120\" cy=\"120\" r=\"28\" fill=\"{ACCENT}\"/>
  <rect x=\"80\" y=\"200\" width=\"800\" height=\"14\" rx=\"7\" fill=\"#cbd5f5\"/>
  <rect x=\"80\" y=\"240\" width=\"640\" height=\"10\" rx=\"5\" fill=\"#e2e8f0\"/>
  <text x=\"80\" y=\"340\" font-family=\"Arial, sans-serif\" font-size=\"36\" fill=\"#0f172a\">{title}</text>
  <text x=\"80\" y=\"385\" font-family=\"Arial, sans-serif\" font-size=\"20\" fill=\"#475569\">{subtitle}</text>
</svg>
"""


def ensure_dir(path: Path):
    path.mkdir(parents=True, exist_ok=True)


def detect_tool_include(page_path: Path, fallback: str) -> str:
    text = page_path.read_text(encoding="utf-8", errors="ignore")
    marker = "tools/"
    start = text.find(marker)
    if start != -1:
        end = text.find("'", start)
        if end != -1:
            return text[start:end]
    return fallback


for tool in TOOLS:
    tool_id = tool["file"].replace(".php", "").replace("_", "-").lower()
    img_dir = ROOT / "images" / tool["slug"]
    ensure_dir(img_dir)

    (img_dir / "hero.svg").write_text(
        svg_template(tool["name"], f"Test {tool['focus']} in seconds"), encoding="utf-8"
    )
    (img_dir / "step-1.svg").write_text(
        svg_template("Step 1", "Start the test"), encoding="utf-8"
    )
    (img_dir / "step-2.svg").write_text(
        svg_template("Step 2", tool["action"]), encoding="utf-8"
    )
    (img_dir / "step-3.svg").write_text(
        svg_template("Step 3", "Review results"), encoding="utf-8"
    )

    brief_path = ROOT / "help" / tool["brief"]
    brief_path.write_text(
        f"""<section class=\"landing-hero\">
  <div class=\"container landing-hero-grid\">
    <div class=\"hero-copy\">
      <p class=\"hero-kicker\">{tool['focus'].title()}</p>
      <h1 class=\"hero-title\">Run a {tool['focus']} check in seconds</h1>
      <p class=\"hero-lede\">Use this free online {tool['name'].lower()} to {tool['action'].lower()} and review results instantly.</p>
      <div class=\"hero-actions\">
        <a class=\"landing-btn landing-btn-primary\" href=\"#{tool_id}\">Start test</a>
        <a class=\"landing-btn landing-btn-ghost\" href=\"#tools\">Browse all tools</a>
      </div>
      <div class=\"hero-badges\">
        <span class=\"hero-badge\">Live feedback</span>
        <span class=\"hero-badge\">Quick reset</span>
        <span class=\"hero-badge\">Browser based</span>
      </div>
      <div class=\"hero-metrics\">
        <div class=\"metric-card\">
          <span class=\"metric-value\">3</span>
          <span class=\"metric-label\">Core steps</span>
        </div>
        <div class=\"metric-card\">
          <span class=\"metric-value\">100%</span>
          <span class=\"metric-label\">Browser based</span>
        </div>
        <div class=\"metric-card\">
          <span class=\"metric-value\">Live</span>
          <span class=\"metric-label\">Results</span>
        </div>
      </div>
    </div>
    <div class=\"hero-visual\">
      <div class=\"hero-shot\">
        <img src=\"<?php echo url('images/{tool['slug']}/hero.svg'); ?>\" alt=\"{tool['name']} preview\" loading=\"eager\">
      </div>
      <div class=\"hero-stack\">
        <div class=\"mini-card\">
          <div class=\"mini-title\">Focused testing</div>
          <p>Run quick checks tailored for {tool['focus']}.</p>
        </div>
        <div class=\"mini-card\">
          <div class=\"mini-title\">Instant results</div>
          <p>See updates as you test in real time.</p>
        </div>
      </div>
    </div>
  </div>
</section>
""",
        encoding="utf-8",
    )

    guide_path = ROOT / "help" / tool["guide"]
    guide_path.write_text(
        f"""<section class=\"guidelines landing-guide\" id=\"guidelines\">
  <div class=\"help-header\">
    <h2>{tool['name']} Guide</h2>
    <p>Quick steps to run the {tool['name'].lower()} and review your {tool['focus']} results.</p>
  </div>

  <div class=\"help-grid\">
    <div class=\"help-card\">
      <h3>Start the test</h3>
      <ol>
        <li>Open the tool and prepare to begin.</li>
        <li>{tool['action']} {tool['detail']}.</li>
        <li>Reset to run another quick check.</li>
      </ol>
    </div>
    <div class=\"help-card\">
      <h3>Adjust settings if needed</h3>
      <ul>
        <li>Review tool options for your ideal test.</li>
        <li>Switch inputs or settings if results look off.</li>
        <li>Reset to run another quick check.</li>
      </ul>
    </div>
    <div class=\"help-card\">
      <h3>Review results</h3>
      <ul>
        <li>Look for missed inputs or delays.</li>
        <li>Compare multiple runs for consistency.</li>
        <li>Export or note results if required.</li>
      </ul>
    </div>
  </div>

  <div class=\"help-accordion\">
    <details>
      <summary>Why is the tool not responding?</summary>
      <p>Make sure the page is focused and the correct device is selected.</p>
    </details>
    <details>
      <summary>How do I reset the test?</summary>
      <p>Use the reset button to clear results and start over.</p>
    </details>
    <details>
      <summary>Does this work on mobile devices?</summary>
      <p>Most tools work best on desktop, but mobile may still function for basic checks.</p>
    </details>
    <details>
      <summary>Can I run multiple tests in a row?</summary>
      <p>Yes. Reset after each run to compare results.</p>
    </details>
    <details>
      <summary>Is the test private?</summary>
      <p>Testing runs locally in your browser and is not uploaded.</p>
    </details>
    <details>
      <summary>What should I do if results look wrong?</summary>
      <p>Try another browser or device to confirm the issue.</p>
    </details>
  </div>

  <div class=\"help-footer\">
    <p>Need more tools? Explore keyboard, mouse, audio, and utility testers in the tools list below.</p>
  </div>
</section>
""",
        encoding="utf-8",
    )

    page_path = ROOT / tool["file"]
    tool_include = TOOL_INCLUDE_OVERRIDES.get(tool["file"], detect_tool_include(page_path, ""))
    if not tool_include:
        tool_include = "tools/" + tool["file"].replace(".php", "_tool.php")

    page_path.write_text(
        f"""<?php include 'config.php'; ?>
<?php
$pageTitle = '{tool['name']} - {tool['focus'].title()} | KeyboardTester.click';
$pageDescription = 'Use this free online {tool['name'].lower()} to test {tool['focus']} with live feedback and quick resets.';
$pageKeywords = '{tool['focus']}, {tool['name'].lower()}, online test, free tool';
$pageOgImage = 'images/{tool['slug']}/hero.svg';
?>
<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
  <link href=\"https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap\" rel=\"stylesheet\">

  <link rel=\"stylesheet\" href=\"<?php echo url('assets/css/index-modern.css'); ?>\">
</head>
<body class=\"landing-page\">
  <?php include 'header.php'; ?>

  <main id=\"main-content\" class=\"landing-main\">
    <?php include 'help/{tool['brief']}'; ?>

    <section class=\"trust-strip\" aria-label=\"Key benefits\">
      <div class=\"container trust-grid\">
        <div class=\"trust-item\">
          <div class=\"trust-title\">Live feedback</div>
          <div class=\"trust-desc\">See results instantly</div>
        </div>
        <div class=\"trust-item\">
          <div class=\"trust-title\">Quick reset</div>
          <div class=\"trust-desc\">Run another test fast</div>
        </div>
        <div class=\"trust-item\">
          <div class=\"trust-title\">Browser based</div>
          <div class=\"trust-desc\">No installs or signups</div>
        </div>
        <div class=\"trust-item\">
          <div class=\"trust-title\">Focused checks</div>
          <div class=\"trust-desc\">Built for {tool['focus']}</div>
        </div>
      </div>
    </section>

    <section class=\"feature-band\" aria-labelledby=\"feature-title\">
      <div class=\"container\">
        <div class=\"section-head\">
          <p class=\"section-kicker\">{tool['focus'].title()}</p>
          <h2 id=\"feature-title\">Everything you need for {tool['name'].lower()}</h2>
          <p class=\"section-lede\">Run focused checks and confirm results in seconds.</p>
        </div>
        <div class=\"landing-feature-grid\">
          <article class=\"landing-feature-card\">
            <h3>Focused insights</h3>
            <p>Track {tool['focus']} with live updates.</p>
          </article>
          <article class=\"landing-feature-card\">
            <h3>Instant results</h3>
            <p>See changes as you test in real time.</p>
          </article>
          <article class=\"landing-feature-card\">
            <h3>Simple controls</h3>
            <p>Start, stop, and reset in seconds.</p>
          </article>
          <article class=\"landing-feature-card\">
            <h3>Repeatable tests</h3>
            <p>Compare multiple runs quickly.</p>
          </article>
        </div>
      </div>
    </section>

    <section class=\"process-band\" aria-labelledby=\"process-title\">
      <div class=\"container\">
        <div class=\"section-head split\">
          <div>
            <p class=\"section-kicker\">Simple workflow</p>
            <h2 id=\"process-title\">Three steps to run the {tool['name'].lower()}</h2>
          </div>
          <p class=\"section-lede\">Follow the quick steps below to test and confirm results.</p>
        </div>
        <div class=\"process-grid\">
          <article class=\"process-card\">
            <div class=\"process-media\">
              <img src=\"<?php echo url('images/{tool['slug']}/step-1.svg'); ?>\" alt=\"Start the test\" loading=\"lazy\">
            </div>
            <div class=\"step-number\">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class=\"process-card\">
            <div class=\"process-media\">
              <img src=\"<?php echo url('images/{tool['slug']}/step-2.svg'); ?>\" alt=\"{tool['action']}\" loading=\"lazy\">
            </div>
            <div class=\"step-number\">02</div>
            <h3>{tool['action']}</h3>
            <p>{tool['detail']}.</p>
          </article>
          <article class=\"process-card\">
            <div class=\"process-media\">
              <img src=\"<?php echo url('images/{tool['slug']}/step-3.svg'); ?>\" alt=\"Review results\" loading=\"lazy\">
            </div>
            <div class=\"step-number\">03</div>
            <h3>Review results</h3>
            <p>Check your {tool['focus']} stats and retest if needed.</p>
          </article>
        </div>
      </div>
    </section>

    <section class=\"tool-stage\" aria-labelledby=\"tool-stage-title\">
      <div class=\"container tool-stage-header\">
        <div>
          <p class=\"section-kicker\">Primary tool</p>
          <h2 id=\"tool-stage-title\">{tool['name']}</h2>
          <p class=\"section-lede\">Use the live tool below to complete your test.</p>
        </div>
        <div class=\"tool-stage-actions\">
          <a class=\"landing-btn landing-btn-ghost\" href=\"#guidelines\">View quick tips</a>
        </div>
      </div>
      <section id=\"{tool_id}\" class=\"tool-shell\">
        <?php include '{tool_include}'; ?>
      </section>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/{tool['guide']}'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
""",
        encoding="utf-8",
    )

print(f"Updated {len(TOOLS)} tool pages.")
