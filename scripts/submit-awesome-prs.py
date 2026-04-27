"""Submit 7 awesome-list PRs + 1 issue using GitHub REST API."""
import json, base64, urllib.request, urllib.error, os, re, time, sys

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


def get_readme(repo, branch, path='README.md'):
    code, d = api('GET', f'https://api.github.com/repos/{repo}/contents/{path}?ref={branch}')
    if code != 200 or not isinstance(d, dict):
        return None, None
    return base64.b64decode(d['content']).decode('utf-8'), d['sha']


def make_branch(fork_repo, base_branch, new_branch):
    code, d = api('GET', f'https://api.github.com/repos/{fork_repo}/git/ref/heads/{base_branch}')
    if code != 200:
        print(f'  ref get failed: {d}'); return False
    sha = d['object']['sha']
    code, d = api('POST', f'https://api.github.com/repos/{fork_repo}/git/refs',
                  {'ref': f'refs/heads/{new_branch}', 'sha': sha})
    return code in (200, 201) or (code == 422)


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


def open_issue(src_repo, title, body):
    code, d = api('POST', f'https://api.github.com/repos/{src_repo}/issues',
                  {'title': title, 'body': body})
    if code in (200, 201) and isinstance(d, dict):
        return d.get('html_url'), None
    return None, str(d)[:300]


TASKS = [
    {
        'kind': 'pr',
        'src': 'moyi4681/awesome-mechanical-keyboard',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click to Tools section',
        'commit_msg': 'Add KeyboardTester.click to Tools',
        'section_pattern': r'(##\s*Tools\s*\n)',
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free browser-based diagnostic suite — chatter detector, NKRO test, USB polling rate Hz estimator, switch sound classifier, key repeat rate. Open source, no install.',
        'strategy': 'append_to_section',
    },
    {
        'kind': 'pr',
        'src': 'fiatjaf/awesome-loginless',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click to Unclassified',
        'commit_msg': 'Add KeyboardTester.click',
        'section_pattern': r'(##\s*Unclassified\s*\n)',
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free hardware diagnostic suite (keyboard, mouse, screen, audio testing) that works in any browser, no login, no install.',
        'strategy': 'append_to_section_or_end',
    },
    {
        'kind': 'pr',
        'src': 'DolbyIO/awesome-audio',
        'branch': 'add-keyboardtester-audio',
        'title': 'Add KeyboardTester.click audio testing suite',
        'commit_msg': 'Add KeyboardTester.click audio suite',
        'section_pattern': r'(### How-To Analyze Audio\s*\n)',
        'new_line': '- [KeyboardTester.click — Audio Testing Suite](https://keyboardtester.click/headphone_speaker_tester_index.php) - Free browser-based audio diagnostics: 20 Hz–20 kHz frequency sweep, pitch detector, hearing-age test (mosquito tone), L/R speaker test, microphone test, decibel meter. Built on Web Audio API.',
        'strategy': 'append_to_section_or_end',
    },
    {
        'kind': 'pr',
        'src': 'brandonhimpfen/awesome-audio-engineering',
        'branch': 'add-keyboardtester-audio',
        'title': 'Add KeyboardTester.click — browser-based audio diagnostics',
        'commit_msg': 'Add KeyboardTester.click audio suite',
        'section_pattern': r'(##\s*Software\s*\n)',
        'new_line': '- [KeyboardTester.click Audio Suite](https://keyboardtester.click/headphone_speaker_tester_index.php) - Free browser-based diagnostic tools: 20 Hz–20 kHz log sweep, pitch detector with cents accuracy, hearing-age (mosquito tone) test, L/R speaker check, mic test, dB SPL meter. Built on Web Audio API; open source.',
        'strategy': 'append_to_section_or_end',
    },
    {
        'kind': 'pr',
        'src': 'amilajack/awesome-web-audio',
        'branch': 'add-keyboardtester-demos',
        'title': 'Add KeyboardTester.click Web Audio diagnostic demos',
        'commit_msg': 'Add KeyboardTester.click Web Audio demos',
        'section_pattern': r'(##\s*Demos\s*\n)',
        'new_line': '- [KeyboardTester.click Audio Tests](https://keyboardtester.click/headphone_speaker_tester_index.php) - Frequency sweep, pitch detector, hearing-age test, decibel meter — all built with Web Audio API as live in-browser demos.',
        'strategy': 'append_to_section_or_end',
    },
    {
        'kind': 'pr',
        'src': 'janstk/Awesome-online-tools',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click — free hardware testing suite',
        'commit_msg': 'Add KeyboardTester.click',
        'section_pattern': None,
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free hardware diagnostic suite covering keyboard, mouse, screen, webcam, microphone, and audio testing. 90+ tools, open source, no login.',
        'strategy': 'append_to_end',
    },
    {
        'kind': 'pr',
        'src': 'StanForever/awesome-websites',
        'branch': 'add-keyboardtester-click',
        'title': 'Add keyboardtester.click — free hardware testing suite',
        'commit_msg': 'Add keyboardtester.click',
        'section_pattern': r'(http://www\.keyboardtester\.com[^\n]+\n)',
        'new_line': '* https://keyboardtester.click : Free browser-based hardware diagnostic suite — keyboard, mouse, screen, audio, webcam testing in 90+ tools, no login. :keyboard:',
        'strategy': 'after_pattern_or_end',
    },
    {
        'kind': 'pr',
        'src': 'mathewlewallen/awesome-free-tools',
        'branch': 'add-keyboardtester-click',
        'title': 'Add KeyboardTester.click — free hardware diagnostic suite',
        'commit_msg': 'Add KeyboardTester.click',
        'section_pattern': None,
        'new_line': '- [KeyboardTester.click](https://keyboardtester.click) - Free browser-based hardware diagnostic suite — 90+ tools for keyboard, mouse, monitor, audio, and webcam testing. No signup, open source.',
        'strategy': 'append_to_end',
    },
    {
        'kind': 'issue',
        'src': 'Keycapsss/awesome-mechanical-keyboard',
        'title': 'Question: where do browser-based keyboard diagnostic tools belong in current Keebfolio structure?',
    },
]

# PR bodies (kept separate to avoid heredoc quoting issues)
PR_BODIES = {
    'moyi4681/awesome-mechanical-keyboard': """Adds KeyboardTester.click to the **Tools** section.

It's an open-source, browser-based diagnostic suite that complements existing entries (QMK Configurator, Keyboard Layout Editor) by handling the *verification* side of building mechanical keyboards:

- Chatter / double-firing detection per key with adjustable threshold
- N-key rollover and ghosting test
- USB polling rate (Hz) estimator via auto-repeat timing
- Switch sound classifier - FFT-based labeling of linear/tactile/clicky
- Key repeat rate + initial delay measurement

Source: https://github.com/nasirazizawan009/keyboardtester-click
Site: https://keyboardtester.click
License: MIT (open source). No login, no install, runs entirely in browser.""",

    'fiatjaf/awesome-loginless': """Adding KeyboardTester.click - 90+ hardware diagnostic tools that all work without an account. Covers keyboard / mouse / monitor / mic / webcam / audio testing.

I noticed the README says the list prefers server-backed services. I think KBT still fits because:
- The site itself is a hosted service (no install, available from any device)
- Some tools (IndexNow ping, AI assistant) do use server endpoints
- Open source: https://github.com/nasirazizawan009/keyboardtester-click

If browser-only tools are out of scope, please close this and I'll move on. No worries either way!""",

    'DolbyIO/awesome-audio': """Adds the KeyboardTester.click audio diagnostics suite - a set of free browser-based tools built on the Web Audio API:

- **Frequency Response Test** - 20 Hz to 20 kHz log sweep
  https://keyboardtester.click/frequency-response-test.php
- **Pitch Detector** - autocorrelation pitch detection (Hz, note, cents)
  https://keyboardtester.click/pitch-detector.php
- **Hearing Age Test** - mosquito tone (17.4 kHz) plus 12-step high-frequency sweep
  https://keyboardtester.click/hearing-age-test.php
- **Decibel Meter** - RMS-based dB SPL via microphone
  https://keyboardtester.click/decibel-meter.php
- **L/R Speaker Test** + **Surround Sound Test (5.1/7.1)**
- **Microphone Test** with live waveform

Open source: https://github.com/nasirazizawan009/keyboardtester-click
All tools run client-side, no signup, no upload.""",

    'brandonhimpfen/awesome-audio-engineering': """Submitting browser-based audio diagnostic tools that may be useful as quick checks alongside heavier engineering software:

- 20 Hz to 20 kHz log sweep (audible-range verification)
- Pitch detector with Hz/note/cents readout (autocorrelation)
- Mosquito-tone hearing test (8 kHz to 22 kHz, 12 steps)
- L/R speaker walk-around (5.1/7.1 supported)
- Live mic waveform + dB SPL meter

Source: https://github.com/nasirazizawan009/keyboardtester-click
Live: https://keyboardtester.click
All tools client-side via Web Audio API.""",

    'amilajack/awesome-web-audio': """Adds a set of Web Audio API live demos to the list:

- **Frequency Response Test** (OscillatorNode log sweep, 20 Hz to 20 kHz)
- **Pitch Detector** (AnalyserNode + autocorrelation)
- **Hearing Age Test** (12-step high-freq oscillator)
- **Decibel Meter** (getUserMedia + AnalyserNode RMS)

Each tool is a working live demo - no install, no account.

Source code: https://github.com/nasirazizawan009/keyboardtester-click""",

    'janstk/Awesome-online-tools': """Adds KeyboardTester.click - a free, open-source suite of 90+ browser-based hardware diagnostic tools.

Covers:
- Keyboard testing (NKRO, polling rate, chatter detection, switch sounds)
- Mouse testing (DPI, polling rate, click accuracy, drift, ghost-click)
- Display testing (sharpness, color, ghosting, dead pixel, frame skipping)
- Audio testing (frequency response, pitch detection, hearing age, dB meter)
- Webcam testing + camera resolution check
- Calculators (eDPI, FOV, RAM latency, bandwidth, RAID, TTK)

All tools run entirely in the browser. No signup. Open source under MIT:
https://github.com/nasirazizawan009/keyboardtester-click""",

    'StanForever/awesome-websites': """Adds keyboardtester.click to section K (alphabetical).

Companion to the existing keyboardtester.com entry - broader scope (90+ tools covering keyboard, mouse, monitor, audio, webcam, mic) and fully open source: https://github.com/nasirazizawan009/keyboardtester-click

Free, no login, no install. All testing happens client-side in the browser.""",

    'mathewlewallen/awesome-free-tools': """Adds KeyboardTester.click - a free, open-source suite of 90+ browser-based hardware diagnostic tools.

Covers keyboard / mouse / monitor / audio / webcam testing. All client-side, no signup, MIT-licensed: https://github.com/nasirazizawan009/keyboardtester-click""",
}

ISSUE_BODIES = {
    'Keycapsss/awesome-mechanical-keyboard': """Hi! I built [KeyboardTester.click](https://keyboardtester.click) - a free, open-source, browser-based diagnostic suite for mechanical keyboards. It includes:

- Per-key chatter detector (configurable threshold)
- NKRO/ghosting test
- USB polling rate (Hz) estimator
- Switch sound classifier (FFT-based linear/tactile/clicky labeling)
- Key repeat rate + initial delay tester

Source: https://github.com/nasirazizawan009/keyboardtester-click

I noticed the repo switched to a Keebfolio file-per-resource structure. Where would tools like this fit best - a new `tools/` subfolder, `miscellaneous/`, or somewhere else?

Happy to send a PR once you point me to the right place."""
}


def insert_content(content: str, strategy: str, pattern: str | None, new_line: str) -> str | None:
    if strategy == 'append_to_section':
        m = re.search(pattern, content)
        if not m:
            return None
        after = content[m.end():]
        sect_end = re.search(r'\n##\s|\n\Z', after)
        section_body_end = m.end() + (sect_end.start() if sect_end else len(after))
        return content[:section_body_end].rstrip('\n') + '\n' + new_line + '\n' + content[section_body_end:]

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

    if strategy == 'after_pattern_or_end':
        m = re.search(pattern, content) if pattern else None
        if m:
            return content[:m.end()] + new_line + '\n' + content[m.end():]
        return content.rstrip('\n') + '\n' + new_line + '\n'

    return None


def process_task(t):
    src = t['src']
    print(f'\n=== {src} ({t["kind"]}) ===')

    if t['kind'] == 'issue':
        body = ISSUE_BODIES[src]
        url, err = open_issue(src, t['title'], body)
        return (src, url, 'issue' if url else f'issue-fail: {err}')

    fork_repo = f'{USER}/{src.split("/")[1]}'
    fork(src)

    base = get_default_branch(src)
    print(f'  base branch: {base}')

    content, sha = get_readme(fork_repo, base)
    if content is None:
        return (src, None, 'readme-fail')

    if 'keyboardtester.click' in content.lower():
        print('  ALREADY PRESENT — skipping')
        return (src, None, 'already-present')

    new_content = insert_content(content, t['strategy'], t.get('section_pattern'), t['new_line'])
    if new_content is None:
        return (src, None, f'insert-fail (strategy={t["strategy"]})')

    if not make_branch(fork_repo, base, t['branch']):
        return (src, None, 'branch-fail')

    ok, d = commit_file(fork_repo, 'README.md', new_content, sha, t['branch'], t['commit_msg'])
    if not ok:
        return (src, None, f'commit-fail: {str(d)[:200]}')

    body = PR_BODIES[src]
    url, err = open_pr(src, USER, t['branch'], base, t['title'], body)
    return (src, url, 'pr' if url else f'pr-fail: {err}')


if __name__ == '__main__':
    results = []
    for t in TASKS:
        try:
            r = process_task(t)
            print(f'  RESULT: {r[2]}: {r[1] or "—"}')
            results.append(r)
        except Exception as e:
            print(f'  EXCEPTION: {type(e).__name__}: {e}')
            results.append((t['src'], None, f'exception: {e}'))

    print('\n=== SUMMARY ===')
    for src, url, status in results:
        flag = 'OK' if url else '--'
        print(f'  [{flag}] {src:50} -> {status}')
        if url:
            print(f'        {url}')
