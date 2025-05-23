@extends('plantilla')
@section('content')
    <div class="container mt-5">
        <h1>Editar Perfil de socio</h1>
        <form action="{{ route('socio.update') }}" method="POST" class="row g-3">
            @csrf
            @method('PUT')
 
            <div class="col-12">
                <label for="foto" class="form-label">Foto de Perfil:</label>
                <input type="file" id="foto" name="foto" class="form-control" value="{{$socio->foto}}">
            </div>
            
    
            <div class="col-12">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{$socio->nombre}}">
            </div>
            

            <div class="col-12">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="{{$socio->apellido}}">
            </div>

            <div class="col-12">
                <label for="correo" class="form-label">Correo electrónico:</label>
                <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" value="{{$socio->correo_electronico}}">
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
@endsection


