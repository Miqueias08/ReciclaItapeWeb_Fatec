@extends('site.templates.html')
@section('bootstrap')

	<div class="limiter">
		<div class="container-login100" style="background-image: url('/img/login_fundo.jpg');">
			<div class="wrap-login100">
				@if(session()->has('ERRO'))
		            <div class="alert alert-danger">
		                {{ session()->get('ERRO') }}
		            </div>
		        @endif
				<form class="login100-form validate-form" action="/administrador/login" method="post">
					 @csrf
					<a href="/"><span class="login100-form-logo" style="background-image: url('/img/logo.png');background-size: cover;background-position: center;">
				
					</span></a>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entre com o Email">
						<input class="input100" type="email" name="email" placeholder="Email">
	
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entre com a Senha">
						<input class="input100" type="password" name="senha" placeholder="Senha">
					</div>

					<div class="contact100-form-checkbox">
						<!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label> -->
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div><br>
					<div class="container-login100-form-btn">
						<a href="/"><button type="button" class="login100-form-btn">
							Sair
						</button></a>
					</div>
					
					<div class="text-center p-t-90">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
@endsection
@push('scriptsHead')
	<link rel="stylesheet" type="text/css" href="/css/login.css">
@endpush