<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Blogi</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <nav class="bg-white dark:bg-gray-800 shadow-sm">
        <div class="container mx-auto px-4 py-4 flex justify-between">
            <a href="/admin" class="text-purple-600 font-bold">Admin</a>
            <a href="/" class="text-gray-600 dark:text-gray-300">Vaata blogi →</a>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
        @yield('content')
    </div>
</body>
</html>