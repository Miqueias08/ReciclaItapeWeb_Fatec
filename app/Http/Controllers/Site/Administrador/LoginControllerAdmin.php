<?php

namespace App\Http\Controllers\Site\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use App\Models\administradores;


class LoginControllerAdmin extends Controller
{
    public function index(){
    	return view("site.administrador.login");
    }
    public function efetuarLogin(Request $request){
    	$email = $request->input('email');
	    $senha = $request->input('senha');
	    $senhaBD = administradores::where('email',$email)->select('senha')->first();
	    if($senhaBD != ""){
	        $senhaB = $senhaBD->senha;
	        if(Hash::check($senha,$senhaB)){
	            $id = administradores::where('email',$email)->select('id_administrador')->first();
	            $user = administradores::find($id->id_administrador);
	            Auth::guard("admin")->login($user);
	            if(Auth::guard("admin")->user()){
	                return redirect("administrador/cooperativas");
	            }
	            else{
	            	return redirect()->back()->with('ERRO', 'Falha no login');
	            }
	        }
	        else{
	        	return redirect()->back()->with('ERRO', 'Usuario e senha não encontrado!');
	        }     
	    }
	    else{
	        return redirect()->back()->with('ERRO', 'Senha invalida');   
	    }	
    }
}
