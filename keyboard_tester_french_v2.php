<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
<!-- SEO Meta Tags -->
<!-- Language -->
    <link rel="alternate" hreflang="fr" href="https://www.keyboardtester.click/keyboard_tester_french.html">
    <link rel="alternate" hreflang="en" href="https://www.keyboardtester.click/">
    <link rel="alternate" hreflang="x-default" href="https://www.keyboardtester.click/">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <?php include 'includes/head-common.php'; ?>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/keyboard-tool.css">
    
    <!-- Favicon -->
    <?php include 'favicon.php'; ?>
    
    <!-- Theme Script (early load) -->
    <script src="assets/js/theme.js"></script>
</head>
<body class="keyboard-tool-page">
    
    <!-- Tool Header with Controls -->
    <header class="tool-controls-header">
        <h1>⌨️ Testeur de Clavier en Ligne</h1>
        <nav class="tool-nav">
            <button class="nav-btn help-btn" id="help-button">❓ Aide</button>
            <a href="https://keyboardtester.click/blog/" class="nav-btn blog-btn">📝 Blog</a>
            <button class="theme-toggle" id="theme-toggle" aria-label="Changer de thème"></button>
        </nav>
    </header>

    <!-- Navigation Buttons -->
    <div class="nav-buttons-bar">
        <a href="https://www.keyboardtester.click/">🏠 Accueil</a>
        <a href="https://www.keyboardtester.click/mouse-test.html">🖱️ Test de Souris</a>
        <a href="https://www.keyboardtester.click/privacy-policy.html">🔒 Confidentialité</a>
        <a href="https://www.keyboardtester.click/disclaimer.html">⚠️ Avertissement</a>
        <a href="https://www.keyboardtester.click/about-us.html">ℹ️ À Propos</a>
        <a href="https://www.amazon.fr/s?k=clavier" class="amazon-link" target="_blank">🛒 Acheter un Clavier</a>
    </div>

    <!-- Keyboard Tester Section -->
    <main class="keyboard-tester-section" id="keyboard-tester">
        
        <!-- Controls -->
        <div class="keyboard-controls">
            <textarea class="key-history-box" id="key-history" rows="3" placeholder="Appuyez sur les touches pour les voir ici..." readonly></textarea>
            <button class="nav-btn reset-btn" id="reset-button">🔄 Réinitialiser</button>
        </div>

        <!-- Keyboard Container -->
        <div class="keyboard-container">
            <div class="main-keyboard-section">
                
                <!-- Main Keyboard (AZERTY Layout) -->
                <div class="keyboard-panel">
                    <!-- Function Row -->
                    <div class="keyboard-row function-row">
                        <div class="key special" data-key="Escape">Échap</div>
                        <div class="key-group">
                            <div class="key special" data-key="F1">F1</div>
                            <div class="key special" data-key="F2">F2</div>
                            <div class="key special" data-key="F3">F3</div>
                            <div class="key special" data-key="F4">F4</div>
                        </div>
                        <div class="key-group">
                            <div class="key special" data-key="F5">F5</div>
                            <div class="key special" data-key="F6">F6</div>
                            <div class="key special" data-key="F7">F7</div>
                            <div class="key special" data-key="F8">F8</div>
                        </div>
                        <div class="key-group">
                            <div class="key special" data-key="F9">F9</div>
                            <div class="key special" data-key="F10">F10</div>
                            <div class="key special" data-key="F11">F11</div>
                            <div class="key special" data-key="F12">F12</div>
                        </div>
                    </div>

                    <!-- Number Row (AZERTY) -->
                    <div class="keyboard-row">
                        <div class="key" data-key="Backquote">²</div>
                        <div class="key" data-key="Digit1">&</div>
                        <div class="key" data-key="Digit2">é</div>
                        <div class="key" data-key="Digit3">"</div>
                        <div class="key" data-key="Digit4">'</div>
                        <div class="key" data-key="Digit5">(</div>
                        <div class="key" data-key="Digit6">-</div>
                        <div class="key" data-key="Digit7">è</div>
                        <div class="key" data-key="Digit8">_</div>
                        <div class="key" data-key="Digit9">ç</div>
                        <div class="key" data-key="Digit0">à</div>
                        <div class="key" data-key="Minus">)</div>
                        <div class="key" data-key="Equal">=</div>
                        <div class="key special backspace" data-key="Backspace">⌫</div>
                    </div>

                    <!-- Top Letter Row (AZERTY) -->
                    <div class="keyboard-row">
                        <div class="key special tab" data-key="Tab">Tab ⇥</div>
                        <div class="key" data-key="KeyA">A</div>
                        <div class="key" data-key="KeyZ">Z</div>
                        <div class="key" data-key="KeyE">E</div>
                        <div class="key" data-key="KeyR">R</div>
                        <div class="key" data-key="KeyT">T</div>
                        <div class="key" data-key="KeyY">Y</div>
                        <div class="key" data-key="KeyU">U</div>
                        <div class="key" data-key="KeyI">I</div>
                        <div class="key" data-key="KeyO">O</div>
                        <div class="key" data-key="KeyP">P</div>
                        <div class="key" data-key="BracketLeft">^</div>
                        <div class="key" data-key="BracketRight">$</div>
                        <div class="key special backslash" data-key="Backslash">*</div>
                    </div>

                    <!-- Home Row (AZERTY) -->
                    <div class="keyboard-row">
                        <div class="key special caps" data-key="CapsLock">Verr Maj</div>
                        <div class="key" data-key="KeyQ">Q</div>
                        <div class="key" data-key="KeyS">S</div>
                        <div class="key" data-key="KeyD">D</div>
                        <div class="key" data-key="KeyF">F</div>
                        <div class="key" data-key="KeyG">G</div>
                        <div class="key" data-key="KeyH">H</div>
                        <div class="key" data-key="KeyJ">J</div>
                        <div class="key" data-key="KeyK">K</div>
                        <div class="key" data-key="KeyL">L</div>
                        <div class="key" data-key="Semicolon">M</div>
                        <div class="key" data-key="Quote">ù</div>
                        <div class="key special enter" data-key="Enter">↵ Entrée</div>
                    </div>

                    <!-- Bottom Letter Row (AZERTY) -->
                    <div class="keyboard-row">
                        <div class="key special shift" data-key="ShiftLeft">⇧ Maj</div>
                        <div class="key" data-key="IntlBackslash"><</div>
                        <div class="key" data-key="KeyW">W</div>
                        <div class="key" data-key="KeyX">X</div>
                        <div class="key" data-key="KeyC">C</div>
                        <div class="key" data-key="KeyV">V</div>
                        <div class="key" data-key="KeyB">B</div>
                        <div class="key" data-key="KeyN">N</div>
                        <div class="key" data-key="KeyM">,</div>
                        <div class="key" data-key="Comma">;</div>
                        <div class="key" data-key="Period">:</div>
                        <div class="key" data-key="Slash">!</div>
                        <div class="key special shift" data-key="ShiftRight">⇧ Maj</div>
                    </div>

                    <!-- Bottom Row -->
                    <div class="keyboard-row">
                        <div class="key special" data-key="ControlLeft">Ctrl</div>
                        <div class="key special" data-key="MetaLeft">⊞</div>
                        <div class="key special" data-key="AltLeft">Alt</div>
                        <div class="key space" data-key="Space"></div>
                        <div class="key special" data-key="AltRight">Alt Gr</div>
                        <div class="key special" data-key="MetaRight">⊞</div>
                        <div class="key special" data-key="ContextMenu">☰</div>
                        <div class="key special" data-key="ControlRight">Ctrl</div>
                    </div>
                </div>

                <!-- Navigation Cluster -->
                <div class="nav-cluster">
                    <div class="nav-keys-row">
                        <div class="key special" data-key="PrintScreen" style="font-size:10px">Impr</div>
                        <div class="key special" data-key="ScrollLock" style="font-size:10px">Défil</div>
                        <div class="key special" data-key="Pause" style="font-size:10px">Pause</div>
                    </div>
                    <div class="nav-keys-row">
                        <div class="key special" data-key="Insert" style="font-size:10px">Inser</div>
                        <div class="key special" data-key="Home" style="font-size:10px">Début</div>
                        <div class="key special" data-key="PageUp" style="font-size:10px">Pg↑</div>
                    </div>
                    <div class="nav-keys-row">
                        <div class="key special" data-key="Delete" style="font-size:10px">Suppr</div>
                        <div class="key special" data-key="End" style="font-size:10px">Fin</div>
                        <div class="key special" data-key="PageDown" style="font-size:10px">Pg↓</div>
                    </div>
                    <div class="arrow-keys">
                        <div class="key" data-key="ArrowUp">↑</div>
                        <div class="key" data-key="ArrowLeft">←</div>
                        <div class="key" data-key="ArrowDown">↓</div>
                        <div class="key" data-key="ArrowRight">→</div>
                    </div>
                </div>

                <!-- Numpad -->
                <div class="numpad">
                    <div class="indicator-lights">
                        <div class="indicator-light" id="num-lock-light" title="Verr Num"></div>
                        <div class="indicator-light" id="caps-lock-light" title="Verr Maj"></div>
                        <div class="indicator-light" id="scroll-lock-light" title="Arrêt Défil"></div>
                    </div>
                    <div class="keyboard-row">
                        <div class="key special" data-key="NumLock" style="font-size:10px">Num</div>
                        <div class="key special" data-key="NumpadDivide">/</div>
                        <div class="key special" data-key="NumpadMultiply">*</div>
                        <div class="key special" data-key="NumpadSubtract">-</div>
                    </div>
                    <div class="numpad-digits-container">
                        <div class="numpad-digits">
                            <div class="keyboard-row">
                                <div class="key" data-key="Numpad7">7</div>
                                <div class="key" data-key="Numpad8">8</div>
                                <div class="key" data-key="Numpad9">9</div>
                            </div>
                            <div class="keyboard-row">
                                <div class="key" data-key="Numpad4">4</div>
                                <div class="key" data-key="Numpad5">5</div>
                                <div class="key" data-key="Numpad6">6</div>
                            </div>
                            <div class="keyboard-row">
                                <div class="key" data-key="Numpad1">1</div>
                                <div class="key" data-key="Numpad2">2</div>
                                <div class="key" data-key="Numpad3">3</div>
                            </div>
                            <div class="keyboard-row">
                                <div class="key zero-wide" data-key="Numpad0">0</div>
                                <div class="key" data-key="NumpadDecimal">,</div>
                            </div>
                        </div>
                        <div class="numpad-vertical-keys">
                            <div class="key tall" data-key="NumpadAdd">+</div>
                            <div class="key tall" data-key="NumpadEnter">↵</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Tools Promo Section -->
    <section class="tools-promo-section">
        <h2>✨ Découvrez Nos Outils Incroyables ✨</h2>
        <p>Améliorez votre configuration avec notre testeur de clavier en ligne, nos outils pour souris et plus encore !</p>
        
        <div class="tool-link-item">
            <a href="https://www.keyboardtester.click/mouse-test.html">
                <span class="tool-link-btn mouse">🖱️ Testeur de Souris</span>
            </a>
            <span>Testez vos boutons de souris et le défilement facilement !</span>
        </div>
        
        <div class="tool-link-item">
            <a href="https://www.keyboardtester.click/mouse_speed_tester.html">
                <span class="tool-link-btn speed">⚡ Test de Vitesse de Clic</span>
            </a>
            <span>Mesurez votre vitesse de clic en clics par minute !</span>
        </div>
        
        <div class="tool-link-item">
            <a href="https://www.keyboardtester.click/keyboard_typing_test.html">
                <span class="tool-link-btn typing">⌨️ Test de Vitesse de Frappe</span>
            </a>
            <span>Améliorez votre vitesse de frappe et précision !</span>
        </div>
        
        <div class="tool-link-item">
            <a href="https://www.keyboardtester.click/ghost-click-detector.html">
                <span class="tool-link-btn ghost">👻 Détecteur de Clics Fantômes</span>
            </a>
            <span>Découvrez si votre souris clique toute seule !</span>
        </div>
        
        <div class="tool-link-item">
            <a href="https://www.keyboardtester.click/mic-tester.html">
                <span class="tool-link-btn mic">🎙️ Testeur de Microphone</span>
            </a>
            <span>Vérifiez si votre micro fonctionne parfaitement !</span>
        </div>
    </section>

    <!-- Language Selector -->
    <section class="guidelines-section">
        <p style="text-align: center; margin-bottom: 20px;">
            🌍 Testez votre clavier dans votre langue préférée :
        </p>
        <div class="language-selector">
            <a href="https://www.keyboardtester.click/"><span class="lang-btn english">🇬🇧 English</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_arabic.html"><span class="lang-btn arabic"><img src="flags/arabic_flag.svg" alt=""> العربية</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_german.html"><span class="lang-btn german"><img src="flags/german_flag.svg" alt=""> Deutsch</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_russian.html"><span class="lang-btn russian"><img src="flags/russian_flag.svg" alt=""> Русский</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_spanish.html"><span class="lang-btn spanish"><img src="flags/spanish_flag.svg" alt=""> Español</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_portuguese.html"><span class="lang-btn portuguese"><img src="flags/Portugal_flag.svg" alt=""> Português</span></a>
            <a href="#"><span class="lang-btn french"><img src="flags/french_flag.svg" alt=""> Français</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_japanese.html"><span class="lang-btn japanese"><img src="flags/japan_flag.svg" alt=""> 日本語</span></a>
            <a href="https://www.keyboardtester.click/keyboard_tester_korean_index.html"><span class="lang-btn korean"><img src="flags/korean_flag.svg" alt=""> 한국어</span></a>
        </div>
    </section>

    <!-- Guidelines Section -->
    <section class="guidelines-section" id="guidelines">
        <h1>📜 Guide d'Utilisation</h1>
        <p style="text-align: center;">
            <strong>Bienvenue sur KeyboardTester.click !</strong> Votre outil incontournable pour tester les touches du clavier.
        </p>

        <h2>🛠️ Comment Utiliser le Testeur de Clavier</h2>
        <p>Notre <a href="https://www.keyboardtester.click/">testeur de clavier en ligne</a> est gratuit et facile à utiliser :</p>
        <ul>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Appuyez sur une Touche :</span> Voyez-la s'illuminer sur le clavier virtuel.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Vérifiez l'État des Touches :</span> Les couleurs indiquent combien de fois une touche est pressée.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Réinitialiser :</span> Effacez tout avec le bouton Réinitialiser.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Changer de Thème :</span> Alternez entre les modes clair et sombre.</li>
        </ul>

        <h2 id="understanding-key-press-colors">🎨 Comprendre les Couleurs des Touches</h2>
        <p>Les couleurs dans notre test de fonctionnalité du clavier indiquent le nombre de pressions :</p>
        <div class="key-color-indicators">
            <span class="color-indicator" style="background: var(--key-active-1);">1ère Pression</span>
            <span class="color-indicator" style="background: var(--key-active-2); color: #000;">2ème Pression</span>
            <span class="color-indicator" style="background: var(--key-active-3);">3ème Pression</span>
            <span class="color-indicator" style="background: var(--key-active-4);">4ème Pression</span>
            <span class="color-indicator" style="background: var(--key-active-5);">5+ Pressions</span>
        </div>

        <h2>🔍 Tester les Touches Spéciales</h2>
        <p>Utilisez notre outil pour vérifier les touches spéciales :</p>
        <ul>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Verr Maj :</span> Voyez l'indicateur s'allumer quand il est activé.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Verr Num :</span> S'illumine quand il est actif.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Arrêt Défil :</span> Brille quand il est enclenché.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Touches Fléchées :</span> Vérifiez la navigation (↑, ←, ↓, →).</li>
        </ul>

        <h2>❓ Questions Fréquentes (FAQ)</h2>
        <ul>
            <li><strong>Qu'est-ce qu'un Testeur de Clavier ?</strong><br>Un outil gratuit pour tester les touches du clavier et résoudre les problèmes rapidement.</li>
            <li><strong>Comment l'Utiliser ?</strong><br>Appuyez sur les touches pour les voir s'illuminer—parfait pour le test Verr Maj et plus.</li>
            <li><strong>Fonctionne avec Tous les Claviers ?</strong><br>Oui—mécaniques, à membrane ou claviers d'ordinateur portable.</li>
        </ul>

        <h2>🔧 Conseils pour Entretenir Votre Clavier</h2>
        <ul>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Nettoyez Régulièrement :</span> Enlevez la poussière avec un kit de nettoyage.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Évitez les Déversements :</span> Protégez des dégâts liquides.</li>
            <li><span style="color: var(--accent-color); font-weight: bold;">✦ Testez Souvent :</span> Utilisez notre test de fonctionnalité du clavier régulièrement.</li>
        </ul>

        <h2>🔑 Mots-Clés SEO</h2>
        <div class="seo-keywords">
            <span class="seo-tag" style="background: #1abc9c;">testeur de clavier</span>
            <span class="seo-tag" style="background: #2ecc71;">clavier AZERTY</span>
            <span class="seo-tag" style="background: #3498db;">test de clavier en ligne</span>
            <span class="seo-tag" style="background: #e67e22;">test Verr Maj</span>
            <span class="seo-tag" style="background: #9b59b6;">test Verr Num</span>
            <span class="seo-tag" style="background: #e74c3c;">dépannage clavier</span>
        </div>

        <h2>🆘 Besoin d'Aide ?</h2>
        <p>
            Visitez <a href="https://www.keyboardtester.click/about-us.html">À Propos</a>, 
            <a href="https://www.keyboardtester.click/privacy-policy.html">Politique de Confidentialité</a> ou 
            <a href="https://www.keyboardtester.click/disclaimer.html">Avertissement</a>.
        </p>
    </section>

    <!-- Footer -->
    <footer class="simple-footer">
        <p>&copy; 2025 <a href="https://www.keyboardtester.click/">KeyboardTester.Click</a>. Tous droits réservés. 
        Visitez notre <a href="https://keyboardtester.click/blog/">Blog</a> pour plus de ressources.</p>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/keyboard-tool.js"></script>
</body>
</html>

