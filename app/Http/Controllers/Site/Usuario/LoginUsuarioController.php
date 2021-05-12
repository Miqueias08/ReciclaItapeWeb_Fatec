<?php

namespace App\Http\Controllers\Site\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuarios;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;

class LoginUsuarioController extends Controller
{
     public function login_cadastro(){
    	return view("site.site.login_cadastro",['titulo'=>"Login / Cadastro"]);
    }
    public function login_usuario(Request $request){
         $validator = Validator::make($request->all(), [
            'email'=>'required|max:60',

            'senha'=>'required|min:8|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/login/cadastro')
            ->withErrors($validator,'LoginErrors')
             ->withInput();
        }
        else{
            $email = $request->input('email');
            $senha = $request->input('senha');
            $senhaBD = usuarios::where('email',$email)->select('senha')->first();
            if($senhaBD != ""){
                $senhaB = $senhaBD->senha;
                if(Hash::check($senha,$senhaB)){
                    $id = usuarios::where('email',$email)->select('id_usuario')->first();
                    $user = usuarios::find($id->id_usuario);
                    Auth::guard("usuario")->login($user);
                    if(Auth::guard("usuario")->user()){
                        return redirect("home");
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
    public function cadastro_usuario(Request $request){
         $validator = Validator::make($request->all(), [
            'nome'=>'required|max:60',
      
            'email'=>'required|max:90',

            'senha'=>'min:8|max:255|required_with:confirma_senha|same:confirma_senha',

            'confirma_senha'=>'min:8|required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/login/cadastro')
            ->withErrors($validator,'cadastro')
             ->withInput();
        }
        else{
            $dados = $request->except("_token","confirma_senha");
            $dados['senha'] = Hash::make($dados['senha']);
            if(usuarios::create($dados)){
                return redirect()->back()->with('status_cadastro','Usuário Cadastrado!'); 
            }
            else{
                 return redirect('/login/cadastro')
                ->withErrors(["Erro no cadastro"],'cadastro')
                ->withInput();
            }
        }
    }
}
