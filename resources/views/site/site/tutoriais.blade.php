@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/tutoriais.css">
  @endpush
  <div id="box1" class="container box1">
    <div class="titulo">
      <h1 id="Tutoriais">
        Tutoriais sobre a reciclagem
      </h1>
      <p>
        Aprenda a reciclar de forma correta!
      </p>
    </div>
  
    <div class="noticias">

      @forelse($tutoriais as $tuto)

        <div class="cardcontainer" style="margin:10px;">
          <div class="photo"> <img src="/img-tutorial/{{$tuto->imagem}}">
            <div class="photos">Reciclagem</div>
          </div>
          <div class="content">
            <p class="txt4" style="line-break: anywhere;">{{Str::limit($tuto->titulo,41)}}</p>
            <p class="txt5">{{$tuto->subtitulo}}</p>
            <p class="txt2">{{Str::limit($tuto->texto,75)}}</p>
          </div>
          <div class="footer">
            <p><a class="waves-effect waves-light btn-news" href="/tutorial/{{$tuto->id_tutorial}}">Ler Mais</a><a id="heart"></a></p>
            <p class="txt3"><i class="far fa-clock"></i>{{date('d/m/Y H:i', strtotime($tuto->dataHora))}}</p>
          </div>
        </div>

      @empty
        <p>Nenhum Tutorial Encontrado!</p>
      @endforelse


    </div>
    
  </div>
 
  
  @push('scriptsFooter')
  
  @endpush
@endsection
@section('rodape')
  @include("site.templates.rodape")
  <style type="text/css">
    #dados{
      min-height: 100%;height: auto;display: block;position: inherit;
    }
  </style>
@endsection
    