<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Makers_Model;

class SiteController extends Controller
{
    public function index(){
    	$markers = Makers_Model::all();
    	return view("site.reciclar",['markers' => $markers]);
    }
}
