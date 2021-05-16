@extends('site.templates.cooperativa')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/">
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
            <input type="number" name="quantidade" value="{{old('quantidade')}}" placeholder="Quantidade de Lixo" class="form-control">
          
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Cadastro</button>
          </form>
        </div>
  </div>
@endsection

    