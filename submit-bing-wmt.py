"""Bulk-submit URLs to Bing Webmaster Tools via their official API.

Why this beats IndexNow + UI submit:
- IndexNow = notification only, weighted lightly
- BWT UI = max 10 URLs/day per site
- BWT API = up to 10,000 URLs/day per site (much higher signal)

Get an API key:
1. https://www.bing.com/webmasters → sign in
2. Click your account icon (top right) → Settings → API Access
3. "Generate" → copy the API key
4. Save to .env in this dir as: BING_WMT_API_KEY=<key>

Usage:
    python submit-bing-wmt.py                    # submit URLs from sitemap.xml
    python submit-bing-wmt.py --urls a b c      # submit specific URLs
    python submit-bing-wmt.py --recent           # submit only last 90 days from sitemap
    python submit-bing-wmt.py --check            # check current quota / fetch info
    python submit-bing-wmt.py --dry-run          # list URLs without submitting
"""
from __future__ import annotations
import argparse, json, os, sys, datetime, urllib.request, urllib.error
import xml.etree.ElementTree as ET
from pathlib import Path

ROOT = Path(__file__).resolve().parent
SITEMAP = ROOT / 'sitemap.xml'
ENV_FILE = ROOT / '.env'
LOG_FILE = ROOT / 'submit-bing-wmt-log.txt'

SITE_URL = 'https://keyboardtester.click/'
API_BASE = 'https://ssl.bing.com/webmaster/api.svc/json'


def load_api_key() -> str:
    # Accept either BING_API_KEY (matches .env.example convention) or BING_WMT_API_KEY
    for var in ('BING_API_KEY', 'BING_WMT_API_KEY'):
        v = os.environ.get(var, '').strip()
        if v:
            return v
    # Then .env
    if ENV_FILE.exists():
        for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
            line = line.strip()
            for var in ('BING_API_KEY', 'BING_WMT_API_KEY'):
                if line.startswith(var + '='):
                    val = line.split('=', 1)[1].strip().strip('"').strip("'")
                    if val and val != 'your_bing_api_key_here':
                        return val
    raise SystemExit(
        'Missing BING_API_KEY. Get it from https://www.bing.com/webmasters '
        '(Settings -> API Access -> Generate), then add to .env in this dir:\n'
        '  BING_API_KEY=<your-key>'
    )


def load_urls_from_sitemap(recent_only: bool = False, days: int = 90) -> list[str]:
    if not SITEMAP.exists():
        raise SystemExit(f'sitemap.xml not found at {SITEMAP}')
    tree = ET.parse(SITEMAP)
    ns = {'sm': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
    cutoff = datetime.date.today() - datetime.timedelta(days=days)
    urls = []
    for url_elem in tree.getroot().findall('sm:url', ns):
        loc = url_elem.findtext('sm:loc', namespaces=ns, default='').strip()
        if not loc:
            continue
        if recent_only:
            lastmod = url_elem.findtext('sm:lastmod', namespaces=ns, default='').strip()
            if lastmod:
                try:
                    d = datetime.date.fromisoformat(lastmod[:10])
                    if d < cutoff:
                        continue
                except ValueError:
                    pass
        urls.append(loc)
    return urls


def post_json(endpoint: str, key: str, body: dict) -> tuple[int, str]:
    url = f'{API_BASE}/{endpoint}?apikey={key}'
    data = json.dumps(body).encode('utf-8')
    req = urllib.request.Request(url, data=data, method='POST')
    req.add_header('Content-Type', 'application/json; charset=utf-8')
    try:
        with urllib.request.urlopen(req, timeout=60) as r:
            return r.getcode(), r.read().decode('utf-8', errors='replace')
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode('utf-8', errors='replace')
    except Exception as e:
        return 0, str(e)


def get_quota(key: str):
    """GET request — fetches the daily/monthly quota."""
    url = f'{API_BASE}/GetUrlSubmissionQuota?apikey={key}&siteUrl={urllib.parse.quote(SITE_URL)}'
    try:
        with urllib.request.urlopen(url, timeout=30) as r:
            return r.getcode(), r.read().decode('utf-8', errors='replace')
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode('utf-8', errors='replace')
    except Exception as e:
        return 0, str(e)


def submit_batch(key: str, urls: list[str]) -> tuple[int, str]:
    body = {'siteUrl': SITE_URL, 'urlList': urls}
    return post_json('SubmitUrlbatch', key, body)


def append_log(message: str):
    ts = datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    with LOG_FILE.open('a', encoding='utf-8') as f:
        f.write(f'[{ts}] {message}\n')


def main():
    import urllib.parse
    ap = argparse.ArgumentParser(description=__doc__, formatter_class=argparse.RawDescriptionHelpFormatter)
    ap.add_argument('--urls', nargs='+', help='Submit these specific URLs')
    ap.add_argument('--recent', action='store_true', help='Only URLs with lastmod within --days')
    ap.add_argument('--days', type=int, default=90)
    ap.add_argument('--check', action='store_true', help='Check API quota only')
    ap.add_argument('--dry-run', action='store_true', help='Print URLs without submitting')
    ap.add_argument('--batch-size', type=int, default=500, help='URLs per batch (BWT cap is 500/call)')
    args = ap.parse_args()

    # Dry-run doesn't need the API key
    if args.dry_run:
        if args.urls:
            urls = args.urls
        else:
            urls = load_urls_from_sitemap(recent_only=args.recent, days=args.days)
        print(f'Loaded {len(urls)} URLs')
        for u in urls[:50]: print(' ', u)
        if len(urls) > 50: print(f'  ... and {len(urls)-50} more')
        return 0

    key = load_api_key()

    if args.check:
        code, body = get_quota(key)
        print(f'GetUrlSubmissionQuota: HTTP {code}')
        print(body)
        return 0

    if args.urls:
        urls = args.urls
    else:
        urls = load_urls_from_sitemap(recent_only=args.recent, days=args.days)

    print(f'Loaded {len(urls)} URLs')
    if args.dry_run:
        for u in urls[:50]: print(' ', u)
        if len(urls) > 50: print(f'  ... and {len(urls)-50} more')
        return 0

    # Quick quota check first
    code, body = get_quota(key)
    print(f'Quota: HTTP {code}: {body[:200]}')

    # Batch submit
    ok = fail = 0
    bs = max(1, min(500, args.batch_size))
    for i in range(0, len(urls), bs):
        batch = urls[i:i+bs]
        code, body = submit_batch(key, batch)
        line = f'Batch {i//bs + 1} ({len(batch)} URLs): HTTP {code}: {body[:160]}'
        print(line); append_log(line)
        if code == 200:
            ok += len(batch)
        else:
            fail += len(batch)
    print(f'\nDone. {ok}/{len(urls)} submitted, {fail} failed.')
    return 0 if fail == 0 else 2


if __name__ == '__main__':
    sys.exit(main())
