<?php

namespace App\Http\Controllers\Site\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cooperativas;
use App\Models\usuarios;
use App\Models\materiais_cooperativas;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\nova_senha;
use Mail;

class SiteController extends Controller
{
    public function index(){
    	$cooperativas = DB::table("cooperativas")->join("materiais_cooperativas","cooperativas.id_cooperativa","=","materiais_cooperativas.id_cooperativa")->select("cooperativas.*",DB::raw("group_concat(materiais_cooperativas.categoria) as 'material_aceito'"))->groupby("id_cooperativa")->get();

    	return view("site.site.reciclar",['cooperativas' => $cooperativas,'titulo'=>"Pontos de Coleta"]);
    }
    public function cooperativas(){
        $cooperativas = DB::table("cooperativas")->join("materiais_cooperativas","cooperativas.id_cooperativa","=","materiais_cooperativas.id_cooperativa")->select("cooperativas.*",DB::raw("group_concat(materiais_cooperativas.categoria) as 'material_aceito'"))->groupby("id_cooperativa")->get();
    	return view("site.site.cooperativas",['cooperativas' => $cooperativas,'titulo'=>"Cooperativas"]);
    }
    public function ranking(){
    	return view("site.site.ranking",['titulo'=>"Ranking"]);
    }
    public function tutoriais(){
    	$tutoriais=null;
    	return view("site.site.tutoriais",['titulo'=>"Tutoriais","tutoriais"=>$tutoriais]);
    }
    public function login_cooperativa(){
        return view("site.site.login-cooperativa");
    }
    public function recuperar_senha(Request $request){
        try {
            $user = DB::table('usuarios')->where('email', $request->input("email"))->first();
            $novaSenha = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
            usuarios::find($user->id_usuario)->update(["senha"=>Hash::make($novaSenha)]);
            
            $dados = ["usuario"=>$user,"nova_senha"=>$novaSenha];
            Mail::to($user->email)->send(new nova_senha($dados));
            return redirect()->back()->with('EMAIL_ENVIADO', 'ENVIADO');   
        } catch (\Exception $e) {
            return redirect()->back()->with('FALHA_EMAIL', 'FALHA');   
        }
    }
}
