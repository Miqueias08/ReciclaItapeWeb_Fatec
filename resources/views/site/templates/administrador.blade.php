@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="/css/administrador.css">
  @endpush
  @stack('scripts_head')
    @php
      $entrega = \App\Models\entregas_usuarios::select(DB::raw('COALESCE(SUM(peso),0) as total_entrega'))->first();
    @endphp
    <div class="row">
      <div class="col-md-2 usuario-box navbar-user">
        <div class="pontuacao-user">
          <ul>
            <li class="status-conta">STATUS DAS ENTREGAS</li>
            <li class="pontuacao-user-number">
              <dl class="pontosUser">
                <dt>Atualmente possuimos:</dt>
                <dd><span class="score-user">{{number_format($entrega->total_entrega,2,",",".")}} KG</span><br>
                De Entrega de Lixo.</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="links-user">
          <ul>
            <li><a href="/administrador/cooperativas">BUSCAS DE COOPERATIVAS</a></li>
            <li><a href="/administrador/cadastro/cooperativas">CADASTRO DE COOPERATIVAS</a></li>
            <li><a href="/administrador/cadastro/tutoriais">CADASTRO DE TUTORIAIS</a></li>
            <li><a href="/administrador/busca/tutoriais">BUSCA DE TUTORIAIS</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-10 usuario-box conteudo">
         @yield("conteudo-admin")
      </div>
    </div>
  @push('scriptsFooter')
    @stack('scripts_footer')
  @endpush
@endsection
