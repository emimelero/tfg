<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;

class SocioController extends Controller
{
     public function create()
    {
        return view('socios.create');
    }
    public function index()
    {
        $socios = Socio::with('user')->get(); // o ->with('usuario') si tu modelo es 'Usuario'

        return view('socios.index', compact('socios'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $usuario = auth()->user();

        // Verificamos si ya es socio
        if ($usuario->socio) {
            return redirect()->back()->with('error', 'Ya eres socio.');
        }

        Socio::create([
            'user_id' => $usuario->id,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo_electronico' => $request->email,
        ]);

        return redirect()->back()->with('success', '¡Te has hecho socio correctamente!');
    }

    public function show()
    {
        $socio = auth()->user()->socio;

        if (!$socio) {
            return redirect()->route('socio.create')->with('error', 'Aún no eres socio.');
        }

        return view('socios.show', ['socio' => $socio]);
    }

    public function edit($id)
    {
        $socio = Socio::findOrFail($id);
        return view('socios.edit', compact('socio'));
    }

    // public function editAdmin($id)
    // {
    //     $socio = Socio::findOrFail($id);

    //     if (!$socio) {
    //         return redirect()->route('socio.create')->with('error', 'No eres socio aún.');
    //     }

    //     return view('socios.edit', compact('socio'));
    // }

    public function update(Request $request)
    {
         $socio = auth()->user()->socio;
        // $socio = Socio::findOrFail($id);
        if (!$socio) {
            return redirect()->route('socio.create')->with('error', 'No eres socio aún.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'foto' => 'nullable|string|max:255',
        ]);

        $socio->nombre = $request->nombre;
        $socio->apellido = $request->apellido;
        $socio->correo_electronico = $request->correo_electronico;
        $socio->foto = $request->foto;
        $socio->save();

        return redirect()->route('socio.show')->with('success', 'Datos actualizados correctamente.');
    }

    public function destroy($id)
    {
        $socio = Socio::findOrFail($id);

        $socio->delete();

        return redirect()->route('socio.index')->with('success', 'Socio eliminado correctamente.');
    }
}

