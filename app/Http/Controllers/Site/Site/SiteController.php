<?php

namespace App\Http\Controllers\Site\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;

class SiteController extends Controller
{
    public function index(){
    	$cooperativas = cooperativas::all();
    	return view("site.site.reciclar",['cooperativas' => $cooperativas,'titulo'=>"Pontos de Coleta"]);
    }
    public function cooperativas(){
    	return view("site.site.cooperativas",['cooperativas' => cooperativas::all(),'titulo'=>"Cooperativas"]);
    }
    public function ranking(){
    	return view("site.site.ranking",['titulo'=>"Ranking"]);
    }
    public function tutoriais(){
    	$tutoriais=null;
    	return view("site.site.tutoriais",['titulo'=>"Tutoriais","tutoriais"=>$tutoriais]);
    }
}
