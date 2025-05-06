<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'sportifysolutions')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    
    <nav class="color bg-gradient-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a class="text-xl font-bold" href="{{ route('sportifysolutions.index') }}">Sportify Solutions</a>
            <ul class="flex items-center">
                @if(auth()->check())
                    <li>
                        <form method="GET" action="{{ route('logout') }}" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('signup') }}" class="bg bg-warning 500 hover:bg-blue-600 text-black px-4 py-2 rounded">Sign up</a>
                        <a href="{{ route('login') }}" class="bg bg-warning 500 hover:bg-blue-600 text-black px-4 py-2 rounded">Log in</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container mx-auto mt-6 px-4">
        @yield('content')
    </div>

    <footer class="color bg-gradient-800 text-white text-center py-4 mt-6 footer-main">
        <p class="mb-0">Sportify Solutions</p>
    </footer>

