@extends('site.templates.html')
@section('bootstrap')
	<div class="limiter">
		<div class="container-login100" style="background-image: url('/img/login_fundo.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="/admin/login" method="post">
					 @csrf
					<span class="login100-form-logo" style="background-image: url('/img/logo.png');background-size: cover;background-position: center;">
						
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entre com o Email">
						<input class="input100" type="email" name="email" value="miqueiasfernando@gmail.com" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Entre com a Senha">
						<input class="input100" type="password" value="123" name="senha" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
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