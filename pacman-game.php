<?php
include __DIR__ . '/config.php';

$pageTitle = 'Retro Maze Chomp Game | KeyboardTester.click';
$pageDescription = 'Play a local-only retro maze chomp game with pellets, power mode, ghost chase behavior, lives, scoring, levels, keyboard controls, touch controls, and sound.';
$pageKeywords = 'retro maze game, pacman style game, arcade maze game, keyboard game';
$pageRobots = 'noindex, follow';
$pageCanonical = absoluteUrl('pacman-game.php');
$loadAdSense = false;

$pacmanCssPath = __DIR__ . '/assets/css/pacman-game.css';
$pacmanJsPath = __DIR__ . '/assets/js/pacman-game.js';
$pacmanCssHref = url('assets/css/pacman-game.css') . '?v=' . (is_file($pacmanCssPath) ? filemtime($pacmanCssPath) : '1');
$pacmanJsHref = url('assets/js/pacman-game.js') . '?v=' . (is_file($pacmanJsPath) ? filemtime($pacmanJsPath) : '1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/includes/head-common.php'; ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($pacmanCssHref, ENT_QUOTES, 'UTF-8'); ?>">
</head>
<body class="pacman-game-page">
    <?php include __DIR__ . '/header.php'; ?>

    <main class="pacman-page-shell">
        <section class="pacman-hero" aria-labelledby="pacman-title">
            <div>
                <p class="pacman-kicker">Local arcade mode</p>
                <h1 id="pacman-title">Retro Maze Chomp Game</h1>
                <p class="pacman-lede">Clear the maze, use power pellets, avoid the ghosts, and chase high scores with keyboard or touch controls.</p>
            </div>
            <div class="pacman-top-actions" aria-label="Game actions">
                <button type="button" class="pacman-btn" id="pacman-start">Start</button>
                <button type="button" class="pacman-btn pacman-btn-secondary" id="pacman-pause">Pause</button>
                <button type="button" class="pacman-btn pacman-btn-secondary" id="pacman-reset">Reset</button>
            </div>
        </section>

        <section class="pacman-stage" aria-label="Playable retro maze game">
            <div class="pacman-hud" aria-live="polite">
                <span>Score <strong id="pacman-score">00000</strong></span>
                <span>High <strong id="pacman-high">00000</strong></span>
                <span>Level <strong id="pacman-level">1</strong></span>
                <span>Lives <strong id="pacman-lives">3</strong></span>
                <span>Dots <strong id="pacman-dots">0</strong></span>
            </div>

            <div class="pacman-board-wrap">
                <canvas id="pacman-board" width="672" height="736" aria-label="Retro maze game board"></canvas>
                <div class="pacman-overlay is-visible" id="pacman-overlay">
                    <div class="pacman-overlay-title" id="pacman-overlay-title">Ready</div>
                    <div class="pacman-overlay-text" id="pacman-overlay-text">Press Start, Enter, or Space.</div>
                </div>
            </div>

            <div class="pacman-status-row">
                <p id="pacman-status">Ready</p>
                <div class="pacman-option-row" aria-label="Game options">
                    <button type="button" class="pacman-chip" id="pacman-sound" aria-pressed="true">Sound On</button>
                    <button type="button" class="pacman-chip" id="pacman-palette">Palette Classic</button>
                    <button type="button" class="pacman-chip" id="pacman-speed">Speed Normal</button>
                </div>
            </div>

            <div class="pacman-touch-controls" aria-label="Touch controls">
                <button type="button" data-dir="up" aria-label="Move up">Up</button>
                <button type="button" data-dir="left" aria-label="Move left">Left</button>
                <button type="button" data-dir="right" aria-label="Move right">Right</button>
                <button type="button" data-dir="down" aria-label="Move down">Down</button>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/footer.php'; ?>
    <script src="<?php echo htmlspecialchars($pacmanJsHref, ENT_QUOTES, 'UTF-8'); ?>" defer></script>
</body>
</html>
