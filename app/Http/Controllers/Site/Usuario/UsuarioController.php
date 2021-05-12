<?php

namespace App\Http\Controllers\Site\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UsuarioController extends Controller
{
    public function home_usuario(){
    	return view("site.usuario.home",['titulo'=>"Histórico de Entregas"]);
    }
    public function usuario_sair(){
    	Auth::guard('usuario')->logout();
    	return redirect()->back();
    }
    public function minha_conta(){
    	return view("site.usuario.minha-conta",['titulo'=>"Minha Conta"]);
    }
}
