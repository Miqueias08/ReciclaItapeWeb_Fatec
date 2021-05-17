@extends("site.templates.administrador")
@push("scripts_head")
@endpush
@section("conteudo-admin")
 <h1>@if(isset($tutorial)) Atualizar Tutorial #{{$tutorial->id_tutorial}} @else Nova Informação ou Tutorial @endif</h1>
<p class="lead">@if(isset($tutorial)) Atualize @else Adicione @endif alguma novidade ou informação ou tutorial para o usuário.</p>
<p class="lead">Opções com um "<span class="font-red">*</span>" são obrigatórias</p>
<div class="col-md-offset-2 col-md-7">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Painel
    </div>
    <div class="panel-body">
        <form id="upload" method="post" enctype="multipart/form-data" @if(isset($tutorial)) action="/administrador/atualizar/tutorial/{{$tutorial->id_tutorial}}" @else action="/administrador/cadastro/tutorial" @endif >
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
            @csrf
            <label for="titulo">Titulo(max:87)<span class="font-red">*</span></label>
            <input id="titulo" type="text" name="titulo" class="form-control" @if(isset($tutorial)) 
            value="{{$tutorial->titulo}}"
            @else
            value="{{ old('titulo') }}"
            @endif>
            <br>
            <label for="titulo">Subtitulo(max:30)<span class="font-red">*</span></label>
            <input id="subtitulo" type="text" name="subtitulo" class="form-control" @if(isset($tutorial)) 
            value="{{$tutorial->subtitulo}}"
            @else
            value="{{ old('subtitulo') }}"
            @endif>
            <br>
            <label for="autor">Autor</label>
            <input id="autor" type="text" name="autor"  class="form-control" value="{{ Auth::guard('admin')->user()->nome }}" readonly>
            <br>
            <label for="video">Vídeo</label>
            <input type="text" name="video" id="video" class="form-control"  @if(isset($tutorial)) 
            value="{{$tutorial->video}}"
            @else
            value="{{ old('video') }}"
            @endif>
            <br>
            <label for="imagem">Imagem</label><span class="font-red">*</span>
            @if(ISSET($tutorial))
                <div class="form-check" style="margin-bottom: 10px;">
                    <input class="form-check-input" type="checkbox" name="atualizar-imagem" id="atualizar-img">
                    <label class="form-check-label" for="flexCheckChecked">
                        Atualizar Imagem
                    </label>
                </div>
            @endif
            <input type="file" name="imagem" id="input-img" @if(isset($tutorial)) style="display: none;"@endif>
            <div class="imagens-ordem" style="margin-top: 20px;">
              @if(ISSET($tutorial))
                <img src="/img-tutorial/{{$tutorial->imagem}}" width="200px">
              @endif
            </div>
            <br>
            <label for="texto">Texto<span class="font-red">*</span></label>
            <textarea id="texto" name="texto" class="form-control">@if(isset($tutorial)){{$tutorial->texto}}@else{{old('texto')}}@endif</textarea>
            <br>
            <button type="submit" class="btn btn-primary">@if(isset($tutorial)) Atualizar @else Cadastro @endif</button>
        </form>
    </div>
  </div>
</div>
@endsection
@push('scripts_footer')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/js/mascara.js"></script>
<script type="text/javascript">
    $("#atualizar-img").click(function(){
        if($('#atualizar-img').is(":checked")==true){
            $("#input-img").show();
        }
        else{
           $("#input-img").hide();
 
        }
    });
</script>
@endpush