<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | Blogi</title>
    @vite(['resources/css/app.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900">

    <nav class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <a href="/" class="text-2xl font-bold text-purple-600">← Tagasi</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-md overflow-hidden">
            @if($post->image)
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            @endif
            <div class="p-8">
                <h1 class="text-4xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="text-gray-500 dark:text-gray-400 mb-8">
                    ✍️ {{ $post->author }} • {{ $post->created_at->format('d.m.Y') }}
                </p>
                <div class="prose dark:prose-invert max-w-none mb-8">
                    <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">{{ $post->content }}</p>
                </div>
                
                <!-- Meeldimine -->
                <div class="border-t pt-6 flex items-center gap-6">
                    <form action="/like/{{ $post->id }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-600 text-xl">
                            ❤️ {{ $post->likes_count }} meeldimist
                        </button>
                    </form>
                </div>
            </div>
        </article>

        <!-- Kommentaarid -->
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-2xl shadow-md p-8">
            <h3 class="text-2xl font-bold mb-6">💬 Kommentaarid ({{ $post->comments->count() }})</h3>
            
            @foreach($post->comments as $comment)
                <div class="border-b dark:border-gray-700 pb-4 mb-4">
                    <p class="font-semibold">{{ $comment->author }}</p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">{{ $comment->created_at->diffForHumans() }}</p>
                    <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                </div>
            @endforeach
            
            <!-- Lisa kommentaar -->
            <form action="/comment/{{ $post->id }}" method="POST" class="mt-6">
                @csrf
                <h4 class="font-semibold mb-4">Lisa kommentaar</h4>
                <input type="text" name="author" placeholder="Sinu nimi" class="w-full p-3 border rounded-lg mb-3 dark:bg-gray-700" required>
                <textarea name="content" rows="3" placeholder="Sinu kommentaar..." class="w-full p-3 border rounded-lg mb-3 dark:bg-gray-700" required></textarea>
                <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700">
                    Saada kommentaar
                </button>
            </form>
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