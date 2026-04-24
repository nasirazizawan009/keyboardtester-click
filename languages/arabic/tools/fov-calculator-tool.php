<?php
$fov_labels = [
    'aria' => 'حاسبة FoV - تحويل مجال الرؤية بين النسب',
    'instruction' => 'أدخل FoV الحالي ونوعه (أفقي أو عمودي أو قطري) ثم اختر نسبة شاشتك. يعرض الجدول FoV المكافئ لكل صيغة ونسبة.',
    'game_preset' => 'إعداد مسبق للعبة',
    'preset_custom' => 'مخصص',
    'fov_value' => 'قيمة FoV (درجات)',
    'fov_type' => 'نوع FoV',
    'type_h' => 'أفقي', 'type_v' => 'عمودي', 'type_d' => 'قطري',
    'aspect_ratio' => 'نسبة شاشتك',
    'table_heading' => 'FoV المكافئ حسب النسبة',
    'col_aspect' => 'النسبة', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => 'قطري',
    'reference' => 'نصيحة: CS2 افتراضيًا 106 hFoV على 16:9. Apex 90 vFoV. CoD يطلب hFoV 4:3 بصيغة Hor+.',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
