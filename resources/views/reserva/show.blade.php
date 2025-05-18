@extends('plantilla')
@section('content')
<div class="container">
    <h2>Mis reservas</h2>

    @if($reservas->isEmpty())
        <p>No tienes reservas registradas.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pista</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->pista->nombre ?? 'Pista eliminada' }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->fecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
                        <td>
                            <a href="{{ route('reserva.edit', $reserva->id)}}" class="btn btn-warning btn-sm"><img class="foto-boton" src="{{ asset('images/edit.png')}}" alt=""></a>
                            <form action="{{ route('reserva.destroy', $reserva->id) }}" method="POST" style="display:inline;">
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