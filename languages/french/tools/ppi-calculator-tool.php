<?php
$ppi_labels = [
    'aria' => 'Calculateur PPI - pixels par pouce depuis résolution et taille',
    'instruction' => 'Entrez résolution horizontale, verticale et diagonale (pouces). PPI = √(w² + h²) / diagonale.',
    'preset' => 'Écrans courants', 'preset_custom' => 'Personnalisé',
    'width' => 'Pixels horizontaux', 'height' => 'Pixels verticaux',
    'diagonal' => 'Diagonale (pouces)', 'diagonal_cm' => 'Diagonale (cm)',
    'ppi' => 'Pixels par pouce (PPI)', 'dot_pitch' => 'Pas de point',
    'aspect' => 'Ratio d\'aspect', 'megapixels' => 'Total de pixels',
    'density_tier' => 'Niveau de densité',
    'tier_low' => 'Basse densité (moins de 100 PPI)',
    'tier_standard' => 'Standard (100-150 PPI)',
    'tier_high' => 'Haute densité (150-220 PPI)',
    'tier_retina' => 'Retina / 4K (220+ PPI)',
    'unit' => 'Unité',
    'reference' => 'Astuce : Apple considère "Retina" à ~220 PPI sur portables et 300 PPI sur téléphones. 1080p 24" ≈ 92 PPI ; 4K 27" ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
