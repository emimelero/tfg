@extends('plantilla')

@section('content')

    <div class="container">
        @if(auth()->user()->socio)
            <p>Ya eres socio.</p>
        @else
            <h2>Hazte socio</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('socio.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Hacerte Socio!</button>
                </form>
            </div>
        @endif
        
@endsection
