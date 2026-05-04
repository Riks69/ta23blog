<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | MysticBlog</title>
    
    <!-- Tailwind + DaisyUI CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
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
        
        /* Sisu stiilid */
        .article-content {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #374151;
        }
        
        .article-content p {
            margin-bottom: 1.5rem;
        }
        
        /* Kommentaari hover efekt */
        .comment-card {
            transition: all 0.2s ease;
        }
        
        .comment-card:hover {
            background-color: #f9fafb;
            transform: translateX(4px);
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
        
        /* Glow tekst */
        .glow-text {
            text-shadow: 0 2px 20px rgba(102, 126, 234, 0.3);
        }
        
        /* Like button pulse animation */
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .like-button:active {
            animation: pulse 0.3s ease;
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
                <a href="/" class="text-2xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent hover:from-purple-500 hover:to-indigo-500 transition">
                    ← MysticBlog
                </a>
                
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
                </div>
            </div>
        </div>
    </nav>

    <!-- Artikkel -->
    <div class="container mx-auto px-6 py-12 max-w-4xl">
        
        <!-- Kategooria märk -->
        <div class="mb-6">
            <span class="inline-block px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-semibold">
                📖 Populaarne
            </span>
        </div>
        
        <!-- Pealkiri -->
        <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6 leading-tight">
            {{ $post->title }}
        </h1>
        
        <!-- Autori info + jagamise nupud -->
        <div class="flex flex-wrap justify-between items-center py-6 border-y border-gray-200 mb-8">
            <div class="flex items-center gap-4">
                <!-- Avatar placeholder -->
                <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                    {{ substr($post->author, 0, 1) }}
                </div>
                <div>
                    <p class="font-semibold text-gray-900">{{ $post->author }}</p>
                    <p class="text-sm text-gray-500">
                        Avaldatud {{ $post->created_at->format('d.m.Y') }} • 
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
            
            <!-- Jaga nupud -->
            <div class="flex gap-3 mt-4 md:mt-0">
                <button class="btn btn-sm bg-gray-100 hover:bg-gray-200 border-none">
                    📘 Jaga
                </button>
                <button class="btn btn-sm bg-gray-100 hover:bg-gray-200 border-none">
                    🐦 Tweeri
                </button>
            </div>
        </div>
        
        <!-- Pilt -->
        @if($post->image)
            <div class="rounded-2xl overflow-hidden shadow-xl mb-10">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
            </div>
        @else
            <div class="rounded-2xl overflow-hidden shadow-xl mb-10 bg-gradient-to-br from-purple-400 to-indigo-500 h-96 flex items-center justify-center">
                <span class="text-8xl">📖✨</span>
            </div>
        @endif
        
        <!-- Sisu -->
        <div class="article-content prose prose-lg max-w-none mb-12">
            <p>{{ $post->content }}</p>
        </div>
        
        <!-- Meeldimiste sektsioon -->
        <div class="flex items-center justify-between py-8 border-y border-gray-200 mb-12">
            <div class="flex items-center gap-6">
                <form action="/like/{{ $post->id }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="like-button flex items-center gap-3 bg-red-50 hover:bg-red-100 px-6 py-3 rounded-full transition">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span class="font-semibold text-gray-700">{{ $post->likes_count }} inimestele meeldib</span>
                    </button>
                </form>
                
                <div class="flex items-center gap-2 text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>{{ $post->comments->count() }} kommentaari</span>
                </div>
            </div>
            
            <!-- Loe aeg -->
            <div class="text-sm text-gray-400">
                ⏱️ {{ round(str_word_count($post->content) / 200) }} min lugemist
            </div>
        </div>
        
        <!-- Kommentaaride sektsioon -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12">
            <h3 class="text-2xl font-bold mb-6 flex items-center gap-3">
                <span>💬</span> Kommentaarid
                <span class="text-sm bg-gray-100 px-3 py-1 rounded-full">{{ $post->comments->count() }}</span>
            </h3>
            
            @if($post->comments->count() > 0)
                <div class="space-y-4 mb-8">
                    @foreach($post->comments as $comment)
                        <div class="comment-card bg-gray-50 rounded-xl p-5 transition">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-indigo-400 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ substr($comment->author, 0, 1) }}
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-1">
                                        <span class="font-semibold text-gray-900">{{ $comment->author }}</span>
                                        <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700">{{ $comment->content }}</p>
                                    <div class="mt-2 flex gap-4 text-xs">
                                        <button class="text-gray-400 hover:text-purple-600 transition">👍 Meeldib</button>
                                        <button class="text-gray-400 hover:text-purple-600 transition">💬 Vasta</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-400">
                    <span class="text-5xl mb-3 block">💭</span>
                    <p>Kommentaare veel pole. Ole esimene!</p>
                </div>
            @endif
            
            <!-- Lisa kommentaari vorm -->
            <div class="border-t border-gray-200 pt-8 mt-6">
                <h4 class="font-semibold text-lg mb-4 flex items-center gap-2">
                    <span>✍️</span> Lisa oma mõte
                </h4>
                <form action="/comment/{{ $post->id }}" method="POST">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="author" placeholder="Sinu nimi" 
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               required>
                        <input type="email" name="email" placeholder="Sinu e-post (valikuline)" 
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <textarea name="content" rows="4" placeholder="Jaga oma mõtteid..." 
                              class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mb-4"
                              required></textarea>
                    <button type="submit" 
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg transition-all transform hover:scale-105">
                        Saada kommentaar →
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Sarnased postitused (lihtsalt soovitus) -->
        <div class="text-center py-8">
            <p class="text-gray-400 text-sm">
                🧠 Kas postitus meeldis? Jaga sõpradega või jäta kommentaar!
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-12">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400">Made with ❤️ using Laravel & DaisyUI</p>
            <p class="text-gray-500 text-sm mt-4">© 2026 MysticBlog. Kõik õigused kaitstud.</p>
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