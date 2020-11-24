@extends('site.templates.dashboard')
@section("dashboard")
@push('css')
<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
@endpush
<div class="container-fluid" id="dados" style="height: 100%;">
    <link rel="stylesheet" type="text/css" href="css/pontos.css">
    <div class="modal fade show" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Novo Ponto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    </div>
</div>
<!-- --------------------------------------------------------------- -->
<div class="container-fluid dados">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pontos</h1>
        <!--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Reportar Erro</a> -->
    </div>
    <div class="row" id="conteudo">
       <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-8">
                    <h2>Pontos</b></h2>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Tipo de Coleta</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
             @foreach($pontos as $dado)
             <tr>
                <td>{{$dado->name}}</td>
                <td>{{$dado->address}}</td>
                <td>{{$dado->lat}}</td>
                <td>{{$dado->lng}}</td>
                <td>
                    @if($dado->papel==true) 
                    Papel
                    @endif
                    @if($dado->plastico==true) 
                    Plastico
                    @endif
                    @if($dado->vidro==true) 
                    Vidro
                    @endif
                </td>
                <td>
                    <a class="edit icons pagina" id="editar/ponto/{{$dado->id}}" title="Editar" data-toggle="modal" data-target="#modalExemplo"><i class="fas fa-edit"></i></a>
                    <a class="delete icons" id="deletar/ponto/{{$dado->id}}" title="Deletar" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <a class="adicionar icons" id="{{$dado->id}}" title="Adicionar" data-toggle="modal" data-target="#modalExemplo"><i class="fas fa-plus-circle"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
</div>
</div>
</div>
@endsection

