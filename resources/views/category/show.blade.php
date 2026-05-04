<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} | Minu Blogi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        .blog-card { transition: all 0.3s ease; }
        .blog-card:hover { transform: translateY(-5px); box-shadow: 0 20px 30px -15px rgba(0,0,0,0.2); }
    </style>
</head>
<body class="bg-base-200">

    <nav class="navbar bg-base-100 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost text-2xl font-bold">📝 Minu Blogi</a>
            </div>
            <div class="hidden md:flex gap-2">
                <a href="/" class="btn btn-ghost">Avaleht</a>
                <a href="/kategooriad" class="btn btn-primary">Kategooriad</a>
                <a href="/contact" class="btn btn-ghost">Kontakt</a>
            </div>
            <div class="flex-none">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">🎨</div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow-2xl">
                        <li><a onclick="setTheme('light')">☀️ Hele</a></li>
                        <li><a onclick="setTheme('dark')">🌙 Tume</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-16 max-w-4xl">
        <div class="mb-8">
            <a href="/kategooriad" class="btn btn-ghost btn-sm">← Tagasi kategooriatesse</a>
        </div>
        
        <h1 class="text-4xl font-bold mb-4">📂 {{ $category->name }}</h1>
        <p class="text-base-content/60 mb-8">{{ $posts->count() }} postitust</p>
        
        @if($posts->count() > 0)
            <div class="space-y-6">
                @foreach($posts as $post)
                    <div class="blog-card card bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title text-2xl">
                                <a href="/post/{{ $post->id }}" class="hover:text-purple-600">{{ $post->title }}</a>
                            </h2>
                            <p class="text-sm text-base-content/60">✍️ {{ $post->author }} • {{ $post->created_at->diffForHumans() }}</p>
                            <p>{{ Str::limit($post->content, 150) }}</p>
                            <div class="card-actions justify-between items-center mt-4">
                                <div class="flex gap-3">
                                    <span class="text-sm">💬 {{ $post->comments_count }}</span>
                                    <span class="text-sm">❤️ {{ $post->likes_count }}</span>
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

    <footer class="footer footer-center bg-base-300 text-base-content p-6">
        <p>Made with ❤️ using Laravel & DaisyUI</p>
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