<div class="game-container">
    <h1 class="game-title">Aventura de Rastro Emoji</h1>
    <div class="game-options">
        <h2 class="game-subtitle">Personaliza Tu Juego</h2>
        <div class="option-group">
            <select class="game-select" id="trailSelect" onchange="setTrail(this.value)">
                <option value="sparkles">✨ Destellos</option>
                <option value="fire">🔥 Fuego</option>
                <option value="star">⭐ Estrella</option>
                <option value="sun">☀️ Sol</option>
                <option value="moon">🌙 Luna</option>
                <option value="heart">❤️ Corazón</option>
                <option value="lightning">⚡ Rayo</option>
                <option value="snowflake">❄️ Copo de Nieve</option>
                <option value="rocket">🚀 Cohete</option>
                <option value="rainbow">🌈 Arcoíris</option>
            </select>
            <button class="game-button" id="clearTrailBtn" onclick="clearTrail()">Limpiar Rastro</button>
        </div>
    </div>

    <div id="gameArea" class="game-area"></div>

    <div id="result" class="game-result"></div>

    <div id="help" class="game-help">
        <h3 class="game-help-title">Ayuda Rápida</h3>
        <p class="game-help-text">Mueve el ratón en el área de juego para crear divertidos rastros de emojis. Elige diferentes emojis del menú desplegable para cambiar el tipo de rastro. Tu puntuación aumenta según el número de rastros, su tipo y los patrones de movimiento (círculos cerrados o zigzags salvajes). ¡Haz clic en "Limpiar Rastro" para reiniciar y empezar de nuevo!</p>
    </div>
</div>

<style>
    .game-container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 40px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1), 0 0 20px rgba(255, 255, 255, 0.2) inset;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-family: 'Poppins', sans-serif;
        position: relative;
    }

    .game-title {
        color: #1a253b;
        font-size: 2.5em;
        margin-bottom: 30px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        font-weight: 600;
        letter-spacing: 1px;
    }

    .game-subtitle {
        color: #4a607c;
        font-size: 1.5em;
        margin-bottom: 20px;
    }

    .game-options {
        margin-bottom: 40px;
    }

    .option-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        align-items: center;
    }

    .game-select, .game-button {
        padding: 15px 25px;
        font-size: 16px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        box-shadow: 5px 5px 15px #d9d9d9, -5px -5px 15px #ffffff;
        color: #1a253b;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
    }

    .game-select:hover, .game-button:hover {
        box-shadow: 8px 8px 20px #d9d9d9, -8px -8px 20px #ffffff;
        transform: translateY(-2px);
    }

    .game-select:focus {
        box-shadow: 0 0 0 3px rgba(26, 37, 59, 0.3);
    }

    .game-area {
        width: 100%;
        max-width: 900px;
        height: 600px;
        margin: 20px auto;
        border-radius: 15px;
        border: 4px solid #1a253b;
        background: linear-gradient(45deg, #ffffff, #f5f7fa);
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1), inset 0 0 20px rgba(255, 255, 255, 0.5);
        font-size: 30px;
    }

    .trail {
        position: absolute;
        pointer-events: none;
        transition: transform 0.1s ease;
        line-height: 1;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .game-result {
        margin: 30px auto;
        max-width: 800px;
        font-size: 22px;
        color: #1a253b;
        font-weight: 500;
        background: rgba(26, 37, 59, 0.05);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 5px 5px 15px #d9d9d9, -5px -5px 15px #ffffff;
        animation: fadeIn 0.5s ease-in;
    }

    .game-help {
        margin: 30px auto;
        max-width: 800px;
        font-size: 18px;
        color: #4a607c;
        background: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 12px;
        box-shadow: 5px 5px 15px #d9d9d9, -5px -5px 15px #ffffff;
        line-height: 1.6;
    }

    .game-help-title {
        color: #1a253b;
        margin-bottom: 10px;
        font-size: 1.2em;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .game-container {
            padding: 20px;
        }

        .game-title {
            font-size: 2em;
        }

        .game-subtitle {
            font-size: 1.2em;
        }

        .option-group {
            flex-direction: column;
            align-items: center;
        }

        .game-select, .game-button {
            width: 100%;
            max-width: 300px;
            padding: 12px 20px;
            font-size: 14px;
        }

        .game-area {
            height: 400px;
        }

        .game-result, .game-help {
            font-size: 16px;
            padding: 15px;
            max-width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentTrail = 'sparkles';
        let trails = [];
        const gameArea = document.getElementById('gameArea');
        const trailSelect = document.getElementById('trailSelect');
        const clearTrailBtn = document.getElementById('clearTrailBtn');

        currentTrail = trailSelect.value;

        const emojiTrails = {
            'sparkles': '✨', 'fire': '🔥', 'star': '⭐',
            'sun': '☀️', 'moon': '🌙', 'heart': '❤️',
            'lightning': '⚡', 'snowflake': '❄️', 'rocket': '🚀', 'rainbow': '🌈'
        };

        trailSelect.addEventListener('change', function() {
            currentTrail = this.value;
            console.log('Trail changed to:', currentTrail);
        });

        gameArea.addEventListener('mousemove', (e) => {
            const rect = gameArea.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const trail = document.createElement('div');
            trail.className = 'trail';
            trail.style.left = (x - 15) + 'px';
            trail.style.top = (y - 15) + 'px';
            trail.innerHTML = emojiTrails[currentTrail];

            gameArea.appendChild(trail);
            trails.push({ x, y, type: currentTrail });

            if (trails.length > 100) {
                const oldTrail = document.querySelector('.trail');
                if (oldTrail) oldTrail.remove();
                trails.shift();
            }

            if (trails.length % 10 === 0) {
                fetch('', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'trails=' + encodeURIComponent(JSON.stringify(trails)) + '&type=' + currentTrail
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('result').innerHTML = data.score;
                })
                .catch(error => console.error('Fetch error:', error));
            }
        });

        function setTrail(type) {
            currentTrail = type;
            trailSelect.value = type;
            console.log('Setting trail to:', currentTrail);
            if (trails.length > 0) {
                const lastTrail = document.querySelector('.trail:last-child');
                if (lastTrail) {
                    lastTrail.innerHTML = emojiTrails[currentTrail];
                }
            }
        }

        function clearTrail() {
            console.log('Clearing trails...');
            if (gameArea && trails) {
                trails = [];
                gameArea.innerHTML = '';
                document.getElementById('result').innerHTML = '¡Rastro limpiado! Comienza de nuevo.';
            } else {
                console.error('Game area or trails not found!');
            }
        }

        if (clearTrailBtn) {
            clearTrailBtn.addEventListener('click', clearTrail);
        } else {
            console.error('Clear Trail button not found!');
        }
    });
</script>
