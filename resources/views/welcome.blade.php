<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minu Blogi | Laravel + DaisyUI</title>
    @vite(['resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">

    <!-- Navbar -->
    <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <a class="text-2xl font-bold gradient-text" href="#">✨ Minu Blogi</a>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition">Avaleht</a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition">Blogi</a>
                    <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition">Kontakt</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Teemade valija -->
                    <details class="dropdown dropdown-end">
                        <summary class="btn btn-ghost btn-circle">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </summary>
                        <ul class="menu dropdown-content bg-white dark:bg-gray-800 rounded-box z-10 w-52 p-2 shadow-2xl">
                            <li><a onclick="setTheme('light')">☀️ Hele</a></li>
                            <li><a onclick="setTheme('dark')">🌙 Tume</a></li>
                            <li><a onclick="setTheme('cupcake')">🧁 Cupcake</a></li>
                        </ul>
                    </details>
                    
                    <!-- Mob menüü nupp -->
                    <button class="md:hidden btn btn-ghost btn-circle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero sektsioon -->
    <div class="hero-gradient text-white py-32">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 animate-fade-in">
                    Tere tulemast!
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-95">
                    Avasta inspireerivaid lugusid, mõtteid ja ideed
                </p>
                <button class="bg-white text-purple-600 px-8 py-4 rounded-full font-semibold hover:shadow-xl transition-all transform hover:scale-105">
                    Alusta lugemist →
                </button>
            </div>
        </div>
    </div>

    <!-- Blogi postitused -->
    <div class="container mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-4">Viimased postitused</h2>
            <p class="text-gray-600 dark:text-gray-400 text-lg">Kõige värskemad artiklid minu blogist</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Postitus 1 -->
            <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=400&h=300&fit=crop" 
                         alt="Blogi pilt" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="bg-purple-600 text-white px-3 py-1 rounded-full text-sm">Populaarne</span>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                        <span>📅 15. märts 2026</span>
                        <span>•</span>
                        <span>⏱️ 5 min lugemist</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Esimene postitus 🚀</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Tere maailm! See on minu esimene blogipostitus. Räägin, miks alustasin blogi pidamist.</p>
                    <button class="text-purple-600 font-semibold hover:text-purple-700 transition flex items-center gap-2">
                        Loe edasi 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Postitus 2 -->
            <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=400&h=300&fit=crop" 
                         alt="Blogi pilt" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                        <span>📅 10. märts 2026</span>
                        <span>•</span>
                        <span>⏱️ 7 min lugemist</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">Miks Laravel? ⚡</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Laravel on parim PHP raamistik. Siin postituses selgitan, miks ma selle valisin.</p>
                    <button class="text-purple-600 font-semibold hover:text-purple-700 transition flex items-center gap-2">
                        Loe edasi 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Postitus 3 -->
            <div class="card-hover bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-xl">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=300&fit=crop" 
                         alt="Blogi pilt" 
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                        <span>📅 5. märts 2026</span>
                        <span>•</span>
                        <span>⏱️ 4 min lugemist</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 dark:text-white">DaisyUI on lahe ✨</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Tailwind CSS + DaisyUI = kiire ja ilus veebidisain. Vaata, kui lihtne see on!</p>
                    <button class="text-purple-600 font-semibold hover:text-purple-700 transition flex items-center gap-2">
                        Loe edasi 
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Uudiskiri -->
    <div class="hero-gradient text-white py-20 mt-12">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-2xl mx-auto">
                <h3 class="text-3xl font-bold mb-4">Liitu uudiskirjaga</h3>
                <p class="mb-6 opacity-95">Saa esimesena teada uutest postitustest</p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <input type="email" placeholder="Sinu e-post" 
                           class="px-6 py-3 rounded-full text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-purple-300">
                    <button class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:shadow-xl transition">
                        Liitun
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="text-center">
                <p class="text-gray-400">Made with ❤️ using Laravel & DaisyUI</p>
                <p class="text-gray-500 text-sm mt-4">© 2026 Minu Blogi. Kõik õigused kaitstud.</p>
            </div>
        </div>
    </footer>

    <script>
        function setTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        }
        
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.documentElement.setAttribute('data-theme', savedTheme);
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
        }
    </script>
</body>
</html>