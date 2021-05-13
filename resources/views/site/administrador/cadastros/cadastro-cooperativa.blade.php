@extends("site.templates.administrador")
@push("head_scripts")
    
@endpush
@section("conteudo-admin")
  <h1 class="page-title">@if(isset($rifa)) Atualizar Cooperativa #{{$rifa->id}} @else Cadastro de Cooperativa @endif</h1>
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
    <form method="post" enctype="multipart/form-data" @if(isset($cooperativa)) action="/administrador/atualizar/cooperativas"> @else action="/administrador/cadastro/cooperativas"> @endif
        @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Razão Social</label>
        <input type="text" class="form-control" name="razao_social" placeholder="Razão Social" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->razao_social}}"
        @else
        value="{{ old('razao_social') }}"
        @endif>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo de Documento</label>
            <select class="form-control" name="tipo_documento" id="tipo-documento">
              <option value="">Selecione o documento</option>
              <option value="CNPJ" @if(isset($cooperativa)) @if($cooperativa->tipo_documento == 'CNPJ') selected @endif @endif>CNPJ</option>
              <option value="CPF" @if(isset($cooperativa)) @if($cooperativa->tipo_documento == 'CPF') selected @endif @endif>CPF</option>
            </select>
        </div>

        <label for="d-none exampleFormControlInput1" class="cooperativaCnpj">CNPJ</label>
        <input type="text" class="form-control cooperativaCnpj" id="cnpj" name="cnpj" placeholder="CNPJ" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->cnpj}}"
        @else
        value="{{ old('cnpj') }}"
        @endif>

        <label for="exampleFormControlInput1" class="cooperativaCpf">CPF</label>
        <input type="text" class="form-control cooperativaCpf" id="cpf" name="cpf" placeholder="CPF" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->cpf}}"
        @else
        value="{{ old('cpf') }}"
        @endif>

        <label for="exampleFormControlInput1">Endereço</label>
        <input type="text" class="form-control" name="endereco" placeholder="Endereço" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->endereco}}"
        @else
        value="{{ old('endereco') }}"
        @endif>

        <label for="exampleFormControlInput1">Latitude</label>
        <input type="number" class="form-control" name="lat" placeholder="Latitude" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->lat}}"
        @else
        value="{{ old('lat') }}"
        @endif>

        <label for="exampleFormControlInput1">Longitude</label>
        <input type="number" class="form-control" name="lng" placeholder="Longitude" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->lng}}"
        @else
        value="{{ old('lng') }}"
        @endif>

        <label for="exampleFormControlInput1">Descrição</label>
        <input type="text" class="form-control" name="descricao" placeholder="Descrição" 
        @if(isset($cooperativa)) 
        value="{{$cooperativa->descricao}}"
        @else
        value="{{ old('descricao') }}"
        @endif>

         <div class="form-group">
            <label for="exampleFormControlSelect1">Status</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
              <option value="">Selecione o status</option>
              <option value="1" @if(isset($cooperativa)) @if($cooperativa->status == 1) selected @endif @endif>Ativo</option>
              <option value="2" @if(isset($cooperativa)) @if($cooperativa->status == 2) selected @endif @endif>Desativado</option>
            </select>
        </div><br>
      <button type="submit" class="btn btn-success">@if(isset($cooperativa)) Atualizar @else Cadastro @endif</button>
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
@push('footer_scripts')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/js/mascara.js"></script>
<script type="text/javascript">
    $('#cpf').mask('000.000.000-00');
    $('#cnpj').mask('00.000.000/0000-00');
</script>
<script type="text/javascript">
      $('body').on('change','#tipo-documento', function() {
         val = this.value;
         switch(val){
            case "CNPJ":
                $(".cooperativaCnpj").show();
                $(".cooperativaCpf").hide();
                $(".cooperativaCpf").val("");
                break;
            case "CPF":
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
@endpush