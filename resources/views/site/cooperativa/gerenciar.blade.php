@extends('site.templates.cooperativa')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/">
@endpush
   <div class="container-fluid dashboard-counters">
        <h2>Informações da Cooperativa</h2>
        <div class="form-group">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
          @endif
          @if(session('success'))
              <div class="alert alert-success">
                <ul> 
                  <li>{{session('success')}}</li>
                </ul>
              </div>
          @endif
          <form method="post" action="/cooperativa/atualizar">
            @csrf
            <label for="exampleFormControlInput1">Código da Cooperativa</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->id_cooperativa}}">
            <label for="exampleFormControlInput1">Razão Social</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->razao_social}}">
            <label for="exampleFormControlInput1">Documento</label>
            <input type="text" disabled="true" class="form-control" 
            value="@if($cooperativa->tipo_documento=='PF') {{$cooperativa->cpf}} @else {{$cooperativa->cnpj}}  @endif">
            <label for="exampleFormControlInput1">Email</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->email}}">
            <label for="exampleFormControlInput1">Telefone</label>
            <input type="text"class="form-control" name="telefone" value="{{$cooperativa->telefone}}">
            <label for="exampleFormControlInput1">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="{{$cooperativa->endereco}}">
            <label for="exampleFormControlInput1">Latitude</label>
            <input type="number" class="form-control" name="lat" value="{{$cooperativa->lat}}" step="0.01" min="-1000000000000000000000" max="1000000000000000000000">
            <label for="exampleFormControlInput1">Longitude</label>
            <input type="number" class="form-control" name="lng" value="{{$cooperativa->lng}}" step="0.01" min="-1000000000000000000000" max="1000000000000000000000">
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Atualizar</button>
          </form>
        </div>
    
        <h2>Materiais Aceitos <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastro-material"><i class="fas fa-plus-circle"></i></button></h2>
        <div class="container-fluid">
            <table id="mytable" class="table table-bordred table-striped" style="text-align: center;">
                <thead>
                    <th>Categoria</th>
                    <th>Excluir</th>
                </thead>
                <tbody> 
                    @foreach($materiais as $mt)
                        <tr>
                            <td>{{$mt->categoria}}</td>
                            <td><a href="/cooperativa/material-aceito/excluir/{{$mt->id_material}}" id="excluir"><p data-placement="Excluir" title="Excluir"><button class="btn btn-danger btn-xs" data-title="Excluir"><span class="glyphicon glyphicon-pencil">Excluir</span></button></p></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- MODAL CADASTRO -->
    <div class="modal fade" id="cadastro-material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Materias Coletados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/cooperativa/cadastro/material-aceito/{{$cooperativa->id_cooperativa}}">
            @csrf
            <input type="hidden" name="id_cooperativa" value="{{$cooperativa->id_cooperativa}}">
            <div class="form-group">
        <label for="recipient-name" class="col-form-label">Categoria</label>
            <select id="inputState" name="categoria" class="form-control">
                <option selected>Selecione uma categoria</option>
                <option>Vidro</option>
                <option>Papel</option>
                <option>Eletrônicos</option>
                <option>Orgânico</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" id="cadastrar">Cadastrar</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endsection

    