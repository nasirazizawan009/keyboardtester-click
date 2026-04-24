<?php
$ppi_labels = [
    'aria' => 'PPI-Rechner - Pixel pro Zoll aus Auflösung und Diagonale',
    'instruction' => 'Gib horizontale, vertikale Auflösung und Diagonale (Zoll) ein. PPI = √(w² + h²) / Diagonale.',
    'preset' => 'Gängige Bildschirme', 'preset_custom' => 'Benutzerdefiniert',
    'width' => 'Horizontale Pixel', 'height' => 'Vertikale Pixel',
    'diagonal' => 'Diagonale (Zoll)', 'diagonal_cm' => 'Diagonale (cm)',
    'ppi' => 'Pixel pro Zoll (PPI)', 'dot_pitch' => 'Pixelabstand',
    'aspect' => 'Seitenverhältnis', 'megapixels' => 'Gesamtpixel',
    'density_tier' => 'Dichte-Stufe',
    'tier_low' => 'Geringe Dichte (unter 100 PPI)',
    'tier_standard' => 'Standard (100-150 PPI)',
    'tier_high' => 'Hohe Dichte (150-220 PPI)',
    'tier_retina' => 'Retina / 4K (220+ PPI)',
    'unit' => 'Einheit',
    'reference' => 'Tipp: Apple nennt "Retina" ab ~220 PPI bei Laptops und 300 PPI bei Handys. 1080p 24" ≈ 92 PPI; 4K 27" ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
