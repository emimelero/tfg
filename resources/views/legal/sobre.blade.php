@extends('plantilla')

@section('title', 'Sobre Nosotros')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Sobre Nosotros</h1>
    <p class="lead">
        En <strong>Sportify Solutions</strong>, creemos que el deporte debería ser accesible, organizado y al alcance de todos. 
        Nuestra plataforma está diseñada para facilitar la gestión de instalaciones deportivas y mejorar la experiencia tanto para usuarios como para administradores.
    </p>

    <p>
        Nacimos con la idea de digitalizar los procesos de reserva, gestión y monitoreo de pistas deportivas, eliminando barreras y simplificando la vida a clubes, centros deportivos y usuarios particulares.
    </p>

    <p>
        Con nuestra solución, los usuarios pueden encontrar, comparar y reservar pistas en cuestión de segundos, mientras que los administradores pueden gestionar sus recursos de forma centralizada, clara y eficiente.
    </p>

    <p>
        Somos un equipo apasionado por la tecnología y el deporte, comprometidos con la innovación constante y el soporte personalizado. 
        Nuestra meta es seguir creciendo junto a nuestros clientes, ofreciendo nuevas funciones y mejorando cada día.
    </p>
    
    <p class="mt-4">
        Gracias por confiar en nosotros.
    </p>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 150px;">
    <p><strong>El equipo de Sportify Solutions.</strong></p>
</div>
@endsection
