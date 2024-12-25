<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyeux Noël!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .snowflake {
            position: fixed;
            color: #fff;
            font-size: 1em;
            font-family: Arial, sans-serif;
            text-shadow: 0 0 5px #000;
            user-select: none;
            z-index: 1000;
            pointer-events: none;
        }

        @keyframes float {
            0% {
                transform: translateY(0%) rotate(0deg);
            }
            50% {
                transform: translateY(10px) rotate(180deg);
            }
            100% {
                transform: translateY(0%) rotate(360deg);
            }
        }

        .gift {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #ff4d4d, 0 0 20px #ff4d4d; }
            50% { text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #ff4d4d, 0 0 40px #ff4d4d; }
        }

        .glow-text {
            animation: glow 2s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-red-900 to-red-700 min-h-screen flex flex-col items-center justify-center p-4">
    <div id="snowContainer"></div>

    <div class="text-center z-10">
        <div class="gift text-7xl mb-8">🎁</div>
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-8 glow-text">Joyeux Noël!</h1>
        
        <div class="bg-white/20 backdrop-blur-lg rounded-xl p-8 max-w-md mx-auto">
            <label class="block text-white text-xl mb-4">Pour qui est ce message ?</label>
            <form action="{{ route('send') }}" method="post">
                @csrf
                <input type="text" 
                       id="name" name="name"
                       class="w-full p-3 rounded-lg mb-4 bg-white/90 text-red-900 text-xl focus:outline-none focus:ring-2 focus:ring-red-500"
                       placeholder="Entrez un nom...">
                <button onclick="generateMessage()" 
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:scale-105">
                    Créer le message
                </button>
            </form>
        </div>

    </div>

    <script>
        function createSnowflake() {
            const snowflake = document.createElement('div');
            snowflake.className = 'snowflake';
            snowflake.innerHTML = '❅';
            
            snowflake.style.left = Math.random() * window.innerWidth + 'px';
            snowflake.style.opacity = Math.random();
            snowflake.style.fontSize = (Math.random() * 20 + 10) + 'px';
            
            document.getElementById('snowContainer').appendChild(snowflake);
            
            let positionY = 0;
            const speed = Math.random() * 2 + 1;
            const rotation = Math.random() * 360;
            
            const fall = setInterval(() => {
                positionY += speed;
                snowflake.style.transform = `translateY(${positionY}px) rotate(${rotation}deg)`;
                
                if (positionY > window.innerHeight) {
                    snowflake.remove();
                    clearInterval(fall);
                    createSnowflake();
                }
            }, 20);
        }

        // Créer plusieurs flocons au démarrage
        for (let i = 0; i < 50; i++) {
            setTimeout(() => {
                createSnowflake();
            }, i * 100);
        }

        

        // Ajouter un événement pour la touche Entrée
        document.getElementById('nameInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                generateMessage();
            }
        });
    </script>
</body>
</html>