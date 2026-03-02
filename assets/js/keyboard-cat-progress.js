(function() {
    'use strict';

    const CAT_TEXT = {
        en: {
            messages: [
                'Press keys to feed me!',
                'Yummy fish!',
                'Refreshing!',
                'Mouse toy caught!',
                'Yarn time!',
                'Can treat!',
                'Chicken snack!',
                'Candy time!',
                'Star unlocked!',
                'Almost there!',
                'Trophy unlocked!'
            ],
            moods: [
                'Hungry',
                'Happy',
                'Loving it!',
                'Excited!',
                'Playful',
                'Energetic',
                'Thriving',
                'Focused',
                'Shining',
                'Super Cat',
                'Champion'
            ],
            treatsLabel: 'Treats',
            completeMessage: 'Trophy unlocked!'
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

            this.desktopTotalKeys = Math.max(Number(options.desktopTotalKeys) || 103, 1);
            this.mobileTotalKeys = Math.max(Number(options.mobileTotalKeys) || 42, 1);
            this.desktopMilestones = options.desktopMilestones || [10, 20, 30, 40, 50, 60, 70, 80, 90, 103];
            this.mobileMilestones = options.mobileMilestones || [4, 8, 13, 17, 21, 25, 29, 34, 38, 42];
            this.sparkles = ['*', '+', 'x', 'o', '.'];
            this.locale = resolveLocale(options.locale);
            const localeText = CAT_TEXT[this.locale] || CAT_TEXT.en;
            this.messages = normalizeTextArray(options.messages, localeText.messages);
            this.moods = normalizeTextArray(options.moods, localeText.moods);
            this.treatsLabel = (typeof options.treatsLabel === 'string' && options.treatsLabel.trim() !== '')
                ? options.treatsLabel
                : localeText.treatsLabel;
            this.completeMessage = (typeof options.completeMessage === 'string' && options.completeMessage.trim() !== '')
                ? options.completeMessage
                : (this.messages[10] || localeText.completeMessage);

            this.lastLevels = { desktop: 0, mobile: 0 };
            this.completed = false;
            this.setDisplayMode(false, this.desktopTotalKeys);
            this.reset({ totalKeys: this.desktopTotalKeys });
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

        update(options) {
            if (!this.catEl) return;

            const mode = options && options.mode === 'mobile' ? 'mobile' : 'desktop';
            const totalKeys = Math.max(Number(options && options.totalKeys) || this.desktopTotalKeys, 1);
            const keysPressed = Math.max(0, Number(options && options.keysPressed) || 0);
            const percentage = Math.round((Math.min(keysPressed, totalKeys) / totalKeys) * 100);

            if (this.countEl) this.countEl.textContent = String(keysPressed);
            if (this.percentageEl) this.percentageEl.textContent = `${percentage}%`;

            const catPosition = Math.min(percentage * 0.92, 92);
            this.catEl.style.left = `${catPosition}%`;
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
            if (this.totalEl) this.totalEl.textContent = String(totalKeys);

            if (this.catEl) {
                this.catEl.style.left = '0%';
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
            this.completed = false;
        }
    }

    window.KeyboardCatProgress = KeyboardCatProgress;
})();
