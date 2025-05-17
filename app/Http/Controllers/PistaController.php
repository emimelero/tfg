<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Pista;


class PistaController extends Controller
{
    public function index()
    {
        $pistas = Pista::all();
        return view('reserva.index', compact('pistas'));
    }

     public function create()
    {
        return view('admin.create');
    }

    public function edit(string $id)
    {
        $pistas = Pista::findOrFail($id);
        return view('admin.edit', compact('pistas'));
    }
    public function update(Request $request, string $id)
    {
        $pista = Pista::findOrFail($id);

        $pista->nombre = $request['nombre'];
        $pista->imagen = $request['imagen'];

        $pista->save();

        return redirect()->route('sportifysolutions.index')->with('success', 'Pista actualizado con éxito.');
    }

     public function destroy(string $id)
    {
        $pista = Pista::findOrFail($id);
        $pista->delete();
        return redirect()->route('sportifysolutions.index')->with('success', 'Pista eliminado con éxito.');
    }
}
