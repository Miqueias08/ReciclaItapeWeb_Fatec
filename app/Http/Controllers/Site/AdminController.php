<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function dashboard(){
    	return view("site.admin.index");
    }
    public function pontos(){
    	return view("site.admin.pontos");
    }
    public function sair(){
    	 Auth::logout();
    	 return redirect("admin/login");
    }
}
