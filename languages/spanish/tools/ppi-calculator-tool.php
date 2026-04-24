<?php
$ppi_labels = [
    'aria' => 'Calculadora PPI - píxeles por pulgada desde resolución y tamaño',
    'instruction' => 'Introduce resolución horizontal, vertical y diagonal (en pulgadas). PPI = √(w² + h²) / diagonal.',
    'preset' => 'Pantallas comunes', 'preset_custom' => 'Personalizado',
    'width' => 'Píxeles horizontales', 'height' => 'Píxeles verticales',
    'diagonal' => 'Diagonal (pulgadas)', 'diagonal_cm' => 'Diagonal (cm)',
    'ppi' => 'Píxeles por pulgada (PPI)', 'dot_pitch' => 'Paso de punto',
    'aspect' => 'Relación de aspecto', 'megapixels' => 'Total de píxeles',
    'density_tier' => 'Nivel de densidad',
    'tier_low' => 'Densidad baja (menos de 100 PPI)',
    'tier_standard' => 'Estándar (100-150 PPI)',
    'tier_high' => 'Alta densidad (150-220 PPI)',
    'tier_retina' => 'Retina / 4K (220+ PPI)',
    'unit' => 'Unidad',
    'reference' => 'Nota: Apple considera "Retina" a unos 220 PPI en portátiles y 300 PPI en móviles. 1080p 24" ≈ 92 PPI; 4K 27" ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
