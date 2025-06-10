@extends('plantilla')

@section('title', 'Aviso Legal')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Aviso Legal</h1>

    <p><strong>Información general</strong></p>
    <p>
        En cumplimiento con el deber de información recogido en la Ley 34/2002, de Servicios de la Sociedad de la Información y del Comercio Electrónico (LSSI-CE), se informa que esta plataforma web es propiedad de <strong>Sportify Solutions</strong>.
    </p>

    <p><strong>Datos del titular</strong></p>
    <ul>
        <li><strong>Nombre comercial:</strong> Sportify Solutions</li>
        <li><strong>Correo electrónico de contacto:</strong> contacto@sportifysolutions.com</li>
        <li><strong>Actividad:</strong> Desarrollo y gestión de plataformas web para reservas deportivas</li>
    </ul>

    <p><strong>Responsabilidad</strong></p>
    <p>
        El titular no se hace responsable de los errores u omisiones en los contenidos publicados, ni de los daños derivados del uso de la información contenida en este sitio web.
    </p>

    <p><strong>Propiedad intelectual</strong></p>
    <p>
        Todos los contenidos de este sitio web (textos, imágenes, código fuente, logotipos, etc.) son propiedad de Sportify Solutions o de sus respectivos propietarios, y están protegidos por la normativa de propiedad intelectual e industrial.
    </p>

    <p><strong>Política de enlaces</strong></p>
    <p>
        Este sitio web puede contener enlaces a otras páginas. Sportify Solutions no se responsabiliza de los contenidos ni de las prácticas de privacidad de estos sitios.
    </p>

    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 150px;">

    <p><strong>Legislación aplicable</strong></p>
    <p>
        Las presentes condiciones se regirán por la legislación española. Para cualquier controversia que pueda surgir, ambas partes se someterán a los juzgados y tribunales del domicilio del usuario, siempre que este se encuentre en territorio español.
    </p>
</div>
@endsection
