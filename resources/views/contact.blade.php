<!DOCTYPE html>
<html lang="et" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt | Riksi Blogi</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.css" rel="stylesheet" type="text/css" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Inter', sans-serif; }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animated-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-size: 200% 200%;
            animation: gradientShift 5s ease infinite;
        }
        
        .contact-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 30px -15px rgba(0,0,0,0.2);
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
                <a href="/contact" class="btn btn-primary">Kontakt</a>
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

    <!-- Hero -->
    <div class="animated-gradient text-white py-24">
        <div class="container mx-auto px-4 text-center">
            <div class="badge badge-lg bg-white/20 text-white border-none mb-4">📬 Võta ühendust</div>
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Kontakt</h1>
            <p class="text-xl opacity-90">Mul on hea meel sinuga suhelda!</p>
        </div>
    </div>

    <!-- Kontaktisisu -->
    <div class="container mx-auto px-4 py-16 max-w-5xl">
        <div class="grid md:grid-cols-2 gap-8">
            
            <!-- Vasak pool - info -->
            <div class="contact-card card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4">📬 Minu andmed</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="btn btn-circle btn-sm btn-primary btn-outline">📧</div>
                            <div>
                                <p class="text-sm opacity-70">E-post</p>
                                <p class="font-semibold">Sigma@RiksiBlogi.ee</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="btn btn-circle btn-sm btn-primary btn-outline">📱</div>
                            <div>
                                <p class="text-sm opacity-70">Telefon</p>
                                <p class="font-semibold">+372 6767 4200</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <div class="btn btn-circle btn-sm btn-primary btn-outline">📍</div>
                            <div>
                                <p class="text-sm opacity-70">Aadress</p>
                                <p class="font-semibold">Tallinn, Eesti</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="divider"></div>
                    
                    <div>
                        <h3 class="font-semibold mb-3">📱 Jälgi mind</h3>
                        <div class="flex gap-2">
                            <a href="#" class="btn btn-ghost btn-circle">🐦</a>
                            <a href="#" class="btn btn-ghost btn-circle">📘</a>
                            <a href="#" class="btn btn-ghost btn-circle">📷</a>
                            <a href="#" class="btn btn-ghost btn-circle">💼</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Parem pool - vorm -->
            <div class="contact-card card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-2xl mb-4">✍️ Saada sõnum</h2>
                    
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="/contact">
                        @csrf
                        
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">Sinu nimi</span>
                            </label>
                            <input type="text" name="name" class="input input-bordered" required>
                        </div>
                        
                        <div class="form-control mb-4">
                            <label class="label">
                                <span class="label-text">E-post</span>
                            </label>
                            <input type="email" name="email" class="input input-bordered" required>
                        </div>
                        
                        <div class="form-control mb-6">
                            <label class="label">
                                <span class="label-text">Sõnum</span>
                            </label>
                            <textarea name="message" rows="5" class="textarea textarea-bordered" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-full">
                            Saada sõnum →
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Kaart -->
        <div class="contact-card card bg-base-100 shadow-xl mt-8">
            <div class="card-body">
                <h3 class="card-title">📍 Asukoht</h3>
                <div class="bg-base-200 rounded-xl h-64 flex items-center justify-center">
                    <div class="text-center">
                        <span class="text-6xl block mb-2">🗺️</span>
                        <p>Tallinn, Harju maakond, Eesti</p>
                        <p class="text-sm opacity-70 mt-2">Google Maps integreerimine tulekul...</p>
                    </div>
                </div>
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