<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use App\User;

class LoginController extends Controller
{
    public function index(){
    	return view("site.admin.login");
    }
    public function efetuarLogin(Request $request){
    	$email = $request->input('email');
	    $senha = $request->input('senha');
	    $senhaBD = DB::table('usuarios')->where('email',$email)->select('senha')->first();
	    if($senhaBD != ""){
	        $senhaB = $senhaBD->senha;
	        if(Hash::check($senha,$senhaB)){
	            $id = DB::table('usuarios')->where('email',$email)->select('id')->first();
	            $user = User::find($id->id);
	            Auth::login($user);
	            if(Auth::user()){
	                return redirect("dahboard");
	            }
	            else{
	                $data = ["status"=>"erro","mensagem"=>"Falha no Login!"];
	            }
	        }
	        else{
	            $data = ["status"=>"erro","mensagem"=>"Usuário ou senha não encontrado!"];
	        }     
	    }
	    else{
	        $data = ["status"=>"erro","mensagem"=>"Senha em branco!"];   
	    }	
    }
}
