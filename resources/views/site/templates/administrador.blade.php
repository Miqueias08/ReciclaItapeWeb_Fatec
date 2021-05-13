@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="/css/administrador.css">
  @endpush
  
    <div class="row">
      <div class="col-md-2 usuario-box navbar-user">
        <div class="pontuacao-user">
          <ul>
            <li class="status-conta">STATUS DAS ENTREGAS</li>
            <li class="pontuacao-user-number">
              <dl class="pontosUser">
                <dt>Atualmente possuimos:</dt>
                <dd><span class="score-user">80 KG</span><br>
                De Entrega de Lixo.</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="links-user">
          <ul>
            <li><a href="/administrador/cooperativas">BUSCAS DE COOPERATIVAS</a></li>
            <li><a href="/administrador/cadastro/cooperativas">CADASTRO DE COOPERATIVAS</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10 usuario-box conteudo">
         @yield("conteudo-admin")
      </div>
    </div>
  @push('scriptsFooter')

  @endpush
@endsection
