<?php

use Illuminate\Support\Facades\Route;

Route::namespace("Site")->group(function(){
	route::get("/","siteController@index");
	route::get("obter/pontos","siteController@obterPontos");
	route::post("admin/login","LoginController@efetuarLogin");
	/*Rotas Proibidas sem Autenticação*/
	Route::middleware([checkLogin::class])->group(function () {
		route::get("admin/login","LoginController@index");
	});
	Route::middleware([AdministradorCheck::class])->group(function () {
		route::get("dashboard","AdminController@dashboard");
		route::get("admin/pontos","AdminController@pontos");
		route::get("sair","AdminController@sair");
		route::get("novo/ponto","AdminController@novoPonto");
		route::post("novo/ponto","AdminController@cadastroPonto");
		route::get("editar/ponto/{id}","AdminController@editar");
		route::get("deletar/ponto/{id}","AdminController@deletar");
	});
});