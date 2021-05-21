<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;
use App\Models\entregas_usuarios;
use DB;

class ApiController extends Controller
{
    public function cooperativas(){
    	$cooperativas = DB::table("cooperativas")->leftJoin("materiais_cooperativas","cooperativas.id_cooperativa","=","materiais_cooperativas.id_cooperativa")->select("cooperativas.*",DB::raw("group_concat(materiais_cooperativas.categoria) as 'material_aceito'"))->groupby("id_cooperativa")->get();
    	return json_encode($cooperativas);
    }
    public function historico($idUsuario){
    	$historico = entregas_usuarios::where("usuario_id","=",$idUsuario)->join("cooperativas","entregas_usuarios.id_cooperativa","cooperativas.id_cooperativa")->select("entregas_usuarios.id_entrega_usuario as id")->get();

    	return json_encode($historico);
    }
}
