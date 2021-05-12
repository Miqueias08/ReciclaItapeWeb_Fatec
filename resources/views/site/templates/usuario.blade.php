@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/usuario.css">
  @endpush
   
    
    <div class="sidebarUser col-md-2 col-md-offset-1">
      <div class="col-md-12 userButtons">
        <h2>STATUS DA SUA CONTA</h2>
        <dl class="pontosUser"><br>
          <dt>Atualmente você tem:</dt>
          <dd><span>80</span><br>
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
    

  
  @push('scriptsFooter')

  @endpush
@endsection
