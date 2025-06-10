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

    public function edit($id)
    {
        $pistas = Pista::findOrFail($id);
        return view('admin.edit', compact('pistas'));
    }
   public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048', // si se permite subir imagen
        ]);

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombrePista = str_replace(' ', '_', $request->nombre);
            $nombreImagen = time(). '_' .'pista_de_' . $nombrePista . '.' . $archivo->getClientOriginalExtension();
            $archivo->storeAs('public/imagenes_pistas', $nombreImagen);
        }

        Pista::create([
            'nombre' => $request->nombre,
            'imagen' => $nombreImagen,
        ]);

        return redirect()->route('pistas.index')->with('success', 'Pista creada con éxito.');
    }
   public function update(Request $request, string $id)
    {
        $pista = Pista::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        $pista->nombre = $request->nombre;

        if ($request->hasFile('imagen')) {
            $archivo = $request->file('imagen');
            $nombrePista = str_replace(' ', '_', $request->nombre);
            $nombreImagen = time(). '_' .'pista_de_' . $nombrePista . '.' . $archivo->getClientOriginalExtension();
            $archivo->storeAs('public/imagenes_pistas', $nombreImagen);
            $pista->imagen = $nombreImagen;
        }

        $pista->save();

        return redirect()->route('pistas.index')->with('success', 'Pista actualizada con éxito.');
    }

     public function destroy(string $id)
    {
        $pista = Pista::findOrFail($id);
        $pista->delete();
        return redirect()->route('pistas.index')->with('success', 'Pista eliminado con éxito.');
    }
}
