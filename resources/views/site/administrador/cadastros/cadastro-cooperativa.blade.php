@extends("site.templates.administrador")
@push("scripts_head")
@endpush
@section("conteudo-admin")
  <h1 class="page-title">@if(isset($dados)) Atualizar Cooperativa #{{$dados->id_cooperativa}} @else Cadastro de Cooperativa @endif</h1>
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
    <form method="post" enctype="multipart/form-data" @if(isset($dados)) action="/administrador/atualizar/cooperativa/{{$dados->id_cooperativa}}"> @else action="/administrador/cadastro/cooperativas"> @endif
        @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Razão Social</label>
        <input type="text" class="form-control" name="razao_social" placeholder="Razão Social" 
        @if(isset($dados)) 
        value="{{$dados->razao_social}}"
        @else
        value="{{ old('razao_social') }}"
        @endif>

        <label for="exampleFormControlInput1">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email" 
        @if(isset($dados)) 
        value="{{$dados->email}}"
        @else
        value="{{ old('email') }}"
        @endif>

        <label for="exampleFormControlInput1">Senha</label>
        @if(ISSET($dados))
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="atualizar-senha" id="atualizar-senha">
                <label class="form-check-label" for="flexCheckChecked">
                    Alterar Senha
                </label>
            </div>
        @endif
        <input type="password" id="senha"  @if(isset($dados)) style="display: none;" @endif class="form-control" name="senha" placeholder="Senha">

         <label for="exampleFormControlInput1">Telefone</label>
        <input type="tel" class="form-control" name="telefone" placeholder="Telefone" 
        @if(isset($dados)) 
        value="{{$dados->telefone}}"
        @else
        value="{{ old('telefone') }}"
        @endif>

        <label for="exampleFormControlInput1">Imagem</label>
         @if(ISSET($dados))
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="atualizar-imagem" id="atualizar-img">
                <label class="form-check-label" for="flexCheckChecked">
                    Atualizar Imagem
                </label>
            </div>
        @endif
        <input type="file" @if(isset($dados)) style="display: none;" @endif class="form-control" name="imagem" placeholder="Imagens" accept="image/png, image/jpeg,image/jpg" multiple="off" id="input-img" value="">
        <div class="imagens-ordem">
          @if(ISSET($dados))
            <img src="/cooperativas/{{$dados->imagem}}" width="200px">
          @endif
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de Documento</label>
            <select class="form-control" name="tipo_documento" id="tipo-documento">
              <option value="">Selecione o documento</option>
              <option value="PJ" @if(isset($dados)) @if($dados->tipo_documento == 'PJ') selected @endif @endif>Pessoa Juridica</option>
              <option value="PF" @if(isset($dados)) @if($dados->tipo_documento == 'PF') selected @endif @endif>Pessoa Fisica</option>
            </select>
        </div>

        <label for="d-none exampleFormControlInput1" class="cooperativaCnpj">CNPJ</label>
        <input type="text" class="form-control cooperativaCnpj" id="cnpj" name="cnpj" placeholder="CNPJ" 
        @if(isset($dados)) 
        value="{{$dados->cnpj}}"
        @else
        value="{{ old('cnpj') }}"
        @endif>

        <label for="exampleFormControlInput1" class="cooperativaCpf">CPF</label>
        <input type="text" class="form-control cooperativaCpf" id="cpf" name="cpf" placeholder="CPF" 
        @if(isset($dados)) 
        value="{{$dados->cpf}}"
        @else
        value="{{ old('cpf') }}"
        @endif>

        <label for="exampleFormControlInput1">Endereço</label>
        <input type="text" class="form-control" name="endereco" placeholder="Endereço" 
        @if(isset($dados)) 
        value="{{$dados->endereco}}"
        @else
        value="{{ old('endereco') }}"
        @endif>

        <label for="exampleFormControlInput1">Latitude</label>
        <input type="number" class="form-control" name="lat" placeholder="Latitude" 
        @if(isset($dados)) 
        value="{{$dados->lat}}"
        @else
        value="{{ old('lat') }}"
        @endif  step="0.01" min="-1000000000000000000000" max="1000000000000000000000">

        <label for="exampleFormControlInput1">Longitude</label>
        <input type="number" class="form-control" name="lng" placeholder="Longitude" 
        @if(isset($dados)) 
        value="{{$dados->lng}}"
        @else
        value="{{ old('lng') }}"
        @endif step="0.01" min="-1000000000000000000000" max="1000000000000000000000">

        <label for="exampleFormControlInput1">Descrição</label>
        <input type="text" class="form-control" name="descricao" placeholder="Descrição" 
        @if(isset($dados)) 
        value="{{$dados->descricao}}"
        @else
        value="{{ old('descricao') }}"
        @endif>

         <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
              <option value="">Selecione o status</option>
              <option value="1" @if(isset($dados)) @if($dados->status == 1) selected @endif @endif>Ativo</option>
              <option value="2" @if(isset($dados)) @if($dados->status == 2) selected @endif @endif>Desativado</option>
            </select>
        </div><br>
      <button type="submit" class="btn btn-success">@if(isset($dados)) Atualizar @else Cadastro @endif</button>
    </form>
    <style type="text/css">
        .cooperativaCpf{
        display: none;
        }
        .cooperativaCnpj{
          display: none;
        }
        @media (max-width: 575.98px) {
        .usuario-box{
          height: auto;
          margin: 0;
          padding: 0;
        }
        }
    </style>
@endsection
@push('scripts_footer')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/js/mascara.js"></script>
<script type="text/javascript">
    $('#cpf').mask('000.000.000-00');
    $('#cnpj').mask('00.000.000/0000-00');
</script>
<script type="text/javascript" href="/js/jquery.js"></script>
<script type="text/javascript">
    $("#atualizar-img").click(function(){
        if($('#atualizar-img').is(":checked")==true){
            $("#input-img").show();
        }
        else{
           $("#input-img").hide();
 
        }
    });
     $("#atualizar-senha").click(function(){
        if($('#atualizar-senha').is(":checked")==true){
            $("#senha").show();
        }
        else{
           $("#senha").hide();
 
        }
    });
    
    $('body').on('change','#tipo-documento', function() {
        val = this.value;
        switch(val){
            case "PJ":
                $(".cooperativaCnpj").show();
                $(".cooperativaCpf").hide();
                $(".cooperativaCpf").val("");
                break;
            case "PF":
                $(".cooperativaCpf").show();
                $(".cooperativaCnpj").hide();
                $(".cooperativaCnpj").val("");
                break;
            default:
                $(".cooperativaCpf").hide();
                $(".cooperativaCnpj").hide();
                break;
         }
    });
</script>
@if(isset($dados))
    <script type="text/javascript">
        valor = $( "#tipo-documento option:selected" ).val();
         switch(valor){
            case "PJ":
                $(".cooperativaCnpj").show();
                $(".cooperativaCpf").hide();
                $(".cooperativaCpf").val("");
                break;
            case "PF":
                $(".cooperativaCpf").show();
                $(".cooperativaCnpj").hide();
                $(".cooperativaCnpj").val("");
                break;
            default:
                $(".cooperativaCpf").hide();
                $(".cooperativaCnpj").hide();
                break;
         }
    </script>   
  @if(session('COOPERATIVA_ATUALIZADA'))
        <script type="text/javascript">
         $.confirm({
                title: 'Dados Atualizados',
                content: 'Informações atualizadas com sucesso',
                type: 'green',
                typeAnimated: true,
                buttons: {
                    voltar: function () {
                        location.href = "/administrador/cooperativas";
                }
            }
          });
        </script>
    @endif
    @if(session('COOPERATIVA_FALHA'))
        <script type="text/javascript">
            $.confirm({
                title: 'Falha',
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
@endif
@endpush