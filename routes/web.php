<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\LoginController;
use App\Http\Controllers\Site\siteController;

Route::namespace("Site")->group(function(){
	Route::get('/', [siteController::class, 'index']);
	Route::get('obter/pontos', [siteController::class, 'obterPontos']);
	Route::post('admin/login', [LoginController::class, 'efetuarLogin']);
	
	/*Rotas Proibidas sem Autenticação*/
	Route::middleware([checkLogin::class])->group(function () {
		Route::get('admin/login', [LoginController::class, 'index']);
	});
	Route::middleware([AdministradorCheck::class])->group(function () {
		Route::get('dashboard', [AdminController::class, 'dashboard']);
		Route::get('admin/pontos', [AdminController::class, 'pontos']);
		Route::get('sair', [AdminController::class, 'sair']);
		Route::get('novo/ponto', [AdminController::class, 'novoPonto']);
		Route::post('novo/ponto', [AdminController::class, 'cadastroPonto']);
		Route::get('editar/ponto/{id}', [AdminController::class, 'editar']);
		Route::get('deletar/ponto/{id}', [AdminController::class, 'deletar']);
	});
});



