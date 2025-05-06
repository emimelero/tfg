<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pista;

class PistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pista = new Pista();
        $pista->nombre = 'Tenis';
        $pista->imagen = 'https://centrodeportivocortijoalto.com/wp-content/uploads/2023/06/tipos-pistas-de-tenis.jpg';
        $pista->save();

    }
}
