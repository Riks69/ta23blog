<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minu Blogi | Laravel + DaisyUI</title>
    
    <!-- Tailwind + DaisyUI CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        /* Ilus hover efekt kaartidele */
        .blog-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .blog-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Animated gradient hero */
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animated-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            background-size: 200% 200%;
            animation: gradientShift 5s ease infinite;
        }
        
        /* Ilus scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
        }
        
        /* Glow efekt */
        .glow-text {
            text-shadow: 0 2px 20px rgba(102, 126, 234, 0.3);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 via-white to-gray-100">

    <!-- Floating background elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse delay-1000"></div>
    </div>

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent hover:from-purple-500 hover:to-indigo-500 transition">
                    📖 RiksBlog
                </a>
                
                <div class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-gray-700 hover:text-purple-600 font-medium transition">Avaleht</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 font-medium transition">Kategooriad</a>
                    <a href="#" class="text-gray-700 hover:text-purple-600 font-medium transition">Kontakt</a>
                </div>
                
                <div class="flex items-center gap-3">
                    <!-- Teemade valija -->
                    <details class="dropdown dropdown-end">
                        <summary class="btn btn-circle btn-ghost bg-gray-100 hover:bg-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                            </svg>
                        </summary>
                        <ul class="menu dropdown-content bg-white rounded-box z-10 w-48 p-2 shadow-2xl border border-gray-100">
                            <li><a onclick="setTheme('light')" class="gap-3">☀️ Hele</a></li>
                            <li><a onclick="setTheme('dark')" class="gap-3">🌙 Tume</a></li>
                            <li><a onclick="setTheme('cupcake')" class="gap-3">🧁 Cupcake</a></li>
                        </ul>
                    </details>
                    
                    <!-- Mobile menu button -->
                    <button class="md:hidden btn btn-circle btn-ghost">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section - ILUS! -->
    <div class="animated-gradient text-white py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <div class="max-w-3xl mx-auto">
                <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-sm mb-6">
                    📝 Blogi alustas 2026
                </div>
                <h1 class="text-6xl md:text-7xl font-extrabold mb-6 glow-text">
                    Kirjuta. Jaga. Inspireeri.
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-white/90">
                    Avasta põnevaid lugusid, mõtteid ja ideed minu digipäevikust
                </p>
                <div class="flex gap-4 justify-center">
                    <button class="bg-white text-purple-600 px-8 py-3 rounded-full font-semibold hover:shadow-2xl transition-all transform hover:scale-105">
                        🔍 Avasta postitusi
                    </button>
                    <button class="border-2 border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-purple-600 transition">
                        📧 Liitu uudiskirjaga
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Decorative waves -->
        <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="white" class="dark:fill-gray-900"></path>
        </svg>
    </div>

    <!-- Postituste grid -->
    <div class="container mx-auto px-6 py-24">
        <div class="text-center mb-16">
            <div class="inline-block px-4 py-2 bg-purple-100 text-purple-600 rounded-full text-sm font-semibold mb-4">
                ✨ Viimased lood
            </div>
            <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                Populaarsemad postitused
            </h2>
            <p class="text-gray-500 mt-4 text-lg">Avasta kogukonna lemmikud</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $index => $post)
                <div class="blog-card bg-white rounded-2xl overflow-hidden shadow-xl border border-gray-100">
                    <!-- Pildi sektsioon -->
                    <div class="relative h-56 overflow-hidden">
                        @if($post->image)
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-400 to-indigo-500 flex items-center justify-center">
                                <span class="text-6xl">📖</span>
                            </div>
                        @endif
                        
                        <!-- Kategooria märgis -->
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 bg-white/95 backdrop-blur-sm rounded-full text-xs font-semibold text-purple-600 shadow-md">
                                {{ ['Tehnoloogia', 'Mõtted', 'Inspiratsioon', 'Lood'][$index % 4] }}
                            </span>
                        </div>
                        
                        <!-- Meeldimiste märk -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-white/95 backdrop-blur-sm rounded-full text-xs font-semibold text-red-500 shadow-md flex items-center gap-1">
                                ❤️ {{ $post->likes_count }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Sisu -->
                    <div class="p-6">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <span>✍️ {{ $post->author }}</span>
                            <span>•</span>
                            <span>📅 {{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <h3 class="text-xl font-bold mb-3 text-gray-800 hover:text-purple-600 transition">
                            <a href="/post/{{ $post->id }}">{{ $post->title }}</a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ Str::limit($post->content, 120) }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-4">
                                <a href="/post/{{ $post->id }}" class="flex items-center gap-1 text-gray-500 hover:text-purple-600 transition text-sm">
                                    💬 {{ $post->comments_count }}
                                </a>
                                <form action="/like/{{ $post->id }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-1 text-gray-500 hover:text-red-500 transition text-sm">
                                        ❤️
                                    </button>
                                </form>
                            </div>
                            
                            <a href="/post/{{ $post->id }}" class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:gap-3 transition-all">
                                Loe edasi
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Uudiskirja sektsioon -->
    <div class="bg-gradient-to-r from-purple-600 via-indigo-600 to-purple-600 py-20 mt-12">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-2xl mx-auto">
                <div class="text-5xl mb-4">📬</div>
                <h3 class="text-3xl font-bold text-white mb-4">Ära jää ilma</h3>
                <p class="text-white/90 mb-8">Saa esimesena teada uutest postitustest ja eripakkumistest</p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <input type="email" placeholder="Sinu parim e-posti aadress" 
                           class="px-6 py-3 rounded-full text-gray-900 bg-white focus:outline-none focus:ring-4 focus:ring-purple-300 w-full md:w-80">
                    <button class="bg-black text-white px-8 py-3 rounded-full font-semibold hover:bg-gray-900 transition shadow-lg">
                        Liitun tasuta →
                    </button>
                </div>
                <p class="text-white/70 text-sm mt-4">Pole rämpsposti. Kunagi.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div>
                    <h4 class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-indigo-400 bg-clip-text text-transparent mb-4">
                        MysticBlog
                    </h4>
                    <p class="text-gray-400 text-sm">Jagame lugusid, mis inspireerivad ja muudavad maailma paremaks.</p>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Sisu</h5>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">Kõik postitused</a></li>
                        <li><a href="#" class="hover:text-white transition">Kategooriad</a></li>
                        <li><a href="#" class="hover:text-white transition">Arhiiv</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Info</h5>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-white transition">Minu lugu</a></li>
                        <li><a href="#" class="hover:text-white transition">Kontakt</a></li>
                        <li><a href="#" class="hover:text-white transition">Privaatsus</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-semibold mb-4">Sotsiaalmeedia</h5>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">🐦</a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">📘</a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-purple-600 transition">📷</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                <p>Made with ❤️ using Laravel & DaisyUI | © 2026 Minu Blogi</p>
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