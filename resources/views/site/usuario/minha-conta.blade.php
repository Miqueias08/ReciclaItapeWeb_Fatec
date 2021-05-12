@extends('site.templates.usuario')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/minha-conta.css">
@endpush
  <div class="container"> 
    <h1>Histórico de Entregas</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Peso(KG)</th>
          <th scope="col">Tipo de Material</th>
          <th scope="col">Cooperativa</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>0,20</td>
          <td>Papel</td>
          <td>Cooperita</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>0,10</td>
          <td>Vidro</td>
          <td>Cooperita</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>0,01</td>
          <td>Vidro</td>
          <td>Cooperita</td>
        </tr>
      </tbody>
    </table>

  </div>
@endsection

    