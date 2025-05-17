<?php

namespace App\Http\Controllers;

use App\Models\Pista;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function create()
    {
        $pistas = Pista::all();
        return view('reserva.create', compact('pistas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'pista_id' => 'required|exists:pistas,id',
        ]);

        $yaExiste = Reserva::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('pista_id', $request->pista_id)
            ->exists();

        if ($yaExiste) {
            return back()->with('error', 'Esa pista ya está reservada en ese horario.');
        }

        Reserva::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'pista_id' => $request->pista_id,
            'usuario_id' => auth()->id(),
        ]);

        return redirect()->route('reserva.create')->with('success', 'Reserva realizada con éxito.');
    }
}