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
      <div class="modal-body">
       <!--  <div class="alert alert-dark erros" role="alert">
            <span>Erro!</span><br>
        </div> -->
        <form id="dados">
                <input type="hidden" id="id" name="IdUsuario" value="">
                <label class="nomeHide">
                    Nome:<br>
                </label>
                <input type="text" name="Nome" class="form-control nomeHide"   autocomplete="off" id="nome">
                <label class="usuarioHide">
                    Endereço:<br>
                </label>
                <input type="text" name="Email" class="form-control usuarioHide"   autocomplete="off"  id="email">
                <label class="senhaHide">
                    Latitude:<br>
                </label>
                <input type="password" name="Senha" class="form-control senhaHide"   autocomplete="off" id="senha">
                 <label class="senhaHide">
                    Longitude:<br>
                </label>
                <input type="password" name="Senha" class="form-control senhaHide"   autocomplete="off" id="senha">


                <div class="custom-control custom-checkbox">
    				<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    				<label class="custom-control-label" for="defaultUnchecked">Papel</label>
				</div>
				<div class="custom-control custom-checkbox">
    				<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    				<label class="custom-control-label" for="defaultUnchecked">Platico</label>
				</div>
				<div class="custom-control custom-checkbox">
    				<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
    				<label class="custom-control-label" for="defaultUnchecked">Vidro</label>
				</div>
               
                <button type="button" class="btn btnUsuario btn-success" style="margin: 10px;">Cadastro</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       <!--  <button type="button" class="btn btn-primary">Salvar mudanças</button> -->
      </div>
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
                    <div class="col-sm-4">
                         <button type="button" class="btn btn-info add-new btn-primary" data-toggle="modal" data-target="#modalExemplo" id="btnNovo">
                            Adicionar
                        </button>
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
                    <tr id="user{{$dado->IdUsuario}}">
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
                            <a class="edit" id="{{$dado->IdUsuario}}" title="Editar" data-toggle="modal" data-target="#modalExemplo"><i class="fas fa-edit"></i></a>
                             <a class="senha" id="{{$dado->IdUsuario}}" title="Senha" data-toggle="modal" data-target="#modalExemplo"><i class="fa fa-unlock" aria-hidden="true"></i></a>
                            <a class="delete" id="{{$dado->IdUsuario}}" title="Deletar" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>