<?php
/**
 * Arabic Click Speed Test - اختبار سرعة النقر
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ar.php';

$pageTitle = 'اختبار سرعة النقر — عدد النقرات في الثانية CPS مجاناً | KeyboardTester.click';
$pageDescription = 'اختبار سرعة النقر مجاني: قِس عدد النقرات في الثانية (CPS) وعدد نقرات الماوس عبر تحديات من 5 أو 10 أو 60 ثانية. مقارنة سرعة النقر للاعبين والمستخدمين العاديين. بدون تثبيت.';
$pageKeywords = 'اختبار سرعة النقر, عدد النقرات, عدد نقرات الماوس, CPS, CPM, اختبار النقر السريع, سرعة الماوس, اختبار سرعة الماوس, قياس سرعة النقر';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse_speed_tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "ما هو اختبار سرعة النقر؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "اختبار سرعة النقر يقيس عدد النقرات التي يمكنك إجراؤها في الثانية (CPS) أو في الدقيقة (CPM). يُستخدم لقياس أداء الماوس ومهاراتك في النقر السريع للألعاب التنافسية مثل Minecraft PvP وغيرها."
        }
      },
      {
        "@type": "Question",
        "name": "كم عدد النقرات في الثانية للمستخدم العادي؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "متوسط عدد النقرات للمستخدم العادي هو 5-7 نقرات في الثانية. اللاعبون المتوسطون يصلون إلى 8-10 CPS، واللاعبون المحترفون يحققون 10-14 CPS، أما الأبطال العالميون فيمكنهم الوصول إلى 15+ نقرة في الثانية."
        }
      },
      {
        "@type": "Question",
        "name": "كيف أحسّن سرعة النقر بالماوس؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "تقنيات تحسين سرعة النقر تشمل: Jitter Click (الاهتزاز السريع للإصبع)، Butterfly Click (التناوب بين إصبعين)، Drag Click (السحب لتحفيز نقرات متتابعة). تدرّب يومياً 5-10 دقائق وستلاحظ تحسناً خلال أسابيع. استخدم ماوس بمفاتيح خفيفة لنتائج أفضل."
        }
      },
      {
        "@type": "Question",
        "name": "هل اختبار النقر السريع مجاني وآمن؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "نعم، الاختبار مجاني تماماً ولا يتطلب تسجيل دخول أو تنزيل. يعمل بالكامل في المتصفح ولا تُرسل أي بيانات إلى أي خادم. يمكنك إجراء الاختبار بقدر ما تريد دون أي قيود."
        }
      },
      {
        "@type": "Question",
        "name": "ما الفرق بين CPS و CPM؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPS (Clicks Per Second) هو عدد النقرات في الثانية الواحدة، يُستخدم في اختبارات قصيرة (5-10 ثوان). أما CPM (Clicks Per Minute) فهو عدد النقرات في الدقيقة، أكثر دقة في الاختبارات الطويلة (60 ثانية) لأنه يقيس قدرتك على الاستمرار."
        }
      },
      {
        "@type": "Question",
        "name": "هل يعمل الاختبار على الهاتف المحمول؟",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "نعم، الاختبار يعمل على جميع الأجهزة بما فيها الهاتف المحمول والتابلت. على الشاشات اللمسية يقيس عدد اللمسات في الثانية بدلاً من نقرات الماوس. النتائج قابلة للمقارنة بين الأجهزة."
        }
      }
    ]
  }
  </script>

  <style>
    body { font-family: 'Tajawal', 'Space Grotesk', sans-serif; }
    .landing-main { direction: rtl; text-align: right; }
    .hero-ctas { justify-content: flex-start; }
    .trust-grid, .process-grid, .landing-feature-grid, .guidelines-grid { direction: rtl; }
    .tool-stage-header, .section-head.split { flex-direction: row-reverse; }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ar.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">اختبار سرعة النقر</h1>
          <p class="hero-lede">قياس سرعة النقر (CPS/CPM) مع اختبارات محددة بالوقت. حسن مهاراتك في الألعاب.</p>
          <div class="hero-ctas">
            <a href="#click-test" class="landing-btn landing-btn-primary">بدء الاختبار</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">طريقة الاستخدام</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">الأداة الرئيسية</p>
          <h2 id="tool-stage-title">اختبار سرعة النقر</h2>
          <p class="section-lede">انقر بأسرع ما يمكن في منطقة الاختبار.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">عرض النصائح</a>
        </div>
      </div>
      <section id="click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="الميزات الرئيسية">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">CPS فوري</div>
          <div class="trust-desc">نقرات في الثانية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">أوقات متعددة</div>
          <div class="trust-desc">5-60 ثانية</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">تتبع الأداء</div>
          <div class="trust-desc">أفضل نتيجة محفوظة</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">بدون تسجيل</div>
          <div class="trust-desc">ابدأ فوراً</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">قياس السرعة</p>
          <h2 id="feature-title">اكتشف سرعة نقرك الحقيقية</h2>
          <p class="section-lede">اختبارات دقيقة لقياس أدائك في النقر السريع.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>قياس CPS</h3>
            <p>عدد النقرات في الثانية الواحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>قياس CPM</h3>
            <p>عدد النقرات في الدقيقة الواحدة.</p>
          </article>
          <article class="landing-feature-card">
            <h3>أفضل نتيجة</h3>
            <p>تتبع أعلى سرعة وصلت إليها.</p>
          </article>
          <article class="landing-feature-card">
            <h3>فترات مختلفة</h3>
            <p>اختر من 5 إلى 60 ثانية.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="cps-reference" aria-labelledby="cps-reference-title" style="padding:60px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;direction:rtl;text-align:right;">
        <div class="section-head">
          <p class="section-kicker">جدول المقارنة</p>
          <h2 id="cps-reference-title">ما هو متوسط عدد النقرات في الثانية؟</h2>
          <p class="section-lede">قارن نتيجتك في اختبار سرعة النقر بهذا الجدول لتعرف مستواك. كلما زاد العدد كلما كان أفضل لألعاب PvP والقتال السريع.</p>
        </div>
        <div class="cps-table-wrap" style="overflow-x:auto;margin-top:24px;">
          <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
            <thead>
              <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
                <th style="text-align:right;padding:12px 16px;">المستوى</th>
                <th style="text-align:right;padding:12px 16px;">عدد النقرات (CPS)</th>
                <th style="text-align:right;padding:12px 16px;">الوصف</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>المبتدئ</strong></td><td style="padding:12px 16px;">1 – 4 CPS</td><td style="padding:12px 16px;">سرعة النقر العادية للاستخدام اليومي والتصفح.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>المستخدم العادي</strong></td><td style="padding:12px 16px;">5 – 7 CPS</td><td style="padding:12px 16px;">متوسط عدد النقرات لمعظم المستخدمين بدون تدريب خاص.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>اللاعب المتوسط</strong></td><td style="padding:12px 16px;">8 – 10 CPS</td><td style="padding:12px 16px;">سرعة جيدة للألعاب التنافسية الخفيفة.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>اللاعب المحترف</strong></td><td style="padding:12px 16px;">10 – 14 CPS</td><td style="padding:12px 16px;">سرعة عالية تتطلب تدريباً منتظماً وتقنيات النقر المتقدمة.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>الخبير</strong></td><td style="padding:12px 16px;">14 – 18 CPS</td><td style="padding:12px 16px;">مستوى Jitter Click و Butterfly Click المتقن.</td></tr>
              <tr><td style="padding:12px 16px;"><strong>البطل العالمي</strong></td><td style="padding:12px 16px;">+18 CPS</td><td style="padding:12px 16px;">مستوى استثنائي يستخدم تقنيات Drag Click وأجهزة متخصصة.</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-right:4px solid var(--accent-primary);border-radius:6px;">
          <strong>نصيحة:</strong> أفضل طريقة لقياس سرعة النقر الحقيقية هي إعادة الاختبار 3-5 مرات وحساب المتوسط. تجنب الإعادة المتكررة عندما تكون متعباً، لأن النتائج تتأثر بالتركيز ومستوى الطاقة. درّب تقنيات النقر المختلفة (Jitter, Butterfly) على فترات قصيرة لتجنب إجهاد الأصابع.
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-ar.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">دليل الاستخدام</p>
          <h2>كيفية استخدام اختبار سرعة النقر</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. اختر المدة</h3>
            <p>حدد فترة الاختبار من 5 إلى 60 ثانية.</p>
          </div>
          <div class="guideline-card">
            <h3>2. انقر للبدء</h3>
            <p>انقر في منطقة الاختبار لبدء العد التنازلي.</p>
          </div>
          <div class="guideline-card">
            <h3>3. انقر بسرعة</h3>
            <p>انقر بأسرع ما يمكن حتى انتهاء الوقت.</p>
          </div>
          <div class="guideline-card">
            <h3>4. راجع النتائج</h3>
            <p>شاهد CPS و CPM وقارن بأفضل نتيجة لك.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ar.php'; ?>
</body>
</html>
