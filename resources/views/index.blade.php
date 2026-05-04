<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogi | Laravel + DaisyUI</title>
    @vite(['resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="text-2xl font-bold text-purple-600">📝 Riksi Blogi</a>
                <div class="flex gap-4">
                    <details class="dropdown dropdown-end">
                        <summary class="btn btn-ghost btn-circle">🎨</summary>
                        <ul class="menu dropdown-content bg-white dark:bg-gray-800 rounded-box w-40 p-2 shadow">
                            <li><a onclick="setTheme('light')">☀️ Hele</a></li>
                            <li><a onclick="setTheme('dark')">🌙 Tume</a></li>
                            <li><a onclick="setTheme('cupcake')">🧁 Cupcake</a></li>
                        </ul>
                    </details>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-4">Riksi Blogi</h1>
            <p class="text-xl opacity-95">Mõtted, lood ja ideed</p>
        </div>
    </div>

    <!-- Postitused -->
    <div class="container mx-auto px-4 py-16 max-w-4xl">
        <div class="space-y-8">
            @foreach($posts as $post)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden">
                    @if($post->image)
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                    @endif
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2">
                            <a href="/post/{{ $post->id }}" class="hover:text-purple-600">{{ $post->title }}</a>
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">
                            ✍️ {{ $post->author }} • {{ $post->created_at->diffForHumans() }}
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">
                            {{ Str::limit($post->content, 200) }}
                        </p>
                        <div class="flex items-center gap-6 text-sm">
                            <a href="/post/{{ $post->id }}" class="text-purple-600 hover:underline">
                                💬 Kommentaarid ({{ $post->comments_count }})
                            </a>
                            <form action="/like/{{ $post->id }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-600">
                                    ❤️ Meeldimised ({{ $post->likes_count }})
                                </button>
                            </form>
                            <a href="/post/{{ $post->id }}" class="text-purple-600 hover:underline">
                                Loe edasi →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-gray-800 text-white text-center py-6 mt-12">
        <p>Made with ❤️ using Laravel & DaisyUI</p>
    </footer>

    <script>
        function setTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        }
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) document.documentElement.setAttribute('data-theme', savedTheme);
    </script>
</body>
</html>