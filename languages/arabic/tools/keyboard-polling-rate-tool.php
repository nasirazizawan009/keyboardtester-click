<?php
$kpr_labels = [
  'aria' => 'اختبار polling لوحة المفاتيح.',
  'instruction' => 'اضغط أي مفتاح لمدة 3+ ثوان. يقيس معدل التكرار التلقائي للنظام الذي يقارب polling Hz.',
  'warning' => 'ملاحظة: أحداث المفاتيح في المتصفح محدودة بإعدادات التكرار التلقائي للنظام. polling الحقيقي يقاس في firmware قبل النظام.',
  'press_now' => 'اضغط مفتاحا',
  'samples' => 'عينات', 'avg_interval' => 'متوسط الفترة (مللي)', 'rate' => 'المعدل المقدر (Hz)', 'min_int' => 'أقل فترة (مللي)',
  'reset' => 'إعادة',
];
include __DIR__ . '/../../../tools/keyboard_polling_rate_tool.php';
