<?php
$kdc_labels = [
    'aria_arena' => 'كاشف تشويش لوحة المفاتيح.',
    'start' => 'ابدأ', 'stop' => 'إيقاف', 'reset' => 'إعادة',
    'threshold' => 'عتبة التشويش',
    'status_idle' => 'خامل', 'status_listening' => 'يستمع',
    'col_key' => 'المفتاح', 'col_total' => 'الضغطات', 'col_chatter' => 'أحداث التشويش', 'col_min_gap' => 'أقل فجوة (مللي ثانية)',
    'tip_listen' => 'اضغط ابدأ ثم اضغط كل مفتاح مرة واحدة ببطء. أي مفتاح يسجل مرتين سيعرض أحداث التشويش.',
    'no_chatter' => 'لم يكتشف تشويش بعد. استمر بالضغط على المفاتيح.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
