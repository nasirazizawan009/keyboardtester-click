(function () {
    'use strict';

    const canvas = document.getElementById('pacman-board');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const scoreEl = document.getElementById('pacman-score');
    const highEl = document.getElementById('pacman-high');
    const levelEl = document.getElementById('pacman-level');
    const livesEl = document.getElementById('pacman-lives');
    const dotsEl = document.getElementById('pacman-dots');
    const statusEl = document.getElementById('pacman-status');
    const overlay = document.getElementById('pacman-overlay');
    const overlayTitle = document.getElementById('pacman-overlay-title');
    const overlayText = document.getElementById('pacman-overlay-text');
    const startBtn = document.getElementById('pacman-start');
    const pauseBtn = document.getElementById('pacman-pause');
    const resetBtn = document.getElementById('pacman-reset');
    const soundBtn = document.getElementById('pacman-sound');
    const fullscreenBtn = document.getElementById('pacman-fullscreen');
    const paletteBtn = document.getElementById('pacman-palette');
    const speedBtn = document.getElementById('pacman-speed');
    const stageEl = document.querySelector('.pacman-stage');

    const TILE = 32;
    const MAP = [
        '#####################',
        '#o........#........o#',
        '#.###.###.#.###.###.#',
        '#...................#',
        '#.###.#.#####.#.###.#',
        '#.....#...#...#.....#',
        '#####.###.#.###.#####',
        '#####.#.......#.#####',
        '#####.#.#####.#.#####',
        '........#####........',
        '#####.#.#####.#.#####',
        '#####.#.......#.#####',
        '#####.#.#####.#.#####',
        '#.........#.........#',
        '#.###.###.#.###.###.#',
        '#o..#.....P.....#..o#',
        '###.#.#.#####.#.#.###',
        '#.....#...#...#.....#',
        '#.#######.#.#######.#',
        '#...................#',
        '#.###.###.#.###.###.#',
        '#o.................o#',
        '#####################'
    ];

    const ROWS = MAP.length;
    const COLS = MAP[0].length;
    const WIDTH = COLS * TILE;
    const HEIGHT = ROWS * TILE;
    const DIRS = {
        left: { x: -1, y: 0, angle: Math.PI, key: 'left' },
        right: { x: 1, y: 0, angle: 0, key: 'right' },
        up: { x: 0, y: -1, angle: -Math.PI / 2, key: 'up' },
        down: { x: 0, y: 1, angle: Math.PI / 2, key: 'down' }
    };
    const OPPOSITE = { left: 'right', right: 'left', up: 'down', down: 'up' };
    const PALETTES = ['classic', 'neon', 'amber'];
    const SPEEDS = [
        { label: 'Normal', factor: 1 },
        { label: 'Fast', factor: 1.16 },
        { label: 'Calm', factor: 0.88 }
    ];
    const COLLISION_RADIUS_TILES = 0.84;

    canvas.width = WIDTH;
    canvas.height = HEIGHT;

    const game = {
        mode: 'ready',
        score: 0,
        high: Number(localStorage.getItem('kbtMazeHighScore') || 0),
        level: 1,
        lives: 3,
        pellets: new Map(),
        pelletsLeft: 0,
        player: null,
        ghosts: [],
        totalPellets: 0,
        requestedDir: 'left',
        lastTime: 0,
        modeTimer: 0,
        scatter: true,
        frightenedTimer: 0,
        ghostCombo: 0,
        fruit: null,
        fruitShownAt: new Set(),
        sound: true,
        audio: null,
        paletteIndex: 0,
        speedIndex: 0,
        deathFreeze: 0,
        lastViewScroll: 0
    };

    const ghostDefs = [
        { name: 'Red', color: '#ff4b4b', start: { x: 9, y: 7 }, scatter: { x: COLS - 2, y: 1 }, dir: 'left' },
        { name: 'Pink', color: '#ff6bd6', start: { x: 11, y: 7 }, scatter: { x: 1, y: 1 }, dir: 'right' },
        { name: 'Cyan', color: '#2de2e6', start: { x: 7, y: 11 }, scatter: { x: COLS - 2, y: ROWS - 2 }, dir: 'right' },
        { name: 'Orange', color: '#ff9f1c', start: { x: 13, y: 11 }, scatter: { x: 1, y: ROWS - 2 }, dir: 'left' }
    ];

    function tileKey(x, y) {
        return `${x},${y}`;
    }

    function clamp(value, min, max) {
        return Math.max(min, Math.min(max, value));
    }

    function normalizeTileX(x) {
        return ((x % COLS) + COLS) % COLS;
    }

    function wrapX(x) {
        if (x < -0.5) return COLS - 0.5;
        if (x > COLS - 0.5) return -0.5;
        return x;
    }

    function distance(a, b) {
        return Math.hypot(a.x - b.x, a.y - b.y);
    }

    function rememberPosition(entity) {
        if (!entity) return;
        entity.prevX = entity.x;
        entity.prevY = entity.y;
        entity.path = [{ x: entity.x, y: entity.y }];
    }

    function previousPoint(entity) {
        return {
            x: Number.isFinite(entity.prevX) ? entity.prevX : entity.x,
            y: Number.isFinite(entity.prevY) ? entity.prevY : entity.y
        };
    }

    function unwrapSegmentEnd(start, end) {
        const point = { x: end.x, y: end.y };
        if (Math.abs(point.x - start.x) > COLS / 2) {
            point.x += point.x > start.x ? -COLS : COLS;
        }
        return point;
    }

    function pointSegmentDistance(point, start, end) {
        const vx = end.x - start.x;
        const vy = end.y - start.y;
        const lengthSq = vx * vx + vy * vy;
        if (lengthSq <= 0.000001) return Math.hypot(point.x - start.x, point.y - start.y);

        const t = clamp(((point.x - start.x) * vx + (point.y - start.y) * vy) / lengthSq, 0, 1);
        const closest = {
            x: start.x + vx * t,
            y: start.y + vy * t
        };
        return Math.hypot(point.x - closest.x, point.y - closest.y);
    }

    function segmentsIntersect(a, b, c, d) {
        const r = { x: b.x - a.x, y: b.y - a.y };
        const s = { x: d.x - c.x, y: d.y - c.y };
        const denominator = r.x * s.y - r.y * s.x;
        if (Math.abs(denominator) <= 0.000001) return false;

        const cx = c.x - a.x;
        const cy = c.y - a.y;
        const t = (cx * s.y - cy * s.x) / denominator;
        const u = (cx * r.y - cy * r.x) / denominator;
        return t >= 0 && t <= 1 && u >= 0 && u <= 1;
    }

    function segmentDistance(a, b, c, d) {
        if (segmentsIntersect(a, b, c, d)) return 0;
        return Math.min(
            pointSegmentDistance(a, c, d),
            pointSegmentDistance(b, c, d),
            pointSegmentDistance(c, a, b),
            pointSegmentDistance(d, a, b)
        );
    }

    function centerDistanceWithWrap(aEntity, bEntity) {
        const dx = Math.abs(aEntity.x - bEntity.x);
        const wrappedDx = Math.min(dx, COLS - dx);
        return Math.hypot(wrappedDx, aEntity.y - bEntity.y);
    }

    function recordMovementPoint(entity) {
        if (!Array.isArray(entity.path)) {
            entity.path = [previousPoint(entity)];
        }
        const last = entity.path[entity.path.length - 1];
        if (!last || Math.hypot(entity.x - last.x, entity.y - last.y) > 0.0001) {
            entity.path.push({ x: entity.x, y: entity.y });
        }
    }

    function movementSegments(entity) {
        const points = Array.isArray(entity.path) && entity.path.length > 1
            ? entity.path
            : [previousPoint(entity), { x: entity.x, y: entity.y }];
        const segments = [];

        for (let index = 1; index < points.length; index += 1) {
            const start = points[index - 1];
            const end = unwrapSegmentEnd(start, points[index]);
            segments.push({ start, end });
        }

        return segments.length ? segments : [{ start: points[0], end: points[0] }];
    }

    function movementPathDistance(aEntity, bEntity) {
        const aSegments = movementSegments(aEntity);
        const bSegments = movementSegments(bEntity);
        let closest = Infinity;

        aSegments.forEach((aSegment) => {
            bSegments.forEach((bSegment) => {
                [-COLS, 0, COLS].forEach((shift) => {
                    const b0 = { x: bSegment.start.x + shift, y: bSegment.start.y };
                    const b1 = { x: bSegment.end.x + shift, y: bSegment.end.y };
                    closest = Math.min(closest, segmentDistance(aSegment.start, aSegment.end, b0, b1));
                });
            });
        });

        return closest;
    }

    function entitiesTouch(aEntity, bEntity) {
        return Math.min(centerDistanceWithWrap(aEntity, bEntity), movementPathDistance(aEntity, bEntity)) <= COLLISION_RADIUS_TILES;
    }

    function isWall(x, y) {
        const tx = ((Math.round(x) % COLS) + COLS) % COLS;
        const ty = Math.round(y);
        return ty < 0 || ty >= ROWS || MAP[ty][tx] === '#';
    }

    function isOpen(x, y) {
        return !isWall(x, y);
    }

    function atCenter(entity) {
        return Math.abs(entity.x - Math.round(entity.x)) < 0.001 && Math.abs(entity.y - Math.round(entity.y)) < 0.001;
    }

    function snap(entity) {
        entity.x = normalizeTileX(Math.round(entity.x));
        entity.y = Math.round(entity.y);
    }

    function canMove(entity, dirName) {
        const dir = DIRS[dirName];
        if (!dir) return false;
        return isOpen(normalizeTileX(Math.round(entity.x) + dir.x), Math.round(entity.y) + dir.y);
    }

    function nextCenter(entity, dir) {
        if (dir.x > 0) return { x: Math.floor(entity.x) + 1, y: Math.round(entity.y) };
        if (dir.x < 0) return { x: Math.ceil(entity.x) - 1, y: Math.round(entity.y) };
        if (dir.y > 0) return { x: Math.round(entity.x), y: Math.floor(entity.y) + 1 };
        return { x: Math.round(entity.x), y: Math.ceil(entity.y) - 1 };
    }

    function distanceToCenter(entity, target) {
        return Math.hypot(target.x - entity.x, target.y - entity.y);
    }

    function setCenter(entity, target) {
        entity.x = normalizeTileX(target.x);
        entity.y = target.y;
    }

    function buildPellets() {
        game.pellets.clear();
        for (let y = 0; y < ROWS; y += 1) {
            for (let x = 0; x < COLS; x += 1) {
                const cell = MAP[y][x];
                if (cell === '.' || cell === 'o') {
                    game.pellets.set(tileKey(x, y), cell);
                }
            }
        }
        game.pelletsLeft = game.pellets.size;
        game.totalPellets = game.pellets.size;
        game.fruitShownAt = new Set();
        game.fruit = null;
    }

    function newPlayer() {
        return {
            x: 10,
            y: 15,
            prevX: 10,
            prevY: 15,
            dir: 'left',
            nextDir: 'left',
            speed: 6.15,
            mouth: 0
        };
    }

    function newGhost(def, index) {
        return {
            name: def.name,
            color: def.color,
            start: { x: def.start.x, y: def.start.y },
            scatter: { x: def.scatter.x, y: def.scatter.y },
            x: def.start.x,
            y: def.start.y,
            prevX: def.start.x,
            prevY: def.start.y,
            dir: def.dir,
            speed: 5.35 + index * 0.08,
            status: 'normal',
            eatenScore: 0,
            releaseDelay: index * 1.8
        };
    }

    function resetPositions() {
        game.player = newPlayer();
        game.ghosts = ghostDefs.map(newGhost);
        game.requestedDir = 'left';
        game.frightenedTimer = 0;
        game.ghostCombo = 0;
        game.scatter = true;
        game.modeTimer = 0;
    }

    function resetGame() {
        game.mode = 'ready';
        game.score = 0;
        game.level = 1;
        game.lives = 3;
        game.deathFreeze = 0;
        buildPellets();
        resetPositions();
        showOverlay('Ready', 'Press Start, Enter, or Space.');
        setStatus('Ready');
        updateHud();
        draw();
    }

    function startGame() {
        if (game.mode === 'gameover' || game.mode === 'won') {
            resetGame();
        }
        game.mode = 'playing';
        game.lastTime = performance.now();
        hideOverlay();
        ensureAudio();
        beep(660, 0.05, 'square', 0.025);
        setStatus('Playing');
        keepPlayerInView(true);
    }

    function pauseGame() {
        if (game.mode === 'playing') {
            game.mode = 'paused';
            showOverlay('Paused', 'Press Pause, Space, or P to continue.');
            setStatus('Paused');
        } else if (game.mode === 'paused') {
            startGame();
        }
    }

    function setStatus(text) {
        if (statusEl) statusEl.textContent = text;
    }

    function showOverlay(title, text) {
        if (overlayTitle) overlayTitle.textContent = title;
        if (overlayText) overlayText.textContent = text;
        if (overlay) overlay.classList.add('is-visible');
    }

    function hideOverlay() {
        if (overlay) overlay.classList.remove('is-visible');
    }

    function padScore(value) {
        return String(Math.max(0, value)).padStart(5, '0');
    }

    function updateHud() {
        if (scoreEl) scoreEl.textContent = padScore(game.score);
        if (highEl) highEl.textContent = padScore(game.high);
        if (levelEl) levelEl.textContent = String(game.level);
        if (livesEl) livesEl.textContent = String(game.lives);
        if (dotsEl) dotsEl.textContent = String(game.pelletsLeft);
    }

    function addScore(points) {
        game.score += points;
        if (game.score > game.high) {
            game.high = game.score;
            localStorage.setItem('kbtMazeHighScore', String(game.high));
        }
        updateHud();
    }

    function ensureAudio() {
        if (!game.sound || game.audio) return;
        const AudioContext = window.AudioContext || window.webkitAudioContext;
        if (!AudioContext) return;
        game.audio = new AudioContext();
    }

    function beep(freq, duration, type = 'square', gainValue = 0.018) {
        if (!game.sound) return;
        ensureAudio();
        const audio = game.audio;
        if (!audio) return;
        const osc = audio.createOscillator();
        const gain = audio.createGain();
        osc.type = type;
        osc.frequency.value = freq;
        gain.gain.setValueAtTime(gainValue, audio.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.0001, audio.currentTime + duration);
        osc.connect(gain);
        gain.connect(audio.destination);
        osc.start();
        osc.stop(audio.currentTime + duration);
    }

    function triggerPower() {
        game.frightenedTimer = Math.max(4.8, 7.2 - game.level * 0.35);
        game.ghostCombo = 0;
        game.ghosts.forEach((ghost) => {
            if (ghost.status === 'normal' || ghost.status === 'frightened') {
                ghost.status = 'frightened';
                ghost.dir = OPPOSITE[ghost.dir] || ghost.dir;
            }
        });
        setStatus('Power mode');
        beep(220, 0.08, 'sawtooth', 0.025);
        beep(440, 0.08, 'sawtooth', 0.018);
    }

    function eatAtPlayerTile() {
        const tx = Math.round(game.player.x);
        const ty = Math.round(game.player.y);
        const key = tileKey(((tx % COLS) + COLS) % COLS, ty);
        const pellet = game.pellets.get(key);
        if (pellet) {
            game.pellets.delete(key);
            game.pelletsLeft -= 1;
            addScore(pellet === 'o' ? 50 : 10);
            if (pellet === 'o') {
                triggerPower();
            } else {
                beep(880, 0.025, 'square', 0.012);
            }
            maybeShowFruit();
            if (game.pelletsLeft <= 0) {
                nextLevel();
            }
        }

        if (game.fruit && distance(game.player, game.fruit) < 0.65) {
            addScore(500 + game.level * 100);
            game.fruit = null;
            setStatus('Bonus eaten');
            beep(760, 0.08, 'triangle', 0.025);
        }
    }

    function maybeShowFruit() {
        const eaten = Math.max(0, game.totalPellets - game.pelletsLeft);
        [70, 150].forEach((threshold) => {
            if (eaten >= threshold && !game.fruitShownAt.has(threshold) && !game.fruit) {
                game.fruitShownAt.add(threshold);
                game.fruit = { x: 10, y: 13, timer: 9 };
                setStatus('Bonus fruit');
            }
        });
    }

    function nextLevel() {
        game.level += 1;
        game.mode = 'won';
        addScore(1000);
        showOverlay('Maze Clear', 'Next round starts now.');
        setStatus('Maze clear');
        beep(523, 0.08, 'square', 0.02);
        window.setTimeout(() => {
            buildPellets();
            resetPositions();
            game.mode = 'playing';
            game.lastTime = performance.now();
            hideOverlay();
            updateHud();
        }, 1200);
    }

    function loseLife() {
        if (game.deathFreeze > 0 || game.mode !== 'playing') return;
        game.lives -= 1;
        updateHud();
        setStatus(game.lives > 0 ? 'Life lost' : 'Game over');
        showOverlay(game.lives > 0 ? 'Caught' : 'Game Over', game.lives > 0 ? 'Get ready.' : 'Press Start to try again.');
        beep(110, 0.18, 'sawtooth', 0.03);
        game.deathFreeze = 1.25;
        game.mode = game.lives > 0 ? 'dying' : 'gameover';
    }

    function recoverAfterDeath(delta) {
        if (game.mode !== 'dying') return;
        game.deathFreeze -= delta;
        if (game.deathFreeze <= 0) {
            resetPositions();
            game.mode = 'playing';
            game.lastTime = performance.now();
            hideOverlay();
            setStatus('Playing');
        }
    }

    function setDirection(dirName) {
        if (!DIRS[dirName]) return;
        game.requestedDir = dirName;
        if (game.player) game.player.nextDir = dirName;
        if (game.mode === 'ready' || game.mode === 'paused') {
            startGame();
        }
        keepPlayerInView(true);
    }

    function isFullscreen() {
        return !!document.fullscreenElement;
    }

    function supportsFullscreen() {
        return !!(stageEl && stageEl.requestFullscreen && document.exitFullscreen);
    }

    function updateFullscreenButton() {
        if (!fullscreenBtn) return;
        if (!supportsFullscreen()) {
            fullscreenBtn.textContent = 'Fullscreen N/A';
            fullscreenBtn.disabled = true;
            return;
        }
        fullscreenBtn.textContent = isFullscreen() ? 'Exit Fullscreen' : 'Fullscreen';
        fullscreenBtn.setAttribute('aria-pressed', isFullscreen() ? 'true' : 'false');
    }

    async function toggleFullscreen() {
        if (!supportsFullscreen()) return;
        try {
            if (isFullscreen()) {
                await document.exitFullscreen();
            } else {
                await stageEl.requestFullscreen();
            }
            window.setTimeout(() => keepPlayerInView(true), 80);
        } catch (error) {
            setStatus('Fullscreen blocked by browser');
        }
    }

    function keepPlayerInView(force = false) {
        if (!game.player || !canvas || isFullscreen()) return;

        const now = performance.now();
        if (!force && now - game.lastViewScroll < 110) return;

        const rect = canvas.getBoundingClientRect();
        if (rect.height <= 0) return;

        const playerScreenY = rect.top + (game.player.y / ROWS) * rect.height;
        const topSafe = Math.max(112, Math.min(180, window.innerHeight * 0.28));
        const bottomSafe = window.innerHeight - Math.max(118, Math.min(190, window.innerHeight * 0.26));
        let delta = 0;

        if (playerScreenY > bottomSafe) {
            delta = playerScreenY - bottomSafe;
        } else if (playerScreenY < topSafe) {
            delta = playerScreenY - topSafe;
        }

        if (Math.abs(delta) >= 10) {
            window.scrollBy({ top: delta, left: 0, behavior: 'auto' });
            game.lastViewScroll = now;
        }
    }

    function targetForGhost(ghost) {
        if (ghost.status === 'eaten') return ghost.start;
        if (ghost.status === 'frightened') {
            return { x: Math.random() * (COLS - 2) + 1, y: Math.random() * (ROWS - 2) + 1 };
        }
        if (game.scatter) return ghost.scatter;

        const player = game.player;
        const pdir = DIRS[player.dir] || DIRS.left;
        if (ghost.name === 'Red') {
            return { x: player.x, y: player.y };
        }
        if (ghost.name === 'Pink') {
            return { x: player.x + pdir.x * 4, y: player.y + pdir.y * 4 };
        }
        if (ghost.name === 'Cyan') {
            const red = game.ghosts[0] || ghost;
            const ahead = { x: player.x + pdir.x * 2, y: player.y + pdir.y * 2 };
            return { x: ahead.x + (ahead.x - red.x), y: ahead.y + (ahead.y - red.y) };
        }
        if (distance(ghost, player) > 6) {
            return { x: player.x, y: player.y };
        }
        return ghost.scatter;
    }

    function chooseGhostDir(ghost) {
        const choices = Object.keys(DIRS).filter((dirName) => {
            if (OPPOSITE[ghost.dir] === dirName && ghost.status !== 'frightened') return false;
            return canMove(ghost, dirName);
        });
        if (!choices.length) {
            const reverse = OPPOSITE[ghost.dir];
            return canMove(ghost, reverse) ? reverse : ghost.dir;
        }
        if (ghost.status === 'frightened') {
            return choices[Math.floor(Math.random() * choices.length)];
        }
        const target = targetForGhost(ghost);
        let best = choices[0];
        let bestScore = Infinity;
        choices.forEach((dirName) => {
            const dir = DIRS[dirName];
            const nx = Math.round(ghost.x) + dir.x;
            const ny = Math.round(ghost.y) + dir.y;
            const score = Math.hypot(target.x - nx, target.y - ny);
            if (score < bestScore) {
                bestScore = score;
                best = dirName;
            }
        });
        return best;
    }

    function selectDirectionAtCenter(entity) {
        if (entity === game.player && canMove(entity, entity.nextDir)) {
            entity.dir = entity.nextDir;
        } else if (entity !== game.player) {
            entity.dir = chooseGhostDir(entity);
        }
        return canMove(entity, entity.dir);
    }

    function moveEntity(entity, delta, speed, onCenter) {
        let remaining = speed * delta;
        let guard = 0;

        while (remaining > 0.0001 && guard < 6) {
            guard += 1;

            if (atCenter(entity)) {
                snap(entity);
                if (onCenter) onCenter();
                if (!selectDirectionAtCenter(entity)) return;
            }

            const dir = DIRS[entity.dir];
            if (!dir) return;

            const target = nextCenter(entity, dir);
            const dist = distanceToCenter(entity, target);
            if (dist <= 0.0001) {
                setCenter(entity, target);
                recordMovementPoint(entity);
                if (onCenter) onCenter();
                continue;
            }

            const step = Math.min(remaining, dist);
            entity.x += dir.x * step;
            entity.y += dir.y * step;
            remaining -= step;
            recordMovementPoint(entity);

            if (step >= dist - 0.0001) {
                setCenter(entity, target);
                recordMovementPoint(entity);
                if (onCenter) onCenter();
                continue;
            }

            entity.x = wrapX(entity.x);
            break;
        }
    }

    function updatePlayer(delta) {
        const speed = (game.player.speed + Math.min(game.level - 1, 5) * 0.18) * SPEEDS[game.speedIndex].factor;
        moveEntity(game.player, delta, speed, eatAtPlayerTile);
        game.player.mouth += delta * 6.5;
    }

    function updateGhosts(delta) {
        game.modeTimer += delta;
        const scatterLimit = game.scatter ? 7 : 22;
        if (game.modeTimer > scatterLimit) {
            game.modeTimer = 0;
            game.scatter = !game.scatter;
            game.ghosts.forEach((ghost) => {
                if (ghost.status === 'normal') ghost.dir = OPPOSITE[ghost.dir] || ghost.dir;
            });
        }

        if (game.frightenedTimer > 0) {
            game.frightenedTimer -= delta;
            if (game.frightenedTimer <= 0) {
                game.ghosts.forEach((ghost) => {
                    if (ghost.status === 'frightened') ghost.status = 'normal';
                });
                game.ghostCombo = 0;
                setStatus(game.mode === 'playing' ? 'Chase mode' : statusEl.textContent);
            }
        }

        game.ghosts.forEach((ghost) => {
            const levelBoost = Math.min(game.level - 1, 5) * 0.12;
            const ghostSpeed = ghost.status === 'eaten'
                ? 8.2
                : ghost.status === 'frightened'
                    ? 3.8
                    : ghost.speed + levelBoost;
            moveEntity(ghost, delta, ghostSpeed * SPEEDS[game.speedIndex].factor);
            if (ghost.status === 'eaten' && distance(ghost, ghost.start) < 0.45) {
                ghost.x = ghost.start.x;
                ghost.y = ghost.start.y;
                ghost.status = 'normal';
            }
        });
    }

    function checkCollisions() {
        game.ghosts.forEach((ghost) => {
            if (!entitiesTouch(game.player, ghost)) return;
            if (ghost.status === 'frightened') {
                game.ghostCombo += 1;
                const points = 100 * Math.pow(2, game.ghostCombo);
                ghost.status = 'eaten';
                ghost.eatenScore = points;
                addScore(points);
                setStatus(`${ghost.name} ghost eaten`);
                beep(980, 0.075, 'square', 0.025);
                return;
            }
            if (ghost.status === 'normal') {
                loseLife();
            }
        });
    }

    function updateFruit(delta) {
        if (!game.fruit) return;
        game.fruit.timer -= delta;
        if (game.fruit.timer <= 0) {
            game.fruit = null;
        }
    }

    function update(delta) {
        if (game.mode === 'dying') {
            recoverAfterDeath(delta);
            return;
        }
        if (game.mode !== 'playing') return;
        rememberPosition(game.player);
        game.ghosts.forEach(rememberPosition);
        updatePlayer(delta);
        updateGhosts(delta);
        updateFruit(delta);
        checkCollisions();
    }

    function drawWall(x, y) {
        const px = x * TILE;
        const py = y * TILE;
        const palette = PALETTES[game.paletteIndex];
        const wall = palette === 'neon' ? '#ff6bd6' : palette === 'amber' ? '#ff9f1c' : '#2459ff';
        const glow = palette === 'neon' ? 'rgba(255,107,214,0.62)' : palette === 'amber' ? 'rgba(255,159,28,0.52)' : 'rgba(36,89,255,0.62)';
        ctx.fillStyle = '#02030d';
        ctx.fillRect(px, py, TILE, TILE);
        ctx.strokeStyle = wall;
        ctx.lineWidth = 3;
        ctx.strokeRect(px + 3, py + 3, TILE - 6, TILE - 6);
        ctx.strokeStyle = glow;
        ctx.lineWidth = 1;
        ctx.strokeRect(px + 7, py + 7, TILE - 14, TILE - 14);
    }

    function drawPellets() {
        game.pellets.forEach((type, key) => {
            const [x, y] = key.split(',').map(Number);
            const cx = x * TILE + TILE / 2;
            const cy = y * TILE + TILE / 2;
            ctx.fillStyle = '#ffe7a3';
            ctx.beginPath();
            ctx.arc(cx, cy, type === 'o' ? 7 : 3, 0, Math.PI * 2);
            ctx.fill();
            if (type === 'o') {
                ctx.strokeStyle = 'rgba(255,231,163,0.7)';
                ctx.lineWidth = 2;
                ctx.stroke();
            }
        });
    }

    function drawFruit() {
        if (!game.fruit) return;
        const x = game.fruit.x * TILE + TILE / 2;
        const y = game.fruit.y * TILE + TILE / 2;
        ctx.fillStyle = '#ff335f';
        ctx.beginPath();
        ctx.arc(x - 5, y + 3, 6, 0, Math.PI * 2);
        ctx.arc(x + 5, y + 3, 6, 0, Math.PI * 2);
        ctx.fill();
        ctx.strokeStyle = '#5cff8d';
        ctx.lineWidth = 2;
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.quadraticCurveTo(x + 2, y - 10, x + 12, y - 11);
        ctx.stroke();
    }

    function drawPlayer() {
        const p = game.player;
        const x = p.x * TILE + TILE / 2;
        const y = p.y * TILE + TILE / 2;
        const dir = DIRS[p.dir] || DIRS.left;
        const open = 0.18 + Math.abs(Math.sin(p.mouth)) * 0.42;
        const start = dir.angle + open;
        const end = dir.angle + Math.PI * 2 - open;
        ctx.save();
        ctx.fillStyle = '#ffd21f';
        ctx.shadowColor = 'rgba(255,210,31,0.75)';
        ctx.shadowBlur = 10;
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.arc(x, y, 13, start, end, false);
        ctx.closePath();
        ctx.fill();
        ctx.restore();
    }

    function drawGhost(ghost) {
        const x = ghost.x * TILE + TILE / 2;
        const y = ghost.y * TILE + TILE / 2;
        const frightenedFlash = ghost.status === 'frightened' && game.frightenedTimer < 2 && Math.floor(performance.now() / 160) % 2 === 0;
        const body = ghost.status === 'eaten' ? 'transparent' : ghost.status === 'frightened' ? (frightenedFlash ? '#ffffff' : '#1e65ff') : ghost.color;
        const eyeDx = ghost.dir === 'left' ? -2 : ghost.dir === 'right' ? 2 : 0;
        const eyeDy = ghost.dir === 'up' ? -2 : ghost.dir === 'down' ? 2 : 0;

        ctx.save();
        if (ghost.status !== 'eaten') {
            ctx.fillStyle = body;
            ctx.beginPath();
            ctx.arc(x, y - 2, 13, Math.PI, 0);
            ctx.lineTo(x + 13, y + 13);
            for (let i = 0; i < 4; i += 1) {
                const sx = x + 13 - i * 6.5;
                ctx.lineTo(sx - 3.25, y + (i % 2 ? 8 : 13));
            }
            ctx.lineTo(x - 13, y + 13);
            ctx.closePath();
            ctx.fill();
        }

        ctx.fillStyle = '#fff';
        ctx.beginPath();
        ctx.ellipse(x - 5, y - 3, 4, 5, 0, 0, Math.PI * 2);
        ctx.ellipse(x + 5, y - 3, 4, 5, 0, 0, Math.PI * 2);
        ctx.fill();
        ctx.fillStyle = ghost.status === 'frightened' ? '#ffffff' : '#111827';
        if (ghost.status !== 'frightened') {
            ctx.beginPath();
            ctx.arc(x - 5 + eyeDx, y - 3 + eyeDy, 2, 0, Math.PI * 2);
            ctx.arc(x + 5 + eyeDx, y - 3 + eyeDy, 2, 0, Math.PI * 2);
            ctx.fill();
        } else {
            ctx.strokeStyle = frightenedFlash ? '#1e65ff' : '#fff';
            ctx.lineWidth = 2;
            ctx.beginPath();
            ctx.moveTo(x - 8, y + 7);
            ctx.lineTo(x - 3, y + 4);
            ctx.lineTo(x + 2, y + 7);
            ctx.lineTo(x + 7, y + 4);
            ctx.stroke();
        }
        ctx.restore();
    }

    function drawGrid() {
        ctx.fillStyle = '#000';
        ctx.fillRect(0, 0, WIDTH, HEIGHT);
        for (let y = 0; y < ROWS; y += 1) {
            for (let x = 0; x < COLS; x += 1) {
                if (MAP[y][x] === '#') drawWall(x, y);
            }
        }
        ctx.fillStyle = '#000';
        ctx.fillRect(0, 9 * TILE, TILE, TILE);
        ctx.fillRect((COLS - 1) * TILE, 9 * TILE, TILE, TILE);
    }

    function draw() {
        drawGrid();
        drawPellets();
        drawFruit();
        game.ghosts.forEach(drawGhost);
        drawPlayer();
    }

    function frame(time) {
        const rawDelta = game.lastTime ? (time - game.lastTime) / 1000 : 0;
        const delta = clamp(rawDelta, 0, 0.05);
        game.lastTime = time;
        update(delta);
        draw();
        if (game.mode === 'playing') keepPlayerInView();
        window.requestAnimationFrame(frame);
    }

    function setPalette() {
        document.body.dataset.palette = PALETTES[game.paletteIndex];
        if (paletteBtn) {
            const label = PALETTES[game.paletteIndex][0].toUpperCase() + PALETTES[game.paletteIndex].slice(1);
            paletteBtn.textContent = `Palette ${label}`;
        }
    }

    function setSpeedLabel() {
        if (speedBtn) speedBtn.textContent = `Speed ${SPEEDS[game.speedIndex].label}`;
    }

    function bindControls() {
        const keyMap = {
            ArrowLeft: 'left',
            KeyA: 'left',
            ArrowRight: 'right',
            KeyD: 'right',
            ArrowUp: 'up',
            KeyW: 'up',
            ArrowDown: 'down',
            KeyS: 'down'
        };

        document.addEventListener('keydown', (event) => {
            const dir = keyMap[event.code];
            if (dir) {
                event.preventDefault();
                setDirection(dir);
                return;
            }
            if (event.code === 'Space' || event.code === 'Enter') {
                event.preventDefault();
                if (game.mode === 'playing') pauseGame();
                else startGame();
            } else if (event.code === 'KeyP') {
                event.preventDefault();
                pauseGame();
            } else if (event.code === 'KeyR') {
                event.preventDefault();
                resetGame();
                startGame();
            }
        });

        let touchStart = null;
        canvas.addEventListener('pointerdown', (event) => {
            touchStart = { x: event.clientX, y: event.clientY };
        });
        canvas.addEventListener('pointerup', (event) => {
            if (!touchStart) return;
            const dx = event.clientX - touchStart.x;
            const dy = event.clientY - touchStart.y;
            touchStart = null;
            if (Math.max(Math.abs(dx), Math.abs(dy)) < 18) {
                if (game.mode !== 'playing') startGame();
                return;
            }
            setDirection(Math.abs(dx) > Math.abs(dy) ? (dx > 0 ? 'right' : 'left') : (dy > 0 ? 'down' : 'up'));
        });

        document.querySelectorAll('.pacman-touch-controls [data-dir]').forEach((button) => {
            button.addEventListener('click', () => setDirection(button.dataset.dir));
        });

        if (startBtn) startBtn.addEventListener('click', startGame);
        if (pauseBtn) pauseBtn.addEventListener('click', pauseGame);
        if (resetBtn) resetBtn.addEventListener('click', () => {
            resetGame();
            startGame();
        });
        if (soundBtn) {
            soundBtn.addEventListener('click', () => {
                game.sound = !game.sound;
                soundBtn.textContent = game.sound ? 'Sound On' : 'Sound Off';
                soundBtn.setAttribute('aria-pressed', game.sound ? 'true' : 'false');
                if (game.sound) beep(660, 0.05, 'square', 0.02);
            });
        }
        if (paletteBtn) {
            paletteBtn.addEventListener('click', () => {
                game.paletteIndex = (game.paletteIndex + 1) % PALETTES.length;
                setPalette();
                draw();
            });
        }
        if (speedBtn) {
            speedBtn.addEventListener('click', () => {
                game.speedIndex = (game.speedIndex + 1) % SPEEDS.length;
                setSpeedLabel();
            });
        }
        if (fullscreenBtn) {
            fullscreenBtn.addEventListener('click', toggleFullscreen);
        }
        document.addEventListener('fullscreenchange', updateFullscreenButton);
    }

    setPalette();
    setSpeedLabel();
    updateFullscreenButton();
    bindControls();
    resetGame();
    window.requestAnimationFrame(frame);
}());
