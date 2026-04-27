"""Generate 6 Product Hunt gallery screenshots at 1270x760."""
from playwright.sync_api import sync_playwright
from pathlib import Path
import time

OUT = Path(__file__).resolve().parent.parent / 'producthunt-assets'
OUT.mkdir(exist_ok=True)

# Use staging via live site (production is canonical)
SHOTS = [
    {
        'name': '01-keyboard-tester.png',
        'url': 'https://keyboardtester.click/',
        'wait': 3,
        'pre_action': 'press_keys',  # press some keys so they show green
    },
    {
        'name': '02-all-tools.png',
        'url': 'https://keyboardtester.click/pages/all-tools.php',
        'wait': 2,
    },
    {
        'name': '03-dead-pixel.png',
        'url': 'https://keyboardtester.click/dead-pixel-test.php',
        'wait': 2,
    },
    {
        'name': '04-hearing-test.png',
        'url': 'https://keyboardtester.click/hearing-age-test.php',
        'wait': 2,
    },
    {
        'name': '05-online-ruler.png',
        'url': 'https://keyboardtester.click/online-ruler.php',
        'wait': 2,
    },
    {
        'name': '06-multilingual.png',
        'url': 'https://keyboardtester.click/pages/all-tools-es.php',
        'wait': 2,
    },
]

# Thumbnail (240x240)
THUMB = {
    'name': 'thumbnail.png',
    'url': 'https://keyboardtester.click/',
    'wait': 3,
    'size': (240, 240),
}


def main():
    with sync_playwright() as p:
        browser = p.chromium.launch(headless=True)
        ctx = browser.new_context(
            viewport={'width': 1270, 'height': 760},
            device_scale_factor=2,  # 2x for retina sharpness
        )
        page = ctx.new_page()

        for shot in SHOTS:
            print(f"  -> {shot['name']}")
            page.goto(shot['url'], wait_until='networkidle', timeout=30000)
            time.sleep(shot['wait'])

            # Hide cookie banner / consent if present
            page.evaluate("""() => {
                const sel = ['#cookie-banner', '.cookie-consent', '.cc-banner', '[class*="cookie"]', '[id*="cookie"]'];
                sel.forEach(s => document.querySelectorAll(s).forEach(el => el.style.display = 'none'));
            }""")

            # Optional pre-action
            if shot.get('pre_action') == 'press_keys':
                # press a few keys so the keyboard tester shows green
                for k in ['a', 'b', 'c', 'd', 'Enter', 'Space']:
                    try:
                        page.keyboard.press(k)
                        time.sleep(0.1)
                    except Exception:
                        pass
                time.sleep(1)

            page.screenshot(
                path=str(OUT / shot['name']),
                clip={'x': 0, 'y': 0, 'width': 1270, 'height': 760},
            )

        # Thumbnail (square crop from homepage hero)
        print(f"  -> {THUMB['name']}")
        ctx2 = browser.new_context(
            viewport={'width': 480, 'height': 480},
            device_scale_factor=2,
        )
        page2 = ctx2.new_page()
        page2.goto(THUMB['url'], wait_until='networkidle', timeout=30000)
        time.sleep(THUMB['wait'])
        # Try to grab a tight crop of the keyboard
        page2.screenshot(
            path=str(OUT / THUMB['name']),
            clip={'x': 0, 'y': 0, 'width': 240, 'height': 240},
        )

        browser.close()
    print(f'\nDone. Files in: {OUT}')


if __name__ == '__main__':
    main()
