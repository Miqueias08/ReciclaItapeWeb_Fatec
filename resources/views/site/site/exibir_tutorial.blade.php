@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="/css/exibir-tutorial.css">
  @endpush
    <div class="container-fluid TutoriaisMain">
  <div class="Title">
    <h1>{{$tutorial->titulo}}</h1>
    <p>
      <i class="fa fa-user" aria-hidden="true"> Autor: {{ $tutorial->autor }}</i> 

      <i class="fa fa-calendar-check-o" aria-hidden="true"> Data:{{ 
        date('d/m/Y', strtotime($tutorial->dataHora ))
      }}</i>

      <i class="fa fa-clock-o" aria-hidden="true"> Hora:{{date('H:i', strtotime($tutorial->dataHora ))}}</i>
    </p>  
  </div>

  <div class="container-fluid col-md-12 row contentText">
    <div class="container boxtext">
      <div class="iframe col-md-12">
        @if(!$tutorial->video == '')
          <iframe src="{{$tutorial->video}}" frameborder="0" allowfullscreen>
          </iframe>
        @else
          <div class="imgTuto col-md-12 col-xs-12 col-sm-12" style="background-image: url('{{URL::asset('/img-tutorial/'.$tutorial->imagem)}}');">
            
          </div>
          <!-- <img src="{{URL::asset('/uploads/info/'.$tutorial->imagem)}}"> -->

        @endif
      </div>
      <div class="textTuto col-md-12 col-md-offset-2">
      {!!$tutorial->texto!!}
      </div>
    
    </div>
  </div>
</div>




  @push('scriptsFooter')
   
  @endpush
@endsection
    