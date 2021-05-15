@extends("site.templates.administrador")
@push("scripts_head")
@endpush
@section("conteudo-admin")
    <div class="container-fluid dashboard-counters">
        <h2>Informações da Cooperativa</h2>
        <div class="form-group">
            <label for="exampleFormControlInput1">Código da Cooperativa</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->id_cooperativa}}">
            <label for="exampleFormControlInput1">Razão Social</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->razao_social}}">
            <label for="exampleFormControlInput1">Documento</label>
            <input type="text" disabled="true" class="form-control" 
            value="@if($cooperativa->tipo_documento=='PF') {{$cooperativa->cpf}} @else {{$cooperativa->cnpj}}  @endif">
            <label for="exampleFormControlInput1">Endereço</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->endereco}}">
            <label for="exampleFormControlInput1">Email</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->email}}">
            <label for="exampleFormControlInput1">Telefone</label>
            <input type="text" disabled="true" class="form-control" value="{{$cooperativa->telefone}}">
            <label for="exampleFormControlInput1">Latitude / Longitude</label>
            <input type="text" disabled="true" class="form-control" value="Latitude:{{$cooperativa->lat}} - Longitude:{{$cooperativa->lng}}">
            
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
                            <td><a href="/administrador/material-aceito/excluir/{{$mt->id_material}}" id="excluir"><p data-placement="Excluir" title="Excluir"><button class="btn btn-danger btn-xs" data-title="Excluir"><span class="glyphicon glyphicon-pencil">Excluir</span></button></p></a></td>
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
        <form method="post" action="/administrador/cadastro/material-aceito/{{$cooperativa->id_cooperativa}}">
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
@push('scripts_footer')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/js/mascara.js"></script>
<script type="text/javascript" href="/js/jquery.js"></script>
@endpush