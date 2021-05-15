@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="/css/cooperativas.css">
  @endpush
    <div class="container">
      <div class="row"> 
        <h1 style="">Cooperativas</h1>
          @forelse($cooperativas as $dt)
          <div class="card" data-id="" data-title="">

            <div class="card-body">

              <div class="card-img">

                <span>{{$dt->razao_social}}</span>

                <img src="/img-cooperativas/{{$dt->imagem}}" style="object-fit: cover;">

              </div>

              <div class="card-corpo">
                <ul>

                  <li class="detalhes"><strong>Telefone:</strong>{{$dt->telefone}}</li><br>

                  <li class="latitude"><strong>Latitude:</strong>{{$dt->lat}}</li><br>

                  <li class="longitude"><strong>Longitude:</strong>{{$dt->lng}}</li><br>

                  <li class="tipos"><strong>Tipos de Lixo Coletado</strong><br>{{$dt->material_aceito}}</li>

                </ul>

                <a href="/"><button type="button" class="btn btn-success">Visualizar no Mapa</button></a>
              </div>

            </div>

          </div>
      @empty
        <p>Nenhuma cooperativa cadastrada</p>
      @endforelse
        </div>

    </div>
  @push('scriptsFooter')
   
  @endpush
@endsection
    