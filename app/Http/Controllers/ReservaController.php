<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with(['pista', 'usuario'])
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->get();

        return view('reserva.indexall', compact('reservas'));
    }
    public function create($pistaId)
    {
        $pista = Pista::findOrFail($pistaId);
        return view('reserva.create', compact('pista'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'pista_id' => 'required|exists:pistas,id',
        ]);

        $horaReserva = Carbon::createFromFormat('H:i', $request->hora);
        $horaInferior = $horaReserva->copy()->subMinutes(29)->format('H:i');
        $horaSuperior = $horaReserva->copy()->addMinutes(29)->format('H:i');

        // Validar que no haya otra reserva en esa pista en ese rango
        $yaExiste = Reserva::where('fecha', $request->fecha)
            ->where('pista_id', $request->pista_id)
            ->whereBetween('hora', [$horaInferior, $horaSuperior])
            ->exists();

        if ($yaExiste) {
            return back()->with('error', 'Debe haber al menos 30 minutos de separación entre reservas en esta pista.');
        }

        // Validar que el usuario no tenga otra reserva en ese rango en cualquier pista
        $conflictoUsuario = Reserva::where('fecha', $request->fecha)
            ->where('usuario_id', auth()->id())
            ->whereBetween('hora', [$horaInferior, $horaSuperior])
            ->exists();

        if ($conflictoUsuario) {
            return back()->with('error', 'No puedes tener dos reservas activas en diferentes pistas dentro de un margen de 30 minutos.');
        }

        Reserva::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'pista_id' => $request->pista_id,
            'usuario_id' => auth()->id(),
        ]);

        return redirect()->route('pistas.index')->with('success', 'Reserva realizada con éxito.');
    }

    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);


        $reserva->delete();

        return redirect()->back();
    }
    public function misReservas()
    {
        $usuario = auth()->user();

        $reservas = Reserva::with('pista') // Relación opcional si quieres info de la pista
            ->where('usuario_id', $usuario->id)
            ->orderBy('fecha', 'asc')
            ->orderBy('hora', 'asc')
            ->get();

        return view('reserva.show', compact('reservas'));
    }

}