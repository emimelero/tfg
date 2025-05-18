@extends('plantilla')

@section('content')
<div class="container">
    <h2>Listado general de socios</h2>

    @if($socios->isEmpty())
        <p>No hay socios registrados.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo electrónico</th>
                    <th>Usuario</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socios as $socio)
                    <tr>
                        <td>{{ $socio->nombre }}</td>
                        <td>{{ $socio->apellido }}</td>
                        <td>{{ $socio->correo_electronico }}</td>
                        <td>{{ $socio->user->usuario ?? 'Usuario eliminado' }}</td> {{-- o $socio->user->usuario --}}
                        <td>
                            <a href="{{ route('socio.edit', $socio->id)}}" class="btn btn-warning btn-sm my-2">
                                <img class="foto-boton" src="{{asset('images/edit.png')}}" alt="">
                            </a>
                            <form action="{{ route('socio.destroy', $socio->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta reserva?')"><img class="foto-boton" src="{{ asset('images/delete.png')}}" ></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection