<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'password'
    ];

    protected $hidden = [
        'password',

    ];

    public function socio()
    {
        return $this->hasOne(Socio::class);
    }
}