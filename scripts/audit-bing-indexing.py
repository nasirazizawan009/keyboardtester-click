"""Audit Bing indexing status: for each URL in sitemap, hit BWT GetUrlInfo
and bucket results by whether Bing has indexed it.

Output:
  - Counts: indexed vs not indexed
  - List of unindexed URLs (so we can prioritize internal links / authority)
"""
from __future__ import annotations
import sys, json, urllib.request, urllib.parse, urllib.error, time, datetime
import xml.etree.ElementTree as ET
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent
SITEMAP = ROOT / 'sitemap.xml'
ENV_FILE = ROOT / '.env'
SITE_URL = 'https://keyboardtester.click/'
API_BASE = 'https://ssl.bing.com/webmaster/api.svc/json'


def load_api_key() -> str:
    if ENV_FILE.exists():
        for line in ENV_FILE.read_text(encoding='utf-8').splitlines():
            line = line.strip()
            for var in ('BING_API_KEY', 'BING_WMT_API_KEY'):
                if line.startswith(var + '='):
                    val = line.split('=', 1)[1].strip().strip('"').strip("'")
                    if val and val != 'your_bing_api_key_here':
                        return val
    raise SystemExit('Missing BING_API_KEY in .env')


def get_url_info(key: str, target_url: str) -> dict:
    """GET https://ssl.bing.com/webmaster/api.svc/json/GetUrlInfo?siteUrl=...&url=...&apikey=..."""
    qs = urllib.parse.urlencode({'siteUrl': SITE_URL, 'url': target_url, 'apikey': key})
    api_url = f'{API_BASE}/GetUrlInfo?{qs}'
    try:
        with urllib.request.urlopen(api_url, timeout=30) as r:
            return json.loads(r.read().decode('utf-8'))
    except urllib.error.HTTPError as e:
        return {'_error': f'HTTP {e.code}', '_body': e.read().decode('utf-8', errors='replace')[:200]}
    except Exception as e:
        return {'_error': str(e)[:200]}


def main():
    if not SITEMAP.exists():
        raise SystemExit('sitemap.xml not found')
    tree = ET.parse(SITEMAP)
    ns = {'sm': 'http://www.sitemaps.org/schemas/sitemap/0.9'}
    urls = [el.findtext('sm:loc', namespaces=ns).strip()
            for el in tree.getroot().findall('sm:url', ns)]

    # Limit to a representative sample to stay polite to the API.
    # Priority: recent root tools first
    PRIORITY = [
        'monitor-sharpness-test', 'pitch-detector', 'webcam-mirror', 'hearing-age-test', 'online-ruler',
        'guild-name-generator', 'auditory-reaction-time-test', 'frame-skipping-test', 'surround-sound-test',
        'cpu-stress-test', 'gpu-stress-test', 'memory-test', 'ram-latency-calculator', 'bandwidth-calculator',
        'download-time-calculator', 'raid-calculator', 'ttk-calculator', 'minecraft-circle-generator',
        'frequency-response-test', 'accelerometer-test', 'gyroscope-test', 'vibration-test', 'gamertag-generator',
    ]
    audit_urls = []
    for slug in PRIORITY:
        for u in urls:
            if f'/{slug}.php' in u:
                audit_urls.append(u)

    print(f'Auditing {len(audit_urls)} priority URLs (recent waves + their localized variants)...')
    key = load_api_key()

    indexed = []
    not_indexed = []
    errors = []
    for i, u in enumerate(audit_urls, 1):
        info = get_url_info(key, u)
        if '_error' in info:
            errors.append((u, info))
            print(f'[{i}/{len(audit_urls)}] ERR {u}: {info.get("_error")}')
        else:
            d = info.get('d') or {}
            # 'TotalChildUrlCount' or actual indexing status — varies by API version
            # Treat presence of any data as indexed; absence as not indexed
            is_indexed = bool(d) and (d.get('DiscoveryDate') or d.get('LastCrawledDate'))
            status = 'INDEXED' if is_indexed else 'NOT INDEXED'
            print(f'[{i}/{len(audit_urls)}] {status} {u}')
            (indexed if is_indexed else not_indexed).append(u)
        time.sleep(0.5)  # be polite

    print()
    print(f'=== SUMMARY ===')
    print(f'  Indexed     : {len(indexed)}')
    print(f'  Not indexed : {len(not_indexed)}')
    print(f'  Errors      : {len(errors)}')

    if not_indexed:
        out = ROOT / 'bing-not-indexed.txt'
        out.write_text('\n'.join(not_indexed), encoding='utf-8')
        print(f'\nWrote {len(not_indexed)} not-indexed URLs to {out.name}')


if __name__ == '__main__':
    main()
