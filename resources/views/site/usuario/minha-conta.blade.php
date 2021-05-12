@extends('site.templates.usuario')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/minha-conta.css">
@endpush
  <div class="container"> 
   	<div class="col-md-9 InformMain">
		<div class="row">
			<div class="IformTitle">
				<h2>MEUS DADOS</h2>
			</div>
			<div class="col-md-12 formUserUpda">
				@if(session()->has('message'))
	    		<div class="alert alert-success">
	        		{{ session()->get('message') }}
	   			 </div>
				@endif

				<label>Email:<span>{{Auth::guard('usuario')->user()->email}}</span></label><br>

				<label>Nome:<span>{{Auth::guard('usuario')->user()->nome}}</span><p><a href="{{url('/minha_conta/name/update')}}">Modificar</a></p></label><br>

				<label>Senha:<span>***********</span><p><a href="{{url('/minha_conta/senha/update')}}">Modificar</a></p></label>
			</div>
		</div>
	</div>
  </div>
@endsection

    