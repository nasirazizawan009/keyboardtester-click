<?php
ob_start();

// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/../config.php';
}
?>

<div class="guidelines" id="guidelines">
    <!-- Hero Section -->
    <h1>Free Online Keyboard Latency Test & Ghosting Key Detection Tool</h1>
    <p class="intro-text">
        Test your keyboard instantly with KeyboardTester.click! Our free online tools help you detect ghosting keys, measure keyboard latency, check response time, and diagnose stuck keys—all in your browser. No downloads required. Perfect for gamers, typists, and anyone experiencing keyboard issues.
    </p>
    
    <!-- Hero Image -->
    <div class="guide-image">
        <picture>
            <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 720px">
            <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 720px">
            <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Keyboard latency test showing real-time response time measurement and ghost click detection" loading="lazy" decoding="async">
        </picture>
        <div class="image-label">Keyboard tester overview</div>
    </div>
    
    <hr class="section-divider">

    <!-- Quick Start Section -->
    <section class="guide-section">
        <h2>🚀 Quick Start Guide - Test Your Keyboard in 3 Steps</h2>
        <p>
            Start testing your keyboard immediately—no signup, no downloads, completely free:
        </p>
        <ul class="feature-list">
            <li><strong>Press Any Key:</strong> Watch it light up instantly on the virtual keyboard to confirm it's responding.</li>
            <li><strong>View Response Time:</strong> See exactly how fast each key registers (latency measurement in milliseconds).</li>
            <li><strong>Check for Issues:</strong> Detect stuck keys, ghosting problems, and unresponsive buttons automatically.</li>
        </ul>
        
        <!-- Testing in Action Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/testing-in-action2.png'); ?>" alt="Real-time keyboard testing demonstration showing key presses and latency measurements" loading="lazy">
            <div class="image-label">Keyboard testing in action</div>
        </div>
    </section>

    <!-- NEW: Keyboard Latency Test Section -->
    <section class="guide-section" id="keyboard-latency-test">
        <h2>⚡ Keyboard Latency Test Online Free - Measure Response Time</h2>
        <p>
            <strong>What is keyboard latency?</strong> Keyboard latency (also called input lag) is the delay between pressing a key and your computer registering that key press. Lower latency means faster, more responsive typing and gaming performance.
        </p>
        
        <!-- Latency Test Image -->
        <div class="guide-image">
            <picture>
                <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 720px">
                <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 720px">
                <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="Keyboard latency test interface showing millisecond response time measurements" loading="lazy" decoding="async">
            </picture>
            <div class="image-label">Latency measurement view</div>
        </div>
        
        <h3>How to Use the Keyboard Latency Test:</h3>
        <ul class="feature-list">
            <li><strong>Click "Advanced Options"</strong> at the top of the page</li>
            <li><strong>Select "⚡ Latency Test"</strong> from the feature buttons</li>
            <li><strong>Press "Start Test"</strong> and begin typing on your keyboard</li>
            <li><strong>View Real-Time Results:</strong> See current latency, average, best, and worst response times</li>
            <li><strong>Get Your Rating:</strong> After 10 key presses, receive an automatic performance rating</li>
        </ul>

        <h3>Understanding Your Latency Results:</h3>
        <div class="latency-ratings">
            <div class="rating-box excellent">
                <span class="rating-label">🏆 Excellent (< 5ms)</span>
                <p>Professional gaming-grade latency. Perfect for competitive gaming and fast-paced work.</p>
            </div>
            <div class="rating-box good">
                <span class="rating-label">✅ Good (5-10ms)</span>
                <p>Solid performance for general use, casual gaming, and everyday typing.</p>
            </div>
            <div class="rating-box fair">
                <span class="rating-label">⚠️ Fair (10-20ms)</span>
                <p>Acceptable for typing but may feel sluggish for gaming. Consider upgrading.</p>
            </div>
            <div class="rating-box poor">
                <span class="rating-label">❌ Poor (> 20ms)</span>
                <p>High latency detected. Check drivers, use wired connection, or replace keyboard.</p>
            </div>
        </div>

        <h3>Why Test Keyboard Latency?</h3>
        <ul class="feature-list">
            <li><strong>Gaming Performance:</strong> Competitive gamers need low latency for quick reactions</li>
            <li><strong>Typing Efficiency:</strong> Lower latency improves typing speed and accuracy</li>
            <li><strong>Troubleshooting:</strong> Identify if slow response is a keyboard or computer issue</li>
            <li><strong>Compare Keyboards:</strong> Test different keyboards to find the fastest one</li>
            <li><strong>Wireless vs Wired:</strong> Measure the latency difference between connection types</li>
        </ul>
    </section>

    <!-- NEW: Ghost Click & Stuck Keys Section -->
    <section class="guide-section" id="ghosting-keys-test">
        <h2>👻 How to Test for Stuck or Ghosting Keys on Your Keyboard</h2>
        <p>
            <strong>What are ghosting keys?</strong> Keyboard ghosting occurs when certain key combinations don't register, or when phantom key presses appear without you touching any keys. Stuck keys happen when a key registers continuously without being pressed.
        </p>
        
        <!-- Ghost Click Detection Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/testing-in-action2.png'); ?>" alt="Ghost click detection interface showing automatic detection of phantom key presses and stuck keys" loading="lazy">
            <div class="image-label">Ghosting detection view</div>
        </div>

        <h3>How to Test for Ghosting Keys Online:</h3>
        <ul class="feature-list">
            <li><strong>Click "Advanced Options"</strong> to reveal testing features</li>
            <li><strong>Select "👻 Ghost Click Test"</strong> from the menu</li>
            <li><strong>Press "Start Test"</strong> and take your hands OFF the keyboard</li>
            <li><strong>Wait 30-60 Seconds:</strong> The system monitors for any phantom key presses</li>
            <li><strong>Review Detection Log:</strong> Any ghost clicks or stuck keys are automatically logged with timestamps</li>
        </ul>

        <h3>Common Keyboard Ghosting Problems:</h3>
        <div class="problem-solutions">
            <div class="problem-item">
                <h4>🔴 Phantom Key Presses (Ghost Clicks)</h4>
                <p><strong>Symptom:</strong> Keys register without being touched</p>
                <p><strong>Causes:</strong> Debris under keys, damaged circuit, software conflict, worn-out switches</p>
                <p><strong>Solution:</strong> Clean keyboard thoroughly, update drivers, test with our ghost detection tool</p>
            </div>

            <div class="problem-item">
                <h4>🔴 Stuck Keys</h4>
                <p><strong>Symptom:</strong> Key continuously registers even after release</p>
                <p><strong>Causes:</strong> Physical obstruction, sticky residue, damaged key mechanism</p>
                <p><strong>Solution:</strong> Remove keycap and clean, check for physical damage, use compressed air</p>
            </div>

            <div class="problem-item">
                <h4>🔴 Key Combination Ghosting</h4>
                <p><strong>Symptom:</strong> Certain key combinations don't work (common in gaming)</p>
                <p><strong>Causes:</strong> Hardware limitation (especially in cheaper keyboards), rollover limit</p>
                <p><strong>Solution:</strong> Test multiple key combinations, consider upgrading to N-key rollover keyboard</p>
            </div>

            <div class="problem-item">
                <h4>🔴 Unresponsive Keys</h4>
                <p><strong>Symptom:</strong> Keys don't register when pressed</p>
                <p><strong>Causes:</strong> Dead switch, connection issue, driver problem</p>
                <p><strong>Solution:</strong> Test with our keyboard tester, reconnect keyboard, update drivers</p>
            </div>
        </div>

        <h3>How to Fix Stuck or Ghosting Keys:</h3>
        <ul class="feature-list">
            <li><strong>Clean Your Keyboard:</strong> Use compressed air and <a href="https://www.amazon.com/s?k=keyboard+cleaning+kit" target="_blank" rel="noopener">cleaning solutions</a></li>
            <li><strong>Remove Keycaps:</strong> Gently remove and clean individual problem keys</li>
            <li><strong>Update Drivers:</strong> Download latest keyboard drivers from manufacturer</li>
            <li><strong>Test with Our Tool:</strong> Use Ghost Click Test to confirm the issue is resolved</li>
            <li><strong>Replace Switches:</strong> For mechanical keyboards, consider <a href="https://www.amazon.com/s?k=mechanical+keyboard+switches" target="_blank" rel="noopener">replacement switches</a></li>
            <li><strong>Consider Replacement:</strong> If issues persist, it may be time for a <a href="https://www.amazon.com/s?k=gaming+keyboard+anti-ghosting" target="_blank" rel="noopener">new anti-ghosting keyboard</a></li>
        </ul>
    </section>

    <!-- Color System Section -->
    <section class="guide-section">
        <h2 id="key-press-colors">🎨 Visual Key Press Tracking System</h2>
        <p>
            Our color-coded system makes it easy to see how many times you've pressed each key during testing:
        </p>
        <div class="color-indicators">
            <span class="color-badge green">1st Press</span>
            <span class="color-badge yellow">2nd Press</span>
            <span class="color-badge orange">3rd Press</span>
            <span class="color-badge red">4th Press</span>
            <span class="color-badge purple">5+ Presses</span>
        </div>
        
        <!-- Color System Image -->
        <div class="guide-image">
            <picture>
                <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 980px) 92vw, 720px">
                <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 980px) 92vw, 720px">
                <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="Visual guide showing color progression from first key press to multiple presses for easy tracking" loading="lazy" decoding="async">
            </picture>
            <div class="image-label">Key press color guide</div>
        </div>
        
        <ul class="color-explanation">
            <li><span class="color-dot green"></span> <strong>Green (1st Press):</strong> First successful key detection - confirms key works</li>
            <li><span class="color-dot yellow"></span> <strong>Yellow (2nd Press):</strong> Second press registered - key is responsive</li>
            <li><span class="color-dot orange"></span> <strong>Orange (3rd Press):</strong> Third press recorded - consistent performance</li>
            <li><span class="color-dot red"></span> <strong>Red (4th Press):</strong> Fourth press confirmed - reliable key function</li>
            <li><span class="color-dot purple"></span> <strong>Purple (5+ Presses):</strong> Frequently used key - fully tested</li>
        </ul>
        
        <p><strong>Pro Tip:</strong> Use this visual feedback to quickly identify which keys you haven't tested yet and ensure complete keyboard coverage.</p>
    </section>

    <!-- Advanced Features Section -->
    <section class="guide-section">
        <h2>🎯 Advanced Testing Features</h2>
        <p>
            Click <strong>"Advanced Options"</strong> to unlock powerful diagnostic tools:
        </p>

        <!-- Advanced Features Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/tools-ecosystem.png'); ?>" alt="Advanced keyboard testing features including statistics, heatmap, sound, and comprehensive diagnostics" loading="lazy">
            <div class="image-label">Advanced diagnostics overview</div>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <h3>📊 Statistics</h3>
                <p>Track total key presses, session duration, most/least used keys, and keyboard coverage percentage.</p>
            </div>

            <div class="feature-card">
                <h3>🔥 Heatmap Mode</h3>
                <p>Visualize keyboard usage patterns with color-coded heat intensity showing frequently pressed keys.</p>
            </div>

            <div class="feature-card">
                <h3>🔊 Sound Feedback</h3>
                <p>Enable audio feedback for each key press to confirm registration even without looking at screen.</p>
            </div>

            <div class="feature-card">
                <h3>✓ Test All Keys Mode</h3>
                <p>Comprehensive testing mode that highlights untested keys, ensuring you check every button.</p>
            </div>

            <div class="feature-card">
                <h3>💾 Export Results</h3>
                <p>Save your testing session data (JSON format) for documentation or troubleshooting records.</p>
            </div>

            <div class="feature-card">
                <h3>⚡ Latency Testing</h3>
                <p>Measure keyboard response time in milliseconds, compare performance, get professional ratings.</p>
            </div>

            <div class="feature-card">
                <h3>👻 Ghost Detection</h3>
                <p>Automatically detect phantom key presses, stuck keys, and ghosting issues with detailed logging.</p>
            </div>

            <div class="feature-card">
                <h3>🌈 Theme Options</h3>
                <p>Choose from Dark, Light, Blue, Cyberpunk, and Forest themes for comfortable testing experience.</p>
            </div>
        </div>
    </section>

    <!-- Special Keys Section -->
    <section class="guide-section">
        <h2>⌨️ Testing Special Keys and Function Buttons</h2>
        <p>
            Our tool supports comprehensive testing of all keyboard keys including special function buttons:
        </p>
        
        <!-- Special Keys Image -->
        <div class="guide-image">
            <picture>
                <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 980px) 92vw, 720px">
                <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 980px) 92vw, 720px">
                <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="Complete keyboard layout showing function keys, arrow keys, numpad, and modifier keys with testing indicators" loading="lazy" decoding="async">
            </picture>
            <div class="image-label">Special keys layout</div>
        </div>
        
        <ul class="feature-list">
            <li><strong>Lock Keys with LED Indicators:</strong> Caps Lock, Num Lock, Scroll Lock show active status</li>
            <li><strong>Function Keys (F1-F12):</strong> Test all function keys for shortcuts and special commands</li>
            <li><strong>Arrow Navigation Keys:</strong> Check all directional arrows (↑ ← ↓ →) for gaming and navigation</li>
            <li><strong>Numpad Keys:</strong> Complete numeric keypad testing including operators and Enter</li>
            <li><strong>Modifier Keys:</strong> Test Shift, Ctrl, Alt, Windows/Command, Fn keys</li>
            <li><strong>Media Keys:</strong> Verify Print Screen, Pause, Insert, Delete, Home, End, Page Up/Down</li>
            <li><strong>Special Characters:</strong> Test brackets, slashes, semicolons, quotes, and all symbols</li>
        </ul>
    </section>

    <!-- Mouse Testing Section -->
    <section class="guide-section">
        <h2>🐭 Mouse Click Testing Tools</h2>
        <p>
            Beyond keyboard testing, we offer comprehensive mouse diagnostics including click speed testing:
        </p>
        
        <!-- Mouse Testing Image -->
        <div class="guide-image">
            <picture>
                <source type="image/webp" srcset="<?php echo url('images/mouse/mouse-test-guide-800.webp'); ?> 800w, <?php echo url('images/mouse/mouse-test-guide-1200.webp'); ?> 1200w" sizes="(max-width: 980px) 92vw, 720px">
                <source type="image/png" srcset="<?php echo url('images/mouse/mouse-test-guide-800.png'); ?> 800w, <?php echo url('images/mouse/mouse-test-guide-1200.png'); ?> 1200w" sizes="(max-width: 980px) 92vw, 720px">
                <img src="<?php echo url('images/mouse/mouse-test-guide-800.png'); ?>" width="800" height="533" alt="Mouse click testing interface showing button detection, scroll testing, and clicks per second measurement" loading="lazy" decoding="async">
            </picture>
            <div class="image-label">Mouse testing panel</div>
        </div>
        
        <ul class="feature-list">
            <li><strong>Button Testing:</strong> Verify all mouse buttons (left, right, middle, side buttons) respond correctly</li>
            <li><strong>Click Speed Test:</strong> Measure your clicks per second (CPS) for gaming performance</li>
            <li><strong>Scroll Wheel Testing:</strong> Test smooth scrolling in both directions with visual feedback</li>
            <li><strong>DPI Measurement:</strong> Check cursor sensitivity and tracking precision</li>
            <li><strong>Double-Click Testing:</strong> Verify double-click functionality and timing</li>
        </ul>
        <p>
            <a href="<?php echo $pages['mouse_test']; ?>" class="cta-link">Try Our Mouse Click Tester →</a>
        </p>
    </section>

    <!-- Keyboard Layouts Section -->
    <section class="guide-section">
        <h2>🌍 Multiple Keyboard Layout Support</h2>
        <p>
            Test any keyboard layout with our versatile tool supporting international configurations:
        </p>
        <ul class="feature-list">
            <li><strong>QWERTY:</strong> Standard English layout (most common worldwide)</li>
            <li><strong>AZERTY:</strong> French/Belgian keyboard layout</li>
            <li><strong>QWERTZ:</strong> German/Central European layout</li>
            <li><strong>Dvorak:</strong> Alternative ergonomic layout for efficiency</li>
            <li><strong>Colemak:</strong> Modern alternative optimized for typing comfort</li>
        </ul>
        <p><strong>OS Support:</strong> Switch between Windows and Mac key labeling for accurate testing on any platform.</p>
    </section>

    <!-- FAQ Section with Schema -->
    <section class="guide-section faq-section">
        <h2>❓ Frequently Asked Questions</h2>
        
        <!-- FAQ Helper Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/faq-helper.png'); ?>" alt="Helpful FAQ section with common keyboard testing questions and expert answers" loading="lazy">
            <div class="image-label">FAQ guidance</div>
        </div>
        
        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">How do I test keyboard latency for free online?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Use our free keyboard latency test tool: Click "Advanced Options" → Select "⚡ Latency Test" → Press "Start Test" → Type any keys. You'll see real-time latency measurements in milliseconds, average response time, and an automatic performance rating after 10 key presses. Professional gaming keyboards typically show 1-5ms latency.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">How can I detect ghosting or stuck keys on my keyboard?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Our Ghost Click Detection tool automatically finds phantom key presses and stuck keys. Click "Advanced Options" → Select "👻 Ghost Click Test" → Press "Start Test" → Remove your hands from keyboard → Wait 30-60 seconds. Any ghost clicks or stuck keys will be logged automatically with timestamps. This helps diagnose keyboard hardware issues.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">What causes keyboard ghosting and how do I fix it?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Keyboard ghosting is caused by hardware limitations (anti-ghosting/N-key rollover support), debris under keys, damaged circuits, or worn switches. Fix it by: cleaning your keyboard thoroughly, updating drivers, testing with our ghost detection tool, removing and cleaning problematic keycaps, or upgrading to an anti-ghosting keyboard with N-key rollover technology.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">Why is my keyboard response time slow and how can I improve it?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">High keyboard latency (slow response) can be caused by: wireless connection interference, outdated drivers, USB polling rate settings, CPU load, or old hardware. Improve latency by: using wired connection instead of wireless, updating keyboard drivers, increasing USB polling rate to 1000Hz, closing background programs, or upgrading to a gaming keyboard with lower input lag.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">Does this keyboard tester work for gaming keyboards and mechanical keyboards?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Yes! Our tool works perfectly with all keyboard types: mechanical keyboards (Cherry MX, Gateron, etc.), membrane keyboards, gaming keyboards, laptop keyboards, wireless keyboards, and Bluetooth keyboards. Test latency, detect ghosting, check N-key rollover, measure response time, and verify every key functions properly regardless of your keyboard type.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">How do I test my keyboard without any software installation?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Our online keyboard tester runs entirely in your web browser—no downloads, installations, or accounts required. Simply visit KeyboardTester.click and start pressing keys. Works on Windows, Mac, Linux, Chromebook, and even tablets. All testing happens client-side, protecting your privacy completely.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">What is a good keyboard latency for gaming?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">For competitive gaming, aim for keyboard latency under 5ms (excellent). 5-10ms is good for casual gaming and general use. 10-20ms is fair but may feel sluggish in fast-paced games. Over 20ms is considered poor for gaming. Professional esports players typically use keyboards with 1-3ms latency. Test your keyboard latency free with our online tool.</p>
            </div>
        </div>

        <div class="faq-item" itemscope itemtype="https://schema.org/Question">
            <h3 itemprop="name">Can I test mouse click speed and keyboard simultaneously?</h3>
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text">Yes! We offer separate dedicated tools: our Keyboard Tester (with latency and ghosting detection) for keyboards, and Mouse Click Test for measuring clicks per second (CPS), button testing, and scroll functionality. Both tools are free, online, and require no installation. Test your complete gaming setup performance.</p>
            </div>
        </div>
    </section>

    <!-- Troubleshooting Section -->
    <section class="guide-section">
        <h2>🔧 Keyboard Troubleshooting Guide</h2>
        
        <!-- Troubleshooting Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/maintenance-tips.png'); ?>" alt="Step-by-step keyboard troubleshooting flowchart for common issues" loading="lazy">
        </div>

        <h3>Common Keyboard Problems & Solutions:</h3>
        
        <div class="troubleshooting-grid">
            <div class="trouble-item">
                <h4>🔴 Keys Not Responding</h4>
                <ul>
                    <li>Check cable connection or wireless receiver</li>
                    <li>Test on another computer to isolate issue</li>
                    <li>Update or reinstall keyboard drivers</li>
                    <li>Try different USB port (use USB 2.0, not hub)</li>
                    <li>Boot into BIOS to test hardware level response</li>
                </ul>
            </div>

            <div class="trouble-item">
                <h4>🔴 High Latency / Input Lag</h4>
                <ul>
                    <li>Switch from wireless to wired connection</li>
                    <li>Increase USB polling rate (1000Hz recommended)</li>
                    <li>Update keyboard firmware and drivers</li>
                    <li>Close resource-heavy background programs</li>
                    <li>Test latency with our free online tool</li>
                </ul>
            </div>

            <div class="trouble-item">
                <h4>🔴 Sticky or Repeating Keys</h4>
                <ul>
                    <li>Clean under keycaps with compressed air</li>
                    <li>Remove keycaps and clean with isopropyl alcohol</li>
                    <li>Check for physical damage to switches</li>
                    <li>Disable sticky keys in OS settings</li>
                    <li>Replace faulty switches (mechanical keyboards)</li>
                </ul>
            </div>

            <div class="trouble-item">
                <h4>🔴 Multiple Keys Not Working</h4>
                <ul>
                    <li>Test with our ghosting detection tool</li>
                    <li>Check for liquid damage or debris</li>
                    <li>Verify keyboard is compatible with OS</li>
                    <li>Try keyboard in safe mode</li>
                    <li>Consider professional repair or replacement</li>
                </ul>
            </div>
        </div>

        <h3>Maintenance Tips:</h3>
        <ul class="feature-list">
            <li><strong>Weekly Cleaning:</strong> Use <a href="https://www.amazon.com/s?k=compressed+air+keyboard" target="_blank" rel="noopener">compressed air</a> to remove dust and debris</li>
            <li><strong>Monthly Deep Clean:</strong> Remove keycaps and clean with <a href="https://www.amazon.com/s?k=keyboard+cleaning+kit" target="_blank" rel="noopener">cleaning solution</a></li>
            <li><strong>Quarterly Testing:</strong> Run latency and ghosting tests to catch issues early</li>
            <li><strong>Use Keyboard Cover:</strong> Protect from dust with a <a href="https://www.amazon.com/s?k=keyboard+cover" target="_blank" rel="noopener">silicone cover</a></li>
            <li><strong>Keep Liquids Away:</strong> Prevent spills that cause stuck keys and ghosting</li>
        </ul>
    </section>

    <!-- Additional Tools Section -->
    <section class="guide-section">
        <h2>🚀 Complete Testing Toolkit</h2>
        
        <!-- Tools Ecosystem Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/tools-ecosystem.png'); ?>" alt="Complete ecosystem of free online testing tools for keyboard, mouse, screen, microphone, webcam, and audio" loading="lazy">
            <div class="image-label">Full testing toolkit</div>
        </div>
        
        <p>Optimize your entire computer setup with our free online testing tools:</p>
        
        <div class="tools-grid">
            <div class="tool-card">
                <h3>⌨️ Keyboard Tester</h3>
                <p>Test all keys, measure latency, detect ghosting, check response time</p>
                <a href="<?php echo $pages['home']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>🐭 Mouse Click Tester</h3>
                <p>Test buttons, measure CPS, check scroll, verify all clicks</p>
                <a href="<?php echo $pages['mouse_test']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>⚡ Typing Speed Test</h3>
                <p>Measure WPM, check accuracy, improve typing skills</p>
                <a href="<?php echo $pages['keyboard_typing']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>🖱️ Click Speed Test (CPS)</h3>
                <p>Measure clicks per second for gaming performance</p>
                <a href="<?php echo $pages['click_speed']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>🖥️ Screen Tester</h3>
                <p>Detect dead pixels, test colors, check display quality</p>
                <a href="<?php echo $pages['screen_test']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>🎤 Microphone Test</h3>
                <p>Check audio input, test recording quality</p>
                <a href="<?php echo $pages['mic_test']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>📹 Webcam Test</h3>
                <p>Verify camera functionality, check video quality</p>
                <a href="<?php echo $pages['webcam_test']; ?>">Test Now →</a>
            </div>

            <div class="tool-card">
                <h3>🔊 Audio Test</h3>
                <p>Test speakers, headphones, check sound output</p>
                <a href="<?php echo $pages['headphone_test']; ?>">Test Now →</a>
            </div>
        </div>
    </section>

    <!-- Privacy & Open Source Section -->
    <section class="guide-section">
        <h2>🔒 Privacy & Open Source</h2>
        
        <!-- Privacy Security Image -->
        <div class="guide-image">
            <img src="<?php echo url('images/keyboard/privacy-security.png'); ?>" alt="Privacy shield with lock icon representing 100% browser-based security and zero data collection" loading="lazy">
            <div class="image-label">Privacy and security</div>
        </div>
        
        <p>
            <strong>100% Private & Secure:</strong> All keyboard testing happens entirely in your browser—we don't collect, store, transmit, or track any data. Your key presses, latency measurements, and test results stay completely private. Works offline once loaded.
        </p>
        <p>
            <strong>Open Source:</strong> Our code is publicly available on <a href="https://gitlab.com/nasirazizawan/keyboardtester.click" target="_blank" rel="noopener">GitLab</a>. Developers can review, use, and contribute. We only ask for credit to KeyboardTester.click when using our code.
        </p>
    </section>

    <!-- Call to Action Section -->
    <section class="guide-section cta-section">
        <h2>🚀 Start Testing Your Keyboard Now</h2>
        <p>
            Ready to test your keyboard? Whether you're diagnosing latency issues, detecting ghosting keys, checking for stuck buttons, or just want to verify everything works—our free online tools have you covered. No downloads, no signup, instant results.
        </p>
        <p class="cta-buttons">
            <a href="<?php echo $pages['home']; ?>" class="cta-button primary">Test Keyboard Now</a>
            <a href="<?php echo $pages['mouse_test']; ?>" class="cta-button secondary">Test Mouse</a>
            <a href="<?php echo $pages['keyboard_typing']; ?>" class="cta-button tertiary">Test Typing Speed</a>
        </p>
    </section>

    <!-- Help Section -->
    <section class="guide-section help-section">
        <h2>🆘 Still Need Help?</h2>
        <p>
            Have questions about keyboard latency testing, ghosting detection, or stuck keys? Visit our <a href="<?php echo $pages['about']; ?>">About Us</a> page for more information, check our <a href="<?php echo $pages['privacy']; ?>">Privacy Policy</a> for complete data protection details, or read our <a href="<?php echo $pages['disclaimer']; ?>">Disclaimer</a> for terms of use.
        </p>
        <p><strong>Quick Links:</strong></p>
        <ul class="help-links">
            <li><a href="#keyboard-latency-test">How to Test Keyboard Latency</a></li>
            <li><a href="#ghosting-keys-test">How to Detect Ghosting Keys</a></li>
            <li><a href="#key-press-colors">Understanding Color Codes</a></li>
            <li><a href="https://www.keyboardtester.click/blog">Keyboard Tips & Guides</a></li>
        </ul>
    </section>
</div>

<!-- Enhanced Styles -->
<style>
    /* Guidelines Container */
    .guidelines {
        margin: 40px auto;
        max-width: 1000px;
        padding: 40px;
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        color: #e4e4e7;
        line-height: 1.7;
    }

    /* Typography */
    .guidelines h1 {
        font-size: 2.5rem;
        text-align: center;
        color: #60a5fa;
        margin-bottom: 20px;
        font-weight: 700;
        line-height: 1.2;
    }

    .guidelines h2 {
        font-size: 1.875rem;
        color: #34d399;
        margin-top: 50px;
        margin-bottom: 20px;
        font-weight: 600;
        border-bottom: 2px solid rgba(52, 211, 153, 0.3);
        padding-bottom: 10px;
    }

    .guidelines h3 {
        font-size: 1.5rem;
        color: #60a5fa;
        margin-top: 30px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .guidelines h4 {
        font-size: 1.25rem;
        color: #fbbf24;
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 600;
    }

    .intro-text {
        font-size: 1.125rem;
        text-align: center;
        margin-bottom: 30px;
        line-height: 1.8;
        color: #d1d5db;
    }

    .guidelines p {
        font-size: 1.0625rem;
        line-height: 1.75;
        margin-bottom: 16px;
        color: #d1d5db;
    }

    /* Section Divider */
    .section-divider {
        border: none;
        height: 2px;
        background: linear-gradient(to right, #60a5fa, #34d399);
        margin: 35px 0;
        opacity: 0.6;
    }

    /* Guide Sections */
    .guide-section {
        margin-bottom: 40px;
    }

    /* Image Styling */
    .guide-image {
        margin: 30px 0;
        text-align: center;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        background: rgba(255, 255, 255, 0.02);
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .guide-image:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
    }

    .guide-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        display: block;
        margin: 0 auto;
    }

    .guide-image .image-label {
        margin-top: 10px;
        font-size: 0.85rem;
        color: #a5b4fc;
        font-weight: 600;
    }

    /* Feature Lists */
    .feature-list {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .feature-list li {
        margin-bottom: 14px;
        padding-left: 28px;
        position: relative;
        line-height: 1.7;
    }

    .feature-list li:before {
        content: "✦";
        position: absolute;
        left: 0;
        color: #34d399;
        font-size: 1.2rem;
    }

    .feature-list strong {
        color: #60a5fa;
        font-weight: 600;
    }

    /* Latency Ratings Grid */
    .latency-ratings {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        margin: 25px 0;
    }

    .rating-box {
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid;
        background: rgba(255, 255, 255, 0.03);
        transition: transform 0.3s ease;
    }

    .rating-box:hover {
        transform: translateX(5px);
    }

    .rating-box.excellent {
        border-left-color: #34d399;
        background: rgba(52, 211, 153, 0.05);
    }

    .rating-box.good {
        border-left-color: #60a5fa;
        background: rgba(96, 165, 250, 0.05);
    }

    .rating-box.fair {
        border-left-color: #fbbf24;
        background: rgba(251, 191, 36, 0.05);
    }

    .rating-box.poor {
        border-left-color: #ef4444;
        background: rgba(239, 68, 68, 0.05);
    }

    .rating-label {
        display: block;
        font-weight: 700;
        font-size: 1.125rem;
        margin-bottom: 10px;
    }

    .rating-box p {
        margin: 0;
        font-size: 0.9375rem;
        color: #d1d5db;
    }

    /* Problem Solutions Grid */
    .problem-solutions {
        display: grid;
        gap: 20px;
        margin: 25px 0;
    }

    .problem-item {
        padding: 20px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        border-left: 4px solid #ef4444;
    }

    .problem-item h4 {
        margin-top: 0;
        margin-bottom: 12px;
    }

    .problem-item p {
        margin: 8px 0;
        font-size: 0.9375rem;
    }

    /* Features Grid */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .feature-card {
        padding: 25px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 12px;
        border: 2px solid rgba(96, 165, 250, 0.2);
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        border-color: #60a5fa;
        box-shadow: 0 10px 30px rgba(96, 165, 250, 0.2);
    }

    .feature-card h3 {
        margin-top: 0;
        margin-bottom: 12px;
        font-size: 1.25rem;
    }

    .feature-card p {
        margin: 0;
        font-size: 0.9375rem;
        color: #d1d5db;
    }

    /* Troubleshooting Grid */
    .troubleshooting-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin: 25px 0;
    }

    .trouble-item {
        padding: 20px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        border-left: 4px solid #fbbf24;
    }

    .trouble-item h4 {
        margin-top: 0;
        margin-bottom: 15px;
    }

    .trouble-item ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .trouble-item ul li {
        margin-bottom: 10px;
        padding-left: 20px;
        position: relative;
        font-size: 0.9375rem;
    }

    .trouble-item ul li:before {
        content: "→";
        position: absolute;
        left: 0;
        color: #fbbf24;
    }

    /* Tools Grid */
    .tools-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin: 30px 0;
    }

    .tool-card {
        padding: 25px;
        background: linear-gradient(135deg, rgba(96, 165, 250, 0.1) 0%, rgba(52, 211, 153, 0.05) 100%);
        border-radius: 12px;
        border: 2px solid rgba(96, 165, 250, 0.2);
        transition: all 0.3s ease;
        text-align: center;
    }

    .tool-card:hover {
        transform: translateY(-5px);
        border-color: #34d399;
        box-shadow: 0 10px 30px rgba(52, 211, 153, 0.2);
    }

    .tool-card h3 {
        margin-top: 0;
        margin-bottom: 12px;
        font-size: 1.25rem;
        color: #60a5fa;
    }

    .tool-card p {
        margin: 0 0 15px 0;
        font-size: 0.9375rem;
        color: #d1d5db;
    }

    .tool-card a {
        display: inline-block;
        padding: 10px 20px;
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        color: #ffffff;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .tool-card a:hover {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        transform: scale(1.05);
    }

    /* Color Indicators */
    .color-indicators {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin: 24px 0;
        justify-content: center;
    }

    .color-badge {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9375rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s ease;
    }

    .color-badge:hover {
        transform: translateY(-2px);
    }

    .color-badge.green {
        background: #34d399;
        color: #ffffff;
    }

    .color-badge.yellow {
        background: #fbbf24;
        color: #1f2937;
    }

    .color-badge.orange {
        background: #fb923c;
        color: #ffffff;
    }

    .color-badge.red {
        background: #ef4444;
        color: #ffffff;
    }

    .color-badge.purple {
        background: #a78bfa;
        color: #ffffff;
    }

    /* Color Explanation List */
    .color-explanation {
        list-style: none;
        padding: 0;
        margin: 20px 0;
    }

    .color-explanation li {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        line-height: 1.6;
    }

    .color-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin-right: 12px;
        flex-shrink: 0;
    }

    .color-dot.green { background: #34d399; }
    .color-dot.yellow { background: #fbbf24; }
    .color-dot.orange { background: #fb923c; }
    .color-dot.red { background: #ef4444; }
    .color-dot.purple { background: #a78bfa; }

    /* Links */
    .guidelines a {
        color: #60a5fa;
        text-decoration: none;
        transition: color 0.3s ease;
        font-weight: 500;
    }

    .guidelines a:hover {
        color: #34d399;
        text-decoration: underline;
    }

    .cta-link {
        display: inline-block;
        margin-top: 12px;
        font-size: 1.0625rem;
        font-weight: 600;
    }

    /* FAQ Section */
    .faq-section {
        margin-top: 40px;
    }

    .faq-item {
        margin-bottom: 24px;
        padding: 20px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        border-left: 4px solid #34d399;
    }

    .faq-item h3 {
        margin-top: 0;
        margin-bottom: 12px;
        font-size: 1.125rem;
        color: #e4e4e7;
    }

    .faq-item p {
        margin-bottom: 0;
        color: #d1d5db;
    }

    /* CTA Section */
    .cta-section {
        text-align: center;
        padding: 40px;
        background: linear-gradient(135deg, rgba(96, 165, 250, 0.1) 0%, rgba(52, 211, 153, 0.05) 100%);
        border-radius: 12px;
        margin-top: 50px;
        border: 2px solid rgba(96, 165, 250, 0.2);
    }

    .cta-buttons {
        margin-top: 30px;
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        display: inline-block;
        padding: 14px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.0625rem;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .cta-button.primary {
        background: linear-gradient(135deg, #60a5fa, #3b82f6);
        color: #ffffff;
    }

    .cta-button.primary:hover {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    .cta-button.secondary {
        background: linear-gradient(135deg, #34d399, #10b981);
        color: #ffffff;
    }

    .cta-button.secondary:hover {
        background: linear-gradient(135deg, #10b981, #059669);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    .cta-button.tertiary {
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #1f2937;
    }

    .cta-button.tertiary:hover {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
    }

    /* Help Section */
    .help-section {
        background: rgba(255, 255, 255, 0.03);
        padding: 30px;
        border-radius: 12px;
        margin-top: 40px;
    }

    .help-links {
        list-style: none;
        padding: 0;
        margin: 15px 0 0 0;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 10px;
    }

    .help-links li {
        padding-left: 0;
    }

    .help-links a {
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .guidelines {
            margin: 20px;
            padding: 24px;
        }

        .guidelines h1 {
            font-size: 2rem;
        }

        .guidelines h2 {
            font-size: 1.5rem;
        }

        .color-indicators {
            justify-content: center;
        }

        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }

        .cta-button {
            width: 100%;
            max-width: 280px;
        }

        .guide-image {
            padding: 15px;
            margin: 20px 0;
        }

        .features-grid,
        .tools-grid {
            grid-template-columns: 1fr;
        }

        .latency-ratings,
        .troubleshooting-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Dark Mode Compatibility */
    @media (prefers-color-scheme: light) {
        .guidelines {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
        }

        .guidelines h1 {
            color: #1e40af;
        }

        .guidelines h2 {
            color: #059669;
        }

        .guidelines h3 {
            color: #1e40af;
        }

        .intro-text,
        .guidelines p {
            color: #475569;
        }

        .faq-item,
        .problem-item,
        .trouble-item,
        .feature-card {
            background: rgba(0, 0, 0, 0.03);
        }

        .faq-item h3 {
            color: #1e293b;
        }

        .help-section {
            background: rgba(0, 0, 0, 0.03);
        }

        .guide-image {
            background: rgba(0, 0, 0, 0.02);
        }
    }
</style>

<!-- FAQ Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "How do I test keyboard latency for free online?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Use our free keyboard latency test tool: Click Advanced Options → Select ⚡ Latency Test → Press Start Test → Type any keys. You'll see real-time latency measurements in milliseconds, average response time, and an automatic performance rating after 10 key presses. Professional gaming keyboards typically show 1-5ms latency."
      }
    },
    {
      "@type": "Question",
      "name": "How can I detect ghosting or stuck keys on my keyboard?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Our Ghost Click Detection tool automatically finds phantom key presses and stuck keys. Click Advanced Options → Select 👻 Ghost Click Test → Press Start Test → Remove your hands from keyboard → Wait 30-60 seconds. Any ghost clicks or stuck keys will be logged automatically with timestamps."
      }
    },
    {
      "@type": "Question",
      "name": "What causes keyboard ghosting and how do I fix it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Keyboard ghosting is caused by hardware limitations (anti-ghosting/N-key rollover support), debris under keys, damaged circuits, or worn switches. Fix it by: cleaning your keyboard thoroughly, updating drivers, testing with our ghost detection tool, removing and cleaning problematic keycaps, or upgrading to an anti-ghosting keyboard with N-key rollover technology."
      }
    },
    {
      "@type": "Question",
      "name": "Why is my keyboard response time slow and how can I improve it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "High keyboard latency (slow response) can be caused by: wireless connection interference, outdated drivers, USB polling rate settings, CPU load, or old hardware. Improve latency by: using wired connection instead of wireless, updating keyboard drivers, increasing USB polling rate to 1000Hz, closing background programs, or upgrading to a gaming keyboard with lower input lag."
      }
    },
    {
      "@type": "Question",
      "name": "Does this keyboard tester work for gaming keyboards and mechanical keyboards?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes! Our tool works perfectly with all keyboard types: mechanical keyboards (Cherry MX, Gateron, etc.), membrane keyboards, gaming keyboards, laptop keyboards, wireless keyboards, and Bluetooth keyboards. Test latency, detect ghosting, check N-key rollover, measure response time, and verify every key functions properly regardless of your keyboard type."
      }
    },
    {
      "@type": "Question",
      "name": "What is a good keyboard latency for gaming?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "For competitive gaming, aim for keyboard latency under 5ms (excellent). 5-10ms is good for casual gaming and general use. 10-20ms is fair but may feel sluggish in fast-paced games. Over 20ms is considered poor for gaming. Professional esports players typically use keyboards with 1-3ms latency. Test your keyboard latency free with our online tool."
      }
    }
  ]
}
</script>

<?php
echo ob_get_clean();
?>
