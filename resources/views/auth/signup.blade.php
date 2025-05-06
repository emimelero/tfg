@extends('plantilla')
@section('titulo', 'Login')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@if (!empty($error))
    <div class="text-danger">
        {{ $error }}
    </div>
@endif
<div class="wrapper">
    <form action="{{ route('newsignup') }}" method="POST" class="form">
        @csrf
        <h1 class="title">Registrarse</h1>
        <div class="inp">
            <input type="text" name="usuario" id="usuario" class="input" placeholder="Usuario">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="inp">
            <input type="password" name="password" id="password" class="input" placeholder="Contraseña">
            <i class="fa-solid fa-lock"></i>
        </div>
        <input type="submit" class="submit" value="Registrarse">
    </form>
    <div></div>
    <div class="banner">
        <h1 class="wel_text">Bienvenid@</h1><br>
        <p class="para"></p>
    </div>
</div>
@endsection
