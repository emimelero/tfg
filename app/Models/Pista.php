<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pista extends Model
{
    protected $table = 'pistas';

    protected $fillable = ['nombre', 'imagen'];
}
