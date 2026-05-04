<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} | Riksi Blogi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        
        .blog-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px -15px rgba(0,0,0,0.2);
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animated-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: 200% 200%;
            animation: gradientShift 5s ease infinite;
        }
    </style>
</head>
<body class="bg-base-200">

    <!-- Navbar -->
    <nav class="navbar bg-base-100 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                    📝 Riksi Blogi
                </a>
            </div>
            <div class="hidden md:flex gap-2">
                <a href="/" class="btn btn-ghost">Avaleht</a>
                <a href="/kategooriad" class="btn btn-primary">Kategooriad</a>
                <a href="/contact" class="btn btn-ghost">Kontakt</a>
            </div>
            <div class="flex-none gap-2">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow-2xl">
                        <li><a onclick="setTheme('light')">☀️ Hele</a></li>
                        <li><a onclick="setTheme('dark')">🌙 Tume</a></li>
                    </ul>
                </div>
                <button class="btn btn-ghost btn-circle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="animated-gradient text-white py-24">
        <div class="container mx-auto px-4 text-center">
            <div class="badge badge-lg bg-white/20 text-white border-none mb-4">
                @switch($category->name)
                    @case('Tehnoloogia') 💻 @break
                    @case('Mõtted') 💭 @break
                    @case('Inspiratsioon') ✨ @break
                    @case('Lood') 📖 @break
                    @default 🏷️
                @endswitch
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-4">{{ $category->name }}</h1>
            <p class="text-xl opacity-90">{{ $posts->count() }} postitust selles kategoorias</p>
        </div>
    </div>

    <!-- Postitused -->
    <div class="container mx-auto px-4 py-16 max-w-4xl">
        <div class="mb-8">
            <a href="/kategooriad" class="btn btn-ghost btn-sm">← Tagasi kategooriatesse</a>
        </div>
        
        @if($posts->count() > 0)
            <div class="space-y-6">
                @foreach($posts as $post)
                    <div class="blog-card card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title text-2xl">
                                <a href="/post/{{ $post->id }}" class="hover:text-purple-600">{{ $post->title }}</a>
                            </h2>
                            <div class="flex items-center gap-2 text-sm text-base-content/60 mb-2">
                                <span>✍️ {{ $post->author }}</span>
                                <span>•</span>
                                <span>📅 {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-base-content/70">{{ Str::limit($post->content, 150) }}</p>
                            <div class="card-actions justify-between items-center mt-4">
                                <div class="flex gap-3">
                                    <span class="btn btn-sm btn-ghost gap-1">💬 {{ $post->comments_count }}</span>
                                    <span class="btn btn-sm btn-ghost gap-1">❤️ {{ $post->likes_count }}</span>
                                </div>
                                <a href="/post/{{ $post->id }}" class="btn btn-primary btn-sm">Loe edasi →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <span class="text-6xl block mb-4">📭</span>
                <p class="text-xl">Selles kategoorias pole veel postitusi.</p>
                <a href="/" class="btn btn-primary mt-6">Vaata kõiki postitusi →</a>
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="footer footer-center bg-base-300 text-base-content p-10 mt-12">
        <div>
            <p class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                Riksi Blogi
            </p>
            <p>Made with ❤️ using Laravel & DaisyUI</p>
            <div class="flex gap-4 justify-center mt-4">
                <a href="#" class="btn btn-ghost btn-sm">🐦 Twitter</a>
                <a href="#" class="btn btn-ghost btn-sm">📘 Facebook</a>
                <a href="#" class="btn btn-ghost btn-sm">📷 Instagram</a>
            </div>
            <p class="text-sm opacity-50 mt-6">© 2026 Riksi Blogi. Kõik õigused kaitstud.</p>
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