<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Makers_Model;

class AdminController extends Controller
{
    public function dashboard(){
         $pontos = Makers_Model::all();
    	return view("site.admin.pontos",compact('pontos'));
    }
    public function sair(){
    	 Auth::logout();
    	 return redirect("admin/login");
    }
    public function deletar($id){
        if(Makers_Model::destroy($id)){
            return true;
        }
        else{
            return false;
        }
    }
    public function novoPonto(){
        return view("site.admin.novo-ponto");
    }
    public function cadastroPonto(Request $request){
        try {
            $dados = $request->all();
            unset($dados["_token"]);
            $dados['papel']=="on"?$dados['papel']=1:$dados['papel']=0;
            $dados['plastico']=="on"?$dados['plastico']=1:$dados['plastico']=0;
            $dados['vidro']=="on"?$dados['vidro']=1:$dados['vidro']=0;
            Makers_Model::insert($dados);
            return redirect()->back()->with('SUCESSO', 'Ponto Cadastrado');
        } catch (\Exception $e) {
             return redirect()->back()->withInput()->with('ERRO','Erro ao cadastrar o ponto!');
        }
    }
}
