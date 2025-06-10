@extends('plantilla')

    @section('content')
            
        @if (!auth()->user())
            
            <div class="banner-container">
                <div class="banner_content">
                    
                    <h2 class="banner-text"><b>¡Unete ahora y empieza a reservar pistas para practicar tus deportes favoritos!</b></h2>
                    <a href="{{ route('login') }}" class="color 500 text-black px-8 py-4 rounded">Entrar</a>

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
                <a href="{{ route('pistas.create') }}" class="btn btn-success btn-sm my-2 text-black">
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
                            <img src="{{ asset('storage/public/imagenes_pistas/' . $pista->imagen) }}" class="card-img-top" alt="Imagen de {{ $pista->nombre }}" style="height: 200px; object-fit: cover;">
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
                                                <a href="{{ route('pistas.edit', $pista->id)}}" class="btn btn-warning btn-sm boton-mini">Editar</a>
                                                <form action="{{ route('pistas.destroy', $pista->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-black" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pista?')">Eliminar</button>
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

