@extends("site.templates.administrador")
@push("scripts_head")
@endpush
@section("conteudo-admin")
 <h1>Nova Informação ou Tutorial</h1>
<p class="lead">Adicione alguma novidade ou informação ou tutorial para o usuário.</p>
<p class="lead">Opções com um "<span class="font-red">*</span>" são obrigatórias</p>
<div class="col-md-offset-2 col-md-7">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Painel
    </div>
    <div class="panel-body">
        <form id="upload" method="post" action="/administrador/cadastro/tutorial" enctype="multipart/form-data">
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
            <input id="titulo" value="{{old('titulo')}}" type="text" name="titulo" class="form-control">
            <br>
            <label for="titulo">Subtitulo(max:30)<span class="font-red">*</span></label>
            <input id="subtitulo" value="{{old('titulo')}}" type="text" name="subtitulo" class="form-control">
            <br>
            <label for="autor">Autor</label>
            <input id="autor" type="text" name="autor"  class="form-control" value="{{ Auth::guard('admin')->user()->nome }}" readonly>
            <br>
            <label for="video">Vídeo</label>
            <input type="text" value="{{old('video')}}" name="video" id="video" class="form-control">
            <br>
            <label for="imagem">Imagem</label><span class="font-red">*</span>
            <input type="file" name="imagem">
            <br>
            <label for="resumo">Resumo do texto(max:268)<span class="font-red">*</span></label>
            <textarea class="form-control" value="{{old('resumo')}}" id="resumo" name="resumo"></textarea>
            <br>
            <label for="texto">Texto<span class="font-red">*</span></label>
            <textarea id="texto" name="texto" class="form-control"></textarea>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
  </div>
</div>
@endsection
@push('scripts_footer')
<link rel="stylesheet" href="/css/jquery-confirm.min.css">
<script src="/js/jquery-confirm.min.js"></script>
<script type="text/javascript" src="/js/mascara.js"></script>
@endpush