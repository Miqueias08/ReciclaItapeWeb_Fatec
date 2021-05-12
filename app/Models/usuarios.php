<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    use HasFactory;
    protected $guard = 'usuario';
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario',
        'nome',
        'email',
        'senha',
    ];
}
