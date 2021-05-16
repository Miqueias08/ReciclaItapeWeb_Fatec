<?php

namespace App\Http\Controllers\Site\Cooperativas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\cooperativas;
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
}
