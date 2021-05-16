@extends('site.templates.usuario')
@section('conteudo-user')
@push('scriptsHead')
  <link rel="stylesheet" type="text/css" href="css/minha-conta.css">
@endpush
  <div class="container"> 
   	<div class="col-md-9 InformMain">
		<div class="row">
			<div class="IformTitle">
				<h2>MEUS DADOS</h2>
			</div>
			<div class="col-md-12 formUserUpda">
				@if(session()->has('message'))
	    		<div class="alert alert-success">
	        		{{ session()->get('message') }}
	   			 </div>
				@endif

				<label>Email:<span>{{Auth::guard('usuario')->user()->email}}</span></label><br>

				<label>Nome:<span>{{Auth::guard('usuario')->user()->nome}}</span><p><a href="#" data-toggle="modal" data-target="#alterar-nome">Modificar</a></p></label><br>

				<label>Senha:<span>***********</span><p><a href="#" data-toggle="modal" data-target="#alterar-senha">Modificar</a></p></label>
			</div>
		</div>
	</div>
  </div>

  <!-- MODAL -->
<div class="modal fade" id="alterar-nome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Nome</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/usuario/atualizar/nome">
        	@csrf
        	<div class="form-group">
				<label for="exampleInputEmail1">Nome</label>
			    <input type="text" class="form-control" value="{{Auth::guard('usuario')->user()->nome}}" name="nome" placeholder="Digite seu Nome">
			</div>
        	<button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL SENHA -->
<div class="modal fade" id="alterar-senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atualizar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/usuario/atualizar/senha">
        	@csrf
        	<div class="form-group">
				<label for="exampleInputEmail1">Senha</label>
			    <input type="password" class="form-control" name="senha" minlength="8" required="" placeholder="Digite sua Nova Senha">
			</div>
        	<button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
@endsection

    