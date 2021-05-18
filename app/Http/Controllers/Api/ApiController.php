<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;

class ApiController extends Controller
{
    public function cooperativas(){
    	return json_encode(cooperativas::all());
    }
}
