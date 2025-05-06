<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'fecha',
        'hora',
        'pista_id',
        'usuario_id',
    ];

    // Relación: Una reserva pertenece a una pista
    public function pista()
    {
        return $this->belongsTo(Pista::class);
    }

    // Relación: Una reserva pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
