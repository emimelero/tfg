@extends('plantilla')

    @section('content')
            @if (!auth()->user())
                <div class="d-flex align-items-center border border-warning rounded p-3 advertencia" style="max-width: 600px; margin: auto;">
                    <div class="me-3">
                        <img src="{{asset('images/warning.png')}}" alt="Advertencia" width="50" height="50">
                    </div>
                    <div>
                        <p class="mb-0 text-black fw-bold">
                            Debes identificarte en la aplicación para poder realizar reservas.
                        </p>
                    </div>
                </div>
            @endif

        <h1 class="title-main">Pistas Disponibles</h1>
        <div class="container mt-5 caja-general">

            @if (auth()->user() && !auth()->user()->socio)
                <a href="{{ route('socio.create')}}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle">Hazte socio</i> 
                </a>
            @endif
            @if (auth()->user() && auth()->user()->usuario == 'admin')
                <br>
                <a href="{{ route('sportifysolutions.create') }}" class="btn btn-success btn-sm my-2">
                    <i class="bi bi-plus-circle"><img class="foto-boton" src="{{asset('images/add.png')}}" alt="">Añadir pista</i> 
                </a>
            @endif
            @if (auth()->user())
                @include('partials.nav', ['socio' => auth()->user()->socio])
            @endif
            
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($pistas as $pista)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $pista->imagen }}" class="card-img-top" alt="Imagen de {{ $pista->nombre }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body cajas">
                                <h4 class="card-title text-center deportes">{{ $pista->nombre }}</h4>
                                <div class="d-flex justify-content-between align-items-center position-relative p-3 rounded">
                                    @if (auth()->user())
                                        <a href="{{ route('reserva.create', ['pista' => $pista->id]) }}" class="btn btn-primary botones">Reservar</a>
                                        @else
                                        <div class="mx-auto">
                                            <a href="{{ route('login')}}" class="btn btn-primary px-4">Reservar</a>
                                        </div>
                                        @endif                        
                                        @if(auth()->user() && auth()->user()->usuario == 'admin')
                                            <div class="position-absolute end-0 me-3 d-flex flex-column gap-1">
                                                <a href="{{ route('sportifysolutions.edit', $pista->id)}}" class="btn btn-warning btn-sm boton-mini">
                                                    <img class="foto-boton" src="{{ asset('images/edit.png') }}" alt="Editar">
                                                </a>
                                                <form action="{{ route('sportifysolutions.destroy', $pista->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pista?')"><img class="foto-boton" src="{{ asset('images/delete.png')}}" alt=""></button>
                                                </form>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

