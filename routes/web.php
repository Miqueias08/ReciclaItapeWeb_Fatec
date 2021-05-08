<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Administrador\AdministradorController;
use App\Http\Controllers\Site\Administrador\LoginControllerAdmin;
use App\Http\Controllers\Site\Site\SiteController;

Route::namespace("Site")->group(function(){
	Route::get('/', [SiteController::class, 'index']);
	Route::get('obter/pontos', [SiteController::class, 'obterPontos']);
	
	
	/*ADMINISTRADOR*/

	/*AUTENTICACAO*/
	Route::get('administrador/login', [LoginControllerAdmin::class, 'index'])->middleware("CheckLogin");

	/*PROCESSA AUTENTICACAO*/
	Route::post('administrador/login', [LoginControllerAdmin::class, 'efetuarLogin']);

	/*ROTAS PROIBIDAS SEM AUTENTICACAO*/
	Route::middleware([AuthAdminCheck::class])->group(function () {
		Route::get('administrador/cooperativas', [AdministradorController::class, 'cooperativas']);
		Route::get('/administrador/cadastro/cooperativas', [AdministradorController::class, 'cadastro_cooperativas']);
		Route::post('/administrador/cadastro/cooperativas', [AdministradorController::class, 'processa_cadastro_cooperativas']);
		Route::post('/administrador/atualizar/cooperativas', [AdministradorController::class, 'processa_atualiza_cooperativas']);


		Route::get('admin/pontos', [AdministradorController::class, 'pontos']);
		Route::get('sair', [AdministradorController::class, 'sair']);
		Route::get('novo/ponto', [AdministradorController::class, 'novoPonto']);
		Route::post('novo/ponto', [AdministradorController::class, 'cadastroPonto']);
		Route::get('editar/ponto/{id}', [AdministradorController::class, 'editar']);
		Route::get('deletar/ponto/{id}', [AdministradorController::class, 'deletar']);
	});
	/*/////////////////////////////////////////////////////////////////////*/
});



