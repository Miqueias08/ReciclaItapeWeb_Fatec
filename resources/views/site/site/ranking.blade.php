@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/ranking.css">
  @endpush
  <div class="container"> 
    <h1>Ranking de Usuários</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"># Posição</th>
          <th scope="col">Usuário</th>
          <th scope="col">Quantidade de Entrega (KG)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Miquéias Fernando </td>
          <td>1200,00</td>
        </tr>
      </tbody>
    </table>
  </div>


  @push('scriptsFooter')
  
  @endpush
@endsection
    