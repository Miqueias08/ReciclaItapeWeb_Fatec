<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuarios;

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
                return json_encode(["status"=>"ok","dados"=>$user]);
            }
            else{
                return json_encode(["status"=>"erro","dados"=>"Usuário ou senha não encontrado!"]);   
            }  
        } 
        else{
			return json_encode(["status"=>"erro","dados"=>"Falha no Login!"]);
        }
    }
}
