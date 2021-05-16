<?php

namespace App\Http\Controllers\Site\Cooperativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;
use Illuminate\Support\Facades\Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class LoginCooperativa extends Controller
{
     public function processa_login_cooperativa(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|max:60',

            'senha'=>'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/login/cooperativa')
            ->withErrors($validator,'LoginErrors')
             ->withInput();
        }
        else{
	    	$email = $request->input('email');
		    $senha = $request->input('senha');
		    $senhaBD = cooperativas::where('email',$email)->select('senha')->first();
		    if($senhaBD != ""){
		        $senhaB = $senhaBD->senha;
		        if(Hash::check($senha,$senhaB)){
		            $id = cooperativas::where('email',$email)->select('id_cooperativa')->first();
		            $user = cooperativas::find($id->id_cooperativa);
		            Auth::guard("cooperativa")->login($user);
		            if(Auth::guard("cooperativa")->user()){
		                return redirect("/cooperativas/entregas");
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
}
