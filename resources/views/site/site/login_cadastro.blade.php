@extends('site.templates.principal')
@section('principal')
@push('scriptsHead')
<link rel="stylesheet" type="text/css" href="/css/login_cadastro.css">
@endpush
<div class="container" id="box-geral">
<img id="cad-bg" src="/img/login-registro.jpg" alt="Background">
<div class="row" style="justify-content:center; width: 1050px;">
  <div class="cadastro col-md-5">
    <p class="lead">Ainda não tem um cadastro ?</p>
    <h1 class="green">Cadastre-se</h1>

    @if ($errors->cadastro->first('nome'))
    <span class="help-block">
      <strong>{{ $errors->cadastro->first('nome')}}</strong>
    </span>
    @endif

    @if ($errors->cadastro->first('email'))
    <span class="help-block">
      <strong>{{ $errors->cadastro->first('email')}}</strong>
    </span>
    @endif

    @if ($errors->cadastro->first('senha'))
    <span class="help-block">
      <strong>{{ $errors->cadastro->first('senha')}}</strong>
    </span>
    @endif

    @if ($errors->cadastro->first('confirma_senha'))
    <span class="help-block">
      <strong>{{ $errors->cadastro->first('confirma_senha')}}</strong>
    </span>
    @endif
    @if(session('status_cadastro'))
        <div class="alert alert-success">
          <ul> 
            <li>{{session('status_cadastro')}}</li>
          </ul>
        </div>
    @endif
  
    <form method="POST" action="/cadastro/usuario">

      {!!csrf_field()!!}
      <label for="nome">Nome</label>
      <input id="nome" type="text" autocomplete="nome" name="nome" class="form-control"  value="{{old('nome')}}" placeholder="Digite seu nome completo" required="required"><br>

      <label for="email">E-mail</label>
      <input id="email" type="email" autocomplete="nome" name="email" class="form-control"  value="{{old('email')}}" placeholder="Digite seu e-mail" required="required"><br>

      <label for="senha">Senha</label>
      <input id="senha" type="password" autocomplete="nome" name="senha" class="form-control" placeholder="Ao menos 8 digitos" value="{{old('senha')}}" required="required">
      <br>

      <label for="senha2">Confirme a senha</label>
      <input id="senha2" type="password" autocomplete="nome" class="form-control" placeholder="Digite novamente sua senha" name="confirma senha" value="{{old('confirmar_senha')}}" required="required"><br>

      <button class="btn btn-green">Cadastrar</button>
    </form>
  </div>


  <div class="cadastro col-md-5 col-md-offset-2">
    <p class="lead">Caso já tenha uma conta,</p>
    <h1 class="blue">Entre Agora</h1>
    <form  method="POST" action="/login/usuario">

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

        <a href="{{ url('recuperar/senha') }}">Esqueci a minha senha</a>
        <br>
        <br>
        <button class="btn btn-green pull-right">Entrar</button>
      </form>
    </div>
  </div>
    @push('scriptsFooter')

    @endpush
    @endsection
    