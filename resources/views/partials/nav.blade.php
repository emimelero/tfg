<nav class="menu_opciones">
    @if (auth()->user() && auth()->user()->usuario == 'admin')
        <a href="{{ route('sportifysolutions.index') }}">Inicio</a> |
        <a href="#">Todas las reservas</a> |
        <a href="#">Todos los perfiles</a> |
    @else
        <a href="{{ route('sportifysolutions.index') }}">Inicio</a> |
        <a href="#">Mis reservas</a> |
        <a href="{{ route('socio.show')}}">Mi perfil</a> |
    @endif
</nav>