<?php
ob_start();

// Include config if not already included
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
}
?>

<div class="language-selection" id="language-selection" style="margin: 20px auto; max-width: 700px; padding: 15px; background: linear-gradient(135deg, #1e3a8a, #3b82f6); border-radius: 10px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); color: #ffffff;">
    <!-- Language Selection -->
    <h2 style="color: #ffffff; font-size: 1.4rem; text-align: center; margin: 15px 0; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); font-weight: 600;">🌍 Test Your Keyboard in Your Language</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center;">
        <a href="<?php echo $keyboardLanguages['ar']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #10b981; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/arabic_flag.svg'); ?>" alt="Arabic Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> العربية
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['de']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #8b5cf6; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/german_flag.svg'); ?>" alt="German Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> Deutsch
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['ru']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #22c55e; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/russian_flag.svg'); ?>" alt="Russian Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> Русский
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['es']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #3b82f6; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/spanish_flag.svg'); ?>" alt="Spanish Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> Español
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['pt']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #f59e0b; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/Portugal_flag.svg'); ?>" alt="Portuguese Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> Português
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['fr']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #ef4444; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/french_flag.svg'); ?>" alt="French Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> Français
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['ja']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #ec4899; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/japan_flag.svg'); ?>" alt="Japanese Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> 日本語
            </span>
        </a>
        <a href="<?php echo $keyboardLanguages['ko']['url']; ?>" style="text-decoration: none;">
            <span style="padding: 6px 12px; background: #eab308; color: #fff; border-radius: 6px; font-size: 0.85rem; font-weight: 500; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s, background 0.3s, box-shadow 0.3s; display: inline-flex; align-items: center; min-width: 90px; justify-content: center;">
                <img src="<?php echo url('flags/korean_flag.svg'); ?>" alt="Korean Flag" style="vertical-align: middle; width: 18px; height: 13px; margin-right: 6px;"> 한국어
            </span>
        </a>
    </div>
</div>

<style>
    /* Language Selection Section Styles */
    .language-selection {
        margin: 20px auto;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        display: block;
    }

    /* Hover Effects for Language Buttons */
    .language-selection a:hover span {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        filter: brightness(1.2);
    }

    /* Responsive Design */
    @media (max-width: 600px) {
        .language-selection {
            margin: 10px;
            padding: 12px;
        }
        .language-selection h2 {
            font-size: 1.1rem;
            margin: 10px 0;
        }
        .language-selection a span {
            padding: 5px 10px;
            font-size: 0.75rem;
            min-width: 80px;
        }
        .language-selection a img {
            width: 16px;
            height: 12px;
            margin-right: 5px;
        }
    }
</style>

<?php
echo ob_get_clean();
?>