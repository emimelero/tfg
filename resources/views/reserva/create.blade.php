@extends('plantilla')

@section('content')

    <div class="container">
        <h2>Reservar una pista</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('reserva.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pista_id" class="form-label">Pista</label>
                <select name="pista_id" class="form-control" required>
                    @foreach($pistas as $pista)
                        <option value="{{ $pista->id }}">{{ $pista->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" name="hora" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>
@endsection
