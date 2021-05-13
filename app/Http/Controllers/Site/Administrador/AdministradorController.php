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

            'imagem'=>'required',
      
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
            $lat = number_format($request['lat'],6);
            $lng = number_format($request['lng'],6);

            $request['lat']=$lat;
            $request['lng']=$lng;

            /*IMAGEM*/
           $requestData = $request->except("_token");
           $requestData['imagem'] = Upload_Imagem_Cooperativa($request);

            cooperativas::insert($requestData);
            return redirect()->back()->withSuccess('Cooperativa Cadastrada!');
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()->withInput()->withErrors('Falha no Cadastro!');
        }
    }
    public function admin_sair(){
        Auth::guard('admin')->logout();
        return redirect("/");
    }
    public function atualizar_cooperativa($id){
        $cooperativa = cooperativas::find($id);
        return view("site.administrador.cadastros.cadastro-cooperativa",["dados"=>$cooperativa]);
    }
    public function atualizar_cooperativa_processa(Request $request,$id){
        try {
            $cooperativa = cooperativas::find($id);
            $cooperativa->razao_social = $request->input("razao_social");
            $cooperativa->tipo_documento = $request->input("tipo_documento");
            $cooperativa->cnpj = $request->input("cnpj");
            $cooperativa->cpf = $request->input("cpf");
            $cooperativa->endereco = $request->input("endereco");
            $cooperativa->lat = $request->input("lat");
            $cooperativa->lng = $request->input("lng");
            $cooperativa->descricao = $request->input("descricao");
            $cooperativa->status = $request->input("status");
            if($request->input("atualizar-imagem")=="on"){
                 $cooperativa->imagem = Upload_Imagem_Cooperativa($request);
            }
            $cooperativa->save();
            return redirect()->back()->with('COOPERATIVA_ATUALIZADA', 'Cooperativa Atualizada!'); 
        } catch (\Exception $e) {
            return redirect()->back()->with('COOPERATIVA_FALHA', 'Cooperativa Atualizada!'); 
        }
    }
    public function excluir_cooperativa($id){
        try {
            cooperativas::find($id)->delete();
            return redirect()->back()->with('COOPERATIVA_DELETADA', 'Cooperativa Deletada!'); 
        } catch (\Exception $e) {
             return redirect()->back()->with('COOPERATIVA_DELETADA_FALHA', 'Falha!'); 
        }
    }


    public function sair(){
    	 Auth::logout();
    	 return redirect("administrador/login");
    }
   
}
