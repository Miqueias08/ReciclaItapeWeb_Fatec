@extends('site.templates.cooperativa')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/">
  <link rel="stylesheet" href="/css/jquery-confirm.min.css">
@endpush
  <div class="container-fluid dashboard-counters">
        <h2>Cadastrar Entrega</h2>
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
          <form method="post" action="/cooperativa/entregas">
            @csrf
            <label for="exampleFormControlInput1">Tipo de Lixo</label>
            <select class="form-control" name="tipo_material">
              <option value="0">Selecione o Tipo do Lixo</option>
              @foreach($lixos_aceitos as $lx)
                @if(old('tipo_material')==$lx->categoria)
                  <option value="{{$lx->categoria}}" selected="true">{{$lx->categoria}}</option>
                @else
                  <option value="{{$lx->categoria}}">{{$lx->categoria}}</option>
                @endif
              @endforeach
            </select>

            <label for="exampleFormControlInput1">Email do Usuário</label>
            <input type="email" name="email_usuario" value="{{old('email_usuario')}}" placeholder="Email do Usuário" class="form-control">

            <label for="exampleFormControlInput1">Quantidade de Lixo (KG)</label>
            <input type="number" name="quantidade" value="{{old('quantidade')}}" placeholder="Quantidade de Lixo" class="form-control" step="0.01" min="-1000000000000000000000" max="1000000000000000000000">
          
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Cadastro</button>
          </form>
        </div>
        <h1>Histórico de Entregas</h1>
        <table class="table" style="text-align: center;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Peso(KG)</th>
                <th scope="col">Tipo de Material</th>
                <th scope="col">Usuário (Nome)</th>
                <th scope="col">Usuário (Email)</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              @forelse($entregas as $ent)
                 <tr>
                  <th scope="row">{{$ent->id_entrega_usuario}}</th>
                  <td>{{number_format($ent->peso,2,",",".")}}</td>
                  <td>{{$ent->tipo_material}}</td>
                  <td>{{$ent->nome}}</td>
                  <td>{{$ent->email}}</td>
                  <td><a href="/cooperativa/excluir/entrega/{{$ent->id_entrega_usuario}}" id="excluir"><p data-placement="Excluir" title="Excluir"><button class="btn btn-danger btn-xs" data-title="Excluir"><span class="glyphicon glyphicon-pencil">Excluir</span></button></p></a></td>
                </tr>
              @empty
                 <tr>
                  <th colspan="4">Nenhum Material Entregue!</th>
                </tr>
              @endforelse
            </tbody>
          </table>

  </div>
   @push('scriptsFooter')
      <script src="/js/jquery-confirm.min.js"></script>
      @if(session('ENTREGA_DELETADA'))
        <script type="text/javascript">
            $.confirm({
              title: 'Entrega Deletada',
              content: 'Entrega Deletada com Sucesso',
              type: 'green',
              typeAnimated: true,
              buttons: {
                  fechar: function () {
                  }
              }
          });
        </script>
      @endif
      @if(session('FALHA_DELETAR'))
        <script type="text/javascript">
            $.confirm({
              title: 'Deletar Entrega',
              content: 'Ocorreu alguma falha!',
              type: 'red',
              typeAnimated: true,
              buttons: {
                  fechar: function () {
                  }
              }
          });
        </script>
      @endif
    @endpush
@endsection

    