@extends('plantilla')

@section('title', 'Política de Cookies')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Política de Cookies</h1>

    <p>
        Esta web utiliza cookies para mejorar la experiencia del usuario y ofrecer un mejor servicio. A continuación, te explicamos qué son, qué tipos utilizamos y cómo puedes gestionarlas.
    </p>

    <h5>¿Qué son las cookies?</h5>
    <p>
        Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas una página web. Su función es guardar información que puede ser útil más adelante, como tus preferencias o el idioma.
    </p>

    <h5>Tipos de cookies que utilizamos</h5>
    <ul>
        <li><strong>Cookies técnicas:</strong> Necesarias para el funcionamiento básico del sitio web.</li>
        <li><strong>Cookies de análisis:</strong> Nos permiten recopilar datos estadísticos anónimos sobre el uso del sitio para mejorarlo.</li>
        <li><strong>Cookies de personalización:</strong> Adaptan la experiencia del usuario según sus preferencias.</li>
    </ul>

    <h5>Cookies de terceros</h5>
    <p>
        En algunos casos, podemos usar servicios de terceros como Google Analytics que instalan sus propias cookies con fines analíticos. Estas cookies están sujetas a las políticas de privacidad de dichos servicios.
    </p>

    <h5>Cómo gestionar las cookies</h5>
    <p>
        Puedes permitir, bloquear o eliminar las cookies instaladas en tu equipo mediante la configuración de las opciones del navegador:
    </p>
    <ul>
        <li><strong>Google Chrome:</strong> <a href="https://support.google.com/chrome/answer/95647" target="_blank">Configuración de cookies</a></li>
        <li><strong>Mozilla Firefox:</strong> <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies" target="_blank">Gestión de cookies</a></li>
        <li><strong>Microsoft Edge:</strong> <a href="https://support.microsoft.com/es-es/help/4027947" target="_blank">Configuración de privacidad</a></li>
        <li><strong>Safari:</strong> <a href="https://support.apple.com/es-es/HT201265" target="_blank">Gestión de cookies</a></li>
    </ul>

    <h5>Modificaciones</h5>
    <p>
        Sportify Solutions se reserva el derecho a modificar esta política de cookies para adaptarla a futuras legislaciones o mejoras técnicas. Te recomendamos revisarla periódicamente.
    </p>
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 150px;">

    <p class="mt-4"><strong>Última actualización:</strong> junio de 2025</p>
</div>
@endsection
