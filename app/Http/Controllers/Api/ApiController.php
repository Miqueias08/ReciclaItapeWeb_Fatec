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
    	$historico = entregas_usuarios::where("usuario_id","=",$idUsuario)->join("cooperativas","entregas_usuarios.id_cooperativa","cooperativas.id_cooperativa")->select("entregas_usuarios.id_entrega_usuario as id","entregas_usuarios.peso","entregas_usuarios.tipo_material","cooperativas.razao_social as cooperativa")->get();

    	return json_encode($historico);
    }
    public function ranking(){
    	DB::statement(DB::raw('set @row:=0'));
    	$ranking = entregas_usuarios::join("usuarios","entregas_usuarios.usuario_id","=","usuarios.id_usuario")->select(DB::raw("@row:=@row+1 as 'posicao'"),"usuarios.nome as usuario",DB::raw('COALESCE(SUM(peso),0) as quantidade_entregue'))->groupby("id_usuario")->orderby("quantidade_entregue","desc")->get();

    	return json_encode($ranking);
    }
}
