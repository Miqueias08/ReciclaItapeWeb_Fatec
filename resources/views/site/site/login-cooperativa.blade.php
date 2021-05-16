@extends('site.templates.principal')
@section('principal')
@push('scriptsHead')
<link rel="stylesheet" type="text/css" href="/css/login_cadastro.css">
@endpush
<div class="container" id="box-geral">
<img id="cad-bg" src="/img/login-cooperativa.jpg" alt="Background">
<div class="row" style="justify-content:center; width: 1050px;">

  <div class="cadastro col-md-5 col-md-offset-2">
    <p class="lead">Área Restrita - Somente Cooperativas</p>
    <h1 class="blue">Entre Agora</h1>
    <form  method="POST" action="/login/cooperativa">

      {!!csrf_field()!!}
      @if ($errors->LoginErrors->first('email'))
      <span class="help-block">
        <strong>{{ $errors->LoginErrors->first('email')}}</strong>
      </span>
      @endif

      @if ($errors->LoginErrors->first('senha'))
      <span class="help-block">
        <strong>{{ $errors->LoginErrors->first('senha')}}</strong>
      </span>
      @endif
      @if($errors->any())
      <span class="help-block">
        <strong>{{$errors->first()}}</strong>
      </span>
      @endif
      @if(session()->has('ERRO'))
        <div class="alert alert-danger">
          {{ session()->get('ERRO') }}
        </div>
      @endif
      <label for="nome">E-mail</label>
      <input id="nome" type="email" name="email" class="form-control"  placeholder="Digite seu email" value="{{old('email')}}">
      <br>
      <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
        <label for="senha">Senha</label>
        <input id="senha" type="password" name="senha" class="form-control" placeholder="Digite sua senha" value="{{old('senha')}}">
        <br>
        <br>
        <button class="btn btn-green pull-right">Entrar</button>
      </form>
    </div>
  </div>
    @push('scriptsFooter')

    @endpush
    @endsection
    