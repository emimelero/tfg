<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'sportifysolutions')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    
    <nav class="color bg-gradient-800 text-black py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 80px;">
                <a class="text-xl font-bold" href="{{ route('pistas.index') }}">Sportify Solutions</a>
            </div>
            <ul class="flex items-center">
                @if(auth()->check())
                   <li>
                        <form method="GET" action="{{ route('logout') }}" class="d-flex align-items-center gap-2">
                            @csrf
                            <h3 class="mb-0">Hola, {{ auth()->user()->usuario }}</h3>
                            <button type="submit" class="btn p-0 border-0 bg-transparent">
                                <img class="foto-boton-off" src="{{ asset('images/off.png') }}" alt="Cerrar sesión">
                            </button>
                        </form>
                    </li>
                    
                @else
                    <li>
                        <a href="{{ route('signup') }}" class="bg bg-secondary 500 text-white px-4 py-2 rounded">Sign up</a>
                        <a href="{{ route('login') }}" class="bg bg-secondary 500 text-white px-4 py-2 rounded">Log in</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
 
    <div class=" mt-6">
        @yield('content')
    </div>

    <footer class="color bg-gradient-800 text-black text-center py-4 mt-6 footer-main">
        <p class="mb-0">Sportify Solutions</p>
        <a href="{{ route('sobre') }}">Sobre Nosotros</a> |
        <a href="{{ route('aviso') }}">Aviso Legal</a> |
        <a href="{{ route('cookies') }}">Politica de cookies</a> 
    </footer>

