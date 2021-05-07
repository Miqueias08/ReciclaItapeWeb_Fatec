<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Administrador\AdminController;
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
	Route::middleware([AdministradorCheck::class])->group(function () {
		Route::get('dashboard', [AdminController::class, 'dashboard']);
		Route::get('admin/pontos', [AdminController::class, 'pontos']);
		Route::get('sair', [AdminController::class, 'sair']);
		Route::get('novo/ponto', [AdminController::class, 'novoPonto']);
		Route::post('novo/ponto', [AdminController::class, 'cadastroPonto']);
		Route::get('editar/ponto/{id}', [AdminController::class, 'editar']);
		Route::get('deletar/ponto/{id}', [AdminController::class, 'deletar']);
	});
	/*/////////////////////////////////////////////////////////////////////*/
});



