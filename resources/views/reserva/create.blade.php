@extends('plantilla')

@section('content')

    <div class="container">
        <h2>Reservar una pista</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('reserva.store') }}" id="form" method="POST">
            @csrf
            <div class="mb-3">
                <label for="pista_id" class="form-label">Pista</label>
                <input type="text" name="pista_id" id="pista_id" value="{{ $pista->nombre}}" class="form-control" readonly required>
                <input type="hidden" name="pista_id" value="{{ $pista->id }}">
                {{-- <select name="pista_id" class="form-control" required readonly>
                    <option value="{{ $pista->id }}" selected>{{ $pista->nombre }}</option>
                </select> --}}
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Reservar</button>
        </form>
    </div>

<script>
    window.onload = function () {
        const fechaInput = document.getElementById('fecha');
        const horaInput = document.getElementById('hora');
        const hoy = new Date();

        const dia = String(hoy.getDate()).padStart(2, '0');
        const mes = String(hoy.getMonth() + 1).padStart(2, '0');
        const anio = hoy.getFullYear();
        const fechaActualStr = `${anio}-${mes}-${dia}`;

        const horaActualStr = hoy.toTimeString().slice(0, 5); // HH:MM
        hora.value = horaActualStr;
        const horaMinima = "07:00";
        const horaMaxima = "22:00";

        // Establece valor y mínimo para fecha
        fechaInput.value = fechaActualStr;
        fechaInput.setAttribute('min', fechaActualStr);

        // Establece atributos min y max para hora
        horaInput.setAttribute('min', horaMinima);
        horaInput.setAttribute('max', horaMaxima);


        // Validación al enviar el formulario
        const formulario = fechaInput.closest('form');
        formulario.addEventListener('submit', function (e) {
            const fechaSeleccionada = fechaInput.value;
            const horaSeleccionada = horaInput.value;

            if (fechaSeleccionada < fechaActualStr) {
                e.preventDefault();
                //alert('Por favor, selecciona una fecha válida (hoy o posterior).');
                fechaInput.focus();
                return;
            }

            if (horaSeleccionada < horaMinima || horaSeleccionada > horaMaxima) {
                e.preventDefault();
                //alert('La hora debe estar entre 07:00 y 22:00.');
                horaInput.focus();
                return;
            }

            if (fechaSeleccionada === fechaActualStr && horaSeleccionada < horaActualStr) {
                 e.preventDefault();
                 horaInput.setCustomValidity('La hora no puede ser anterior a la actual.');
                 horaInput.reportValidity();
                 return;
             } else {
                 horaInput.setCustomValidity('');
             }

            if(fechaSeleccionada > fechaActualStr && horaSeleccionada < horaActualStr){
                formulario.submit()
             }
        });
    };
</script>

@endsection
