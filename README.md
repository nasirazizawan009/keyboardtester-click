# KeyboardTester.click

**The most comprehensive free online hardware testing platform.** Test your keyboard, mouse, screen, microphone, webcam, headphones, and more -- entirely in your browser, no downloads required. Available in 9 languages with 200+ pages of tools and resources.

[![Live Site](https://img.shields.io/badge/Live_Site-keyboardtester.click-1abc9c?style=for-the-badge)](https://keyboardtester.click)
[![Languages](https://img.shields.io/badge/Languages-9-3498db?style=for-the-badge)](#-multilingual-support--9-languages)
[![Tools](https://img.shields.io/badge/Tools-25+-e74c3c?style=for-the-badge)](#-core-tools)
[![Intent Pages](https://img.shields.io/badge/Intent_Pages-15+-9b59b6?style=for-the-badge)](#-specialized-test-pages)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)](LICENSE)
[![PRs Welcome](https://img.shields.io/badge/PRs-Welcome-brightgreen?style=for-the-badge)](CONTRIBUTING.md)

---

## Table of Contents

- [Core Tools](#-core-tools)
- [Specialized Test Pages](#-specialized-test-pages)
- [Multilingual Support](#-multilingual-support--9-languages)
- [Category Pages](#-category--hub-pages)
- [Technology Stack](#-technology-stack)
- [Features](#-features)
- [Performance Optimizations](#-performance-optimizations)
- [Project Structure](#-project-structure)
- [Browser Support](#-browser-support)
- [Contributing](#-contributing)
- [License](#-license)
- [Contact](#-contact)

---

## Core Tools

### Keyboard Tools

| Tool | Description | Link |
|------|-------------|------|
| **Online Keyboard Tester** | Test every key on your keyboard with real-time visual feedback, color-coded key states (untested, pressed, released), N-key rollover detection, and a gamified cat progress tracker. Supports 103 testable keys. | [Open Tool](https://keyboardtester.click/tools/keyboard-tester/) |
| **Typing Speed Test** | Measure your words-per-minute (WPM), characters-per-minute (CPM), and accuracy with timed typing passages. Track your improvement over multiple sessions. | [Open Tool](https://keyboardtester.click/keyboard_typing_test.php) |
| **Input Latency Checker** | Measure keyboard and mouse input latency in milliseconds. Test your reaction time and identify input lag issues with your peripherals. | [Open Tool](https://keyboardtester.click/latency-checker.php) |
| **Spacebar Test** | Count spacebar presses with 5s, 10s, and 30s timer modes. See your spacebar speed rating and track your best score. | [Open Tool](https://keyboardtester.click/spacebar-test.php) |
| **Reaction Time Test** | Click when the screen turns green to measure your reflex speed in milliseconds. Averages 5 attempts and rates your reaction time. | [Open Tool](https://keyboardtester.click/reaction-time-test.php) |

### Mouse Tools

| Tool | Description | Link |
|------|-------------|------|
| **Mouse Button Tester** | Test all mouse buttons -- left, right, middle click, and scroll wheel (up/down). Visual feedback confirms each button registers correctly. | [Open Tool](https://keyboardtester.click/mouse-test.php) |
| **Click Speed Test (CPS)** | Measure your clicks-per-second with timed challenges. Popular for gamers testing click speed for Minecraft PvP, Roblox, and FPS games. | [Open Tool](https://keyboardtester.click/mouse_speed_tester.php) |
| **Ghost Click Detector** | Detect unintended double clicks or phantom clicks caused by worn-out mouse switches. Helps diagnose mouse hardware issues. | [Open Tool](https://keyboardtester.click/ghost-click-detector.php) |
| **Mouse DPI/Sensitivity Tester** | Measure and calibrate your mouse DPI (dots per inch). Essential for gamers and designers who need precise cursor control. | [Open Tool](https://keyboardtester.click/mouse_sensitivity_DPI_tester.php) |
| **Mouse Trail Visualizer** | Visualize your mouse movement patterns with colorful trails. Fun and useful for testing mouse tracking smoothness. | [Open Tool](https://keyboardtester.click/mouse-trail.php) |
| **Mouse Polling Rate Test** | Measure your mouse's polling rate in Hz using performance.now() delta between mousemove events. Rolling 60-sample window, capped at 1000Hz. | [Open Tool](https://keyboardtester.click/polling-rate-test.php) |

### Screen & Display Tools

| Tool | Description | Link |
|------|-------------|------|
| **Monitor Screen Test** | Test your monitor for dead pixels, stuck pixels, and color accuracy with fullscreen solid color panels (red, green, blue, white, black). | [Open Tool](https://keyboardtester.click/screentestindex.php) |
| **Monitor Color Test** | 14 test panels including solid colors, gradients, color ramp, and checkerboard patterns. Fullscreen mode with keyboard navigation. | [Open Tool](https://keyboardtester.click/color-test.php) |
| **Monitor Refresh Rate Test** | Measure your display's actual refresh rate using requestAnimationFrame. Snaps to standard Hz values (60/75/120/144/165/240/360+) with jitter measurement. | [Open Tool](https://keyboardtester.click/refresh-rate-test.php) |
| **Backlight Bleed Test** | Detect backlight bleed, IPS glow, and uniformity issues on LCD/LED panels using pure dark and gradient test screens. | [Open Tool](https://keyboardtester.click/backlight-bleed-test.php) |

### Audio Tools

| Tool | Description | Link |
|------|-------------|------|
| **Microphone Tester** | Test your microphone with a real-time audio level meter and peak detection. Verify your mic works before meetings, streaming, or recording. | [Open Tool](https://keyboardtester.click/mic-tester.php) |
| **Headphone & Speaker Tester** | Test left and right audio channels independently. Verify stereo separation and identify faulty speakers or headphone drivers. | [Open Tool](https://keyboardtester.click/headphone_speaker_tester_index.php) |

### Video Tools

| Tool | Description | Link |
|------|-------------|------|
| **Webcam Tester** | Test your webcam with live preview, resolution detection, and device information. Verify your camera works before video calls. | [Open Tool](https://keyboardtester.click/webcamtesterindex.php) |
| **Touch Screen Test** | Test touch input using Pointer Events API. Draws colored trails per unique pointer, with a ghost touch detector via 10-second countdown. | [Open Tool](https://keyboardtester.click/touch-screen-test.php) |
| **Gamepad / Controller Test** | Test all gamepad buttons, analog sticks, and triggers using the HTML5 Gamepad API. Includes drift detection and vibration test. | [Open Tool](https://keyboardtester.click/gamepad-test.php) |

### Utility Tools

| Tool | Description | Link |
|------|-------------|------|
| **QR Code Generator** | Create QR codes from any text, URL, or message. Download as PNG. Supports custom sizes and error correction levels. | [Open Tool](https://keyboardtester.click/QR_code_generator_scanner.php) |
| **QR Code Reader** | Upload an image containing a QR code and decode its content instantly. No camera needed -- works with screenshots and saved images. | [Open Tool](https://keyboardtester.click/qr-code-reader.php) |
| **OCR Tool (Image to Text)** | Extract text from images using Tesseract.js OCR engine. Upload a photo or screenshot and get editable, copyable text. | [Open Tool](https://keyboardtester.click/ocr-tool.php) |
| **Secure Password Generator** | Generate cryptographically strong random passwords with customizable length, character sets (uppercase, lowercase, numbers, symbols). | [Open Tool](https://keyboardtester.click/auto-password-generator.php) |
| **WhatsApp Direct Link Generator** | Create direct WhatsApp chat links (wa.me) with pre-filled messages. No need to save contacts first. | [Open Tool](https://keyboardtester.click/whatsapp-link-generator.php) |
| **WhatsApp Business Link Generator** | Generate branded WhatsApp Business links with custom messages for customer support and marketing. | [Open Tool](https://keyboardtester.click/whatsapp-Brand-link-generator.php) |
| **Lucky Wheel Spinner** | Random selection spinner wheel. Add custom options, spin, and let fate decide. Great for giveaways, decisions, and games. | [Open Tool](https://keyboardtester.click/luckywheeltoolindex.php) |

---

## Specialized Test Pages

These focused pages target specific testing scenarios and link back to the core tools with tailored context, FAQs, and structured data.

### Keyboard Diagnostics

| Page | What It Tests | Link |
|------|--------------|------|
| **Keyboard Ghosting Test** | Test for key ghosting -- keys that don't register when multiple keys are pressed simultaneously. Critical for gamers. | [Open Page](https://keyboardtester.click/keyboard-ghosting-test.php) |
| **N-Key Rollover Test** | Verify your keyboard supports N-key rollover (NKRO) -- the ability to register unlimited simultaneous keypresses. | [Open Page](https://keyboardtester.click/n-key-rollover-test.php) |
| **Stuck Key Test** | Diagnose stuck or repeating keys on your keyboard. Identifies keys that fire continuously without being held. | [Open Page](https://keyboardtester.click/stuck-key-test.php) |

### Screen Diagnostics

| Page | What It Tests | Link |
|------|--------------|------|
| **Dead Pixel Test** | Cycle through solid colors to find dead pixels (pixels that stay black/off) on your LCD, LED, OLED, or IPS monitor. | [Open Page](https://keyboardtester.click/dead-pixel-test.php) |
| **Stuck Pixel Test** | Find stuck pixels that display a fixed color (red, green, or blue) regardless of what the screen should show. | [Open Page](https://keyboardtester.click/stuck-pixel-test.php) |
| **Black Screen Test** | Display a pure black screen to check for backlight bleed, dead pixels on dark backgrounds, and IPS glow on your monitor. | [Open Page](https://keyboardtester.click/black-screen-test.php) |
| **White Screen Test** | Display a pure white screen to find dead pixels, check screen uniformity, and clean your monitor surface. | [Open Page](https://keyboardtester.click/white-screen-test.php) |

### Mouse Diagnostics

| Page | What It Tests | Link |
|------|--------------|------|
| **Scroll Wheel Test** | Test mouse scroll wheel registration -- up, down, and click. Diagnose skipping, reversed, or unresponsive scroll. | [Open Page](https://keyboardtester.click/scroll-wheel-test.php) |
| **Double Click Test** | Test for unwanted double clicks caused by worn-out microswitches. Measures time between click events. | [Open Page](https://keyboardtester.click/double-click-test.php) |

### Audio Diagnostics

| Page | What It Tests | Link |
|------|--------------|------|
| **Left/Right Speaker Test** | Play audio through left and right channels independently to verify stereo wiring and speaker placement. | [Open Page](https://keyboardtester.click/left-right-speaker-test.php) |
| **Stereo Test** | Full stereo separation test with panning audio to verify both channels work and are correctly assigned (L/R not swapped). | [Open Page](https://keyboardtester.click/stereo-test.php) |
| **Microphone Volume Test** | Test microphone input volume and sensitivity. See real-time level meter to calibrate mic gain before calls or recordings. | [Open Page](https://keyboardtester.click/microphone-volume-test.php) |
| **Test My Mic** | Quick microphone check -- verify your mic is detected, permissions are granted, and audio is being captured. | [Open Page](https://keyboardtester.click/test-my-mic.php) |

### Camera & OCR

| Page | What It Tests | Link |
|------|--------------|------|
| **Camera Resolution Test** | Detect your webcam's actual capture resolution (720p, 1080p, 4K) and compare it against the advertised specs. | [Open Page](https://keyboardtester.click/camera-resolution-test.php) |
| **Take Picture with Webcam** | Capture photos directly from your webcam in the browser. No app install needed. | [Open Page](https://keyboardtester.click/take-picture-with-webcam.php) |
| **Webcam Not Working Test** | Diagnose webcam issues -- permission denied, device not found, driver problems. Step-by-step troubleshooting. | [Open Page](https://keyboardtester.click/webcam-not-working-test.php) |
| **Scan QR from Image** | Upload a saved image or screenshot containing a QR code and decode it without needing a camera. | [Open Page](https://keyboardtester.click/scan-qr-from-image.php) |
| **Screenshot to Text (OCR)** | Extract text from screenshots using optical character recognition. Paste or upload any screenshot. | [Open Page](https://keyboardtester.click/screenshot-to-text.php) |
| **Photo to Text (OCR)** | Convert text in photographs into editable, copyable text using browser-based OCR processing. | [Open Page](https://keyboardtester.click/photo-to-text.php) |

---

## Multilingual Support -- 9 Languages

Every core tool is available in 9 languages with fully localized interfaces, native keyboard layouts, and translated help content.

### Language Hub Pages

| Language | Hub Page | Keyboard Tester |
|----------|----------|-----------------|
| English | [keyboardtester.click](https://keyboardtester.click/) | [Keyboard Tester](https://keyboardtester.click/tools/keyboard-tester/) |
| Espanol (Spanish) | [Inicio](https://keyboardtester.click/languages/spanish/) | [Probador de Teclado](https://keyboardtester.click/keyboard_tester_spanish.php) |
| Francais (French) | [Accueil](https://keyboardtester.click/languages/french/) | [Testeur de Clavier](https://keyboardtester.click/keyboard_tester_french.php) |
| Deutsch (German) | [Startseite](https://keyboardtester.click/languages/german/) | [Tastatur Tester](https://keyboardtester.click/keyboard_tester_german.php) |
| Portugues (Portuguese) | [Inicio](https://keyboardtester.click/languages/portuguese/) | [Testador de Teclado](https://keyboardtester.click/keyboard_tester_portuguese.php) |
| Russkij (Russian) | [Glavnaya](https://keyboardtester.click/languages/russian/) | [Test Klaviatury](https://keyboardtester.click/keyboard_tester_russian.php) |
| Al-Arabiyyah (Arabic) | [Ar-Ra'isiyyah](https://keyboardtester.click/languages/arabic/) | [Ikhtibar Lawhat al-Mafatih](https://keyboardtester.click/keyboard_tester_arabic.php) |
| Nihongo (Japanese) | [Toppu](https://keyboardtester.click/languages/japanese/) | [Kibodo Tesuta](https://keyboardtester.click/keyboard_tester_japanese.php) |
| Hangugeo (Korean) | [Hom](https://keyboardtester.click/languages/korean/) | [Kibodeu Teseuteo](https://keyboardtester.click/keyboard_tester_korean_index.php) |

### Spanish Tools (Herramientas en Espanol)

| Tool | Link |
|------|------|
| Probador de Raton (Mouse Tester) | [Open](https://keyboardtester.click/languages/spanish/mouse-test.php) |
| Velocidad de Clic (Click Speed) | [Open](https://keyboardtester.click/languages/spanish/click-speed.php) |
| Detector de Clics Fantasma | [Open](https://keyboardtester.click/languages/spanish/ghost-click.php) |
| Probador de DPI | [Open](https://keyboardtester.click/languages/spanish/dpi-tester.php) |
| Prueba de Escritura (Typing Test) | [Open](https://keyboardtester.click/languages/spanish/typing-test.php) |
| Prueba de Microfono | [Open](https://keyboardtester.click/languages/spanish/mic-test.php) |
| Prueba de Auriculares | [Open](https://keyboardtester.click/languages/spanish/headphone-test.php) |
| Prueba de Webcam | [Open](https://keyboardtester.click/languages/spanish/webcam-test.php) |
| Prueba de Pantalla | [Open](https://keyboardtester.click/languages/spanish/screen-test.php) |
| Verificador de Latencia | [Open](https://keyboardtester.click/languages/spanish/latency-checker.php) |
| Rastro del Raton | [Open](https://keyboardtester.click/languages/spanish/mouse-trail.php) |
| Generador de Codigos QR | [Open](https://keyboardtester.click/languages/spanish/qr-generator.php) |
| Lector de Codigos QR | [Open](https://keyboardtester.click/languages/spanish/qr-reader.php) |
| Herramienta OCR | [Open](https://keyboardtester.click/languages/spanish/ocr-tool.php) |
| Generador de Contrasenas | [Open](https://keyboardtester.click/languages/spanish/password-generator.php) |
| Prueba de Pixeles Muertos | [Open](https://keyboardtester.click/languages/spanish/dead-pixel-test.php) |
| Prueba de Volumen del Microfono | [Open](https://keyboardtester.click/languages/spanish/microphone-volume-test.php) |
| Prueba de Resolucion de Camara | [Open](https://keyboardtester.click/languages/spanish/camera-resolution-test.php) |
| Escanear QR desde Imagen | [Open](https://keyboardtester.click/languages/spanish/scan-qr-from-image.php) |
| Prueba de Barra Espaciadora | [Open](https://keyboardtester.click/languages/spanish/spacebar-test.php) |
| Prueba de Tiempo de Reaccion | [Open](https://keyboardtester.click/languages/spanish/reaction-time-test.php) |
| Prueba de Tasa de Sondeo | [Open](https://keyboardtester.click/languages/spanish/polling-rate-test.php) |
| Prueba de Tasa de Refresco | [Open](https://keyboardtester.click/languages/spanish/refresh-rate-test.php) |
| Prueba de Pantalla Tactil | [Open](https://keyboardtester.click/languages/spanish/touch-screen-test.php) |
| Prueba de Gamepad | [Open](https://keyboardtester.click/languages/spanish/gamepad-test.php) |
| Prueba de Color del Monitor | [Open](https://keyboardtester.click/languages/spanish/color-test.php) |

### French Tools (Outils en Francais)

| Tool | Link |
|------|------|
| Test de Souris (Mouse Tester) | [Open](https://keyboardtester.click/languages/french/mouse-test.php) |
| Vitesse de Clic (Click Speed) | [Open](https://keyboardtester.click/languages/french/click-speed.php) |
| Detecteur de Clics Fantomes | [Open](https://keyboardtester.click/languages/french/ghost-click.php) |
| Testeur de DPI | [Open](https://keyboardtester.click/languages/french/dpi-tester.php) |
| Test de Frappe (Typing Test) | [Open](https://keyboardtester.click/languages/french/typing-test.php) |
| Test de Microphone | [Open](https://keyboardtester.click/languages/french/mic-test.php) |
| Test de Casque Audio | [Open](https://keyboardtester.click/languages/french/headphone-test.php) |
| Test de Webcam | [Open](https://keyboardtester.click/languages/french/webcam-test.php) |
| Test d'Ecran | [Open](https://keyboardtester.click/languages/french/screen-test.php) |
| Verificateur de Latence | [Open](https://keyboardtester.click/languages/french/latency-checker.php) |
| Trace de Souris | [Open](https://keyboardtester.click/languages/french/mouse-trail.php) |
| Generateur de Code QR | [Open](https://keyboardtester.click/languages/french/qr-generator.php) |
| Lecteur de Code QR | [Open](https://keyboardtester.click/languages/french/qr-reader.php) |
| Outil OCR | [Open](https://keyboardtester.click/languages/french/ocr-tool.php) |
| Test de Pixels Morts | [Open](https://keyboardtester.click/languages/french/dead-pixel-test.php) |
| Test de Volume du Microphone | [Open](https://keyboardtester.click/languages/french/microphone-volume-test.php) |
| Test de Resolution de Camera | [Open](https://keyboardtester.click/languages/french/camera-resolution-test.php) |
| Scanner QR depuis une Image | [Open](https://keyboardtester.click/languages/french/scan-qr-from-image.php) |
| Test de la Barre d'Espace | [Open](https://keyboardtester.click/languages/french/spacebar-test.php) |
| Test de Temps de Reaction | [Open](https://keyboardtester.click/languages/french/reaction-time-test.php) |
| Test de Taux de Sondage | [Open](https://keyboardtester.click/languages/french/polling-rate-test.php) |
| Test de Taux de Rafraichissement | [Open](https://keyboardtester.click/languages/french/refresh-rate-test.php) |
| Test d'Ecran Tactile | [Open](https://keyboardtester.click/languages/french/touch-screen-test.php) |
| Test de Manette | [Open](https://keyboardtester.click/languages/french/gamepad-test.php) |
| Test de Couleur du Moniteur | [Open](https://keyboardtester.click/languages/french/color-test.php) |

### German Tools (Werkzeuge auf Deutsch)

| Tool | Link |
|------|------|
| Maus-Tester | [Open](https://keyboardtester.click/languages/german/mouse-test.php) |
| Klickgeschwindigkeit | [Open](https://keyboardtester.click/languages/german/click-speed.php) |
| Geisterklick-Detektor | [Open](https://keyboardtester.click/languages/german/ghost-click.php) |
| DPI-Tester | [Open](https://keyboardtester.click/languages/german/dpi-tester.php) |
| Tipptest | [Open](https://keyboardtester.click/languages/german/typing-test.php) |
| Mikrofon-Test | [Open](https://keyboardtester.click/languages/german/mic-test.php) |
| Kopfhorer-Test | [Open](https://keyboardtester.click/languages/german/headphone-test.php) |
| Webcam-Test | [Open](https://keyboardtester.click/languages/german/webcam-test.php) |
| Bildschirm-Test | [Open](https://keyboardtester.click/languages/german/screen-test.php) |
| Latenz-Prufer | [Open](https://keyboardtester.click/languages/german/latency-checker.php) |
| Mausspur | [Open](https://keyboardtester.click/languages/german/mouse-trail.php) |
| QR-Code-Generator | [Open](https://keyboardtester.click/languages/german/qr-generator.php) |
| QR-Code-Leser | [Open](https://keyboardtester.click/languages/german/qr-reader.php) |
| OCR-Werkzeug | [Open](https://keyboardtester.click/languages/german/ocr-tool.php) |
| Tote-Pixel-Test | [Open](https://keyboardtester.click/languages/german/dead-pixel-test.php) |
| Mikrofon-Lautstarke-Test | [Open](https://keyboardtester.click/languages/german/microphone-volume-test.php) |
| Kamera-Auflosungs-Test | [Open](https://keyboardtester.click/languages/german/camera-resolution-test.php) |
| QR vom Bild scannen | [Open](https://keyboardtester.click/languages/german/scan-qr-from-image.php) |
| Leertasten-Test | [Open](https://keyboardtester.click/languages/german/spacebar-test.php) |
| Reaktionszeit-Test | [Open](https://keyboardtester.click/languages/german/reaction-time-test.php) |
| Abfraterate-Test | [Open](https://keyboardtester.click/languages/german/polling-rate-test.php) |
| Bildwiederholrate-Test | [Open](https://keyboardtester.click/languages/german/refresh-rate-test.php) |
| Touchscreen-Test | [Open](https://keyboardtester.click/languages/german/touch-screen-test.php) |
| Gamepad-Test | [Open](https://keyboardtester.click/languages/german/gamepad-test.php) |
| Monitor-Farb-Test | [Open](https://keyboardtester.click/languages/german/color-test.php) |

### Portuguese Tools (Ferramentas em Portugues)

| Tool | Link |
|------|------|
| Testador de Mouse | [Open](https://keyboardtester.click/languages/portuguese/mouse-test.php) |
| Velocidade de Clique | [Open](https://keyboardtester.click/languages/portuguese/click-speed.php) |
| Detector de Cliques Fantasma | [Open](https://keyboardtester.click/languages/portuguese/ghost-click.php) |
| Testador de DPI | [Open](https://keyboardtester.click/languages/portuguese/dpi-tester.php) |
| Teste de Digitacao | [Open](https://keyboardtester.click/languages/portuguese/typing-test.php) |
| Teste de Microfone | [Open](https://keyboardtester.click/languages/portuguese/mic-test.php) |
| Teste de Fones | [Open](https://keyboardtester.click/languages/portuguese/headphone-test.php) |
| Teste de Webcam | [Open](https://keyboardtester.click/languages/portuguese/webcam-test.php) |
| Teste de Tela | [Open](https://keyboardtester.click/languages/portuguese/screen-test.php) |
| Verificador de Latencia | [Open](https://keyboardtester.click/languages/portuguese/latency-checker.php) |
| Trilha do Mouse | [Open](https://keyboardtester.click/languages/portuguese/mouse-trail.php) |
| Gerador de Codigo QR | [Open](https://keyboardtester.click/languages/portuguese/qr-generator.php) |
| Leitor de Codigo QR | [Open](https://keyboardtester.click/languages/portuguese/qr-reader.php) |
| Ferramenta OCR | [Open](https://keyboardtester.click/languages/portuguese/ocr-tool.php) |
| Teste de Pixels Mortos | [Open](https://keyboardtester.click/languages/portuguese/dead-pixel-test.php) |
| Teste de Volume do Microfone | [Open](https://keyboardtester.click/languages/portuguese/microphone-volume-test.php) |
| Teste de Resolucao da Camera | [Open](https://keyboardtester.click/languages/portuguese/camera-resolution-test.php) |
| Escanear QR de Imagem | [Open](https://keyboardtester.click/languages/portuguese/scan-qr-from-image.php) |
| Teste de Barra de Espaco | [Open](https://keyboardtester.click/languages/portuguese/spacebar-test.php) |
| Teste de Tempo de Reacao | [Open](https://keyboardtester.click/languages/portuguese/reaction-time-test.php) |
| Teste de Taxa de Sondagem | [Open](https://keyboardtester.click/languages/portuguese/polling-rate-test.php) |
| Teste de Taxa de Atualizacao | [Open](https://keyboardtester.click/languages/portuguese/refresh-rate-test.php) |
| Teste de Tela Tatil | [Open](https://keyboardtester.click/languages/portuguese/touch-screen-test.php) |
| Teste de Gamepad | [Open](https://keyboardtester.click/languages/portuguese/gamepad-test.php) |
| Teste de Cor do Monitor | [Open](https://keyboardtester.click/languages/portuguese/color-test.php) |

### Russian Tools (Instrumenty na Russkom)

| Tool | Link |
|------|------|
| Test Myshi | [Open](https://keyboardtester.click/languages/russian/mouse-test.php) |
| Skorost' Klika | [Open](https://keyboardtester.click/languages/russian/click-speed.php) |
| Detektor Prizrachnykh Klikov | [Open](https://keyboardtester.click/languages/russian/ghost-click.php) |
| Tester DPI | [Open](https://keyboardtester.click/languages/russian/dpi-tester.php) |
| Test Pechati | [Open](https://keyboardtester.click/languages/russian/typing-test.php) |
| Test Mikrofona | [Open](https://keyboardtester.click/languages/russian/mic-test.php) |
| Test Naushnikov | [Open](https://keyboardtester.click/languages/russian/headphone-test.php) |
| Test Veb-kamery | [Open](https://keyboardtester.click/languages/russian/webcam-test.php) |
| Test Ekrana | [Open](https://keyboardtester.click/languages/russian/screen-test.php) |
| Proverka Zaderzhki | [Open](https://keyboardtester.click/languages/russian/latency-checker.php) |
| Sled Myshi | [Open](https://keyboardtester.click/languages/russian/mouse-trail.php) |
| Generator QR-kodov | [Open](https://keyboardtester.click/languages/russian/qr-generator.php) |
| Schityvatel' QR-kodov | [Open](https://keyboardtester.click/languages/russian/qr-reader.php) |
| Instrument OCR | [Open](https://keyboardtester.click/languages/russian/ocr-tool.php) |
| Test Mertvykh Pikseley | [Open](https://keyboardtester.click/languages/russian/dead-pixel-test.php) |
| Test Gromkosti Mikrofona | [Open](https://keyboardtester.click/languages/russian/microphone-volume-test.php) |
| Test Razresheniya Kamery | [Open](https://keyboardtester.click/languages/russian/camera-resolution-test.php) |
| Skanirovat' QR iz Izobrazheniya | [Open](https://keyboardtester.click/languages/russian/scan-qr-from-image.php) |
| Test Probela | [Open](https://keyboardtester.click/languages/russian/spacebar-test.php) |
| Test Vremeni Reaktsii | [Open](https://keyboardtester.click/languages/russian/reaction-time-test.php) |
| Test Chastoty Oprosa | [Open](https://keyboardtester.click/languages/russian/polling-rate-test.php) |
| Test Chastoty Obnovleniya | [Open](https://keyboardtester.click/languages/russian/refresh-rate-test.php) |
| Test Sensornogo Ekrana | [Open](https://keyboardtester.click/languages/russian/touch-screen-test.php) |
| Test Gempada | [Open](https://keyboardtester.click/languages/russian/gamepad-test.php) |
| Test Tsveta Monitora | [Open](https://keyboardtester.click/languages/russian/color-test.php) |

### Arabic Tools (Adawat bil-Arabiyyah)

| Tool | Link |
|------|------|
| Ikhtibar al-Maus (Mouse Tester) | [Open](https://keyboardtester.click/languages/arabic/mouse-test.php) |
| Sur'at an-Naqr (Click Speed) | [Open](https://keyboardtester.click/languages/arabic/click-speed.php) |
| Kashif an-Naqarat al-Wahmiyyah | [Open](https://keyboardtester.click/languages/arabic/ghost-click.php) |
| Ikhtibar DPI | [Open](https://keyboardtester.click/languages/arabic/dpi-tester.php) |
| Ikhtibar al-Kitabah (Typing Test) | [Open](https://keyboardtester.click/languages/arabic/typing-test.php) |
| Ikhtibar al-Mikrufun | [Open](https://keyboardtester.click/languages/arabic/mic-test.php) |
| Ikhtibar Samma'at ar-Ra's | [Open](https://keyboardtester.click/languages/arabic/headphone-test.php) |
| Ikhtibar Kamirat al-Wib | [Open](https://keyboardtester.click/languages/arabic/webcam-test.php) |
| Ikhtibar ash-Shashah | [Open](https://keyboardtester.click/languages/arabic/screen-test.php) |
| Fahis Zaman al-Istijabah | [Open](https://keyboardtester.click/languages/arabic/latency-checker.php) |
| Masar al-Maus | [Open](https://keyboardtester.click/languages/arabic/mouse-trail.php) |
| Muwallid Ramz QR | [Open](https://keyboardtester.click/languages/arabic/qr-generator.php) |
| Qari' Ramz QR | [Open](https://keyboardtester.click/languages/arabic/qr-reader.php) |
| Adat OCR | [Open](https://keyboardtester.click/languages/arabic/ocr-tool.php) |
| Ikhtibar al-Biksalat al-Mayyitah | [Open](https://keyboardtester.click/languages/arabic/dead-pixel-test.php) |
| Ikhtibar Hajm Sawt al-Mikrufun | [Open](https://keyboardtester.click/languages/arabic/microphone-volume-test.php) |
| Ikhtibar Diqqat al-Kamirah | [Open](https://keyboardtester.click/languages/arabic/camera-resolution-test.php) |
| Mash Ramz QR min Surah | [Open](https://keyboardtester.click/languages/arabic/scan-qr-from-image.php) |
| Ikhtibar Miftah al-Masafah | [Open](https://keyboardtester.click/languages/arabic/spacebar-test.php) |
| Ikhtibar Waqt ar-Radd | [Open](https://keyboardtester.click/languages/arabic/reaction-time-test.php) |
| Ikhtibar Ma'dal at-Tasdid | [Open](https://keyboardtester.click/languages/arabic/polling-rate-test.php) |
| Ikhtibar Ma'dal at-Tajdid | [Open](https://keyboardtester.click/languages/arabic/refresh-rate-test.php) |
| Ikhtibar ash-Shashah al-Lamsiyyah | [Open](https://keyboardtester.click/languages/arabic/touch-screen-test.php) |
| Ikhtibar al-Gamepad | [Open](https://keyboardtester.click/languages/arabic/gamepad-test.php) |
| Ikhtibar Lawn ash-Shashah | [Open](https://keyboardtester.click/languages/arabic/color-test.php) |

### Japanese Tools (Nihongo Tsuru)

| Tool | Link |
|------|------|
| Mausu Tesuto (Mouse Tester) | [Open](https://keyboardtester.click/languages/japanese/mouse-test.php) |
| Kurikku Sokudo Tesuto (Click Speed) | [Open](https://keyboardtester.click/languages/japanese/click-speed.php) |
| Gosuto Kurikku Kenshutsu | [Open](https://keyboardtester.click/languages/japanese/ghost-click.php) |
| DPI Tesuta | [Open](https://keyboardtester.click/languages/japanese/dpi-tester.php) |
| Taipingu Tesuto | [Open](https://keyboardtester.click/languages/japanese/typing-test.php) |
| Maiku Tesuto | [Open](https://keyboardtester.click/languages/japanese/mic-test.php) |
| Heddohon Tesuto | [Open](https://keyboardtester.click/languages/japanese/headphone-test.php) |
| Webukamu Tesuto | [Open](https://keyboardtester.click/languages/japanese/webcam-test.php) |
| Sukuriin Tesuto | [Open](https://keyboardtester.click/languages/japanese/screen-test.php) |
| Reitenshi Chekka | [Open](https://keyboardtester.click/languages/japanese/latency-checker.php) |
| Mausu Toreiru | [Open](https://keyboardtester.click/languages/japanese/mouse-trail.php) |
| QR Kodo Seisei | [Open](https://keyboardtester.click/languages/japanese/qr-generator.php) |
| QR Kodo Riida | [Open](https://keyboardtester.click/languages/japanese/qr-reader.php) |
| OCR Tsuru | [Open](https://keyboardtester.click/languages/japanese/ocr-tool.php) |
| Deddo Pikuseru Tesuto | [Open](https://keyboardtester.click/languages/japanese/dead-pixel-test.php) |
| Maiku Onryo Tesuto | [Open](https://keyboardtester.click/languages/japanese/microphone-volume-test.php) |
| Kamera Kaizoudo Tesuto | [Open](https://keyboardtester.click/languages/japanese/camera-resolution-test.php) |
| Gazou kara QR wo Sukyan | [Open](https://keyboardtester.click/languages/japanese/scan-qr-from-image.php) |
| Supeesubaa Tesuto | [Open](https://keyboardtester.click/languages/japanese/spacebar-test.php) |
| Hanno Jikan Tesuto | [Open](https://keyboardtester.click/languages/japanese/reaction-time-test.php) |
| Poringu Reeto Tesuto | [Open](https://keyboardtester.click/languages/japanese/polling-rate-test.php) |
| Rifuresshu Reeto Tesuto | [Open](https://keyboardtester.click/languages/japanese/refresh-rate-test.php) |
| Tachi Sukuriin Tesuto | [Open](https://keyboardtester.click/languages/japanese/touch-screen-test.php) |
| Geemupado Tesuto | [Open](https://keyboardtester.click/languages/japanese/gamepad-test.php) |
| Monitaa Karaa Tesuto | [Open](https://keyboardtester.click/languages/japanese/color-test.php) |

### Korean Tools (Hangugeo Dogu)

| Tool | Link |
|------|------|
| Mauseu Teseuteo (Mouse Tester) | [Open](https://keyboardtester.click/languages/korean/mouse-test.php) |
| Keulik Sokdo Teseuteu (Click Speed) | [Open](https://keyboardtester.click/languages/korean/click-speed.php) |
| Goseuteu Keulik Gamjigi | [Open](https://keyboardtester.click/languages/korean/ghost-click.php) |
| DPI Teseuteo | [Open](https://keyboardtester.click/languages/korean/dpi-tester.php) |
| Taiping Teseuteu | [Open](https://keyboardtester.click/languages/korean/typing-test.php) |
| Maiku Teseuteu | [Open](https://keyboardtester.click/languages/korean/mic-test.php) |
| Hedeupon Teseuteu | [Open](https://keyboardtester.click/languages/korean/headphone-test.php) |
| Webkaem Teseuteu | [Open](https://keyboardtester.click/languages/korean/webcam-test.php) |
| Hwamyeon Teseuteu | [Open](https://keyboardtester.click/languages/korean/screen-test.php) |
| Jiyeon Sigan Geomsa | [Open](https://keyboardtester.click/languages/korean/latency-checker.php) |
| Mauseu Teureril | [Open](https://keyboardtester.click/languages/korean/mouse-trail.php) |
| QR Kodeu Saengseonggi | [Open](https://keyboardtester.click/languages/korean/qr-generator.php) |
| QR Kodeu Rideo | [Open](https://keyboardtester.click/languages/korean/qr-reader.php) |
| OCR Dogu | [Open](https://keyboardtester.click/languages/korean/ocr-tool.php) |
| Bimilbeonho Saengseonggi | [Open](https://keyboardtester.click/languages/korean/password-generator.php) |
| Dedeu Piksael Teseuteu | [Open](https://keyboardtester.click/languages/korean/dead-pixel-test.php) |
| Maiku Bollyum Teseuteu | [Open](https://keyboardtester.click/languages/korean/microphone-volume-test.php) |
| Kamera Haesangdo Teseuteu | [Open](https://keyboardtester.click/languages/korean/camera-resolution-test.php) |
| Imiji-eseo QR Seukaen | [Open](https://keyboardtester.click/languages/korean/scan-qr-from-image.php) |
| Spacebar Teseuteu | [Open](https://keyboardtester.click/languages/korean/spacebar-test.php) |
| Baneung Sigan Teseuteu | [Open](https://keyboardtester.click/languages/korean/reaction-time-test.php) |
| Polling Rate Teseuteu | [Open](https://keyboardtester.click/languages/korean/polling-rate-test.php) |
| Hwamyeon Jaesaengnyul Teseuteu | [Open](https://keyboardtester.click/languages/korean/refresh-rate-test.php) |
| Teochi Hwamyeon Teseuteu | [Open](https://keyboardtester.click/languages/korean/touch-screen-test.php) |
| Gamepad Teseuteu | [Open](https://keyboardtester.click/languages/korean/gamepad-test.php) |
| Moniteo Saeksang Teseuteu | [Open](https://keyboardtester.click/languages/korean/color-test.php) |

---

## Category & Hub Pages

Browse tools organized by category:

| Category | Description | Link |
|----------|-------------|------|
| **All Tools** | Complete directory of every tool on the site | [Browse](https://keyboardtester.click/pages/tools.php) |
| **Keyboard Tools** | All keyboard testing and diagnostic tools | [Browse](https://keyboardtester.click/pages/category-keyboard.php) |
| **Mouse Tools** | All mouse testing and diagnostic tools | [Browse](https://keyboardtester.click/pages/category-mouse.php) |
| **Audio & Video Tools** | Microphone, headphone, webcam, and screen tools | [Browse](https://keyboardtester.click/pages/category-audio-video.php) |
| **Utility Tools** | QR codes, OCR, passwords, WhatsApp links, and more | [Browse](https://keyboardtester.click/pages/category-utilities.php) |
| **Language Keyboards** | Keyboard testers in 9 different languages | [Browse](https://keyboardtester.click/pages/category-language-keyboards.php) |
| **Mouse & Keyboard Pillar** | Comprehensive guide to all mouse and keyboard testing tools | [Read](https://keyboardtester.click/mouse-and-keyboard-test-tools.php) |
| **Multi-Language Keyboard Hub** | All language-specific keyboard testers in one place | [Browse](https://keyboardtester.click/keyboard_tester_different_languages.php) |

### Additional Pages

| Page | Link |
|------|------|
| About Us | [Visit](https://keyboardtester.click/about-us.php) |
| Privacy Policy | [Visit](https://keyboardtester.click/privacy-policy.php) |
| Disclaimer | [Visit](https://keyboardtester.click/disclaimer.php) |
| Feedback | [Submit](https://keyboardtester.click/feedback.php) |
| Blog | [Read](https://keyboardtester.click/blogs/) |

---

## Technology Stack

| Category | Technology |
|----------|------------|
| **Backend** | PHP 7.4+ (no framework, lightweight and fast) |
| **Frontend** | HTML5, CSS3, JavaScript ES6+ (vanilla, no frameworks) |
| **CSS Framework** | Bootstrap 5.3 (async loaded, non-blocking) |
| **Fonts** | Google Fonts (Inter, JetBrains Mono) with metric override fallbacks |
| **QR Engine** | QRCode.js (generation), jsQR (decoding) |
| **OCR Engine** | Tesseract.js (browser-side text recognition) |
| **Graphics** | Canvas API, Web Audio API |
| **Analytics** | Microsoft Clarity, Google Analytics |
| **Monetization** | Google AdSense (auto ads) |

---

## Features

| Feature | Details |
|---------|---------|
| **Dark/Light Theme** | Auto-detects OS preference via `prefers-color-scheme`, with manual toggle. Theme persists across visits via `localStorage`. |
| **Responsive Design** | Mobile-first layouts. Dedicated mobile keyboard input for touch devices. Breakpoints at 768px and 1200px. |
| **Gamified Testing** | Cat progress animation tracks keyboard testing completion. Cat chases a mouse across the progress bar with treat rewards at milestones. |
| **SEO Optimized** | JSON-LD structured data (WebApplication, FAQPage, BreadcrumbList), Open Graph, Twitter Cards, XML sitemaps, IndexNow integration. |
| **Performance Tuned** | Async font loading with metric overrides (zero CLS), CSS containment, debounced resize observers, delayed analytics. Targets 90+ Lighthouse scores. |
| **Privacy First** | All hardware testing runs entirely in the browser. No audio, video, or keystroke data is ever sent to any server. |
| **Accessibility** | ARIA labels, semantic HTML, keyboard navigation support, sufficient color contrast ratios. |
| **9 Languages** | Full tool interfaces localized in English, Spanish, French, German, Portuguese, Russian, Arabic (RTL), Japanese, and Korean. |

---

## Performance Optimizations

This project prioritizes Core Web Vitals and page load performance:

- **Zero-CLS font loading**: Async Google Fonts with `@font-face` metric overrides (size-adjust, ascent/descent-override) so the fallback font matches Inter's exact line height
- **Non-blocking CSS**: All stylesheets loaded via `<link rel="preload" as="style" onload>` pattern
- **CSS containment**: `contain: layout style` on major sections to prevent layout thrashing
- **Debounced observers**: ResizeObserver callbacks throttled with `requestAnimationFrame` to avoid forced reflows
- **Delayed analytics**: Microsoft Clarity loads 4 seconds after `window.load` to avoid impacting initial page metrics
- **Optimized images**: WebP format with responsive `srcset` and explicit `width`/`height` attributes
- **Preconnect strategy**: Critical origins preconnected (`fonts.googleapis.com`, `fonts.gstatic.com`), analytics origins use `dns-prefetch` only
- **Scoped transitions**: `.key` elements use `transform, box-shadow` instead of `all` to enable GPU compositing

---

## Project Structure

```
keyboardtester.click/
|
|-- index.php                          # Homepage (keyboard tester)
|-- config.php                         # Site configuration & URL helpers
|-- meta-config.php                    # SEO meta configuration
|-- .htaccess                          # Rewrites, caching, CSP, security headers
|
|-- assets/
|   |-- css/                           # Stylesheets (global, keyboard, index, cat progress)
|   |-- js/                            # Scripts (theme, cat progress, mobile adapters)
|
|-- includes/
|   |-- head-common.php                # Shared <head> (fonts, CSS, CSP-safe scripts)
|   |-- seo-meta.php                   # Dynamic meta tag generation
|   |-- schema.php                     # JSON-LD structured data
|   |-- related-tools.php              # Internal linking component
|   |-- components/                    # Reusable UI components
|   |   |-- breadcrumbs.php
|   |   |-- keyboard-cat-progress.php
|   |   |-- intent-cluster-links.php
|   |   |-- localized-intent-links.php
|
|-- tools/                             # Tool display components
|   |-- keyboard-tester/               # Keyboard tester (modular)
|   |-- keyboard_tester_english.php    # English keyboard layout
|   |-- keyboard_tester_spanish.php    # Spanish keyboard layout
|   |-- (+ 7 more language layouts)
|
|-- languages/                         # Localized page wrappers
|   |-- spanish/                       # 19 Spanish tool pages
|   |-- french/                        # 18 French tool pages
|   |-- german/                        # 18 German tool pages
|   |-- portuguese/                    # 18 Portuguese tool pages
|   |-- russian/                       # 18 Russian tool pages
|   |-- arabic/                        # 19 Arabic tool pages (RTL)
|   |-- japanese/                      # 18 Japanese tool pages
|   |-- korean/                        # 19 Korean tool pages
|
|-- pages/                             # Category listing pages
|-- help/                              # Help documentation per tool
|-- images/                            # Optimized WebP images
|-- flags/                             # Country flag SVGs
|-- blog/                              # WordPress blog (separate repo)
```

---

## Browser Support

| Browser | Minimum Version | Notes |
|---------|----------------|-------|
| Chrome | 80+ | Full support including all Web APIs |
| Firefox | 75+ | Full support |
| Safari | 13+ | WebRTC features may require permission prompts |
| Edge | 80+ | Chromium-based, full support |
| Opera | 67+ | Full support |
| Mobile Chrome | 80+ | Dedicated mobile keyboard input support |
| Mobile Safari | 13+ | iOS permission prompts for camera/mic |

---

## Getting Started (Local Development)

### Prerequisites
- PHP 7.4+ (XAMPP, Laragon, or any local PHP server)
- No database, no composer, no npm required

### Setup

```bash
git clone https://github.com/nasirazizawan009/keyboardtester-click.git
cd keyboardtester-click
cp .env.example .env   # Add your own credentials if you want to deploy
```

Point your local PHP server at the project folder and open `http://localhost/keyboardtester-click/`.

The site auto-detects `localhost` vs production — no config changes needed.

---

## Contributing

Contributions are welcome! Bug reports, new tools, translation fixes, and performance improvements are all appreciated.

Read [CONTRIBUTING.md](CONTRIBUTING.md) for full guidelines. Quick summary:

1. Fork → create a branch → make changes → test locally → open a PR
2. Follow the existing PHP/JS patterns (no frameworks, no build tools)
3. Test on both desktop and mobile

### Areas where contributions are especially helpful:
- New language translations
- Accessibility improvements (WCAG AA)
- Performance optimizations (PageSpeed / Core Web Vitals)
- New browser-based hardware test tools
- Bug reports and fixes

---

## License

This project is open source under the **MIT License** — see [LICENSE](LICENSE) for full terms.

**Key points:**
- You can use, copy, modify, and distribute the code freely
- Include the copyright notice in copies
- The "KeyboardTester.click" brand name and domain are **not** covered by the MIT License
- Pexels images in `/images/` are covered by the Pexels License, not MIT
- If you deploy this yourself, you need your own privacy policy

---

## Contact & Links

| | |
|---|---|
| **Website** | [keyboardtester.click](https://keyboardtester.click) |
| **GitHub** | [github.com/nasirazizawan009/keyboardtester-click](https://github.com/nasirazizawan009/keyboardtester-click) |
| **GitLab** | [gitlab.com/nasirazizawan/keyboardtester.click](https://gitlab.com/nasirazizawan/keyboardtester.click) |
| **YouTube** | [@KeyboardTester-dot-click](https://www.youtube.com/@KeyboardTester-dot-click) |
| **Facebook** | [facebook.com/keyboardtester.click](https://www.facebook.com/keyboardtester.click) |
| **Email** | support@keyboardtester.click |
| **Feedback** | [Submit Feedback](https://keyboardtester.click/feedback.php) |

---

<p align="center">
  <b>Free online hardware testing tools for everyone</b><br>
  <a href="https://keyboardtester.click">keyboardtester.click</a><br><br>
  <i>25+ tools | 9 languages | 270+ pages | Zero downloads required</i>
</p>
