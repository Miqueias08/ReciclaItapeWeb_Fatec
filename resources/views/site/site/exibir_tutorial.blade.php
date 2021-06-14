@extends('site.templates.principal')
@section('principal')
@push('scriptsHead')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/exibir-tutorial.css">
@endpush
<div class="container TutoriaisMain">
   <div class="Title">
      <h1>{{$tutorial->titulo}}</h1>
      <p>{{ date('d/m/Y', strtotime($tutorial->dataHora ))}} às {{ date('h:i', strtotime($tutorial->dataHora ))}}
      </p>
   </div>
   <div class="dados-autor">
      
   </div>
   <div class="container-fluid col-md-12 row contentText">
      <div class="container boxtext">
         <div class="iframe col-md-12">
            @if(!$tutorial->video == '')
            <iframe src="{{$tutorial->video}}" frameborder="0" allowfullscreen>
            </iframe>
            @else
            <div class="imgTuto col-md-12 col-xs-12 col-sm-12" style="background-image: url('{{URL::asset('/img-tutorial/'.$tutorial->imagem)}}');height: 420px;">
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
@section('rodape')
@include("site.templates.rodape")
<style type="text/css">
   #dados{
   min-height: 100%;height: auto;display: block;position: inherit;
   }
</style>
@endsection