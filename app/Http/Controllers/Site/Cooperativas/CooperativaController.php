<?php

namespace App\Http\Controllers\Site\Cooperativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\cooperativas;
use App\Models\usuarios;
use Illuminate\Support\Facades\Validator;
use App\Models\entregas_usuarios;
use App\Models\materiais_cooperativas;

class CooperativaController extends Controller
{
   public function gerenciar(){
   	$materiais = DB::table("materiais_cooperativas")->where("id_cooperativa","=",Auth::guard("cooperativa")->user()->id_cooperativa)->get();
   	return view("site.cooperativa.gerenciar",["cooperativa"=>cooperativas::find(Auth::guard("cooperativa")->user()->id_cooperativa),"materiais"=>$materiais,"titulo"=>"Gerenciar - Cooperativa"]);
   }
   public function atualizar(Request $request){
   		$validated = $request->validate([

            'endereco'=>'required',

            'lat'=>'required',

            'lng'=>'required',
    	]);
	   	try {
	   		cooperativas::find(Auth::guard("cooperativa")->user()->id_cooperativa)->update($request->except('_token'));
	   		return redirect()->back()->withSuccess('Cooperativa Atualizada!');
	   	} catch (\Exception $e) {
	   		return redirect()->back()->withInput()->withErrors('Falha no Cadastro!');
	   	}
   	}
   	public function excluir_material($id){
   		 try {
            materiais_cooperativas::find($id)->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
   	}
   	public function cadastro_material_aceito(Request $request,$id){
        try {
            materiais_cooperativas::insert([$request->except("_token")]);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    public function entregas(){
       $Entregas = entregas_usuarios::where("id_cooperativa","=",Auth::guard('cooperativa')->user()->id_cooperativa)->join("usuarios","entregas_usuarios.usuario_id","=","usuarios.id_usuario")->select("entregas_usuarios.*","usuarios.nome","usuarios.email")->get();

      $lixos_aceitos = DB::table("materiais_cooperativas")->where("id_cooperativa","=",Auth::guard("cooperativa")->user()->id_cooperativa)->get();

    	return view("site.cooperativa.cadastros.entregas",["titulo"=>"Entregas de Lixo","lixos_aceitos"=>$lixos_aceitos,"entregas"=>$Entregas]);
    }
    public function entrega_cadastro(Request $request){
      try {
         $validator = Validator::make($request->all(), [
            'tipo_material'=>'required|not_in:0',
            'email_usuario'=>'required|email|exists:usuarios,email',
            'quantidade'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
             ->withInput();
        }
        else{
          $user = DB::table('usuarios')->where('email', $request->input("email_usuario"))->first();
          $dados = [
            "peso"=>$request->input("quantidade"),
            "tipo_material"=>$request->input("tipo_material"),
            "usuario_id"=>$user->id_usuario,
            "id_cooperativa"=>Auth::guard("cooperativa")->user()->id_cooperativa,
          ];
          entregas_usuarios::insert($dados);
          return redirect()->back()->withSuccess('Material Adicionado!');
        }
      } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors('Falha no Cadastro!');
      }
    }
    public function sair(){
       Auth::guard('cooperativa')->logout();
        return redirect("/");
    }
    public function excluir_entrega($id){
      try {
        entregas_usuarios::find($id)->delete();
        return redirect()->back()->with('ENTREGA_DELETADA', 'ENVIADO');             
      } catch (\Exception $e) {
         return redirect()->back()->with('FALHA_DELETAR', 'FALHA');   
      }
    }
}
