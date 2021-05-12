@extends('site.templates.principal')
@section('principal')
@push('scriptsHead')
<link rel="stylesheet" type="text/css" href="css/usuario.css">
@endpush

<div class="container-fluid UserContentMain">
  <div class="sidebarUser col-md-2 col-md-offset-1">
    <h2>STATUS DA SUA CONTA</h2>
    <div class="col-md-12 userButtons">
      <dl class="pontosUser">
        <dt>Atualmente você tem:</dt>
        <dd><span></span><br>
        Pontos Disponíveis.</dd>
      </dl>
      <!-- Botoes conta -->
      <nav class="menu-user-btn">
        <ul>
          <li>
            <a href="/vouchers">
              VOUCHERS ATIVOS
            </a>
          </li>
          <li>
            <a href="/minha_conta">
              MINHA CONTA
            </a>
          </li>
          <li><a href="/meus-vouchers">MEUS VOUCHERS</a></li>
        </ul>
      </nav>
    </div>
  </div>
  
  @push('scriptsFooter')

  @endpush
  @endsection
