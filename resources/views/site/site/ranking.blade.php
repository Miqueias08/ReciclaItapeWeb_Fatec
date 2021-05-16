@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/ranking.css">
  @endpush
  @php
    $k=1;
  @endphp
  <div class="container"> 
    <h1>Ranking de Usuários</h1>
    <style>
      .table{
        background-color: white;
      }
    </style>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"># Posição</th>
          <th scope="col">Usuário</th>
          <th scope="col">Quantidade de Entrega (KG)</th>
        </tr>
      </thead>
      <tbody>
        @forelse($ranking as $rank)
          <tr>
            <th scope="row">{{$k}}</th>
            <td>{{$rank->nome}}</td>
            <td>{{number_format($rank->total_entrega,2,",",".")}}</td>
          </tr>
          @php
            $k=$k+1;
          @endphp
        @empty

        @endforelse
      </tbody>
    </table>
  </div>


  @push('scriptsFooter')
  
  @endpush
@endsection
    