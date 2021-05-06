<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;

class SiteController extends Controller
{
     public function index(){
    	$cooperativas = cooperativas::all();
    	return view("site.reciclar",['cooperativas' => $cooperativas]);
    }
}
