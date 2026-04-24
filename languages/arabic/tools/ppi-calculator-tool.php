<?php
$ppi_labels = [
    'aria' => 'حاسبة PPI - البكسلات لكل بوصة من الدقة والحجم',
    'instruction' => 'أدخل الدقة الأفقية والعمودية والقطر (بالبوصة). PPI = جذر (w² + h²) مقسوم على القطر.',
    'preset' => 'شاشات شائعة', 'preset_custom' => 'مخصص',
    'width' => 'بكسلات أفقية', 'height' => 'بكسلات عمودية',
    'diagonal' => 'القطر (بوصة)', 'diagonal_cm' => 'القطر (سم)',
    'ppi' => 'بكسل لكل بوصة (PPI)', 'dot_pitch' => 'خطوة النقطة',
    'aspect' => 'نسبة العرض', 'megapixels' => 'إجمالي البكسلات',
    'density_tier' => 'مستوى الكثافة',
    'tier_low' => 'كثافة منخفضة (أقل من 100 PPI)',
    'tier_standard' => 'قياسية (100-150 PPI)',
    'tier_high' => 'كثافة عالية (150-220 PPI)',
    'tier_retina' => 'Retina / 4K (220+ PPI)',
    'unit' => 'الوحدة',
    'reference' => 'نصيحة: تعتبر Apple الشاشة "Retina" عند ~220 PPI للمحمولة و300 PPI للهاتف. 1080p 24" ≈ 92 PPI؛ 4K 27" ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
