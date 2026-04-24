<?php
$dm_labels = [
  'aria' => 'مقياس الديسيبل عبر الميكروفون.',
  'instruction' => 'اضغط ابدأ لاستخدام الميكروفون لقياس dB SPL مباشر. قراءات المتصفح نسبية - يحتاج SPL الحقيقي إلى معايرة الأجهزة.',
  'start' => 'ابدأ', 'stop' => 'إيقاف',
  'current' => 'dB الحالي', 'peak' => 'dB الذروة', 'average' => 'dB متوسط',
  'permission_denied' => 'تم رفض الوصول للميكروفون.',
  'no_mic' => 'لم يتم اكتشاف ميكروفون.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
