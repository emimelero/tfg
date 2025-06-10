@extends('plantilla')
@section('content')
@if(auth()->user() && auth()->user()->usuario == 'admin')
<div class="container">
    <h2>Todas las reservas</h2>

    @if($reservas->isEmpty())
        <p>No hay reservas registradas.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Pista</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->usuario->usuario ?? 'Usuario eliminado' }}</td>
                        <td>{{ $reserva->pista->nombre ?? 'Pista eliminada' }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
                        <td>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline;">
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
@else
    <p>No puedes estar aqui si no eres el administrador</p>
    <a class="text-xl font-bold" href="{{ route('pistas.index') }}">Volver a la pagina inicial</a>
@endif
</div>
@endsection