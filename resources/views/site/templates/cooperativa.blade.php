@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="/css/usuario.css">
  @endpush
    @php
      $entrega = \App\Models\entregas_usuarios::where("id_cooperativa","=",Auth::guard('cooperativa')->user()->id_cooperativa)->select(DB::raw('SUM(peso) as total_entrega'))->first();
    @endphp
    <div class="row">
      <div class="col-md-2 usuario-box navbar-user">
        <div class="pontuacao-user">
          <ul>
            <li class="status-conta">STATUS DA COOPERATIVA</li>
            <li class="pontuacao-user-number">
              <dl class="pontosUser">
                <dt>Total de Entregas:</dt>
                <dd><span class="score-user">{{$entrega->total_entrega}} KG</span></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="links-user">
          <ul>
            <li><a href="/cooperativas/entregas">ENTREGAS</a></li>
            <li><a href="/cooperativa/gerenciar">GERENCIAR</a></li>
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
