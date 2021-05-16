@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="/css/usuario.css">
  @endpush
  
    <div class="row">
      <div class="col-md-2 usuario-box navbar-user">
        <div class="pontuacao-user">
          <ul>
            <li class="status-conta">STATUS DA COOPERATIVA</li>
            <li class="pontuacao-user-number">
              <dl class="pontosUser">
                <dt>Total de Entregas:</dt>
                <dd><span class="score-user">80 KG</span></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="links-user">
          <ul>
            <li><a href="/home">ENTREGA</a></li>
            <li><a href="/home">GERENCIAR</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10 usuario-box conteudo">
         @yield("conteudo-user")
      </div>
    </div>
  @push('scriptsFooter')

  @endpush
@endsection
