@extends('site.templates.principal')
@section('principal')
@push('scriptsHead')
<link rel="stylesheet" type="text/css" href="/css/login_cadastro.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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

        <button type="button" class="esqueci-senha" data-toggle="modal" data-target="#esqueci-senha">
        Esqueci a minha senha
        </button>
        <br>
        <br>
        <button class="btn btn-green pull-right">Entrar</button>
      </form>
    </div>
  </div>
  <!-- RECUPERAR SENHA -->
<div class="modal fade" id="esqueci-senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Esqueceu a Senha?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      


            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Esqueçeu a Sua Senha?</h2>
                  <p>Você pode resetar aqui.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" action="/recuperar/senha" class="form" method="post">
                      {!!csrf_field()!!}
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" required="required" name="email" placeholder="endereco de email" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Resetar Senha" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
    @push('scriptsFooter')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
      @if(session('EMAIL_ENVIADO'))
        <script type="text/javascript">
            $.confirm({
              title: 'Redefinição de Senha',
              content: 'Um email com a nova senha foi enviado',
              type: 'green',
              typeAnimated: true,
              buttons: {
                  fechar: function () {
                  }
              }
          });
        </script>
      @endif
      @if(session('FALHA_EMAIL'))
        <script type="text/javascript">
            $.confirm({
              title: 'Redefinição de Senha',
              content: 'Ocorreu alguma falha!',
              type: 'red',
              typeAnimated: true,
              buttons: {
                  fechar: function () {
                  }
              }
          });
        </script>
      @endif
    @endpush
    @endsection
    