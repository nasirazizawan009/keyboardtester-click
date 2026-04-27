"""Append 144 localized URLs + 3 wave-5 EN URLs to sitemap.xml and submit-indexnow.php."""
from pathlib import Path
import re

ROOT = Path(__file__).resolve().parent.parent

LANGS = [
    ('spanish',    'es'),
    ('french',     'fr'),
    ('german',     'de'),
    ('portuguese', 'pt'),
    ('arabic',     'ar'),
    ('russian',    'ru'),
    ('japanese',   'ja'),
    ('korean',     'ko'),
]

TOOLS = [
    'frequency-response-test', 'accelerometer-test', 'gyroscope-test', 'vibration-test', 'gamertag-generator',
    'guild-name-generator', 'auditory-reaction-time-test', 'frame-skipping-test', 'surround-sound-test',
    'cpu-stress-test', 'gpu-stress-test', 'memory-test', 'ram-latency-calculator', 'bandwidth-calculator',
    'download-time-calculator', 'raid-calculator', 'ttk-calculator', 'minecraft-circle-generator',
]

BASE = 'https://keyboardtester.click'
TODAY = '2026-04-24'


def update_sitemap():
    sm = ROOT / 'sitemap.xml'
    text = sm.read_text(encoding='utf-8')
    if '/languages/spanish/guild-name-generator.php' in text:
        print('sitemap already contains localized wrappers; skipping')
        return
    entries = []
    for tool in TOOLS:
        for lang_dir, _code in LANGS:
            entries.append(f"""  <url>
    <loc>{BASE}/languages/{lang_dir}/{tool}.php</loc>
    <lastmod>{TODAY}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.70</priority>
  </url>""")
    new_text = text.replace('</urlset>', '\n'.join(entries) + '\n</urlset>')
    sm.write_text(new_text, encoding='utf-8')
    print(f'sitemap: appended {len(entries)} localized URLs')


def update_indexnow():
    inp = ROOT / 'submit-indexnow.php'
    text = inp.read_text(encoding='utf-8')
    marker = "'https://keyboardtester.click/minecraft-circle-generator.php',"
    if marker not in text:
        raise SystemExit('marker not found')
    if '/languages/spanish/guild-name-generator.php' in text:
        print('submit-indexnow already contains localized wrappers; skipping')
        return
    lines = ['',  '    // Localized wrappers for wave-3/4/5 — added 2026-04-24 (144 URLs)']
    for tool in TOOLS:
        for lang_dir, _code in LANGS:
            lines.append(f"    '{BASE}/languages/{lang_dir}/{tool}.php',")
    insertion = '\n'.join(lines)
    new_text = text.replace(marker, marker + insertion)
    inp.write_text(new_text, encoding='utf-8')
    print(f'submit-indexnow: appended {len(TOOLS)*len(LANGS)} localized URLs')


if __name__ == '__main__':
    update_sitemap()
    update_indexnow()
