<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Database</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans text-gray-800">
    <header class="bg-blue p-4 text-white">
        <div class="container mx-auto">
            <a href="{{ route('games.index') }}">
                <h1 class="text-2xl font-bold">Game Database</h1>
            </a>
        </div>
    </header>

    <main class="container mx-auto mt-4 p-4 bg-white shadow rounded">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-blue p-4 mt-8 text-center text-white">
        &copy; 2024 Game Database
    </footer>
</body>
</html>
