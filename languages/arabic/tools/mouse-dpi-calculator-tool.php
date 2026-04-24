<?php
// Arabic mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'حاسبة DPI للماوس - قياس DPI الحقيقي',
    'instruction' => 'اسحب داخل اللوحة بالماوس ثم أدخل المسافة الفيزيائية الدقيقة التي تحركتها. أو بدّل إلى الوضع اليدوي واكتب القيم مباشرة.',
    'mode_drag' => 'اسحب للقياس',
    'mode_manual' => 'إدخال يدوي',
    'pad_hint' => 'اضغط مع الاستمرار داخل اللوحة. حرك الماوس مسافة فيزيائية ثابتة (استخدم مسطرة) ثم اترك الزر.',
    'pixels' => 'البكسلات المتحركة',
    'phys_distance' => 'المسافة الفيزيائية',
    'unit_cm' => 'سم',
    'unit_in' => 'بوصة',
    'advertised' => 'DPI المُعلن (اختياري)',
    'dpi_result' => 'DPI الحقيقي',
    'accuracy' => 'دقة المستشعر',
    'reset' => 'إعادة تعيين',
    'reference' => 'نصيحة: كلما زادت المسافة، قل الخطأ. استهدف 10 إلى 20 سم.',
    'press_to_start' => 'اترك زر الماوس داخل اللوحة لتثبيت عدد البكسلات.',
    'no_drag' => 'لم يتم تسجيل أي حركة بعد',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
