<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administradores extends Model
{
    use HasFactory;
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
