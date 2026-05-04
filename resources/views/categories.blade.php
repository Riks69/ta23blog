<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategooriad | Minu Blogi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
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
        <h1 class="text-4xl font-bold text-center mb-12">📂 Kategooriad</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($categories as $category)
                <a href="/kategooria/{{ $category->slug }}" class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all hover:scale-105">
                    <div class="card-body">
                        <h2 class="card-title text-2xl">{{ $category->name }}</h2>
                        <p class="text-base-content/60">{{ $category->posts_count }} postitust</p>
                    </div>
                </a>
            @endforeach
        </div>
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
        if (savedTheme) document.documentElement.setAttribute('data-theme', savedTheme);
    </script>
</body>
</html>