<nav class="menu_opciones">
    @if (auth()->user() && auth()->user()->usuario == 'admin')
        <a href="{{ route('pistas.index') }}">Inicio</a> |
        <a href="{{ route('reserva.index')}}">Todas las reservas</a> |
        <a href="{{route('socio.index')}}">Todos los perfiles</a> |
        <a href="{{ route('socio.show')}}">Mi perfil</a> |
    @else
        <a href="{{ route('pistas.index') }}">Inicio</a> |
        <a href="{{ route('reserva.show')}}">Mis reservas</a> |
        <a href="{{ route('socio.show')}}">Mi perfil</a> |
    @endif
</nav>