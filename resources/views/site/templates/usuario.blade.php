@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="/css/usuario.css">
  @endpush
    @php
      $entrega = \App\Models\entregas_usuarios::where("usuario_id","=",Auth::guard('usuario')->user()->id_usuario)->select(DB::raw('COALESCE(SUM(peso),0) as total_entrega'))->first();
    @endphp
    <div class="row">
      <div class="col-md-2 usuario-box navbar-user">
        <div class="pontuacao-user">
          <ul>
            <li class="status-conta">STATUS DA SUA CONTA</li>
            <li class="pontuacao-user-number">
              <dl class="pontosUser">
                <dt>Atualmente você tem:</dt>
                <dd><span class="score-user">{{number_format($entrega->total_entrega,2,",",".")}} KG</span><br>
                De Entrega de Lixo.</dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="links-user">
          <ul>
            <li><a href="/home">HISTÓRICO DE ENTREGAS</a></li>
            <li><a href="/minha-conta">MINHA CONTA</a></li>
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
