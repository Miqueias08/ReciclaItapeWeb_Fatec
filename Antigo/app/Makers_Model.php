<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makers_Model extends Model
{
    protected $table = 'markers';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'address','lat','lng','type'
    ];
}
