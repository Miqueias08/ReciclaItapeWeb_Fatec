@extends('site.templates.usuario')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/home_user.css">
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
        @forelse($entregas as $ent)
           <tr>
            <th scope="row">{{$ent->id_entrega_usuario}}</th>
            <td>{{$ent->peso}}</td>
            <td>{{$ent->tipo_material}}</td>
            <td>{{$ent->razao_social}}</td>
          </tr>
        @empty
           <tr>
            <th colspan="4">Nenhum Material Entregue!</th>
          </tr>
        @endforelse
      </tbody>
    </table>

  </div>
@endsection

    