"""Retry the 6 PR failures from submit-specialized-prs.py"""
import json, base64, urllib.request, urllib.error, os, time

TOKEN = os.environ.get('GITHUB_TOKEN', '')
USER = 'nasirazizawan009'
H = {'Authorization': f'token {TOKEN}', 'Accept': 'application/vnd.github+json'}


def api(method, url, body=None):
    data = json.dumps(body).encode() if body else None
    headers = dict(H)
    if body: headers['Content-Type'] = 'application/json'
    req = urllib.request.Request(url, data=data, method=method, headers=headers)
    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            txt = r.read().decode('utf-8')
            return r.getcode(), json.loads(txt) if txt else {}
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode('utf-8')[:500]


def get_default_branch(src):
    code, d = api('GET', f'https://api.github.com/repos/{src}')
    return d.get('default_branch', 'master') if isinstance(d, dict) else 'master'


def get_readme(repo, branch):
    # Try common variants
    for path in ['README.md', 'readme.md', 'Readme.md', 'README.MD', 'README.markdown', 'README.rst', 'README']:
        code, d = api('GET', f'https://api.github.com/repos/{repo}/contents/{path}?ref={branch}')
        if code == 200 and isinstance(d, dict):
            return base64.b64decode(d['content']).decode('utf-8'), d['sha'], d['name']
    return None, None, None


def make_branch(fork_repo, base_branch, new_branch):
    code, d = api('GET', f'https://api.github.com/repos/{fork_repo}/git/ref/heads/{base_branch}')
    if code != 200: return False
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


# Skip t18n (archived). Retry the rest.
RETRIES = [
    {
        'src': 'Lissy93/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak-v2',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'body': """Adds a free WebRTC IP leak detector to the list:

**WebRTC Leak Test** (https://keyboardtester.click/webrtc-leak-test.php) - Free, browser-based WebRTC leak detector that reports public IP, local IPs, and IPv6 addresses via STUN. Helps verify VPN / privacy setups.

- Works in any modern browser
- Nothing uploaded
- Open source: https://github.com/nasirazizawan009/keyboardtester-click""",
    },
    {
        'src': 'paulaime/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak-v2',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'body': """Adds a free WebRTC IP leak detector to the list. Browser-based, reports public IP / local IPs / IPv6 leaks via STUN. Useful for verifying VPN setups. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",
    },
    {
        'src': 'KevinColemanInc/awesome-privacy',
        'branch': 'add-keyboardtester-webrtc-leak',
        'title': 'Add KeyboardTester.click WebRTC leak detector',
        'commit_msg': 'Add WebRTC leak test',
        'new_line': '- [KeyboardTester.click WebRTC Leak Test](https://keyboardtester.click/webrtc-leak-test.php) - Free browser-based WebRTC IP leak detector via STUN.',
        'body': """Adds a free WebRTC IP leak detector to the list. Browser-based, reports public IP / local IPs / IPv6 leaks. Open source: https://github.com/nasirazizawan009/keyboardtester-click""",
    },
    {
        'src': 'ryanmagoon/awesome-a11y',
        'branch': 'add-keyboardtester-hearing',
        'title': 'Add KeyboardTester.click hearing age + sharpness tests',
        'commit_msg': 'Add KeyboardTester.click a11y tools',
        'new_line': '- [KeyboardTester.click Hearing & Sharpness Tests](https://keyboardtester.click/hearing-age-test.php) - Free browser-based hearing screening (8-22 kHz with mosquito tone) and monitor sharpness test (Lagom 1px grid + sub-pixel ruler) for users with hearing/visual sensitivity.',
        'body': """Adds two browser-based accessibility-relevant testing tools:

- **Hearing Age Test** (https://keyboardtester.click/hearing-age-test.php) - Free hearing screening (8 kHz to 22 kHz) including the 17.4 kHz mosquito tone, with explicit warnings about Bluetooth codec roll-off.
- **Monitor Sharpness Test** (https://keyboardtester.click/monitor-sharpness-test.php) - Lagom-style 1px pixel grid + multi-size text samples + RGB sub-pixel ruler.

Open source: https://github.com/nasirazizawan009/keyboardtester-click""",
    },
    {
        'src': 'moimikey/awesome-devtools',
        'branch': 'add-keyboardtester-ruler-v2',
        'title': 'Add KeyboardTester.click Online Ruler',
        'commit_msg': 'Add KeyboardTester.click ruler',
        'new_line': '- [KeyboardTester.click Online Ruler](https://keyboardtester.click/online-ruler.php) - Browser SVG ruler in actual size (cm + inches), calibrate with credit card or monitor DPI.',
        'body': """Adds a useful browser-based developer utility:

**Online Ruler** (https://keyboardtester.click/online-ruler.php) - SVG ruler in actual size (cm + inches) on any screen. Calibrate via credit card overlay (ISO ID-1, 85.6 x 54 mm) or by entering monitor DPI. Useful for verifying physical dimensions on screen.

Open source: https://github.com/nasirazizawan009/keyboardtester-click""",
    },
]


def process(t):
    src = t['src']
    print(f'\n=== retry: {src} ===')
    fork_repo = f'{USER}/{src.split("/")[1]}'

    # Refresh fork's master from upstream first by triggering a sync (if possible)
    api('POST', f'https://api.github.com/repos/{fork_repo}/merge-upstream', {'branch': 'master'})
    api('POST', f'https://api.github.com/repos/{fork_repo}/merge-upstream', {'branch': 'main'})
    time.sleep(3)

    base = get_default_branch(src)
    print(f'  base: {base}')

    content, sha, fname = get_readme(fork_repo, base)
    if content is None:
        return (src, None, 'readme-fail (file not found)')

    if 'keyboardtester.click' in content.lower():
        return (src, None, 'already-present')

    # Append at end (safe default)
    new_content = content.rstrip('\n') + '\n' + t['new_line'] + '\n'

    if not make_branch(fork_repo, base, t['branch']):
        return (src, None, 'branch-fail')

    ok, d = commit_file(fork_repo, fname, new_content, sha, t['branch'], t['commit_msg'])
    if not ok:
        return (src, None, f'commit-fail: {str(d)[:150]}')

    url, err = open_pr(src, USER, t['branch'], base, t['title'], t['body'])
    return (src, url, 'pr' if url else f'pr-fail: {err}')


if __name__ == '__main__':
    if not TOKEN: raise SystemExit('GITHUB_TOKEN env var not set')
    results = []
    for t in RETRIES:
        try:
            r = process(t)
            print(f'  -> {r[2]}: {r[1] or ""}')
            results.append(r)
        except Exception as e:
            print(f'  EXCEPTION: {e}')
            results.append((t['src'], None, f'exception: {e}'))
        time.sleep(2)

    print('\n=== RETRY SUMMARY ===')
    ok = 0
    for src, url, status in results:
        flag = 'OK' if url else '--'
        print(f'  [{flag}] {src:50} -> {status}')
        if url: print(f'        {url}'); ok += 1
    print(f'\nRetry: {ok}/{len(results)} ok.')
