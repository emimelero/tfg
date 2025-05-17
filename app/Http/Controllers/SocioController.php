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
}

