(function() {
    'use strict';

    const CAT_TEXT = {
        en: {
            messages: [
                'Press keys to clear the maze!',
                'Dot eaten!',
                'Power pellet!',
                'Pink ghost dodged!',
                'Dot chain!',
                'Cyan ghost dodged!',
                'Power mode!',
                'Orange ghost dodged!',
                'Clean path!',
                'Blue ghost dodged!',
                'Final pellet!',
                'Maze clear!'
            ],
            moods: [
                'Ready',
                'Chomping',
                'Powered',
                'Dodging',
                'Combo',
                'Focused',
                'Power Mode',
                'Sharp',
                'Clean',
                'Final Path',
                'Maze Clear'
            ],
            treatsLabel: 'Dots',
            completeMessage: 'Maze clear!'
        },
        es: {
            messages: [
                'Presiona teclas para alimentarme!',
                'Pescado delicioso!',
                'Que refrescante!',
                'Raton de juguete atrapado!',
                'Hora de lana!',
                'Premio en lata!',
                'Snack de pollo!',
                'Hora de dulce!',
                'Estrella desbloqueada!',
                'Casi listo!',
                'Trofeo desbloqueado!'
            ],
            moods: [
                'Hambriento',
                'Feliz',
                'Me encanta!',
                'Emocionado!',
                'Jugueton',
                'Energetico',
                'Imparable',
                'Concentrado',
                'Brillante',
                'Super Gato',
                'Campeon'
            ],
            treatsLabel: 'Premios',
            completeMessage: 'Trofeo desbloqueado!'
        },
        fr: {
            messages: [
                'Appuie sur les touches pour me nourrir!',
                'Poisson delicieux!',
                'Bien rafraichissant!',
                'Souris attrapee!',
                "C'est l'heure de la laine!",
                'Friandise en boite!',
                'Snack au poulet!',
                'Bonbon gagne!',
                'Etoile debloquee!',
                'Presque fini!',
                'Trophee debloque!'
            ],
            moods: [
                'Affame',
                'Heureux',
                "J'adore!",
                'Excite!',
                'Joueur',
                'Energique',
                'En pleine forme',
                'Concentre',
                'Rayonnant',
                'Super Chat',
                'Champion'
            ],
            treatsLabel: 'Friandises',
            completeMessage: 'Trophee debloque!'
        },
        de: {
            messages: [
                'Druecke Tasten, um mich zu fuettern!',
                'Leckerer Fisch!',
                'Erfrischend!',
                'Mausspielzeug gefangen!',
                'Zeit fuer Wolle!',
                'Dosen-Leckerli!',
                'Huehnchen-Snack!',
                'Suessigkeit ergattert!',
                'Stern freigeschaltet!',
                'Fast geschafft!',
                'Pokal freigeschaltet!'
            ],
            moods: [
                'Hungrig',
                'Gluecklich',
                'Gefaellt mir!',
                'Aufgeregt!',
                'Verspielt',
                'Energiegeladen',
                'Topform',
                'Fokussiert',
                'Strahlend',
                'Super-Katze',
                'Champion'
            ],
            treatsLabel: 'Leckerlis',
            completeMessage: 'Pokal freigeschaltet!'
        },
        pt: {
            messages: [
                'Pressione teclas para me alimentar!',
                'Peixe delicioso!',
                'Refrescante!',
                'Rato de brinquedo capturado!',
                'Hora do novelo!',
                'Petisco enlatado!',
                'Petisco de frango!',
                'Hora do doce!',
                'Estrela desbloqueada!',
                'Quase la!',
                'Trofeu desbloqueado!'
            ],
            moods: [
                'Faminto',
                'Feliz',
                'Adorando!',
                'Empolgado!',
                'Brincalhao',
                'Energetico',
                'Em forma',
                'Focado',
                'Brilhando',
                'Super Gato',
                'Campeao'
            ],
            treatsLabel: 'Petiscos',
            completeMessage: 'Trofeu desbloqueado!'
        },
        ru: {
            messages: [
                'Нажимай клавиши, чтобы накормить меня!',
                'Вкусная рыбка!',
                'Освежает!',
                'Поймал мышку-игрушку!',
                'Время клубка!',
                'Консерва получена!',
                'Куриный перекус!',
                'Сладость получена!',
                'Звезда открыта!',
                'Почти готово!',
                'Трофей получен!'
            ],
            moods: [
                'Голодный',
                'Счастлив',
                'Мне нравится!',
                'В восторге!',
                'Игривый',
                'Энергичный',
                'На пике',
                'Сосредоточен',
                'Сияю',
                'Супер кот',
                'Чемпион'
            ],
            treatsLabel: 'Лакомства',
            completeMessage: 'Трофей получен!'
        },
        ar: {
            messages: [
                'اضغط المفاتيح لإطعامي!',
                'سمكة لذيذة!',
                'منعش!',
                'تم اصطياد فأر اللعبة!',
                'وقت الصوف!',
                'مكافأة معلبة!',
                'وجبة دجاج خفيفة!',
                'حلوى!',
                'تم فتح النجمة!',
                'تقريبا انتهينا!',
                'تم فتح الكأس!'
            ],
            moods: [
                'جائع',
                'سعيد',
                'أحب هذا!',
                'متحمس!',
                'لعوب',
                'نشيط',
                'مزدهر',
                'مركز',
                'متألق',
                'قط خارق',
                'بطل'
            ],
            treatsLabel: 'المكافآت',
            completeMessage: 'تم فتح الكأس!'
        },
        ja: {
            messages: [
                'キーを押してごはんをちょうだい！',
                'おいしいおさかな！',
                'さっぱりした！',
                'ねずみのおもちゃゲット！',
                'けいとのじかん！',
                'かんづめゲット！',
                'チキンスナック！',
                'おかしゲット！',
                'スターかいほう！',
                'もうすこし！',
                'トロフィーかいほう！'
            ],
            moods: [
                'おなかぺこぺこ',
                'しあわせ',
                'だいすき！',
                'わくわく！',
                'あそびたい',
                'げんきいっぱい',
                'ちょうしがいい',
                'しゅうちゅう',
                'かがやいてる',
                'スーパーねこ',
                'チャンピオン'
            ],
            treatsLabel: 'ごほうび',
            completeMessage: 'トロフィーかいほう！'
        },
        ko: {
            messages: [
                '키를 눌러서 밥을 주세요!',
                '맛있는 생선!',
                '시원해!',
                '쥐 장난감 획득!',
                '실타래 시간!',
                '캔 간식 획득!',
                '치킨 간식!',
                '사탕 획득!',
                '별 잠금 해제!',
                '거의 다 왔어!',
                '트로피 잠금 해제!'
            ],
            moods: [
                '배고파',
                '행복해',
                '너무 좋아!',
                '신난다!',
                '장난기 가득',
                '에너지 충전',
                '최고 컨디션',
                '집중 중',
                '빛나고 있어',
                '슈퍼 고양이',
                '챔피언'
            ],
            treatsLabel: '간식',
            completeMessage: '트로피 잠금 해제!'
        }
    };

    function resolveLocale(locale) {
        if (typeof locale !== 'string' || locale.trim() === '') {
            return 'en';
        }
        const normalized = locale.toLowerCase();
        if (Object.prototype.hasOwnProperty.call(CAT_TEXT, normalized)) {
            return normalized;
        }
        const base = normalized.split(/[-_]/)[0];
        if (Object.prototype.hasOwnProperty.call(CAT_TEXT, base)) {
            return base;
        }
        return 'en';
    }

    function normalizeTextArray(candidate, fallback) {
        if (!Array.isArray(candidate)) {
            return fallback.slice();
        }
        return fallback.map((fallbackValue, index) => {
            const value = candidate[index];
            return (typeof value === 'string' && value.trim() !== '') ? value : fallbackValue;
        });
    }

    class KeyboardCatProgress {
        constructor(root, options = {}) {
            this.root = root;
            if (!this.root) return;

            this.track = this.root.querySelector('.cat-progress-track');
            this.countEl = this.root.querySelector('[data-cat-progress-count]');
            this.totalEl = this.root.querySelector('[data-cat-total-keys]');
            this.percentageEl = this.root.querySelector('[data-cat-progress-percentage]');
            this.catEl = this.root.querySelector('[data-cat-avatar]');
            this.messageEl = this.root.querySelector('[data-cat-message]');
            this.moodEl = this.root.querySelector('[data-cat-mood]');
            this.treatsEl = this.root.querySelector('[data-cat-treats]');
            this.scoreEl = this.root.querySelector('[data-arcade-score]');
            this.enemyEls = Array.from(this.root.querySelectorAll('[data-arcade-enemy]'));
            this.enemyStates = [];
            this.enemyFrame = 0;
            this.enemyLastTime = 0;
            this.enemyReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            this.desktopTotalKeys = Math.max(Number(options.desktopTotalKeys) || 103, 1);
            this.mobileTotalKeys = Math.max(Number(options.mobileTotalKeys) || 42, 1);
            this.desktopMilestones = options.desktopMilestones || [10, 20, 30, 40, 50, 60, 70, 80, 90, 103];
            this.mobileMilestones = options.mobileMilestones || [4, 8, 13, 17, 21, 25, 29, 34, 38, 42];
            this.sparkles = ['.', '+', '*', 'o', '.'];
            this.locale = resolveLocale(options.locale);
            const runnerText = CAT_TEXT.en;
            this.messages = normalizeTextArray(options.messages, runnerText.messages);
            this.moods = normalizeTextArray(options.moods, runnerText.moods);
            this.treatsLabel = (typeof options.treatsLabel === 'string' && options.treatsLabel.trim() !== '')
                ? options.treatsLabel
                : runnerText.treatsLabel;
            this.completeMessage = (typeof options.completeMessage === 'string' && options.completeMessage.trim() !== '')
                ? options.completeMessage
                : (this.messages[10] || runnerText.completeMessage);

            this.lastLevels = { desktop: 0, mobile: 0 };
            this.lastCycles = { desktop: 0, mobile: 0 };
            this.completed = false;
            this.setDisplayMode(false, this.desktopTotalKeys);
            this.reset({ totalKeys: this.desktopTotalKeys });
            this.startEnemyMotion();
        }

        setDisplayMode(isMobile, totalKeys) {
            if (this.totalEl) {
                this.totalEl.textContent = String(totalKeys);
            }
            if (isMobile) {
                this.lastLevels.mobile = 0;
            }
        }

        getLevel(keysPressed, mode) {
            const milestones = mode === 'mobile' ? this.mobileMilestones : this.desktopMilestones;
            let level = 0;
            for (let i = 0; i < milestones.length; i++) {
                if (keysPressed >= milestones[i]) {
                    level = i + 1;
                }
            }
            return level;
        }

        getStartPosition() {
            return window.innerWidth <= 768 ? 14 : 3;
        }

        getTravelRange() {
            return window.innerWidth <= 768 ? 80 : 85;
        }

        randomBetween(min, max) {
            return min + Math.random() * (max - min);
        }

        getEnemyLaneTop(index) {
            if (!this.track) return 34;
            const trackHeight = this.track.clientHeight || 86;
            const baseTop = trackHeight <= 72 ? 31 : 34;
            const offsets = [0, 3, -1, 2];
            return baseTop + offsets[index % offsets.length];
        }

        setupEnemies() {
            if (!this.track || !this.enemyEls.length) return;

            const width = Math.max(this.track.clientWidth || 0, 320);
            const startPositions = [0.18, 0.46, 0.73];
            const now = (window.performance && window.performance.now) ? window.performance.now() : Date.now();

            this.enemyStates.forEach((state) => {
                state.eatToken += 1;
            });
            this.enemyLastTime = 0;

            this.enemyStates = this.enemyEls.map((enemyEl, index) => {
                const direction = Math.random() > 0.5 ? 1 : -1;
                const state = {
                    el: enemyEl,
                    index,
                    x: width * startPositions[index % startPositions.length],
                    y: this.getEnemyLaneTop(index),
                    laneY: this.getEnemyLaneTop(index),
                    direction,
                    speed: this.randomBetween(34, 78),
                    dropSpeed: this.randomBetween(90, 130),
                    status: 'active',
                    nextTurn: now + this.randomBetween(800, 2400),
                    eatToken: 0
                };

                enemyEl.classList.remove('is-eaten', 'is-respawning');
                this.setEnemyDirection(state, direction);
                this.applyEnemyState(state);
                return state;
            });
        }

        setEnemyDirection(state, direction) {
            state.direction = direction >= 0 ? 1 : -1;
            state.el.setAttribute('data-direction', state.direction > 0 ? 'right' : 'left');
        }

        applyEnemyState(state) {
            state.el.style.left = `${state.x.toFixed(2)}px`;
            state.el.style.top = `${state.y.toFixed(2)}px`;
        }

        getRelativeRect(element) {
            if (!this.track || !element) return null;

            const trackRect = this.track.getBoundingClientRect();
            const rect = element.getBoundingClientRect();
            return {
                left: rect.left - trackRect.left,
                right: rect.right - trackRect.left,
                top: rect.top - trackRect.top,
                bottom: rect.bottom - trackRect.top,
                width: rect.width,
                height: rect.height
            };
        }

        mergeRects(a, b) {
            if (!a) return b;
            if (!b) return a;
            return {
                left: Math.min(a.left, b.left),
                right: Math.max(a.right, b.right),
                top: Math.min(a.top, b.top),
                bottom: Math.max(a.bottom, b.bottom),
                width: Math.max(a.right, b.right) - Math.min(a.left, b.left),
                height: Math.max(a.bottom, b.bottom) - Math.min(a.top, b.top)
            };
        }

        rectsOverlap(a, b, inset = 0) {
            if (!a || !b) return false;
            return !(
                a.right - inset < b.left + inset ||
                a.left + inset > b.right - inset ||
                a.bottom - inset < b.top + inset ||
                a.top + inset > b.bottom - inset
            );
        }

        startEnemyMotion() {
            if (!this.track || !this.enemyEls.length || this.enemyReducedMotion || this.enemyFrame) return;

            const tick = (time) => {
                if (!document.body.contains(this.root)) {
                    this.enemyFrame = 0;
                    return;
                }

                if (!this.enemyLastTime) this.enemyLastTime = time;
                const delta = Math.min((time - this.enemyLastTime) / 1000, 0.05);
                this.enemyLastTime = time;
                this.updateEnemies(time, delta);
                this.enemyFrame = window.requestAnimationFrame(tick);
            };

            this.enemyFrame = window.requestAnimationFrame(tick);
        }

        updateEnemies(time, delta) {
            if (!this.track || !this.enemyStates.length) return;

            const width = Math.max(this.track.clientWidth || 0, 320);
            const ghostWidth = 30;

            this.enemyStates.forEach((state) => {
                state.laneY = this.getEnemyLaneTop(state.index);

                if (state.status === 'respawning') {
                    state.y = Math.min(state.laneY, state.y + state.dropSpeed * delta);
                    if (state.y >= state.laneY) {
                        state.status = 'active';
                        state.el.classList.remove('is-respawning');
                        state.nextTurn = time + this.randomBetween(800, 2400);
                    }
                    this.applyEnemyState(state);
                    return;
                }

                if (state.status !== 'active') {
                    this.applyEnemyState(state);
                    return;
                }

                if (time >= state.nextTurn) {
                    if (Math.random() < 0.72) {
                        this.setEnemyDirection(state, -state.direction);
                    }
                    state.speed = this.randomBetween(34, 84);
                    state.nextTurn = time + this.randomBetween(700, 2600);
                }

                const previousX = state.x;
                let wrapped = false;
                state.x += state.direction * state.speed * delta;

                if (state.direction < 0 && state.x < -ghostWidth - 12) {
                    state.x = width + this.randomBetween(10, 70);
                    wrapped = true;
                } else if (state.direction > 0 && state.x > width + ghostWidth + 12) {
                    state.x = -ghostWidth - this.randomBetween(10, 70);
                    wrapped = true;
                }

                this.applyEnemyState(state);
                if (this.isTouchingPacman(state, wrapped ? state.x : previousX)) {
                    this.eatEnemy(state);
                }
            });
        }

        isTouchingPacman(state, previousEnemyX = state.x, previousPacmanRect = null) {
            if (!this.catEl || state.status !== 'active') return false;

            const pacmanRect = this.getRelativeRect(this.catEl);
            const enemyRect = this.getRelativeRect(state.el);
            if (!pacmanRect || !enemyRect) return false;

            const previousEnemyRect = {
                ...enemyRect,
                left: previousEnemyX,
                right: previousEnemyX + enemyRect.width
            };
            const sweptEnemyRect = this.mergeRects(enemyRect, previousEnemyRect);
            const sweptPacmanRect = previousPacmanRect ? this.mergeRects(pacmanRect, previousPacmanRect) : pacmanRect;

            return this.rectsOverlap(sweptEnemyRect, sweptPacmanRect, 6);
        }

        checkEnemyContacts(previousPacmanRect = null) {
            this.enemyStates.forEach((state) => {
                if (this.isTouchingPacman(state, state.x, previousPacmanRect)) {
                    this.eatEnemy(state);
                }
            });
        }

        eatEnemy(state) {
            if (!state || state.status !== 'active') return;

            state.status = 'eaten';
            state.eatToken += 1;
            const eatToken = state.eatToken;
            state.el.classList.remove('is-respawning');
            state.el.classList.add('is-eaten');

            window.setTimeout(() => {
                if (!document.body.contains(this.root) || state.eatToken !== eatToken) return;

                const width = Math.max(this.track.clientWidth || 0, 320);
                state.status = 'respawning';
                state.x = this.randomBetween(24, Math.max(54, width - 54));
                state.y = -this.randomBetween(74, 122);
                state.laneY = this.getEnemyLaneTop(state.index);
                state.dropSpeed = this.randomBetween(82, 126);
                state.speed = this.randomBetween(34, 84);
                this.setEnemyDirection(state, Math.random() > 0.5 ? 1 : -1);
                state.el.classList.remove('is-eaten');
                state.el.classList.add('is-respawning');
                this.applyEnemyState(state);
            }, 420);
        }

        createSparkles(element) {
            if (!this.track || !element) return;

            const rect = element.getBoundingClientRect();
            const trackRect = this.track.getBoundingClientRect();

            for (let i = 0; i < 5; i++) {
                const sparkle = document.createElement('span');
                sparkle.className = 'sparkle';
                sparkle.textContent = this.sparkles[Math.floor(Math.random() * this.sparkles.length)];
                sparkle.style.left = (rect.left - trackRect.left + Math.random() * 40 - 20) + 'px';
                sparkle.style.top = (rect.top - trackRect.top + Math.random() * 40 - 20) + 'px';
                this.track.appendChild(sparkle);
                window.setTimeout(() => sparkle.remove(), 600);
            }
        }

        getCycleState(totalPresses, totalKeys) {
            const rawPresses = Math.max(0, Number(totalPresses) || 0);
            if (rawPresses === 0) {
                return { rawPresses: 0, cycle: 0, cyclePresses: 0 };
            }

            return {
                rawPresses,
                cycle: Math.floor((rawPresses - 1) / totalKeys),
                cyclePresses: ((rawPresses - 1) % totalKeys) + 1
            };
        }

        resetCycleVisuals(mode) {
            this.root.querySelectorAll('.treat').forEach((treat) => {
                treat.classList.remove('eaten', 'eating');
            });
            this.root.querySelectorAll('.sparkle').forEach((sparkle) => sparkle.remove());

            this.lastLevels[mode] = 0;
            this.completed = false;
            if (this.catEl) {
                this.catEl.setAttribute('data-level', '0');
                this.catEl.classList.remove('eating', 'show-message');
            }
            if (this.messageEl) this.messageEl.textContent = this.messages[0];
            if (this.moodEl) this.moodEl.textContent = this.moods[0];
            if (this.treatsEl) this.treatsEl.textContent = `${this.treatsLabel}: 0/10`;
        }

        update(options) {
            if (!this.catEl) return;

            const mode = options && options.mode === 'mobile' ? 'mobile' : 'desktop';
            const totalKeys = Math.max(Number(options && options.totalKeys) || this.desktopTotalKeys, 1);
            const cycleState = this.getCycleState(options && options.keysPressed, totalKeys);
            const keysPressed = cycleState.cyclePresses;
            const percentage = Math.round((Math.min(keysPressed, totalKeys) / totalKeys) * 100);
            const previousPacmanRect = this.getRelativeRect(this.catEl);

            if (cycleState.cycle !== this.lastCycles[mode]) {
                this.resetCycleVisuals(mode);
                this.lastCycles[mode] = cycleState.cycle;
            }

            if (this.countEl) this.countEl.textContent = String(cycleState.rawPresses);
            if (this.percentageEl) this.percentageEl.textContent = `${percentage}%`;
            if (this.scoreEl) this.scoreEl.textContent = `SCORE ${String(Math.min(cycleState.rawPresses * 10, 99999)).padStart(5, '0')}`;
            this.root.style.setProperty('--maze-eaten', `${Math.min(percentage, 100)}%`);

            const catPosition = Math.min(this.getStartPosition() + percentage * (this.getTravelRange() / 100), 88);
            this.catEl.style.left = `${catPosition}%`;
            this.checkEnemyContacts(previousPacmanRect);
            this.catEl.classList.add('walking');
            window.setTimeout(() => this.catEl && this.catEl.classList.remove('walking'), 600);

            const currentLevel = this.getLevel(keysPressed, mode);
            const lastLevel = this.lastLevels[mode];

            if (currentLevel > lastLevel && currentLevel <= 10) {
                const treatPercent = currentLevel === 10 ? 100 : currentLevel * 10;
                const treatEl = this.root.querySelector(`.treat[data-treat="${treatPercent}"]`);

                if (treatEl && !treatEl.classList.contains('eaten')) {
                    treatEl.classList.add('eating');
                    this.catEl.classList.add('eating', 'show-message');
                    this.catEl.setAttribute('data-level', String(currentLevel));

                    if (this.messageEl) this.messageEl.textContent = this.messages[currentLevel] || this.messages[0];
                    if (this.moodEl) this.moodEl.textContent = this.moods[currentLevel] || this.moods[0];

                    this.createSparkles(treatEl);

                    window.setTimeout(() => {
                        treatEl.classList.remove('eating');
                        treatEl.classList.add('eaten');
                        this.catEl.classList.remove('eating');
                        if (this.treatsEl) this.treatsEl.textContent = `${this.treatsLabel}: ${currentLevel}/10`;
                    }, 500);

                    window.setTimeout(() => {
                        this.catEl.classList.remove('show-message');
                    }, 2000);
                }

                this.lastLevels[mode] = currentLevel;
            }

            if (keysPressed >= totalKeys && !this.completed) {
                this.completed = true;
                this.catEl.setAttribute('data-level', '10');
                this.catEl.classList.add('show-message');
                if (this.moodEl) this.moodEl.textContent = this.moods[10];
                if (this.messageEl) this.messageEl.textContent = this.completeMessage;
                const finalTreat = this.root.querySelector('.treat[data-treat="100"]');
                if (finalTreat) {
                    this.createSparkles(finalTreat);
                }
                for (let i = 0; i < 5; i++) {
                    window.setTimeout(() => this.createSparkles(this.catEl), i * 180);
                }
            }
        }

        reset(options = {}) {
            if (!this.root) return;

            const totalKeys = Math.max(Number(options.totalKeys) || this.desktopTotalKeys, 1);
            if (this.countEl) this.countEl.textContent = '0';
            if (this.percentageEl) this.percentageEl.textContent = '0%';
            if (this.scoreEl) this.scoreEl.textContent = 'SCORE 00000';
            if (this.totalEl) this.totalEl.textContent = String(totalKeys);
            this.root.style.setProperty('--maze-eaten', '0%');

            if (this.catEl) {
                this.catEl.style.left = `${this.getStartPosition()}%`;
                this.catEl.setAttribute('data-level', '0');
                this.catEl.classList.remove('walking', 'eating', 'show-message');
            }
            if (this.messageEl) this.messageEl.textContent = this.messages[0];
            if (this.moodEl) this.moodEl.textContent = this.moods[0];
            if (this.treatsEl) this.treatsEl.textContent = `${this.treatsLabel}: 0/10`;

            this.root.querySelectorAll('.treat').forEach((treat) => {
                treat.classList.remove('eaten', 'eating');
            });
            this.root.querySelectorAll('.sparkle').forEach((sparkle) => sparkle.remove());

            this.lastLevels.desktop = 0;
            this.lastLevels.mobile = 0;
            this.lastCycles.desktop = 0;
            this.lastCycles.mobile = 0;
            this.completed = false;
            this.setupEnemies();
        }
    }

    window.KeyboardCatProgress = KeyboardCatProgress;
})();
