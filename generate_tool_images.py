from pathlib import Path

TOOLS = [
    {"slug": "keyboard", "icon": "keyboard", "accent": "#0ea5e9", "accent2": "#f97316"},
    {"slug": "mouse", "icon": "mouse", "accent": "#0ea5e9", "accent2": "#22c55e"},
    {"slug": "mouse-speed", "icon": "bolt", "accent": "#f97316", "accent2": "#0ea5e9"},
    {"slug": "mouse-dpi", "icon": "target", "accent": "#38bdf8", "accent2": "#f97316"},
    {"slug": "mouse-trail", "icon": "trail", "accent": "#22c55e", "accent2": "#0ea5e9"},
    {"slug": "ghost-click", "icon": "ghost", "accent": "#94a3b8", "accent2": "#0ea5e9"},
    {"slug": "typing-test", "icon": "typing", "accent": "#0ea5e9", "accent2": "#f97316"},
    {"slug": "latency-checker", "icon": "clock", "accent": "#22c55e", "accent2": "#0ea5e9"},
    {"slug": "screen-test", "icon": "screen", "accent": "#38bdf8", "accent2": "#22c55e"},
    {"slug": "webcam-test", "icon": "camera", "accent": "#0ea5e9", "accent2": "#8b5cf6"},
    {"slug": "mic-test", "icon": "mic", "accent": "#f97316", "accent2": "#0ea5e9"},
    {"slug": "headphone-test", "icon": "headphone", "accent": "#8b5cf6", "accent2": "#0ea5e9"},
    {"slug": "ocr-tool", "icon": "doc", "accent": "#0ea5e9", "accent2": "#22c55e"},
    {"slug": "password-generator", "icon": "lock", "accent": "#f97316", "accent2": "#22c55e"},
    {"slug": "qr-generator", "icon": "qr", "accent": "#0ea5e9", "accent2": "#f97316"},
    {"slug": "qr-reader", "icon": "scan", "accent": "#22c55e", "accent2": "#0ea5e9"},
    {"slug": "whatsapp-link", "icon": "link", "accent": "#22c55e", "accent2": "#0ea5e9"},
    {"slug": "whatsapp-brand", "icon": "tag", "accent": "#0ea5e9", "accent2": "#f97316"},
    {"slug": "whatsapp-sentiment", "icon": "chat", "accent": "#f97316", "accent2": "#0ea5e9"},
    {"slug": "lucky-wheel", "icon": "wheel", "accent": "#f97316", "accent2": "#0ea5e9"},
]

ROOT = Path('.')

ICON_TEMPLATES = {
    "keyboard": """
      <rect x=\"-70\" y=\"-40\" width=\"140\" height=\"80\" rx=\"16\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-50\" y=\"-15\" width=\"100\" height=\"10\" rx=\"5\" fill=\"{accent2}\"/>
      <rect x=\"-50\" y=\"5\" width=\"80\" height=\"8\" rx=\"4\" fill=\"{accent}\" opacity=\"0.6\"/>
    """,
    "mouse": """
      <rect x=\"-40\" y=\"-60\" width=\"80\" height=\"120\" rx=\"36\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <line x1=\"0\" y1=\"-30\" x2=\"0\" y2=\"10\" stroke=\"{accent2}\" stroke-width=\"6\" stroke-linecap=\"round\"/>
      <circle cx=\"0\" cy=\"-50\" r=\"8\" fill=\"{accent2}\"/>
    """,
    "bolt": """
      <polygon points=\"-30,-60 10,-60 -5,-5 35,-5 -25,70 0,10 -30,10\" fill=\"{accent}\"/>
      <polygon points=\"-18,-48 4,-48 -8,-15 18,-15 -18,50 -4,12 -18,12\" fill=\"{accent2}\" opacity=\"0.8\"/>
    """,
    "target": """
      <circle cx=\"0\" cy=\"0\" r=\"52\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"6\"/>
      <circle cx=\"0\" cy=\"0\" r=\"24\" fill=\"{accent2}\" opacity=\"0.85\"/>
      <line x1=\"-70\" y1=\"0\" x2=\"70\" y2=\"0\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <line x1=\"0\" y1=\"-70\" x2=\"0\" y2=\"70\" stroke=\"{accent}\" stroke-width=\"4\"/>
    """,
    "trail": """
      <path d=\"M-60 40 C-30 -20, 30 -20, 60 -60\" fill=\"none\" stroke=\"{accent}\" stroke-width=\"6\" stroke-linecap=\"round\"/>
      <circle cx=\"-50\" cy=\"32\" r=\"8\" fill=\"{accent2}\"/>
      <circle cx=\"-10\" cy=\"-2\" r=\"8\" fill=\"{accent2}\"/>
      <circle cx=\"35\" cy=\"-35\" r=\"8\" fill=\"{accent2}\"/>
    """,
    "ghost": """
      <path d=\"M-40 40 C-40 -30, -10 -60, 0 -60 C10 -60, 40 -30, 40 40 L25 30 L10 40 L0 30 L-10 40 L-25 30 Z\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <circle cx=\"-15\" cy=\"-10\" r=\"6\" fill=\"{accent2}\"/>
      <circle cx=\"15\" cy=\"-10\" r=\"6\" fill=\"{accent2}\"/>
    """,
    "typing": """
      <rect x=\"-70\" y=\"-40\" width=\"140\" height=\"80\" rx=\"18\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-50\" y=\"-20\" width=\"100\" height=\"10\" rx=\"5\" fill=\"{accent2}\"/>
      <rect x=\"-50\" y=\"-2\" width=\"80\" height=\"8\" rx=\"4\" fill=\"{accent}\" opacity=\"0.6\"/>
      <rect x=\"-50\" y=\"12\" width=\"60\" height=\"8\" rx=\"4\" fill=\"{accent}\" opacity=\"0.4\"/>
    """,
    "clock": """
      <circle cx=\"0\" cy=\"0\" r=\"52\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"6\"/>
      <line x1=\"0\" y1=\"0\" x2=\"0\" y2=\"-28\" stroke=\"{accent2}\" stroke-width=\"6\" stroke-linecap=\"round\"/>
      <line x1=\"0\" y1=\"0\" x2=\"22\" y2=\"10\" stroke=\"{accent}\" stroke-width=\"6\" stroke-linecap=\"round\"/>
      <circle cx=\"0\" cy=\"0\" r=\"6\" fill=\"{accent2}\"/>
    """,
    "screen": """
      <rect x=\"-70\" y=\"-45\" width=\"140\" height=\"90\" rx=\"12\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-30\" y=\"50\" width=\"60\" height=\"10\" rx=\"5\" fill=\"{accent2}\"/>
      <rect x=\"-10\" y=\"60\" width=\"20\" height=\"16\" rx=\"6\" fill=\"{accent}\"/>
    """,
    "camera": """
      <rect x=\"-70\" y=\"-35\" width=\"140\" height=\"70\" rx=\"18\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <circle cx=\"0\" cy=\"0\" r=\"22\" fill=\"{accent2}\"/>
      <circle cx=\"0\" cy=\"0\" r=\"10\" fill=\"#0f172a\" opacity=\"0.7\"/>
      <rect x=\"-45\" y=\"-50\" width=\"30\" height=\"16\" rx=\"6\" fill=\"{accent2}\"/>
    """,
    "mic": """
      <rect x=\"-26\" y=\"-55\" width=\"52\" height=\"90\" rx=\"26\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-8\" y=\"38\" width=\"16\" height=\"24\" rx=\"6\" fill=\"{accent2}\"/>
      <rect x=\"-30\" y=\"60\" width=\"60\" height=\"8\" rx=\"4\" fill=\"{accent}\"/>
    """,
    "headphone": """
      <path d=\"M-50 10 A50 50 0 0 1 50 10\" fill=\"none\" stroke=\"{accent}\" stroke-width=\"8\" stroke-linecap=\"round\"/>
      <rect x=\"-65\" y=\"10\" width=\"24\" height=\"44\" rx=\"10\" fill=\"{accent2}\"/>
      <rect x=\"41\" y=\"10\" width=\"24\" height=\"44\" rx=\"10\" fill=\"{accent2}\"/>
    """,
    "doc": """
      <rect x=\"-50\" y=\"-60\" width=\"100\" height=\"120\" rx=\"12\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <polygon points=\"20,-60 50,-30 20,-30\" fill=\"{accent2}\"/>
      <rect x=\"-30\" y=\"-20\" width=\"60\" height=\"8\" rx=\"4\" fill=\"{accent2}\"/>
      <rect x=\"-30\" y=\"0\" width=\"60\" height=\"8\" rx=\"4\" fill=\"{accent}\" opacity=\"0.6\"/>
      <rect x=\"-30\" y=\"20\" width=\"40\" height=\"8\" rx=\"4\" fill=\"{accent}\" opacity=\"0.4\"/>
    """,
    "lock": """
      <rect x=\"-50\" y=\"-10\" width=\"100\" height=\"70\" rx=\"14\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-30\" y=\"-50\" width=\"60\" height=\"40\" rx=\"20\" fill=\"none\" stroke=\"{accent2}\" stroke-width=\"6\"/>
      <circle cx=\"0\" cy=\"20\" r=\"10\" fill=\"{accent2}\"/>
    """,
    "qr": """
      <rect x=\"-60\" y=\"-60\" width=\"40\" height=\"40\" fill=\"{accent}\"/>
      <rect x=\"20\" y=\"-60\" width=\"40\" height=\"40\" fill=\"{accent2}\"/>
      <rect x=\"-60\" y=\"20\" width=\"40\" height=\"40\" fill=\"{accent2}\"/>
      <rect x=\"20\" y=\"20\" width=\"40\" height=\"40\" fill=\"{accent}\"/>
      <rect x=\"-10\" y=\"-10\" width=\"20\" height=\"20\" fill=\"#0f172a\" opacity=\"0.6\"/>
    """,
    "scan": """
      <rect x=\"-55\" y=\"-55\" width=\"110\" height=\"110\" rx=\"16\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"4\"/>
      <rect x=\"-35\" y=\"-35\" width=\"30\" height=\"30\" fill=\"{accent2}\"/>
      <rect x=\"5\" y=\"-35\" width=\"30\" height=\"30\" fill=\"{accent}\"/>
      <rect x=\"-35\" y=\"5\" width=\"30\" height=\"30\" fill=\"{accent}\"/>
      <rect x=\"5\" y=\"5\" width=\"30\" height=\"30\" fill=\"{accent2}\"/>
      <rect x=\"-40\" y=\"-2\" width=\"80\" height=\"4\" fill=\"{accent2}\"/>
    """,
    "link": """
      <circle cx=\"-20\" cy=\"0\" r=\"28\" fill=\"none\" stroke=\"{accent}\" stroke-width=\"6\"/>
      <circle cx=\"20\" cy=\"0\" r=\"28\" fill=\"none\" stroke=\"{accent2}\" stroke-width=\"6\"/>
      <rect x=\"-10\" y=\"-6\" width=\"20\" height=\"12\" fill=\"{accent}\"/>
    """,
    "tag": """
      <path d=\"M-60 -20 L10 -60 L60 -10 L-10 40 Z\" fill=\"{accent}\"/>
      <circle cx=\"-30\" cy=\"0\" r=\"8\" fill=\"#ffffff\"/>
      <path d=\"M-10 -10 L40 30\" stroke=\"{accent2}\" stroke-width=\"6\" stroke-linecap=\"round\"/>
    """,
    "chat": """
      <path d=\"M-60 -30 H60 V20 Q60 40 40 40 H10 L-20 60 V40 H-40 Q-60 40 -60 20 Z\" fill=\"{accent}\"/>
      <path d=\"M-30 0 L-10 10 L10 -5 L30 12\" stroke=\"#ffffff\" stroke-width=\"6\" fill=\"none\" stroke-linecap=\"round\"/>
    """,
    "wheel": """
      <circle cx=\"0\" cy=\"0\" r=\"60\" fill=\"#f8fafc\" stroke=\"{accent}\" stroke-width=\"6\"/>
      <path d=\"M0 -60 L52 30 L-52 30 Z\" fill=\"{accent2}\" opacity=\"0.8\"/>
      <circle cx=\"0\" cy=\"0\" r=\"12\" fill=\"{accent}\"/>
    """,
}

STEP_ICONS = {
    "step1": "<rect x=\"-30\" y=\"-30\" width=\"60\" height=\"60\" rx=\"14\" fill=\"{accent}\"/><path d=\"M-10 0 L0 10 L20 -10\" stroke=\"#ffffff\" stroke-width=\"8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>",
    "step2": "<polygon points=\"-20,-30 30,0 -20,30\" fill=\"{accent}\"/><circle cx=\"-30\" cy=\"0\" r=\"10\" fill=\"{accent2}\"/>",
    "step3": "<circle cx=\"0\" cy=\"0\" r=\"34\" fill=\"{accent}\"/><path d=\"M-14 0 L-2 12 L18 -10\" stroke=\"#ffffff\" stroke-width=\"8\" fill=\"none\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>",
}

HUMAN_FIGURE = """
  <g transform=\"translate({x} {y})\">
    <circle cx=\"0\" cy=\"-48\" r=\"22\" fill=\"#f1f5f9\" stroke=\"#cbd5f5\" stroke-width=\"3\"/>
    <rect x=\"-28\" y=\"-28\" width=\"56\" height=\"70\" rx=\"22\" fill=\"#ffffff\" stroke=\"#e2e8f0\" stroke-width=\"3\"/>
    <rect x=\"-44\" y=\"-10\" width=\"22\" height=\"54\" rx=\"11\" fill=\"{accent}\" opacity=\"0.85\"/>
    <rect x=\"22\" y=\"-10\" width=\"22\" height=\"54\" rx=\"11\" fill=\"{accent2}\" opacity=\"0.85\"/>
    <rect x=\"-18\" y=\"38\" width=\"36\" height=\"38\" rx=\"14\" fill=\"#e2e8f0\"/>
  </g>
"""

HERO_TEMPLATE = """
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"1200\" height=\"800\" viewBox=\"0 0 1200 800\">
  <defs>
    <linearGradient id=\"bg\" x1=\"0\" x2=\"1\" y1=\"0\" y2=\"1\">
      <stop offset=\"0%\" stop-color=\"#f8fafc\"/>
      <stop offset=\"100%\" stop-color=\"#e2e8f0\"/>
    </linearGradient>
    <radialGradient id=\"glow\" cx=\"30%\" cy=\"20%\" r=\"60%\">
      <stop offset=\"0%\" stop-color=\"{accent}\" stop-opacity=\"0.25\"/>
      <stop offset=\"100%\" stop-color=\"{accent}\" stop-opacity=\"0\"/>
    </radialGradient>
    <radialGradient id=\"glow2\" cx=\"80%\" cy=\"30%\" r=\"55%\">
      <stop offset=\"0%\" stop-color=\"{accent2}\" stop-opacity=\"0.22\"/>
      <stop offset=\"100%\" stop-color=\"{accent2}\" stop-opacity=\"0\"/>
    </radialGradient>
    <filter id=\"shadow\" x=\"-20%\" y=\"-20%\" width=\"140%\" height=\"140%\">
      <feDropShadow dx=\"0\" dy=\"18\" stdDeviation=\"24\" flood-color=\"#0f172a\" flood-opacity=\"0.18\"/>
    </filter>
    <filter id=\"noise\" x=\"0\" y=\"0\" width=\"100%\" height=\"100%\">
      <feTurbulence type=\"fractalNoise\" baseFrequency=\"0.8\" numOctaves=\"2\" stitchTiles=\"stitch\"/>
      <feColorMatrix type=\"saturate\" values=\"0\"/>
      <feComponentTransfer>
        <feFuncA type=\"table\" tableValues=\"0 0 0.05\"/>
      </feComponentTransfer>
    </filter>
  </defs>
  <rect width=\"1200\" height=\"800\" rx=\"32\" fill=\"url(#bg)\"/>
  <rect width=\"1200\" height=\"800\" fill=\"url(#glow)\"/>
  <rect width=\"1200\" height=\"800\" fill=\"url(#glow2)\"/>
  <rect width=\"1200\" height=\"800\" filter=\"url(#noise)\" opacity=\"0.3\"/>

  <g filter=\"url(#shadow)\">
    <rect x=\"120\" y=\"120\" width=\"960\" height=\"560\" rx=\"32\" fill=\"#ffffff\"/>
  </g>
  <rect x=\"160\" y=\"180\" width=\"880\" height=\"440\" rx=\"28\" fill=\"#f8fafc\" stroke=\"#e2e8f0\"/>
  <rect x=\"200\" y=\"220\" width=\"260\" height=\"18\" rx=\"9\" fill=\"#cbd5f5\"/>
  <rect x=\"200\" y=\"250\" width=\"180\" height=\"12\" rx=\"6\" fill=\"#e2e8f0\"/>
  <rect x=\"200\" y=\"290\" width=\"760\" height=\"220\" rx=\"18\" fill=\"#ffffff\" stroke=\"#e2e8f0\"/>
  <rect x=\"220\" y=\"320\" width=\"320\" height=\"14\" rx=\"7\" fill=\"#e2e8f0\"/>
  <rect x=\"220\" y=\"345\" width=\"260\" height=\"10\" rx=\"5\" fill=\"#e2e8f0\"/>
  <rect x=\"220\" y=\"370\" width=\"200\" height=\"10\" rx=\"5\" fill=\"#e2e8f0\"/>
  <rect x=\"620\" y=\"320\" width=\"320\" height=\"180\" rx=\"24\" fill=\"#f1f5f9\" stroke=\"#e2e8f0\"/>

  {human}

  <g transform=\"translate(820 400)\">
    <circle cx=\"0\" cy=\"0\" r=\"84\" fill=\"#ffffff\" stroke=\"#e2e8f0\" stroke-width=\"6\"/>
    {icon}
  </g>
</svg>
"""

STEP_TEMPLATE = """
<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"600\" height=\"400\" viewBox=\"0 0 600 400\">
  <defs>
    <linearGradient id=\"stepbg\" x1=\"0\" x2=\"1\" y1=\"0\" y2=\"1\">
      <stop offset=\"0%\" stop-color=\"#ffffff\"/>
      <stop offset=\"100%\" stop-color=\"#f1f5f9\"/>
    </linearGradient>
    <filter id=\"stepshadow\" x=\"-20%\" y=\"-20%\" width=\"140%\" height=\"140%\">
      <feDropShadow dx=\"0\" dy=\"10\" stdDeviation=\"12\" flood-color=\"#0f172a\" flood-opacity=\"0.12\"/>
    </filter>
  </defs>
  <rect width=\"600\" height=\"400\" rx=\"24\" fill=\"url(#stepbg)\"/>
  <g filter=\"url(#stepshadow)\">
    <rect x=\"70\" y=\"80\" width=\"460\" height=\"240\" rx=\"20\" fill=\"#ffffff\" stroke=\"#e2e8f0\"/>
  </g>
  <rect x=\"100\" y=\"120\" width=\"200\" height=\"14\" rx=\"7\" fill=\"#e2e8f0\"/>
  <rect x=\"100\" y=\"145\" width=\"160\" height=\"10\" rx=\"5\" fill=\"#e2e8f0\"/>
  <rect x=\"100\" y=\"170\" width=\"120\" height=\"10\" rx=\"5\" fill=\"#e2e8f0\"/>
  {human}
  <g transform=\"translate(400 210)\">{step_icon}</g>
</svg>
"""

def build_icon(icon_key, accent, accent2):
    template = ICON_TEMPLATES.get(icon_key, ICON_TEMPLATES["screen"])
    return template.format(accent=accent, accent2=accent2)


def build_step_icon(step_key, accent, accent2):
    template = STEP_ICONS.get(step_key, STEP_ICONS["step1"])
    return template.format(accent=accent, accent2=accent2)


def write_svg(path, content):
    path.write_text(content, encoding="utf-8")


for tool in TOOLS:
    slug = tool["slug"]
    accent = tool["accent"]
    accent2 = tool["accent2"]
    icon = build_icon(tool["icon"], accent, accent2)
    human = HUMAN_FIGURE.format(x=260, y=500, accent=accent, accent2=accent2)

    out_dir = ROOT / "images" / slug
    out_dir.mkdir(parents=True, exist_ok=True)

    hero_svg = HERO_TEMPLATE.format(accent=accent, accent2=accent2, icon=icon, human=human)
    write_svg(out_dir / "hero.svg", hero_svg)

    step_human = HUMAN_FIGURE.format(x=170, y=250, accent=accent, accent2=accent2)
    step1 = STEP_TEMPLATE.format(step_icon=build_step_icon("step1", accent, accent2), human=step_human)
    step2 = STEP_TEMPLATE.format(step_icon=build_step_icon("step2", accent, accent2), human=step_human)
    step3 = STEP_TEMPLATE.format(step_icon=build_step_icon("step3", accent, accent2), human=step_human)
    write_svg(out_dir / "step-1.svg", step1)
    write_svg(out_dir / "step-2.svg", step2)
    write_svg(out_dir / "step-3.svg", step3)

print("Generated human-themed SVGs for", len(TOOLS), "tools")
