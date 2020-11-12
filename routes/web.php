<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Site")->group(function(){
	route::get("reciclar","siteController@index");
	route::get("obter/pontos","siteController@obterPontos");
	route::post("admin/login","LoginController@efetuarLogin");
	/*Rotas Proibidas sem Autenticação*/
	Route::middleware([checkLogin::class])->group(function () {
		route::get("admin/login","LoginController@index");
		route::get("dashboard","AdminController@dashboard");
	});
});