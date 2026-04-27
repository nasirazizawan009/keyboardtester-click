"""Submit ~25 specialized awesome-list PRs with tool-specific anchors."""
import json, base64, urllib.request, urllib.error, os, re, time

TOKEN = os.environ.get('GITHUB_TOKEN', '')
if not TOKEN:
    raise SystemExit('GITHUB_TOKEN env var not set')
USER = 'nasirazizawan009'
H = {'Authorization': f'token {TOKEN}', 'Accept': 'application/vnd.github+json'}


def api(method, url, body=None):
    data = json.dumps(body).encode() if body else None
    headers = dict(H)
    if body:
        headers['Content-Type'] = 'application/json'
    req = urllib.request.Request(url, data=data, method=method, headers=headers)
    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            txt = r.read().decode('utf-8')
            return r.getcode(), json.loads(txt) if txt else {}
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode('utf-8')[:500]


def fork(src):
    code, _ = api('POST', f'https://api.github.com/repos/{src}/forks')
    print(f'  fork {src}: HTTP {code}')
    time.sleep(6)


def get_default_branch(src):
    code, d = api('GET', f'https://api.github.com/repos/{src}')
    return d.get('default_branch', 'master') if isinstance(d, dict) else 'master'


def get_readme(repo, branch):
    # Try README.md first, then readme.md, then README.MD
    for path in ['README.md', 'readme.md', 'README.MD', 'README.markdown']:
        code, d = api('GET', f'https://api.github.com/repos/{repo}/contents/{path}?ref={branch}')
        if code == 200 and isinstance(d, dict):
            return base64.b64decode(d['content']).decode('utf-8'), d['sha'], d['name']
    return None, None, None


def make_branch(fork_repo, base_branch, new_branch):
    code, d = api('GET', f'https://api.github.com/repos/{fork_repo}/git/ref/heads/{base_branch}')
    if code != 200:
        return False
    sha = d['object']['sha']
    code, d = api('POST', f'https://api.github.com/repos/{fork_repo}/git/refs',
                  {'ref': f'refs/heads/{new_branch}', 'sha': sha})
    return code in (200, 201) or code == 422


def commit_file(fork_repo, path, content, sha, branch, msg):
    body = {'message': msg, 'content': base64.b64encode(content.encode('utf-8')).decode(),
            'sha': sha, 'branch': branch}
    code, d = api('PUT', f'https://api.github.com/repos/{fork_repo}/contents/{path}', body)
    return code in (200, 201), d


def open_pr(src_repo, head_user, head_branch, base_branch, title, body):
    pr = {'title': title, 'head': f'{head_user}:{head_branch}', 'base': base_branch,
          'body': body, 'maintainer_can_modify': True}
    code, d = api('POST', f'https://api.github.com/repos/{src_repo}/pulls', pr)
    if code in (200, 201) and isinstance(d, dict):
        return d.get('html_url'), None
    return None, str(d)[:300]


# ── PR bodies (separate to avoid escaping nightmares) ──
B = {
    'music-prod': """Adds two browser-based audio tools that fit well alongside DAWs / plugins / utilities:

- **Pitch Detector** (https://keyboardtester.click/pitch-detector.php) - autocorrelation pitch detection from your microphone with Hz / nearest note (C0-C8) / cents-off readout. Useful for vocal warmups, instrument tuning, or quick reference.
- **Frequency Response Test** (https://keyboardtester.click/frequency-response-test.php) - 20 Hz to 20 kHz log sweep for studio monitor / headphone calibration.

Built on Web Audio API. Open source: https://github.com/nasirazizawan009/keyboardtester-click. No login, no install.""",

    'musicdsp': """Adds a Web Audio API live demo that may fit "DSP / audio programming examples":

**Pitch Detector** (https://keyboardtester.click/pitch-detector.php) - Live mic input -> AnalyserNode -> autocorrelation pitch detection in ~50 lines of JS. Reports Hz, nearest note, octave, and cents. Open source: https://github.com/nasirazizawan009/keyboardtester-click

The autocorrelation implementation might be a useful reference for browser-based pitch detection.""",

    'privacy': """Adds a free WebRTC IP leak detector to the list:

**WebRTC Leak Test** (https://keyboardtester.click/webrtc-leak-test.php) - Free, browser-based WebRTC leak detector that reports public IP, local IPs, and IPv6 addresses via STUN. Helps verify VPN / privacy setups.

- Works in any modern browser
- Nothing uploaded
- Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'keyboard': """Adds [KeyboardTester.click](https://keyboardtester.click) - a free, open-source, browser-based keyboard diagnostic suite:

- Per-key chatter / double-firing detector
- N-key rollover and ghosting test
- USB polling rate (Hz) estimator
- Switch sound classifier (FFT-based linear/tactile/clicky labeling)
- Key repeat rate + initial delay
- Typing speed test (WPM/accuracy)

Source: https://github.com/nasirazizawan009/keyboardtester-click. Open source under MIT, no install, no login.""",

    'typing': """Adds a free in-browser touch typing test to the list:

**Typing Speed Test** (https://keyboardtester.click/keyboard_typing_test.php) - Free typing speed and accuracy test (WPM measurement, real-time feedback, multiple durations).

Plus complementary tools on the same site (no signup): keyboard chatter detector, NKRO test, polling rate Hz estimator, key repeat rate. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'esports': """Submitting two open-source browser tools relevant to competitive gaming:

- **TTK Calculator** (https://keyboardtester.click/ttk-calculator.php) - Time-to-kill math (damage + RPM + HP + armor + headshot multiplier -> bullets-to-kill and TTK in ms). Presets for CS2, Valorant, Apex, CoD.
- **eDPI Calculator** (https://keyboardtester.click/edpi-calculator.php) - DPI x sensitivity = effective DPI; cm/360 conversion across game yaw multipliers.

Open source: https://github.com/nasirazizawan009/keyboardtester-click. Free, no login.""",

    'a11y': """Adds two browser-based accessibility-relevant testing tools:

- **Hearing Age Test** (https://keyboardtester.click/hearing-age-test.php) - Free hearing screening (8 kHz to 22 kHz) including the 17.4 kHz mosquito tone. Useful as a self-check for high-frequency hearing loss; with explicit warnings about Bluetooth codec roll-off (a real concern for accurate testing).
- **Monitor Sharpness Test** (https://keyboardtester.click/monitor-sharpness-test.php) - Lagom-style 1px pixel grid + multi-size text samples + RGB sub-pixel ruler. Helps users with visual sensitivity check display calibration / sharpness.

Both run entirely in browser, no install. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'devtools': """Adds a useful browser-based developer utility:

**Online Ruler** (https://keyboardtester.click/online-ruler.php) - SVG ruler in actual size (cm + inches) on any screen. Calibrate via credit card overlay (ISO ID-1, 85.6 x 54 mm) or by entering monitor DPI. Calibration persists in localStorage.

Useful for design / front-end work where you need to verify physical dimensions on screen. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'design-tools': """Adds two browser-based tools useful for designers:

- **Online Ruler** (https://keyboardtester.click/online-ruler.php) - SVG ruler at actual size (cm + inches), calibrate with credit card or monitor DPI.
- **Monitor Color / Banding Test** (https://keyboardtester.click/color-test.php) - 14 color panels including dedicated R/G/B gradients to check display banding, panel bit depth (6/8/10-bit), and color accuracy.

Both run in any browser, no signup. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'colorful': """Adds a relevant tool for designers picking color schemes:

**Monitor Color & Banding Test** (https://keyboardtester.click/color-test.php) - Free browser tool that displays solid R/G/B/W/K panels and 1024-step linear gradients to check whether your monitor is rendering smooth color transitions or showing banding (which would distort how your color schemes appear). Includes 6-bit vs 8-bit vs 10-bit panel discussion.

Open source: https://github.com/nasirazizawan009/keyboardtester-click""",

    'gaming': """Adds three free, open-source browser tools for competitive gaming:

- **TTK Calculator** (https://keyboardtester.click/ttk-calculator.php) - Time-to-kill for FPS games (CS2/Valorant/Apex/CoD presets included).
- **eDPI Calculator** (https://keyboardtester.click/edpi-calculator.php) - DPI x sensitivity, cm/360 conversion across game yaw multipliers.
- **Crosshair Generator** (https://keyboardtester.click/crosshair-generator.php) - Custom CS2 / Valorant crosshair builder with live preview and CS2 console command export.

Source: https://github.com/nasirazizawan009/keyboardtester-click. No login, free.""",
}


TASKS = [
    # ── Audio / Music cluster ──
    {
        'src': 'ad-si/awesome-music-production',
        'branch': 'add-keyboardtester-audio-tools',
        'title': 'Add KeyboardTester.click pitch detector + frequency response sweep',
        'commit_msg': 'Add KeyboardTester.click audio tools',
        'pattern': r'(##\s*Tools\s*\n|##\s*Apps\s*\n|##\s*Software\s*\n)',
        'new_line': '- [KeyboardTester.click — Pitch Detector + Frequency Response](https://keyboardtester.click/pitch-detector.php) - Free browser-based pitch detector with Hz/note/cents readout, plus a 20 Hz–20 kHz log sweep for monitor/headphone calibration. Built on Web Audio API. Open source.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'music-prod',
    },
    {
        'src': 'olilarkin/awesome-musicdsp',
        'branch': 'add-keyboardtester-pitch-detector',
        'title': 'Add browser-based pitch detector (Web Audio API + autocorrelation example)',
        'commit_msg': 'Add KeyboardTester.click pitch detector',
        'pattern': None,
        'new_line': '- [KeyboardTester.click Pitch Detector](https://keyboardtester.click/pitch-detector.php) - Browser-based pitch detector built on Web Audio API + autocorrelation; live mic input, Hz/note/cents readout. Open source: https://github.com/nasirazizawan009/keyboardtester-click',
        'strategy': 'append_to_end',
        'body_key': 'musicdsp',
    },

    # ── Privacy cluster ──
    {
        'src': 'pluja/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN. Reports public IP, local IPs, IPv6 leaks. Open source.',
        'strategy': 'append_to_end',
        'body_key': 'privacy',
    },
    {
        'src': 'iAnonymous3000/awesome-privacy-tools',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector. Verifies VPN setups by reporting public IP, local IPs, and IPv6 leaks via STUN.',
        'strategy': 'append_to_end',
        'body_key': 'privacy',
    },
    {
        'src': 'Lissy93/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'strategy': 'append_to_end',
        'body_key': 'privacy',
    },
    {
        'src': 'paulaime/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'strategy': 'append_to_end',
        'body_key': 'privacy',
    },
    {
        'src': 'KevinColemanInc/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'strategy': 'append_to_end',
        'body_key': 'privacy',
    },

    # ── Keyboard / typing cluster ──
    {
        'src': 'Delapouite/awesome-keyboard',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click — open-source diagnostic suite',
        'commit_msg': 'Add KeyboardTester.click',
        'pattern': r'(##\s*Test(?:ing|s)?\s*\n|##\s*Tools\s*\n)',
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free open-source browser keyboard tester: chatter detection, NKRO, polling rate Hz, switch sound analyzer, key repeat rate.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'keyboard',
    },
    {
        'src': 'esteves-esta/awesome-touch-typing',
        'branch': 'add-keyboardtester-typing',
        'title': 'Add KeyboardTester.click typing test',
        'commit_msg': 'Add KeyboardTester.click typing test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click Typing Test](https://keyboardtester.click/keyboard_typing_test.php) - Free typing speed test (WPM, accuracy, multiple durations). Companion tools on same site: keyboard tester, key repeat rate, NKRO check.',
        'strategy': 'append_to_end',
        'body_key': 'typing',
    },
    {
        'src': 'EanNewton/Awesome-Keebs',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click — open-source keyboard diagnostic suite',
        'commit_msg': 'Add KeyboardTester.click',
        'pattern': None,
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free open-source browser keyboard tester: chatter detection, NKRO, polling rate Hz, switch sound analyzer.',
        'strategy': 'append_to_end',
        'body_key': 'keyboard',
    },

    # ── Esports / gaming cluster ──
    {
        'src': 'Strift/awesome-esports',
        'branch': 'add-keyboardtester-tools',
        'title': 'Add KeyboardTester.click TTK + eDPI calculators',
        'commit_msg': 'Add KeyboardTester.click esports tools',
        'pattern': r'(##\s*Tools\s*\n|##\s*Open-source projects\s*\n)',
        'new_line': '- [KeyboardTester.click — TTK + eDPI calculators](https://keyboardtester.click/ttk-calculator.php) - Free browser tools for FPS players: TTK (time-to-kill) calculator with CS2/Valorant/Apex/CoD presets, eDPI calculator with cm/360 conversion. Open source.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'esports',
    },
    {
        'src': 'K3V1991/Awesome-Gaming-List',
        'branch': 'add-keyboardtester-tools',
        'title': 'Add KeyboardTester.click gaming tools (TTK, eDPI, crosshair generator)',
        'commit_msg': 'Add KeyboardTester.click gaming tools',
        'pattern': r'(##\s*Tools\s*\n|##\s*Websites\s*\n)',
        'new_line': '- [KeyboardTester.click Gaming Tools](https://keyboardtester.click) - Free browser tools for competitive gamers: TTK calculator (CS2/Valorant/Apex/CoD), eDPI calculator with cm/360, custom crosshair generator with CS2 export, mouse polling rate test, click speed test.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'gaming',
    },

    # ── Accessibility cluster ──
    {
        'src': 'brunopulis/awesome-a11y',
        'branch': 'add-keyboardtester-a11y',
        'title': 'Add KeyboardTester.click hearing-age + monitor sharpness tests',
        'commit_msg': 'Add KeyboardTester.click a11y tools',
        'pattern': r'(##\s*Tools\s*\n|##\s*Tests?\s*\n)',
        'new_line': '- [KeyboardTester.click — Hearing & Sharpness Tests](https://keyboardtester.click/hearing-age-test.php) - Free browser-based screening tools: hearing-age test (8-22 kHz with mosquito tone), monitor sharpness test (Lagom 1px grid + RGB sub-pixel ruler) — useful for users with hearing or visual sensitivity. Open source.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'a11y',
    },
    {
        'src': 'ryanmagoon/awesome-a11y',
        'branch': 'add-keyboardtester-hearing',
        'title': 'Add KeyboardTester.click hearing age + monitor sharpness tests',
        'commit_msg': 'Add KeyboardTester.click a11y tools',
        'pattern': None,
        'new_line': '- [KeyboardTester.click Hearing Age Test](https://keyboardtester.click/hearing-age-test.php) - Free in-browser hearing screening (8 kHz to 22 kHz including 17.4 kHz mosquito tone) with codec/headphone caveats. Companion: monitor sharpness test for visual sensitivity.',
        'strategy': 'append_to_end',
        'body_key': 'a11y',
    },

    # ── Developer tools cluster ──
    {
        'src': 'devtoolsd/awesome-devtools',
        'branch': 'add-keyboardtester-ruler',
        'title': 'Add KeyboardTester.click Online Ruler — actual-size on-screen ruler',
        'commit_msg': 'Add KeyboardTester.click ruler',
        'pattern': r'(##\s*Utilities\s*\n|##\s*Tools\s*\n|##\s*Productivity\s*\n)',
        'new_line': '- [KeyboardTester.click Online Ruler](https://keyboardtester.click/online-ruler.php) - Free browser SVG ruler in actual size (cm + inches), calibrate with credit card or DPI. Useful for verifying physical dimensions on screen.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'devtools',
    },
    {
        'src': 't18n/awesome-dev-tools',
        'branch': 'add-keyboardtester-ruler',
        'title': 'Add KeyboardTester.click Online Ruler',
        'commit_msg': 'Add KeyboardTester.click ruler',
        'pattern': r'(##\s*Utilities\s*\n|##\s*Tools\s*\n|##\s*Productivity\s*\n)',
        'new_line': '- [KeyboardTester.click Online Ruler](https://keyboardtester.click/online-ruler.php) - Free browser SVG ruler in actual size (cm + inches) with credit-card calibration.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'devtools',
    },
    {
        'src': 'moimikey/awesome-devtools',
        'branch': 'add-keyboardtester-ruler',
        'title': 'Add KeyboardTester.click Online Ruler',
        'commit_msg': 'Add KeyboardTester.click ruler',
        'pattern': None,
        'new_line': '- [KeyboardTester.click Online Ruler](https://keyboardtester.click/online-ruler.php) - Browser SVG ruler in actual size (cm + inches), calibrate with credit card or monitor DPI.',
        'strategy': 'append_to_end',
        'body_key': 'devtools',
    },

    # ── Design / color cluster ──
    {
        'src': 'goabstract/Awesome-Design-Tools',
        'branch': 'add-keyboardtester-tools',
        'title': 'Add KeyboardTester.click ruler + color/banding test',
        'commit_msg': 'Add KeyboardTester.click design tools',
        'pattern': r'(##\s*Tools\s*\n|##\s*Color\s*\n|##\s*Color Tools\s*\n)',
        'new_line': '- [KeyboardTester.click — Ruler + Color/Banding Test](https://keyboardtester.click/online-ruler.php) - Free browser tools for designers: actual-size SVG ruler (cm/inches with credit-card calibration), monitor color & banding test (R/G/B gradients, 6/8/10-bit panel check). Open source.',
        'strategy': 'append_to_section_or_end',
        'body_key': 'design-tools',
    },
    {
        'src': 'Siddharth11/Colorful',
        'branch': 'add-keyboardtester-color-test',
        'title': 'Add KeyboardTester.click monitor color/banding test',
        'commit_msg': 'Add color/banding test',
        'pattern': None,
        'new_line': '- [KeyboardTester.click Monitor Color & Banding Test](https://keyboardtester.click/color-test.php) - Free browser tool: 14 color panels with RGB gradients to check display banding (6/8/10-bit panel detection). Important for designers verifying that color schemes display accurately.',
        'strategy': 'append_to_end',
        'body_key': 'colorful',
    },
]


def insert_content(content, strategy, pattern, new_line):
    if strategy == 'append_to_section_or_end':
        m = re.search(pattern, content) if pattern else None
        if m:
            after = content[m.end():]
            sect_end = re.search(r'\n##\s|\n\Z', after)
            section_body_end = m.end() + (sect_end.start() if sect_end else len(after))
            return content[:section_body_end].rstrip('\n') + '\n' + new_line + '\n' + content[section_body_end:]
        return content.rstrip('\n') + '\n\n' + new_line + '\n'
    if strategy == 'append_to_end':
        return content.rstrip('\n') + '\n' + new_line + '\n'
    return None


def process_task(t):
    src = t['src']
    print(f'\n=== {src} ===')

    fork_repo = f'{USER}/{src.split("/")[1]}'
    fork(src)

    base = get_default_branch(src)
    print(f'  base: {base}')

    content, sha, fname = get_readme(fork_repo, base)
    if content is None:
        return (src, None, 'readme-fail')

    if 'keyboardtester.click' in content.lower():
        return (src, None, 'already-present')

    new_content = insert_content(content, t['strategy'], t.get('pattern'), t['new_line'])
    if new_content is None:
        return (src, None, 'insert-fail')

    if not make_branch(fork_repo, base, t['branch']):
        return (src, None, 'branch-fail')

    ok, d = commit_file(fork_repo, fname, new_content, sha, t['branch'], t['commit_msg'])
    if not ok:
        return (src, None, f'commit-fail: {str(d)[:150]}')

    body = B[t['body_key']]
    url, err = open_pr(src, USER, t['branch'], base, t['title'], body)
    return (src, url, 'pr' if url else f'pr-fail: {err}')


if __name__ == '__main__':
    results = []
    for t in TASKS:
        try:
            r = process_task(t)
            print(f'  -> {r[2]}: {r[1] or ""}')
            results.append(r)
        except Exception as e:
            print(f'  EXCEPTION: {type(e).__name__}: {e}')
            results.append((t['src'], None, f'exception: {e}'))
        time.sleep(2)  # politeness pause

    print('\n\n=== SUMMARY ===')
    ok = fail = 0
    for src, url, status in results:
        flag = 'OK' if url else '--'
        print(f'  [{flag}] {src:50} -> {status}')
        if url:
            print(f'        {url}')
            ok += 1
        else:
            fail += 1
    print(f'\nTotal: {ok} ok, {fail} skipped/failed out of {len(results)}.')
