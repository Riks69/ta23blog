<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Minu Blogi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        .article-content { font-size: 1.125rem; line-height: 1.8; }
        .comment-card { transition: all 0.2s ease; }
        .comment-card:hover { transform: translateX(4px); }
    </style>
</head>
<body class="bg-base-200">

    <!-- Navbar - KÕIK NUPUD TAGASI! -->
    <nav class="navbar bg-base-100 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto">
            <div class="flex-1">
                <a href="/" class="btn btn-ghost text-xl">
                    ← Tagasi avalehele
                </a>
            </div>
            
            <!-- Navigatsiooni lingud -->
            <div class="hidden md:flex gap-2">
                <a href="/" class="btn btn-ghost">Avaleht</a>
                <a href="#" class="btn btn-ghost">Kategooriad</a>
                <a href="#" class="btn btn-ghost">Kontakt</a>
            </div>
            
            <div class="flex-none gap-2">
                <!-- Teemade valija -->
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        🎨
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-40 p-2 shadow-2xl">
                        <li><a onclick="setTheme('light')">☀️ Hele</a></li>
                        <li><a onclick="setTheme('dark')">🌙 Tume</a></li>
                    </ul>
                </div>
                
                <!-- Otsingu nupp -->
                <button class="btn btn-ghost btn-circle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Artikkel -->
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <div class="badge badge-primary mb-4">📖 Populaarne</div>
                <h1 class="text-4xl md:text-5xl font-bold">{{ $post->title }}</h1>
                
                <div class="flex flex-wrap gap-4 items-center py-4 border-y border-base-200 my-4">
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div class="bg-neutral text-neutral-content rounded-full w-10">
                                <span>{{ substr($post->author, 0, 1) }}</span>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold">{{ $post->author }}</p>
                            <p class="text-sm opacity-70">{{ $post->created_at->format('d.m.Y') }} • {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                
                @if($post->image)
                    <figure class="my-4">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="rounded-xl w-full">
                    </figure>
                @endif
                
                <div class="article-content">
                    <p>{{ $post->content }}</p>
                </div>
                
                <div class="flex items-center gap-6 mt-8 pt-4 border-t border-base-200">
                    <form action="/like/{{ $post->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-ghost gap-2">
                            ❤️ {{ $post->likes_count }} meeldimist
                        </button>
                    </form>
                    <div class="flex items-center gap-2 opacity-70">
                        💬 {{ $post->comments->count() }} kommentaari
                    </div>
                </div>
            </div>
        </div>

        <!-- Kommentaarid -->
        <div class="card bg-base-100 shadow-xl mt-8">
            <div class="card-body">
                <h3 class="text-2xl font-bold flex items-center gap-2">
                    💬 Kommentaarid
                    <span class="badge badge-neutral">{{ $post->comments->count() }}</span>
                </h3>
                
                @if($post->comments->count() > 0)
                    <div class="space-y-4">
                        @foreach($post->comments as $comment)
                            <div class="comment-card p-4 bg-base-200 rounded-xl">
                                <div class="flex items-start gap-3">
                                    <div class="avatar placeholder">
                                        <div class="bg-primary text-primary-content rounded-full w-8">
                                            <span>{{ substr($comment->author, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-1">
                                            <span class="font-semibold">{{ $comment->author }}</span>
                                            <span class="text-xs opacity-50">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 opacity-50">
                        <span class="text-4xl block mb-2">💭</span>
                        <p>Kommentaare veel pole. Ole esimene!</p>
                    </div>
                @endif
                
                <form action="/comment/{{ $post->id }}" method="POST" class="mt-6">
                    @csrf
                    <h4 class="font-semibold mb-4">✍️ Lisa kommentaar</h4>
                    <input type="text" name="author" placeholder="Sinu nimi" 
                           class="input input-bordered w-full mb-3" required>
                    <textarea name="content" rows="3" placeholder="Sinu kommentaar..." 
                              class="textarea textarea-bordered w-full mb-3" required></textarea>
                    <button type="submit" class="btn btn-primary w-full">
                        Saada kommentaar →
                    </button>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer footer-center bg-base-300 text-base-content p-6 mt-12">
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