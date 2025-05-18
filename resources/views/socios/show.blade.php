@extends('plantilla')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header color text-white">
                <h1>Mi Perfil de socio</h1>
                <a href="{{ route('socio.edit', $socio->id)}}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle">Editar perfil</i> 
                </a>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>Foto de Perfil:</strong><img class="foto-perfil" src="{{ $socio->foto}}" alt=""></li>
                    <li class="list-group-item"><strong>Nombre:</strong> {{ $socio->nombre }}</li>
                    <li class="list-group-item"><strong>Apellido:</strong> {{ $socio->apellido }}</li>
                    <li class="list-group-item"><strong>Correo electrónico:</strong> {{ $socio->correo_electronico }}</li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection