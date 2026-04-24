<?php
$ppi_labels = [
    'aria' => 'Calculadora PPI - pixels por polegada a partir da resolução e tamanho',
    'instruction' => 'Informe a resolução horizontal, vertical e a diagonal (polegadas). PPI = √(w² + h²) / diagonal.',
    'preset' => 'Telas comuns', 'preset_custom' => 'Personalizado',
    'width' => 'Pixels horizontais', 'height' => 'Pixels verticais',
    'diagonal' => 'Diagonal (polegadas)', 'diagonal_cm' => 'Diagonal (cm)',
    'ppi' => 'Pixels por polegada (PPI)', 'dot_pitch' => 'Passo de ponto',
    'aspect' => 'Proporção', 'megapixels' => 'Total de pixels',
    'density_tier' => 'Nível de densidade',
    'tier_low' => 'Baixa densidade (abaixo de 100 PPI)',
    'tier_standard' => 'Padrão (100-150 PPI)',
    'tier_high' => 'Alta densidade (150-220 PPI)',
    'tier_retina' => 'Retina / 4K (220+ PPI)',
    'unit' => 'Unidade',
    'reference' => 'Dica: a Apple chama de "Retina" ~220 PPI em notebooks e 300 PPI em celulares. 1080p 24" ≈ 92 PPI; 4K 27" ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
