<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partagez votre message de Noël</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes sparkle {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .sparkle {
            animation: sparkle 2s ease-in-out infinite;
            display: inline-block;
        }

        .bg-custom {
            background: linear-gradient(135deg, #ff1a1a 0%, #990000 100%);
            background-attachment: fixed;
        }

        .copy-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            transform: translateX(200%);
            transition: transform 0.3s ease-in-out;
        }

        .copy-notification.show {
            transform: translateX(0);
        }

        .star {
            position: fixed;
            width: 4px;
            height: 4px;
            background-color: white;
            border-radius: 50%;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-custom min-h-screen text-white">
    <div class="stars-container fixed top-0 left-0 w-full h-full pointer-events-none"></div>

    <div id="copyNotification" class="copy-notification bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        Lien copié ! 🎄
    </div>

    <main class="relative z-10 container mx-auto px-4 py-12 min-h-screen flex flex-col items-center justify-center">
        <div class="max-w-2xl w-full text-center">
            <div class="floating mb-8 text-7xl inline-block">🎅</div>
            
            <h1 class="text-4xl md:text-5xl font-bold mb-8">
                <span class="sparkle">✨</span>
                Partagez la magie de Noël
                <span class="sparkle">✨</span>
            </h1>

            <div class="bg-white/20 backdrop-blur-xl rounded-2xl p-6 md:p-8 mb-8 shadow-2xl">
                <p class="text-xl mb-6">
                    Copiez ce lien et envoyez-le à votre proche pour partager votre message de Noël ! 🎄
                </p>

                <div class="flex flex-col md:flex-row gap-4 items-stretch">
                    <input 
                        type="text" 
                        id="shareLink" 
                        value="{{ $lien }}"
                        readonly
                        class="flex-1 px-4 py-3 rounded-lg bg-white/30 backdrop-blur text-white placeholder-white/70 font-mono text-lg focus:outline-none focus:ring-2 focus:ring-white/50"
                    >
                    <button 
                        onclick="copyLink()"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-lg transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                        <span>Copier le lien</span>
                        <span class="text-xl">📋</span>
                    </button>
                </div>
            </div>

            <div class="flex justify-center space-x-6 text-5xl">
                <span class="floating" style="animation-delay: 0.5s">🎁</span>
                <span class="floating" style="animation-delay: 1s">⭐</span>
                <span class="floating" style="animation-delay: 1.5s">🎄</span>
            </div>
        </div>
    </main>

    <script>
        function copyLink() {
            const shareLink = document.getElementById('shareLink');
            shareLink.select();
            shareLink.setSelectionRange(0, 99999); // Pour mobile
            
            navigator.clipboard.writeText(shareLink.value).then(() => {
                const notification = document.getElementById('copyNotification');
                notification.classList.add('show');
                
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 2000);
            });
        }

        // Création d'étoiles en arrière-plan
        function createStars() {
            const container = document.querySelector('.stars-container');
            for (let i = 0; i < 50; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                star.style.opacity = Math.random();
                star.style.animation = `sparkle ${2 + Math.random() * 3}s ease-in-out infinite`;
                container.appendChild(star);
            }
        }

        createStars();
    </script>
</body>
</html>