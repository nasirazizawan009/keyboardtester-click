<?php
/**
 * Arabic Keyboard Tester - Hero Section
 * Matches the English version layout exactly
 */
?>

<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker">أداة تشخيص لوحة المفاتيح</p>
            <h1 class="hero-title">اختبر كل مفتاح بملاحظات فورية في ثوانٍ</h1>
            <p class="hero-lede">تمييز فوري للمفاتيح، تبديل التخطيطات، فحص الأشباح، وتقارير قابلة للتصدير. بدون تثبيت. بدون تسجيل.</p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="#keyboard-tester">ابدأ اختبار لوحة المفاتيح</a>
                <a class="landing-btn landing-btn-ghost" href="#tools">تصفح جميع الأدوات</a>
            </div>
            <div class="hero-badges">
                <span class="hero-badge">بدون تثبيت</span>
                <span class="hero-badge">تخطيطات متعددة</span>
                <span class="hero-badge">خصوصية تامة</span>
            </div>
            <div class="hero-metrics">
                <div class="metric-card">
                    <span class="metric-value">104+</span>
                    <span class="metric-label">مفتاح مدعوم</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">5</span>
                    <span class="metric-label">سمات مدمجة</span>
                </div>
                <div class="metric-card">
                    <span class="metric-value">2</span>
                    <span class="metric-label">أنظمة تشغيل</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <picture>
                    <source type="image/webp" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.webp'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.webp'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <source type="image/png" srcset="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?> 900w, <?php echo url('images/keyboard/hero-keyboard-test-1400.png'); ?> 1400w" sizes="(max-width: 980px) 92vw, 520px">
                    <img src="<?php echo url('images/keyboard/hero-keyboard-test-900.png'); ?>" width="900" height="600" alt="واجهة اختبار لوحة المفاتيح العربية" loading="eager" decoding="async" fetchpriority="high">
                </picture>
            </div>
            <div class="hero-stack">
                <div class="mini-card">
                    <div class="mini-title">تشخيص مباشر</div>
                    <p>شاهد ضغطات المفاتيح، كثافة الخريطة الحرارية، وزمن الاستجابة في الوقت الفعلي.</p>
                </div>
                <div class="mini-card">
                    <div class="mini-title">مبدل التخطيط</div>
                    <p>بدّل التخطيطات وعلامات نظام التشغيل دون فقدان جلستك.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tool Stage -->
<section class="tool-stage" aria-labelledby="tool-stage-title-ar">
    <div class="container tool-stage-header">
        <div>
            <p class="section-kicker">الأداة الرئيسية</p>
            <h2 id="tool-stage-title-ar">اختبار لوحة المفاتيح</h2>
            <p class="section-lede">استخدم الأداة أدناه لاختبار كل مفتاح، والتحقق من التخطيطات، وقياس زمن الاستجابة.</p>
        </div>
        <div class="tool-stage-actions">
            <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح السريعة</a>
        </div>
    </div>
    <div class="tool-shell">
        <?php include __DIR__ . '/tool.php'; ?>
    </div>
</section>

<!-- Trust Strip -->
<section class="trust-strip" aria-label="المزايا الرئيسية">
    <div class="container trust-grid">
        <div class="trust-item">
            <div class="trust-title">بدون تثبيت</div>
            <div class="trust-desc">يعمل بالكامل في متصفحك</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">دعم التخطيطات</div>
            <div class="trust-desc">QWERTY، AZERTY، Colemak، Dvorak</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">تشخيص مباشر</div>
            <div class="trust-desc">بيانات المفاتيح والخريطة الحرارية وزمن الاستجابة فوراً</div>
        </div>
        <div class="trust-item">
            <div class="trust-title">خصوصية أولاً</div>
            <div class="trust-desc">لا تغادر بياناتك جهازك</div>
        </div>
    </div>
</section>

<!-- Feature Band -->
<section class="feature-band" aria-labelledby="feature-title-ar">
    <div class="container">
        <div class="section-head">
            <p class="section-kicker">مصمم للتشخيص السريع</p>
            <h2 id="feature-title-ar">كل ما تحتاجه للتحقق من لوحة المفاتيح</h2>
            <p class="section-lede">مجموعة أدوات مركزة للفحوصات اليومية، تذاكر الدعم، واستكشاف أخطاء الأجهزة.</p>
        </div>
        <div class="landing-feature-grid">
            <article class="landing-feature-card">
                <h3>خريطة المفاتيح المباشرة</h3>
                <p>شاهد كل ضغطة تُبرز فوراً مع ملاحظات الألوان وسجل المفاتيح.</p>
            </article>
            <article class="landing-feature-card">
                <h3>الأشباح وزمن الاستجابة</h3>
                <p>قس وقت الاستجابة واكتشف المدخلات الوهمية باستخدام الأدوات المدمجة.</p>
            </article>
            <article class="landing-feature-card">
                <h3>دعم الأجهزة المتعددة</h3>
                <p>بدّل التخطيطات وعلامات نظام التشغيل أثناء التنقل دون مغادرة الصفحة.</p>
            </article>
            <article class="landing-feature-card">
                <h3>نتائج قابلة للتصدير</h3>
                <p>احفظ تقرير الجلسة لملاحظات ضمان الجودة أو وثائق الدعم.</p>
            </article>
        </div>
    </div>
</section>

<!-- Process Band with 3 Images -->
<section class="process-band" aria-labelledby="process-title-ar">
    <div class="container">
        <div class="section-head split">
            <div>
                <p class="section-kicker">سير عمل بسيط</p>
                <h2 id="process-title-ar">ثلاث خطوات للتحقق من لوحة المفاتيح</h2>
            </div>
            <p class="section-lede">قم بفحص كامل في أقل من دقيقة وصدّر النتائج إذا لزم الأمر.</p>
        </div>
        <div class="process-grid">
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/Press-any-key-512.webp'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.webp'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/Press-any-key-512.png'); ?> 512w, <?php echo url('images/keyboard/Press-any-key-768.png'); ?> 768w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/Press-any-key-512.png'); ?>" width="512" height="768" alt="اضغط أي مفتاح لبدء اختبار لوحة المفاتيح" loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">01</div>
                    <h3>اضغط أي مفتاح</h3>
                    <p>ابدأ الكتابة وشاهد خريطة المفاتيح تستجيب في الوقت الفعلي.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/special-keys-layout-640.webp'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?> 640w, <?php echo url('images/keyboard/special-keys-layout-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/special-keys-layout-640.png'); ?>" width="640" height="426" alt="المفاتيح الخاصة وتخطيط لوحة المفاتيح" loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">02</div>
                    <h3>راجع التحليلات</h3>
                    <p>افتح الخيارات المتقدمة للخريطة الحرارية والإحصائيات وفحص الأشباح.</p>
                </div>
            </article>
            <article class="process-card">
                <div class="process-media">
                    <picture>
                        <source type="image/webp" srcset="<?php echo url('images/keyboard/color-system-guide-640.webp'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.webp'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <source type="image/png" srcset="<?php echo url('images/keyboard/color-system-guide-640.png'); ?> 640w, <?php echo url('images/keyboard/color-system-guide-960.png'); ?> 960w" sizes="(max-width: 900px) 90vw, 320px">
                        <img src="<?php echo url('images/keyboard/color-system-guide-640.png'); ?>" width="640" height="426" alt="نظام الألوان ونتائج الاختبار القابلة للتصدير" loading="lazy" decoding="async">
                    </picture>
                </div>
                <div class="process-body">
                    <div class="step-number">03</div>
                    <h3>صدّر الجلسة</h3>
                    <p>حمّل تقريراً للحفاظ على تشخيصاتك منظمة.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebApplication",
  "name": "اختبار لوحة المفاتيح العربية",
  "description": "أداة مجانية لاختبار لوحة المفاتيح العربية عبر الإنترنت",
  "url": "<?php echo url('languages/arabic/'); ?>",
  "applicationCategory": "UtilityApplication",
  "operatingSystem": "Any",
  "offers": {
    "@type": "Offer",
    "price": "0",
    "priceCurrency": "USD"
  },
  "inLanguage": "ar"
}
</script>

<style>
/* RTL Overrides for Landing Sections */
.arabic-page .landing-hero,
.arabic-page .trust-strip,
.arabic-page .feature-band,
.arabic-page .process-band,
.arabic-page .tool-stage {
    direction: rtl;
    text-align: right;
}

.arabic-page .landing-hero-grid {
    direction: rtl;
}

.arabic-page .hero-copy {
    order: 2;
}

.arabic-page .hero-visual {
    order: 1;
}

.arabic-page .section-head.split {
    direction: rtl;
}

.arabic-page .process-body {
    text-align: right;
}

.arabic-page .tool-stage-header {
    direction: rtl;
}

/* Ensure proper RTL for metrics and badges */
.arabic-page .hero-metrics,
.arabic-page .hero-badges,
.arabic-page .hero-actions {
    justify-content: flex-start;
}

@media (max-width: 900px) {
    .arabic-page .landing-hero-grid {
        text-align: center;
    }

    .arabic-page .hero-copy,
    .arabic-page .hero-visual {
        order: unset;
    }

    .arabic-page .hero-metrics,
    .arabic-page .hero-badges,
    .arabic-page .hero-actions {
        justify-content: center;
    }

    .arabic-page .section-head.split {
        grid-template-columns: 1fr;
        text-align: center;
    }
}
</style>
