<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Administrador\AdministradorController;
use App\Http\Controllers\Site\Administrador\LoginControllerAdmin;
use App\Http\Controllers\Site\Site\SiteController;
use App\Http\Controllers\Site\Usuario\UsuarioController;
use App\Http\Controllers\Site\Usuario\LoginUsuarioController;

Route::namespace("Site")->group(function(){
	Route::get('/', [SiteController::class, 'index']);
	Route::get('cooperativas', [SiteController::class, 'cooperativas']);
	Route::get('obter/pontos', [SiteController::class, 'obterPontos']);
	




	/*USUARIO*/
	Route::get('login/cadastro', [LoginUsuarioController::class, 'login_cadastro'])->middleware("CheckLogin");
	Route::post('/cadastro/usuario', [LoginUsuarioController::class, 'cadastro_usuario']);
	Route::post('/login/usuario', [LoginUsuarioController::class, 'login_usuario']);

	Route::middleware([AuthUserCheck::class])->group(function () {
		Route::get('/home', [UsuarioController::class, 'home_usuario']);
		Route::get('/usuario/sair', [UsuarioController::class, 'usuario_sair']);
	});




	
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



