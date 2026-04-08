<?php
/**
 * Arabic Keyboard Tester - Guidelines & Help
 */
?>

<section class="guidelines arabic-guidelines" id="guidelines">
	<div class="help-header">
		<h2>دليل اختبار لوحة المفاتيح العربية</h2>
		<p>استخدم أداة اختبار لوحة المفاتيح العربية المجانية للتحقق من كل مفتاح، والتأكد من تخطيط لوحتك، واكتشاف المشاكل مثل الأشباح أو المفاتيح العالقة في ثوانٍ.</p>
	</div>

	<div class="help-grid">
		<div class="help-card">
			<h3>ابدأ اختبار لوحة المفاتيح بسرعة</h3>
			<ol>
				<li>انقر داخل أداة الاختبار واضغط على أي مفتاح في لوحة المفاتيح.</li>
				<li>تأكد من تمييز المفتاح وظهوره في سجل المفاتيح.</li>
				<li>استخدم زر "إعادة تعيين" لمسح النتائج وإجراء اختبار آخر.</li>
			</ol>
		</div>
		<div class="help-card">
			<h3>اختر التخطيط وتسميات نظام التشغيل</h3>
			<ul>
				<li>اختر تخطيط عربي، QWERTY، AZERTY، Dvorak، أو Colemak.</li>
				<li>التبديل بين تسميات Windows أو Mac لمطابقة لوحة المفاتيح الخاصة بك.</li>
				<li>يتم حفظ اختيار التخطيط الخاص بك تلقائياً.</li>
			</ul>
		</div>
		<div class="help-card">
			<h3>فحوصات متقدمة والتصدير</h3>
			<ul>
				<li>افتح الخيارات المتقدمة للإحصائيات وخريطة الحرارة وفحوصات الأشباح.</li>
				<li>قم بتشغيل "اختبار جميع المفاتيح" لتأكيد تغطية المفاتيح الكاملة.</li>
				<li>تصدير النتائج إذا كنت بحاجة إلى سجل للدعم الفني.</li>
			</ul>
        </div>
	</div>

	<div class="help-accordion">
		<details>
			<summary>لماذا لا يتم تسجيل مفتاح في أداة اختبار لوحة المفاتيح؟</summary>
			<p>تأكد من أن الصفحة في بؤرة التركيز، اضغط على المفتاح بقوة، وتأكد من أن لغة نظام التشغيل تتطابق مع التخطيط المحدد.</p>
		</details>
		<details>
			<summary>لماذا لا يتم اكتشاف المفاتيح الخاصة؟</summary>
			<p>مفاتيح مثل Fn وبعض عناصر التحكم في الوسائط يتم التعامل معها بواسطة الأجهزة وقد لا ترسل أحداث المتصفح.</p>
		</details>
		<details>
			<summary>هل تعمل أداة اختبار لوحة المفاتيح على الأجهزة المحمولة؟</summary>
			<p>تعمل الأداة بشكل أفضل على لوحات المفاتيح المكتبية. قد لا ترسل لوحات المفاتيح الافتراضية على الأجهزة المحمولة والأجهزة اللوحية أحداث المفاتيح الكاملة.</p>
		</details>
		<details>
			<summary>هل يمكنني اختبار أشباح لوحة المفاتيح أو الضغط على مفاتيح متعددة؟</summary>
			<p>نعم. اضغط على عدة مفاتيح معاً لرؤية أي المفاتيح تسجل وتحديد مشاكل الأشباح.</p>
		</details>
		<details>
			<summary>كيف أقوم بإعادة تعيين اختبار لوحة المفاتيح؟</summary>
			<p>انقر فوق "إعادة تعيين"، ثم قم بتحديث الصفحة لمسح أي تفضيلات محفوظة.</p>
		</details>
		<details>
			<summary>هل اختبار لوحة المفاتيح خاص؟</summary>
			<p>تعمل الاختبارات في متصفحك ولا يتم تحميلها إلى خادم.</p>
		</details>
		<details>
			<summary>هل يدعم الاختبار الأحرف العربية الكاملة؟</summary>
			<p>نعم، يدعم الاختبار جميع الأحرف العربية والأرقام العربية (٠-٩) والتشكيل والأحرف الخاصة.</p>
		</details>
		<details>
			<summary>ما هي الألوان المختلفة للمفاتيح؟</summary>
			<p>الألوان تشير إلى سرعة الاستجابة: الأخضر (سريع جداً)، الأصفر (سريع)، البرتقالي (متوسط)، الأحمر (بطيء)، البنفسجي (بطيء جداً).</p>
		</details>
	</div>

	<div class="help-footer">
		<p>هل تحتاج إلى المزيد من الأدوات؟ استكشف أدوات اختبار الماوس والكمون والصوت والأدوات المساعدة في قائمة الأدوات أدناه.</p>
	</div>
</section>

<style>
/* Arabic Guidelines Section */
.arabic-guidelines {
    --guide-bg: #1e293b;
    --guide-surface: #0f172a;
    --guide-text: #e2e8f0;
    --guide-muted: #94a3b8;
    --guide-border: rgba(148, 163, 184, 0.2);
    --guide-accent: #00d4ff;

    max-width: 1200px;
    margin: 3rem auto;
    padding: 2.5rem;
    background: var(--guide-surface);
    border: 1px solid var(--guide-border);
    border-radius: 20px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    direction: rtl;
    text-align: right;
}

/* Light theme */
html:not(.dark-theme) .arabic-guidelines,
[data-theme="light"] .arabic-guidelines {
    --guide-bg: #f5f7fa;
    --guide-surface: #ffffff;
    --guide-text: #1e293b;
    --guide-muted: #64748b;
    --guide-border: rgba(0, 0, 0, 0.1);
}

.arabic-guidelines .help-header {
    text-align: center;
    margin-bottom: 2rem;
}

.arabic-guidelines .help-header h2 {
    font-size: 1.75rem;
    color: var(--guide-accent);
    margin-bottom: 0.75rem;
    font-weight: 700;
}

.arabic-guidelines .help-header p {
    color: var(--guide-muted);
    font-size: 1rem;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
}

.arabic-guidelines .help-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.25rem;
    margin-bottom: 2rem;
}

.arabic-guidelines .help-card {
    background: var(--guide-bg);
    border: 1px solid var(--guide-border);
    border-radius: 14px;
    padding: 1.5rem;
    text-align: right;
}

.arabic-guidelines .help-card h3 {
    color: var(--guide-text);
    font-size: 1.1rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.arabic-guidelines .help-card ol,
.arabic-guidelines .help-card ul {
    margin: 0;
    padding-right: 1.25rem;
    padding-left: 0;
}

.arabic-guidelines .help-card li {
    color: var(--guide-muted);
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.arabic-guidelines .help-accordion {
    display: grid;
    gap: 0.75rem;
    margin-bottom: 2rem;
}

.arabic-guidelines .help-accordion details {
    background: var(--guide-bg);
    border: 1px solid var(--guide-border);
    border-radius: 12px;
    overflow: hidden;
}

.arabic-guidelines .help-accordion summary {
    padding: 1rem 1.25rem;
    cursor: pointer;
    font-weight: 600;
    color: var(--guide-text);
    list-style: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.arabic-guidelines .help-accordion summary::-webkit-details-marker {
    display: none;
}

.arabic-guidelines .help-accordion summary::before {
    content: "◂";
    font-size: 0.85rem;
    color: var(--guide-muted);
    transition: transform 0.2s ease;
    margin-left: 0.5rem;
    order: 1;
}

.arabic-guidelines .help-accordion details[open] summary::before {
    transform: rotate(-90deg);
}

.arabic-guidelines .help-accordion details p {
    margin: 0;
    padding: 0 1.25rem 1rem;
    color: var(--guide-muted);
    line-height: 1.7;
}

.arabic-guidelines .help-footer {
    text-align: center;
    padding-top: 1rem;
    border-top: 1px solid var(--guide-border);
}

.arabic-guidelines .help-footer p {
    color: var(--guide-muted);
    margin: 0;
}

@media (max-width: 768px) {
    .arabic-guidelines {
        margin: 2rem 1rem;
        padding: 1.5rem;
    }

    .arabic-guidelines .help-header h2 {
        font-size: 1.4rem;
    }

    .arabic-guidelines .help-grid {
        grid-template-columns: 1fr;
    }
}
</style>
