<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class cooperativas extends Authenticatable
{
	use HasFactory;
    protected $table = 'cooperativas';
    protected $primaryKey = 'id_cooperativa';
    public $timestamps = false;
    protected $fillable = [
        'id_cooperativa',
        'razao_social',
        'email',
        'telefone',
        'tipo_documento',
        'cnpj',
        'cpf',
        'endereco',
        'lat',
        'long',
        'descricao',
        'status'
    ];
    protected $hidden = [
        'senha'
    ];
}
