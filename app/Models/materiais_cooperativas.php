<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiais_cooperativas extends Model
{
    use HasFactory;
    protected $table = 'materiais_cooperativas';
    protected $primaryKey = 'id_material';
    public $timestamps = false;
    protected $fillable = [
        'id_material',
        'categoria',
        'icone',
        'id_cooperativa',
    ];
}
