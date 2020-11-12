<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario_Model extends Model
{
      protected $table = 'usuarios';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'email', 'senha'
    ];
}
