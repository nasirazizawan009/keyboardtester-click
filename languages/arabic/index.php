<?php
/**
 * Arabic Keyboard Tester - Main Page
 * Organized structure with SEO optimization for Arabic audience
 */

include __DIR__ . '/../../config.php';

$pageTitle = 'اختبار لوحة المفاتيح العربية - اختبر لوحة المفاتيح الخاصة بك مجانًا';
$pageDescription = 'اختبر لوحة المفاتيح الخاصة بك مجانًا باستخدام اختبار لوحة المفاتيح العربية عبر الإنترنت. كشف مشاكل الأشباح، قياس زمن الاستجابة، تحديد المفاتيح العالقة.';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>
    
    <!-- Language Alternatives -->
    <link rel="alternate" hreflang="en" href="<?php echo $baseUrl; ?>/tools/keyboard-tester/">
    <link rel="alternate" hreflang="ru" href="<?php echo $baseUrl; ?>/languages/russian/">
    <link rel="alternate" hreflang="es" href="<?php echo $baseUrl; ?>/languages/spanish/">
    <link rel="alternate" hreflang="fr" href="<?php echo $baseUrl; ?>/languages/french/">
    <link rel="alternate" hreflang="pt" href="<?php echo $baseUrl; ?>/languages/portuguese/">
    <link rel="alternate" hreflang="ja" href="<?php echo $baseUrl; ?>/languages/japanese/">
    <link rel="alternate" hreflang="de" href="<?php echo $baseUrl; ?>/languages/german/">
    <link rel="alternate" hreflang="ko" href="<?php echo $baseUrl; ?>/languages/korean/">
    <link rel="alternate" hreflang="x-default" href="<?php echo $baseUrl; ?>/tools/keyboard-tester/">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/css/keyboard-tool.css">
</head>
<body>
    <!-- Header -->
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    
    <!-- Breadcrumbs -->
    <?php 
    $breadcrumbs = [
        ['label' => 'الأدوات', 'url' => $baseUrl . '/pages/tools.php'],
        ['label' => 'لغات', 'url' => ''],
        ['label' => 'العربية', 'url' => '']
    ];
    include __DIR__ . '/../../includes/components/breadcrumbs.php'; 
    ?>
    
    <!-- Hero Section -->
    <section class="seo-hero keyboard-tester-hero">
        <div class="container">
            <h1 class="hero-title">اختبار لوحة المفاتيح العربية المجاني عبر الإنترنت</h1>
            <p class="hero-description">
                اختبر لوحة المفاتيح الخاصة بك بشكل فوري باستخدام أداتنا المجانية. اكتشف مشاكل الأشباح، وقيس زمن الاستجابة، وحدد المفاتيح العالقة - كل ذلك دون تحميل أو تسجيل.
            </p>
            <div class="hero-features">
                <div class="feature">
                    <span class="feature-icon">⚡</span>
                    <div class="feature-text">
                        <h3>اختبار فوري</h3>
                        <p>شاهد استجابة لوحة المفاتيح الفورية مع ردود فعل ملونة</p>
                    </div>
                </div>
                <div class="feature">
                    <span class="feature-icon">🔍</span>
                    <div class="feature-text">
                        <h3>كشف الأشباح</h3>
                        <p>تحديد النقرات الوهمية والمشاكل الأخرى تلقائياً</p>
                    </div>
                </div>
                <div class="feature">
                    <span class="feature-icon">⏱️</span>
                    <div class="feature-text">
                        <h3>قياس زمن الاستجابة</h3>
                        <p>احصل على إحصائيات تفصيلية عن أداء لوحة المفاتيح</p>
                    </div>
                </div>
            </div>
            <div class="hero-cta">
                <button class="btn btn-primary" onclick="document.getElementById('keyboard-tester').scrollIntoView({behavior: 'smooth'})">
                    ⌨️ ابدأ الاختبار
                </button>
            </div>
        </div>
    </section>
    
    <!-- Tool -->
    <main class="tool-main-container">
        <?php include __DIR__ . '/../../tools/keyboard_tester_english.php'; ?>
        
        <!-- Related Tools -->
        <?php $currentTool = 'keyboard-tester'; include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    </main>
    
    <!-- Guidelines -->
    <section class="guidelines-section">
        <div class="container">
            <h2>كيفية استخدام أداة اختبار لوحة المفاتيح</h2>
            <div class="guidelines-content">
                <div class="guideline-item">
                    <h3>1. اضغط على أي مفتاح</h3>
                    <p>ستظهر المفاتيح التي تضغط عليها على الشاشة بألوان مختلفة حسب سرعة الاستجابة</p>
                </div>
                <div class="guideline-item">
                    <h3>2. راقب زمن الاستجابة</h3>
                    <p>يعرض لك زمن الاستجابة بالميلي ثانية لكل مفتاح</p>
                </div>
                <div class="guideline-item">
                    <h3>3. تحقق من المشاكل</h3>
                    <p>أداتنا تكتشف تلقائياً مشاكل الأشباح والمفاتيح المعلقة</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
    
    <style>
        .guidelines-section {
            padding: 60px 20px;
            background: var(--surface);
        }
        
        .guidelines-section .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .guidelines-section h2 {
            text-align: center;
            font-size: 2rem;
            color: var(--text-primary);
            margin-bottom: 40px;
        }
        
        .guidelines-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
        }
        
        .guideline-item h3 {
            color: var(--accent-primary);
            margin-bottom: 8px;
            font-size: 1.3rem;
        }
        
        .guideline-item p {
            color: var(--text-secondary);
            line-height: 1.6;
        }
    </style>
</body>
</html>


