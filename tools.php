<?php
// tools.php - Optimized version with better SEO and natural language

// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
}

// Define the tools data with natural, benefit-focused descriptions
$tools = [
    [
        "name" => "Keyboard Tester",
        "description" => "Test every key on your keyboard instantly. Perfect for diagnosing stuck keys, checking new keyboards, or verifying repairs. Works with all keyboard types.",
        "category" => "keyboard",
        "link" => $pages['home'],
        "icon" => "⌨️"
    ],
    [
        "name" => "Arabic Keyboard Tester",
        "description" => "Test Arabic keyboard layout and key response with an Arabic-first interface. Ideal for verifying Arabic key mapping and input.",
        "category" => "keyboard",
        "link" => url('languages/arabic/'),
        "icon" => "??????"
    ],
    [
        "name" => "Mouse Tester",
        "description" => "Check all mouse buttons and scroll wheel functionality. Detect issues with left, right, and middle clicks plus side buttons.",
        "category" => "mouse",
        "link" => $pages['mouse_test'],
        "icon" => "🖱️"
    ],
    [
        "name" => "Click Speed Test",
        "description" => "Measure your clicking speed in clicks per second (CPS). Challenge yourself and track improvements over time. Great for gamers.",
        "category" => "mouse",
        "link" => $pages['click_speed'],
        "icon" => "⚡"
    ],
    [
        "name" => "Ghost Click Detector",
        "description" => "Detect unwanted double-clicks and phantom clicks. Essential for identifying mouse hardware issues before they affect your work or gaming.",
        "category" => "mouse",
        "link" => $pages['ghost_click'],
        "icon" => "👻"
    ],
    [
        "name" => "Mouse DPI Tester",
        "description" => "Test and adjust your mouse sensitivity settings. Find your ideal DPI for gaming, design work, or everyday use.",
        "category" => "mouse",
        "link" => $pages['dpi_tester'],
        "icon" => "🎯"
    ],
    [
        "name" => "Typing Speed Test",
        "description" => "Measure your typing speed in words per minute (WPM). Track accuracy, identify weak keys, and improve your typing skills.",
        "category" => "keyboard",
        "link" => $pages['keyboard_typing'],
        "icon" => "⚡"
    ],
    [
        "name" => "Keyboard Latency Checker",
        "description" => "Check your keyboard's response time and input lag. Critical for competitive gaming and fast-paced work.",
        "category" => "keyboard",
        "link" => $pages['latency_check'],
        "icon" => "⏱️"
    ],
    [
        "name" => "Screen Tester",
        "description" => "Test your monitor for dead pixels, color accuracy, and display uniformity. Essential when buying new screens or troubleshooting issues.",
        "category" => "screen",
        "link" => $pages['screen_test'],
        "icon" => "🖥️"
    ],
    [
        "name" => "Microphone Tester",
        "description" => "Test your mic quality, adjust volume levels, and fix audio issues. Record samples to check clarity before important calls or streams.",
        "category" => "audio",
        "link" => $pages['mic_test'],
        "icon" => "🎤"
    ],
    [
        "name" => "Headphone & Speaker Tester",
        "description" => "Test audio channels, frequency response, and stereo balance. Check left/right channels, bass, treble, and sound quality instantly.",
        "category" => "audio",
        "link" => $pages['headphone_test'],
        "icon" => "🎧"
    ],
    [
        "name" => "Webcam Tester",
        "description" => "Check your camera's video quality, take test snapshots, and switch between multiple cameras. Verify everything works before meetings.",
        "category" => "camera",
        "link" => $pages['webcam_test'],
        "icon" => "📹"
    ],
    [
        "name" => "QR Code Generator",
        "description" => "Create custom QR codes for URLs, text, WiFi credentials, or contact info. Download instantly or share directly.",
        "category" => "utility",
        "link" => $pages['qr_generator'],
        "icon" => "📱"
    ],
    [
        "name" => "OCR Text Extractor",
        "description" => "Extract text from images instantly. Convert scanned documents, screenshots, or photos into editable text with high accuracy.",
        "category" => "utility",
        "link" => $pages['ocr_tool'],
        "icon" => "📄"
    ],
    [
        "name" => "WhatsApp Link Generator",
        "description" => "Create direct WhatsApp chat links without saving contacts. Perfect for customer support, marketing, or quick communication.",
        "category" => "whatsapp",
        "link" => $pages['whatsapp_link'],
        "icon" => "💬"
    ],
    [
        "name" => "WhatsApp QR Creator",
        "description" => "Generate WhatsApp chat links and QR codes for your business. Let customers contact you instantly by scanning.",
        "category" => "whatsapp",
        "link" => $pages['whatsapp_brand'],
        "icon" => "📲"
    ],
    [
        "name" => "QR Code Scanner",
        "description" => "Scan and decode QR codes using your camera. Extract URLs, text, and contact information from any QR code.",
        "category" => "utility",
        "link" => $pages['qr_reader'],
        "icon" => "🔍"
    ],
    [
        "name" => "Password Generator",
        "description" => "Create strong, secure passwords with customizable length and character types. Improve your online security instantly.",
        "category" => "utility",
        "link" => $pages['password_gen'],
        "icon" => "🔐"
    ],
    [
        "name" => "Emoji Trail Game",
        "description" => "Fun interactive game where your mouse creates colorful emoji trails. Collect points and enjoy a creative break.",
        "category" => "game",
        "link" => url('mouse-trail-index.php'),
        "icon" => "🎮"
    ],
    [
        "name" => "Lucky Name Wheel",
        "description" => "Spin the wheel to randomly pick names or make decisions. Features auto-elimination rounds and exportable results.",
        "category" => "utility",
        "link" => $pages['lucky_wheel'],
        "icon" => "🎯"
    ]
];

// Categories for tabs (reorganized for better UX)
$categories = [
    "all" => ["name" => "All Tools", "icon" => "🚀"],
    "keyboard" => ["name" => "Keyboard", "icon" => "⌨️"],
    "mouse" => ["name" => "Mouse", "icon" => "🖱️"],
    "screen" => ["name" => "Screen", "icon" => "🖥️"],
    "audio" => ["name" => "Audio", "icon" => "🎵"],
    "camera" => ["name" => "Camera", "icon" => "📹"],
    "whatsapp" => ["name" => "WhatsApp", "icon" => "💬"],
    "utility" => ["name" => "Utilities", "icon" => "🔧"],
    "game" => ["name" => "Games", "icon" => "🎮"]
];
?>

<section class="tools-section" id="tools">
    <h2 class="tools-heading">Free Testing Tools & Utilities</h2>
    <p class="tools-subheading">
        Choose from 20 professional-grade tools to test your devices, boost productivity, and solve everyday tech challenges—all completely free!
    </p>

    <!-- Category Tabs -->
    <div class="tab-container">
        <?php foreach ($categories as $key => $category): ?>
            <button class="tab <?php echo $key === 'all' ? 'active' : ''; ?>" 
                    data-category="<?php echo $key; ?>"
                    aria-label="Filter by <?php echo $category['name']; ?>">
                <span class="tab-icon"><?php echo $category['icon']; ?></span>
                <span class="tab-text"><?php echo $category['name']; ?></span>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Tools Grid for Each Category -->
    <?php foreach (array_keys($categories) as $categoryKey): ?>
        <div class="tools-grid <?php echo $categoryKey === 'all' ? 'active' : ''; ?>" 
             data-category="<?php echo $categoryKey; ?>">
            <?php 
            $toolNumber = 1;
            foreach ($tools as $tool): 
                if ($categoryKey === 'all' || $tool['category'] === $categoryKey): 
            ?>
                <article class="tool-card" 
                         data-category="<?php echo $tool['category']; ?>"
                         itemscope 
                         itemtype="https://schema.org/SoftwareApplication">
                    <div class="tool-number"><?php echo $toolNumber++; ?></div>
                    
                    <h3 class="tool-name" itemprop="name">
                        <a href="<?php echo $tool['link']; ?>" 
                           itemprop="url"
                           aria-label="Open <?php echo htmlspecialchars($tool['name']); ?>">
                            <?php echo $tool['icon']; ?> <?php echo htmlspecialchars($tool['name']); ?>
                        </a>
                    </h3>
                    
                    <p class="tool-description" itemprop="description">
                        <?php echo htmlspecialchars($tool['description']); ?>
                    </p>

                    <meta itemprop="applicationCategory" content="UtilityApplication">
                    <meta itemprop="operatingSystem" content="Web Browser">
                    <div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                        <meta itemprop="price" content="0">
                        <meta itemprop="priceCurrency" content="USD">
                    </div>
                </article>
            <?php 
                endif;
            endforeach; 
            ?>
        </div>
    <?php endforeach; ?>
</section>

<style>
    /* Tools Section Container */
    .tools-section {
        max-width: 1200px;
        margin: 60px auto;
        padding: 50px 24px;
        background: rgba(248, 250, 252, 0.85);
        border-radius: 24px;
        border: 1px solid rgba(148, 163, 184, 0.25);
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.12);
        backdrop-filter: blur(12px);
    }

    html.dark-theme .tools-section,
    [data-theme="dark"] .tools-section {
        background: rgba(15, 23, 42, 0.85);
        border-color: rgba(148, 163, 184, 0.2);
    }

    /* Section Heading */
    .tools-heading {
        font-size: clamp(1.8rem, 2.8vw, 2.5rem);
        text-align: center;
        color: #0f172a;
        margin-bottom: 16px;
        font-weight: 700;
        line-height: 1.2;
    }

    html.dark-theme .tools-heading,
    [data-theme="dark"] .tools-heading {
        color: #e2e8f0;
    }

    .tools-subheading {
        font-size: 1.05rem;
        text-align: center;
        color: #475569;
        margin-bottom: 40px;
        line-height: 1.6;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .tools-subheading {
        color: #475569;
    }

    html.dark-theme .tools-subheading,
    [data-theme="dark"] .tools-subheading {
        color: #cbd5e1;
    }

    /* Tab Container */
    .tab-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-bottom: 40px;
        padding: 0 10px;
    }

    /* Tab Buttons */
    .tab {
        background: rgba(15, 23, 42, 0.04);
        color: #0f172a;
        padding: 12px 20px;
        border: 1px solid rgba(148, 163, 184, 0.25);
        border-radius: 12px;
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 6px 12px rgba(15, 23, 42, 0.08);
    }

    html.dark-theme .tab,
    [data-theme="dark"] .tab {
        background: rgba(148, 163, 184, 0.12);
        color: #e2e8f0;
        border-color: rgba(148, 163, 184, 0.2);
    }

    .tab:hover {
        transform: translateY(-2px);
        background: rgba(56, 189, 248, 0.12);
        box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12);
    }

    .tab.active {
        background: linear-gradient(135deg, #38bdf8, #0ea5e9);
        color: #0f172a;
        border-color: rgba(14, 165, 233, 0.6);
        box-shadow: 0 8px 20px rgba(14, 165, 233, 0.35);
    }

    .tab-icon {
        font-size: 1.25rem;
    }

    /* Tools Grid */
    .tools-grid {
        display: none;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding: 20px 0;
        animation: fadeIn 0.4s ease-out;
    }

    .tools-grid.active {
        display: grid;
    }

    @keyframes fadeIn {
        from { 
            opacity: 0; 
            transform: translateY(10px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
    }

    /* Tool Cards */
    .tool-card {
        background: #ffffff;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.12);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(148, 163, 184, 0.2);
        display: flex;
        flex-direction: column;
        min-height: 200px;
    }

    html.dark-theme .tool-card,
    [data-theme="dark"] .tool-card {
        background: #0f172a;
        border-color: rgba(148, 163, 184, 0.2);
    }

    .tool-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.16);
        border-color: rgba(56, 189, 248, 0.45);
    }

    /* Tool Number Badge */
    .tool-number {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(56, 189, 248, 0.15);
        color: #0284c7;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1rem;
        border: 2px solid rgba(56, 189, 248, 0.3);
        z-index: 1;
    }

    /* Tool Name */
    .tool-name {
        font-size: 1.25rem;
        margin: 0 0 12px 0;
        font-weight: 600;
        padding-right: 50px; /* Prevent overlap with number badge */
    }

    .tool-name a {
        color: #0f172a;
        text-decoration: none;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    html.dark-theme .tool-name a,
    [data-theme="dark"] .tool-name a {
        color: #e2e8f0;
    }

    .tool-name a:hover {
        color: #0284c7;
    }

    /* Tool Description */
    .tool-description {
        font-size: 0.9375rem;
        color: #334155;
        line-height: 1.6;
        margin: 0;
        flex-grow: 1;
        font-weight: 500;
    }

    html.dark-theme .tool-description,
    [data-theme="dark"] .tool-description {
        color: #cbd5e1;
    }

    /* Category-specific accent colors */
    .tool-card[data-category="keyboard"] .tool-number { 
        background: rgba(139, 92, 246, 0.2); 
        color: #a78bfa; 
        border-color: rgba(139, 92, 246, 0.3); 
    }
    .tool-card[data-category="keyboard"]:hover { border-color: rgba(139, 92, 246, 0.5); }

    .tool-card[data-category="mouse"] .tool-number { 
        background: rgba(20, 184, 166, 0.2); 
        color: #5eead4; 
        border-color: rgba(20, 184, 166, 0.3); 
    }
    .tool-card[data-category="mouse"]:hover { border-color: rgba(20, 184, 166, 0.5); }

    .tool-card[data-category="screen"] .tool-number { 
        background: rgba(59, 130, 246, 0.2); 
        color: #60a5fa; 
        border-color: rgba(59, 130, 246, 0.3); 
    }
    .tool-card[data-category="screen"]:hover { border-color: rgba(59, 130, 246, 0.5); }

    .tool-card[data-category="audio"] .tool-number { 
        background: rgba(239, 68, 68, 0.2); 
        color: #f87171; 
        border-color: rgba(239, 68, 68, 0.3); 
    }
    .tool-card[data-category="audio"]:hover { border-color: rgba(239, 68, 68, 0.5); }

    .tool-card[data-category="camera"] .tool-number { 
        background: rgba(168, 85, 247, 0.2); 
        color: #c084fc; 
        border-color: rgba(168, 85, 247, 0.3); 
    }
    .tool-card[data-category="camera"]:hover { border-color: rgba(168, 85, 247, 0.5); }

    .tool-card[data-category="whatsapp"] .tool-number { 
        background: rgba(34, 197, 94, 0.2); 
        color: #4ade80; 
        border-color: rgba(34, 197, 94, 0.3); 
    }
    .tool-card[data-category="whatsapp"]:hover { border-color: rgba(34, 197, 94, 0.5); }

    .tool-card[data-category="utility"] .tool-number { 
        background: rgba(234, 179, 8, 0.2); 
        color: #facc15; 
        border-color: rgba(234, 179, 8, 0.3); 
    }
    .tool-card[data-category="utility"]:hover { border-color: rgba(234, 179, 8, 0.5); }

    .tool-card[data-category="game"] .tool-number { 
        background: rgba(236, 72, 153, 0.2); 
        color: #f472b6; 
        border-color: rgba(236, 72, 153, 0.3); 
    }
    .tool-card[data-category="game"]:hover { border-color: rgba(236, 72, 153, 0.5); }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tools-section {
            padding: 30px 15px;
            margin: 30px 10px;
        }

        .tools-heading {
            font-size: 2rem;
        }

        .tools-subheading {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .tab-container {
            gap: 8px;
        }

        .tab {
            padding: 10px 16px;
            font-size: 0.875rem;
        }

        .tab-text {
            display: none;
        }

        .tab-icon {
            font-size: 1.5rem;
        }

        .tools-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .tool-card {
            padding: 20px;
            min-height: 180px;
        }

        .tool-number {
            width: 32px;
            height: 32px;
            font-size: 0.875rem;
            top: 10px;
            right: 10px;
        }

        .tool-name {
            font-size: 1.125rem;
            padding-right: 45px;
        }

        .tool-description {
            font-size: 0.875rem;
        }
    }

    /* Accessibility */
    .tab:focus,
    .tool-name a:focus {
        outline: 2px solid #60a5fa;
        outline-offset: 2px;
    }

    /* Print Styles */
    @media print {
        .tab-container {
            display: none;
        }
        
        .tools-grid {
            display: grid !important;
        }
        
        .tool-card {
            break-inside: avoid;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab');
        const grids = document.querySelectorAll('.tools-grid');

        tabs.forEach(tab => {
            tab.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                tab.classList.add('active');

                // Get selected category
                const category = tab.getAttribute('data-category');
                
                // Show/hide appropriate grids
                grids.forEach(grid => {
                    if (grid.getAttribute('data-category') === category) {
                        grid.classList.add('active');
                    } else {
                        grid.classList.remove('active');
                    }
                });

                // Smooth scroll to tools section on mobile
                if (window.innerWidth <= 768) {
                    setTimeout(() => {
                        document.querySelector('.tools-grid.active').scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'nearest' 
                        });
                    }, 100);
                }
            });
        });

        // Add keyboard navigation
        tabs.forEach((tab, index) => {
            tab.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowRight') {
                    e.preventDefault();
                    tabs[(index + 1) % tabs.length].focus();
                    tabs[(index + 1) % tabs.length].click();
                } else if (e.key === 'ArrowLeft') {
                    e.preventDefault();
                    tabs[(index - 1 + tabs.length) % tabs.length].focus();
                    tabs[(index - 1 + tabs.length) % tabs.length].click();
                }
            });
        });
    });
</script>