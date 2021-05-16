<?php

namespace App\Http\Controllers\Site\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\entregas_usuarios;
use App\Models\usuarios;
use Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function home_usuario(){
        $Entregas = entregas_usuarios::where("usuario_id","=",Auth::guard('usuario')->user()->id_usuario)->join("cooperativas","entregas_usuarios.id_cooperativa","cooperativas.id_cooperativa")->select("entregas_usuarios.*","cooperativas.razao_social")->get();
    	return view("site.usuario.home",['titulo'=>"Histórico de Entregas","entregas"=>$Entregas]);
    }
    public function usuario_sair(){
    	Auth::guard('usuario')->logout();
    	return redirect("/login/cadastro");
    }
    public function minha_conta(){
    	return view("site.usuario.minha-conta",['titulo'=>"Minha Conta"]);
    }
    public function atualizar_nome(Request $Request){
        try {
            usuarios::find(Auth::guard('usuario')->user()->id_usuario)->update($Request->except("_token"));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function atualizar_senha(Request $request){
        $validated = $request->validate([
            'senha'=>'required|min:8|max:255',
        ]);
        try {
            $senha = $request->input("senha");
            $senha = Hash::make($senha);
            $usuario = usuarios::find(Auth::guard('usuario')->user()->id_usuario);
            $usuario->senha = $senha;
            $usuario->save();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
