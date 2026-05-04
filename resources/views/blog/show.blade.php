<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Riksi Blogi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        
        .article-content {
            font-size: 1.125rem;
            line-height: 1.8;
        }
        
        .comment-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .comment-card:hover {
            transform: translateX(8px);
            background-color: #f3f4f6;
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
                <a href="/kategooriad" class="btn btn-ghost">Kategooriad</a>
                <a href="/contact" class="btn btn-ghost">Kontakt</a>
            </div>
            <div class="flex-none gap-2">
                <!-- Otsingu nupp -->
                <button class="btn btn-ghost btn-circle" onclick="searchModal.showModal()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
                
                <!-- Teemade valija -->
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
            </div>
        </div>
    </nav>

    <!-- Otsingu modaal -->
    <dialog id="searchModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-4">🔍 Otsi postitusi</h3>
            <form action="/search" method="GET">
                <input type="text" name="q" placeholder="Kirjuta otsingusõna..." 
                       class="input input-bordered w-full" autocomplete="off" required>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Otsi</button>
                    <button type="button" class="btn btn-ghost" onclick="searchModal.close()">Sulge</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>

    <!-- Artikli pealkirja hero -->
    <div class="animated-gradient text-white py-24">
        <div class="container mx-auto px-4 text-center">
            <div class="badge badge-lg bg-white/20 text-white border-none mb-4">
                📖 Populaarne postitus
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 max-w-4xl mx-auto">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-center gap-4 text-white/90">
                <div class="flex items-center gap-2">
                    <div class="avatar placeholder">
                        <div class="bg-white/20 rounded-full w-8">
                            <span>{{ substr($post->author, 0, 1) }}</span>
                        </div>
                    </div>
                    <span>{{ $post->author }}</span>
                </div>
                <span>•</span>
                <span>{{ $post->created_at->format('d.m.Y') }}</span>
                <span>•</span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>

    <!-- Sisu -->
    <div class="container mx-auto px-4 py-12 max-w-4xl">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                @if($post->image)
                    <figure class="mb-6">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="rounded-xl w-full object-cover max-h-96">
                    </figure>
                @endif
                
                <div class="article-content prose prose-lg max-w-none">
                    <p class="text-base-content/80 leading-relaxed">{{ $post->content }}</p>
                </div>
                
                <!-- Sildid -->
                @if($post->tags->count() > 0)
                    <div class="flex flex-wrap gap-2 mt-6">
                        @foreach($post->tags as $tag)
                            <a href="/tag/{{ $tag->slug }}" class="badge badge-outline badge-primary hover:badge-primary transition">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                @endif
                
                <!-- Meeldimine -->
                <div class="border-t border-base-200 pt-6 mt-6 flex items-center gap-6">
                    <form action="/like/{{ $post->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-ghost gap-2 text-red-500 hover:text-red-600">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            {{ $post->likes_count }} meeldimist
                        </button>
                    </form>
                    <div class="flex items-center gap-2 text-base-content/60">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        {{ $post->comments->count() }} kommentaari
                    </div>
                </div>
            </div>
        </div>

        <!-- Kommentaarid -->
        <div class="card bg-base-100 shadow-xl mt-8">
            <div class="card-body">
                <h3 class="text-2xl font-bold flex items-center gap-2">
                    💬 Kommentaarid
                    <span class="badge badge-primary">{{ $post->comments->count() }}</span>
                </h3>
                
                @if($post->comments->count() > 0)
                    <div class="space-y-4">
                        @foreach($post->comments as $comment)
                            <div class="comment-card p-4 bg-base-200 rounded-xl">
                                <div class="flex items-start gap-3">
                                    <div class="avatar placeholder">
                                        <div class="bg-primary text-primary-content rounded-full w-10">
                                            <span>{{ substr($comment->author, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-3 mb-1">
                                            <span class="font-semibold">{{ $comment->author }}</span>
                                            <span class="text-xs text-base-content/50">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="text-base-content/80">{{ $comment->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-base-content/50">
                        <span class="text-5xl block mb-3">💭</span>
                        <p>Kommentaare veel pole. Ole esimene!</p>
                    </div>
                @endif
                
                <!-- Lisa kommentaari vorm -->
                <form action="/comment/{{ $post->id }}" method="POST" class="mt-6 pt-4 border-t border-base-200">
                    @csrf
                    <h4 class="font-semibold mb-4 flex items-center gap-2">✍️ Lisa oma mõte</h4>
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <input type="text" name="author" placeholder="Sinu nimi" 
                               class="input input-bordered w-full" required>
                        <input type="email" name="email" placeholder="Sinu e-post (valikuline)" 
                               class="input input-bordered w-full">
                    </div>
                    <textarea name="content" rows="4" placeholder="Sinu kommentaar..." 
                              class="textarea textarea-bordered w-full mb-4" required></textarea>
                    <button type="submit" class="btn btn-primary">
                        Saada kommentaar →
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer footer-center bg-base-300 text-base-content p-10 mt-12">
        <div>
            <p class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
                Riksi Blogi
            </p>
            <p>Made with ❤️ using Laravel & DaisyUI</p>
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