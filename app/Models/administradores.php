<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class administradores extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    protected $table = 'administradores';
    protected $primaryKey = 'id_administrador';
    public $timestamps = false;
    protected $fillable = [
        'id_administrador',
        'nome',
        'email',
        'senha',
    ];
}
