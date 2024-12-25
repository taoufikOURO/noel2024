<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyeux Noël! 🎄</title>
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

        .letter {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .letter.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .bg-custom {
            background: linear-gradient(135deg, #ff1a1a 0%, #990000 100%);
            background-attachment: fixed;
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
    
    <main class="relative z-10 container mx-auto px-4 py-12 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <div class="floating mb-8 text-8xl inline-block">🎄</div>
                
                <h1 class="text-5xl md:text-7xl font-bold mb-8">
                    <span class="sparkle">✨</span>
                    Joyeux Noël {{$user->name}}!
                    <span class="sparkle">✨</span>
                </h1>
            </div>

            <div class="bg-white/20 backdrop-blur-xl rounded-2xl p-6 md:p-8 mb-8 shadow-2xl">
                <p class="letter text-lg md:text-2xl leading-relaxed mb-6">
                    Chèr(e) {{$user->name}},
                </p>
                <p class="letter text-lg md:text-2xl leading-relaxed mb-6">
                    En cette douce nuit de Noël, je voulais prendre un moment spécial pour t'envoyer mes vœux les plus chaleureux. 🌟
                </p>
                <p class="letter text-lg md:text-2xl leading-relaxed mb-6">
                    Que cette période magique t'apporte tout le bonheur que tu mérites, des moments précieux avec ceux que tu aimes, et bien sûr, plein de merveilleux cadeaux sous le sapin ! 🎁
                </p>
                <p class="letter text-lg md:text-2xl leading-relaxed mb-6">
                    J'espère que cette année t'apportera encore plus de sourires, de réussites et de moments mémorables. Que chaque jour soit une nouvelle aventure remplie de bonheur et de découvertes ! ⭐
                </p>
                <p class="letter text-lg md:text-2xl leading-relaxed">
                    Passe un merveilleux Noël rempli de joie, de rires et de moments inoubliables ! 🎄✨
                </p>
            </div>

            <div class="flex justify-center space-x-8 text-6xl py-8">
                <span class="floating" style="animation-delay: 0.5s">🎁</span>
                <span class="floating" style="animation-delay: 1s">⭐</span>
                <span class="floating" style="animation-delay: 1.5s">🎅</span>
            </div>
        </div>
    </main>

    <script>
        // Animation des lettres au chargement
        document.addEventListener('DOMContentLoaded', () => {
            const letters = document.querySelectorAll('.letter');
            letters.forEach((letter, index) => {
                setTimeout(() => {
                    letter.classList.add('visible');
                }, index * 400);
            });
        });

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