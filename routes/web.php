<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Site")->group(function(){
	route::get("reciclar","siteController@index");
	route::get("obter/pontos","siteController@obterPontos");
	route::get("admin/login","LoginController@index");
	route::post("admin/login","LoginController@efetuarLogin");
	route::get("dashboard","AdminController@dashboard");
});