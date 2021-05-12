<?php

namespace App\Http\Controllers\Site\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class UsuarioController extends Controller
{
    public function home_usuario(){
    	return view("site.usuario.home",['titulo'=>"Minha Conta"]);
    }
    public function usuario_sair(){
    	Auth::guard('usuario')->logout();
    	return redirect()->back();
    }
}
