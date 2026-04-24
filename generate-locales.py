"""Generate localized landing pages + tool wrappers for 12 tools × 8 locales.

Each tool gets:
  languages/{lang}/{slug}.php         (short landing page - localized hero + include tool wrapper)
  languages/{lang}/tools/{wrapper}.php (label array override, then include English tool partial)

Run from the project root:
    python generate-locales.py

Idempotent: overwrites existing files each run.
"""
from __future__ import annotations
import os
from pathlib import Path

ROOT = Path(__file__).resolve().parent

LOCALES = {
    'es': {'dir': 'spanish',    'code': 'es', 'dir_attr': 'ltr', 'footer_suffix': 'es'},
    'fr': {'dir': 'french',     'code': 'fr', 'dir_attr': 'ltr', 'footer_suffix': 'fr'},
    'de': {'dir': 'german',     'code': 'de', 'dir_attr': 'ltr', 'footer_suffix': 'de'},
    'pt': {'dir': 'portuguese', 'code': 'pt', 'dir_attr': 'ltr', 'footer_suffix': 'pt'},
    'ar': {'dir': 'arabic',     'code': 'ar', 'dir_attr': 'rtl', 'footer_suffix': 'ar'},
    'ru': {'dir': 'russian',    'code': 'ru', 'dir_attr': 'ltr', 'footer_suffix': 'ru'},
    'ja': {'dir': 'japanese',   'code': 'ja', 'dir_attr': 'ltr', 'footer_suffix': 'ja'},
    'ko': {'dir': 'korean',     'code': 'ko', 'dir_attr': 'ltr', 'footer_suffix': 'ko'},
}

# Per-tool config: slug, wrapper file-basename in languages/tools/, backend tool partial to include
TOOLS = [
    {'slug': 'edpi-calculator',              'wrapper': 'edpi-calculator-tool.php',           'partial': 'edpi_calculator_tool.php'},
    {'slug': 'aspect-ratio-calculator',      'wrapper': 'aspect-ratio-calculator-tool.php',   'partial': 'aspect_calc_tool.php'},
    {'slug': 'screen-size-calculator',       'wrapper': 'screen-size-calculator-tool.php',    'partial': 'screen_size_calc_tool.php'},
    {'slug': 'viewing-distance-calculator',  'wrapper': 'viewing-distance-calculator-tool.php','partial': 'viewing_distance_calc_tool.php'},
    {'slug': 'fps-test',                     'wrapper': 'fps-test-tool.php',                  'partial': 'fps_test_tool.php'},
    {'slug': 'resolution-test',              'wrapper': 'resolution-test-tool.php',           'partial': 'resolution_test_tool.php'},
    {'slug': 'apm-test',                     'wrapper': 'apm-test-tool.php',                  'partial': 'apm_test_tool.php'},
    {'slug': 'mouse-spin-test',              'wrapper': 'mouse-spin-tool.php',                'partial': 'mouse_spin_tool.php'},
    {'slug': 'burn-in-test',                 'wrapper': 'burn-in-tool.php',                   'partial': 'burn_in_tool.php'},
    {'slug': 'color-range-test',             'wrapper': 'color-range-tool.php',               'partial': 'color_range_tool.php'},
    {'slug': 'screen-uniformity-test',       'wrapper': 'screen-uniformity-tool.php',         'partial': 'screen_uniformity_tool.php'},
    {'slug': 'sound-test',                   'wrapper': 'sound-test-tool.php',                'partial': 'sound_test_tool.php'},
]

# Per-tool translations for the LANDING PAGE hero area.
# Keys:
#   title      -> <title> tag + hero H1 style
#   desc       -> meta description
#   kicker     -> small text above H1
#   h1         -> page H1
#   lede       -> hero paragraph
#   cta_start  -> primary CTA label
#   cta_more   -> secondary CTA label
# Translations are terse intentionally so the same template fits all languages.

T = {  # T[lang][slug] -> dict
    'es': {
        'edpi-calculator': {
            'title': 'Calculadora de eDPI - DPI Efectivo para FPS',
            'desc': 'Calculadora gratuita de eDPI (DPI x sensibilidad) y cm/360 para CS2, Valorant, Apex y otros FPS.',
            'kicker': 'Calculadoras de sensibilidad',
            'h1': 'Calculadora de eDPI - DPI Efectivo para FPS',
            'lede': 'Calcula tu DPI efectivo (eDPI = DPI x sensibilidad) para comparar la puntería en CS2, Valorant, Apex y otros FPS. Incluye conversión cm/360.',
            'cta_start': 'Calcular eDPI', 'cta_more': 'Ver todas las herramientas',
        },
        'aspect-ratio-calculator': {
            'title': 'Calculadora de Relación de Aspecto - Ancho, Alto o Ratio',
            'desc': 'Calculadora gratuita de relación de aspecto. Introduce dos de ancho, alto o ratio — la herramienta resuelve el tercero y simplifica.',
            'kicker': 'Calculadoras de pantalla',
            'h1': 'Calculadora de Relación de Aspecto',
            'lede': 'Introduce dos de tres: ancho, alto o ratio. Simplifica automáticamente a enteros (1920×1080 → 16:9) y muestra una vista previa en vivo.',
            'cta_start': 'Abrir calculadora', 'cta_more': 'Ver todas las herramientas',
        },
        'screen-size-calculator': {
            'title': 'Calculadora de Tamaño de Pantalla - Diagonal, Ancho, Alto',
            'desc': 'Calculadora gratuita de tamaño de pantalla. Diagonal, ancho y alto en pulgadas y cm desde relación + una medida.',
            'kicker': 'Calculadoras de pantalla',
            'h1': 'Calculadora de Tamaño de Pantalla',
            'lede': 'Introduce la relación de aspecto y una medida (diagonal, ancho o alto). La herramienta calcula las otras dos en pulgadas y cm, más el área visible.',
            'cta_start': 'Abrir calculadora', 'cta_more': 'Ver todas las herramientas',
        },
        'viewing-distance-calculator': {
            'title': 'Calculadora de Distancia de Visión - TV y Monitor',
            'desc': 'Calculadora gratuita de distancia de visión para TV y monitor. Recomendaciones THX, SMPTE y 4K UHD.',
            'kicker': 'Calculadoras de pantalla',
            'h1': 'Calculadora de Distancia de Visión',
            'lede': '¿A qué distancia sentarte de tu TV o monitor? THX (36° FoV inmersivo), SMPTE (30° cine) y la distancia máxima de resolución 4K/8K.',
            'cta_start': 'Abrir calculadora', 'cta_more': 'Ver todas las herramientas',
        },
        'fps-test': {
            'title': 'Prueba de FPS - Frecuencia de Fotogramas del Navegador',
            'desc': 'Prueba gratuita de FPS. Medición en vivo con promedio, mínimo, máximo y 1%-low, más detección de 60/120/144/240 Hz.',
            'kicker': 'Diagnóstico de rendimiento',
            'h1': 'Prueba de FPS',
            'lede': 'Mide la frecuencia de fotogramas del navegador en tiempo real con requestAnimationFrame. Muestra FPS actual, promedio, mínimo, máximo y 1%-low.',
            'cta_start': 'Iniciar prueba de FPS', 'cta_more': 'Ver todas las herramientas',
        },
        'resolution-test': {
            'title': 'Prueba de Resolución de Pantalla - Detectar Resolución y DPR',
            'desc': 'Prueba gratuita de resolución de pantalla. Detecta resolución, DPR, profundidad de color, gama y viewport en vivo.',
            'kicker': 'Diagnóstico de pantalla',
            'h1': 'Prueba de Resolución de Pantalla',
            'lede': 'Lectura instantánea de cada propiedad de pantalla: resolución CSS + píxeles nativos, DPR, profundidad de color, gama, viewport, orientación y relación de aspecto. Actualiza al redimensionar.',
            'cta_start': 'Ver mi resolución', 'cta_more': 'Ver todas las herramientas',
        },
        'apm-test': {
            'title': 'Prueba de APM - Acciones por Minuto para RTS y MOBA',
            'desc': 'Prueba gratuita de APM. Cuenta pulsaciones y clics en una ventana móvil de 60 s para RTS y MOBA.',
            'kicker': 'Diagnóstico de gaming',
            'h1': 'Prueba de APM',
            'lede': 'Mide tus acciones por minuto mientras juegas StarCraft, DotA, League of Legends y otros juegos donde el micro importa. Ventana móvil de 60 segundos con APM pico y promedio.',
            'cta_start': 'Iniciar prueba de APM', 'cta_more': 'Ver todas las herramientas',
        },
        'mouse-spin-test': {
            'title': 'Prueba de Giro del Ratón - Contador de Rotaciones 360°',
            'desc': 'Prueba gratuita de giro del ratón. Cuenta rotaciones completas de 360°, giros/segundo máximos, grados totales y dirección.',
            'kicker': 'Diagnóstico de ratón',
            'h1': 'Prueba de Giro del Ratón',
            'lede': '¿Cuántas rotaciones completas de 360° puedes hacer con el ratón en 30 segundos? Mantén y arrastra alrededor del centro — cada 360° cuenta.',
            'cta_start': 'Empezar a girar', 'cta_more': 'Ver todas las herramientas',
        },
        'burn-in-test': {
            'title': 'Prueba de Burn-In OLED - Retención de Imagen',
            'desc': 'Prueba gratuita de burn-in OLED. Ciclo de colores sólidos, tablero y refrescador de píxeles a pantalla completa.',
            'kicker': 'Diagnóstico de pantalla',
            'h1': 'Prueba de Burn-In OLED',
            'lede': 'Detecta retención de imagen y burn-in en tu pantalla. Ciclo de 8 colores sólidos, tablero fino para subpíxeles atascados, y refrescador en movimiento que puede recuperar retención leve si se deja durante la noche.',
            'cta_start': 'Iniciar prueba', 'cta_more': 'Ver todas las herramientas',
        },
        'color-range-test': {
            'title': 'Prueba de Rango de Color - RGB Completo vs Limitado',
            'desc': 'Prueba gratuita de rango de color. Detecta si tu monitor usa RGB completo (0-255) o limitado / rango TV (16-235).',
            'kicker': 'Diagnóstico de pantalla',
            'h1': 'Prueba de Rango de Color',
            'lede': 'Los monitores RGB-completo muestran cada parche distinto de su vecino. Los de rango limitado aplastan los parches más oscuros y más brillantes en negro y blanco puros.',
            'cta_start': 'Ejecutar prueba', 'cta_more': 'Ver todas las herramientas',
        },
        'screen-uniformity-test': {
            'title': 'Prueba de Uniformidad de Pantalla - Nubes y IPS Glow',
            'desc': 'Prueba gratuita de uniformidad de pantalla. Pantalla completa gris, negro, blanco o RGB para detectar nubes IPS, brillo desigual y sangrado.',
            'kicker': 'Diagnóstico de pantalla',
            'h1': 'Prueba de Uniformidad de Pantalla',
            'lede': 'Elige un color y brillo, entra en pantalla completa y busca esquinas oscuras, manchas nubladas o desviación de tono en tu monitor. Diferentes colores revelan diferentes problemas.',
            'cta_start': 'Iniciar prueba', 'cta_more': 'Ver todas las herramientas',
        },
        'sound-test': {
            'title': 'Prueba de Sonido - Test de Canales de Altavoz y Auriculares',
            'desc': 'Prueba de sonido gratuita online. Verifica canales izquierdo, derecho y estéreo. Barrido de 100 Hz a 10 kHz.',
            'kicker': 'Diagnóstico de audio',
            'h1': 'Prueba de Sonido',
            'lede': 'Verifica tus canales izquierdo, derecho y estéreo con tonos sinusoidales puros. Usa el modo ping-pong para comparar los dos altavoces. Barrido de 100 Hz a 10 kHz para rango de frecuencia.',
            'cta_start': 'Iniciar prueba de sonido', 'cta_more': 'Ver todas las herramientas',
        },
    },
    'fr': {
        'edpi-calculator': {'title':"Calculateur eDPI - DPI Effectif pour FPS",'desc':"Calculateur eDPI gratuit (DPI x sensibilité) et cm/360 pour CS2, Valorant, Apex et autres FPS.",'kicker':"Calculateurs de sensibilité",'h1':"Calculateur eDPI - DPI Effectif pour FPS",'lede':"Calculez votre DPI effectif (eDPI = DPI x sensibilité) pour comparer la visée entre CS2, Valorant, Apex et autres FPS. Conversion cm/360 incluse.",'cta_start':"Calculer eDPI",'cta_more':"Voir tous les outils"},
        'aspect-ratio-calculator': {'title':"Calculateur de Ratio d'Aspect - Largeur, Hauteur, Ratio",'desc':"Calculateur de ratio gratuit. Entrez deux des trois - l'outil résout le troisième et simplifie.",'kicker':"Calculateurs d'écran",'h1':"Calculateur de Ratio d'Aspect",'lede':"Entrez deux des trois : largeur, hauteur ou ratio. L'outil simplifie en entiers (1920×1080 → 16:9) et affiche un aperçu en direct.",'cta_start':"Ouvrir le calculateur",'cta_more':"Voir tous les outils"},
        'screen-size-calculator': {'title':"Calculateur de Taille d'Écran - Diagonale, Largeur, Hauteur",'desc':"Calculateur de taille d'écran gratuit. Diagonale, largeur et hauteur en pouces et cm.",'kicker':"Calculateurs d'écran",'h1':"Calculateur de Taille d'Écran",'lede':"Entrez le ratio d'aspect et une mesure. L'outil calcule les deux autres en pouces et cm, plus la surface visible.",'cta_start':"Ouvrir le calculateur",'cta_more':"Voir tous les outils"},
        'viewing-distance-calculator': {'title':"Calculateur de Distance de Vision TV et Moniteur",'desc':"Calculateur de distance de vision gratuit. Recommandations THX, SMPTE et limite 4K UHD.",'kicker':"Calculateurs d'écran",'h1':"Calculateur de Distance de Vision",'lede':"À quelle distance s'asseoir d'une TV ou d'un moniteur ? THX (36° FoV immersif), SMPTE (30° cinéma), et la distance maximale de résolution 4K/8K.",'cta_start':"Ouvrir le calculateur",'cta_more':"Voir tous les outils"},
        'fps-test': {'title':"Test FPS - Fréquence d'Images du Navigateur",'desc':"Test FPS gratuit. Mesure en direct avec moyenne, min, max, 1%-low et détection 60/120/144/240 Hz.",'kicker':"Diagnostic performance",'h1':"Test FPS",'lede':"Mesure la fréquence d'images du navigateur en temps réel via requestAnimationFrame. Affiche FPS actuel, moyenne, min, max et 1%-low.",'cta_start':"Lancer le test",'cta_more':"Voir tous les outils"},
        'resolution-test': {'title':"Test de Résolution d'Écran - Résolution, DPR, Profondeur",'desc':"Test de résolution d'écran gratuit. Détecte résolution, DPR, profondeur couleur, gamut et viewport en direct.",'kicker':"Diagnostic écran",'h1':"Test de Résolution d'Écran",'lede':"Lecture instantanée de toutes les propriétés d'écran : résolution CSS + pixels natifs, DPR, profondeur couleur, gamut, viewport, orientation, ratio d'aspect. Mise à jour au redimensionnement.",'cta_start':"Voir ma résolution",'cta_more':"Voir tous les outils"},
        'apm-test': {'title':"Test APM - Actions Par Minute pour RTS et MOBA",'desc':"Test APM gratuit. Compte frappes et clics sur une fenêtre glissante de 60 s pour RTS et MOBA.",'kicker':"Diagnostic gaming",'h1':"Test APM",'lede':"Mesurez vos actions par minute pendant vos parties StarCraft, DotA, League of Legends et autres jeux où le micro compte. Fenêtre glissante de 60 s avec pic APM et moyenne.",'cta_start':"Lancer le test APM",'cta_more':"Voir tous les outils"},
        'mouse-spin-test': {'title':"Test de Rotation Souris - Compteur 360°",'desc':"Test de rotation souris gratuit. Compte les rotations complètes à 360°, pic de tours par seconde et direction.",'kicker':"Diagnostic souris",'h1':"Test de Rotation Souris",'lede':"Combien de rotations complètes à 360° pouvez-vous faire en 30 secondes ? Maintenez et tournez autour du centre du pad.",'cta_start':"Commencer à tourner",'cta_more':"Voir tous les outils"},
        'burn-in-test': {'title':"Test de Burn-In OLED - Rétention d'Image",'desc':"Test burn-in OLED gratuit. Cycle de couleurs pleines, damier et rafraîchisseur de pixels plein écran.",'kicker':"Diagnostic écran",'h1':"Test de Burn-In OLED",'lede':"Détectez la rétention d'image et le burn-in sur votre écran. Cycle 8 couleurs pleines, damier fin pour sous-pixels bloqués, et rafraîchisseur défilant pour la récupération OLED.",'cta_start':"Lancer le test",'cta_more':"Voir tous les outils"},
        'color-range-test': {'title':"Test de Plage de Couleur - RGB Complet vs Limité",'desc':"Test de plage de couleur gratuit. Détecte si votre moniteur est en RGB complet (0-255) ou limité (16-235).",'kicker':"Diagnostic écran",'h1':"Test de Plage de Couleur",'lede':"Les écrans RGB complet montrent chaque patch distinct. Les écrans en plage limitée écrasent les patches les plus sombres et les plus clairs en noir et blanc purs.",'cta_start':"Lancer le test",'cta_more':"Voir tous les outils"},
        'screen-uniformity-test': {'title':"Test d'Uniformité d'Écran - Clouding et IPS Glow",'desc':"Test d'uniformité d'écran gratuit. Plein écran gris, noir, blanc ou RGB pour détecter clouding, IPS glow et bleed.",'kicker':"Diagnostic écran",'h1':"Test d'Uniformité d'Écran",'lede':"Choisissez une couleur et luminosité, passez en plein écran et cherchez les coins sombres, taches nuageuses ou dérive de teinte. Différentes couleurs révèlent différents problèmes.",'cta_start':"Lancer le test",'cta_more':"Voir tous les outils"},
        'sound-test': {'title':"Test Audio - Canaux Haut-parleurs et Casques",'desc':"Test audio gratuit en ligne. Vérifiez canaux gauche, droit et stéréo. Balayage 100 Hz à 10 kHz.",'kicker':"Diagnostic audio",'h1':"Test Audio",'lede':"Vérifiez vos canaux gauche, droit et stéréo avec des sinus purs. Mode ping-pong pour A/B les deux haut-parleurs. Balayage 100 Hz → 10 kHz pour la plage de fréquence.",'cta_start':"Lancer le test audio",'cta_more':"Voir tous les outils"},
    },
    'de': {
        'edpi-calculator': {'title':"eDPI-Rechner - Effektive DPI für FPS",'desc':"Kostenloser eDPI-Rechner (DPI × Empfindlichkeit) und cm/360 für CS2, Valorant, Apex und andere FPS.",'kicker':"Empfindlichkeitsrechner",'h1':"eDPI-Rechner - Effektive DPI für FPS",'lede':"Berechne deine effektive DPI (eDPI = DPI × Empfindlichkeit) um Zielen in CS2, Valorant, Apex und anderen FPS zu vergleichen. cm/360-Umrechnung enthalten.",'cta_start':"eDPI berechnen",'cta_more':"Alle Tools"},
        'aspect-ratio-calculator': {'title':"Seitenverhältnis-Rechner - Breite, Höhe, Ratio",'desc':"Kostenloser Seitenverhältnis-Rechner. Gib zwei ein - das Tool löst das dritte und vereinfacht.",'kicker':"Bildschirm-Rechner",'h1':"Seitenverhältnis-Rechner",'lede':"Gib zwei von drei ein: Breite, Höhe oder Ratio. Vereinfacht automatisch auf ganze Zahlen (1920×1080 → 16:9) mit Live-Vorschau.",'cta_start':"Rechner öffnen",'cta_more':"Alle Tools"},
        'screen-size-calculator': {'title':"Bildschirmgrößen-Rechner - Diagonale, Breite, Höhe",'desc':"Kostenloser Bildschirmgrößen-Rechner. Diagonale, Breite und Höhe in Zoll und cm.",'kicker':"Bildschirm-Rechner",'h1':"Bildschirmgrößen-Rechner",'lede':"Gib Seitenverhältnis und eine Messung ein. Das Tool berechnet die anderen beiden in Zoll und cm plus die sichtbare Fläche.",'cta_start':"Rechner öffnen",'cta_more':"Alle Tools"},
        'viewing-distance-calculator': {'title':"Sehabstand-Rechner TV und Monitor",'desc':"Kostenloser Sehabstand-Rechner. THX, SMPTE und 4K UHD Empfehlungen.",'kicker':"Bildschirm-Rechner",'h1':"Sehabstand-Rechner",'lede':"Wie weit vom TV oder Monitor sitzen? THX (36° FoV immersiv), SMPTE (30° Kino) und die maximale 4K/8K Auflösungs-Distanz.",'cta_start':"Rechner öffnen",'cta_more':"Alle Tools"},
        'fps-test': {'title':"FPS-Test - Browser-Bildrate",'desc':"Kostenloser FPS-Test. Live-Messung mit Durchschnitt, Min, Max, 1%-Low und 60/120/144/240 Hz-Erkennung.",'kicker':"Performance-Diagnose",'h1':"FPS-Test",'lede':"Miss die Browser-Bildrate live via requestAnimationFrame. Zeigt aktuelle FPS, Durchschnitt, Min, Max und 1%-Low.",'cta_start':"Test starten",'cta_more':"Alle Tools"},
        'resolution-test': {'title':"Bildschirmauflösungs-Test - Auflösung, DPR, Farbtiefe",'desc':"Kostenloser Bildschirmauflösungs-Test. Auflösung, DPR, Farbtiefe, Gamut und Viewport live.",'kicker':"Bildschirm-Diagnose",'h1':"Bildschirmauflösungs-Test",'lede':"Sofortige Anzeige aller Bildschirm-Eigenschaften: CSS-Auflösung + native Pixel, DPR, Farbtiefe, Gamut, Viewport, Orientierung, Seitenverhältnis. Aktualisiert beim Skalieren.",'cta_start':"Meine Auflösung",'cta_more':"Alle Tools"},
        'apm-test': {'title':"APM-Test - Aktionen pro Minute für RTS und MOBA",'desc':"Kostenloser APM-Test. Zählt Tasten und Klicks in einem 60 s rollenden Fenster für RTS und MOBA.",'kicker':"Gaming-Diagnose",'h1':"APM-Test",'lede':"Miss deine Aktionen pro Minute während StarCraft, DotA, LoL und anderer micro-lastiger Spiele. 60 s rollendes Fenster mit Peak-APM und Session-Durchschnitt.",'cta_start':"APM-Test starten",'cta_more':"Alle Tools"},
        'mouse-spin-test': {'title':"Maus-Dreh-Test - 360° Rotations-Zähler",'desc':"Kostenloser Maus-Dreh-Test. Zählt volle 360°-Rotationen, Peak Spins/Sekunde und Richtung.",'kicker':"Maus-Diagnose",'h1':"Maus-Dreh-Test",'lede':"Wie viele volle 360°-Rotationen schaffst du mit der Maus in 30 Sekunden? Halten und um den Mittelpunkt drehen.",'cta_start':"Losdrehen",'cta_more':"Alle Tools"},
        'burn-in-test': {'title':"OLED Burn-In-Test - Bildretention",'desc':"Kostenloser OLED Burn-In-Test. Farb-Vollbild-Zyklus, Schachbrett und Pixel-Refresher.",'kicker':"Bildschirm-Diagnose",'h1':"OLED Burn-In-Test",'lede':"Erkenne Bildretention und Burn-In. 8-Farb-Vollbild-Zyklus, feines Schachbrett für festsitzende Subpixel und rollender Refresher zur OLED-Erholung.",'cta_start':"Test starten",'cta_more':"Alle Tools"},
        'color-range-test': {'title':"Farbumfang-Test - Voll-RGB vs Eingeschränkt",'desc':"Kostenloser Farbumfang-Test. Erkennt Voll-RGB (0-255) vs eingeschränkt / TV-Bereich (16-235).",'kicker':"Bildschirm-Diagnose",'h1':"Farbumfang-Test",'lede':"Voll-RGB-Monitore zeigen jeden Patch unterscheidbar. Eingeschränkte Bereiche zermalmen die dunkelsten und hellsten Patches zu pures Schwarz und Weiß.",'cta_start':"Test starten",'cta_more':"Alle Tools"},
        'screen-uniformity-test': {'title':"Bildschirm-Uniformitäts-Test - Clouding und IPS Glow",'desc':"Kostenloser Bildschirm-Uniformitäts-Test. Vollbild Grau, Schwarz, Weiß, RGB für Clouding, IPS Glow und Bleed.",'kicker':"Bildschirm-Diagnose",'h1':"Bildschirm-Uniformitäts-Test",'lede':"Wähle Farbe und Helligkeit, geh ins Vollbild und suche dunkle Ecken, wolkige Flecken oder Farbton-Drift. Verschiedene Farben zeigen verschiedene Probleme.",'cta_start':"Test starten",'cta_more':"Alle Tools"},
        'sound-test': {'title':"Sound-Test - Lautsprecher- und Kopfhörer-Kanaltest",'desc':"Kostenloser Online-Sound-Test. Prüfe linke, rechte und Stereo-Kanäle. Sweep 100 Hz bis 10 kHz.",'kicker':"Audio-Diagnose",'h1':"Sound-Test",'lede':"Prüfe linke, rechte und Stereo-Kanäle mit reinen Sinus-Tönen. Ping-Pong-Modus für A/B der zwei Lautsprecher. Sweep 100 Hz → 10 kHz für den Frequenzbereich.",'cta_start':"Sound-Test starten",'cta_more':"Alle Tools"},
    },
    'pt': {
        'edpi-calculator': {'title':"Calculadora eDPI - DPI Efetivo para FPS",'desc':"Calculadora eDPI gratuita (DPI × sensibilidade) e cm/360 para CS2, Valorant, Apex e outros FPS.",'kicker':"Calculadoras de sensibilidade",'h1':"Calculadora eDPI - DPI Efetivo",'lede':"Calcule seu DPI efetivo (eDPI = DPI × sensibilidade) para comparar mira em CS2, Valorant, Apex e outros FPS. Inclui conversão cm/360.",'cta_start':"Calcular eDPI",'cta_more':"Todas as ferramentas"},
        'aspect-ratio-calculator': {'title':"Calculadora de Proporção - Largura, Altura, Razão",'desc':"Calculadora de proporção gratuita. Digite dois - a ferramenta resolve o terceiro.",'kicker':"Calculadoras de tela",'h1':"Calculadora de Proporção",'lede':"Informe dois de três: largura, altura ou razão. Simplifica automaticamente para inteiros (1920×1080 → 16:9) com prévia ao vivo.",'cta_start':"Abrir calculadora",'cta_more':"Todas as ferramentas"},
        'screen-size-calculator': {'title':"Calculadora de Tamanho de Tela - Diagonal, Largura, Altura",'desc':"Calculadora de tamanho de tela gratuita. Diagonal, largura e altura em polegadas e cm.",'kicker':"Calculadoras de tela",'h1':"Calculadora de Tamanho de Tela",'lede':"Informe a proporção e uma medida. A ferramenta calcula as outras duas em polegadas e cm, mais a área visível.",'cta_start':"Abrir calculadora",'cta_more':"Todas as ferramentas"},
        'viewing-distance-calculator': {'title':"Calculadora de Distância de Visão TV e Monitor",'desc':"Calculadora de distância de visão gratuita. Recomendações THX, SMPTE e limite 4K UHD.",'kicker':"Calculadoras de tela",'h1':"Calculadora de Distância de Visão",'lede':"A que distância sentar da TV ou monitor? THX (36° FoV imersivo), SMPTE (30° cinema) e a distância máxima de resolução 4K/8K.",'cta_start':"Abrir calculadora",'cta_more':"Todas as ferramentas"},
        'fps-test': {'title':"Teste de FPS - Taxa de Quadros do Navegador",'desc':"Teste de FPS gratuito. Medição ao vivo com média, min, max, 1%-low e detecção 60/120/144/240 Hz.",'kicker':"Diagnóstico de desempenho",'h1':"Teste de FPS",'lede':"Mede a taxa de quadros do navegador ao vivo via requestAnimationFrame. Mostra FPS atual, média, min, max e 1%-low.",'cta_start':"Iniciar teste",'cta_more':"Todas as ferramentas"},
        'resolution-test': {'title':"Teste de Resolução de Tela - Resolução, DPR, Cor",'desc':"Teste de resolução gratuito. Detecta resolução, DPR, profundidade de cor, gamut e viewport ao vivo.",'kicker':"Diagnóstico de tela",'h1':"Teste de Resolução de Tela",'lede':"Leitura imediata de todas as propriedades da tela: resolução CSS + pixels nativos, DPR, profundidade, gamut, viewport, orientação, proporção. Atualiza no redimensionamento.",'cta_start':"Ver minha resolução",'cta_more':"Todas as ferramentas"},
        'apm-test': {'title':"Teste de APM - Ações Por Minuto para RTS e MOBA",'desc':"Teste de APM gratuito. Conta teclas e cliques em janela rolante de 60 s para RTS e MOBA.",'kicker':"Diagnóstico de gaming",'h1':"Teste de APM",'lede':"Meça suas ações por minuto em StarCraft, DotA, LoL e outros jogos onde o micro importa. Janela rolante de 60 s com APM pico e média.",'cta_start':"Iniciar teste de APM",'cta_more':"Todas as ferramentas"},
        'mouse-spin-test': {'title':"Teste de Giro do Mouse - Contador 360°",'desc':"Teste de giro do mouse gratuito. Conta rotações completas de 360°, pico de giros/seg e direção.",'kicker':"Diagnóstico de mouse",'h1':"Teste de Giro do Mouse",'lede':"Quantas rotações completas de 360° você consegue em 30 segundos? Segure e gire em torno do centro do pad.",'cta_start':"Começar a girar",'cta_more':"Todas as ferramentas"},
        'burn-in-test': {'title':"Teste de Burn-In OLED - Retenção de Imagem",'desc':"Teste de burn-in OLED gratuito. Ciclo de cores sólidas, xadrez e atualizador de pixels em tela cheia.",'kicker':"Diagnóstico de tela",'h1':"Teste de Burn-In OLED",'lede':"Detecte retenção de imagem e burn-in. Ciclo de 8 cores sólidas, xadrez fino para subpixels travados e atualizador deslizante para recuperação OLED.",'cta_start':"Iniciar teste",'cta_more':"Todas as ferramentas"},
        'color-range-test': {'title':"Teste de Faixa de Cor - RGB Completo vs Limitado",'desc':"Teste de faixa de cor gratuito. Detecta RGB completo (0-255) vs limitado / faixa TV (16-235).",'kicker':"Diagnóstico de tela",'h1':"Teste de Faixa de Cor",'lede':"Monitores RGB completo mostram cada patch distinto. Faixa limitada esmaga os patches mais escuros e mais claros em preto e branco puros.",'cta_start':"Executar teste",'cta_more':"Todas as ferramentas"},
        'screen-uniformity-test': {'title':"Teste de Uniformidade de Tela - Clouding e IPS Glow",'desc':"Teste de uniformidade gratuito. Tela cheia cinza, preto, branco ou RGB para clouding, IPS glow e bleed.",'kicker':"Diagnóstico de tela",'h1':"Teste de Uniformidade de Tela",'lede':"Escolha cor e brilho, entre em tela cheia e procure cantos escuros, manchas nebulosas ou desvio de tom. Cores diferentes revelam problemas diferentes.",'cta_start':"Iniciar teste",'cta_more':"Todas as ferramentas"},
        'sound-test': {'title':"Teste de Som - Canais de Alto-falante e Fones",'desc':"Teste de som gratuito online. Verifica canais esquerdo, direito e estéreo. Varredura 100 Hz a 10 kHz.",'kicker':"Diagnóstico de áudio",'h1':"Teste de Som",'lede':"Verifique canais esquerdo, direito e estéreo com ondas senoidais puras. Modo ping-pong para A/B dos dois alto-falantes. Varredura 100 Hz → 10 kHz.",'cta_start':"Iniciar teste de som",'cta_more':"Todas as ferramentas"},
    },
    'ar': {
        'edpi-calculator': {'title':"حاسبة eDPI - DPI الفعال لألعاب FPS",'desc':"حاسبة eDPI مجانية (DPI × الحساسية) و cm/360 لـCS2 وValorant وApex وغيرها.",'kicker':"حاسبات الحساسية",'h1':"حاسبة eDPI - DPI الفعال",'lede':"احسب DPI الفعال (eDPI = DPI × الحساسية) لمقارنة التصويب بين CS2 وValorant وApex. يشمل تحويل cm/360.",'cta_start':"احسب eDPI",'cta_more':"كل الأدوات"},
        'aspect-ratio-calculator': {'title':"حاسبة نسبة العرض - العرض والارتفاع والنسبة",'desc':"حاسبة نسبة عرض مجانية. أدخل اثنتين - تحل الأداة الثالثة.",'kicker':"حاسبات الشاشة",'h1':"حاسبة نسبة العرض إلى الارتفاع",'lede':"أدخل اثنتين من ثلاث: العرض أو الارتفاع أو النسبة. تبسط تلقائيًا إلى أعداد صحيحة (1920×1080 → 16:9) مع معاينة حية.",'cta_start':"افتح الحاسبة",'cta_more':"كل الأدوات"},
        'screen-size-calculator': {'title':"حاسبة حجم الشاشة - القطر والعرض والارتفاع",'desc':"حاسبة حجم شاشة مجانية. القطر والعرض والارتفاع بالبوصة والسنتيمتر.",'kicker':"حاسبات الشاشة",'h1':"حاسبة حجم الشاشة",'lede':"أدخل نسبة العرض وقياسًا واحدًا. تحسب الأداة القياسين الآخرين بالبوصة والسنتيمتر مع المساحة المرئية.",'cta_start':"افتح الحاسبة",'cta_more':"كل الأدوات"},
        'viewing-distance-calculator': {'title':"حاسبة مسافة المشاهدة للتلفاز والشاشة",'desc':"حاسبة مسافة مشاهدة مجانية. توصيات THX وSMPTE وحد 4K UHD.",'kicker':"حاسبات الشاشة",'h1':"حاسبة مسافة المشاهدة",'lede':"على أي مسافة تجلس من التلفاز أو الشاشة؟ THX (36° FoV غامر)، SMPTE (30° سينما)، والحد الأقصى لدقة 4K/8K.",'cta_start':"افتح الحاسبة",'cta_more':"كل الأدوات"},
        'fps-test': {'title':"اختبار FPS - معدل إطارات المتصفح",'desc':"اختبار FPS مجاني. قياس حي بالمتوسط والحد الأدنى والأقصى و1%-low وكشف 60/120/144/240 هرتز.",'kicker':"تشخيص الأداء",'h1':"اختبار FPS",'lede':"قياس معدل إطارات المتصفح لحظيًا عبر requestAnimationFrame. يعرض FPS الحالي والمتوسط والأدنى والأقصى و1%-low.",'cta_start':"ابدأ الاختبار",'cta_more':"كل الأدوات"},
        'resolution-test': {'title':"اختبار دقة الشاشة - الدقة وDPR وعمق الألوان",'desc':"اختبار دقة شاشة مجاني. يكتشف الدقة وDPR وعمق الألوان والنطاق والعرض لحظيًا.",'kicker':"تشخيص الشاشة",'h1':"اختبار دقة الشاشة",'lede':"قراءة فورية لكل خصائص الشاشة: الدقة CSS والبكسلات الأصلية وDPR وعمق الألوان والنطاق والعرض والاتجاه ونسبة العرض. يتحدث عند تغيير الحجم.",'cta_start':"اعرض دقتي",'cta_more':"كل الأدوات"},
        'apm-test': {'title':"اختبار APM - الإجراءات في الدقيقة لألعاب RTS وMOBA",'desc':"اختبار APM مجاني. يعد المفاتيح والنقرات في نافذة متحركة من 60 ثانية لـRTS وMOBA.",'kicker':"تشخيص الألعاب",'h1':"اختبار APM",'lede':"قس إجراءاتك في الدقيقة أثناء StarCraft وDotA وLoL وألعاب الاستراتيجية الأخرى. نافذة متحركة من 60 ثانية مع ذروة APM ومتوسط الجلسة.",'cta_start':"ابدأ اختبار APM",'cta_more':"كل الأدوات"},
        'mouse-spin-test': {'title':"اختبار دوران الماوس - عداد 360°",'desc':"اختبار دوران الماوس مجاني. يعد الدورات الكاملة 360° وذروة الدورات في الثانية والاتجاه.",'kicker':"تشخيص الماوس",'h1':"اختبار دوران الماوس",'lede':"كم دورة كاملة 360° يمكنك القيام بها في 30 ثانية؟ اضغط وحرك حول نقطة المركز.",'cta_start':"ابدأ الدوران",'cta_more':"كل الأدوات"},
        'burn-in-test': {'title':"اختبار حرق OLED - احتجاز الصورة",'desc':"اختبار حرق OLED مجاني. دورة ألوان صلبة ورقعة شطرنج ومجدد بكسل ملء الشاشة.",'kicker':"تشخيص الشاشة",'h1':"اختبار حرق OLED",'lede':"اكتشف احتجاز الصورة والحرق في شاشتك. دورة 8 ألوان صلبة، رقعة شطرنج دقيقة للبكسلات العالقة، ومجدد متحرك لاستعادة OLED.",'cta_start':"ابدأ الاختبار",'cta_more':"كل الأدوات"},
        'color-range-test': {'title':"اختبار نطاق الألوان - RGB كامل مقابل محدود",'desc':"اختبار نطاق ألوان مجاني. يكتشف RGB الكامل (0-255) مقابل المحدود (16-235).",'kicker':"تشخيص الشاشة",'h1':"اختبار نطاق الألوان",'lede':"شاشات RGB الكامل تظهر كل رقعة مميزة. النطاق المحدود يسحق الرقع الأغمق والأفتح إلى أسود وأبيض خالصين.",'cta_start':"ابدأ الاختبار",'cta_more':"كل الأدوات"},
        'screen-uniformity-test': {'title':"اختبار تجانس الشاشة - الغيوم وIPS Glow",'desc':"اختبار تجانس شاشة مجاني. ملء الشاشة بالرمادي أو الأسود أو الأبيض أو RGB.",'kicker':"تشخيص الشاشة",'h1':"اختبار تجانس الشاشة",'lede':"اختر لونًا وسطوعًا، ادخل ملء الشاشة وابحث عن الزوايا المظلمة أو البقع الغائمة أو انحراف اللون. ألوان مختلفة تكشف مشاكل مختلفة.",'cta_start':"ابدأ الاختبار",'cta_more':"كل الأدوات"},
        'sound-test': {'title':"اختبار الصوت - اختبار قنوات السماعات والأذن",'desc':"اختبار صوت مجاني عبر الإنترنت. تحقق من القنوات اليسرى واليمنى والستيريو. مسح 100 هرتز إلى 10 كيلو هرتز.",'kicker':"تشخيص الصوت",'h1':"اختبار الصوت",'lede':"تحقق من قنواتك اليسرى واليمنى والستيريو بنغمات جيبية نقية. وضع بينج-بونج لمقارنة السماعتين. مسح 100 هرتز → 10 كيلو هرتز لنطاق التردد.",'cta_start':"ابدأ اختبار الصوت",'cta_more':"كل الأدوات"},
    },
    'ru': {
        'edpi-calculator': {'title':"Калькулятор eDPI - Эффективный DPI для FPS",'desc':"Бесплатный калькулятор eDPI (DPI × чувствительность) и cm/360 для CS2, Valorant, Apex и других FPS.",'kicker':"Калькуляторы чувствительности",'h1':"Калькулятор eDPI - Эффективный DPI",'lede':"Рассчитайте ваш эффективный DPI (eDPI = DPI × чувствительность) для сравнения прицеливания в CS2, Valorant, Apex. Включает конвертацию cm/360.",'cta_start':"Рассчитать eDPI",'cta_more':"Все инструменты"},
        'aspect-ratio-calculator': {'title':"Калькулятор соотношения сторон - Ширина, Высота",'desc':"Бесплатный калькулятор соотношения. Введите два из трёх - инструмент решит третье.",'kicker':"Калькуляторы экрана",'h1':"Калькулятор соотношения сторон",'lede':"Введите два из трёх: ширина, высота или соотношение. Автоматически упрощает до целых (1920×1080 → 16:9) с живым превью.",'cta_start':"Открыть калькулятор",'cta_more':"Все инструменты"},
        'screen-size-calculator': {'title':"Калькулятор размера экрана - Диагональ, Ширина",'desc':"Бесплатный калькулятор размера. Диагональ, ширина, высота в дюймах и см.",'kicker':"Калькуляторы экрана",'h1':"Калькулятор размера экрана",'lede':"Введите соотношение сторон и одно измерение. Инструмент рассчитывает другие два в дюймах и см плюс видимую площадь.",'cta_start':"Открыть калькулятор",'cta_more':"Все инструменты"},
        'viewing-distance-calculator': {'title':"Калькулятор дистанции просмотра ТВ и Монитор",'desc':"Бесплатный калькулятор дистанции. Рекомендации THX, SMPTE и 4K UHD предел.",'kicker':"Калькуляторы экрана",'h1':"Калькулятор дистанции просмотра",'lede':"На каком расстоянии сидеть от ТВ или монитора? THX (36° FoV погружение), SMPTE (30° кино) и максимальная дистанция различимости 4K/8K.",'cta_start':"Открыть калькулятор",'cta_more':"Все инструменты"},
        'fps-test': {'title':"Тест FPS - Частота кадров браузера",'desc':"Бесплатный тест FPS. Живое измерение со средним, мин, макс, 1%-low и определением 60/120/144/240 Гц.",'kicker':"Диагностика производительности",'h1':"Тест FPS",'lede':"Живое измерение FPS браузера через requestAnimationFrame. Показывает текущий FPS, среднее, мин, макс и 1%-low.",'cta_start':"Запустить тест",'cta_more':"Все инструменты"},
        'resolution-test': {'title':"Тест разрешения экрана - Разрешение, DPR, цвет",'desc':"Бесплатный тест разрешения. Обнаруживает разрешение, DPR, глубину цвета, гамму и viewport.",'kicker':"Диагностика экрана",'h1':"Тест разрешения экрана",'lede':"Мгновенное чтение всех свойств экрана: CSS разрешение + физические пиксели, DPR, глубина цвета, гамма, viewport, ориентация, соотношение сторон. Обновляется при изменении размера.",'cta_start':"Моё разрешение",'cta_more':"Все инструменты"},
        'apm-test': {'title':"Тест APM - Действий в минуту для RTS и MOBA",'desc':"Бесплатный тест APM. Считает нажатия и клики в плавающем 60 с окне для RTS и MOBA.",'kicker':"Диагностика игр",'h1':"Тест APM",'lede':"Измеряй свои действия в минуту во время StarCraft, DotA, LoL и других игр, где важен микро. Плавающее 60 с окно с пиковым APM и средним.",'cta_start':"Запустить тест APM",'cta_more':"Все инструменты"},
        'mouse-spin-test': {'title':"Тест вращения мыши - Счётчик 360°",'desc':"Бесплатный тест вращения мыши. Считает полные 360° вращения, пиковые вращения/сек и направление.",'kicker':"Диагностика мыши",'h1':"Тест вращения мыши",'lede':"Сколько полных 360° вращений мышью за 30 секунд? Зажмите и крутите вокруг центра.",'cta_start':"Начать вращать",'cta_more':"Все инструменты"},
        'burn-in-test': {'title':"Тест выгорания OLED - Остаточное изображение",'desc':"Бесплатный тест выгорания OLED. Цикл сплошных цветов, шахматка и бегущий обновитель пикселей.",'kicker':"Диагностика экрана",'h1':"Тест выгорания OLED",'lede':"Обнаружьте остаточные изображения и выгорание. Цикл 8 сплошных цветов, мелкая шахматка для залипших субпикселей и бегущий обновитель для восстановления OLED.",'cta_start':"Запустить тест",'cta_more':"Все инструменты"},
        'color-range-test': {'title':"Тест диапазона цвета - Полный RGB vs Ограниченный",'desc':"Бесплатный тест диапазона цвета. Обнаруживает полный RGB (0-255) vs ограниченный (16-235).",'kicker':"Диагностика экрана",'h1':"Тест диапазона цвета",'lede':"Мониторы с полным RGB показывают каждый патч отличным от соседа. Ограниченный диапазон размазывает самые тёмные и самые светлые патчи в чисто чёрный и белый.",'cta_start':"Запустить тест",'cta_more':"Все инструменты"},
        'screen-uniformity-test': {'title':"Тест равномерности экрана - Облака и IPS Glow",'desc':"Бесплатный тест равномерности. Полноэкранный серый, чёрный, белый или RGB для обнаружения облаков, IPS glow и засветки.",'kicker':"Диагностика экрана",'h1':"Тест равномерности экрана",'lede':"Выберите цвет и яркость, войдите в полноэкранный режим и ищите тёмные углы, облачные пятна или дрейф оттенка. Разные цвета выявляют разные проблемы.",'cta_start':"Запустить тест",'cta_more':"Все инструменты"},
        'sound-test': {'title':"Тест звука - Тест каналов колонок и наушников",'desc':"Бесплатный онлайн тест звука. Проверка левого, правого и стерео каналов. Свип 100 Гц до 10 кГц.",'kicker':"Диагностика аудио",'h1':"Тест звука",'lede':"Проверьте левый, правый и стерео каналы чистыми синусоидами. Режим пинг-понг для A/B двух колонок. Свип 100 Гц → 10 кГц для частотного диапазона.",'cta_start':"Запустить тест звука",'cta_more':"Все инструменты"},
    },
    'ja': {
        'edpi-calculator': {'title':"eDPI計算機 - FPS向け有効DPI",'desc':"無料のeDPI計算機（DPI × 感度）とcm/360。CS2、Valorant、Apexなど対応。",'kicker':"感度計算機",'h1':"eDPI計算機 - 有効DPI",'lede':"有効DPI（eDPI = DPI × 感度）を計算し、CS2・Valorant・Apexなどのエイムを比較できます。cm/360変換も含む。",'cta_start':"eDPIを計算",'cta_more':"全ツール"},
        'aspect-ratio-calculator': {'title':"アスペクト比計算機 - 幅・高さ・比率",'desc':"無料のアスペクト比計算機。2つ入力すると3つ目を解決。",'kicker':"画面計算機",'h1':"アスペクト比計算機",'lede':"幅・高さ・比率の3つのうち2つを入力。自動で整数に簡約（1920×1080 → 16:9）しライブプレビュー表示。",'cta_start':"計算機を開く",'cta_more':"全ツール"},
        'screen-size-calculator': {'title':"画面サイズ計算機 - 対角・幅・高さ",'desc':"無料の画面サイズ計算機。対角・幅・高さをインチとcmで。",'kicker':"画面計算機",'h1':"画面サイズ計算機",'lede':"アスペクト比と1つの寸法を入力。残り2つの寸法をインチとcmで計算し、可視面積も表示。",'cta_start':"計算機を開く",'cta_more':"全ツール"},
        'viewing-distance-calculator': {'title':"視聴距離計算機 - TV・モニター",'desc':"無料の視聴距離計算機。THX・SMPTE・4K UHD推奨値。",'kicker':"画面計算機",'h1':"視聴距離計算機",'lede':"TVやモニターから何mに座るべきか？THX（36° FoV 没入型）、SMPTE（30° 映画館）、4K/8K解像度の最大距離。",'cta_start':"計算機を開く",'cta_more':"全ツール"},
        'fps-test': {'title':"FPSテスト - ブラウザのフレームレート",'desc':"無料FPSテスト。平均・最小・最大・1%-lowのライブ計測と60/120/144/240Hz判定。",'kicker':"パフォーマンス診断",'h1':"FPSテスト",'lede':"requestAnimationFrameでブラウザのフレームレートをライブ計測。現在FPS、平均、最小、最大、1%-lowを表示。",'cta_start':"テスト開始",'cta_more':"全ツール"},
        'resolution-test': {'title':"画面解像度テスト - 解像度・DPR・色深度",'desc':"無料の画面解像度テスト。解像度・DPR・色深度・色域・ビューポートをライブ表示。",'kicker':"ディスプレイ診断",'h1':"画面解像度テスト",'lede':"画面のすべてのプロパティを即時表示：CSS解像度＋ネイティブピクセル、DPR、色深度、色域、ビューポート、向き、アスペクト比。リサイズで更新。",'cta_start':"解像度を見る",'cta_more':"全ツール"},
        'apm-test': {'title':"APMテスト - RTS・MOBA用 分あたりアクション",'desc':"無料APMテスト。キー押下とクリックを60秒ローリングウィンドウでカウント。",'kicker':"ゲーミング診断",'h1':"APMテスト",'lede':"StarCraft・DotA・LoLなどマイクロ重視のゲームで、分あたりのアクション数を計測。60秒ローリングウィンドウにピークAPMとセッション平均。",'cta_start':"APMテスト開始",'cta_more':"全ツール"},
        'mouse-spin-test': {'title':"マウス回転テスト - 360°回転カウンター",'desc':"無料のマウス回転テスト。360°回転数、ピーク回転/秒、方向を計測。",'kicker':"マウス診断",'h1':"マウス回転テスト",'lede':"30秒間に360°回転を何回できますか？中心点の周りで押下ドラッグするだけ。",'cta_start':"回転開始",'cta_more':"全ツール"},
        'burn-in-test': {'title':"OLED焼き付きテスト - 画像保持",'desc':"無料のOLED焼き付きテスト。単色サイクル、市松模様、スクロールリフレッシャー。",'kicker':"ディスプレイ診断",'h1':"OLED焼き付きテスト",'lede':"画面の画像保持と焼き付きを検出。8色の単色サイクル、固着サブピクセル用の細かい市松模様、OLED回復用のスクロールリフレッシャー。",'cta_start':"テスト開始",'cta_more':"全ツール"},
        'color-range-test': {'title':"カラーレンジテスト - フルRGB vs 制限範囲",'desc':"無料のカラーレンジテスト。フルRGB（0-255）と制限範囲（16-235）を判別。",'kicker':"ディスプレイ診断",'h1':"カラーレンジテスト",'lede':"フルRGBモニターは各パッチを隣と区別して表示。制限範囲では最暗部と最明部のパッチが純黒・純白につぶれて同じに見えます。",'cta_start':"テスト実行",'cta_more':"全ツール"},
        'screen-uniformity-test': {'title':"画面ユニフォーミティテスト - クラウディング、IPSグロー",'desc':"無料のユニフォーミティテスト。フルスクリーンで灰・黒・白・RGBを表示しクラウディング、IPSグロー、バックライト漏れを検出。",'kicker':"ディスプレイ診断",'h1':"画面ユニフォーミティテスト",'lede':"色と明るさを選びフルスクリーンに切り替え、暗い角、雲状の斑、色相ドリフトを観察。色ごとに異なる問題が浮き上がります。",'cta_start':"テスト開始",'cta_more':"全ツール"},
        'sound-test': {'title':"サウンドテスト - スピーカー・ヘッドフォンのチャンネル確認",'desc':"無料のオンラインサウンドテスト。左・右・ステレオの確認、100 Hz～10 kHzスイープ。",'kicker':"オーディオ診断",'h1':"サウンドテスト",'lede':"純粋な正弦波で左・右・ステレオチャンネルを確認。ピンポンモードで両スピーカーをA/B比較。100 Hz → 10 kHzのスイープで周波数帯域も確認。",'cta_start':"サウンドテスト開始",'cta_more':"全ツール"},
    },
    'ko': {
        'edpi-calculator': {'title':"eDPI 계산기 - FPS용 유효 DPI",'desc':"무료 eDPI 계산기(DPI × 감도) 및 cm/360. CS2, Valorant, Apex 등 지원.",'kicker':"감도 계산기",'h1':"eDPI 계산기 - 유효 DPI",'lede':"유효 DPI(eDPI = DPI × 감도)를 계산하여 CS2, Valorant, Apex 등의 에임을 비교하세요. cm/360 변환 포함.",'cta_start':"eDPI 계산",'cta_more':"모든 도구"},
        'aspect-ratio-calculator': {'title':"화면 비율 계산기 - 가로, 세로, 비율",'desc':"무료 화면 비율 계산기. 두 개만 입력하면 세 번째를 계산.",'kicker':"화면 계산기",'h1':"화면 비율 계산기",'lede':"가로·세로·비율 중 두 가지를 입력하세요. 정수로 자동 간소화(1920×1080 → 16:9)하고 실시간 미리보기.",'cta_start':"계산기 열기",'cta_more':"모든 도구"},
        'screen-size-calculator': {'title':"화면 크기 계산기 - 대각선, 가로, 세로",'desc':"무료 화면 크기 계산기. 인치와 cm 단위로 대각선, 가로, 세로 계산.",'kicker':"화면 계산기",'h1':"화면 크기 계산기",'lede':"화면 비율과 한 가지 치수를 입력하세요. 나머지 두 치수를 인치와 cm로 계산하고 가시 영역도 표시.",'cta_start':"계산기 열기",'cta_more':"모든 도구"},
        'viewing-distance-calculator': {'title':"시청 거리 계산기 - TV, 모니터",'desc':"무료 시청 거리 계산기. THX, SMPTE, 4K UHD 권장값.",'kicker':"화면 계산기",'h1':"시청 거리 계산기",'lede':"TV나 모니터로부터 몇 미터 앉아야 할까? THX(36° FoV 몰입), SMPTE(30° 영화관), 4K/8K 해상도 최대 거리.",'cta_start':"계산기 열기",'cta_more':"모든 도구"},
        'fps-test': {'title':"FPS 테스트 - 브라우저 프레임 레이트",'desc':"무료 FPS 테스트. 평균·최소·최대·1%-low 실시간 측정과 60/120/144/240 Hz 감지.",'kicker':"성능 진단",'h1':"FPS 테스트",'lede':"requestAnimationFrame으로 브라우저 프레임 레이트 실시간 측정. 현재 FPS, 평균, 최소, 최대, 1%-low 표시.",'cta_start':"테스트 시작",'cta_more':"모든 도구"},
        'resolution-test': {'title':"화면 해상도 테스트 - 해상도, DPR, 색 심도",'desc':"무료 해상도 테스트. 해상도, DPR, 색 심도, 색 영역, 뷰포트를 실시간 표시.",'kicker':"디스플레이 진단",'h1':"화면 해상도 테스트",'lede':"화면의 모든 속성을 즉시 표시: CSS 해상도 + 물리 픽셀, DPR, 색 심도, 색 영역, 뷰포트, 방향, 화면 비율. 크기 변경 시 갱신.",'cta_start':"내 해상도 보기",'cta_more':"모든 도구"},
        'apm-test': {'title':"APM 테스트 - RTS·MOBA용 분당 액션",'desc':"무료 APM 테스트. 키와 클릭을 60초 롤링 윈도우로 카운트. RTS·MOBA용.",'kicker':"게이밍 진단",'h1':"APM 테스트",'lede':"StarCraft, DotA, LoL 등 마이크로가 중요한 게임에서 분당 액션을 측정. 60초 롤링 윈도우와 피크 APM, 세션 평균.",'cta_start':"APM 테스트 시작",'cta_more':"모든 도구"},
        'mouse-spin-test': {'title':"마우스 스핀 테스트 - 360° 회전 카운터",'desc':"무료 마우스 스핀 테스트. 360° 회전 수, 피크 스핀/초, 방향 측정.",'kicker':"마우스 진단",'h1':"마우스 스핀 테스트",'lede':"30초 동안 마우스로 360° 회전을 몇 번 할 수 있나요? 중심점 주위에서 누른 채 드래그.",'cta_start':"스핀 시작",'cta_more':"모든 도구"},
        'burn-in-test': {'title':"OLED 번인 테스트 - 이미지 잔상",'desc':"무료 OLED 번인 테스트. 단색 사이클, 체커보드, 스크롤 리프레셔 전체화면.",'kicker':"디스플레이 진단",'h1':"OLED 번인 테스트",'lede':"화면의 이미지 잔상과 번인을 감지. 8가지 단색 사이클, 고착 서브픽셀용 미세 체커보드, OLED 회복용 스크롤 리프레셔.",'cta_start':"테스트 시작",'cta_more':"모든 도구"},
        'color-range-test': {'title':"색상 범위 테스트 - 풀 RGB vs 제한 범위",'desc':"무료 색상 범위 테스트. 풀 RGB(0-255)와 제한 범위(16-235)를 감지.",'kicker':"디스플레이 진단",'h1':"색상 범위 테스트",'lede':"풀 RGB 모니터는 각 패치를 이웃과 구분하여 표시. 제한 범위는 가장 어두운/밝은 패치를 순수 검정·흰색으로 뭉갭니다.",'cta_start':"테스트 실행",'cta_more':"모든 도구"},
        'screen-uniformity-test': {'title':"화면 균일도 테스트 - 클라우딩, IPS 글로우",'desc':"무료 화면 균일도 테스트. 전체화면 회색·검정·흰색·RGB로 클라우딩, IPS 글로우, 백라이트 번짐 감지.",'kicker':"디스플레이 진단",'h1':"화면 균일도 테스트",'lede':"색상과 밝기를 선택하고 전체화면으로 진입해 어두운 구석, 구름 무늬, 색조 표류를 찾으세요. 색상마다 다른 문제가 드러납니다.",'cta_start':"테스트 시작",'cta_more':"모든 도구"},
        'sound-test': {'title':"사운드 테스트 - 스피커·헤드폰 채널 확인",'desc':"무료 온라인 사운드 테스트. 좌·우·스테레오 채널 확인, 100 Hz~10 kHz 스윕.",'kicker':"오디오 진단",'h1':"사운드 테스트",'lede':"순수 사인파로 좌·우·스테레오 채널을 확인. 핑퐁 모드로 두 스피커 A/B 비교. 100 Hz → 10 kHz 스윕으로 주파수 범위.",'cta_start':"사운드 테스트 시작",'cta_more':"모든 도구"},
    },
}


LANDING_TEMPLATE = '''<?php
/**
 * {lang_name} localized landing page for {slug}
 * Auto-generated by generate-locales.py. Edit translations in that file.
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-{code}.php'; if (file_exists($__c)) include $__c;
$pageTitle = {title_php};
$pageDescription = {desc_php};
?>
<!DOCTYPE html>
<html lang="{code}"{dir_attr}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('{slug}.php'); ?>">
  <link rel="alternate" hreflang="{code}" href="<?php echo absoluteUrl('languages/{dir}/{slug}.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('{slug}.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-{footer_suffix}.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">{kicker}</p>
          <h1 class="hero-title">{h1}</h1>
          <p class="hero-lede">{lede}</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#{slug}">{cta_start}</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">{cta_more}</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="{slug}">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">{kicker}</p>
          <h2>{h1}</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/{wrapper}'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-{footer_suffix}.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
'''

# Wrapper template — includes the English tool partial WITHOUT label overrides.
# Users get localized page wrapper + English tool labels. This is a pragmatic compromise.
WRAPPER_TEMPLATE = '''<?php
// Localized wrapper for {slug} — falls back to English tool-widget labels for now.
// Localized labels can be added here later as: $labels_var = [...]; before the include.
include __DIR__ . '/../../../tools/{partial}';
'''

LANG_NAMES = {
    'es': 'Spanish', 'fr': 'French', 'de': 'German', 'pt': 'Portuguese',
    'ar': 'Arabic',  'ru': 'Russian', 'ja': 'Japanese', 'ko': 'Korean',
}


def php_str(s: str) -> str:
    """Convert a Python string into a PHP single-quoted string literal (escape ' and \\)."""
    return "'" + s.replace('\\', '\\\\').replace("'", "\\'") + "'"


def main() -> int:
    written = 0
    for lang, loc in LOCALES.items():
        for tool in TOOLS:
            slug = tool['slug']
            trans = T.get(lang, {}).get(slug)
            if not trans:
                print(f'skip {lang}/{slug}: no translations')
                continue
            dir_attr = ' dir="rtl"' if loc['dir_attr'] == 'rtl' else ''
            landing = LANDING_TEMPLATE.format(
                lang_name=LANG_NAMES[lang],
                slug=slug,
                code=loc['code'],
                dir=loc['dir'],
                dir_attr=dir_attr,
                footer_suffix=loc['footer_suffix'],
                wrapper=tool['wrapper'],
                title_php=php_str(trans['title']),
                desc_php=php_str(trans['desc']),
                kicker=trans['kicker'],
                h1=trans['h1'],
                lede=trans['lede'],
                cta_start=trans['cta_start'],
                cta_more=trans['cta_more'],
            )
            wrapper = WRAPPER_TEMPLATE.format(slug=slug, partial=tool['partial'])

            landing_path = ROOT / 'languages' / loc['dir'] / f'{slug}.php'
            wrapper_path = ROOT / 'languages' / loc['dir'] / 'tools' / tool['wrapper']
            landing_path.parent.mkdir(parents=True, exist_ok=True)
            wrapper_path.parent.mkdir(parents=True, exist_ok=True)
            landing_path.write_text(landing, encoding='utf-8')
            wrapper_path.write_text(wrapper, encoding='utf-8')
            written += 2
    print(f'Wrote {written} files across {len(LOCALES)} locales × {len(TOOLS)} tools.')
    return 0


if __name__ == '__main__':
    main()
