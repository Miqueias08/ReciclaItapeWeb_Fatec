<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;
use App\Models\entregas_usuarios;
use DB;
use App\Models\tutoriais;

class ApiController extends Controller
{
    public function cooperativas(){
    	$cooperativas = DB::table("cooperativas")->leftJoin("materiais_cooperativas","cooperativas.id_cooperativa","=","materiais_cooperativas.id_cooperativa")->select("cooperativas.*",DB::raw("group_concat(materiais_cooperativas.categoria) as 'material_aceito'"))->groupby("id_cooperativa")->get();
    	return json_encode($cooperativas);
    }
    public function historico($idUsuario){
    	$historico = entregas_usuarios::where("usuario_id","=",$idUsuario)->join("cooperativas","entregas_usuarios.id_cooperativa","cooperativas.id_cooperativa")->select("entregas_usuarios.id_entrega_usuario as id","entregas_usuarios.peso","entregas_usuarios.tipo_material","cooperativas.razao_social as cooperativa")->get();

    	return json_encode($historico);
    }
    public function ranking(){
    	$ranking = entregas_usuarios::join("usuarios","entregas_usuarios.usuario_id","=","usuarios.id_usuario")->select("usuarios.nome as usuario",DB::raw('COALESCE(SUM(peso),0) as quantidade_entregue'))->groupby("id_usuario")->orderby("quantidade_entregue","desc")->get();
    	$p=1;
    	for($i=0;$i<count($ranking);$i++){
    		$ranking[$i]["posicao"] = $p;
    		$p=$p+1;
    	}
    	return json_encode($ranking);
    }
    public function tutoriais(){
        return json_encode(tutoriais::all());
    }
    public function cadastro_usuario(Request $request){
    	return json_encode(["dados"=>$request->all()]);
    }
}
