<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pontos;

class SiteController extends Controller
{
     public function index(){
    	$pontos = pontos::all();
    	return view("site.reciclar",['pontos' => $pontos]);
    }
}
