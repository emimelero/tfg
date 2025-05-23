@extends('plantilla')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Crear Pista</h1>
        <form action="{{ route('sportifysolutions.store') }}" method="POST" class="row g-3">
            @csrf 
            <div class="col-12">
                <label for="nombre" class="form-label">Nombre de la pista:</label>
                <input type="text" id="nombre" name="nombre" class="form-control">

            <div class="col-12">
                <label for="foto" class="form-label">Imágen:</label>
                <input type="file" id="imagen" name="imagen" class="form-control">
            </div>

            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Crear</button>
            </div>
        </form>

        
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection