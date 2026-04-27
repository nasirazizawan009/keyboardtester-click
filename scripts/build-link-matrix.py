"""Build blog-post → recent-tool internal linking matrix.

Strategy:
- Pair each recent-wave tool with topically-relevant blog posts
- Generate JSON matrix that can be applied via apply-link-matrix.py
"""
import json, collections
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent

MATRIX = {
    'best-mechanical-keyboards-for-gaming-2026.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'measure your reaction speed to a sound cue'),
        ('frame-skipping-test', 'Frame Skipping Test', 'check for dropped frames at high refresh rates'),
    ],
    'best-recent-gaming-keyboard-launches-2026.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'measure reflex with a sound cue'),
        ('frame-skipping-test', 'Frame Skipping Test', 'verify your monitor handles high-Hz gaming'),
    ],
    'best-recent-wireless-keyboard-launches-2026.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'reaction-speed benchmark'),
    ],
    'best-recent-gaming-mouse-launches-2026.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'pair with high-poll-rate mice on a high-Hz monitor'),
        ('ttk-calculator', 'TTK Calculator', 'calculate time-to-kill for the games where mouse precision matters'),
    ],
    'best-recent-gaming-headphone-launches-2026.php': [
        ('hearing-age-test', 'Hearing Age Test', 'check what frequencies your ears can still pick up'),
        ('pitch-detector', 'Pitch Detector', 'verify your headphone reproduces tone accurately'),
        ('surround-sound-test', 'Surround Sound Test', 'walk channels for 5.1/7.1 headsets'),
        ('frequency-response-test', 'Frequency Response Test', 'sweep 20 Hz to 20 kHz on your new headphones'),
    ],
    'click-speed-test-measure-cps.php': [
        ('ttk-calculator', 'TTK Calculator', 'compute time-to-kill given your CPS'),
    ],
    'dead-pixel-test-check-monitor.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'detect dropped frames at your refresh rate'),
    ],
    'double-click-test-check-mouse-switch-bounce.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'related diagnostic for click registration timing'),
    ],
    'ghost-click-detector-fix-double-clicking.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'related display diagnostic'),
    ],
    'headphone-speaker-test-left-right-channels.php': [
        ('surround-sound-test', 'Surround Sound Test', '5.1/7.1 channel walk-around for surround setups'),
        ('frequency-response-test', 'Frequency Response Test', 'full sweep 20 Hz - 20 kHz'),
    ],
    'how-to-test-keyboard-online.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'companion reflex test'),
    ],
    'how-to-test-microphone-online.php': [
        ('frequency-response-test', 'Frequency Response Test', 'sweep audio frequencies through speakers/headphones'),
    ],
    'how-to-test-mouse-buttons-scroll-wheel.php': [
        ('ttk-calculator', 'TTK Calculator', 'calculate FPS time-to-kill for click-heavy games'),
    ],
    'how-to-measure-typing-speed-wpm.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'related cognitive-speed test'),
    ],
    'input-latency-checker-keyboard-mouse-delay.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'react to sound, similar millisecond resolution'),
        ('frame-skipping-test', 'Frame Skipping Test', 'the visual side of input-to-pixel chain'),
        ('cpu-stress-test', 'CPU Stress Test', 'rule out system load as a latency cause'),
    ],
    'webcam-test-check-camera-video-calls.php': [
        ('online-ruler', 'Online Ruler', 'measure on-screen webcam framing'),
    ],
    'what-is-keyboard-ghosting-anti-ghosting-fix-guide.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'companion display test'),
    ],
    'mouse-trail-visualizer-movement-patterns.php': [
        ('frame-skipping-test', 'Frame Skipping Test', 'detects when smooth motion is being interrupted'),
    ],
    'mouse-dpi-tester-measure-sensitivity.php': [
        ('online-ruler', 'Online Ruler', 'measure on-screen distances accurately for DPI tests'),
    ],
    'free-qr-code-generator-create-online.php': [
        ('online-ruler', 'Online Ruler', 'measure printed QR code size for scanning'),
    ],
    'qr-code-reader-scan-decode-images.php': [
        ('online-ruler', 'Online Ruler', 'measure QR code size on printed materials'),
    ],
    'lucky-wheel-spinner-random-selection.php': [
        ('gamertag-generator', 'Gamertag Generator', 'random username generator'),
        ('guild-name-generator', 'Guild Name Generator', 'random MMO and clan names'),
        ('minecraft-circle-generator', 'Minecraft Circle Generator', 'pixel-circle plotter for builders'),
    ],
    'how-to-copy-pro-crosshair-cs2-valorant-generator-guide.php': [
        ('ttk-calculator', 'TTK Calculator', 'time-to-kill math for FPS like CS2 and Valorant'),
        ('gamertag-generator', 'Gamertag Generator', 'pick a random pro-style gamer name'),
        ('frame-skipping-test', 'Frame Skipping Test', 'verify your monitor handles competitive frame pacing'),
    ],
    'v4n4g0n-keyboard-45-percent-custom-mechanical-guide.php': [
        ('auditory-reaction-time-test', 'Auditory Reaction Time Test', 'reflex benchmark for your new mechanical board'),
    ],
}

linked = collections.Counter()
for blog, tools in MATRIX.items():
    for tool, _, _ in tools:
        linked[tool] += 1

print('=== Link suggestions per recent tool ===')
recent = ['monitor-sharpness-test','pitch-detector','webcam-mirror','hearing-age-test','online-ruler',
          'guild-name-generator','auditory-reaction-time-test','frame-skipping-test','surround-sound-test',
          'cpu-stress-test','gpu-stress-test','memory-test','ram-latency-calculator','bandwidth-calculator',
          'download-time-calculator','raid-calculator','ttk-calculator','minecraft-circle-generator',
          'frequency-response-test','accelerometer-test','gyroscope-test','vibration-test','gamertag-generator']
for t in recent:
    bar = '#' * linked[t] if linked[t] else '(none)'
    print(f'  {linked[t]:2d} new links: {t:30}  {bar}')

print()
print(f'=== Total: {sum(linked.values())} links across {len(MATRIX)} blog posts ===')

out = ROOT / 'scripts' / 'blog-cross-link-matrix.json'
out.write_text(
    json.dumps(
        {k: [{'tool': t, 'anchor': a, 'context': c} for t, a, c in v] for k, v in MATRIX.items()},
        ensure_ascii=False, indent=2),
    encoding='utf-8')
print(f'Matrix saved to {out}')
