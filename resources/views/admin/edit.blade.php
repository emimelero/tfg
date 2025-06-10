@extends('plantilla')
@section('content')
@if(auth()->user() && auth()->user()->usuario == 'admin')
    <div class="container mt-5">
        <h1 class="mb-4">Editar Pista</h1>
        <form action="{{ route('pistas.update',$pistas->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            @method('PUT')
 
            <div class="col-12">
                <label for="nombre" class="form-label">Nombre de la pista:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{$pistas->nombre}}">

            <div class="col-12">
                <label for="foto" class="form-label">Imágen:</label>
                <input type="file" id="imagen" name="imagen" class="form-control" value="{{$pistas->imagen}}">
            </div>

            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>

        
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@else
    <p>No puedes estar aqui si no eres el administrador</p>
    <a class="text-xl font-bold" href="{{ route('pistas.index') }}">Volver a la pagina inicial</a>
@endif
@endsection