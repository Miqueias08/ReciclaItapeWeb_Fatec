<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\entregas_usuarios;
use Hash;
use DB;

class LoginController extends Controller
{
    public function login(Request $request){
    	$email = $request->input('email');
        $senha = $request->input('senha');
        $senhaBD = usuarios::where('email',$email)->select('senha')->first();
        if($senhaBD != ""){
        	$senhaB = $senhaBD->senha;
            if(Hash::check($senha,$senhaB)){
            	$id = usuarios::where('email',$email)->select('id_usuario')->first();
                $user = usuarios::find($id->id_usuario);
                $saldo = entregas_usuarios::where("usuario_id","=",$id)->select(DB::raw('COALESCE(SUM(peso),0) as total_entrega'))->first();
                return json_encode(["status"=>"ok","dados"=>$user,"saldo_entrega"=>$saldo->total_entrega]);
            }
            else{
                return json_encode(["status"=>"erro","mensagem"=>"Usuário ou senha não encontrado!"]);   
            }  
        } 
        else{
			return json_encode(["status"=>"erro","mensagem"=>"Falha no Login!"]);
        }
    }
}
