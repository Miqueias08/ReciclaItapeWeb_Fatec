<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entregas_usuarios extends Model
{
    use HasFactory;
    protected $table = 'entregas_usuarios';
    protected $primaryKey = 'id_entrega_usuario';
    public $timestamps = false;
    protected $fillable = [
        'id_entrega_usuario',
        'peso',
        'tipo_material',
        'usuario_id',
        'id_cooperativa'
    ];
}
