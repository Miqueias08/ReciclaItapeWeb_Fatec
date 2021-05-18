<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;
use DB;

class ApiController extends Controller
{
    public function cooperativas(){
    	$cooperativas = DB::table("cooperativas")->leftJoin("materiais_cooperativas","cooperativas.id_cooperativa","=","materiais_cooperativas.id_cooperativa")->select("cooperativas.*",DB::raw("group_concat(materiais_cooperativas.categoria) as 'material_aceito'"))->groupby("id_cooperativa")->get();
    	return json_encode($cooperativas);
    }
}
