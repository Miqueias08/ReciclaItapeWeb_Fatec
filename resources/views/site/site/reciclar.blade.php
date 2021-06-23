@extends('site.templates.principal')
@section('principal')
  @push('scriptsHead')
    <link rel="stylesheet" type="text/css" href="css/reciclar.css">
  @endpush
  <style type="text/css">
    #dados{
      padding: 0;
    }
  </style>
  
  <div id="busca-itens" >
    <input id="pac-input" class="controls" type="text" placeholder="Busca Cooperativa" style="height:38px;">
    <button type="button" class="btn btn-success" id="buscar-cooperativas" style="margin:5px;cursor: pointer;position: relative;top: -0.2px;">Buscar</button>
    <button type="button" id="remover-filtro" class="btn btn-danger" style="display: none;margin: 5px;">Remover</button>
    <button class="btn btn-success" id="load" style="display:none;" type="button" disabled style="margin:5px;">
      <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
      Buscando...
    </button>
    <div id="resultados">
      <ul id="dados-resultados">

      </ul>
    </div>
  </div>

  <div id="map" style="width:100%;height:100vh;">
  </div>

  @push('scriptsFooter')
    <script>
      var markers = [];
      var map;

      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };
      var styleArray = [
      {
          featureType: "poi.business",
          elementType: "labels",
          stylers: [
            { visibility: "off" }
          ]
        }
      ];
      function initMap() {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
          map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-23.589115,-48.048801),
            zoom: 12.6,
            styles: styleArray,
            disableDefaultUI: true,
            scrollwheel: false,
            options:{
              gestureHandling: 'greedy',
              draggable: !("ontouchend" in document)
            }
          });
        }
        else{
          map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(-23.589115,-48.048801),
            zoom: 14,
            styles: styleArray,
            disableDefaultUI: true,
            scrollwheel: false,
            options:{
              gestureHandling: 'greedy',
              draggable: !("ontouchend" in document)
            }
          });
        }   
        pontos(map);
      }
      function pontos(map){
         @if(isset($cooperativas))
          @foreach($cooperativas as $marker)
            var info{{ $marker->id_cooperativa }} = new google.maps.InfoWindow({
              content: 
                "<h2>{{ $marker->razao_social }}</h2>"
                +"<h5>Endereço</h5> {{ $marker->endereco }}<br>"
                +"<h5 style='margin-bottom:10'>O ponto coleta os seguintes tipos de lixo</h5>"
                +"<span class=\"glyphicon glyphicon-file\"></span><strong> {{$marker->material_aceito}}</strong><br>"
                +"<a href='https://maps.google.com/?q={{$marker->lat}},{{$marker->lng}}' target='_blank'><button type='button' class='btn btn-primary'><i class='fas fa-map-marked-alt'></i> Enviar para Google Maps</button></a>"
                +"<br><br><a href='https://www.waze.com/ul?ll={{$marker->lat}}%2C{{$marker->lng}}&navigate=yes&zoom=17' target='_blank'><button type='button' class='btn btn-primary'><i class='fas fa-map-marked-alt'></i> Enviar para Waze</button></a>"
              });
              var marker{{ $marker->id_cooperativa }} = new 
              google.maps.Marker({
                position: {
                  lat: {{ $marker->lat }}, 
                  lng: {{ $marker->lng }}
                },
                map: 
                  map,
                  title: "{{ $marker->razao_social }}"
              });
              marker{{ $marker->id_cooperativa }}.addListener('click', function(){
                info{{ $marker->id_cooperativa }}.open(map,marker{{ $marker->id_cooperativa }})
            });
            marker{{ $marker->id_cooperativa }}.setMap(map);
            markers.push(marker{{ $marker->id_cooperativa }});
          @endforeach
        @endif
      }

      /*AO Selecionar o Filtro*/
      $("body").on("click", ".cooperativa_lista", function(){
        var id = $(this).attr("data-id");
        var razao_social = $(this).attr("data-razao");
        var material = $(this).attr("data-material");
        var latitude = $(this).attr("data-latitude");
        var longitude = $(this).attr("data-longitude");


        $("#pac-input").val(razao_social);
        $("#resultados").hide();
        $("#remover-filtro").show();
        $("#buscar-cooperativas").hide();
        $("#pac-input").prop( "disabled", true );
        deletar_pontos_especificos(razao_social);
      });

      function deletar_pontos_especificos(ponto){
        for (var i = 0; i < markers.length; i++) {
          if(markers[i].title!=ponto){
            markers[i].setMap(null);
          }
        }
      }
      function deletar_todos_pontos(){
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
      }
      $("#remover-filtro").click(function(){
        deletar_todos_pontos();
        pontos(map);
        $("#remover-filtro").hide();
        $("#buscar-cooperativas").show();
        $("#pac-input").val("");
        $("#pac-input").prop( "disabled", false );
      });
    </script>

    <script defer src="https://maps.googleapis.com/maps/api/js?key={{config('app.api_maps')}}&callback=initMap"></script>
    <script type="text/javascript">
      function cancela_load(){
        $("#load").hide();
         $("#buscar-cooperativas").show();
      }
      function inicia_load(){
         $("#load").show();
         $("#buscar-cooperativas").hide();
      }
      $("#buscar-cooperativas").click(function(){
        if($("#pac-input").val().trim()!=""){
          $.ajax({
            url : "/buscar/cooperativa/"+$("#pac-input").val(),
            type : 'get',
            beforeSend : function(){
              inicia_load();
            }
          })
          .done(function(response){
            cancela_load();
            var resposta = JSON.parse(response);
            if(resposta.length>0){
              var html="";
              $.each(resposta, function(i, item) {
                html = html+"<li class='cooperativa_lista' data-latitude='"+resposta[i].lat+"' data-longitude='"+resposta[i].lng+"' data-razao='"+resposta[i].razao_social+"' data-material='"+resposta[i].material_aceito+"' data-id='"+resposta[i].id_cooperativa+"'><span><i class='fas fa-map-marker-alt'></i>";
                html = html + resposta[i].id_cooperativa+"°:";
                html = html + resposta[i].razao_social+" - ";
                html = html + resposta[i].endereco+"</span></li>";
              });
              $("#dados-resultados").empty();
              $("#dados-resultados").append(html);
              $("#resultados").show();
            }
        })
        .fail(function(jqXHR, textStatus, msg){
            cancela_load();
        });

      }
    });

    $("#map").click(function(){
      $("#resultados").hide();
    });

  
  </script>
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
    