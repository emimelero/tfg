@extends('plantilla')

@section('content')

        <h1 class="title-main">Pistas Disponibles</h1>
        <div class="container mt-5 caja-general">
            @include('partials.nav')
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($pistas as $pista)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $pista->imagen }}" class="card-img-top" alt="Imagen de {{ $pista->nombre }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body cajas">
                                <h4 class="card-title text-center deportes">{{ $pista->nombre }}</h4>
                                <a href="{{ route('sportifysolutions.create') }}" class="btn btn-primary botones">Reservar</a>
                                {{-- @if ((auth()->user()))
                                    meter el enlace de las reservas
                                @endif --}}
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection

