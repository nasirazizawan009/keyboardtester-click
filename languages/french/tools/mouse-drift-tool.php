<?php
$md_labels = [
    'aria' => 'Test de dérive souris - détecte le mouvement du curseur au repos',
    'instruction' => 'Gardez la main HORS de la souris pendant le test. Déplacez le curseur dans la zone une fois, appuyez sur Démarrer et relâchez.',
    'duration' => 'Durée',
    'dur_10' => '10 secondes', 'dur_30' => '30 secondes', 'dur_60' => '60 secondes', 'dur_180' => '3 minutes',
    'start' => 'Démarrer', 'stop' => 'Arrêter', 'reset' => 'Réinitialiser',
    'pad_hint' => "Placez le curseur dans la zone, appuyez sur Démarrer. Ne touchez pas la souris jusqu'à la fin.",
    'running' => 'En cours — ne touchez pas la souris', 'done' => 'Test terminé',
    'time_left' => 'Temps restant',
    'total_drift' => 'Dérive totale', 'max_delta' => 'Plus gros saut', 'samples' => 'Événements',
    'verdict' => 'Verdict',
    'verdict_perfect' => 'Parfait — aucune dérive',
    'verdict_minor' => 'Mineure (moins de 5 px) — bruit normal',
    'verdict_warn' => 'Notable — capteur probablement saccadé',
    'verdict_bad' => 'Forte — capteur instable, remplacement conseillé',
    'verdict_idle' => 'Appuyez sur Démarrer et ne touchez pas la souris',
    'reference' => 'Astuce : les capteurs laser dérivent sur surfaces brillantes, les optiques détestent le verre et le noir profond. Un vrai tapis gaming élimine la plupart des faux positifs.',
];
include __DIR__ . '/../../../tools/mouse_drift_tool.php';
