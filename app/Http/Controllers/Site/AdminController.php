<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Makers_Model;

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
            return redirect()->back();
        }
        else{
           return redirect()->back();
        }
    }
    public function novoPonto(){
        return view("site.admin.novo-ponto");
    }
    public function cadastroPonto(Request $request){
        try {
            $dados = $request->all();
            if(isset($dados["id"])){
                unset($dados["_token"]);
                if(Makers_Model::find($dados["id"])->update($dados)){
                    return redirect()->back()->with('SUCESSO', 'Ponto Atualizado');
                }
            }
            else{
                unset($dados["_token"]);
                unset($dados["id"]);
                $dados['papel']=="on"?$dados['papel']=1:$dados['papel']=0;
                $dados['plastico']=="on"?$dados['plastico']=1:$dados['plastico']=0;
                $dados['vidro']=="on"?$dados['vidro']=1:$dados['vidro']=0;
                Makers_Model::insert($dados);
                return redirect()->back()->with('SUCESSO', 'Ponto Cadastrado');
            }
        } catch (\Exception $e) {
             if(isset($dados["id"])){
                return redirect()->back()->withInput()->with('ERRO','Erro ao cadastrar o ponto!');
            }
            else{
                return redirect()->back()->withInput()->with('ERRO','Erro ao atualizar o ponto!');
            }
        }
    }
    public function editar($id){
        $ponto = Makers_Model::find($id)->get();
        return view("site.admin.novo-ponto",compact('ponto'));
    }
}
