<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cooperativas extends Model
{
	use HasFactory;
    protected $table = 'cooperativas';
    protected $primaryKey = 'id_cooperativa';
    public $timestamps = false;
    protected $fillable = [
        'id_cooperativa',
        'razao_social',
        'tipo_documento',
        'cnpj',
        'cpf',
        'endereco',
        'lat',
        'long',
        'descricao',
        'status'
    ];
}
