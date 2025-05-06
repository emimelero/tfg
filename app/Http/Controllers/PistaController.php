<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Pista;
use App\Models\Reserva;

class PistaController extends Controller
{
    public function index()
    {
        $pistas = Pista::all();
        return view('reserva.index', compact('pistas'));
    }

    public function create(){
        return view('reserva.create');
    }
}
