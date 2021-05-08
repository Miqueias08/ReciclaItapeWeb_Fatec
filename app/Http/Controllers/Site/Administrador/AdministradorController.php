<?php

namespace App\Http\Controllers\Site\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\cooperativas;

class AdministradorController extends Controller
{
    public function cooperativas(){
        $cooperativas = cooperativas::all();
    	return view("site.administrador.buscas.cooperativas",compact('cooperativas'));
    }
    public function cadastro_cooperativas(){
        return view("site.administrador.cadastros.cadastro-cooperativa");
    }
    public function processa_cadastro_cooperativas(Request $request){
        $validated = $request->validate([

            'razao_social'=>'required|max:90',
      
            'tipo_documento'=>'required|max:40',

            'cnpj'=>'max:19',

            'cpf'=>'max:14',

            'endereco'=>'required|max:100',

            'lat'=>'required',

            'lng'=>'required',

            'descricao'=>'max:150',

            'status'=>'required',

        ]);
        try {
            cooperativas::insert($request->except("_token"));
            return redirect()->back()->withSuccess('Cooperativa Cadastrada!');
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()->withInput()->withErrors('Falha no Cadastro!');
        }
    }
    public function processa_atualiza_cooperativas(Request $request){

    }










    public function sair(){
    	 Auth::logout();
    	 return redirect("administrador/login");
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
        return view("site.administrador.novo-ponto");
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
        return view("site.administrador.novo-ponto",compact('ponto'));
    }
}
