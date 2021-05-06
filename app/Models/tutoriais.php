<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tutoriais extends Model
{
    use HasFactory;
    protected $table = 'tutoriais';
    protected $primaryKey = 'id_tutorial';
    public $timestamps = false;
    protected $fillable = [
        'id_tutorial',
        'titulo',
        'subtitulo',
        'texto',
    ];
}
