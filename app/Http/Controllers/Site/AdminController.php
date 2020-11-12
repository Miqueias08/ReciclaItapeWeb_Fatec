<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Makers_Model;

class AdminController extends Controller
{
    public function dashboard(){
    	return view("site.admin.index");
    }
    public function pontos(){
        $pontos = Makers_Model::all();
    	return view("site.admin.pontos",compact('pontos'));
    }
    public function sair(){
    	 Auth::logout();
    	 return redirect("admin/login");
    }
}
