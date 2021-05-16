<?php

namespace App\Http\Controllers\Site\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\entregas_usuarios;
use Auth;

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
}
