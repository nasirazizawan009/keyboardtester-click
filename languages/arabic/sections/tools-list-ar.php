<?php
/**
 * Tools List Component
 * Localized (ar) - Updated with Arabic tool links
 */
if (!function_exists('url')) {
    require_once __DIR__ . '/../../../config.php';
}
?>

<section class="tools-list-section tools-list-ar" id="tools" aria-labelledby="tools-hub-title" dir="rtl">
    <div class="container">
        <h2 id="tools-hub-title">المزيد من أدوات الاختبار</h2>
        <p class="section-subtitle">استكشف مجموعة كاملة لاختبار لوحة المفاتيح والماوس والصوت والأدوات المساعدة.</p>
        <p class="language-note">جميع الأدوات متاحة بواجهة عربية كاملة.</p>

        <div class="tools-grid">
            <a href="<?php echo url('languages/arabic/'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="2" y="6" width="20" height="12" rx="2"/>
                                    <path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/>
                                    <path d="M6 13h1M9 13h1M12 13h6"/>
                                    <path d="M6 16h8"/>
                                </svg>
                            </div>
                <h3>اختبار لوحة المفاتيح</h3>
                <p>اختبر وظائف لوحة المفاتيح، اكتشف الأشباح، قس زمن الاستجابة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/mouse-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M9 7h6"/>
                                    <path d="M6 12v4a6 6 0 0 0 12 0v-4"/>
                                </svg>
                            </div>
                <h3>اختبار الماوس</h3>
                <p>تحقق من أزرار الماوس وعجلة التمرير وحركة المؤشر والاستجابة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/click-speed.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/>
                                </svg>
                            </div>
                <h3>اختبار سرعة النقر</h3>
                <p>قِس سرعة النقر (نقرات في الدقيقة أو الثانية) عبر اختبارات مؤقتة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/dpi-tester.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <circle cx="12" cy="12" r="3"/>
                                    <path d="M12 4v2M12 18v2M4 12h2M18 12h2"/>
                                </svg>
                            </div>
                <h3>حساسية الماوس / DPI</h3>
                <p>اختبر DPI والحساسية ودقة التتبع</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/ghost-click.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/>
                                    <circle cx="10" cy="10" r="1"/>
                                    <circle cx="14" cy="10" r="1"/>
                                </svg>
                            </div>
                <h3>كاشف النقرات الوهمية</h3>
                <p>اكتشف النقرات غير المقصودة أو الوهمية</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/typing-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 6h16"/>
                                    <path d="M7 10h10"/>
                                    <path d="M9 14h6"/>
                                    <path d="M11 18h2"/>
                                </svg>
                            </div>
                <h3>اختبار سرعة الكتابة</h3>
                <p>قِس عدد الكلمات في الدقيقة والدقة واتساق الكتابة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/screen-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="5" width="18" height="12" rx="2"/>
                                    <path d="M8 21h8"/>
                                    <path d="M12 17v4"/>
                                </svg>
                            </div>
                <h3>اختبار الشاشة</h3>
                <p>اكتشف البكسلات الميتة أو العالقة أو الساخنة على الشاشات</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/mic-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="9" y="2" width="6" height="10" rx="3"/>
                                    <path d="M5 11a7 7 0 0 0 14 0"/>
                                    <path d="M12 18v4"/>
                                    <path d="M8 22h8"/>
                                </svg>
                            </div>
                <h3>اختبار الميكروفون</h3>
                <p>تحقق من إدخال الميكروفون ومستويات الصوت</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/mouse-trail.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 18c4-6 8-8 16-10"/>
                                    <circle cx="6" cy="16" r="1"/>
                                    <circle cx="10" cy="13" r="1"/>
                                    <circle cx="14" cy="11" r="1"/>
                                </svg>
                            </div>
                <h3>مسار الماوس</h3>
                <p>تصور مسارات حركة الماوس والدقة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/latency-checker.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8"/>
                                    <path d="M12 8v5l3 2"/>
                                </svg>
                            </div>
                <h3>فاحص زمن الاستجابة</h3>
                <p>اختبر زمن استجابة الجهاز والإدخال في متصفحك</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/webcam-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="7" width="14" height="10" rx="2"/>
                                    <path d="M17 10l4-3v10l-4-3"/>
                                </svg>
                            </div>
                <h3>اختبار كاميرا الويب</h3>
                <p>تحقق من جودة كاميرا الويب والدقة واللقطات</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/headphone-test.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 12a8 8 0 0 1 16 0"/>
                                    <rect x="3" y="12" width="4" height="7" rx="2"/>
                                    <rect x="17" y="12" width="4" height="7" rx="2"/>
                                </svg>
                            </div>
                <h3>اختبار السماعات / مكبر الصوت</h3>
                <p>اختبر قنوات الاستيريو وإخراج الصوت</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/ocr-tool.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 7V4h3"/>
                                    <path d="M20 7V4h-3"/>
                                    <path d="M4 17v3h3"/>
                                    <path d="M20 17v3h-3"/>
                                    <path d="M8 12h8"/>
                                    <path d="M10 9h4"/>
                                    <path d="M10 15h4"/>
                                </svg>
                            </div>
                <h3>أداة OCR</h3>
                <p>استخرج النص من الصور بسرعة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/qr-reader.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M15 15h6v6h-6z"/>
                                    <path d="M12 12h2"/>
                                    <path d="M12 8h2"/>
                                    <path d="M8 12h2"/>
                                </svg>
                            </div>
                <h3>قارئ رمز QR</h3>
                <p>امسح رموز QR بالكاميرا أو برفع صورة</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/qr-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="6" height="6"/>
                                    <rect x="15" y="3" width="6" height="6"/>
                                    <rect x="3" y="15" width="6" height="6"/>
                                    <path d="M14 14h7v7h-7z"/>
                                    <path d="M9 9h6"/>
                                </svg>
                            </div>
                <h3>مولد رمز QR</h3>
                <p>أنشئ رموز QR مخصصة فورًا</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
            <a href="<?php echo url('languages/arabic/password-generator.php'); ?>" class="tool-card">
            <div class="tool-card-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24">
                                    <rect x="5" y="10" width="14" height="10" rx="2"/>
                                    <path d="M8 10V7a4 4 0 0 1 8 0v3"/>
                                    <circle cx="12" cy="15" r="1.5"/>
                                </svg>
                            </div>
                <h3>مولد كلمات المرور</h3>
                <p>أنشئ كلمات مرور قوية وآمنة فورًا</p>
                <span class="tool-card-link">افتح الأداة</span>
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../../../includes/components/tools-list-styles.php'; ?>
