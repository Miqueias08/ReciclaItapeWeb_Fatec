<?php

namespace App\Http\Controllers\Site\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\cooperativas;
use App\Models\materiais_cooperativas;
use App\Models\tutoriais;
use Illuminate\Support\Facades\Hash;
use DB;

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

            'email'=>'required|unique:cooperativas',

            'senha'=>'required|max:20',

            'telefone'=>'required|max:30',

            'imagem'=>'required',
      
            'tipo_documento'=>'required|max:40',

            'cnpj'=>'max:19',

            'cpf'=>'max:14',

            'endereco'=>'required|max:100',

            'lat'=>'required|numeric',

            'lng'=>'required|numeric',

            'descricao'=>'max:150',

            'status'=>'required',

        ]);
        try {
            $lat = number_format($request['lat'],6);
            $lng = number_format($request['lng'],6);

            $request['lat']=$lat;
            $request['lng']=$lng;
            $request['senha']=Hash::make($request['senha']);

            /*IMAGEM*/
           $requestData = $request->except("_token");
           $requestData['imagem'] = Upload_Imagem_Cooperativa($request);

            cooperativas::insert($requestData);
            return redirect()->back()->withSuccess('Cooperativa Cadastrada!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors('Falha no Cadastro,Verifique os campos e tente novamente!<br>'.$e->getMessage());
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
            $cooperativa->email = $request->input("email");
            $cooperativa->senha = Hash::make($request->input("senha"));
            $cooperativa->telefone = $request->input("telefone");
            $cooperativa->descricao = $request->input("descricao");
            $cooperativa->status = $request->input("status");
            if($request->input("atualizar-imagem")=="on"){
                 $cooperativa->imagem = Upload_Imagem_Cooperativa($request);
            }
            if($request->input("atualizar-senha")=="on"){
                 $cooperativa->senha = Hash::make($request->input("senha"));
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
    public function material_aceito($id){
        $materiais = DB::table("materiais_cooperativas")->where("id_cooperativa","=",$id)->get();
        return view("site.administrador.cadastros.material-aceito",["cooperativa"=>cooperativas::find($id),"materiais"=>$materiais,"titulo"=>"Materiais Aceitos"]);
    }
    public function cadastro_material_aceito(Request $request,$id){
        try {
            materiais_cooperativas::insert([$request->except("_token")]);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function excluir_material_aceito($id){
        try {
            materiais_cooperativas::find($id)->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function sair(){
    	 Auth::logout();
    	 return redirect("administrador/login");
    }
    public function cadastro_tutoriais(){
        return view("site.administrador.cadastros.tutoriais");
    }
    public function busca_tutoriais(){
        $tutoriais = tutoriais::all();
        return view("site.administrador.buscas.tutoriais",["tutoriais"=>$tutoriais]);
    }
    public function atualizar_tutorial($id){
        $tutorial = tutoriais::find($id);
        return view("site.administrador.cadastros.tutoriais",["tutorial"=>$tutorial]);
    }
    public function excluir_tutorial($id){
        tutoriais::find($id)->delete();
        return redirect()->back();
    }
    public function processa_atualizar_tutorial(Request $request,$id){
        if($request->input("atualizar-imagem")=="on"){
             $validated = $request->validate([

                'titulo'=>'required|max:87',

                'subtitulo'=>'required|max:30',

                'autor'=>'required',
                
                'texto'=>'required',

                'imagem'=>'required'
            ]); 
        }
        else{
            $validated = $request->validate([

                'titulo'=>'required|max:87',

                'subtitulo'=>'required|max:30',

                'autor'=>'required',
                
                'texto'=>'required',
            ]); 
        }
        try {
            $tutorial = tutoriais::find($id);
            $tutorial->titulo = $request->input("titulo");
            $tutorial->subtitulo = $request->input("subtitulo");
            $tutorial->autor = $request->input("autor");
            $tutorial->video = $request->input("video");
            $tutorial->texto = $request->input("texto");
            if($request->input("atualizar-imagem")=="on"){
                $requestData = $request->except("_token");
                $tutorial->imagem = Upload_Imagem_Tutorial($request);
            }
            $tutorial->save(); 
            return redirect()->back()->withSuccess('Tutorial Atualizado!');    

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors('Falha ao Atualizar!');
        }
        return $request->all();
    }
    public function cadastro_tutoriais_processa(Request $request){
         $validated = $request->validate([

            'titulo'=>'required|max:87',

            'subtitulo'=>'required|max:30',

            'autor'=>'required',

            'imagem'=>'required',
            
            'texto'=>'required',
        ]);
        try {
            /*IMAGEM*/
            $requestData = $request->except("_token");
            $requestData['imagem'] = Upload_Imagem_Tutorial($request);

            tutoriais::insert($requestData);
            return redirect()->back()->withSuccess('Tutorial Cadastrado!');    
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors('Falha no Cadastro!');
        }
    }
}
